@extends('Layouts.navbar')

@section('content')
<div class="container">

    <div class="row">
        <h2 style="text-align:center;font-weight:bold">Edit Free Issues</h2>
    </div>
    <div class="card bg-light" style="width:70rem;margin:auto">
    <form method="POST" class="row g-3" action="{{route('freeIssues.update',$freeIssue->id)}}">
        {{csrf_field()}}
        @method('PUT')
        <div class="row" style="margin-top:5%">
            <div class="col-md-6">
                <label><b>FREE ISSUE LABEL</b></label>
                <input class="form-control" name="label" id="label" placeholder="Enter the free issue label" value="{{$freeIssue->label}}">
            </div>
            <div class="col-md-6">
                <label><b>FREE PRODUCT</b></label>
                <input type="text" class="form-control" name="free_product" id="free_product"  value="{{$freeIssue->free_product}}" readonly>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <label><b>TYPE</b></label>
                <select class="form-select" name="type" id="type">
                    <option selected>Select the type</option>
                    <option value="Flat" {{ $freeIssue->type == 'Flat' ? 'selected' : '' }}>Flat</option>
                    <option value="Multiple" {{ $freeIssue->type == 'Multiple' ? 'selected' : '' }}>Multiple</option>
                </select>
            </div>
            <div class="col-md-6">
                <label><b>FREE QUANTITY</b></label>
                <input type="text" class="form-control" name="free_quantity" id="free_quantity"  value="{{$freeIssue->free_quantity}}"  placeholder="Enter the free quantity">
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <label><b>PURCHASE PRODUCT</b></label>
                <select class="form-select" name="product_id" id="productSelect">
                    <option selected>Select the product</option>
                    @foreach($products as $product)
                    <option value="{{$product->id}}" {{ $freeIssue->product_id == $product->id ? 'selected' : '' }}>{{$product->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-6">
                <label><b>LOWER LIMIT</b></label>
                <input type="text" class="form-control" name="lower_limit" id="lower_limit" value="{{$freeIssue->lower_limit}}" placeholder="Enter the lower limit">
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <label><b>PURCHASE QUANTITY</b></label>
                <input type="text" class="form-control" name="purchase_quantity" id="purchase_quantity"  value="{{$freeIssue->purchase_quantity}}" placeholder="Enter the purchase quantity">
            </div>
            <div class="col-md-6">
                <label><b>UPPER LIMIT</b></label>
                <input type="text" class="form-control" name="upper_limit" id="upper_limit" value="{{$freeIssue->upper_limit}}" placeholder="Enter the upper limit">
            </div>
        </div>



        <div class="row">
            <div class="col-12" style="text-align:center;margin-bottom:3%">
                <button data-bs-toggle="modal" data-bs-target="#save" class="btn btn-primary" type="button" style="margin-top:2%;">UPDATE</button>
            </div>
        </div>

        <div class="modal fade" style="font-family:poppins" id="save" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content bg-warning">
                    <div class="modal-header">
                        <!-- <h5 id="h4" class="modal-title" id="exampleModalLabel">Warning</h5> -->
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body text-center text-danger">
                        <h5>Are you sure to update?</h5>
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
</div>
<script>
    document.getElementById('productSelect').addEventListener('change', function () {
        var freeProduct = this.options[this.selectedIndex].text;
        document.getElementById('free_product').value = freeProduct;
    });
</script>
@endsection
