@extends('layouts.admin.master')
@section('title')
    Send Money To Events
@endsection
@section('content')
    {{-- on top --}}

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center py-4">
        <div class="d-block mb-4 mb-md-0">
            <nav aria-label="breadcrumb" class=" d-md-inline-block">
                <ol class="breadcrumb breadcrumb-dark breadcrumb-transparent">
                    <li class="breadcrumb-item">
                        <a href="{{ route('admin.dashboard') }}">
                            <svg class="icon icon-xxs" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                                </path>
                            </svg>
                        </a>
                    </li>

                    <li class="breadcrumb-item active" aria-current="page">Send Money To Events</li>

                </ol>
            </nav>

        </div>

    </div>






    {{-- on top --}}
    <div class="card my-4">

        <div class="card-header">
            Our Balance
        </div>
        <div class=" card-body ">

            <div class="d-flex justify-content-center align-items-center flex-wrap">
                <div class="card card-body px-1 py-3 mx-4 p bg-primary   rounded my-3 order-statistics  position-relative">
                    <h1 style="color: #fff; font-size: 30px;"><span
                            id="balance_price">{{ number_format($our_balance) }}</span> AED</h1>
                    <input type="text" id="inp_balance" hidden>
                    <a><span class="d-block " style=" font-size:35px ; color:#fff">My Total Balance</span></a>
                </div>
            </div>
        </div>
    </div>

    <div class="card my-4">

        <div class="card-header">
            Selected Order Balance
        </div>
        <div class=" card-body ">

            <div class="d-flex justify-content-center align-items-center flex-wrap">
                <div class="card card-body px-1 py-3 mx-4 p bg-primary   rounded my-3 order-statistics  position-relative">
                    <h1 style="color: #fff; font-size: 30px;"><span
                            id="order_balance">0</span> AED</h1>
                    <input type="text" id="inp_balance" hidden>
                    <a><span class="d-block " style=" font-size:35px ; color:#fff">Selected Order Balance</span></a>
                </div>
            </div>
        </div>
    </div>

    <form action="{{ route('admin.with-draw-request.send_money_request') }}" method="POST" enctype="multipart/form-data">


        @csrf
        @method('POST')


        @if ($errors->any())
            <div class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif


        <div class="card mb-4">

            <div class="card-body">

                <input type="text" id="selected_key" name="selected_key" hidden>
                <input type="text" id="selected_order" name="selected_order" hidden>
                <input type="text" id="order_price" name="order_price" hidden>

                <div class="row">

                    <div class="col-md-6">
                        <div class="form-group mb-4">
                            <label for="title_en">Select Money Type <span class="text-danger">*</span></label>
                            <select name="key" class="form-control" id="select_key">
                                <option value="empty">Select Money Type -------</option>
                                <option value="order">Orders</option>
                                <option value="hall">Halls</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group mb-4">
                            <label for="title_en">Select Order <span class="text-danger">*</span></label>
                            <select name="key" class="form-control" id="my_orders">

                            </select>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group mb-4">
                            <label for="title_en">Value <span class="text-danger">*</span></label>
                            <input required type="number" step="0.01" name="value"
                                class="form-control @error('value') is-invalid @enderror" value="{{ old('value') }}">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group mb-4">
                            <label for="purchase_price">Notes</label>
                            <input value="{{ old('notes') }}" type="text" name="notes"
                                class="form-control @error('notes') is-invalid @enderror" value="{{ old('notes') }}">
                            <input type="text" id="client_id" name="vendor_id" hidden>
                        </div>
                    </div>

                </div>

            </div>
        </div>

        <button type="submit" class="btn btn-primary d-block m-auto">
            Send
            <i class="fas fa-plus icon icon-xs ms-2"></i>
        </button>
    </form>


    <script>
        $("#select_key").change(function() {

            select_key = $(this).children("option:selected").val();

            if (select_key == "") {
                select_key = "empty";
            }

            complete_url = "/acp/admin/get-orders-based-on-key/" + select_key;

            $.ajax({
                type: "GET",
                url: complete_url,
                success: function(data) {
                    console.log(data.my_orders)

                    $("#selected_key").val(select_key)

                    $("#my_orders").empty();

                    if (data.my_orders.length > 0) {
                        $("#my_orders").append(`
                                <option value="empty">Select Order -------</option>
                            `);
                        for (x = 0; x < data.my_orders.length; x++) {
                            $("#my_orders").append(`
                                <option value="${data.my_orders[x].id}">${data.my_orders[x].id}</option>
                            `);
                        }
                    }
                },
                error: function(data) {
                    console.log("error");
                },
            });
        });

        $("#my_orders").change(function() {

            my_orders = $(this).children("option:selected").val();

            key = $("#selected_key").val();

            if (my_orders == "") {
                my_orders = "empty";
            }

            complete_url = "/acp/admin/get-order-price/" + key + "/" + my_orders;

            $.ajax({
                type: "GET",
                url: complete_url,
                success: function(data) {

                    console.log(data)

                    $("#selected_order").val(my_orders)

                    if (data == "empty") {
                        $("#order_price").val(0);
                        $("#order_balance").text(0)
                    } else {
                        $("#order_price").val(data[0]);
                        $("#order_balance").text(data[0])
                    }


                },
                error: function(data) {
                    console.log("error");
                },
            });
        });
    </script>






@endsection
