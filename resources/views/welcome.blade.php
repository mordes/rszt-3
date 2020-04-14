<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div >
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/profile') . '/' . auth()->user()->id }}">Profile</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
        </div>

        <div class="content">
            <!--<div class="row-8">
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
                                    </div>
                                </div>
                                <div class="pl-3 pr-1 pt-1"><h3>{{ $sale['price'] }}</h3><div style="text-align: end">HUF</div></div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>-->

            <div class="col-12">
                <div class="row" style="background-color: black">
                    sdsadsddad
                </div>
            </div>







        </div>

    </body>
</html>
