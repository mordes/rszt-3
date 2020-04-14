@extends('layouts.app')

@section('content')
    <div class="container">
        <form action="/s" enctype="multipart/form-data" method="post">
            @csrf

            <div class="row">
                <div class="col-8 offset-2">

                    <div class="row">
                        <h1>Sell Product</h1>
                    </div>

                    <div class="form-group row">
                        <label for="title" class="col-form-label text-md-right">{{ __('Product Name') }}</label>

                        <input id="title"
                               type="text"
                               class="form-control
                           @error('title') is-invalid @enderror"
                               name="title"
                               value="{{ old('title') }}"
                               required autocomplete="title" autofocus>

                        @error('title')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror

                    </div>

                    <div class="form-group row">
                        <label for="description" class="col-form-label text-md-right">{{ __('Product Description') }}</label>

                        <input id="description"
                               type="text"
                               class="form-control
                           @error('description') is-invalid @enderror"
                               name="description"
                               value="{{ old('description') }}"
                               required autocomplete="description" autofocus>

                        @error('description')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror

                    </div>

                    <div class="form-group row">
                        <label for="price" class="col-form-label text-md-right">{{ __('Product Starting Bid') }}</label>

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

                    <div class="row">
                        <label for="endOfAuction" class="col-form-label text-md-right">{{ __('End of auction') }}</label>

                        <input id="endOfAuction"
                               type="datetime-local"
                               class="form-control-file
                           @error('endOfAuction') is-invalid @enderror"
                               name="endOfAuction"
                               value="{{ old('endOfAuction') }}"
                               autocomplete="endOfAuction" autofocus>

                        @error('endOfAuction')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="row">
                        <label for="image" class="col-form-label text-md-right">{{ __('Product Image') }}</label>

                        <input id="image"
                               type="file"
                               class="form-control-file
                           @error('image') is-invalid @enderror"
                               name="image"
                               value="{{ old('image') }}"
                               required autocomplete="image" autofocus>

                        @error('image')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="row pt-4">
                        <button class="btn btn-primary">Sell Product</button>
                    </div>

                </div>
            </div>
        </form>

    </div>
@endsection
