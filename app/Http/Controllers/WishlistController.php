<?php

namespace App\Http\Controllers;

use App\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class WishlistController extends Controller
{
    public function index(){
        $WishItem = Wishlist::all();

        return view('wishlist', ['WishItem' => $WishItem]);
    }

    public function showListItem($id) {
        $WishItem = Wishlist::find($id);
        if (Auth::User()->id !== $WishItem->userid && !Auth::user()->admin){
            return redirect('/wishlist');
        }

        return view('wishEdit', ['Item' => $WishItem]);
    }

    public function editListItem(Request $request, $id) {
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
            $wishitem = Wishlist::where('id', $id)->first();
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

    public function deleteListItem($id) {
        $WishItem = Wishlist::find($id);
        if (Auth::User()->id !== $WishItem->userid && !Auth::user()->admin){
            return redirect('/wishlist');
        }

        Wishlist::find($id)->delete();

        return redirect('/wishlist');
    }

}
