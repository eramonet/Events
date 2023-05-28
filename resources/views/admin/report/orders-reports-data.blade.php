@extends('layouts.admin.master')
@section('title')
    Orders Report
@endsection
@section('content')
    <div class="py-4">

        <div class="d-flex justify-content-between w-100 flex-wrap">
            <div class="mb-3 mb-lg-0">
                <h1 class="h4"> <i class="fa fa-house"></i> Orders Report </h1>

            </div>
          

        </div>
    </div>
   

     
    </div>

<div class="row">
        <div class="col-12 col-xl-12">
            <div class="row">


                {{-- latest users --}}

                <div class="col-12 mb-4">
                    <div class="card border-0 shadow">
                        <div class="card-header">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h2 class="fs-5 fw-bold mb-0">Last 20 Orders</h2>
                                </div>
                               
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table align-items-center table-flush">
                                <thead class="thead-light">
                                    <tr>
                    <th class="border-gray-200">ID</th>
                    <th class="border-gray-200">Order Number</th>
                    <th class="border-gray-200">Total Price</th>
                    <th class="border-gray-200">Payment Type</th>
                    <th class="border-gray-200">User</th>
                    <th class="border-gray-200">Created At</th>
                                    </tr>
                                </thead>
                                <tbody>
                <!-- Item -->

                @foreach ($orders as $order)
                    <tr>

                        <td>
                            <p class="text-nowrap">{{ $order->id }}.</p>
                        </td>
                        <td>
                            <p class="text-nowrap">{{ $order->order_number }}</p>
                        </td>
                        <td> <span class="badge bg-success text-nowrap"
                                style="font-size: 16px">{{ number_format($order->product_total_price + $order->total_taxes_price) }}
                                AED</span></td>

                        <td> <span class="badge bg-info text-nowrap"
                                style="font-size: 16px">{{ $order->payment_type }}</span></td>

                        <td>

                            @if ($order->user)
                                <strong>


                                    <p class="text-nowrap"><i class="fas fa-user text-info"></i>
                                        <a class="mx-1 text-info"
                                            href="{{ route('admin.users.index', ['user_id' => $order->user->id]) }}">{{ $order->user->name }}</a>
                                    </p>
                                </strong>
                            @else
                                <p class="text-nowrap"><i class="fas fa-user text-info"></i>
                                    {{ $order->customer_name }}
                                </p>
                            @endif
                        </td>


                        <td>
                            <p class="text-nowrap">
                                {{ $order->created_at }}
                            </p>
                        </td>

                        <td>


                            <div class="d-flex  align-items-center justify-content-center flex-md-nowrap">


                                <div class="">
                                    <div data-bs-toggle="tooltip" data-bs-placement="top" title="Show Details">


                                        <a class="btn btn-primary  m-1" style="font-size: 16px"
                                            href="{{ route('admin.orders.show', $order->order_number) }}"> <span
                                                class="fas fa-eye "></span></a>
                                    </div>
                                </div>

                                @if ($order->status == 'pending')
                                    <form class="action_btn"
                                        data-message="Are You Sure You Want To Move This Order To Inprogress Status ?"
                                        action="{{ route('admin.orders.inprogressAction', $order->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <button data-bs-toggle="tooltip" data-bs-placement="top" title="Inprogress Action"
                                            type="submit" class="btn btn-info text-white  m-1" style="font-size: 16px">
                                            <span class="fas fa-check"></span>
                                        </button>
                                    </form>



                                    <form class="action_btn"
                                        data-message="Are You Sure You Want To Move This Order To Delivered Status ?"
                                        action="{{ route('admin.orders.deliveredAction', $order->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <button style="font-size: 16px" type="submit" data-bs-toggle="tooltip"
                                            data-bs-placement="top" title="Delivered Action" type="submit"
                                            class="btn btn-success text-white  m-1">
                                            <span class="fas fa-check-double "></span>
                                        </button>
                                    </form>


                                    <form class="action_btn"
                                        data-message="Are You Sure You Want To Move This Order To Cancelled Status ?"
                                        action="{{ route('admin.orders.cancelledAction', $order->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" data-bs-toggle="tooltip" data-bs-placement="top"
                                            title="Cancelled Action" type="submit" class="btn btn-danger text-white  m-1"
                                            style="font-size: 16px">
                                            <span class="fas fa-times"></span>
                                        </button>
                                    </form>
                                @elseif ($order->status == 'in_progress')
                                    <form class="action_btn"
                                        data-message="Are You Sure You Want To Move This Order To Delivered Status ?"
                                        action="{{ route('admin.orders.deliveredAction', $order->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <button style="font-size: 16px" type="submit" data-bs-toggle="tooltip"
                                            data-bs-placement="top" title="Delivered Action" type="submit"
                                            class="btn btn-success text-white  m-1">
                                            <span class="fas fa-check-double "></span>
                                        </button>
                                    </form>


                                    <form class="action_btn"
                                        data-message="Are You Sure You Want To Move This Order To Cancelled Status ?"
                                        action="{{ route('admin.orders.cancelledAction', $order->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" data-bs-toggle="tooltip" data-bs-placement="top"
                                            title="Cancelled Action" type="submit"
                                            class="btn btn-danger text-white  m-1" style="font-size: 16px">
                                            <span class="fas fa-times"></span>
                                        </button>
                                    </form>
                                @else

                                @endif









                            </div>






                        </td>




                    </tr>
                @endforeach
                <!-- Item -->








            </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {{-- latest users --}}


            </div>
        </div>

    </div>



    </div>


