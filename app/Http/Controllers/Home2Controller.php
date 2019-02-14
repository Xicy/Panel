<?php

namespace App\Http\Controllers;

use Orbitali\Foundations\Orbitali;

class Home2Controller extends Controller
{
    public function sitemapDetails(Orbitali $orbitali)
    {
        dd($orbitali);
    }
}
