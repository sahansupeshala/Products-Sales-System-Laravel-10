@extends('Layouts.navbar')

@section('content')
<div class="container" style="font-family:poppins">

    <div class="row">
        <h3 style="text-align:center;font-weight:bold">Orders</h3>
    </div>
    <table class="table table-striped">
        <thead class="bg-dark text-white">
            <tr>
            <th scope="col">Order Number</th>
            <th scope="col">Customer Name</th>
            <th scope="col">Order Date & Time</th>
            <th scope="col">Net Amount</th>
            <th scope="col">PO View</th>
            <th scope="col">PDF</th>
            </tr>
        </thead>
        <tbody>
        @forelse($placingOrders as $orderNumber => $orders)
            @php
                $firstOrder = $orders->first();
            @endphp
            <tr>
                <td>{{ $orderNumber }}</td>
                <td>{{ $firstOrder->customer->name }}</td>
                <td>{{ $firstOrder->created_at->format('Y-m-d H:i') }}</td>
                <td>Rs.{{ $firstOrder->net_amount }}</td>
                <td><a type="button" class="btn btn-primary" href="{{ route('placingOrders.show', $firstOrder->id) }}">View</a></td>
                <td><a type="button" class="btn btn-danger" href="{{ route('placingOrders.show', $firstOrder->id) }}">Print</a></td>
            </tr>
        @empty
            <tr><td colspan="5">No orders found</td></tr>
        @endforelse
        </tbody>
    </table>
</div>
@endsection
