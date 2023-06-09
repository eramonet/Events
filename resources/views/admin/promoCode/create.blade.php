@extends('layouts.admin.master')
@section('title')
    Create New Promo Code
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
                        <a href="{{ route('admin.promo-codes.index') }}">Promo Codes</a>
                    </li>

                    <li class="breadcrumb-item active" aria-current="page">Create New Promo Code</li>

                </ol>
            </nav>
            <h2 class="h4">Create New Promo Code</h2>

        </div>

    </div>






    {{-- on top --}}


    <form action="{{ route('admin.promo-codes.store') }}" method="POST" enctype="multipart/form-data">


        @csrf
        @method('POST')
        <div class="card mb-4">

            <div class="card-body">



                <div class="row">

                    {{-- title --}}
                    <div class="col-md-6">
                        <div class="form-group mb-4">
                            <label for="title">Promo Title <span class="text-danger">*</span></label>
                            <input required type="text" name="title"
                                class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}">
                        </div>


                        @error('title')
                            <div class="d-flex justify-content-center ">

                                <div class="text-danger">
                                    <strong>{{ $message }}</strong>
                                </div>
                            </div>
                        @enderror
                    </div>

                    {{-- title --}}


                    {{-- expiration_date --}}
                    <div class="col-md-6">
                        <div class="form-group mb-4">
                            <label for="expiration_date">Expiration Date <span class="text-danger">*</span></label>
                            <input required type="date" name="expiration_date"
                                class="form-control @error('expiration_date') is-invalid @enderror"
                                value="{{ old('expiration_date') }}">
                        </div>


                        @error('expiration_date')
                            <div class="d-flex justify-content-center ">

                                <div class="text-danger">
                                    <strong>{{ $message }}</strong>
                                </div>
                            </div>
                        @enderror
                    </div>

                    {{-- expiration_date --}}


                    {{-- value --}}
                    <div class="col-md-6">
                        <div class="form-group mb-4">
                            <label for="value"> Promo Value <span class="text-danger">*</span></label>
                            <input required type="number" name="value"
                                class="form-control @error('value') is-invalid @enderror" value="{{ old('value') }}">
                        </div>


                        @error('value')
                            <div class="d-flex justify-content-center ">

                                <div class="text-danger">
                                    <strong>{{ $message }}</strong>
                                </div>
                            </div>
                        @enderror
                    </div>

                    {{-- value --}}



                    {{-- type --}}
                    <div class="col-md-6">
                        <div class="form-group mb-4">
                            <label for="type">Promo Type <span class="text-danger">*</span></label>
                            <select required name="type" id="type"
                                class="form-select @error('type') is-invalid @enderror">
                                <option value="amount" {{ old('type') == 'amount' ? 'selected' : '' }}>Amount</option>
                                <option value="percent" {{ old('type') == 'percent' ? 'selected' : '' }}>Percent%</option>
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

                    {{-- type --}}



                    {{-- maximum_times_of_use --}}
                    <div class="col-md-6">
                        <div class="form-group mb-4">
                            <label for="maximum_times_of_use"> Maximum Times of Use <span
                                    class="text-danger">*</span></label>
                            <input required type="number" name="maximum_times_of_use"
                                class="form-control @error('maximum_times_of_use') is-invalid @enderror"
                                value="{{ old('maximum_times_of_use') }}">
                        </div>


                        @error('maximum_times_of_use')
                            <div class="d-flex justify-content-center ">

                                <div class="text-danger">
                                    <strong>{{ $message }}</strong>
                                </div>
                            </div>
                        @enderror
                    </div>

                    {{-- maximum_times_of_use --}}





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







        <div class="card  mb-4">

            <div class="card-body">
                {{-- @if ($errors->any())
    <div class="alert alert-danger">
        @foreach ($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
    </div>
@endif --}}

                <div class="row">

                    {{-- dedicated_to --}}
                    <div class="col-md-6">
                        <div class="form-group mb-4">
                            <label for="dedicated_to">Dedicated To <span class="text-danger">*</span></label>
                            <select required name="dedicated_to" id="dedicated_to"
                                class="form-select @error('dedicated_to') is-invalid @enderror">
                                <option value="all_users" {{ old('dedicated_to') == 'all_users' ? 'selected' : '' }}>All Users
                                </option>
                                <option value="females" {{ old('dedicated_to') == 'females' ? 'selected' : '' }}>Females
                                </option>
                                <option value="males" {{ old('dedicated_to') == 'males' ? 'selected' : '' }}>Males</option>
                                <option value="spacial_user" {{ old('dedicated_to') == 'spacial_user' ? 'selected' : '' }}>
                                    Spacial User</option>
                                <option value="spacial_product"
                                    {{ old('dedicated_to') == 'special_product' ? 'selected' : '' }}>Spacial Product</option>

                            </select>
                        </div>


                        @error('dedicated_to')
                            <div class="d-flex justify-content-center ">

                                <div class="text-danger">
                                    <strong>{{ $message }}</strong>
                                </div>
                            </div>
                        @enderror
                    </div>

                    {{-- dedicated_to --}}



                    {{-- user_id --}}
                    <div class="col-md-6">
                        {{-- style="display: none" --}}
                        <div class="form-group mb-4 users_select" style="display: none">
                            <label for="user_id">User <span class="text-danger">*</span></label>
                            <select name="user_id" id="user_id"
                                class="form-select @error('user_id') is-invalid @enderror">

                                <option value=>Saerch For User By Phone Or Email</option>
                            </select>
                        </div>


                        @error('user_id')
                            <div class="d-flex justify-content-center ">

                                <div class="text-danger">
                                    <strong>{{ $message }}</strong>
                                </div>
                            </div>
                        @enderror
                    </div>

                    {{-- user_id --}}


                    {{-- product_id --}}
                    <div class="col-md-6">
                        {{-- style="display: none" --}}
                        <div class="form-group mb-4 products_select" style="display: none">
                            <label for="product_id">Product <span class="text-danger">*</span></label>
                            <select name="product_id" id="product_id"
                                class="form-select @error('product_id') is-invalid @enderror">

                                <option value=>Saerch For Product By title in arabic Or title in english</option>
                            </select>
                        </div>


                        @error('product_id')
                            <div class="d-flex justify-content-center ">

                                <div class="text-danger">
                                    <strong>{{ $message }}</strong>
                                </div>
                            </div>
                        @enderror
                    </div>

                    {{-- user_id --}}


                </div>

            </div>

        </div>



        <button type="submit" class="btn btn-primary d-block m-auto">
            Create
            <i class="fas fa-plus icon icon-xs ms-2"></i>
        </button>
    </form>
@endsection


@section('scripts')
    <script>
        $(document).ready(function() {




            $('#user_id').select2({
                ajax: {
                    url: '{{ route('admin.users.search') }}',
                    data: function(params) {
                        var query = {
                            search: params.term,
                        }

                        return query;
                    },
                    processResults: function(data) {
                        return {
                            results: $.map(data, function(item) {
                                return {
                                    text: item.email + ' - ' + item.phone,
                                    id: item.id
                                }
                            })
                        };
                    }
                }
            });




        });


        let dedicatedToForm = document.getElementById('dedicated_to');

        let userSelectContainer = document.querySelector('.users_select');


        dedicatedToForm.addEventListener('change', function(event) {

            let selectVal = event.target.value;
            if (selectVal == 'spacial_user') {
                userSelectContainer.style.display = 'block';
            } else {
                userSelectContainer.style.display = 'none';

            }
        })
    </script>














    <script>
        $(document).ready(function() {




            $('#product_id').select2({
                ajax: {
                    url: '{{ route('admin.products.search') }}',
                    data: function(params) {
                        var query = {
                            search: params.term,
                        }

                        return query;
                    },
                    processResults: function(data) {
                        return {
                            results: $.map(data, function(item) {
                                return {
                                    text: item.title_en + ' - ' + item.title_ar,
                                    id: item.id
                                }
                            })
                        };
                    }
                }
            });




        });


        let dedicated = document.getElementById('dedicated_to');

        let productSelectContainer = document.querySelector('.products_select');


        dedicated.addEventListener('change', function(event) {

            let selectVal = event.target.value;
            if (selectVal == 'spacial_product') {
                productSelectContainer.style.display = 'block';
            } else {
                productSelectContainer.style.display = 'none';

            }
        })
    </script>
@endsection
