@extends('layouts.admin.master')
@section('title')
    All Orders
@endsection

@section('content')

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center py-2">
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
                    <li class="breadcrumb-item active" aria-current="page"> Orders</li>
                </ol>
            </nav>
            <h2 class="h4">All Orders</h2>

        </div>
    </div>






    {{-- on top --}}






    {{-- table --}}
    <div class="card card-body border-0 shadow table-wrapper table-responsive">
        <table class="table table-hover table-centered table-striped table-bordered text-center">
            <thead>
                <tr>
                    <th class="border-gray-200">ID</th>
                    <th class="border-gray-200">Order Number</th>
                    <th class="border-gray-200">Total Order Price</th>
                    <th class="border-gray-200">Payment Type</th>
                    <th class="border-gray-200">User</th>
                    <th class="border-gray-200">Created At</th>
                    <th class="border-gray-200">Action</th>
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
                            <p class="text-nowrap">00{{ $order->id }}</p>
                        </td>
                        <td>
                            <p class="text-nowrap">
                                {{ number_format($order->total_order_price) . ' AED' }}</p>
                        </td>

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
                                    <a
                                        href="{{ url('acp/users?name=' . $order->customer_name) }}">{{ $order->customer_name }}</a>
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

                                @if (Auth::guard('admin')->user()->hasPermission('orders-read'))
                                <div class="">
                                    <div data-bs-toggle="tooltip" data-bs-placement="top" title="Show Details">


                                        <a class="btn btn-primary  m-1" style="font-size: 16px"
                                            href="{{ route('admin.orders.show', $order->order_number) }}"> <span
                                                class="fas fa-eye "></span></a>
                                    </div>
                                </div>
                                @endif

                                @if (Auth::guard('admin')->user()->hasPermission('orders-update'))

                                @if ($order->status == 'pending')
                                    <form class="action_btn"
                                        data-message="Are You Sure You Want To Move This Order To Inprogress Status ?"
                                        action="{{ route('admin.orders.inprogressAction', $order->order_number) }}"
                                        method="POST">
                                        @csrf
                                        @method('PUT')
                                        <button data-bs-toggle="tooltip" data-bs-placement="top" title="Inprogress Action"
                                            type="submit" class="btn btn-info text-white  m-1" style="font-size: 16px">
                                            <span class="fas fa-check"></span>
                                        </button>
                                    </form>



                                    <form class="action_btn"
                                        data-message="Are You Sure You Want To Move This Order To Delivered Status ?"
                                        action="{{ route('admin.orders.deliveredAction', $order->order_number) }}"
                                        method="POST">
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
                                        action="{{ route('admin.orders.cancelledAction', $order->order_number) }}"
                                        method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" data-bs-toggle="tooltip" data-bs-placement="top"
                                            title="Cancelled Action" type="submit" class="btn btn-danger text-white  m-1"
                                            style="font-size: 16px">
                                            <span class="fas fa-times"></span>
                                        </button>
                                    </form>
                                @elseif ($order->status == 'inprogress')
                                    <form class="action_btn"
                                        data-message="Are You Sure You Want To Move This Order To Delivered Status ?"
                                        action="{{ route('admin.orders.deliveredAction', $order->order_number) }}"
                                        method="POST">
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
                                        action="{{ route('admin.orders.cancelledAction', $order->order_number) }}"
                                        method="POST">
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

                                @endif








                            </div>






                        </td>




                    </tr>
                @endforeach
                <!-- Item -->








            </tbody>
        </table>

        <div class="alert my-4 text-center text-white" style="background: #1f2937">



            <p class="h2">Order Total Price <span class="badge badge-lg bg-success "
                    style="font-size: 30px">{{ number_format($total_outer_orders_price) }}
                </span> AED </p>






        </div>

        @if ($orders->count() < 1)
            <div class="d-flex justify-content-center" style="min-height: 300px">
                Empty
            </div>
        @endif
    </div>
@endsection
