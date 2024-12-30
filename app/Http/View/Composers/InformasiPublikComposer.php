<?php

namespace App\Http\View\Composers;

use Illuminate\View\View;
use App\Models\InformasiPublik;

class InformasiPublikComposer
{
    public function compose(View $view)
    {
        $view->with('informasiPublik', InformasiPublik::all());
    }
}
