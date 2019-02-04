@extends('layouts.default')

@section('content')
    @if (Cart::content()->count() > 0)
        <h1 class="text-center pt-4 pb-4">In Your Shopping Cart:<span class="pl-1 text-success">{{ Cart::content()->count() }} items</span></h1>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col"> </th>
                                    <th scope="col">Product</th>
                                    <th scope="col" class="text-center">Quantity</th>
                                    <th scope="col" class="text-right">Price</th>
                                    <th> </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach (Cart::content() as $pdt)
                                    <tr>
                                        <td><img src="{{ env('AWS_URL').$pdt->model->image }}" alt="{{ $pdt->name }}" style="width: 50px; height: 50px"/></td>
                                        <td>{{ $pdt->name }}</td>
                                        <td style="width: 120px;min-width: 120px;">
                                            <form action="{{ route('cart.update', ['id' => $pdt->rowId]) }}" method="POST">
                                                @csrf
                                                <div class="input-group">
                                                    <input class="form-control{{ $errors->has('qty') ? ' is-invalid' : '' }} form-control-sm" style="min-width: 40px;" type="number" name="qty" value="{{ $pdt->qty }}"/>
                                                    <div class="input-group-append">
                                                        <button type="submit" class="btn btn-sm btn-info"><i class="fa fa-sync"></i></button>
                                                    </div>

                                                    @if ($errors->has('qty'))
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $errors->first('qty') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </form>
                                        </td>
                                        <td class="text-right">€ {{ number_format($pdt->price,2,'.','') }}</td>
                                        <td class="text-right"><a href="{{ route('cart.delete', ['id' => $pdt->rowId]) }}" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a></td>
                                    </tr>
                                @endforeach
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>Shipping</td>
                                    <td class="text-right">€ {{ number_format(Shipping::total(),2,'.','') }}</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td><strong>Total</strong></td>
                                    <td class="text-right"><strong>€ {{ number_format(Cart::total() + Shipping::total(),2,'.','') }}</strong></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col mt-2">
                    <div class="row">
                        <div class="col-sm-12  col-md-6">
                            <a href="/" class="btn btn-lg btn-block btn-warning mb-2"><i class="fa fa-arrow-left mr-3"></i>Continue Shopping</a>
                        </div>
                        <div class="col-sm-12 col-md-6 text-right">
                            <a href="{{ Route('cart.checkout') }}" class="btn btn-lg btn-block btn-success text-uppercase">Checkout</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @else
       <div class="container text-center pt-5">
           <h1>Currently you have no items in your cart!</h1>
           <a href="{{ route('index') }}" class="btn btn-lg btn-warning mt-4"><i class="fa fa-arrow-left mr-3"></i>Continue Shopping</a> 
       </div>
    @endif
@endsection