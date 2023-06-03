@extends('layouts.admin.master')
@section('title')
    Send Money For Vendors
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

                    <li class="breadcrumb-item active" aria-current="page">Send Money For Vendors</li>

                </ol>
            </nav>

        </div>

    </div>






    {{-- on top --}}
    <div class="card my-4">

        <div class="card-header">
            Vendor Balance
        </div>
        <div class=" card-body ">

            <div class="d-flex justify-content-center align-items-center flex-wrap">
                <div class="card card-body px-1 py-3 mx-4 p bg-primary   rounded my-3 order-statistics  position-relative">
                    <h1 style="color: #fff; font-size: 30px;"><span id="balance_price">0</span> AED</h1>
                    <input type="text" id="inp_balance" hidden>
                    <a><span class="d-block " style=" font-size:35px ; color:#fff">Total Balance</span></a>
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
                    <h1 style="color: #fff; font-size: 30px;"><span id="selected_order_balance">0</span> AED</h1>
                    <input type="text" id="inp_balance" hidden>
                    <a><span class="d-block " style=" font-size:35px ; color:#fff">Selected Order Balance</span></a>
                </div>
            </div>
        </div>
    </div>

    <form action="{{ route('admin.with-draw-request.send_money') }}" method="POST" enctype="multipart/form-data">


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

                <input type="text" id="client_email_inpt" name="client_email_inpt" hidden>
                <input type="text" id="client_order_balance_inpt" name="client_order_balance_inpt" hidden>
                <input type="text" id="key_for_filter" name="key_for_filter" hidden>

                <div class="row">

                    <div class="col-md-4">
                        <div class="form-group mb-4">
                            <label for="title_ar">Select Client <span class="text-danger">*</span></label>
                            <select name="vendor_email" class="form-control" id="choose_client">
                                <option value="">Choose Vendor -----</option>
                                @foreach ($all_vendors as $vendor)
                                    <option value="{{ $vendor->email }}">{{ $vendor->title_en }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group mb-4">
                            <label for="title_ar">Select Balance Type <span class="text-danger">*</span></label>
                            <select name="hall_order" class="form-control" id="select_filter_key">
                                <option value="">Select Balance Type</option>
                                <option value="hall">Hall</option>
                                <option value="order">Order</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group mb-4">
                            <label for="title_ar">Select Client Orders <span class="text-danger">*</span></label>
                            <select name="client_order" class="form-control" id="choose_client_orders">

                            </select>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group mb-4">
                            <label for="title_en">Value <span class="text-danger">*</span></label>
                            <input required type="number" step="0.01" name="value"
                                class="form-control @error('value') is-invalid @enderror" value="{{ old('value') }}">
                        </div>
                    </div>

                    <div class="col-md-4">
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
        function addCommas(nStr) {
            nStr += "";
            x = nStr.split(".");
            x1 = x[0];
            x2 = x.length > 1 ? "." + x[1] : "";
            var rgx = /(\d+)(\d{3})/;
            while (rgx.test(x1)) {
                x1 = x1.replace(rgx, "$1" + "," + "$2");
            }
            return x1 + x2;
        }

        $("#choose_client").change(function() {
            client_id = $(this).children("option:selected").val();

            if (client_id == "") {
                client_id = "empty";
            }

            complete_url = "/acp/admin/get-vendor-balance/" + client_id + "/" + "hello";

            $.ajax({
                type: "GET",
                url: complete_url,
                success: function(data) {

                    if (data == "empty") {
                        $("#balance_price").text(0);
                        $("#inp_balance").val(0);
                        $("#client_id").val("");
                    } else {
                        $("#client_email_inpt").val(data[1].email);

                        $("#balance_price").text(addCommas(data[0].toFixed(2)).split('.')[1] == 00 ?
                            addCommas(data[0]) : addCommas(data[0].toFixed(2)));
                    }
                },
                error: function(data) {
                    console.log("error");
                },
            });

        });

        $("#select_filter_key").change(function() {
            key = $(this).children("option:selected").val();

            client_id = $("#client_email_inpt").val();

            if (key == "") {
                key = "empty";
            }

            $("#key_for_filter").val(key)

            complete_url = "/acp/admin/get-vendor-balance/" + client_id + "/" + key;

            $.ajax({
                type: "GET",
                url: complete_url,
                success: function(data) {

                    if (data == "empty") {
                        $("#balance_price").text(0);
                        $("#inp_balance").val(0);
                        $("#client_id").val("");
                    } else {
                        $("#balance_price").text(addCommas(data[0].toFixed(2)).split('.')[1] == 00 ?
                            addCommas(data[0]) : addCommas(data[0].toFixed(2)));
                        // $("#inp_balance").val(data[1].have);

                        $("#client_id").val(data[1].id);

                        $('#choose_client_orders').empty();
                        if (data[1].my_orders.length > 0) {
                            $('#choose_client_orders').append(`
                                        <option value="empty"> Please Select Client Order--------- </option>
                            `);
                            for (x = 0; x < data[1].my_orders.length; x++) {
                                $('#choose_client_orders').append(`
                                        <option value="${data[1].my_orders[x].id}"> 0000${data[1].my_orders[x].id} </option>
                                `);
                            }
                        }
                    }
                },
                error: function(data) {
                    console.log("error");
                },
            });
        });

        $("#choose_client_orders").change(function() {
            client_email = $("#client_email_inpt").val();
            order_number = $(this).children("option:selected").val();

            if (order_number == "") {
                order_number = "empty";
            }

            key = $("#key_for_filter").val();

            complete_url = "/acp/admin/get-vendor-order-balance/" + client_email + "/" + key + "/" + order_number;

            $.ajax({
                type: "GET",
                url: complete_url,
                success: function(data) {
                    if (data == "empty") {
                        $("#client_order_balance_inpt").val(0);
                        $("#selected_order_balance").text(0)
                    } else {
                        $("#client_order_balance_inpt").val(data[0]);
                        $("#selected_order_balance").text(data[0])
                    }
                },
                error: function(data) {
                    console.log("error");
                },
            });
        });
    </script>


@endsection
