@extends('master.halamanbidang')

@section('content')
    <div class="container my-5">
        <!-- Header Halaman -->
        <div class="bg-dark text-white text-center py-2 rounded shadow-sm mb-4">
            <h1 class="display-6 fw-bold text-light">Perkembangan Harga Pangan</h1>
            <p class="mb-0">Analisis Perkembangan Harga Pangan dari Beberapa Pasar di Kota Makassar</p>
        </div>


        <div class="row g-4">
            <!-- Statistik Ringkasan -->
            <div class="col-md-4 ">
                <div class="card text-center shadow-sm border-0">
                    <div class="card-body">
                        <h6 class="card-title">Harga Tertinggi</h6>
                        <h3 class="fw-bold text-success highest-price">Rp {{ number_format($highestPrice, 0, ',', '.') }}
                        </h3>
                        <small class="text-muted highest-market-food">{{ $highestMarket }} - {{ $highestFood }}
                            ({{ $highestMonth }})</small>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card text-center shadow-sm border-0">
                    <div class="card-body">
                        <h6 class="card-title">Harga Terendah</h6>
                        <h3 class="fw-bold text-danger lowest-price">Rp {{ number_format($lowestPrice, 0, ',', '.') }}</h3>
                        <small class="text-muted lowest-market-food">{{ $lowestMarket }} - {{ $lowestFood }}
                            ({{ $lowestMonth }})</small>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card text-center shadow-sm border-0">
                    <div class="card-body">
                        <h6 class="card-title">Jumlah Pasar</h6>
                        <h3 class="fw-bold text-warning">{{ $totalMarkets }}</h3>
                        <small class="text-muted">di Makassar</small>
                    </div>
                </div>
            </div>
        </div>


        <!-- Grafik dan Filter -->
        <div class="row mt-4">
            <!-- Filter Data -->
            <div class="col-md-4">
                <div class="card shadow-sm border-0 mb-3">
                    <div class="card-body bg-light">
                        <h6 class="card-header bg-dark text-center text-light fw-semibold mb-3">Filter Data</h6>
                        <div class="mb-2">
                            <label for="monthDropdown" class="form-label">Pilih Bulan:</label>
                            <select id="monthDropdown" class="form-select">
                                <option value="">Semua Bulan</option>
                                @for ($i = 1; $i <= 12; $i++)
                                    <option value="{{ str_pad($i, 2, '0', STR_PAD_LEFT) }}">
                                        {{ \Carbon\Carbon::create()->month($i)->translatedFormat('F') }}
                                    </option>
                                @endfor
                            </select>
                        </div>
                        <div class="mb-2">
                            <label for="foodDropdown" class="form-label">Pilih Jenis Pangan:</label>
                            <select id="foodDropdown" class="form-select">
                                <option value="">Semua Jenis Pangan</option>
                                @foreach ($foodTypes as $foodType)
                                    <option value="{{ $foodType->name }}">{{ $foodType->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-2">
                            <label for="marketDropdown" class="form-label">Pilih Pasar:</label>
                            <select id="marketDropdown" class="form-select">
                                <option value="">Semua Pasar</option>
                                @foreach ($markets as $market)
                                    <option value="{{ $market->name }}">{{ $market->name }}</option>
                                @endforeach
                            </select>
                        </div>


                        <div id="marketCheckbox" class="row mb-1 mt-2">
                            <label for="marketDropdown" class="form-label">Pilih Pasar:</label>
                            @foreach ($markets as $market)
                                <div class="col-12 col-md-8 mb-2">
                                    <label class="d-flex align-items-center">
                                        <input type="checkbox" class="market-checkbox" value="{{ $market->name }}">
                                        <span class="ms-2">{{ $market->name }}</span>
                                        <!-- Memberi jarak antara checkbox dan nama pasar -->
                                    </label>
                                </div>
                            @endforeach
                        </div>


                        <div class="mb-2">
                            <label for="yearDropdown" class="form-label">Pilih Tahun:</label>
                            <select id="yearDropdown" class="form-select">
                                @foreach ($years as $year)
                                    <option value="{{ $year }}" {{ $year == date('Y') ? 'selected' : '' }}>
                                        {{ $year }}</option>
                                @endforeach
                            </select>
                        </div>

                        <button id="monthlyComparison" class="btn btn-primary w-100 mt-3">Tampilkan Perbandingan
                            Bulanan</button>
                    </div>

                </div>

                <div class="card shadow-sm border-0">
                    <div class="card-body bg-light">
                        <h6 class="card-header bg-dark text-center text-light fw-semibold mb-2">Data Pangan</h6>
                        <div class="mb-2">
                            <label for="ExportmonthDropdown" class="form-label">Pilih Bulan:</label>
                            <select id="ExportmonthDropdown" class="form-select">
                                <option value="">Semua Bulan</option>
                                @foreach (range(1, 12) as $month)
                                    <option value="{{ $month }}" {{ $month == date('n') ? 'selected' : '' }}>
                                        {{ DateTime::createFromFormat('!m', $month)->format('F') }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <button id="exportData" class="btn btn-primary w-100 mt-1">Export
                            Data</button>
                    </div>
                </div>
            </div>

            <!-- Grafik -->
            <div class="col-md-8">
                <div class="card shadow-sm border-0">
                    <div class="card-body">
                        {{-- <h6 class="fw-semibold mb-3">Grafik Harga Pangan</h6> --}}
                        <div id="container" style="height: 570px;"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Highcharts -->
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>

    <script>
        const originalData = @json($chartData);
        const allDates = [...new Set(originalData.map(item => item.date))].sort();
        const colors = ['#7cb5ec', '#434348', '#90ed7d', '#f7a35c', '#8085e9', '#f15c80', '#e4d354', '#2b908f', '#f45b5b',
            '#91e8e1'
        ];
        let colorIndex = 0;

        let chart = Highcharts.chart('container', {
            chart: {
                type: 'line',
                backgroundColor: '#ffffff',
                scrollablePlotArea: {
                    minWidth: 600
                }
            },
            title: {
                text: 'Harga Pangan Berdasarkan Jenis Pangan dan Pasar',
                style: {
                    fontWeight: 'bold',
                    color: '#333'
                }
            },
            xAxis: {
                categories: allDates,
                title: {
                    text: 'Tanggal',
                    style: {
                        fontWeight: 'bold'
                    }
                }
            },
            yAxis: {
                title: {
                    text: 'Harga (Rp)',
                    style: {
                        fontWeight: 'bold'
                    }
                },
                labels: {
                    format: '{value:,.0f}'
                },
                gridLineWidth: 0,
                gridLineColor: '#e0e0e0'
            },
            plotOptions: {
                series: {
                    marker: {
                        enabled: true,
                        radius: 3,
                        symbol: 'circle'
                    },
                    connectNulls: true
                }
            },
            legend: {
                enabled: true
            },
            credits: {
                enabled: false
            },
            series: [],
            responsive: {
                rules: [{
                    condition: {
                        maxWidth: 500
                    },
                    chartOptions: {
                        xAxis: {
                            labels: {
                                rotation: -45
                            }
                        }
                    }
                }]
            }
        });

        document.getElementById('foodDropdown').addEventListener('change', updateChart);
        document.getElementById('marketDropdown').addEventListener('change', updateChart);
        document.getElementById('monthDropdown').addEventListener('change', updateChart);

        // Fungsi untuk memperbarui grafik
        function updateChart() {
            // Ambil data dari dropdown dan checkbox
            const selectedFood = document.getElementById('foodDropdown').value || ''; // Pilihan default: semua jenis pangan
            const selectedMarkets = Array.from(document.querySelectorAll('.market-checkbox:checked'))
                .map(checkbox => checkbox.value); // Ambil pasar yang dipilih
            const selectedMonth = document.getElementById('monthDropdown').value || ''; // Pilihan default: semua bulan

            // Filter data berdasarkan dropdown dan checkbox
            let filteredData = originalData.filter(item => {
                const itemDate = new Date(item.date);
                const itemMonth = itemDate.getMonth() + 1;
                return (
                    (selectedFood === '' || item.name === selectedFood) && // Filter berdasarkan jenis pangan
                    (selectedMarkets.length === 0 || selectedMarkets.includes(item.market)) && // Filter pasar
                    (selectedMonth === '' || itemMonth === parseInt(selectedMonth)) && // Filter bulan
                    item.price !== null // Pastikan harga tidak null
                );
            });

            // Periksa apakah ada filter yang diterapkan
            const isFilterApplied =
                selectedFood !== '' || selectedMarkets.length > 0 || selectedMonth !== '';

            // Jika tidak ada filter, ambil hanya 6 data terbaru
            if (!isFilterApplied) {
                filteredData = originalData
                    .sort((a, b) => new Date(b.date) - new Date(a.date)) // Urutkan dari terbaru ke terlama
                    .slice(0, 6); // Ambil 6 data terbaru
            }

            // Ambil tanggal unik dari data yang ditampilkan
            const displayedDates = [...new Set(filteredData.map(item => item.date))].sort();

            // Update kategori X-Axis
            chart.xAxis[0].setCategories(displayedDates);

            const seriesData = {};

            // Kelompokkan data berdasarkan jenis pangan dan pasar
            filteredData.forEach(item => {
                const seriesKey = `${item.name} - ${item.market}`;
                if (!seriesData[seriesKey]) {
                    seriesData[seriesKey] = {
                        name: seriesKey,
                        data: Array(displayedDates.length).fill(null),
                        color: colors[colorIndex++ % colors.length]
                    };
                }
                const index = displayedDates.indexOf(item.date);
                if (index !== -1) {
                    seriesData[seriesKey].data[index] = item.price;
                }
            });

            // Hapus semua series dari chart sebelum menambahkan yang baru
            while (chart.series.length > 0) {
                chart.series[0].remove(false);
            }

            // Tambahkan seri ke grafik untuk setiap pasar yang dipilih
            Object.values(seriesData).forEach(series => {
                chart.addSeries(series);
            });

            // Redraw chart
            chart.redraw();
        }

        // Tambahkan event listener ke checkbox dan dropdown
        document.querySelectorAll('.market-checkbox').forEach(checkbox => {
            checkbox.addEventListener('change', updateChart);
        });

        document.getElementById('foodDropdown').addEventListener('change', updateChart);
        document.getElementById('monthDropdown').addEventListener('change', updateChart);

        // Panggil fungsi updateChart saat pertama kali halaman dimuat
        updateChart();


        document.getElementById('monthDropdown').addEventListener('change', function() {
            const selectedFood = document.getElementById('foodDropdown').value;
            const selectedMarket = document.getElementById('marketDropdown').value;
            const selectedMonth = this.value;
            const selectedYear = new Date().getFullYear();

            // Filter data berdasarkan jenis pangan, pasar, bulan, dan tahun
            const filteredData = originalData.filter(item => {
                const itemDate = new Date(item.date);
                return (
                    (selectedFood === '' || item.name === selectedFood) && // Filter jenis pangan
                    (selectedMarket === '' || item.market === selectedMarket) && // Filter pasar
                    itemDate.getFullYear() == selectedYear && // Filter tahun
                    (selectedMonth === '' || itemDate.getMonth() + 1 == selectedMonth) // Filter bulan
                );
            });

            // Menghitung harga tertinggi dan terendah
            let highestPrice = Math.max(...filteredData.map(item => {
                return typeof item.price === 'number' && !isNaN(item.price) ? item.price : -Infinity;
            }), 0);

            let lowestPrice = Math.min(...filteredData.map(item => {
                return typeof item.price === 'number' && !isNaN(item.price) ? item.price : Infinity;
            }), Infinity);


            if (highestPrice === -Infinity) highestPrice = 0;
            if (lowestPrice === Infinity) lowestPrice = 0;

            // Mencari pasar dan jenis pangan yang terkait dengan harga tertinggi dan terendah
            let highestMarket = '';
            let highestFood = '';
            let highestMonth = '';
            let lowestMarket = '';
            let lowestFood = '';
            let lowestMonth = '';

            filteredData.forEach(item => {
                if (item.price === highestPrice) {
                    highestMarket = item.market;
                    highestFood = item.name;
                    highestMonth = new Date(item.date).toLocaleString('default', {
                        month: 'long'
                    });
                }
                if (item.price === lowestPrice) {
                    lowestMarket = item.market;
                    lowestFood = item.name;
                    lowestMonth = new Date(item.date).toLocaleString('default', {
                        month: 'long'
                    });
                }
            });

            // Update harga tertinggi dan terendah di DOM
            document.querySelector('.highest-price').innerHTML = `Rp ${number_format(highestPrice, 0, ',', '.')}`;
            document.querySelector('.highest-market-food').innerHTML =
                `${highestMarket} - ${highestFood} (${highestMonth})`;

            document.querySelector('.lowest-price').innerHTML = `Rp ${number_format(lowestPrice, 0, ',', '.')}`;
            document.querySelector('.lowest-market-food').innerHTML =
                `${lowestMarket} - ${lowestFood} (${lowestMonth})`;

            // Update grafik
            updateChart(filteredData); // Fungsi updateChart untuk memperbarui grafik

        });

        function number_format(number, decimals, dec_point, thousands_sep) {
            var n = number,
                c = isNaN(decimals = Math.abs(decimals)) ? 2 : decimals,
                d = dec_point || ',',
                t = thousands_sep || '.',
                s = n < 0 ? '-' : '',
                i = parseInt(n = Math.abs(+n || 0).toFixed(c)) + '',
                j = (j = i.length) > 3 ? j % 3 : 0;
            return s + (j ? i.substr(0, j) + t : '') + i.substr(j).replace(/(\d{3})(?=\d)/g, '$1' + t) + (c ? d + Math.abs(
                n - i).toFixed(c).slice(2) : '');
        }


        document.getElementById('monthlyComparison').addEventListener('click', function() {
            const selectedYear = document.getElementById('yearDropdown').value;
            const selectedFood = document.getElementById('foodDropdown').value;
            const selectedMarket = document.getElementById('marketDropdown').value;

            const filteredData = originalData.filter(item => {
                const itemYear = new Date(item.date).getFullYear();
                return (
                    itemYear == selectedYear &&
                    (selectedFood === '' || item.name === selectedFood) &&
                    (selectedMarket === '' || item.market === selectedMarket)
                );
            });

            const monthlyData = {};
            filteredData.forEach(item => {
                const month = new Date(item.date).getMonth();
                if (!monthlyData[item.name]) {
                    monthlyData[item.name] = Array(12).fill(null).map(() => ({
                        total: 0,
                        count: 0,
                    }));
                }
                monthlyData[item.name][month].total += item.price;
                monthlyData[item.name][month].count += 1;
            });

            const seriesData = [];
            Object.keys(monthlyData).forEach(food => {
                const averages = monthlyData[food].map(month =>
                    month.count > 0 ? parseFloat((month.total / month.count).toFixed(2)) : null
                );
                if (averages.some(value => value !== null)) {
                    seriesData.push({
                        name: food,
                        data: averages,
                        color: colors[colorIndex++ % colors.length],
                    });
                }
            });

            chart.xAxis[0].setCategories(['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct',
                'Nov', 'Dec'
            ]);
            while (chart.series.length > 0) {
                chart.series[0].remove(false);
            }
            seriesData.forEach(series => chart.addSeries(series, false));

            if (seriesData.length === 0) {
                chart.addSeries({
                    name: 'Tidak ada data',
                    data: Array(12).fill(null),
                    color: '#f15c80',
                    dashStyle: 'ShortDashDotDot',
                });
            }

            chart.redraw();
        });

        document.getElementById('ExportmonthDropdown').addEventListener('change', function() {
            const selectedMonth = this.value;
            const exportButton = document.getElementById('exportData');
        });


        // Tombol export data
        document.getElementById('exportData').addEventListener('click', function() {
            const selectedMonth = document.getElementById('ExportmonthDropdown').value;
            const selectedFood = document.getElementById('foodDropdown').value;
            const selectedMarket = document.getElementById('marketDropdown').value;

            // Filter data untuk export
            const filteredData = originalData.filter(item =>
                (selectedFood === '' || item.name === selectedFood) &&
                (selectedMarket === '' || item.market === selectedMarket) &&
                (selectedMonth === '' || new Date(item.date).getMonth() + 1 == selectedMonth) &&
                item.price !== null
            );

            if (filteredData.length === 0) {
                alert('Tidak ada data yang sesuai untuk diekspor.');
            } else {
                const url = `/export-data?month=${selectedMonth}&food=${selectedFood}&market=${selectedMarket}`;
                window.location.href = url;
            }
        });

        // Load chart pertama kali
        updateChart();
    </script>
@endsection
