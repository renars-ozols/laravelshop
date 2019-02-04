@extends('layouts.default')

@section('content')
    <div class="container-fluid pt-5">
      <div class="row">
        <div class="col-md-6 mb-4 text-center">
          <img src="{{ env('AWS_URL').$product->image }}" alt="{{ $product->name }}" class="img-fluid">
        </div>

        <div class="col-md-6 mb-4">
          <div class="pr-4 pl-4">
            <p class="lead font-weight-bold">{{ $product->name }}</p>
            <hr>
            <p class="h3">
              <span class="badge badge-secondary">€ {{ $product->price }}</span>
            </p>
            <p class="lead font-weight-bold">Description</p>
            <p>{{ $product->description }}</p>

            <hr>

            <form action="{{ route('cart.add') }}" method="POST" class="d-flex justify-content-left">
              @csrf
              <div class="form-group">
                <input type="number" name="qty" value="1" aria-label="quantity" class="form-control{{ $errors->has('qty') ? ' is-invalid' : '' }} mr-2" style="width: 100px">

                @if ($errors->has('qty'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('qty') }}</strong>
                    </span>
                @endif

              </div>
              <input type="hidden" name="pdt_id" value="{{ $product->id }}">
              <div class="from-group">
                <button class="btn btn-primary btn-md my-0 p" type="submit">Add to cart
                  <i class="fa fa-cart-plus ml-1"></i>
                </button>
              </div>
            </form>

          </div>
        </div>
      </div>
    </div>
@endsection