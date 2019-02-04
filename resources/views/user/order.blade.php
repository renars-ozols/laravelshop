@extends('layouts.dashboard')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th>Item Id</th>
                                    <th>Order Id</th>
                                    <th>Product Id</th>
                                    <th>Name</th>
                                    <th>Quantity</th>
                                    <th>Price</th>
                                    <th>Product Total</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($order->items as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->order_id }}</td>
                                        <td>{{ $item->product_id }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->qty }}</td>
                                        <td>{{ $item->price }}</td>
                                        <td>{{ $item->price * $item->qty }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer text-center">
                        <h4>Order Total(inc.shipping): € {{ $order->total }}</h4>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-4 mb-4">
            <div class="col-sm-12 text-center">
                <h2 class="font-weight-bold">Shipping details:</h2>
            </div>
        </div>
        <div class="row mb-2">
            <div class="col-sm-3">
                <h4 class="font-weight-bold">Name:</h4>
            </div>
            <div class="col-sm-9">
                <h4>{{ $order->name }}</h4>
            </div>
        </div>
        <div class="row mb-2">
            <div class="col-sm-3">
                <h4 class="font-weight-bold">Surname:</h4>
            </div>
            <div class="col-sm-9">
                <h4>{{ $order->surname }}</h4>
            </div>
        </div>
        <div class="row mb-2">
            <div class="col-sm-3">
                <h4 class="font-weight-bold">Email:</h4>
            </div>
            <div class="col-sm-9">
                <h4>{{ $order->email }}</h4>
            </div>
        </div>
        <div class="row mb-2">
            <div class="col-sm-3">
                <h4 class="font-weight-bold">Address:</h4>
            </div>
            <div class="col-sm-9">
                <h4>{{ $order->address }}</h4>
            </div>
        </div>
        <div class="row mb-2">
            <div class="col-sm-3">
                <h4 class="font-weight-bold">Country:</h4>
            </div>
            <div class="col-sm-9">
                <h4>{{ $order->country }}</h4>
            </div>
        </div>
        <div class="row mb-2">
            <div class="col-sm-3">
                <h4 class="font-weight-bold">County:</h4>
            </div>
            <div class="col-sm-9">
                <h4>{{ $order->county }}</h4>
            </div>
        </div>
        <div class="row mb-2">
            <div class="col-sm-3">
                <h4 class="font-weight-bold">City:</h4>
            </div>
            <div class="col-sm-9">
                <h4>{{ $order->city }}</h4>
            </div>
        </div>
    </div>
@endsection
