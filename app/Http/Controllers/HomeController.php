<?php

namespace App\Http\Controllers;


use Carbon\Carbon;
use App\Models\Berita;
use App\Models\Pasar; 
use App\Models\Vendor;
use App\Models\Gallery;
use App\Models\HargaPangan;
use App\Models\JenisPangan; 
use App\Models\Logo;
use Illuminate\Http\Request;
use App\Models\Announcements;
use App\Models\InformasiPublik;
use App\Models\Struktur;
use Illuminate\Support\Facades\DB;
use App\Exports\DataExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Log;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        // Ambil kata kunci pencarian dari query string
        $search_keyword = $request->input('search');

        // Query untuk mendapatkan berita
        $beritas = Berita::when($search_keyword, function ($query, $search_keyword) {
            return $query->where('title', 'LIKE', '%' . $search_keyword . '%');
        })
        ->orderBy('date', 'DESC')
        ->get();


        return view(('berita.lengkap'),  compact('beritas', 'search_keyword'));

    }

    public function show() {
        $galleries = Gallery::all();
        $beritas = Berita::all();
        $vendors = Vendor::all();
    
        $averagePrices = DB::table('harga_pangans')
            ->join('jenis_pangans', 'harga_pangans.jenis_pangan_id', '=', 'jenis_pangans.id')
            ->select(
                'jenis_pangans.name as name',
                'jenis_pangans.unit as unit',
                DB::raw('DATE(harga_pangans.date) as date'),
                DB::raw('AVG(harga_pangans.price) as average_price')
            )
            ->groupBy('jenis_pangans.name', 'jenis_pangans.unit', DB::raw('DATE(harga_pangans.date)'))
            ->orderBy('date')
            ->get();

            $averagePrices = $averagePrices->map(function($item) {
                $item->name_with_unit = $item->name . ' (' . $item->unit . ')'; // Gabungkan nama dan unit
                return $item;
            });
    
        return view('master.index', compact('galleries', 'beritas', 'averagePrices', 'vendors'));
    }
    
    

    public function detail($slug)
    {
        $berita = Berita::where('slug', $slug)->firstOrFail();
        $berita->increment('views');

        return view('berita.detail', compact('berita'));
    }

    public function showG(){

        $galleries = Gallery::all();

        return view('galeri.lengkap', compact( 'galleries'));
    }

    public function indexS()
    {
        // Ambil data dengan relasi
        $data = HargaPangan::with('pasar', 'jenisPangan')->orderBy('date', 'asc')->get();
        $markets = Pasar::all();
        $foodTypes = JenisPangan::all();
        $vendors = Vendor::all();
        $years = range(date('Y') - 10, date('Y'));

        // Filter data berdasarkan bulan dan tahun saat ini
        $currentMonth = now()->month;
        $currentYear = now()->year;
        $monthlyData = $data->filter(function ($item) use ($currentMonth, $currentYear) {
            return Carbon::parse($item->date)->month == $currentMonth &&
                Carbon::parse($item->date)->year == $currentYear;
        });

        // Harga tertinggi bulan ini
        $highestPriceEntry = $monthlyData->sortByDesc('price')->first();
        $highestPrice = $highestPriceEntry->price ?? 0;
        $highestMarket = $highestPriceEntry->pasar->name ?? '-';
        $highestFood = $highestPriceEntry->jenisPangan->name ?? '-';
        $highestMonth = now()->translatedFormat('F Y');

        // Harga terendah bulan ini
        $lowestPriceEntry = $monthlyData->sortBy('price')->first();
        $lowestPrice = $lowestPriceEntry->price ?? 0;
        $lowestMarket = $lowestPriceEntry->pasar->name ?? '-';
        $lowestFood = $lowestPriceEntry->jenisPangan->name ?? '-';
        $lowestMonth = now()->translatedFormat('F Y');

        // Jumlah pasar
        $totalMarkets = $markets->count();

        // Rata-rata harga bulan ini
        $averagePrice = $monthlyData->avg('price') ?? 0;

        // Data untuk grafik
        $chartData = $data->map(function ($item) {
            return [
                'name' => $item->jenisPangan->name . ' (' . $item->jenisPangan->unit . ')',
                'market' => $item->pasar->name,
                'date' => Carbon::parse($item->date)->format('Y-m-d'),
                'price' => (float) $item->price
            ];
        });

        // Kirim data ke view
        return view('master.grafik-bidang', compact(
            'data', 'highestPrice', 'highestMarket', 'highestFood', 'highestMonth',
            'lowestPrice', 'lowestMarket', 'lowestFood', 'lowestMonth',
            'averagePrice', 'markets', 'foodTypes', 'vendors', 'chartData', 'totalMarkets', 'years'
        ));
    }
     


    public function showI($slug)
    {
        $info = InformasiPublik::where('slug', $slug)->firstOrFail();
        return view('infopublik.show', compact('info'));
    }

    public function indexP(Request $request)
    {
        $search_keyword = $request->get('search'); 

        $announcements = Announcements::latest()
            ->when($search_keyword, function ($query, $search_keyword) {
                return $query->where('title', 'like', '%' . $search_keyword . '%')
                            ->orWhere('description', 'like', '%' . $search_keyword . '%');
            })
            ->paginate(10);

        return view('pengumuman.lengkap', compact('announcements', 'search_keyword')); 
    }

    public function showP($slug)
    {
        $announcement = Announcements::where('slug', $slug)->firstOrFail();
        $announcement->increment('views');
        return view('pengumuman.detail', compact('announcement'));
    }


    public function showV(){
        $vendors = Vendor::all();

        return view('master.halamanbidang', compact('vendors'));
    }


    public function showL()
    {
        
        $image = Logo::first(); // Misalnya, mengambil gambar pertama

        return view('infopublik.logo', compact('image'));
    }

    public function showS()
    {
        
        $image = Struktur::first(); // Misalnya, mengambil gambar pertama
        return view('infopublik.struktur-organisasi', compact('image'));
    }


    public function exportData(Request $request)
    {
        $month = $request->query('month');
        $food = $request->query('jenisPangan');
        $market = $request->query('pasar');
        

        // Query dengan memuat relasi food dan market
        $query = HargaPangan::query()
            ->with(['jenisPangan', 'pasar']);  // Memuat relasi food dan market

        // Filter sesuai parameter yang diberikan
        if ($food) {
            $query->where('jenis_pangan_id', $food);  // Filter berdasarkan ID food
        }

        if ($market) {
            $query->where('pasar_id', $market);  // Filter berdasarkan ID market
        }

        if ($month) {
            $query->whereMonth('date', $month);  // Filter berdasarkan bulan
        }

        // Ambil data dengan relasi
        $data = $query->get();

        // Pastikan ada data yang ditemukan
        if ($data->isEmpty()) {
            return redirect()->back()->with('error', 'Tidak ada data yang cocok untuk diekspor.');
        }

        // Ambil tanggal dari elemen pertama dalam collection untuk nama bulan dan tahun
        $firstItem = $data->first();
        $date = Carbon::parse($firstItem->date);  // Pastikan properti 'date' ada dalam model Anda
        $currentMonth = $date->format('F');  // Nama bulan
        $currentYear = $date->year;  // Tahun

        // Tentukan nama file berdasarkan bulan dan tahun dari data yang diproses
        $fileName = 'Data_' . $currentMonth . '_' . $currentYear . '.xlsx';

        // Kirim data ke export
        return Excel::download(new DataExport($data), $fileName);
    }


}
