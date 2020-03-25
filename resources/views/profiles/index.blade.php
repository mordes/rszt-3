@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-3 p-5">
            <img src="/svg/kep.svg" class="rounded-circle" style="height: 200px">
        </div>
        <div class="col-9 pt-5">
            <div class="d-flex justify-content-between align-items-baseline">
                <h1>{{ $user->username }}</h1>
                <a href="/s/create">Sell Product</a>
            </div>
            <div class="d-flex">
                <div class="pr-5"><strong>{{$user->sales->count()}}</strong> Sales</div>
                <div class="pr-5"><strong>0</strong> Won bids</div>
                <div class="pr-5"><strong>0</strong> Current bids</div>
            </div>
            <div class="pt-2">{{ $user->profile->description }}</div>
            <div><a href="#">{{ $user->profile->url}}</a></div>
        </div>
    </div>

        <div class="pb-3"><h1>Your Offers</h1></div>
        @foreach($user->sales as $sale)
            <div class="pb-2 pl-5">
                <div class="row-6 p-1" style="border: 1px solid #333; background-color: #cfd1d0">
                    <div class="d-flex justify-content-between" >
                        <div class="d-flex">
                            <img src="/storage/{{ $sale->image }}" class="w-100" style="max-height: 100px; max-width: 100px">
                            <div class="pt-1" style="font-style: italic">
                                <div class="pl-3"><h3>{{ $sale->title }}</h3></div>
                                <div class="pl-3">{{ $sale->description }}</div>
                            </div>
                        </div>
                        <div class="pl-3 pr-1 pt-1"><h3>{{ $sale->price }}</h3><div style="text-align: end">HUF</div></div>
                    </div>
                </div>
            </div>
        @endforeach

</div>
@endsection
