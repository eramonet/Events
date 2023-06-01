@extends('layouts.admin.master')
@section('title')
    Edit Package
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
                        <a href="{{ route('admin.packages.index') }}">Packages</a>
                    </li>

                    <li class="breadcrumb-item active" aria-current="page">Edit Package</li>

                </ol>
            </nav>
            <h2 class="h4">Edit Package</h2>

        </div>

    </div>






    {{-- on top --}}


    <form action="{{ route('admin.packages.update' , $package->id ) }}" method="POST" enctype="multipart/form-data">


        @csrf
        @method('PUT')
        <div class="card mb-4">
            <div class="card-header">
                Basic Information
            </div>

            <div class="card-body">

                <div class="row">

                    @if ($errors)
                        @foreach ($errors->all() as $error)
                            <div>{{ $error }}</div>
                        @endforeach
                    @endif

                    {{-- hall_id --}}
                    <div class="col-md-12">
                        <div class="form-group mb-4">
                            <label for="hall_id">Choose Hall <span class="text-danger">*</span></label>
                            <select required name="hall_id" id="hall_id"
                                class="form-select @error('hall_id') is-invalid @enderror">

                                @foreach ($firstVendorHalls as $hall)
                                    <option value="{{ $hall->id }}">
                                        {{ $hall->title_en . ' ----- ' . $hall->title_ar }}
                                        <span>-------- Created By ( {{ $hall->created_by }} )</span>
                                    </option>
                                @endforeach
                            </select>
                        </div>


                        @error('hall_id')
                            <div class="d-flex justify-content-center ">

                                <div class="text-danger">
                                    <strong>{{ $message }}</strong>
                                </div>
                            </div>
                        @enderror
                    </div>

                    {{-- hall_id --}}


                    {{-- title_ar --}}
                    <div class="col-md-6">
                        <div class="form-group mb-4">
                            <label for="title_ar">Title In Arabic <span class="text-danger">*</span></label>
                            <input dir="rtl" required type="text" name="title_ar"
                                class="form-control @error('title_ar') is-invalid @enderror"
                                value="{{ $package->title_ar }}">
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
                                value="{{ $package->title_en }}">
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



                    {{-- number_of_tables --}}
                    <div class="col-md-4">
                        <div class="form-group mb-4">
                            <label for="number_of_tables">Number Of Tables <span class="text-danger">*</span></label>
                            <input minlength="0" min="1" value="{{ $package->number_of_tables }}" required
                                type="number" name="number_of_tables"
                                class="form-control @error('number_of_tables') is-invalid @enderror"
                                value="{{ old('number_of_tables') }}">
                        </div>


                        @error('number_of_tables')
                            <div class="d-flex justify-content-center ">

                                <div class="text-danger">
                                    <strong>{{ $message }}</strong>
                                </div>
                            </div>
                        @enderror
                    </div>

                    {{-- number_of_tables --}}


                    {{-- number_of_guests --}}
                    <div class="col-md-4">
                        <div class="form-group mb-4">
                            <label for="number_of_guests">Number Of Guests <span class="text-danger">*</span></label>
                            <input minlength="0" min="1" value="{{ $package->number_of_guests }}" required
                                type="number" name="number_of_guests"
                                class="form-control @error('number_of_guests') is-invalid @enderror"
                                value="{{ old('number_of_guests') }}">
                        </div>


                        @error('number_of_guests')
                            <div class="d-flex justify-content-center ">

                                <div class="text-danger">
                                    <strong>{{ $message }}</strong>
                                </div>
                            </div>
                        @enderror
                    </div>

                    {{-- number_of_guests --}}


                    {{-- photographer --}}
                    <div class="col-md-4">
                        <div class="form-group mb-4">
                            <label for="photographer">Photographer <span class="text-danger">*</span></label>
                            <select required name="photographer"
                                class="form-select @error('photographer') is-invalid @enderror">
                                <option value="yes">
                                    Yes
                                </option>

                                <option value="no">
                                    No
                                </option>
                            </select>
                        </div>


                        @error('photographer')
                            <div class="d-flex justify-content-center ">

                                <div class="text-danger">
                                    <strong>{{ $message }}</strong>
                                </div>
                            </div>
                        @enderror
                    </div>

                    {{-- real_price --}}
                    <div class="col-md-6">
                        <div class="form-group mb-4">
                            <label for="real_price"> Price (AED) <span class="text-danger">*</span></label>
                            <input minlength="0" min="1" value="{{ $package->real_price }}" required
                                type="number" name="real_price"
                                class="form-control @error('real_price') is-invalid @enderror"
                                value="{{ old('real_price') }}">
                        </div>


                        @error('real_price')
                            <div class="d-flex justify-content-center ">

                                <div class="text-danger">
                                    <strong>{{ $message }}</strong>
                                </div>
                            </div>
                        @enderror
                    </div>

                    {{-- real_price --}}


                    {{-- extra_guest_price --}}
                    <div class="col-md-6">
                        <div class="form-group mb-4">
                            <label for="extra_guest_price">Extra Guest Price (AED) <span
                                    class="text-danger">*</span></label>
                            <input minlength="0" min="1" value="{{ $package->extra_guest_price }}" required
                                type="number" name="extra_guest_price"
                                class="form-control @error('extra_guest_price') is-invalid @enderror"
                                value="{{ old('extra_guest_price') }}">
                        </div>


                        @error('extra_guest_price')
                            <div class="d-flex justify-content-center ">

                                <div class="text-danger">
                                    <strong>{{ $message }}</strong>
                                </div>
                            </div>
                        @enderror
                    </div>

                    {{-- extra_guest_price --}}


                    {{-- taxes --}}
                    <div class="col-md-6">
                        <div class="form-group mb-4">
                            <label for="taxes">Taxes </label>
                            <select multiple name="taxes[]" id="taxes"
                                class="form-select @error('taxes') is-invalid @enderror">

                                @foreach ($taxes as $tax)

                                    @foreach ($package->taxes as $item)
                                        @if ($tax->id == $item->id)
                                            <option selected value="{{ $tax->id }}">
                                                {{ $tax->title_en . ' - ' . $tax->title_ar }}
                                            </option>
                                        @else
                                            <option value="{{ $tax->id }}">
                                                {{ $tax->title_en . ' - ' . $tax->title_ar }}
                                            </option>
                                        @endif
                                    @endforeach
                                @endforeach
                            </select>
                        </div>


                        @error('taxes')
                            <div class="d-flex justify-content-center ">

                                <div class="text-danger">
                                    <strong>{{ $message }}</strong>
                                </div>
                            </div>
                        @enderror
                    </div>

                    {{-- taxes --}}


                    {{-- status --}}
                    <div class="col-md-6">
                        <div class="form-group mb-4">
                            <label for="status">Status <span class="text-danger">*</span></label>
                            <select required name="status" id="status"
                                class="form-select @error('status') is-invalid @enderror">
                                <option value="1" {{ old('status') == '1' ? 'selected' : '' }}>Active</option>
                                <option value="0" {{ old('status') == '0' ? 'selected' : '' }}>InActive</option>
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


                            <textarea required dir="rtl" name="summary_ar" id="summary_ar" cols="30" rows="4"
                                class="form-control @error('summary_ar') is-invalid @enderror">{!! $package->summary_ar !!}</textarea>
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
                            <textarea required name="summary_en" id="summary_en" cols="30" rows="4"
                                class="form-control @error('summary_en') is-invalid @enderror">{!! $package->summary_en !!}</textarea>
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
                Details


            </div>

            <div class="card-body">

                <div class="row">





                    {{-- meal_description_ar --}}
                    <div class="col-md-6">
                        <div class="form-group mb-4">
                            <label for="meal_description_ar"> Meal Description In Arabic <span
                                    class="text-danger">*</span></label>


                            <textarea dir="rtl" name="meal_description_ar" id="meal_description_ar" cols="30" rows="3"
                                class="form-control @error('meal_description_ar') is-invalid @enderror">{{ $package->meal_description_ar }}</textarea>
                        </div>


                        @error('meal_description_ar')
                            <div class="d-flex justify-content-center ">

                                <div class="text-danger">
                                    <strong>{{ $message }}</strong>
                                </div>
                            </div>
                        @enderror
                    </div>

                    {{-- meal_description_ar --}}



                    {{-- meal_description_en --}}
                    <div class="col-md-6">
                        <div class="form-group mb-4">
                            <label for="meal_description_en"> Meal Description In English <span
                                    class="text-danger">*</span></label>


                            <textarea name="meal_description_en" id="meal_description_en" cols="30" rows="3"
                                class="form-control @error('meal_description_en') is-invalid @enderror">{{ $package->meal_description_en }}</textarea>
                        </div>


                        @error('meal_description_en')
                            <div class="d-flex justify-content-center ">

                                <div class="text-danger">
                                    <strong>{{ $message }}</strong>
                                </div>
                            </div>
                        @enderror
                    </div>

                    {{-- meal_description_en --}}






                    {{-- lighting_description_ar --}}
                    <div class="col-md-6">
                        <div class="form-group mb-4">
                            <label for="lighting_description_ar"> Lighting Description In Arabic <span
                                    class="text-danger">*</span></label>


                            <textarea dir="rtl" name="lighting_description_ar" id="lighting_description_ar" cols="30" rows="3"
                                class="form-control @error('lighting_description_ar') is-invalid @enderror">{{ $package->lighting_description_ar }}</textarea>
                        </div>


                        @error('lighting_description_ar')
                            <div class="d-flex justify-content-center ">

                                <div class="text-danger">
                                    <strong>{{ $message }}</strong>
                                </div>
                            </div>
                        @enderror
                    </div>

                    {{-- lighting_description_ar --}}



                    {{-- lighting_description_en --}}
                    <div class="col-md-6">
                        <div class="form-group mb-4">
                            <label for="lighting_description_en"> Lighting Description In English <span
                                    class="text-danger">*</span> </label>


                            <textarea name="lighting_description_en" id="lighting_description_en" cols="30" rows="3"
                                class="form-control @error('lighting_description_en') is-invalid @enderror">{{ $package->lighting_description_en }}</textarea>
                        </div>


                        @error('lighting_description_en')
                            <div class="d-flex justify-content-center ">

                                <div class="text-danger">
                                    <strong>{{ $message }}</strong>
                                </div>
                            </div>
                        @enderror
                    </div>

                    {{-- lighting_description_en --}}




                    {{-- sound_description_ar --}}
                    <div class="col-md-6">
                        <div class="form-group mb-4">
                            <label for="sound_description_ar"> Sound Description In Arabic <span
                                    class="text-danger">*</span> </label>


                            <textarea dir="rtl" name="sound_description_ar" id="sound_description_ar" cols="30" rows="3"
                                class="form-control @error('sound_description_ar') is-invalid @enderror">{{ $package->sound_description_ar }}</textarea>
                        </div>


                        @error('sound_description_ar')
                            <div class="d-flex justify-content-center ">

                                <div class="text-danger">
                                    <strong>{{ $message }}</strong>
                                </div>
                            </div>
                        @enderror
                    </div>

                    {{-- sound_description_ar --}}



                    {{-- sound_description_en --}}
                    <div class="col-md-6">
                        <div class="form-group mb-4">
                            <label for="sound_description_en"> Sound Description In English <span
                                    class="text-danger">*</span> </label>


                            <textarea name="sound_description_en" id="sound_description_en" cols="30" rows="3"
                                class="form-control @error('sound_description_en') is-invalid @enderror">{{ $package->sound_description_en }}</textarea>
                        </div>


                        @error('sound_description_en')
                            <div class="d-flex justify-content-center ">

                                <div class="text-danger">
                                    <strong>{{ $message }}</strong>
                                </div>
                            </div>
                        @enderror
                    </div>

                    {{-- sound_description_en --}}



                    {{-- flowers_description_ar --}}
                    <div class="col-md-6">
                        <div class="form-group mb-4">
                            <label for="flowers_description_ar"> Flowers Description In Arabic <span
                                    class="text-danger">*</span></label>


                            <textarea dir="rtl" name="flowers_description_ar" id="flowers_description_ar" cols="30" rows="3"
                                class="form-control @error('flowers_description_ar') is-invalid @enderror">{{ $package->flowers_description_ar }}</textarea>
                        </div>


                        @error('flowers_description_ar')
                            <div class="d-flex justify-content-center ">

                                <div class="text-danger">
                                    <strong>{{ $message }}</strong>
                                </div>
                            </div>
                        @enderror
                    </div>

                    {{-- flowers_description_ar --}}



                    {{-- flowers_description_en --}}
                    <div class="col-md-6">
                        <div class="form-group mb-4">
                            <label for="flowers_description_en"> Flowers Description In English <span
                                    class="text-danger">*</span> </label>


                            <textarea name="flowers_description_en" id="flowers_description_en" cols="30" rows="3"
                                class="form-control @error('flowers_description_en') is-invalid @enderror">{{ $package->flowers_description_en }}</textarea>
                        </div>


                        @error('flowers_description_en')
                            <div class="d-flex justify-content-center ">

                                <div class="text-danger">
                                    <strong>{{ $message }}</strong>
                                </div>
                            </div>
                        @enderror
                    </div>

                    {{-- flowers_description_en --}}




                    {{-- decoration_description_ar --}}
                    <div class="col-md-6">
                        <div class="form-group mb-4">
                            <label for="decoration_description_ar"> Decoration Description In Arabic <span
                                    class="text-danger">*</span> </label>


                            <textarea dir="rtl" name="decoration_description_ar" id="decoration_description_ar" cols="30"
                                rows="3" class="form-control @error('decoration_description_ar') is-invalid @enderror">{{ $package->decoration_description_ar }}</textarea>
                        </div>


                        @error('decoration_description_ar')
                            <div class="d-flex justify-content-center ">

                                <div class="text-danger">
                                    <strong>{{ $message }}</strong>
                                </div>
                            </div>
                        @enderror
                    </div>

                    {{-- decoration_description_ar --}}



                    {{-- decoration_description_en --}}
                    <div class="col-md-6">
                        <div class="form-group mb-4">
                            <label for="decoration_description_en"> Decoration Description In English <span
                                    class="text-danger">*</span></label>


                            <textarea name="decoration_description_en" id="decoration_description_en" cols="30" rows="3"
                                class="form-control @error('decoration_description_en') is-invalid @enderror">{{ $package->decoration_description_en }}</textarea>
                        </div>


                        @error('decoration_description_en')
                            <div class="d-flex justify-content-center ">

                                <div class="text-danger">
                                    <strong>{{ $message }}</strong>
                                </div>
                            </div>
                        @enderror
                    </div>

                    {{-- decoration_description_en --}}








                    {{-- plan_of_the_day_description_ar --}}
                    <div class="col-md-6">
                        <div class="form-group mb-4">
                            <label for="plan_of_the_day_description_ar"> Plan Of The Day Description In Arabic <span
                                    class="text-danger">*</span> </label>


                            <textarea dir="rtl" name="plan_of_the_day_description_ar" id="plan_of_the_day_description_ar" cols="30"
                                rows="3" class="form-control @error('plan_of_the_day_description_ar') is-invalid @enderror">{{ $package->plan_of_the_day_description_ar }}</textarea>
                        </div>


                        @error('plan_of_the_day_description_ar')
                            <div class="d-flex justify-content-center ">

                                <div class="text-danger">
                                    <strong>{{ $message }}</strong>
                                </div>
                            </div>
                        @enderror
                    </div>

                    {{-- plan_of_the_day_description_ar --}}



                    {{-- plan_of_the_day_description_en --}}
                    <div class="col-md-6">
                        <div class="form-group mb-4">
                            <label for="plan_of_the_day_description_en"> Plan Of The Day Description In English <span
                                    class="text-danger">*</span></label>


                            <textarea name="plan_of_the_day_description_en" id="plan_of_the_day_description_en" cols="30" rows="3"
                                class="form-control @error('plan_of_the_day_description_en') is-invalid @enderror">{{ $package->plan_of_the_day_description_en }}</textarea>
                        </div>


                        @error('plan_of_the_day_description_en')
                            <div class="d-flex justify-content-center ">

                                <div class="text-danger">
                                    <strong>{{ $message }}</strong>
                                </div>
                            </div>
                        @enderror
                    </div>

                    {{-- plan_of_the_day_description_en --}}








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


                            <textarea dir="rtl" name="description_ar" id="description_ar" cols="30" rows="3"
                                class="form-control @error('description_ar') is-invalid @enderror">{{ $package->description_ar }}</textarea>
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
                            <label for="description_en"> Meta Description In English <span class="text-danger">*</span>
                            </label>


                            <textarea name="description_en" id="description_en" cols="30" rows="3"
                                class="form-control @error('description_en') is-invalid @enderror">{{ $package->description_en }}</textarea>
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


                            <textarea dir="rtl" name="keywords_ar" id="keywords_ar" cols="30" rows="2"
                                class="form-control @error('keywords_ar') is-invalid @enderror">{{ $package->keywords_ar }}</textarea>
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


                            <textarea name="keywords_en" id="keywords_en" cols="30" rows="2"
                                class="form-control @error('keywords_en') is-invalid @enderror">{{ $package->keywords_en }}</textarea>
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
                Image <span class="text-danger">*</span>
            </div>

            <div class="card-body">
                {{-- image --}}

                <span>Prefer 800*800 Pexel</span>
                <div class="form-group mb-4 d-flex justify-content-center">
                    <input accept="image/*" type="file" name="image" data-max-file-size="10M"
                        class="dropify @error('image') is-invalid @enderror" value="{{ $package->image }}">
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
            <i class="fas fa-plus icon icon-xs ms-2"></i>
        </button>
    </form>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {




            $('#category_id').select2({
                width: "100%"
            });


            $('#vendor_id').select2({
                width: "100%",
            });



            $('#hall_id').select2({
                width: "100%",
            });

            $('#taxes').select2({
                width: "100%",
            });



        });



        let hallSelect = document.getElementById('hall_id');

        $('#vendor_id').on('select2:select', async function(e) {
            var id = e.params.data.id;
            try {
                let url = `{{ route('admin.halls.hallsByVendorId') }}?vendor_id=${id}`;
                let res = await fetch(url);
                let data = await res.json();

                let options = '';
                if (data.length) {
                    data.forEach((value, index, array) => {
                        options += `<option value='${value.id}'>${value.title_en}</option>`
                    })
                }

                hallSelect.innerHTML = options;
            } catch (error) {

            }

        });
    </script>
@endsection