<div class="row">
        <div class="col-12 col-xl-12">
            <div class="row">


                {{-- latest users --}}

                <div class="col-12 mb-4">
                    <div class="card border-0 shadow">
                        <div class="card-header">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h2 class="fs-5 fw-bold mb-0">Last 20 Pending Orders</h2>
                                </div>
                               
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table align-items-center table-flush">
                                <thead class="thead-light">
                                    <tr>
                    <th class="border-gray-200">ID</th>
                    <th class="border-gray-200">Order Number</th>
                    <th class="border-gray-200">Total Price</th>
                    <th class="border-gray-200">Payment Type</th>
                    <th class="border-gray-200">User</th>
                    <th class="border-gray-200">Created At</th>
                                    </tr>
                                </thead>
                                <tbody>
                <!-- Item -->

                @foreach ($ordersPending as $order)
                    <tr>

                        <td>
                            <p class="text-nowrap">{{ $order->id }}.</p>
                        </td>
                        <td>
                            <p class="text-nowrap">{{ $order->order_number }}</p>
                        </td>
                        <td> <span class="badge bg-success text-nowrap"
                                style="font-size: 16px">{{ number_format($order->product_total_price + $order->total_taxes_price) }}
                                AED</span></td>

                        <td> <span class="badge bg-info text-nowrap"
                                style="font-size: 16px">{{ $order->payment_type }}</span></td>

                        <td>

                            @if ($order->user)
                                <strong>


                                    <p class="text-nowrap"><i class="fas fa-user text-info"></i>
                                        <a class="mx-1 text-info"
                                            href="{{ route('admin.users.index', ['user_id' => $order->user->id]) }}">{{ $order->user->name }}</a>
                                    </p>
                                </strong>
                            @else
                                <p class="text-nowrap"><i class="fas fa-user text-info"></i>
                                    {{ $order->customer_name }}
                                </p>
                            @endif
                        </td>


                        <td>
                            <p class="text-nowrap">
                                {{ $order->created_at }}
                            </p>
                        </td>

                        <td>


                            <div class="d-flex  align-items-center justify-content-center flex-md-nowrap">


                                <div class="">
                                    <div data-bs-toggle="tooltip" data-bs-placement="top" title="Show Details">


                                        <a class="btn btn-primary  m-1" style="font-size: 16px"
                                            href="{{ route('admin.orders.show', $order->order_number) }}"> <span
                                                class="fas fa-eye "></span></a>
                                    </div>
                                </div>

                                @if ($order->status == 'pending')
                                    <form class="action_btn"
                                        data-message="Are You Sure You Want To Move This Order To Inprogress Status ?"
                                        action="{{ route('admin.orders.inprogressAction', $order->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <button data-bs-toggle="tooltip" data-bs-placement="top" title="Inprogress Action"
                                            type="submit" class="btn btn-info text-white  m-1" style="font-size: 16px">
                                            <span class="fas fa-check"></span>
                                        </button>
                                    </form>



                                    <form class="action_btn"
                                        data-message="Are You Sure You Want To Move This Order To Delivered Status ?"
                                        action="{{ route('admin.orders.deliveredAction', $order->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <button style="font-size: 16px" type="submit" data-bs-toggle="tooltip"
                                            data-bs-placement="top" title="Delivered Action" type="submit"
                                            class="btn btn-success text-white  m-1">
                                            <span class="fas fa-check-double "></span>
                                        </button>
                                    </form>


                                    <form class="action_btn"
                                        data-message="Are You Sure You Want To Move This Order To Cancelled Status ?"
                                        action="{{ route('admin.orders.cancelledAction', $order->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" data-bs-toggle="tooltip" data-bs-placement="top"
                                            title="Cancelled Action" type="submit" class="btn btn-danger text-white  m-1"
                                            style="font-size: 16px">
                                            <span class="fas fa-times"></span>
                                        </button>
                                    </form>
                                @elseif ($order->status == 'in_progress')
                                    <form class="action_btn"
                                        data-message="Are You Sure You Want To Move This Order To Delivered Status ?"
                                        action="{{ route('admin.orders.deliveredAction', $order->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <button style="font-size: 16px" type="submit" data-bs-toggle="tooltip"
                                            data-bs-placement="top" title="Delivered Action" type="submit"
                                            class="btn btn-success text-white  m-1">
                                            <span class="fas fa-check-double "></span>
                                        </button>
                                    </form>


                                    <form class="action_btn"
                                        data-message="Are You Sure You Want To Move This Order To Cancelled Status ?"
                                        action="{{ route('admin.orders.cancelledAction', $order->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" data-bs-toggle="tooltip" data-bs-placement="top"
                                            title="Cancelled Action" type="submit"
                                            class="btn btn-danger text-white  m-1" style="font-size: 16px">
                                            <span class="fas fa-times"></span>
                                        </button>
                                    </form>
                                @else

                                @endif









                            </div>






                        </td>




                    </tr>
                @endforeach
                <!-- Item -->








            </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {{-- latest users --}}


            </div>
        </div>

    </div>



    </div>










