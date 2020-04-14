@extends('layouts.app')

<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://js.pusher.com/5.1/pusher.min.js"></script>
    <script src="{{ URL::asset('/js/countDown.js') }}"></script>
    <script>setEndDate({!! json_encode($data[0]->endOfAuction) !!});</script>
    <script>
        window.onload = function pusherInit() {
            Pusher.logToConsole = true;

            var pusher = new Pusher('46fe423c6390703589a8', {
                cluster: 'eu',
                forceTLS: true
            });

            var username = document.getElementById('username').innerHTML;
            var sales_id = document.getElementById('salesid').innerHTML;
            var bidder_id = document.getElementById('bidderid').innerHTML;
            var own_id = document.getElementById('userid').innerHTML;

            var channel = pusher.subscribe('my-channel');
            channel.bind('form-submitted', function (data) {
                var tipp = JSON.parse(JSON.stringify(data));
                document.getElementById('priceplace').innerHTML = tipp.text;
                bidder_id = tipp.bidder_id;
            });

            channel.bind('send-message', function (data) {
                var chatm = JSON.parse(JSON.stringify(data));
                if(sales_id == chatm.sales_id){
                    document.getElementById('realtimeplace').innerHTML = document.getElementById('realtimeplace').innerHTML +
                        '<div class="col-12 message"> <div class="d-flex align-items-lg-baseline"> <div class="pr-1" style="font-size: 15px; font-weight: bold;">' +
                        chatm.sender_username + ':</div> <div class="pl-1" style="font-size: 15px">' + chatm.text + '</div> </div> </div>';
                }
            });

            function chatColorChanger() {

            }

            var x = setInterval(function() {
                if(bidder_id != null && own_id != null && bidder_id == own_id){
                    $("#winningbid").show();
                }
                else{
                    $("#winningbid").hide();
                }

                if(own_id != null && document.getElementById('demo').innerText != 'Remaining time:\n' +
                    'The auction is over!\n' +
                    '(Day/Hour/Minute/Second)'){
                    $("#biddingform").show();
                }
                else{
                    $("#biddingform").hide();
                }
            }, 1000);
        }
    </script>

    <style>

        .message {
            border: 2px solid #dedede;
            background-color: #f1f1f1;
            border-radius: 5px;
            padding: 10px;
            margin: 1px 0;
        }

        .darker {
            border-color: #ccc;
            background-color: #ddd;
        }

        .message::after {
            content: "";
            clear: both;
            display: table;
        }

        .cucc {
            height: 90%;
        }

    </style>

</head>
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-8">
                <img src="/storage/{{ $data[0]->image }}" style="max-height: 650px">
            </div>
            <div class="col-4">
                <div>
                    <!--<h3>Owner: {{$data[0]->ownerUser()->username}}</h3>-->
                    <h3>Product name: {{$data[0]->title}}</h3>
                    <p>Description: {{$data[0]->description}}</p>
                    <div class="d-flex"><div class="pr-1">End of auction: </div><div id="endofauction"> {{$data[0]->endOfAuction}}</div></div>
                    <p id="demo"></p>
                </div>
                <div class="d-flex align-items-baseline "><div class="pr-2" style="font-size: 20px; ">Current Price:</div> <p id="priceplace" class="pr-1" style="font-size: 30px; font-style: initial">{{$data[0]->price}}</p><p> Credit</p></div>

                <hr class="pb-2">
                <div id="winningbid" style="display: none; font-size: 30px; color: green">Yours is the highest bid</div>
                <div id="userid" hidden>{{auth()->user()->id ?? ''}}</div>
                <div id="bidderid" hidden>{{$data[0]->buyer_id ?? ''}}</div>
                <div id="salesid" hidden>{{$data[0]->id ?? ''}}</div>
                <div id="username" hidden>{{auth()->user()->username ?? ''}}</div>

                <div id="biddingform" style="display: none">
                    <form action="/b/place/{{$data[0]->id}}" method="post">
                        @csrf
                        @method('PATCH')
                        <div class="form-group row pl-3">
                            <label for="price" class="col-form-label text-md-right">{{ __('Bid') }}</label>

                            <input id="price"
                                   type="number"
                                   class="form-control
                           @error('price') is-invalid @enderror"
                                   name="price"
                                   value="{{ old('price') }}"
                                   required autocomplete="price" autofocus>

                            @error('price')
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                            @enderror
                        </div>
                        <div class="row pt-4 pl-3">
                            <button class="btn btn-primary">Place Bid</button>
                        </div>
                    </form>
                </div>


            </div>
        </div>

        <div class="row pt-5 pb-2" style="font-size: 40px">
            Chat
        </div>
        <div class="row p-3">
            @foreach($data[1] as $oneChat)
                @if($oneChat->username == auth()->user()->username)
                    <div class="message col-12" style="background-color: #99e3ff; align-content: flex-end">
                @else
                    <div class="message col-12">
                @endif
                    <div class="d-flex align-items-lg-baseline">
                        <div class="pr-1" style="font-size: 15px; font-weight: bold;">
                            {{$oneChat->username}}:
                        </div>
                        <div class="pl-1" style="font-size: 15px">
                            {{$oneChat->message}}
                        </div>
                    </div>
                </div>
            @endforeach
            <div id="realtimeplace" class="col-12"></div>
        </div>
        <div class="row p-3">
            <form action="/b/{{$data[0]->id}}" method="post" class="d-flex">
                <div class="row pl-3">
                    <div ><input type="text" name="message" size="131" style="height: 40px; border-radius: 5px; background-color: #def6ff"></div>
                    <div ><button class="btn btn-primary" style="width: 240%">Send</button></div>
                </div>
                {{ csrf_field() }}
            </form>
        </div>

    </div>


@endsection

