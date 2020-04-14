<?php

namespace App\Http\Controllers;

use App\Bid;
use App\Events\ChatMessage;
use App\Events\FormSubmitted;
use App\Sales;
use App\User;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class PlaceBidController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function placeBid(\App\Sales $sales){
        $data = request()->validate([
            'price' => 'required',
        ]);

        $sale = Sales::find($sales);
        $sale = $sale[0];

        if ($data['price'] > $sale->price){

        }

        dd($sale->price);die;
    }

    public function update(Sales $sales)
    {
        $data = request()->validate([
            'price' => 'required',
        ]);

        //dd((int)$data['price'], $sales->price); die;

        $sale = Sales::find($sales);
        $sale = $sale[0];

        if ($data['price'] > $sales->price){
            $sales->update(array_merge(
                ['price' => (int)$data['price']],
                ['buyer_id' => auth()->user()->id]
            ));

            $qcondition = ['user_id' => auth()->user()->id, 'sales_id' => $sales->id];
            $bid = Bid::where($qcondition)->get();

            if (sizeof($bid) == 0){
                auth()->user()->bid()->create([
                    'user_id' => auth()->user()->id,
                    'sales_id' => $sales->id,
                ]);
            }

            event(new FormSubmitted($data['price'], auth()->user()->id));
        }

        return redirect("b/{$sales->id}");
    }

    public function sendMessage(Sales $sales){

        $data = request()->validate([
            'message' => 'required',
        ]);

        $sales->chat()->create([
            'username' => auth()->user()->username,
            'message' => $data['message'],
            'sales_id' => $sales->id,
        ]);

        event(new ChatMessage($data['message'], auth()->user()->username, $sales->id));

        return redirect("b/{$sales->id}");
    }
}
