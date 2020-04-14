@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="pb-3"><h1>Offer List</h1></div>
        @foreach($sales as $sale)
            <div class="pb-2 pl-5">
                <div class="row-6 p-1" style="border: 1px solid #333; background-color: #cfd1d0">
                    <div class="d-flex justify-content-between" >
                        <div class="d-flex">
                            <a href="/b/{{ $sale['id'] }}"><img src="/storage/{{ $sale['image'] }}" class="w-100" style="max-height: 100px; max-width: 100px"></a>
                            <div class="pt-1" style="font-style: italic">
                                <div class="pl-3"><h3>{{ $sale['title'] }}</h3></div>
                                <div class="pl-3">{{ $sale['description'] }}</div>
                                <div class="pl-3">{{ $sale['endOfAuction'] }}</div>
                            </div>
                        </div>
                        <div class="pl-3 pr-1 pt-1"><h3>{{ $sale['price'] }}</h3><div style="text-align: end">HUF</div></div>
                    </div>
                </div>
            </div>
        @endforeach

    </div>
@endsection
