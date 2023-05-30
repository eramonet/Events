@extends('layouts.admin.master')
@section('title')
    Create New Occasion
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

                    <li class="breadcrumb-item active" aria-current="page">Create New Occasion</li>

                </ol>
            </nav>
            <h2 class="h4">Create New Occasion</h2>

        </div>

    </div>






    {{-- on top --}}


    <form action="{{ route('admin.occasion.store') }}" method="POST" enctype="multipart/form-data">


        @csrf
        @method('POST')
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
                                class="form-control @error('title_ar') is-invalid @enderror" value="{{ old('title_ar') }}">
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
                                class="form-control @error('title_en') is-invalid @enderror" value="{{ old('title_en') }}">
                        </div>


                        @error('title_en')
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
                                <option> select city</option>
                                @foreach ($cities as $city)
                                    <option value="{{ $city->id }}">{{ $city->title_en }}</option>
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

                    <div class="col-md-6">
                        <div class="form-group mb-4">
                            <label for="for_what">For What <span class="text-danger">*</span></label>
                            <select required name="for_what" id="region"
                                class="form-select @error('for_what') is-invalid @enderror">
                                <option value="hall">Halls</option>
                                <option value="product">Products</option>
                                <option value="both">Both</option>
                            </select>
                        </div>


                        @error('for_what')
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
                SEO (Search Engine Optimization) Information


            </div>

            <div class="card-body">

                <div class="row">





                    {{-- description_ar --}}
                    <div class="col-md-12">
                        <div class="form-group mb-4">
                            <label for="description_ar"> Description In Arabic </label>


                            <textarea dir="rtl" name="description_ar" id="description_ar" cols="30" rows="3"
                                class="form-control @error('description_ar') is-invalid @enderror">{{ old('description_ar') }}</textarea>
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
                    <div class="col-md-12">
                        <div class="form-group mb-4">
                            <label for="description_en"> Description In English </label>


                            <textarea name="description_en" id="description_en" cols="30" rows="3"
                                class="form-control @error('description_en') is-invalid @enderror">{{ old('description_en') }}</textarea>
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

                </div>

            </div>
        </div>






        <div class="card mb-4">
            <div class="card-header">
                Icon
            </div>

            <div class="card-body">
                {{-- icon --}}
                <div class="form-group mb-4 d-flex justify-content-center">
                    <input accept="image/*" type="file" name="icon" data-max-file-size="10M"
                        class="dropify @error('icon') is-invalid @enderror" value="{{ old('icon') }}">
                </div>


                @error('primary_image')
                    <div class="d-flex justify-content-center ">

                        <div class="text-danger">
                            <strong>{{ $message }}</strong>
                        </div>
                    </div>
                @enderror

                {{-- image --}}

            </div>
        </div>




        <div class="card mb-4">
            <div class="card-header">
                Image
            </div>

            <div class="card-body">
                {{-- image --}}

                <span class="text-danger">Prefer
                    {{ config('imageDimensions.products_categories.width') . '*' . config('imageDimensions.products_categories.height') }}
                    Pixels</span>
                <div class="form-group mb-4 d-flex justify-content-center">
                    <input accept="image/*" type="file" name="primary_image" data-max-file-size="10M"
                        class="dropify @error('primary_image') is-invalid @enderror" value="{{ old('primary_image') }}">
                </div>


                @error('primary_image')
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
            Create
            <i class="fas fa-plus icon icon-xs ms-2"></i>
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



        $('#parent_id').select2({
            width: "100%"
        });
    </script>

    <script>
        $(document).on('change', '#city', function() {


            var location_id = document.querySelector("#city").value;

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