<div class="row">
        <div class="col-12 col-xl-12">
            <div class="row">


                {{-- latest users --}}

                <div class="col-12 mb-4">
                    <div class="card border-0 shadow">
                        <div class="card-header">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h2 class="fs-5 fw-bold mb-0">Last 20 Delivered Orders</h2>
                                </div>
                               
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table align-items-center table-flush">
                                <thead class="thead-light">
                                    <tr>
                    <th class="border-gray-200">ID</th>
                    <th class="border-gray-200">Order Number</th>
                    <th class="border-gray-200">Total Price</th>
                    <th class="border-gray-200">Payment Type</th>
                    <th class="border-gray-200">User</th>
                    <th class="border-gray-200">Created At</th>
                                    </tr>
                                </thead>
                                <tbody>
                <!-- Item -->

                @foreach ($ordersDelivered as $order)
                    <tr>

                        <td>
                            <p class="text-nowrap">{{ $order->id }}.</p>
                        </td>
                        <td>
                            <p class="text-nowrap">{{ $order->order_number }}</p>
                        </td>
                        <td> <span class="badge bg-success text-nowrap"
                                style="font-size: 16px">{{ number_format($order->product_total_price + $order->total_taxes_price) }}
                                AED</span></td>

                        <td> <span class="badge bg-info text-nowrap"
                                style="font-size: 16px">{{ $order->payment_type }}</span></td>

                        <td>

                            @if ($order->user)
                                <strong>


                                    <p class="text-nowrap"><i class="fas fa-user text-info"></i>
                                        <a class="mx-1 text-info"
                                            href="{{ route('admin.users.index', ['user_id' => $order->user->id]) }}">{{ $order->user->name }}</a>
                                    </p>
                                </strong>
                            @else
                                <p class="text-nowrap"><i class="fas fa-user text-info"></i>
                                    {{ $order->customer_name }}
                                </p>
                            @endif
                        </td>


                        <td>
                            <p class="text-nowrap">
                                {{ $order->created_at }}
                            </p>
                        </td>

                        <td>


                            <div class="d-flex  align-items-center justify-content-center flex-md-nowrap">


                                <div class="">
                                    <div data-bs-toggle="tooltip" data-bs-placement="top" title="Show Details">


                                        <a class="btn btn-primary  m-1" style="font-size: 16px"
                                            href="{{ route('admin.orders.show', $order->order_number) }}"> <span
                                                class="fas fa-eye "></span></a>
                                    </div>
                                </div>

                                @if ($order->status == 'pending')
                                    <form class="action_btn"
                                        data-message="Are You Sure You Want To Move This Order To Inprogress Status ?"
                                        action="{{ route('admin.orders.inprogressAction', $order->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <button data-bs-toggle="tooltip" data-bs-placement="top" title="Inprogress Action"
                                            type="submit" class="btn btn-info text-white  m-1" style="font-size: 16px">
                                            <span class="fas fa-check"></span>
                                        </button>
                                    </form>



                                    <form class="action_btn"
                                        data-message="Are You Sure You Want To Move This Order To Delivered Status ?"
                                        action="{{ route('admin.orders.deliveredAction', $order->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <button style="font-size: 16px" type="submit" data-bs-toggle="tooltip"
                                            data-bs-placement="top" title="Delivered Action" type="submit"
                                            class="btn btn-success text-white  m-1">
                                            <span class="fas fa-check-double "></span>
                                        </button>
                                    </form>


                                    <form class="action_btn"
                                        data-message="Are You Sure You Want To Move This Order To Cancelled Status ?"
                                        action="{{ route('admin.orders.cancelledAction', $order->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" data-bs-toggle="tooltip" data-bs-placement="top"
                                            title="Cancelled Action" type="submit" class="btn btn-danger text-white  m-1"
                                            style="font-size: 16px">
                                            <span class="fas fa-times"></span>
                                        </button>
                                    </form>
                                @elseif ($order->status == 'in_progress')
                                    <form class="action_btn"
                                        data-message="Are You Sure You Want To Move This Order To Delivered Status ?"
                                        action="{{ route('admin.orders.deliveredAction', $order->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <button style="font-size: 16px" type="submit" data-bs-toggle="tooltip"
                                            data-bs-placement="top" title="Delivered Action" type="submit"
                                            class="btn btn-success text-white  m-1">
                                            <span class="fas fa-check-double "></span>
                                        </button>
                                    </form>


                                    <form class="action_btn"
                                        data-message="Are You Sure You Want To Move This Order To Cancelled Status ?"
                                        action="{{ route('admin.orders.cancelledAction', $order->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" data-bs-toggle="tooltip" data-bs-placement="top"
                                            title="Cancelled Action" type="submit"
                                            class="btn btn-danger text-white  m-1" style="font-size: 16px">
                                            <span class="fas fa-times"></span>
                                        </button>
                                    </form>
                                @else

                                @endif









                            </div>






                        </td>




                    </tr>
                @endforeach
                <!-- Item -->








            </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {{-- latest users --}}


            </div>
        </div>

    </div>



    </div>







