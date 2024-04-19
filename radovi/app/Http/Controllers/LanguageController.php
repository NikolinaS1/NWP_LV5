<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

//LanguageController odgovoran je za postavljanje jezika aplikacije na temelju odabira korisnika
//u navigaciji postoji mogućnost odabira jezika (hrvatski/engleski)

class LanguageController extends Controller
{
    public function setLocale($lang)
    {
        if(in_array($lang, ['en', 'hr']))
        {
            App::setLocale($lang);
            Session::put('locale', $lang);
        }

        return redirect()->back();
    }
}