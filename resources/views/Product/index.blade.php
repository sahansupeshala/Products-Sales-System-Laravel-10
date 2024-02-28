@extends('Layouts.navbar')

@section('content')
<div class="container" >

    <div class="row">
        <h2 style="text-align:center;font-weight:bold">Create Product</h2>
    </div>
    <div class="card bg-light" style="width:60rem;margin:auto">
    <form method="POST"  class="row g-3" action="{{route('products.store')}}">
        {{csrf_field()}}
        <div class="row" style="margin-top:5%">
            <div class="col-md-6">
                <label><b>PRODUCT NAME</b></label>
                <input class="form-control" name="name" id="name" placeholder="Enter the name">
            </div>
            <div class="col-md-6">
                <label><b>PRODUCT CODE</b></label>
                <input class="form-control" name="code" id="code" placeholder="Enter the product code">
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <label><b>PRICE</b></label>
                <input class="form-control" name="price" id="price" placeholder="Enter the price">
            </div>
            <div class="col-md-6">
                <label><b>EXPIRY DATE</b></label>
                <input type="date" class="form-control" name="expiry_date" id="expiry_date" placeholder="Enter the date">
            </div>
        </div>
        <div class="row" Style="margin:2%">
            <div class="col" Style="margin-left:40%" >
                <button data-bs-toggle="modal" data-bs-target="#clear" class="btn btn-danger" type="reset" style="margin-top:5%;">Clear</button>
            </div>
            <div class="col" Style="margin-right:40%">
                <button data-bs-toggle="modal" data-bs-target="#save" class="btn btn-success" type="button" style="margin-top:5%;">Save</button>
            </div>
        </div>



        <div class="modal fade" style="font-family:poppins" id="save" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content bg-warning">
                    <div class="modal-header">
                        <!-- <h5 id="h4" class="modal-title" id="exampleModalLabel">Warning</h5> -->
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body text-danger text-center">
                        <h5>Are You Sure ?</h5>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">No</button>
                        <button class="btn btn-success" type="submit" style="font-family: Poppins;border-width:0px;">Yes</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

    <div class="row">
        <h2 style="text-align:center;font-weight:bold">Products</h2>
    </div>
    <table class="table table-striped">
        <thead class="bg-dark text-white">
            <tr>
            <th scope="col">Code</th>
            <th scope="col">Name</th>
            <th scope="col">Price</th>
            <th scope="col">Expiry Date</th>
            <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @if($products)
            @foreach($products as $product)
            <tr>
            <td>{{$product->code}}</td>
            <td>{{$product->name}}</td>
            <td>{{$product->price}}</td>
            <td>{{$product->expiry_date}}</td>
            <td><a type="button" class="btn btn-primary" href="{{route('products.edit',$product->id)}}">Edit</a></td>
            </tr>
            @endforeach
            @else
            <tr></tr>
            @endif
        </tbody>
    </table>
</div>
@endsection
