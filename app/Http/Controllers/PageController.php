<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index(){
        return view('index');
    }

    public function error(Request $request) {
        $errorcode = $request->get('code');
        $errormessage = $request->get('message');

        return view('errors.error', ['code' => $errorcode, 'message' => $errormessage]);
    }
}
