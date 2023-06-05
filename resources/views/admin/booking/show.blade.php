@extends('layouts.admin.master')
@section('title')
    Show Product
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
                    <li class="breadcrumb-item ">
                        <a href="{{ route('admin.hall-booking.successfullBookings') }}">Halls Bookings</a>
                    </li>

                    <li class="breadcrumb-item active" aria-current="page">{{ $booking->hall->title_en }} Booking</li>

                </ol>
            </nav>
            <h2 class="h4">{{ $booking->hall->title_en }} Booking</h2>

        </div>

    </div>

    {{-- on top --}}

    <div id="order_details_page">
        {{-- first section --}}
        <div class="row">
            <!-- hall details -->
            <div class="col-md-12">
                <div class="card card-body my-4">
                    <h4>Hall Details</h4>
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover">

                            <tbody>


                                <tr>
                                    <td class="">
                                        <p class="h6"> Hall Image</p>
                                    </td>
                                    <td class=" font-weight-bold">
                                        <p class="h6"> <img src="{{ $booking->hall->primary_image_url }}"
                                                width="100px"></p>
                                    </td>

                                </tr>

                                <!-- Item -->
                                <tr>
                                    <td class="">
                                        <p class="h6"> Hall Name</p>
                                    </td>
                                    <td class=" font-weight-bold">
                                        <p class="h6"> {{ $booking->hall->title_en }}</p>
                                    </td>

                                </tr>
                                <!-- End of Item -->
                                <tr>
                                    <td class="">
                                        <p class="h6"> Hall Email</p>
                                    </td>
                                    <td class=" font-weight-bold">
                                        <p class="h6"> {{ $booking->hall->email }} </p>
                                    </td>

                                </tr>

                                <tr>
                                    <td class="">
                                        <p class="h6"> Hall Phone</p>
                                    </td>
                                    <td class=" font-weight-bold">
                                        <p class="h6"> {{ $booking->hall->phone }} </p>
                                    </td>

                                </tr>

                                <tr>
                                    <td class="">
                                        <p class="h6"> Hall Address</p>
                                    </td>
                                    <td class=" font-weight-bold">
                                        <p class="h6"> {{ $booking->hall->address_en }} </p>
                                    </td>

                                </tr>

                                <tr>
                                    <td class="">
                                        <p class="h6"> Hall Guest Capacity</p>
                                    </td>
                                    <td class=" font-weight-bold">
                                        <p class="h6"> {{ number_format($booking->hall->guests_capacity) }} Guests</p>
                                    </td>

                                </tr>


                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- user details section -->
            <div class="col-md-12">


                <div class="card card-body my-4">
                    <h4>Customer Details</h4>
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover">

                            <tbody>
                                <!-- Item -->
                                <tr>
                                    <td class="">
                                        <p class="h6"> Customer Name</p>
                                    </td>
                                    <td class=" font-weight-bold">



                                        <p class="h6">
                                            @if ($booking->user)
                                                <a class=" text-info"
                                                    href="{{ route('admin.users.index', ['user_id' => $booking->user->id]) }}">{{ $booking->user->name }}</a>
                                            @else
                                                {{ $booking->user->name }}
                                            @endif
                                        </p>

                                    </td>

                                </tr>
                                <!-- End of Item -->


                                <!-- Item -->
                                <tr>
                                    <td class="">
                                        <p class="h6"> Customer Phone</p>
                                    </td>
                                    <td class=" font-weight-bold">
                                        <p class="h6">
                                            <a class="text-info"
                                                href="tel:{{ $booking->user->phone }}">{{ $booking->user->phone }}</a>

                                        </p>
                                    </td>

                                </tr>
                                <!-- End of Item -->


                                <!-- Item -->
                                <tr>
                                    <td class="">
                                        <p class="h6"> Customer Email</p>
                                    </td>
                                    <td class=" font-weight-bold">
                                        <p class="h6">
                                            <a class="text-info"
                                                href="mailto:{{ $booking->user->email }}">{{ $booking->user->email }}</a>

                                        </p>
                                    </td>

                                </tr>
                                <!-- End of Item -->

                                <!-- Item -->
                                <tr>
                                    <td class="">
                                        <p class="h6"> Customer Address</p>
                                    </td>
                                    <td class=" font-weight-bold">

                                        <p class="h6">{{ $booking->user->address }}
                                        </p>

                                    </td>

                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- package details section -->
            <div class="col-md-12">
                <div class="card card-body my-4">

                    <div class="table-responsive">
                        <h4>Package Details</h4>
                        <table class="table table-bordered table-striped table-hover">

                            <tbody>
                                <!-- Item -->
                                <tr>
                                    <td class="">
                                        <p class="h6"> Package Image</p>
                                    </td>
                                    <td class=" font-weight-bold">



                                        <p class="h6">
                                            <img src="{{ $booking->packge->image_url }}" style="width: 100px">
                                        </p>

                                    </td>

                                </tr>

                                <tr>
                                    <td class="">
                                        <p class="h6"> Package Name</p>
                                    </td>
                                    <td class=" font-weight-bold">



                                        <p class="h6">
                                            {{ $booking->packge->title_en }}
                                        </p>

                                    </td>

                                </tr>
                                <!-- End of Item -->


                                <!-- Item -->
                                <tr>
                                    <td class="">
                                        <p class="h6"> Extra Guest Price</p>
                                    </td>
                                    <td class=" font-weight-bold">
                                        <p class="h6">
                                            {{ number_format($booking->packge->extra_guest_price) }} AED
                                        </p>
                                    </td>

                                </tr>

                                <tr>
                                    <td class="">
                                        <p class="h6"> Number Of Tables</p>
                                    </td>
                                    <td class=" font-weight-bold">
                                        <p class="h6">
                                            {{ number_format($booking->packge->number_of_tables) }} Tables
                                        </p>
                                    </td>

                                </tr>

                                <tr>
                                    <td class="">
                                        <p class="h6"> Number Of Guests</p>
                                    </td>
                                    <td class=" font-weight-bold">
                                        <p class="h6">
                                            {{ number_format($booking->packge->number_of_guests) }} Guests
                                        </p>
                                    </td>

                                </tr>

                                <tr>
                                    <td class="">
                                        <p class="h6"> Description</p>
                                    </td>
                                    <td class=" font-weight-bold">
                                        <p class="h6">
                                            {{ $booking->packge->description_en }} AED
                                        </p>
                                    </td>

                                </tr>

                                <tr>
                                    <td class="">
                                        <p class="h6"> Meal Description </p>
                                    </td>
                                    <td class=" font-weight-bold">
                                        <p class="h6">
                                            {{ $booking->packge->meal_description_en }} AED
                                        </p>
                                    </td>

                                </tr>

                                <tr>
                                    <td class="">
                                        <p class="h6"> Lighting System Description </p>
                                    </td>
                                    <td class=" font-weight-bold">
                                        <p class="h6">
                                            {{ $booking->packge->lighting_description_en }} AED
                                        </p>
                                    </td>

                                </tr>

                                <tr>
                                    <td class="">
                                        <p class="h6"> Sound System Description </p>
                                    </td>
                                    <td class=" font-weight-bold">
                                        <p class="h6">
                                            {{ $booking->packge->sound_description_en }} AED
                                        </p>
                                    </td>

                                </tr>

                                <tr>
                                    <td class="">
                                        <p class="h6"> Plan Of Day Description </p>
                                    </td>
                                    <td class=" font-weight-bold">
                                        <p class="h6">
                                            {{ $booking->packge->plan_of_the_day_description_en }} AED
                                        </p>
                                    </td>

                                </tr>

                                <tr>
                                    <td class="">
                                        <p class="h6"> Flowers Description </p>
                                    </td>
                                    <td class=" font-weight-bold">
                                        <p class="h6">
                                            {{ $booking->packge->flowers_description_en }} AED
                                        </p>
                                    </td>

                                </tr>

                                <tr>
                                    <td class="">
                                        <p class="h6"> Decoration Description </p>
                                    </td>
                                    <td class=" font-weight-bold">
                                        <p class="h6">
                                            {{ $booking->packge->decoration_description_en }} AED
                                        </p>
                                    </td>

                                </tr>

                                <tr>
                                    <td class="">
                                        <p class="h6"> Package Price</p>
                                    </td>
                                    <td class=" font-weight-bold">
                                        <p class="h6">
                                            {{ $booking->packge->real_price }} AED
                                        </p>
                                    </td>

                                </tr>

                                <!-- End of Item -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- booking details section -->
            <div class="col-md-12">


                <div class="card card-body my-4">
                    <h4>Booking Details</h4>
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover">

                            <tbody>
                                <!-- Item -->
                                <tr>
                                    <td class="">
                                        <p class="h6"> Booking Status</p>
                                    </td>
                                    <td class=" font-weight-bold">


                                        @php
                                            $booking_status_color = 'secondary';

                                            if ($booking->status == 'pending') {
                                                $booking_status_color = 'info';
                                            } elseif ($booking->status == 'success') {
                                                $booking_status_color = 'success';
                                            } elseif ($booking->status == 'cancelled') {
                                                $booking_status_color = 'danger';
                                            }

                                        @endphp
                                        <p class="h6">

                                            <span class="badge badge-lg bg-{{ $booking_status_color }}">
                                                {{ ucfirst($booking->status) }}</span>

                                        </p>
                                    </td>

                                </tr>
                                <!-- End of Item -->

                                <!-- Item -->
                                <tr>
                                    <td class="">
                                        <p class="h6"> Booking Date</p>
                                    </td>
                                    <td class=" font-weight-bold">

                                        @if ($booking->date)
                                            <p class="h6"> <i class="fas fa-calendar-week text-info"></i>
                                                {{ \Carbon\Carbon::parse($booking->date)->format('d/m/Y') }}
                                            </p>
                                        @else
                                            ...
                                        @endif
                                    </td>

                                </tr>
                                <!-- End of Item -->

                                <!-- Item -->
                                <tr>
                                    <td class="">
                                        <p class="h6"> Booking Time From</p>
                                    </td>

                                    @if ($booking->time_from)
                                        <td>
                                            <p class="h6"> <i class="fas fa-clock text-success"></i>
                                                {{ \Carbon\Carbon::parse($booking->time_from)->format('h:i:s A') }}
                                            </p>
                                        </td>
                                    @else
                                        ...
                                    @endif

                                </tr>
                                <!-- End of Item -->

                                <tr>
                                    <td class="">
                                        <p class="h6"> Booking Time To</p>
                                    </td>

                                    @if ($booking->time_to)
                                        <td>
                                            <p class="h6"> <i class="fas fa-clock text-success"></i>
                                                {{ \Carbon\Carbon::parse($booking->time_to)->format('h:i:s A') }}
                                            </p>
                                        </td>
                                    @else
                                        ...
                                    @endif

                                </tr>

                                <tr>
                                    <td class="">
                                        <p class="h6"> Extra Guests </p>
                                    </td>

                                    <td>
                                        <p class="h6"> <i class="fas fa-clock text-success"></i>
                                            {{ number_format($booking->extra_guest) }} Guest
                                        </p>
                                    </td>

                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="col-md-12">
                <div class="card card-body my-4">
                    <h4>Package Options</h4>
                    <div class="table-responsive">

                        <table class="table table-hover table-centered table-striped table-bordered text-center">
                            <thead>
                                <tr>
                                    <th class="border-gray-200">Category Image </th>
                                    <th class="border-gray-200">Category Name</th>
                                    <th class="border-gray-200">Option Image </th>
                                    <th class="border-gray-200">Option Name</th>
                                    <th class="border-gray-200">Quantity</th>
                                    <th class="border-gray-200">Price</th>
                                    <th class="border-gray-200">Total Price</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $total_extras = 0 ?>
                                @foreach ( $booking->packge->options as $option)
                                <tr>
                                    <td><img src="{{ $option->category->image_url }}" width="80px"></td>
                                    <td>{{ $option->category->title_en }}</td>
                                    <td><img src="{{ $option->image_url }}" width="80px"></td>
                                    <td>{{ $option->title_en }}</td>
                                    <td>{{ number_format($option->quantity) }} Item</td>
                                    <td>{{ number_format($option->price) }} AED</td>
                                    <td>{{ number_format($option->price * $option->quantity) }} AED</td>
                                    <?php $total_extras += $option->quantity * $option->price ?>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>


    </div>


    <div class="card-body">

        <div class="table-responsive">
            <table
                class="table table-centered table-hover  table-bordered table-striped  table-dark rounded text-center font-bold text-white font-weight-bolder">

                <tbody style="font-size: 18px">


                    <tr>

                        <td class="">
                            <p class="h4"> Package Price </p>
                        </td>

                        <td class="">
                            <p class="h4"> {{ number_format($booking->packge->real_price) }} AED</p>
                        </td>


                    </tr>


                    <tr>


                        <td class="">
                            <p class="h4"> Total Extra Guests Price</p>
                        </td>

                        <td class="">
                            <p class="h4">
                                {{ number_format($booking->extra_guest * $booking->packge->extra_guest_price) }} AED</p>
                        </td>


                    </tr>

                    <tr>

                        <td class="">
                            <p class="h4"> Total Extras Decorations </p>
                        </td>

                        <td class="">
                            <p class="h4"> {{ number_format($total_extras) }} AED</p>
                        </td>


                    </tr>

                    <tr>


                        <td class="">
                            <p class="h4"> Events Commission
                                [
                                {{ $booking->packge->admin->vendor ? number_format($booking->packge->admin->vendor->commission) . ' %' : 0 . ' AED' }}
                                ]
                            </p>
                        </td>

                        <td class="">
                            <p class="h4">
                                {{ $booking->packge->admin->vendor
                                    ? number_format(
                                            ( ($booking->extra_guest * $booking->packge->extra_guest_price) + $booking->packge->real_price + $total_extras) *
                                                ($booking->packge->admin->vendor->commission / 100),
                                        ) . ' AED'
                                    : ( $booking->extra_guest * $booking->packge->extra_guest_price ) + $booking->packge->real_price + $total_extras . ' AED' }}
                            </p>
                        </td>


                    </tr>






                </tbody>
            </table>



        </div>
    </div>

    <div class="alert my-4 text-center text-white" style="background: #1f2937">
        <p class="h2">Order Total Price <span class="badge badge-lg bg-success "
                style="font-size: 30px">{{ number_format( ($booking->extra_guest * $booking->packge->extra_guest_price) + $booking->packge->real_price + $total_extras) }}
            </span> AED </p>






    </div>



    <div class="card my-4">
        <div class="card-body">


            <div class="d-flex justify-content-center flex-wrap">




                @if ($booking->status == 'pending')
                    <form class="action_btn"
                        data-message="Are You Sure You Want To Move This Order To Inprogress Status ?"
                        action="{{ route('admin.bookings.successAction', $booking->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <button type="submit"
                            class="btn  btn-lg btn-success d-inline-flex align-items-center m-2 text-white">
                            <span class="fas fa-check me-2"></span>Accept

                        </button>
                    </form>
                    <form class="action_btn" data-message="Are You Sure You Want To Move This Order To Cancelled Status ?"
                        action="{{ route('admin.bookings.cancelledAction', $booking->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-lg btn-danger d-inline-flex align-items-center m-2">
                            <span class="fas fa-trash me-2"></span>Cancel
                        </button>
                    </form>

                    <a href="{{ route('admin.hall-booking.pendingBookings') }}"
                        class="btn btn-lg btn-primary d-inline-flex align-items-center m-2">
                        <i style="margin-right: 10px" class="fa fa-arrow-circle-left icon icon-xs ms-2"></i>
                        Back
                    </a>
                @endif



            </div>
        </div>
    </div>
