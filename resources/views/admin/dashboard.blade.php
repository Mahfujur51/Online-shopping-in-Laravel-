@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-info">
                    <div class="text-center">
                        Product Table
                    </div>
                </div>
                <div class="mt-3 mb-3">
                    <div class="text-center">
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#addproduct">
                            Add Product
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-hover">
                        <tr>
                            <th>Sl</th>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                        @foreach ($products as $key=>$product)
                        {{-- expr --}}
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$product->title}}</td>
                            <td>{{$product->price}}</td>
                            <td>
                                <img src="{{asset($product->image)}}" alt="" height="100" width="100">
                            </td>
                            <td>
                                <button  class="btn btn-success" data-toggle="modal" data-target="#edit-{{$product->id}}">Edit</button>
                                <button class="btn btn-danger" data-toggle="modal" data-target="#delete-{{$product->id}}">Delete</button>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                </div>
                <div class="card-footer">
                    <div class="text-center">{{$products->links()}}</div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Product Add Model -->
<div class="modal fade" id="addproduct" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Add Product</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <form action="{{ route('product.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-gorup">
                        <label for="">Product Name:</label>
                        <input type="text" name="title" class="form-control">
                    </div>
                    <div class="form-gorup">
                        <label for="">Product price:</label>
                        <input type="number" name="price" class="form-control">
                    </div>
                    <div class="form-gorup">
                        <label for="">Description</label>
                        <textarea name="description" class="form-control" id="" cols="30" rows="10"></textarea>
                    </div>
                    <div class="form-gorup">
                        <label for="">Image:</label>
                        <input type="file" name="image" class="form-control">
                    </div>
                    <div class="form-group">
                        <div class="text-center mt-4">
                            <input type="submit" class="btn btn-success" value="Add Product">
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- Delete Model -->
@foreach ($products as $product)
{{-- expr --}}
<div class="modal fade" id="delete-{{$product->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{$product->title}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <a href="{{ route('product.delete',$product->id) }}" class="btn btn-success">Delete</a>
            </div>
        </div>
    </div>
</div>
@endforeach
@foreach ($products as $product)
{{-- expr --}}
<!-- Product Add Model -->
<div class="modal fade" id="edit-{{$product->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Update Product</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <form action="{{ route('product.update',$product->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-gorup">
                        <label for="">Odl Image</label>
                        <img src="{{asset($product->image)}}" alt="" height="200" width="150">
                    </div>
                    <div class="form-gorup">
                        <label for="">Product Name:</label>
                        <input type="text" name="title" value="{{$product->title}}" class="form-control">
                    </div>
                    <div class="form-gorup">
                        <label for="">Product price:</label>
                        <input type="number" name="price" value="{{$product->price}}" class="form-control">
                    </div>
                    <div class="form-gorup">
                        <label for="">Description</label>
                        <textarea name="description" class="form-control" id="" cols="30" rows="10">{{$product->description}}</textarea>
                    </div>
                    <div class="form-gorup">
                        <label for="">Image:</label>
                        <input type="file" name="image" class="form-control">
                    </div>
                    <div class="form-group">
                        <div class="text-center mt-4">
                            <input type="submit" class="btn btn-success" value="Add Product">
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@endforeach
@endsection
