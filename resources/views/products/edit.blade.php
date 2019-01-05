@extends('layouts.app')

@section('content')
    <div class="row">
        <h1>Modify product</h1>
        <br>

        <div class="col-md-8 col-md-offset-2">
            <form action="{{route('products.update', $product->id)}}" method="POST" enctype="multipart/form-data">
                {{csrf_field()}}
                {{method_field('PUT')}}
                <div class="form-group">
                    <label for="name">Product name:</label>
                    <input type="text" name="name" value="{{$product->name}}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="photo">Photo:</label>
                    <input type="file" name="photo">
                </div>
                <div class="form-group">
                    <label for="price">Select price:</label>
                    <input type="number" name="price" value="{{$product->price}}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="description">Write description:</label>
                    <textarea name="description" id="description" cols="30" rows="5" class="form-control">{{$product->description}}</textarea>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success col-md-6 col-md-offset-3">Update</button>
                </div>
            </form>
        </div>
    </div>
@endsection