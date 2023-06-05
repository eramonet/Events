@extends('layouts.admin.master')
@section('title')
    Complete Data For Acceptance
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

                    <li class="breadcrumb-item active" aria-current="page">Complete Data For Acceptance</li>

                </ol>
            </nav>
            <h2 class="h4">Complete Data For Acceptance</h2>

        </div>

    </div>






    {{-- on top --}}


    <form action="{{ route('admin.become.accpted', $vendor->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="card mb-4">
            <div class="card-header">
                Basic Information
            </div>

            <div class="card-body">



                <div class="row">





                    {{-- title_ar --}}
                    <div class="col-md-6">
                        <div class="form-group mb-4">
                            <label for="title_ar">Title In Arabic <span class="text-danger">*</span></label>
                            <input dir="rtl" required type="text" name="title_ar"
                                class="form-control @error('title_ar') is-invalid @enderror"
                                value="{{ $vendor->title_ar }}">
                        </div>


                        @error('title_ar')
                            <div class="d-flex justify-content-center ">

                                <div class="text-danger">
                                    <strong>{{ $message }}</strong>
                                </div>
                            </div>
                        @enderror
                    </div>

                    {{-- title_ar --}}


                    {{-- title_en --}}
                    <div class="col-md-6">
                        <div class="form-group mb-4">
                            <label for="title_en">Title In English <span class="text-danger">*</span></label>
                            <input required type="text" name="title_en"
                                class="form-control @error('title_en') is-invalid @enderror"
                                value="{{ $vendor->name }}">
                        </div>


                        @error('title_en')
                            <div class="d-flex justify-content-center ">

                                <div class="text-danger">
                                    <strong>{{ $message }}</strong>
                                </div>
                            </div>
                        @enderror
                    </div>

                    {{-- title_en --}}


                    {{-- email --}}
                    <div class="col-md-6">
                        <div class="form-group mb-4">
                            <label for="email">Email <span class="text-danger">*</span></label>
                            <input required type="email" name="email"
                                class="form-control @error('email') is-invalid @enderror" value="{{ $vendor->email }}">
                        </div>


                        @error('email')
                            <div class="d-flex justify-content-center ">

                                <div class="text-danger">
                                    <strong>{{ $message }}</strong>
                                </div>
                            </div>
                        @enderror
                    </div>

                    {{-- email --}}


                    {{-- phone --}}
                    <div class="col-md-6">
                        <div class="form-group mb-4">
                            <label for="phone">Phone <span class="text-danger">*</span></label>
                            <input required type="text" name="phone"
                                class="form-control @error('phone') is-invalid @enderror" value="{{ $vendor->phone_number }}">
                        </div>


                        @error('phone')
                            <div class="d-flex justify-content-center ">

                                <div class="text-danger">
                                    <strong>{{ $message }}</strong>
                                </div>
                            </div>
                        @enderror
                    </div>

                    {{-- phone --}}



                    {{-- commission --}}
                    <div class="col-md-6">
                        <div class="form-group mb-4">
                            <label for="commission">Commission % <span class="text-danger">*</span></label>
                            <input required type="number" name="commission"
                                class="form-control @error('commission') is-invalid @enderror"
                                value="{{ $vendor->commission }}">
                        </div>


                        @error('commission')
                            <div class="d-flex justify-content-center ">

                                <div class="text-danger">
                                    <strong>{{ $message }}</strong>
                                </div>
                            </div>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <div class="form-group mb-4">
                            <label for="commission">Max Hall numbers<span class="text-danger">*</span></label>
                            <input required type="number" name="halls_count"
                                class="form-control @error('halls_count') is-invalid @enderror"
                                value="{{ $vendor->halls_count }}">
                        </div>


                        @error('halls_count')
                            <div class="d-flex justify-content-center ">

                                <div class="text-danger">
                                    <strong>{{ $message }}</strong>
                                </div>
                            </div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <div class="form-group mb-4">
                            <label for="vendor_admin">max Vendor Count<span class="text-danger">*</span></label>
                            <input required type="number" name="vendor_admin"
                                class="form-control @error('vendor_admin') is-invalid @enderror"
                                value="{{ $vendor->vendor_admin }}">
                        </div>


                        @error('vendor_admin')
                            <div class="d-flex justify-content-center ">

                                <div class="text-danger">
                                    <strong>{{ $message }}</strong>
                                </div>
                            </div>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <div class="form-group mb-4">
                            <label for="products_count">max products Count<span class="text-danger">*</span></label>
                            <input required type="number" name="products_count"
                                class="form-control @error('products_count') is-invalid @enderror"
                                value="{{ $vendor->products_count }}">
                        </div>


                        @error('products_count')
                            <div class="d-flex justify-content-center ">

                                <div class="text-danger">
                                    <strong>{{ $message }}</strong>
                                </div>
                            </div>
                        @enderror
                    </div>



                    <div class="col-md-6">
                        <div class="form-group mb-4">
                            <label for="status">Status <span class="text-danger">*</span></label>
                            <select required name="status" id="status"
                                class="form-select @error('status') is-invalid @enderror">
                                <option value="1" {{ $vendor->status == '1' ? 'selected' : '' }}>Active</option>
                                <option value="0" {{ $vendor->status == '0' ? 'selected' : '' }}>InActive</option>
                            </select>
                        </div>


                        @error('status')
                            <div class="d-flex justify-content-center ">

                                <div class="text-danger">
                                    <strong>{{ $message }}</strong>
                                </div>
                            </div>
                        @enderror
                    </div>



                    <div class="col-md-6">
                        <div class="form-group mb-4">
                            <label for="type">Type <span class="text-danger">*</span></label>
                            <select required name="type" id="type"
                                class="form-select @error('status') is-invalid @enderror">
                                <option value="product" {{ $vendor->type == 'product' ? 'selected' : '' }}>products
                                </option>
                                <option value="hall" {{ $vendor->type == 'hall' ? 'selected' : '' }}>Halls</option>
                                <option value="product_hall" {{ $vendor->type == 'product_hall' ? 'selected' : '' }}>
                                    Products and Halls</option>
                            </select>
                        </div>


                        @error('type')
                            <div class="d-flex justify-content-center ">

                                <div class="text-danger">
                                    <strong>{{ $message }}</strong>
                                </div>
                            </div>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <div class="form-group mb-4">
                            <label for="city">city <span class="text-danger">*</span></label>
                            <select required name="city_id" id="city"
                                class="form-select @error('city_id') is-invalid @enderror">
                                @foreach ($citys as $city)
                                    <option value="{{ $city->id }}" {{ old('city') }}
                                        @if ($city->id == $vendor->city_id) selected @endif>
                                        {{ $city->title_en }}</option>
                                @endforeach

                            </select>
                        </div>


                        @error('city_id')
                            <div class="d-flex justify-content-center ">

                                <div class="text-danger">
                                    <strong>{{ $message }}</strong>
                                </div>
                            </div>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <div class="form-group mb-4">
                            <label for="region_id">Region <span class="text-danger">*</span></label>
                            <select required name="region_id" id="region"
                                class="form-select @error('region_id') is-invalid @enderror">
                                @foreach ($regions as $region)
                                    <option value="{{ $region->id }}" {{ old('city') }}
                                        @if ($region->id == $vendor->city_id) selected @endif>
                                        {{ $region->title_en }}</option>
                                @endforeach


                            </select>
                        </div>


                        @error('region_id')
                            <div class="d-flex justify-content-center ">

                                <div class="text-danger">
                                    <strong>{{ $message }}</strong>
                                </div>
                            </div>
                        @enderror
                    </div>

                    {{-- status --}}
                    <div class="col-md-6">
                        <div class="form-group mb-4">
                            <label for="account">account <span class="text-danger">*</span></label>
                            <select required name="account" id="account"
                                class="form-select @error('account') is-invalid @enderror">
                                <option value="individual" {{ $vendor->account == 'individual' ? 'selected' : '' }}>
                                    individual
                                </option>
                                <option value="company" {{ $vendor->account == 'company' ? 'selected' : '' }}>company
                                </option>
                            </select>
                        </div>


                        @error('account')
                            <div class="d-flex justify-content-center ">

                                <div class="text-danger">
                                    <strong>{{ $message }}</strong>
                                </div>
                            </div>
                        @enderror
                    </div>


                    <div class="col-md-6 d-none" id="commercial_registration_number">
                        <div class="form-group mb-4">
                            <label for="commercial_registration_number">commercial registration number<span
                                    class="text-danger">*</span></label>
                            <input type="number" name="commercial_registration_number"
                                class="form-control @error('commercial_registration_number') is-invalid @enderror"
                                value="{{ $vendor->commercial_registration_number }}">
                        </div>


                        @error('commercial_registration_number')
                            <div class="d-flex justify-content-center ">

                                <div class="text-danger">
                                    <strong>{{ $message }}</strong>
                                </div>
                            </div>
                        @enderror
                    </div>


                    <div class="col-md-6 d-none" id="Tax_Number">
                        <div class="form-group mb-4">
                            <label for="Tax_Number">Tax Number<span class="text-danger">*</span></label>
                            <input type="number" name="Tax_Number"
                                class="form-control @error('Tax_Number') is-invalid @enderror"
                                value="{{ $vendor->Tax_Number }}">
                        </div>


                        @error('Tax_Number')
                            <div class="d-flex justify-content-center ">

                                <div class="text-danger">
                                    <strong>{{ $message }}</strong>
                                </div>
                            </div>
                        @enderror
                    </div>

                    <div class="col-md-6 d-none" id="Tax_Number_expiration_date">
                        <div class="form-group mb-4">
                            <label for="Tax_Number_expiration_date">Tax Number expiration date<span
                                    class="text-danger">*</span></label>
                            <input type="date" name="Tax_Number_expiration_date"
                                class="form-control @error('Tax_Number_expiration_date') is-invalid @enderror"
                                value="{{ $vendor->Tax_Number_expiration_date }}">
                        </div>


                        @error('Tax_Number_expiration_date')
                            <div class="d-flex justify-content-center ">

                                <div class="text-danger">
                                    <strong>{{ $message }}</strong>
                                </div>
                            </div>
                        @enderror
                    </div>











                </div>

            </div>
        </div>








        <div class="card mb-4">
            <div class="card-header">
                Summary
            </div>

            <div class="card-body">


                <div class="row">


                    {{-- summary_ar --}}
                    <div class="col-md-12">
                        <div class="form-group mb-4">
                            <label for="summary_ar"> Summary In Arabic <span class="text-danger">*</span> </label>


                            <textarea editor dir="rtl" name="summary_ar" id="summary_ar" cols="30" rows="6"
                                class="form-control @error('summary_ar') is-invalid @enderror">{!! $vendor->summary_ar !!}</textarea>
                        </div>


                        @error('summary_ar')
                            <div class="d-flex justify-content-center ">

                                <div class="text-danger">
                                    <strong>{{ $message }}</strong>
                                </div>
                            </div>
                        @enderror
                    </div>

                    {{-- summary_ar --}}



                    {{-- summary_en --}}
                    <div class="col-md-12">
                        <div class="form-group mb-4">
                            <label for="summary_en"> Summary In English <span class="text-danger">*</span> </label>
                            <textarea editor name="summary_en" id="summary_en" cols="30" rows="6"
                                class="form-control @error('summary_en') is-invalid @enderror">{!! $vendor->summary_en !!}</textarea>
                        </div>


                        @error('summary_en')
                            <div class="d-flex justify-content-center ">

                                <div class="text-danger">
                                    <strong>{{ $message }}</strong>
                                </div>
                            </div>
                        @enderror
                    </div>

                    {{-- summary_en --}}



                </div>

            </div>
        </div>














        <div class="card mb-4">

            <div class="card-header">
                SEO (Search Engine Optimization) Information


            </div>

            <div class="card-body">

                <div class="row">





                    {{-- description_ar --}}
                    <div class="col-md-6">
                        <div class="form-group mb-4">
                            <label for="description_ar"> Meta Description In Arabic </label>


                            <textarea required dir="rtl" name="description_ar" id="description_ar" cols="30" rows="3"
                                class="form-control @error('description_ar') is-invalid @enderror">{{ $vendor->description_ar }}</textarea>
                        </div>


                        @error('description_ar')
                            <div class="d-flex justify-content-center ">

                                <div class="text-danger">
                                    <strong>{{ $message }}</strong>
                                </div>
                            </div>
                        @enderror
                    </div>

                    {{-- description_ar --}}



                    {{-- description_en --}}
                    <div class="col-md-6">
                        <div class="form-group mb-4">
                            <label for="description_en"> Meta Description In English </label>


                            <textarea name="description_en" id="description_en" cols="30" rows="3"
                                class="form-control @error('description_en') is-invalid @enderror">{{ $vendor->description_en }}</textarea>
                        </div>


                        @error('description_en')
                            <div class="d-flex justify-content-center ">

                                <div class="text-danger">
                                    <strong>{{ $message }}</strong>
                                </div>
                            </div>
                        @enderror
                    </div>

                    {{-- description_en --}}






                    {{-- keywords_ar --}}
                    <div class="col-md-6">
                        <div class="form-group mb-4">
                            <label for="keywords_ar"> Meta Keywords In Arabic </label>


                            <textarea dir="rtl" name="keywords_ar" id="keywords_ar" cols="30" rows="2"
                                class="form-control @error('keywords_ar') is-invalid @enderror">{{ $vendor->keywords_ar }}</textarea>
                        </div>


                        @error('keywords_ar')
                            <div class="d-flex justify-content-center ">

                                <div class="text-danger">
                                    <strong>{{ $message }}</strong>
                                </div>
                            </div>
                        @enderror
                    </div>

                    {{-- keywords_ar --}}



                    {{-- keywords_en --}}
                    <div class="col-md-6">
                        <div class="form-group mb-4">
                            <label for="keywords_en"> Meta Keywords In English </label>


                            <textarea name="keywords_en" id="keywords_en" cols="30" rows="2"
                                class="form-control @error('keywords_en') is-invalid @enderror">{{ $vendor->keywords_en }}</textarea>
                        </div>


                        @error('keywords_en')
                            <div class="d-flex justify-content-center ">

                                <div class="text-danger">
                                    <strong>{{ $message }}</strong>
                                </div>
                            </div>
                        @enderror
                    </div>

                    {{-- keywords_en --}}























                </div>

            </div>
        </div>











        <div class="card mb-4">
            <div class="card-header">
                Image
            </div>

            <div class="card-body">
                {{-- image --}}

                <span>Prefer 800*800 Pexel</span>
                <div class="form-group mb-4 d-flex justify-content-center">
                    <input data-default-file="{{ $vendor->image_url }}" accept="image/*" type="file" name="image"
                        data-max-file-size="10M" class="dropify @error('image') is-invalid @enderror"
                        value="{{ old('image') }}">
                </div>


                @error('image')
                    <div class="d-flex justify-content-center ">

                        <div class="text-danger">
                            <strong>{{ $message }}</strong>
                        </div>
                    </div>
                @enderror

                {{-- image --}}

            </div>
        </div>










        <button type="submit" class="btn btn-primary d-block m-auto">
            Save
            <i class="fa-regular fa-pen-to-square icon icon-xs ms-2"></i>
        </button>
    </form>