<div class="row">
        <div class="col-12 col-xl-12">
            <div class="row">


                {{-- latest users --}}

                <div class="col-12 mb-4">
                    <div class="card border-0 shadow">
                        <div class="card-header">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h2 class="fs-5 fw-bold mb-0">Last 20 Cancelled Orders</h2>
                                </div>
                               
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table align-items-center table-flush">
                                <thead class="thead-light">
                                    <tr>
                    <th class="border-gray-200">ID</th>
                    <th class="border-gray-200">Order Number</th>
                    <th class="border-gray-200">Total Price</th>
                    <th class="border-gray-200">Payment Type</th>
                    <th class="border-gray-200">User</th>
                    <th class="border-gray-200">Created At</th>
                                    </tr>
                                </thead>
                                <tbody>
                <!-- Item -->

                @foreach ($ordersCancelled as $order)
                    <tr>

                        <td>
                            <p class="text-nowrap">{{ $order->id }}.</p>
                        </td>
                        <td>
                            <p class="text-nowrap">{{ $order->order_number }}</p>
                        </td>
                        <td> <span class="badge bg-success text-nowrap"
                                style="font-size: 16px">{{ number_format($order->product_total_price + $order->total_taxes_price) }}
                                AED</span></td>

                        <td> <span class="badge bg-info text-nowrap"
                                style="font-size: 16px">{{ $order->payment_type }}</span></td>

                        <td>

                            @if ($order->user)
                                <strong>


                                    <p class="text-nowrap"><i class="fas fa-user text-info"></i>
                                        <a class="mx-1 text-info"
                                            href="{{ route('admin.users.index', ['user_id' => $order->user->id]) }}">{{ $order->user->name }}</a>
                                    </p>
                                </strong>
                            @else
                                <p class="text-nowrap"><i class="fas fa-user text-info"></i>
                                    {{ $order->customer_name }}
                                </p>
                            @endif
                        </td>


                        <td>
                            <p class="text-nowrap">
                                {{ $order->created_at }}
                            </p>
                        </td>

                        <td>


                            <div class="d-flex  align-items-center justify-content-center flex-md-nowrap">


                                <div class="">
                                    <div data-bs-toggle="tooltip" data-bs-placement="top" title="Show Details">


                                        <a class="btn btn-primary  m-1" style="font-size: 16px"
                                            href="{{ route('admin.orders.show', $order->order_number) }}"> <span
                                                class="fas fa-eye "></span></a>
                                    </div>
                                </div>

                                @if ($order->status == 'pending')
                                    <form class="action_btn"
                                        data-message="Are You Sure You Want To Move This Order To Inprogress Status ?"
                                        action="{{ route('admin.orders.inprogressAction', $order->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <button data-bs-toggle="tooltip" data-bs-placement="top" title="Inprogress Action"
                                            type="submit" class="btn btn-info text-white  m-1" style="font-size: 16px">
                                            <span class="fas fa-check"></span>
                                        </button>
                                    </form>



                                    <form class="action_btn"
                                        data-message="Are You Sure You Want To Move This Order To Delivered Status ?"
                                        action="{{ route('admin.orders.deliveredAction', $order->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <button style="font-size: 16px" type="submit" data-bs-toggle="tooltip"
                                            data-bs-placement="top" title="Delivered Action" type="submit"
                                            class="btn btn-success text-white  m-1">
                                            <span class="fas fa-check-double "></span>
                                        </button>
                                    </form>


                                    <form class="action_btn"
                                        data-message="Are You Sure You Want To Move This Order To Cancelled Status ?"
                                        action="{{ route('admin.orders.cancelledAction', $order->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" data-bs-toggle="tooltip" data-bs-placement="top"
                                            title="Cancelled Action" type="submit" class="btn btn-danger text-white  m-1"
                                            style="font-size: 16px">
                                            <span class="fas fa-times"></span>
                                        </button>
                                    </form>
                                @elseif ($order->status == 'in_progress')
                                    <form class="action_btn"
                                        data-message="Are You Sure You Want To Move This Order To Delivered Status ?"
                                        action="{{ route('admin.orders.deliveredAction', $order->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <button style="font-size: 16px" type="submit" data-bs-toggle="tooltip"
                                            data-bs-placement="top" title="Delivered Action" type="submit"
                                            class="btn btn-success text-white  m-1">
                                            <span class="fas fa-check-double "></span>
                                        </button>
                                    </form>


                                    <form class="action_btn"
                                        data-message="Are You Sure You Want To Move This Order To Cancelled Status ?"
                                        action="{{ route('admin.orders.cancelledAction', $order->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" data-bs-toggle="tooltip" data-bs-placement="top"
                                            title="Cancelled Action" type="submit"
                                            class="btn btn-danger text-white  m-1" style="font-size: 16px">
                                            <span class="fas fa-times"></span>
                                        </button>
                                    </form>
                                @else

                                @endif









                            </div>






                        </td>




                    </tr>
                @endforeach
                <!-- Item -->








            </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {{-- latest users --}}


            </div>
        </div>

    </div>



    </div>

