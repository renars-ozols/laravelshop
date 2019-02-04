@extends('layouts.dashboard')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header text-center">
                        <h1>Orders</h1>
                    </div>

                    <div class="card-body">
                        @if ($orders->count() > 0)
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                    <tr>
                                        <th>Order Id</th>
                                        <th>Name</th>
                                        <th>Surname</th>
                                        <th>Email</th>
                                        <th>View</th>
                                        <th>Status</th>
                                        <th>Total</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($orders as $order)
                                        <tr>
                                            <td>{{ $order->id }}</td>
                                            <td>{{ $order->name }}</td>
                                            <td>{{ $order->surname }}</td>
                                            <td>{{ $order->email }}</td>
                                            <td><a href="{{ route('user.order', ['id' => $order->id]) }}" class="btn btn-sm btn-info"><i class="fa fa-eye"></i></a></td>
                                            @if (!$order->shipped)
                                                <td><button class="btn btn-sm btn-danger" disabled>pending..</button></td>
                                            @else
                                                <td><button class="btn btn-sm btn-success" disabled>delivered</button></td>
                                            @endif
                                            <td>{{ $order->total }}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @else
                           <div class="alert alert-info h3 text-center" role="alert">
                            You dont have any orders yet!
                            </div> 
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