@endsection


@section('scripts')
    <script src="{{ asset('layouts/admin/js/ckeditor.js') }}"></script>
    <script>
        ClassicEditor
            .create(document.querySelector('#summary_ar'), {
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
            .create(document.querySelector('#summary_en'), {
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
    </script>

    <script>
        var tax_number_input_expiration_date = document.querySelector("#Tax_Number_expiration_date");
        var commercial_registration_number_input = document.querySelector("#commercial_registration_number");
        var Tax_Number_input = document.querySelector("#Tax_Number");

        $(document).ready(function() {
            var account_input = document.querySelector("#account").value;

            if (account_input === 'company') {

                tax_number_input_expiration_date.classList.remove("d-none");
                Tax_Number_input.classList.remove("d-none");
                commercial_registration_number_input.classList.remove("d-none");

                document.querySelector("[name='Tax_Number_expiration_date']").required = true;
                document.querySelector("[name='commercial_registration_number']").required = true;
                document.querySelector("[name='Tax_Number']").required = true;
            }
            if (account_input === 'individual') {
                tax_number_input_expiration_date.classList.add("d-none");
                Tax_Number_input.classList.add("d-none");
                commercial_registration_number_input.classList.add("d-none");

                document.querySelector("[name='Tax_Number_expiration_date']").value = null;
                document.querySelector("[name='commercial_registration_number']").value = null;
                document.querySelector("[name='Tax_Number']").value = null;

                document.querySelector("[name='Tax_Number_expiration_date']").required = false;
                document.querySelector("[name='commercial_registration_number']").required = false;
                document.querySelector("[name='Tax_Number']").required = false;
            }
        });


        document.querySelector("#account").addEventListener('change', function() {
            var account_input = document.querySelector("#account").value;


            if (account_input === 'company') {

                tax_number_input_expiration_date.classList.remove("d-none");
                Tax_Number_input.classList.remove("d-none");
                commercial_registration_number_input.classList.remove("d-none");

                document.querySelector("[name='Tax_Number_expiration_date']").required = true;
                document.querySelector("[name='commercial_registration_number']").required = true;
                document.querySelector("[name='Tax_Number']").required = true;

            }
            if (account_input === 'individual') {
                tax_number_input_expiration_date.classList.add("d-none");
                Tax_Number_input.classList.add("d-none");
                commercial_registration_number_input.remove("d-none");

                document.querySelector("[name='Tax_Number_expiration_date']").required = false;
                document.querySelector("[name='commercial_registration_number']").required = false;
                document.querySelector("[name='Tax_Number']").required = false;
            }



        })




        document.getElementsByName("Thing")[0]
    </script>

    <script>
        $(document).on('change', '#countrys', function() {
            var location_id = document.querySelector("#countrys").value;


            //alert(company_id);
            if (location_id) {
                $.ajax({
                    type: "GET",
                    // url:"{{ url('get-category-units/') }}/?category_id="+category_id,
                    url: "/acp/cities/cityByCountryId/" + location_id,
                    success: function(res) {


                        if (res) {
                            console.log(res);
                            $("#city").empty();
                            res.forEach(data => {
                                $("#city").append('<option value="' + data.id + '" >' + data
                                    .title_en + '</option>');
                            })


                        }
                        if (res.length === 0) {
                            $("#city").empty();
                        }
                    }
                });
            } else {
                $("#city").empty();
            }
        });
    </script>

    <script>
        $(document).on('change', '#city', function() {
            var location_id = document.querySelector("#city").value;


            //alert(company_id);
            if (location_id) {
                $.ajax({
                    type: "GET",
                    // url:"{{ url('get-category-units/') }}/?category_id="+category_id,
                    url: "/acp/regions/getById/" + location_id,
                    success: function(res) {


                        if (res) {
                            console.log(res);
                            $("#region").empty();
                            res.forEach(data => {
                                $("#region").append('<option value="' + data.id + '" >' + data
                                    .title_en + '</option>');
                            })


                        }
                        if (res.length === 0) {
                            $("#region").empty();
                        }
                    }
                });
            } else {
                $("#region").empty();
            }
        });
    </script>
@endsection