@endsection




@section('scripts')
    <!-- ChartJS -->
    {{-- <script src={{ asset('dashboard/js/plugin/Chart.min.js') }}></script> --}}
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script src="https://www.gstatic.com/firebasejs/8.10.1/firebase.js"></script>
    <script>
        var firebaseConfig = {
            apiKey: "AIzaSyBOUb8GvhXA6EPyGH5hDvEeHao9V6rfriE",
            authDomain: "events-73956.firebaseapp.com",
            projectId: "events-73956",
            storageBucket: "events-73956.appspot.com",
            messagingSenderId: "321122743257",
            appId: "1:321122743257:web:6e28abd35a11888f6f5fc8",
            measurementId: "G-ZW7E04G5ZF",
        };
        firebase.initializeApp(firebaseConfig);
        const messaging = firebase.messaging();
        console.log('script')
        let csrf = `{{ csrf_token() }}`

        function startFCM() {
            console.log('STARTFCM')
            messaging.requestPermission().then(() => {
                return messaging.getToken({
                    vapidKey: 'BMJEW2gMO0QC05QwvLTq8KsF8RcHNGIVWLvAzK-Y9EepXKxe9ZfycMg3qvc4Ajq1kMmaawrMm6plMvt3FZhZ-FI'
                })
            }).then(function(response) {
                console.log(response, 'test')
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': csrf,
                    }
                });
                $.ajax({
                    url: '{{ route('admin.updateAdminToken') }}',
                    type: 'POST',
                    data: {
                        token: response
                    },
                    dataType: 'JSON',
                    success: function(response) {
                        // alert('Token stored.');
                    },
                    error: function(error) {
                        console.log('error', error)
                        // alert(error);
                    },
                });
            }).catch(function(error) {
                console.log('error catch', error)
                // alert(error);
            });
        }
        // messaging.getToken( {vapidKey: 'BPVvFQt3edIpTAp9C0-osAs_SSWzlqno6QT-pA4nbHWYplEGUgbdeOL1ooQz9FGlnCwrdJmMttJnpzoxNauZkls'})
        //     .then((currentToken) => {
        //
        //         if (currentToken) {
        //             console.log(updateTokenAPI,currentToken,csrfToken)
        //             // console.log('current token for client: ', currentToken);
        //             // Perform any other neccessary action with the token
        //             $.ajax({
        //                     url:updateTokenAPI,
        //                     method: 'post',
        //                     data: {
        //                         "_token":csrfToken,
        //                         "firebaseToken": currentToken
        //                     },
        //                     headers:{
        //                         "Accept":"application/json",
        //                         "X-CSRF-TOKEN":csrfToken
        //                     },
        //                     dataType:"json",
        //                     success:function(data){
        //                         console.log(data)
        //                     }
        //                 }
        //             )
        //             console.log('ajax called')
        //         } else {
        //             // Show permission request UI
        //             console.log('No registration token available. Request permission to generate one.');
        //         }
        //     })
        //     .catch((err) => {
        //         console.log('An error occurred while retrieving token. ', err);
        //     });


        startFCM();
        messaging.onMessage(function(payload) {
            // console.log(payload, 'notificationOnMessage')
            $('.notificationCounter').html(parseInt($('.notificationCounter').html()) + 1)
            // const title = payload.notification.title;
            // const options = {
            //     body: payload.notification.body,
            //     icon: payload.notification.icon,
            // };
            // new Notification(title, options);
            var audio = document.createElement("AUDIO")
            document.body.appendChild(audio);
            audio.src = "{{ asset('assets/dashboard/sound/mixkit-bell-notification-933.wav') }}"
            // audio.play();
            audio.addEventListener("canplaythrough", () => {
                audio.play().catch(e => {

                    window.addEventListener('click', () => {
                        audio.play()
                    }, {
                        once: true
                    })
                })
            });
        });
    </script>


    <script>
        function read() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                }
            });
            $.get("update", function(status, xhr) {
                document.getElementById("badge").classList.remove('badge-danger');
                console.log("success");
            })
        }
    </script>

    <script>
        // currentMonthIncomFromProducts
        let currentMonthIncomFromProductsCTX = document.getElementById("productsIncome");



        const currentMonthIncomFromProductsData = {
            labels: ['1 Jan', '2 Jan', '3 Jan', '4 Jan', '5 Jan', '6 Jan', '7 Jan', '8 Jan', '9 Jan', '10 Jan',
                '11 Jan', '12 Jan', '13 Jan', '14 Jan', '15 Jan', '16 Jan', '17 Jan', '18 Jan', '19 Jan', '20 Jan',
                '21 Jan', '22 Jan', '23 Jan', '24 Jan', '25 Jan', '26 Jan', '27 Jan', '28 Jan', '29 Jan', '30 Jan'
            ],
            datasets: [{
                label: 'AED',
                data: ['20000', '40000', '60000', '10000', '60000', '50000', '90000', '11000', '14000', '22000',
                    '12000', '23000', '30000', '40000', '22000', '33000', '21000', '20000', '40000',
                    '60000', '10000', '60000', '50000', '90000', '11000', '14000', '22000', '12000',
                    '23000', '30000', '40000', '22000', '33000', '21000', "1000"
                ],

                //   pointStyle: 'star',
                //   pointRadius: 10,
                //   pointHoverRadius: 15
            }]
        };
        const currentMonthIncomFromProductsConfig = {
            type: 'line',
            data: currentMonthIncomFromProductsData,
            options: {
                responsive: true,
                plugins: {
                    title: {
                        display: true,
                        text: (currentMonthIncomFromProductsCTX) =>
                            'Current Month Total Income From Products Is 910,500,00 AED',
                    }
                }
            }
        };

        new Chart(currentMonthIncomFromProductsCTX, currentMonthIncomFromProductsConfig);

        // currentMonthIncomFromProducts


        // currentMonthIncomFromBookings
        let currentMonthIncomFromBookingsCTX = document.getElementById("bookinksIncome");



        const currentMonthIncomFromBookingsData = {
            labels: ['1 Jan', '2 Jan', '3 Jan', '4 Jan', '5 Jan', '6 Jan', '7 Jan', '8 Jan', '9 Jan', '10 Jan',
                '11 Jan', '12 Jan', '13 Jan', '14 Jan', '15 Jan', '16 Jan', '17 Jan', '18 Jan', '19 Jan', '20 Jan',
                '21 Jan', '22 Jan', '23 Jan', '24 Jan', '25 Jan', '26 Jan', '27 Jan', '28 Jan', '29 Jan', '30 Jan'
            ],
            datasets: [{
                label: 'AED',
                data: ['30000', '50000', '80000', '20000', '20000', '10000', '20000', '18000', '11000', '29000',
                    '11000', '23000', '10000', '90000', '29000', '35000', '3000', '30000', '50000', '80000',
                    '20000', '20000', '10000', '20000', '18000', '11000', '29000', '11000', '23000',
                    '10000', '90000', '29000', '35000', '3000'
                ],

                //   pointStyle: 'circle',
                //   pointRadius: 10,
                //   pointHoverRadius: 15,

                backgroundColor: [
                    '#0d6efd',
                    '#0dcaf0',
                    '#2ecc71',
                    '#dc3545',
                ]
            }]
        };
        const currentMonthIncomFromBookingsConfig = {
            type: 'line',
            data: currentMonthIncomFromBookingsData,
            options: {
                responsive: true,
                plugins: {
                    title: {
                        display: true,
                        text: (currentMonthIncomFromBookingsCTX) =>
                            'Current Month Total Income From Bookings Is 1,110,500,00  AED',
                    }
                }
            }
        };

        new Chart(currentMonthIncomFromBookingsCTX, currentMonthIncomFromBookingsConfig);

        // currentMonthIncomFromProducts




        // currentMonthOrders
        let currentMonthOrdersCTX = document.getElementById("ordersChart");

        const currentMonthOrdersData = {
            labels: ['1 Jan', '2 Jan', '3 Jan', '4 Jan', '5 Jan', '6 Jan', '7 Jan', '8 Jan', '9 Jan', '10 Jan',
                '11 Jan', '12 Jan', '13 Jan', '14 Jan', '15 Jan', '16 Jan', '17 Jan', '18 Jan', '19 Jan', '20 Jan',
                '21 Jan', '22 Jan', '23 Jan', '24 Jan', '25 Jan', '26 Jan', '27 Jan', '28 Jan', '29 Jan', '30 Jan'
            ],
            datasets: [{
                label: 'Orders',
                data: ['200', '400', '600', '100', '600', '500', '900', '100', '400', '300', '800', '900',
                    '1000', '1200', '2000', '300', '2200', '200', '400', '600', '100', '600', '500', '900',
                    '100', '400', '300', '800', '900', '1000', '1200', '2000', '300', '2200'
                ],

                pointStyle: 'circle',
                pointRadius: 10,
                pointHoverRadius: 15
            }]
        };
        const currentMonthOrdersConfig = {
            type: 'bar',
            data: currentMonthOrdersData,
            options: {
                responsive: true,
                plugins: {
                    title: {
                        display: true,
                        text: (ctx) => 'Current Month  Total Orders Is 2,510,00 ',
                    }
                }
            }
        };

        new Chart(currentMonthOrdersCTX, currentMonthOrdersConfig);

        // currentMonthOrders
        // product chart

        let ctx3 = document.getElementById("productsChart");

        const data3 = {
            labels: ['In Stock', 'Out Of Stock', ],
            datasets: [{
                label: 'Products',
                data: ['1800', '1200'],

                pointStyle: 'circle',
                pointRadius: 10,
                pointHoverRadius: 15
            }]
        };
        const config3 = {
            type: 'pie',
            data: data3,
            options: {
                responsive: true,
                plugins: {
                    title: {
                        display: true,
                        text: (ctx) => 'Total Products Is 3,000,00 Product ',
                    }
                }
            }

        };
        new Chart(ctx3, config3);
        // product chart

        // ordersStatusChart


        let ctx4 = document.getElementById("ordersStatusChart");

        const data4 = {
            labels: ['New', 'Inprogress', 'Delivered', 'Cancelled'],
            datasets: [{
                label: 'Order',
                data: ['999', '992', '5000', '99'],

                pointStyle: 'circle',
                pointRadius: 10,
                pointHoverRadius: 15,
                backgroundColor: [
                    '#0d6efd',
                    '#0dcaf0',
                    '#2ecc71',
                    '#dc3545',
                ]

            }]
        };
        const config4 = {
            type: 'pie',
            data: data4,
            options: {
                responsive: true,
                plugins: {
                    title: {
                        display: true,
                        text: (ctx) => 'Total Orders Is 3,000,00 Order ',
                    },

                }
            }

        };
        new Chart(ctx4, config4);

        // ordersStatusChart
    </script>
@endsection
