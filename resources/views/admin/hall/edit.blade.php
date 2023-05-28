@extends('layouts.admin.master')
@section('title')
    Edit Hall
@endsection
@section('content')
    {{-- on top --}}
    @foreach ($errors->all() as $error)
        <div class="alert alert-danger" role="alert">
            {{ $error }}
        </div>
    @endforeach
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

                    <li class="breadcrumb-item active" aria-current="page">Edit Hall</li>

                </ol>
            </nav>
            <h2 class="h4">Edit Hall</h2>

        </div>

    </div>






    {{-- on top --}}


    <form action="{{ route('admin.halls.update', $hall->id) }}" method="POST" enctype="multipart/form-data">


        @csrf
        @method('PUT')
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
                                class="form-control @error('title_ar') is-invalid @enderror" value="{{ $hall->title_ar }}">
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
                                class="form-control @error('title_en') is-invalid @enderror" value="{{ $hall->title_en }}">
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
                                class="form-control @error('email') is-invalid @enderror" value="{{ $hall->email }}">
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
                                class="form-control @error('phone') is-invalid @enderror" value="{{ $hall->phone }}">
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



                    {{-- guests_capacity --}}
                    <div class="col-md-6">
                        <div class="form-group mb-4">
                            <label for="guests_capacity">Hall guests Full capacity <span
                                    class="text-danger">*</span></label>
                            <input value="{{ $hall->guests_capacity }}" required type="number" name="guests_capacity"
                                class="form-control @error('guests_capacity') is-invalid @enderror"
                                value="{{ old('guests_capacity') }}">
                        </div>


                        @error('guests_capacity')
                            <div class="d-flex justify-content-center ">

                                <div class="text-danger">
                                    <strong>{{ $message }}</strong>
                                </div>
                            </div>
                        @enderror
                    </div>

                    {{-- guests_capacity --}}




                    {{-- status --}}
                    <div class="col-md-6">
                        <div class="form-group mb-4">
                            <label for="status">Status <span class="text-danger">*</span></label>
                            <select required name="status" id="status"
                                class="form-select @error('status') is-invalid @enderror">
                                <option value="1" {{ $hall->status == '1' ? 'selected' : '' }}>Active</option>
                                <option value="0" {{ $hall->status == '0' ? 'selected' : '' }}>InActive</option>
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

                    {{-- status --}}


                    {{-- vendor_id --}}
                    <div class="col-md-6">
                        <div class="form-group mb-4">
                            <label for="vendor_id">Vendor <span class="text-danger">*</span></label>
                            <select required name="vendor_id" id="vendor_id"
                                class="form-select @error('vendor_id') is-invalid @enderror">

                                @foreach ($vendors as $vendor)
                                    <option value="{{ $vendor->id }}"
                                        {{ $hall->vendor_id == $vendor->id ? 'selected' : '' }}>
                                        {{ $vendor->title_en . ' - ' . $vendor->title_ar }}</option>
                                @endforeach
                            </select>
                        </div>


                        @error('vendor_id')
                            <div class="d-flex justify-content-center ">

                                <div class="text-danger">
                                    <strong>{{ $message }}</strong>
                                </div>
                            </div>
                        @enderror
                    </div>

                    {{-- vendor_id --}}
                    {{ $hall->categories->pluck('id') }}
                    {{-- categories --}}
                    <div class="col-md-6">
                        <div class="form-group mb-4">
                            <label for="categories">Categories [Occasions] <span class="text-danger">*</span></label>
                            <select multiple required name="categories[]" id="categories"
                                class="form-select @error('categories') is-invalid @enderror">

                                @foreach ($hallCategories as $hallCategory)

                                    <option value="{{ $hallCategory->id }}"
                                        {{ collect($hall->categories->pluck('category_id'))->contains($hallCategory->id) ? 'selected' : '' }}
                                        >
                                        {{ $hallCategory->title_en . ' - ' . $hallCategory->title_ar }}</option>
                                @endforeach
                            </select>
                        </div>


                        @error('categories')
                            <div class="d-flex justify-content-center ">

                                <div class="text-danger">
                                    <strong>{{ $message }}</strong>
                                </div>
                            </div>
                        @enderror
                    </div>

                    {{-- categories --}}














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
                                class="form-control @error('summary_ar') is-invalid @enderror">{!! $hall->summary_ar !!}</textarea>
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
                                class="form-control @error('summary_en') is-invalid @enderror">{!! $hall->summary_en !!}</textarea>
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
                Location Information
            </div>

            <div class="card-body">



                <div class="row">





                    {{-- country_id --}}
                    <div class="col-md-6">
                        <div class="form-group mb-4">
                            <label for="country_id">Country <span class="text-danger">*</span></label>
                            <select required name="country_id" id="country_id"
                                class="form-select @error('country_id') is-invalid @enderror">

                                @foreach ($countries as $country)
                                    <option value="{{ $country->id }}"
                                        {{ $hall->country_id == $country->id ? 'selected' : '' }}>{{ $country->title_en }}
                                    </option>
                                @endforeach
                            </select>
                        </div>


                        @error('country_id')
                            <div class="d-flex justify-content-center ">

                                <div class="text-danger">
                                    <strong>{{ $message }}</strong>
                                </div>
                            </div>
                        @enderror
                    </div>

                    {{-- country_id --}}


                    {{-- city_id --}}
                    <div class="col-md-6">
                        <div class="form-group mb-4">
                            <label for="city_id">City <span class="text-danger">*</span></label>
                            <select required name="city_id" id="city_id"
                                class="form-select @error('city_id') is-invalid @enderror">


                                @foreach ($firstCountryCities as $city)
                                    <option value="{{ $city->id }}" {{ $hall->city_id == $city->id ? 'selected' : '' }}>
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

                    {{-- city_id --}}


                    {{-- address_ar --}}
                    <div class="col-md-6">
                        <div class="form-group mb-4">
                            <label for="address_ar"> Address Details In Arabic </label>


                            <textarea dir="rtl" name="address_ar" id="address_ar" cols="30" rows="3"
                                class="form-control @error('address_ar') is-invalid @enderror">{{ $hall->address_ar }}</textarea>
                        </div>


                        @error('address_ar')
                            <div class="d-flex justify-content-center ">

                                <div class="text-danger">
                                    <strong>{{ $message }}</strong>
                                </div>
                            </div>
                        @enderror
                    </div>

                    {{-- address_ar --}}



                    {{-- address_en --}}
                    <div class="col-md-6">
                        <div class="form-group mb-4">
                            <label for="address_en"> Address Details In English </label>


                            <textarea name="address_en" id="address_en" cols="30" rows="3"
                                class="form-control @error('address_en') is-invalid @enderror">{{ $hall->address_en }}</textarea>
                        </div>


                        @error('address_en')
                            <div class="d-flex justify-content-center ">

                                <div class="text-danger">
                                    <strong>{{ $message }}</strong>
                                </div>
                            </div>
                        @enderror
                    </div>

                    {{-- address_en --}}






                    {{-- latitude --}}
                    <div class="col-md-6">
                        <div class="form-group mb-4">
                            <label for="latitude"> Map Latitude </label>
                            <input required type="number" step="any" name="latitude"
                                class="form-control @error('latitude') is-invalid @enderror"
                                value="{{ $hall->latitude }}">
                        </div>


                        @error('latitude')
                            <div class="d-flex justify-content-center ">

                                <div class="text-danger">
                                    <strong>{{ $message }}</strong>
                                </div>
                            </div>
                        @enderror
                    </div>

                    {{-- latitude --}}



                    {{-- longitude --}}
                    <div class="col-md-6">
                        <div class="form-group mb-4">
                            <label for="longitude"> Map Longitude </label>
                            <input required type="number" step="any" name="longitude"
                                class="form-control @error('longitude') is-invalid @enderror"
                                value="{{ $hall->longitude }}">
                        </div>


                        @error('longitude')
                            <div class="d-flex justify-content-center ">

                                <div class="text-danger">
                                    <strong>{{ $message }}</strong>
                                </div>
                            </div>
                        @enderror
                    </div>

                    {{-- longitude --}}
















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
                            <label for="description_ar"> Meta Description In Arabic <span
                                    class="text-danger">*</span></label>


                            <textarea required dir="rtl" name="description_ar" id="description_ar" cols="30" rows="3"
                                class="form-control @error('description_ar') is-invalid @enderror">{{ $hall->description_ar }}</textarea>
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
                            <label for="description_en"> Meta Description In English <span
                                    class="text-danger">*</span></label>


                            <textarea required name="description_en" id="description_en" cols="30" rows="3"
                                class="form-control @error('description_en') is-invalid @enderror">{{ $hall->description_en }}</textarea>
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
                            <label for="keywords_ar"> Meta Keywords In Arabic <span class="text-danger">*</span></label>


                            <textarea required dir="rtl" name="keywords_ar" id="keywords_ar" cols="30" rows="2"
                                class="form-control @error('keywords_ar') is-invalid @enderror">{{ $hall->keywords_ar }}</textarea>
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
                            <label for="keywords_en"> Meta Keywords In English <span class="text-danger">*</span></label>


                            <textarea required name="keywords_en" id="keywords_en" cols="30" rows="2"
                                class="form-control @error('keywords_en') is-invalid @enderror">{{ $hall->keywords_en }}</textarea>
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
                Primary Image <span class="text-danger">*</span>
            </div>

            <div class="card-body">
                {{-- primary_image --}}

                <span>Prefer 800*800 Pexel</span>
                <div class="form-group mb-4 d-flex justify-content-center">
                    <input data-default-file="{{ $hall->primary_image_url }}" accept="image/*" type="file"
                        name="primary_image" data-max-file-size="10M"
                        class="dropify @error('primary_image') is-invalid @enderror" value="{{ old('primary_image') }}">
                </div>


                @error('primary_image')
                    <div class="d-flex justify-content-center ">

                        <div class="text-danger">
                            <strong>{{ $message }}</strong>
                        </div>
                    </div>
                @enderror

                {{-- primary_image --}}

            </div>
        </div>




        <div class="card mb-4">
            <div class="card-header">
                Slider Images
            </div>

            <div class="card-body">
                {{-- images --}}

                <span>Prefer 800*800 Pexel</span>
                <div class="form-group mb-4 d-flex justify-content-center">

                    <input accept="image/*" multiple id="images" type="file" name="images[]"
                        class=" @error('images') is-invalid @enderror" value="{{ old('images') }}">
                </div>

                <div class="py-3 " id="preview-images-container">

                    @foreach ($hall->media as $image)
                        <img src="{{ $image->image_url }}" alt="" class="img-thumbnail  rounded m-2"
                            style="width: 200px ; height:200px ; object-fit:cover;">
                    @endforeach

                </div>


                @error('images')
                    <div class="d-flex justify-content-center ">

                        <div class="text-danger">
                            <strong>{{ $message }}</strong>
                        </div>
                    </div>
                @enderror

                {{-- images --}}

            </div>
        </div>










        <button type="submit" class="btn btn-primary d-block m-auto">
            Edit
            <i class="fa-regular fa-pen-to-square icon icon-xs ms-2"></i>

        </button>
    </form>
@endsection


@section('scripts')
    <script src="{{ asset('layouts/admin/js/ckeditor.js') }}"></script>
    <script src="{{ asset('layouts/admin/js/perview-images.js') }}"></script>

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



        $('#categories').select2({
            width: "100%"
        });

        $('#vendor_id').select2({
            width: "100%"
        });

        $('#city_id').select2({
            width: "100%"
        });


        $('#country_id').select2({
            width: "100%",
        });
        let countrySelect = document.getElementById('country_id');
        let citySelect = document.getElementById('city_id');
    </script>
@endsection
