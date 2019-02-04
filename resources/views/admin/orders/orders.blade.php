@extends('layouts.dashboard')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header text-center">
                        <h1>All Orders</h1>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th>Order Id</th>
                                    <th>User Id</th>
                                    <th>Name</th>
                                    <th>Surname</th>
                                    <th>Email</th>
                                    <th>View</th>
                                    <th>Status</th>
                                    <th>Total</th>
                                    <th>Date / Time</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($orders as $order)
                                    <tr>
                                        <td>{{ $order->id }}</td>
                                        <td>{{ $order->user_id }}</td>
                                        <td>{{ $order->name }}</td>
                                        <td>{{ $order->surname }}</td>
                                        <td>{{ $order->email }}</td>
                                        <td><a href="{{ route('orders.show', ['id' => $order->id]) }}" class="btn btn-sm btn-info"><i class="fa fa-eye"></i></a></td>
                                        @if (!$order->shipped)
                                            <td><button class="btn btn-sm btn-danger" disabled>pending..</button></td>
                                        @else
                                            <td><button class="btn btn-sm btn-success" disabled>delivered</button></td>
                                        @endif
                                        <td>€ {{ $order->total }}</td>
                                        <td>{{ $order->created_at }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
