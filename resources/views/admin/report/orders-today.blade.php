@extends('layouts.admin.master')
@section('title')
    Orders today reports
@endsection


@section('content')
    <div class="py-4">

        <div class="d-flex justify-content-between w-100 flex-wrap">
            <div class="mb-3 mb-lg-0">
                <h1 class="h4"> <i class="fa fa-file"></i>Orders today report</h1>

            </div>

        </div>
    </div>

    <div class="row  dashboard-home-top">


        @php
            $colores = collect(['primary', 'secondary', 'success', 'danger', 'warning', 'info', 'light', 'tertiary']);
            $useradmin = App\Models\Admin::where('id', Auth::guard('admin')->id())->first();
        @endphp
        @if($useradmin->hasRole('super-admin')|| $useradmin->hasRole('admin'))





      <div class="col-12 col-sm-6 col-xl-3 mb-4">
            <div class="card border-0 shadow">
                <div class="card-body">
                    <div class="row d-block d-xl-flex align-items-center">
                        <div
                            class="col-12 col-xl-5 text-xl-center mb-3 mb-xl-0 d-flex align-items-center justify-content-xl-center">
                            <div class="icon-shape icon-shape-{{ $colores->random() }} rounded me-4 me-sm-0">

                                <i class="fa-regular fa-circle-question icon"></i>
                            </div>
                            <div class="d-sm-none">
                                <h2 class="h5">Income</h2>
                                <div class="fw-extrabold mb-1">{{ $income }}</div>
                            </div>
                        </div>
                        <div class="col-12 col-xl-7 px-xl-0">
                            <div class="d-none d-sm-block">
                                <h2 class="h6 text-gray-400 mb-0">Income</h2>
                                <div class="fw-extrabold mb-2">{{ $income }}</div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>




    </div>

    {{-- orders --}}

    <div class="card card-body my-4">

        <div class="d-flex justify-content-center align-items-center flex-wrap">


            <div class="card card-body px-2 py-3 mx-4 p bg-info   rounded my-3 order-statistics  position-relative">

                <i class="far fa-plus-square" style="margin-bottom: 10px ; font-size:30px"></i>


                <a href="#"><span class="d-block " style=" font-size:20px ; color:#fff">New Orders</span></a>
                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                    {{ $newOrders }}
                </span>
            </div>



            <div class="card card-body px-2 py-3 mx-4 p bg-primary   rounded my-3 order-statistics  position-relative">

                <i class="fas fa-spinner" style="margin-bottom: 10px ; font-size:30px"></i>


                <a href="#"><span class="d-block " style=" font-size:20px ; color:#fff">Inprogress
                        Orders</span></a>
                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                    {{ $inProgressOrders }}
                </span>
            </div>



            <div class="card card-body px-2 py-3 mx-4 p bg-success   rounded my-3 order-statistics  position-relative">

                <i class="fas fa-check-double" style="margin-bottom: 10px ; font-size:30px"></i>



                <a href="#"><span class="d-block " style=" font-size:20px ; color:#fff">Delivered Orders</span></a>
                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                    {{ $deliveredOrders }}
                </span>
            </div>



            <div class="card card-body px-2 py-3 mx-4 p bg-danger   rounded my-3 order-statistics  position-relative">

                <i class="fas fa-window-close" style="margin-bottom: 10px ; font-size:30px"></i>

                <a href="#"><span class="d-block " style=" font-size:20px ; color:#fff">Cancelled Orders</span></a>
                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                    {{ $cancelledOrders }}
                </span>
            </div>



        </div>
    </div>


    {{-- orders --}}

    <div class="row">

        <div class="col-md-12">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->

                <div class="card-header d-flex flex-row align-items-center flex-0 border-bottom">

                    <div class="d-block">
                        <div class="h3 fw-normal text-gray mb-2">Today Orders</div>
                        <div class="h3 fw-extrabold text-success">{{ $orders }} Order</div>
                    </div>

                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="chart-area">
                        <canvas id="ordersChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
        {{--  Current Month Orders --}}









            <div class="row">
                <div class="col-12 col-xl-12">
                    <div class="row">





                        {{-- latest orders --}}

                        <div class="col-12 mb-4">
                            <div class="card border-0 shadow">
                                <div class="card-header">
                                    <div class="row align-items-center">
                                        <div class="col">
                                            <h2 class="fs-5 fw-bold mb-0">Latest 20 Orders</h2>
                                        </div>
                                        <div class="col text-end">
                                            <a href="{{ route('admin.orders.index') }}"
                                                class="btn btn-sm btn-primary">See All Orders</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table class="table align-items-center table-flush">
                                        <thead class="thead-light">
                                            <tr>
                                                <th class="border-bottom" scope="col">User Name</th>
                                                <th class="border-bottom" scope="col">Order Number</th>
                                                <th class="border-bottom" scope="col">Total</th>
                                                <th class="border-bottom" scope="col">Status</th>
                                                <th class="border-bottom" scope="col">Date</th>
                                                <th class="border-bottom" scope="col">Show</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($lastFiveOrders as $order)
                                                <tr>
                                                    <th class="text-gray-900" scope="row">
                                                        {{ $order->user_name }}
                                                    </th>
                                                    <th class="text-gray-900" scope="row">
                                                        {{ $order->order_number }}
                                                    </th>
                                                    <td class="fw-bolder text-gray-500">
                                                        {{ number_format($order->product_total_price + $order->total_taxes_price) }}
                                                        EGP
                                                    </td>
                                                    <td class=" font-weight-bold">


                                        @php
                                            $order_status_color = 'secondary';

                                            if ($order->status == 'inprogress') {
                                                $order_status_color = 'info';
                                            } elseif ($order->status == 'delivered') {
                                                $order_status_color = 'success';
                                            } elseif ($order->status == 'cancelled') {
                                                $order_status_color = 'danger';
                                            }

                                        @endphp
                                        <p class="h6">

                                            <span class="badge badge-lg bg-{{ $order_status_color }}">
                                                {{ ucfirst($order->status) }}</span>

                                        </p>
                                    </td>


                                                    <td class="fw-bolder text-gray-500 ">


                                                        <span class="d-block"><i
                                                                class="fas fa-calendar-Today text-info"></i>
                                                            {{ $order->created_at }} </span>


                                                    </td>

                                                    <td class="fw-bolder text-gray-500">
                                                        <a title="GO To Order"
                                                            href="{{ route('admin.orders.show', $order->id) }}"
                                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                                            class="btn btn-sm btn-primary d-inline-flex align-items-center">
                                                            <i class="fas fa-eye icon icon-xxs "></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endforeach

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        {{-- latest orders --}}





                    </div>
                </div>

            </div>

            @section('scripts')
            <!-- ChartJS -->
            {{-- <script src={{ asset('dashboard/js/plugin/Chart.min.js') }}></script> --}}
            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>



            <script>



               let ctx2 = document.getElementById("ordersChart");

        const data2 = {
               labels: [
                        @foreach ($ordersCount as $orderCount)
                            '{{ $orderCount->hour }}',
                        @endforeach

                    ],
            datasets: [{
                label: 'Orders',
                data: [
                     @foreach ($ordersCount as $orderCount)
                                {{ $orderCount->count }},
                            @endforeach
                ],

                pointStyle: 'circle',
                pointRadius: 10,
                pointHoverRadius: 15
            }]
        };
        const config2 = {
            type: 'bar',
            data: data2,
            options: {
                responsive: true,
                plugins: {
                    title: {
                        display: false,
                        text: (ctx) => 'Current Month  Total Orders Is 2,510,00 ',
                    }
                }
            }
        };

        new Chart(ctx2, config2);


            </script>
        @endsection


            @else


            <div class="col-12 col-sm-6 col-xl-3 mb-4">
    <div class="card border-0 shadow">
        <div class="card-body">
            <div class="row d-block d-xl-flex align-items-center">
                <div
                    class="col-12 col-xl-5 text-xl-center mb-3 mb-xl-0 d-flex align-items-center justify-content-xl-center">
                    <div class="icon-shape icon-shape-{{ $colores->random() }} rounded me-4 me-sm-0">

                        <i class="fa-solid fa-money-bills icon"></i>
                    </div>
                    <div class="d-sm-none">
                        <h2 class="h5">Income</h2>
                        <div class="fw-extrabold mb-1">{{ $income }}</div>
                    </div>
                </div>
                <div class="col-12 col-xl-7 px-xl-0">
                    <div class="d-none d-sm-block">
                        <h2 class="h6 text-gray-400 mb-0">Income</h2>
                        <div class="fw-extrabold mb-2">{{ $income }}</div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
        @endif
            @endsection




