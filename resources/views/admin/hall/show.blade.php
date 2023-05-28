@php
    $getPackages = App\Models\HallPackage::where('hall_id', $hall->id)->pluck('package_id');
    $packages = App\Models\Package::whereIn('id', $getPackages)->get();
    $getcats = App\Models\CategoryHall::where('hall_id', $hall->id)->pluck('category_id');
    $cats = App\Models\PackageOption::whereIn('category_id', $getcats)->pluck('category_id');
    $options = App\Models\PackageOptionCategory::whereIn('id', $cats)->get();

@endphp
@extends('layouts.admin.master')
@section('title')
    Show Hall
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
                        <a href="{{ route('admin.halls.index') }}">Halls</a>
                    </li>

                    <li class="breadcrumb-item active" aria-current="page">{{ $hall->title_en }} Details</li>

                </ol>
            </nav>
            <h2 class="h4">{{ $hall->title_en }} Details</h2>

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
                                        <p class="h6"> <img src="{{ $hall->primary_image_url }}" width="100px"></p>
                                    </td>

                                </tr>

                                <!-- Item -->
                                <tr>
                                    <td class="">
                                        <p class="h6"> Hall Name</p>
                                    </td>
                                    <td class=" font-weight-bold">
                                        <p class="h6"> {{ $hall->title_en }}</p>
                                    </td>

                                </tr>
                                <!-- End of Item -->
                                <tr>
                                    <td class="">
                                        <p class="h6"> Hall Email</p>
                                    </td>
                                    <td class=" font-weight-bold">
                                        <p class="h6"> {{ $hall->email }} </p>
                                    </td>

                                </tr>

                                <tr>
                                    <td class="">
                                        <p class="h6"> Hall Phone</p>
                                    </td>
                                    <td class=" font-weight-bold">
                                        <p class="h6"> {{ $hall->phone }} </p>
                                    </td>

                                </tr>

                                <tr>
                                    <td class="">
                                        <p class="h6"> Hall Address</p>
                                    </td>
                                    <td class=" font-weight-bold">
                                        <p class="h6"> {{ $hall->address_en }} </p>
                                    </td>

                                </tr>

                                <tr>
                                    <td class="">
                                        <p class="h6"> Hall Guest Capacity</p>
                                    </td>
                                    <td class=" font-weight-bold">
                                        <p class="h6"> {{ number_format($hall->guests_capacity) }} Guests</p>
                                    </td>

                                </tr>


                            </tbody>
                        </table>
                    </div>
                </div>
            </div>



            <div class="col-md-12">
                <div class="card card-body my-4">
                    <h4>Hall Packages</h4>
                    <div class="table-responsive">

                        <table class="table table-hover table-centered table-striped table-bordered text-center">
                            <thead>
                                <tr>
                                    <th class="border-gray-200">Package Image </th>
                                    <th class="border-gray-200">Package Name</th>
                                    <th class="border-gray-200">Extra Guest Price </th>
                                    <th class="border-gray-200">Number Of Tables</th>
                                    <th class="border-gray-200">Number Of Guests</th>
                                    <th class="border-gray-200">fake Price</th>
                                    <th class="border-gray-200">real Price</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($packages as $package)
                                    <tr>
                                        <td><img src="{{ $package->image_url }}" width="80px"></td>
                                        <td><a href="{{ route("admin.packages.show",$package->id) }}">{{ $package->title_en }}</a></td>
                                        <td>{{ $package->extra_guest_price }} AED</td>
                                        <td>{{ number_format($package->number_of_tables) }}</td>
                                        <td>{{ number_format($package->number_of_guests) }}</td>
                                        <td>{{ $package->fake_price }} AED</td>
                                        <td>{{ $package->real_price }} AED</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>


            <div class="col-md-12">
                <div class="card card-body my-4">
                    <h4>Options</h4>
                    <div class="table-responsive">

                        <table class="table table-hover table-centered table-striped table-bordered text-center">
                            <thead>
                                <tr>

                                    <th class="border-gray-200">Option Image </th>
                                    <th class="border-gray-200">Option Name</th>
                                    <th class="border-gray-200">Quantity</th>
                                    <th class="border-gray-200">Price</th>
                                    <th class="border-gray-200">Total Price</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($options as $option)
                                    <tr>
                                        <td><img src="{{ $option->image_url }}" width="80px"></td>
                                        <td>{{ $option->title_en }}</td>
                                        <td>{{ number_format($option->quantity) }} Item</td>
                                        <td>{{ number_format($option->price) }} AED</td>
                                        <td>{{ number_format($option->price * $option->quantity) }} AED</td>
                                     </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
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
