@extends('Layouts.navbar')

@section('content')

<div class="container">

    <div class="row">
        <h2 style="text-align:center;font-weight:bold">Create Placing Order</h2>
    </div>

    <form method="POST" action="{{route('placingOrders.store')}}">
    {{csrf_field()}}
    <div class="card bg-light" style="margin-bottom:3%">
        <div class="row" style="margin:3%">
            <div class="col-md-6">
                <label><b>CUSTOMER NAME</b></label>
                <select class="form-select" name="customer_id" id="customerSelect">
                    <option selected>Select the Customer</option>
                    @foreach($customers as $customer)
                    <option value="{{$customer->id}}">{{$customer->name}}</option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-6">
                <label><b>ORDER NUMBER</b></label>
                <input class="form-control" name="order_number" id="order_number" value="{{$orderNumber}}" readonly>
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
        <tbody id="TBody">
            <tr id="TRow">
            <td>
                <select class="form-select-md" name="product_id[]" id="productSelect" style="">
                    <option selected>Select the product</option>
                    @foreach($products as $product)
                    <option value="{{$product->id}}" code="{{$product->code}}" price="{{$product->price}}" free="{{$product->freeIssue->free_quantity}}" purchase_quantity="{{$product->freeIssue->purchase_quantity}}" type="{{$product->freeIssue->type}}">{{$product->name}}</option>
                    @endforeach
                </select>
            </td>
            <td><input type="text" class="form-control-md" name="product_code" id="product_code"  readonly></td>
            <td><input type="text" class="form-control-md" name="price" id="price" readonly></td>
            <td><input type="text" class="form-control-md" name="quantity[]" id="quantity" placeholder="Enter quantity"></td>
            <td><input type="text" class="form-control-md" name="free[]" id="free" readonly></td>
            <td><input type="text" class="form-control-md" name="amount[]" id="amount" readonly></td>
            <td><input type="hidden" class="form-control-md" name="free_quantity" id="free_quantity" style="width:50%" readonly>
            <input type="hidden" class="form-control-md" name="purchase" id="purchase" style="width:50%" readonly>
            <input type="hidden" class="form-control-md" name="type" id="type" style="width:50%" readonly></td>
            </tr>
        </tbody>
    </table>
    <button class="btn btn-warning" type="button" id="addRowBtn" onclick="BtnAdd()">+ Next</button>
    <div class="row">
        <div class="col" style="text-align:right">
            Net Amount : <input type="text" class="form-control-md bg-dark text-white" name="net_amount" id="net_amount"  readonly>
        </div>
    </div>

    <div class="row" Style="margin:2%">
        <div class="col" Style="margin-left:40%" >
            <button data-bs-toggle="modal" data-bs-target="#clear" class="btn btn-danger" type="refresh" style="margin-top:5%;">Clear</button>
        </div>
        <div class="col" Style="margin-right:40%">
            <button data-bs-toggle="modal" data-bs-target="#save" class="btn btn-success" type="button" style="margin-top:5%;">Save</button>
        </div>
    </div>

    <div class="modal fade" style="font-family:poppins" id="save" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content bg-warning ">
                    <div class="modal-header">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body text-center">
                        <h5 style="text-danger">Are you sure to save?</h5>
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
<script>
    document.getElementById('productSelect').addEventListener('change', function () {
        var selectedOption = this.options[this.selectedIndex];
        var code = selectedOption.getAttribute('code');
        var price = selectedOption.getAttribute('price');
        var free = selectedOption.getAttribute('free');
        var purchase = selectedOption.getAttribute('purchase_quantity');
        var type = selectedOption.getAttribute('type');

        document.getElementById('product_code').value = code;
        document.getElementById('price').value = price;
        document.getElementById('free_quantity').value = free;
        document.getElementById('purchase').value = purchase;
        document.getElementById('type').value = type;
    });
</script>
<script>
    document.getElementById('quantity').addEventListener('input', function() {
    var quantity = parseFloat(this.value);
    var purchase = parseFloat(document.getElementById('purchase').value);
    var freeQuantity = parseFloat(document.getElementById('free_quantity').value);
    var price = parseFloat(document.getElementById('price').value);
    var net_amount = parseFloat(document.getElementById('net_amount').value);
    var type = document.getElementById('type').value;

    if(type==='Multiple'){
        if (!isNaN(quantity) && !isNaN(purchase) && !isNaN(freeQuantity)) {
            if(quantity >= purchase){
                var free = (quantity / purchase) * freeQuantity;
                document.getElementById('free').value = free.toFixed(0);
            }
            else if(quantity < purchase){
                document.getElementById('free').value = 0;
            }

        } else {
            document.getElementById('free').value = '';
        }
    }
    else if(type==='Flat'){
        if(quantity >= purchase){
            document.getElementById('free').value = freeQuantity;
        }
        else if(quantity < purchase){
            document.getElementById('free').value = 0;
        }
    }


    var amount=price*quantity;
    document.getElementById('amount').value = amount;

});
</script>
<script>
    $(document).ready(function() {
        $("#addRowBtn").click(function() {
            var newRow = $("#TRow").clone();
            newRow.removeAttr('id');
            newRow.find('[id]').each(function() {
                $(this).removeAttr('id');
            });

            newRow.find('input').val('');
            newRow.find('select').prop('selectedIndex', 0);

            newRow.appendTo("#TBody");
    });
    function calculateNetAmount() {
        var netAmount = 0;
        $("#TBody").find('tr').each(function() {
            var amount = parseFloat($(this).find('[name="amount[]"]').val());
            if (!isNaN(amount)) {
                netAmount += amount;
            }
        });

        $('#net_amount').val(netAmount.toFixed(0));
    }

    $("#TBody").on('change', '.form-select-md', function() {
        var selectedOption = $(this).find('option:selected');
        var code = selectedOption.attr('code');
        var price = selectedOption.attr('price');
        var freeQuantity = selectedOption.attr('free');
        var purchaseQuantity = selectedOption.attr('purchase_quantity');
        var type = selectedOption.attr('type');

        var parentRow = $(this).closest('tr');
        parentRow.find('[name="product_code"]').val(code);
        parentRow.find('[name="price"]').val(price);
        parentRow.find('[name="free_quantity"]').val(freeQuantity);
        parentRow.find('[name="purchase"]').val(purchaseQuantity);
        parentRow.find('[name="type"]').val(type);

        calculateNetAmount();
    });


    $("#TBody").on('input', '[name="quantity[]"]', function() {
        var row = $(this).closest('tr');
        var quantity = parseFloat($(this).val());
        var purchase = parseFloat(row.find('[name="purchase"]').val());
        var freeQuantity = parseFloat(row.find('[name="free_quantity"]').val());
        var price = parseFloat(row.find('[name="price"]').val());
        var type = row.find('[name="type"]').val();

        var free = 0;
        if(type === 'Multiple') {
            if (!isNaN(quantity) && !isNaN(purchase) && !isNaN(freeQuantity)) {
                if(quantity>=purchase){
                    free = (quantity / purchase) * freeQuantity;
                }
                else if(quantity<purchase){
                    free=0;
                }
            }
        } else if(type === 'Flat') {
            if(quantity>=purchase){
                free = freeQuantity;
            }
            else if(quantity<purchase){
                free=0;
            }
        }
        row.find('[name="free[]"]').val(free.toFixed(0));

        var amount = price * quantity;
        row.find('[name="amount[]"]').val(amount.toFixed(0));
        calculateNetAmount();
    });
});

</script>
@endsection
