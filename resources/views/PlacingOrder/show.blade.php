@extends('Layouts.navbar')

@section('content')
<link href="//maxcdn.bootstrapcdn.com/bootstrap/5.0.2/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/5.0.2/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<div class="container" style="font-family:poppins">

    <div class="row">
        <h2 style="text-align:center;font-weight:bold">PLACING ORDER</h2>
    </div>
    <div class="row" style="text-align:left">
        <h5>Test Company</h5>
        <h6>Colombo</h6>
    </div>

    <div style="margin-left:50%;margin-bottom:2% ">
        <div class="row" style="margin-top:1%">

            <div class="col-6" style="text-align:right">
                <h7>PO Number</h7>
            </div>
            <div class="col-6">
                <h7>{{$placingOrder->order_number}}</h7>
            </div>

        </div>
        <div class="row" style="margin-top:1%">
            <div class="col-6" style="text-align:right">
                <h7>Date</h7>
            </div>
            <div class="col-6">
                <h7>{{$placingOrder->created_at->format('Y-m-d')}}</h7>
            </div>

        </div>
        <div class="row" style="margin-top:1%">
            <div class="col-6" style="text-align:right">
                <h7>Customer Name</h7>
            </div>
            <div class="col-6">
                <h7>{{$placingOrder->customer->name}}</h7>
            </div>
        </div>
        <div class="row" style="margin-top:1%">
            <div class="col-6" style="text-align:right">
                <h7>Customer Address</h7>
            </div>
            <div class="col-6">
                <h7>{{$placingOrder->customer->address}}</h7>
            </div>
        </div>
        <div class="row" style="margin-top:1%">
            <div class="col-6" style="text-align:right">
                <h7>Customer Contact</h7>
            </div>
            <div class="col-6">
                <h7>{{$placingOrder->customer->contact}}</h7>
            </div>
        </div>
    </div>


    <table class="table table-striped" id="myTable">
        <thead class="bg-dark text-white">
            <tr>
            <th scope="col">Product Name</th>
            <th scope="col">Product Code</th>
            <th scope="col">Price</th>
            <th scope="col">Quantity</th>
            <th scope="col">Free</th>
            <th scope="col">Amount</th>
            </tr>
        </thead>
        <tbody>
        @foreach($placingOrders as $placingOrder)
        <tr>
            <td>{{$placingOrder->product->name}}</td>
            <td>{{$placingOrder->product->code}}</td>
            <td>{{$placingOrder->product->price}}</td>
            <td>{{$placingOrder->quantity}}</td>
            <td>{{$placingOrder->free}}</td>
            <td>{{$placingOrder->amount}}</td>
        </tr>
        @endforeach
        </tbody>
    </table>
    <div class="row">
        <div class="col bg-dark text-white" style="text-align:right;margin:1%">
           <h5>Total Amount : Rs.{{$placingOrder->net_amount}}</h5>
        </div>
    </div>
</div>
<div class="row" style="margin-top: 2%">
    <center>
        <button class="btn btn-danger hidden-print" onclick="myFunction()"><span class="glyphicon glyphicon-print" aria-hidden="true"></span> Print</button>
    </center>
</div>
<script>
function myFunction() {
    window.print();
}
</script>
@endsection
