@extends('layouts.admin.master')
@section('title')
    Product statistics based on categories)Main category – Sub category)
@endsection

@section('content')
    {{-- on top --}}

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
                    <li class="breadcrumb-item active" aria-current="page">Reports</li>
                </ol>
            </nav>


            <h2 class="h4">Product statistics based on categories)Main category – Sub category)</h2>

        </div>

    </div>






    {{-- on top --}}



    <div class="card card-body border-0 shadow mb-2" style="margin-top: 50px;">

        <div class="accordion ">



            <div class="accordion-item">
                <h2 class="accordion-header" id="headingTwo">

                </h2>
                <div>
                    <div class="accordion-body card card-body ">


                        <form action="{{ route('admin.reports.data.products-statistics') }}" method="get">
                            @csrf
                            <div class="row">
                                <div class="col-lg-4">

                                    <div class="form-group mb-3">
                                        <label for="from">From</label>
                                        <input type="date" id="from" value="{{ request()->from }}" name="from"
                                            class="form-control search-docs" placeholder="From" required>

                                    </div>
                                </div>


                                <div class="col-lg-4">

                                    <div class="form-group mb-3">
                                        <label for="to">To</label>

                                        <input type="date" id="to" value="{{ request()->to }}" name="to"
                                            class="form-control search-docs" placeholder="To" required>

                                    </div>
                                </div>

                                <div class="col-lg-4">

                                    <div class="form-group mb-3">
                                        <label for="to">Category</label>
                                        <select name="category_id" id="category_id"
                                            class="form-select @error('category_id') is-invalid @enderror" required>

                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}" id="{{ $category->id }}">
                                                    {{ $category->title_en . ' - ' . $category->title_ar }}</option>
                                            @endforeach
                                        </select>

                                    </div>
                                </div>






                                <div class="col-lg-4">

                                    <div class="form-group mb-3">
                                        <label for="to">Subcategory</label>
                                        <select name="subcategory_id" id="subcategory_id"
                                            class="form-select @error('subcategory_id') is-invalid @enderror">

                                            @foreach ($subcategories as $subcategory)
                                                <option value="{{ $subcategory->id }}"
                                                    {{ collect(old('subcategory'))->contains($subcategory->id) ? 'selected' : '' }}>
                                                    {{ $subcategory->title_en . ' - ' . $subcategory->title_ar }}</option>
                                            @endforeach
                                        </select>

                                    </div>
                                </div>


                            </div>

                            <div class="col-12">

                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary ">Search</button>
                                </div>
                            </div>








                    </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).on('change', '#category_id', function() {
            var category_id = $(this).val();
            //alert(company_id);
            if (category_id) {
                $.ajax({
                    type: "GET",
                    // url:"{{ url('get-category-units/') }}/?category_id="+category_id,
                    url: "/subcategories/" + category_id,
                    success: function(res) {
                        console.log(res);

                        if (res) {
                            console.log(res);
                            $("#subcategory_id").empty();
                            $.each(res, function(key, value) {
                                $("#subcategory_id").append('<option value="' + value + '" >' +
                                    key + '</option>');

                            });
                        }
                        if (res.length === 0) {
                            $("#subcategory_id").empty();
                        }
                    }
                });
            } else {
                $("#subcategory_id").empty();
            }
        });
    </script>
@endsection
