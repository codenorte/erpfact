<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Redirect;
use App\Models\Language;

//return response()->json(array('data'=>$objeto),200);
class LanguageController extends Controller
{
    public function switchLanguage($locale)
    {
        //return response()->json(array('data'=>$locale),200);
        //return time() + (86400 * 365);
        //setcookie('language', $locale, time() + (86400 * 365), "/");
    	setcookie('language', $locale);
        $language = Language::firstOrNew(['id' => 1]);
        $language->code = $locale;
        $language->save();
    	return Redirect::back();
    }

    public function cambiarIdioma()
    {

        if(!isset($_COOKIE["language"])) {
            //echo "Cookie named '" . $cookie_name . "' is not set!";
            $language = Language::firstOrNew(['id' => 1]);
            $language->code = 'es';
            $language->save();
            setcookie('language', "es");
        } else {
            setcookie('language', 'es');

        }

        //$language = Language::firstOrNew(['id' => 1]);
        //$language->code = $locale;
        //return response()->json(array('data'=>$obtener),200);
    }
}
