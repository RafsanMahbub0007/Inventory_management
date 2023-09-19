@extends('backend.master')

@section('title')
Customer List
@endsection

@section('content')
@if(session()->has('success'))
<div class="alert alert-success">
    {{ session()->get('success') }}
</div>
@endif
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#exampleModal">
    Add New Customer
</button>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Add New Customer</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{route('customer.add')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Name :</label>
                        <input type="text" name="cus_name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Phone :</label>
                        <input type="number" name="cus_phone" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Image</label>
                        <input type="file" class="form-control" name="cus_image" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">NID front side</label>
                        <input type="file" class="form-control" name="cus_n1_image" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">NID back side</label>
                        <input type="file" class="form-control" name="cus_n2_image" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Address :</label>
                        <textarea class="mx-5" name="cus_address" id="" cols="30" rows="3"></textarea>
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
                <h3 class="box-title mb-0">Search Customer</h3>
                <div class="col-md-3 col-sm-4 col-xs-6 ms-auto">
                    <input class="form-select shadow-none row border-top" type="search">
                </div>
            </div>
            <div class="table-responsive">
                <table class="table no-wrap">
                    <thead>
                        <tr class="text-center">
                            <th class="border-top-0">Serial no</th>
                            <th class="border-top-0">Customer Name</th>
                            <th class="border-top-0">Customer phone</th>
                            <th class="border-top-0">Customer Image</th>
                            <th class="border-top-0">Customer Address</th>
                            <th class="border-top-0">Customer Nid Image</th>
                            <th class="border-top-0">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($customers as $index=>$customer)
                        <tr>
                            <td>{{$index+1}}</td>
                            <td class="txt-oflo">{{$customer->cus_name}}</td>
                            <td>{{$customer->cus_phone}}</td>
                            <td class="txt-oflo"><img src="{{asset('uploads/customers/'.$customer->cus_image)}}" alt="" srcset="" width="50" height="50"></td>
                            <td><span>{{$customer->cus_address}}</span></td>
                            <td class="txt-oflo">
                                <img src="{{asset('uploads/customers/NID_FRONT/'.$customer->cus_n1_image)}}" alt="" srcset="" width="50" height="50">
                                <img src="{{asset('uploads/customers/NID_BACK/'.$customer->cus_n2_image)}}" alt="" srcset="" width="50" height="50">
                            </td>
                            <td>
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#exampleModal{{$customer->id}}">
                                    Edit
                                </button>
                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal{{$customer->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Customer</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{route('customer.add')}}" method="post" enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="mb-3">
                                                        <label for="exampleInputEmail1" class="form-label">Name :</label>
                                                        <input type="text" name="cus_name" value="{{$customer->cus_name}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="exampleInputEmail1" class="form-label">Phone :</label>
                                                        <input type="number" name="cus_phone" value="{{$customer->cus_phone}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="exampleInputEmail1" class="form-label">Image</label>
                                                        <input type="file" class="form-control" name="cus_image" value="{{$customer->cus_name}}" id="exampleInputEmail1" aria-describedby="emailHelp">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="exampleInputEmail1" class="form-label">NID front side</label>
                                                        <input type="file" class="form-control" name="cus_n1_image" id="exampleInputEmail1" aria-describedby="emailHelp">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="exampleInputEmail1" class="form-label">NID back side</label>
                                                        <input type="file" class="form-control" name="cus_n2_image" id="exampleInputEmail1" aria-describedby="emailHelp">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="exampleInputEmail1" class="form-label">Address :</label>
                                                        <textarea class="mx-5" name="cus_address" id="" cols="30" rows="3">{{$customer->cus_name}}</textarea>
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
