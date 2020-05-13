@extends('layouts.app')

<head>
    <script>
        window.onload = function dinamicOffers() {
            if(document.getElementById('offer').innerText != 0){
                $("#youroffers").show();
            }
            if(document.getElementById('live').innerText != 0){
                $("#liveauction").show();
            }
            if(document.getElementById('won').innerText != 0){
                $("#wonbid").show();
            }
        }
    </script>
</head>

@section('content')
<div class="container">
    <div class="row">
        <div class="col-3 p-5">
            @if($data[0]->profile->image)
            <img src="/storage/{{$data[0]->profile->image}}" class="rounded-circle" style="height: 200px">
            @else
            <img src="/svg/kep.svg" class="rounded-circle" style="height: 200px">
            @endif
        </div>
        <div class="col-9 pt-5">
            <div class="d-flex justify-content-between align-items-baseline">
                <h1>{{ $data[0]->username }}</h1>
                @can('update', $data[0]->profile)
                <a href="/s/create">Sell Product</a>
                @endcan
            </div>
            @can('update', $data[0]->profile)
            <a href="/profile/{{$data[0]->id}}/edit">Edit Profile</a>
            @endcan
            <div class="d-flex">
                <div class="pr-5"><strong id="offer">{{$data[0]->sales->count()}}</strong> Sales</div>
                <div class="pr-5"><strong id="won">{{count($data[1])}}</strong> Won bids</div>
                <div class="pr-5"><strong id="live">{{count($data[2])}}</strong> Current bids</div>
            </div>
            <div class="pt-2">{{ $data[0]->profile->description }}</div>
            <div><a href="#">{{ $data[0]->profile->url}}</a></div>
        </div>
    </div>

    <div class="pb-3" id="youroffers" style="display: none;"><h1>Your Offers</h1></div>
    @foreach($data[4] as $sale)
        <div class="pb-2 pl-5">
            <div class="row-6 p-1" style="border: 1px solid #333; background-color: #cfd1d0">
                <div class="d-flex justify-content-between" >
                    <div class="d-flex">
                        <a href="/b/{{ $sale->id }}"><img src="/storage/{{ $sale->image }}" class="w-100" style="max-height: 100px; max-width: 100px"></a>
                        <div class="pt-1" style="font-style: italic">
                            <div class="pl-3"><h3>{{ $sale->title }}</h3></div>
                            <div class="pl-3">{{ $sale->description }}</div>
                            <div class="pl-3">{{ $sale->idToUsername() }}</div>
                        </div>
                    </div>
                    <div class="pl-3 pr-1 pt-1"><h3>{{ $sale->price }}</h3><div style="text-align: end">HUF</div></div>
                </div>
            </div>
        </div>
    @endforeach
    @foreach($data[3] as $sale)
        <div class="pb-2 pl-5">
            <div class="row-6 p-1" style="border: 1px solid #333; background-color: #3ae868">
                <div class="d-flex justify-content-between" >
                    <div class="d-flex">
                        <a href="/b/{{ $sale->id }}"><img src="/storage/{{ $sale->image }}" class="w-100" style="max-height: 100px; max-width: 100px"></a>
                        <div class="pt-1" style="font-style: italic">
                            <div class="pl-3"><h3>{{ $sale->title }}</h3></div>
                            <div class="pl-3">{{ $sale->description }}</div>
                            <div class="pl-3">{{ $sale->idToUsername() }}</div>
                        </div>
                    </div>
                    <div class="pl-3 pr-1 pt-1"><h3>{{ $sale->price }}</h3><div style="text-align: end">HUF</div></div>
                </div>
            </div>
        </div>
    @endforeach

    <div class="pb-3 pt-5" id="liveauction" style="display: none;"><h1>Live auctions where you placed bid</h1></div>
    @foreach($data[2] as $sale)
        <div class="pb-2 pl-5">
            <div class="row-6 p-1" style="border: 1px solid #333; background-color: #cfd1d0">
                <div class="d-flex justify-content-between" >
                    <div class="d-flex">
                        <a href="/b/{{ $sale->id }}"><img src="/storage/{{ $sale->image }}" class="w-100" style="max-height: 100px; max-width: 100px"></a>
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

    <div class="pb-3 pt-5" id="wonbid" style="display: none;"><h1>Won bids</h1></div>
    @foreach($data[1] as $sale)
        <div class="pb-2 pl-5">
            <div class="row-6 p-1" style="border: 1px solid #333; background-color: #cfd1d0">
                <div class="d-flex justify-content-between" >
                    <div class="d-flex">
                        <a href="/b/{{ $sale->id }}"><img src="/storage/{{ $sale->image }}" class="w-100" style="max-height: 100px; max-width: 100px"></a>
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