@endsection


@section('scripts')
    <script src="{{ asset('layouts/admin/js/ckeditor.js') }}"></script>
    <script src="{{ asset('layouts/admin/js/perview-images.js') }}"></script>

    <script>
        ClassicEditor
            .create(document.querySelector('#details_ar'), {
                language: 'ar',
                toolbar: ['heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote'],
                heading: {
                    options: [{
                            model: 'paragraph',
                            title: 'Paragraph',
                            class: 'ck-heading_paragraph'
                        },
                        {
                            model: 'heading2',
                            view: 'h2',
                            title: 'Heading 2',
                            class: 'ck-heading_heading2'
                        },
                        {
                            model: 'heading3',
                            view: 'h3',
                            title: 'Heading 3',
                            class: 'ck-heading_heading3'
                        },
                        {
                            model: 'heading4',
                            view: 'h4',
                            title: 'Heading 4',
                            class: 'ck-heading_heading4'
                        },
                        {
                            model: 'heading5',
                            view: 'h5',
                            title: 'Heading 5',
                            class: 'ck-heading_heading5'
                        },
                        {
                            model: 'heading6',
                            view: 'h6',
                            title: 'Heading 6',
                            class: 'ck-heading_heading6'
                        },



                    ]
                }
            })
            .catch(error => {
                console.log(error);
            });
        ClassicEditor
            .create(document.querySelector('#details_en'), {
                toolbar: ['heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote'],
                heading: {
                    options: [{
                            model: 'paragraph',
                            title: 'Paragraph',
                            class: 'ck-heading_paragraph'
                        },
                        {
                            model: 'heading2',
                            view: 'h2',
                            title: 'Heading 2',
                            class: 'ck-heading_heading2'
                        },
                        {
                            model: 'heading3',
                            view: 'h3',
                            title: 'Heading 3',
                            class: 'ck-heading_heading3'
                        },
                        {
                            model: 'heading4',
                            view: 'h4',
                            title: 'Heading 4',
                            class: 'ck-heading_heading4'
                        },
                        {
                            model: 'heading5',
                            view: 'h5',
                            title: 'Heading 5',
                            class: 'ck-heading_heading5'
                        },
                        {
                            model: 'heading6',
                            view: 'h6',
                            title: 'Heading 6',
                            class: 'ck-heading_heading6'
                        },

                    ]
                }
            })
            .catch(error => {
                console.log(error);
            });



        $('#taxes').select2({
            width: "100%"
        });

        $('#category_id').select2({
            width: "100%"
        });


        $('#category_id').select2({
            width: "100%"
        });
        $('#occasion_id').select2({
            width: "100%"
        });

        $('#products_with').select2({
            width: "100%"
        });




        let mainCategoriesSelect = document.getElementById('category_id');
        let subCategoriesSelect = document.getElementById('subCategoriesSelect');

        $('#category_id').on('select2:select', async function(e) {
            var id = e.params.data.id;
            try {
                let url = `{{ route('admin.products-categories.subCategoryByParentId') }}?id=${id}`;
                let res = await fetch(url);
                let data = await res.json();

                let options = '';
                if (data.length) {
                    data.forEach((value, index, array) => {
                        options +=
                            `<option value='${value.id}'>${value.title_en} - ${value.title_ar} </option>`
                    })
                }

                subCategoriesSelect.innerHTML = options;
            } catch (error) {

            }

        });
    </script>
@endsection
