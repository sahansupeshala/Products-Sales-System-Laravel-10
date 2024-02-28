@extends('Layouts.navbar')

@section('content')

    <div class="row">
        <h2 style="text-align:center;font-weight:bold">Customer Edit</h2>
    </div>
    <div class="card bg-light" style="width:70rem;margin:auto">
    <form method="POST" class="row g-3" action="{{route('customers.update',$customer->id)}}">
        {{csrf_field()}}
        @method('PUT')
        <div class="row" style="margin-top:5%">
            <div class="col-md-6">
                <label><b>CUSTOMER NAME</b></label>
                <input class="form-control" name="name" id="name" value="{{$customer->name}}" placeholder="Enter the name">
            </div>
            <div class="col-md-6" >
                <label><b>CUSTOMER CODE</b></label>
                <input class="form-control" name="code" id="code" value="{{$customer->code}}" placeholder="Enter the code">
            </div>

        </div>

        <div class="row" style="margin-top:5%">
            <div class="col-md-6">
                <label><b>CUSTOMER ADDRESS</b></label>
                <input class="form-control" name="address" id="address" value="{{$customer->address}}" placeholder="Enter the address">
            </div>
            <div class="col-6">
                <label><b>CUSTOMER CONTACT</b></label>
                <input type="text" class="form-control" name="contact" id="contact" value="{{$customer->contact}}" placeholder="Enter the contact no.">
            </div>
        </div>

        <div class="row">
            <div class="col-12" style="text-align:center;margin-bottom:3%">
                <button data-bs-toggle="modal" data-bs-target="#save" class="btn btn-primary" type="button" style="margin-top:5%;">UPDATE</button>
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
                        <h5 style="text-danger">Are you sure to update?</h5>
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
@endsection
