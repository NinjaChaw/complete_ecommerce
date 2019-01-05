@extends('layouts.app')

@section('content')
    <div class="row">
        <h1>All products</h1>
        <div>
            @if(count($products) < 1)
                <h3>No products</h3>
            @else
                <table class="table table-striped table-responsive">
                    <thead>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Image</th>
                        <th>Price</th>
                        <th>Description</th>
                        <th>Created date</th>
                        <th>Updated date</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </thead>
                    <tbody>
                        @foreach($products as $product)
                            <tr>
                                <td>{{$product->id}}</td>
                                <td>{{$product->name}}</td>
                                <td><img height="60px" width="100px" src="{{asset('/images/'.$product->photo)}}" alt=""></td>
                                <td>{{$product->price}}</td>
                                <td>{{str_limit($product->description, 100)}}</td>
                                <td>{{$product->created_at->diffForHumans()}}</td>
                                <td>{{$product->updated_at->diffForHumans()}}</td>
                                <td><a href="{{route('products.edit', $product->id)}}" class="btn btn-info btn-xs">Edit</a></td>
                                <td>
                                    <form action="{{route('products.destroy', $product->id)}}" method="post">
                                        {{csrf_field()}}
                                        {{method_field('DELETE')}}
                                        <button type="submit" class="btn btn-danger btn-xs">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
@endsection