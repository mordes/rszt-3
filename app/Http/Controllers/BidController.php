<?php

namespace App\Http\Controllers;

use App\Chat;
use App\Sales;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

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
            'endOfAuction' =>'required',
            'image' => ['required', 'image'],
        ]);

        $imagePath = request('image')->store('uploads', 'public');

        $image = Image::make(public_path("storage/{$imagePath}"))->fit(1200, 1200);
        $image->save();

        auth()->user()->sales()->create([
            'title' => $data['title'],
            'description' => $data['description'],
            'price' => $data['price'],
            'endOfAuction' =>$data['endOfAuction'],
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

    public function show(\App\Sales $sales)
    {
        $qcondition = ['sales_id' => $sales->id];
        $chats = Chat::where($qcondition)->orderBy('created_at', 'asc')->get();
        $data = array();
        array_push($data, $sales);
        array_push($data, $chats);
        return view('bids.show', compact('data'));
    }
}
