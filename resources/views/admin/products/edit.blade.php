@extends('layouts.dashboard')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header bg-light text-center">
                        Product Edit
                    </div>

                    <div class="card-body">
                        <form action="{{ route('products.update', ['id' => $product->id]) }}" method="POST" enctype="multipart/form-data">
                            @method('PUT')
                            @csrf
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="Name" name="name" value="{{ old('name', $product->name) }}">

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Select Category</label>
                                <select name="category_id" class="form-control {{ $errors->has('category_id') ? ' is-invalid' : '' }}">
                                    @php                                  
                                    if(old('category_id') !== null){
                                        $option = old('category_id'); 
                                    }
                                    else{ $option = $product->category_id; }
                                    @endphp
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}" {{ $option == $category->id ? "selected":"" }}>{{ $category->name }}</option> 
                                    @endforeach
                                </select>

                                @if ($errors->has('category_id'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('category_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <img src="{{ env('AWS_URL').$product->image }}" alt="" height="50" width="50">
                            <div class="form-group">
                                <label>Image</label>
                                <input type="file" name="image" class="form-control-file {{ $errors->has('image') ? ' is-invalid' : '' }}">

                                @if ($errors->has('image'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('image') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Price</label>
                                <input type="number" step="0.01" name="price" class="form-control {{ $errors->has('price') ? ' is-invalid' : '' }}" value="{{ old('price', $product->price) }}">

                                @if ($errors->has('price'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('price') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Description</label>
                                <textarea class="form-control {{ $errors->has('description') ? ' is-invalid' : '' }}" name="description" rows="6">{{ old('description', $product->description) }}</textarea>

                                @if ($errors->has('description'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">Edit Product</button>
                            </div>
                        </form>   
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
