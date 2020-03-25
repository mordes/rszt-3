<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BidController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create(){
        return view('bids.create');
    }

    public function store(){

        $data = request()->validate([
            'title' => 'required',
            'description' => 'required',
            'price' => 'required',
            'image' => ['required', 'image'],
        ]);

        $imagePath = request('image')->store('uploads', 'public');

        auth()->user()->sales()->create([
            'title' => $data['title'],
            'description' => $data['description'],
            'price' => $data['price'],
            'image' => $imagePath,
        ]);

        /*$sales = new \App\Sales();
        $sales->user_id = auth()->user()->id;
        $sales->buyer_id = null;
        $sales->price = $data['price'];
        $sales->title = $data['title'];
        $sales->description = $data['description'];
        $sales->image = $data['image'];

        $sales->save();*/

        return redirect('/profile/' . auth()->user()->id);
    }
}
