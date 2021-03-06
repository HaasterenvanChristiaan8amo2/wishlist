<?php

namespace App\Http\Controllers;

use App\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class BeheerController extends Controller
{
    public function index(){
        return view('wishCreate');
    }

    public function createListItem(Request $request){

        try {
            $this->validate($request, [
                'naam' => ['required', 'string', 'max:255'],
                'beschrijving' => ['required', 'string'],
                'prijs' => ['required', 'string', 'max:255'],
                'link' => ['required', 'string'],
                'plaatje' => ['required', 'image', 'mimes:jpeg,png,jpg,gif,svg'],
            ]);
        } catch (ValidationException $e) {
            echo $e;
        }

        // handle file upload
        if($request->hasFile('plaatje')) {
            // get file name with ext
            $filenameWithExt = $request->file('plaatje')->getClientOriginalName();
            // seperate filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('plaatje')->getClientOriginalExtension();
            // create file 2 store
            $userUpload = $filename.'_'.time().'.'.$extension;
            // upload image
            $path = $request->file('plaatje')->move('images', $userUpload);
        } else {
            $userUpload = 'noImage.jpg';
        }

        $naam = $request->get('naam');
        $beschrijving = $request->get('beschrijving');
        $prijs = $request->get('prijs');
        $link = $request->get('link');

        // check if its an user
        if (Auth::user()) {
            // create the post
            $wishitem = new Wishlist();
            $wishitem->userid = Auth::user()->id;
            $wishitem->username = Auth::user()->name;
            $wishitem->naam = $naam;
            $wishitem->beschrijving = $beschrijving;
            $wishitem->prijs = $prijs;
            $wishitem->link = $link;
            $wishitem->plaatje = $userUpload;

            $wishitem->save();
            return redirect('/wishlist');
        } else {
            return redirect('/login');
        }

    }
}
