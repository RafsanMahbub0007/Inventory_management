@extends('backend.master')

@section('title')
Product List
@endsection

@section('content')
@if(session()->has('success'))
    <div class="alert alert-success">
        {{ session()->get('success') }}
    </div>
@endif
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#exampleModal">
    Add New Product
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Add New Product</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{route('product.add')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Name :</label>
                        <input type="text" name="p_name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        <span class="text-danger">@error('p_name') {{$message}} @enderror</span>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Product code :</label>
                        <input type="number" name="p_code" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        <span class="text-danger">@error('p_code') {{$message}} @enderror</span>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">In-stock</label>
                        <input type="number" class="form-control" name="p_stock" id="exampleInputEmail1" aria-describedby="emailHelp">
                        <span class="text-danger">@error('p_stock') {{$message}} @enderror</span>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">product image</label>
                        <input type="file" class="form-control" name="p_image" id="exampleInputEmail1" aria-describedby="emailHelp">
                        <span class="text-danger">@error('p_image') {{$message}} @enderror</span>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
            </form>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12 col-lg-12 col-sm-12">
        <div class="white-box">
            <div class="d-md-flex mb-3">
                <h3 class="box-title mb-0">Search Product</h3>
                <div class="col-md-3 col-sm-4 col-xs-6 ms-auto">
                    <input class="form-select shadow-none row border-top" type="search">
                </div>
            </div>
            <div class="table-responsive">
                <table class="table no-wrap">
                    <thead>
                        <tr class="text-center">
                            <th class="border-top-0">Serial no</th>
                            <th class="border-top-0">product image</th>
                            <th class="border-top-0">Product Name</th>
                            <th class="border-top-0">Product code</th>
                            <th class="border-top-0">In-stock</th>
                            <th class="border-top-0">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($products as $index=>$product)
                        <tr class="text-center mb-5">
                            <td>{{$index+1}}</td>
                            <td><img src="{{asset('uploads/products/'.$product->p_image)}}" alt="" srcset="" width="50" height="50" class="rounded-pill"></td>
                            <td class="txt-oflo">{{$product->p_name}}</td>
                            <td class="txt-oflo">{{$product->p_code}}</td>
                            <td class="txt-oflo">{{$product->p_stock}}</td>
                            <td>
                                <button>edit</button>
                                <button>restock</button>
                                <button>delete</button>
                            </td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
