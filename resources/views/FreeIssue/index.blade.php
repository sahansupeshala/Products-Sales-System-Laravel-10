@extends('Layouts.navbar')

@section('content')
<div class="container">





    <div class="row">
        <h2 style="text-align:center;font-weight:bold">Free issues</h2>
    </div>
    <table class="table table-striped">
        <thead class="bg-dark text-white">
            <tr>
            <th scope="col">Free Issue Label</th>
            <th scope="col">Type</th>
            <th scope="col">Purchase Product</th>
            <th scope="col">Free Product</th>
            <th scope="col">Purchase Quantity</th>
            <th scope="col">Free Quantity</th>
            <th scope="col">Lower Limit</th>
            <th scope="col">Upper Limit</th>
            <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @if($freeIssues)
            @foreach($freeIssues as $freeIssue)
            <tr>
            <td>{{$freeIssue->label}}</td>
            <td>{{$freeIssue->type}}</td>
            <td>{{$freeIssue->product->name}}</td>
            <td>{{$freeIssue->free_product}}</td>
            <td>{{$freeIssue->purchase_quantity}}</td>
            <td>{{$freeIssue->free_quantity}}</td>
            <td>{{$freeIssue->lower_limit}}</td>
            <td>{{$freeIssue->upper_limit}}</td>
            <td><a type="button" class="btn btn-primary" href="{{route('freeIssues.edit',$freeIssue->id)}}">Edit</a></td>
            </tr>
            @endforeach
            @else
            <tr></tr>
            @endif
        </tbody>
    </table>

</div>
@endsection
