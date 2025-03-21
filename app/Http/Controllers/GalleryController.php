<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GalleryController extends Controller
{
    public function create(){
        return view('gallery.create');
    }

    public function store(Request $request)
    {

        try {
            $this->validate($request, [
                'title' =>  'required',
                'cover' => 'required',
                'description' => 'required'
            ]);

            $gallery = new Gallery;
            $gallery->title = $request->title;
            $gallery->description = $request->description;
            $gallery->user_id = Auth::user()->id;

            $cover = $request->file('cover');
            $cover_ext = $cover->getClientOriginalExtension();
            $cover_name = rand(123456, 999999) . '.' . $cover_ext;
            $cover_path = public_path('galleries/');
            $cover->move($cover_path, $cover_name);

            $gallery->cover = $cover_name;
            $gallery->save();

           return redirect()->route('gallery.create');
        } catch (Exception $e) {
            $e->getMessage();
        }





    }
}
