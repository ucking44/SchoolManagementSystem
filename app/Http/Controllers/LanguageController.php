<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class LanguageController extends Controller
{
    public function languages($locale)
    {
        Session::put('locale', $locale);
        return Redirect::back();
    }
}
