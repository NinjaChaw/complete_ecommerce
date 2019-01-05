@extends('layouts.app')

@section('content')
    <div class="row">
        <h1>Create product</h1>
        <br>
        
        <div class="col-md-8 col-md-offset-2">
            <form action="{{route('products.store')}}" method="POST" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="form-group">
                    <label for="name">Product name:</label>
                    <input type="text" name="name" value="{{old('name')}}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="photo">Photo:</label>
                    <input type="file" name="photo">
                </div>
                <div class="form-group">
                    <label for="price">Select price:</label>
                    <input type="number" name="price" value="{{old('price')}}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="description">Write description:</label>
                    <textarea name="description" id="description" cols="30" rows="5" class="form-control">{{old('description')}}</textarea>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success col-md-6 col-md-offset-3">Create</button>
                </div>
            </form>
        </div>
    </div>
@endsection