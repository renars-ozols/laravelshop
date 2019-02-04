@extends('layouts.default')

@section('content')
    <div class="container-fluid">
        <h1 class="display-5 text-center pt-4 pb-4">{{ $category->name }}</h1>
        @foreach ($products->chunk(3) as $items)
            <div class="row">
                @foreach ($items as $item)
                    <div class="col-md-4">
                        <div class="card mb-5">
                            <a href="{{ route('product', ['cat_slug' => $item->category->slug ,'prod_slug' => $item->slug]) }}" class="nounderline">
                                <img class="card-img-top" src="{{ env('AWS_URL').$item->image }}" alt="{{ $item->name }}">
                                <div class="card-body text-center pb-0">
                                    <h5 class="card-title text-dark">{{ $item->name }}</h5>
                                </div>
                            </a>
                            <div class="text-center pb-3">
                                <h5 class="card-title text-primary">€ {{ $item->price }}</h5>
                                <a href="{{ Route('cart.rapid.add', ['id' => $item->id]) }}" class="btn btn-primary">Add To Cart<i class="fa fa-cart-plus ml-1"></i></a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div> 
        @endforeach
        <div class="pagination justify-content-center">
            {{ $products->links() }}
        </div>
    </div>
@endsection
