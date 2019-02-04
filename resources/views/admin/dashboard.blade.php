@extends('layouts.dashboard')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3 pb-4">
                <div class="card p-4">
                    <div class="card-body d-flex justify-content-between align-items-center">
                        <div>
                            <span class="h4 d-block font-weight-normal mb-2">{{ \App\User::all()->count() }}</span>
                            <span class="font-weight-light">Total Users</span>
                        </div>

                        <div class="h2 text-muted">
                            <i class="fa fa-users"></i>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 pb-4">
                <div class="card p-4">
                    <div class="card-body d-flex justify-content-between align-items-center">
                        <div>
                            <span class="h4 d-block font-weight-normal mb-2">{{ \App\Product::all()->count() }}</span>
                            <span class="font-weight-light">Products</span>
                        </div>

                        <div class="h2 text-muted">
                            <i class="fa fa-th-list"></i>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 pb-4">
                <div class="card p-4">
                    <div class="card-body d-flex justify-content-between align-items-center">
                        <div>
                            <span class="h4 d-block font-weight-normal mb-2 text-danger">{{ \App\Order::where('shipped', false)->count() }}</span>
                            <span class="font-weight-light">Pending Orders</span>
                        </div>

                        <div class="h2 text-muted">
                            <i class="fa fa-clipboard-list"></i>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 pb-4">
                <div class="card p-4">
                    <div class="card-body d-flex justify-content-between align-items-center">
                        <div>
                            <span class="h4 d-block font-weight-normal mb-2">{{ \App\Order::count() }}</span>
                            <span class="font-weight-light">Total Orders</span>
                        </div>

                        <div class="h2 text-muted">
                            <i class="fa fa-clipboard-list"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row pt-5">
            <div class="col-md-12">
                <div class="alert alert-info text-center h4" role="alert">
                Here goes chart!
                </div>
            </div>
        </div>
    </div>
@endsection
