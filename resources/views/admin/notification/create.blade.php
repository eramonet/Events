@extends('layouts.admin.master')
@section('title')
    Create New Notification
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
                        <a href="{{ route('admin.notifications.index') }}">Notifications</a>
                    </li>

                    <li class="breadcrumb-item active" aria-current="page">Create New Notification</li>

                </ol>
            </nav>
            <h2 class="h4">Create New Notification</h2>

        </div>

    </div>






    {{-- on top --}}


    <form action="{{ route('admin.notifications.store') }}" method="POST" enctype="multipart/form-data">


        @csrf
        @method('POST')
        <div class="card mb-4">

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

                    {{-- title_en --}}




                    {{-- description_ar --}}
                    <div class="col-md-6">
                        <div class="form-group mb-4">
                            <label for="desc_ar"> Description In Arabic <span class="text-danger">*</span></label>


                            <textarea required dir="rtl" name="desc_ar" id="desc_ar" cols="30" rows="3"
                                class="form-control @error('desc_ar') is-invalid @enderror">{{ old('desc_ar') }}</textarea>
                        </div>


                        @error('desc_ar')
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
                            <label for="desc_en"> Description In English <span class="text-danger">*</span></label>


                            <textarea required name="desc_en" id="desc_en" cols="30" rows="3"
                                class="form-control @error('desc_en') is-invalid @enderror">{{ old('desc_en') }}</textarea>
                        </div>


                        @error('desc_en')
                            <div class="d-flex justify-content-center ">

                                <div class="text-danger">
                                    <strong>{{ $message }}</strong>
                                </div>
                            </div>
                        @enderror
                    </div>

                    {{-- description_en --}}



                    {{-- user type --}}
                    <div class="col-md-12">
                        <div class="form-group mb-4">
                            <label for="user_type">user type <span class="text-danger">*</span></label>
                            <select required name="user_type" id="user_type"
                                class="form-select @error('user_type') is-invalid @enderror">
                                <option value="0" {{ old('user_type') == '0' ? 'selected' : '' }}>One user or many users
                                </option>
                                <option value="1" {{ old('user_type') == '1' ? 'selected' : '' }}>All men</option>
                                <option value="2" {{ old('user_type') == '2' ? 'selected' : '' }}>All Women</option>
                                <option value="3" {{ old('user_type') == '3' ? 'selected' : '' }}>All users</option>
                                <option value="4" {{ old('user_type') == '4' ? 'selected' : '' }}>One vendor or many vendor
                                </option>
                            </select>
                        </div>


                        @error('user_type')
                            <div class="d-flex justify-content-center ">

                                <div class="text-danger">
                                    <strong>{{ $message }}</strong>
                                </div>
                            </div>
                        @enderror
                    </div>

                    {{-- user type --}}

                    {{-- user_id --}}
                    <div id="users" class="col-md-12 showOrHide">
                        <div class="form-group mb-4">
                            <label for="user_id">Users <span class="text-danger">*</span></label>
                            <select multiple name="user_id[]" id="user_id"
                                class="form-select @error('user_id') is-invalid @enderror">

                                @foreach ($users as $user)
                                    <option value="{{ $user->id }}" {{ old('user_id') == $user->id ? 'selected' : '' }}>
                                        {{ $user->name }}</option>
                                @endforeach
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


                    {{-- user type --}}

                    {{-- vendor_id --}}
                    <div id="vendors" class="col-md-12 showOrHide" style="display: none">
                        <div class="form-group mb-4">
                            <label for="user_id">Vendors <span class="text-danger">*</span></label>
                            <select multiple name="vendor_id[]" id="vendor_id"
                                class="form-select @error('vendor_id') is-invalid @enderror">

                                @foreach ($vendors as $vendor)
                                    <option value="{{ $vendor->id }}"
                                        {{ old('vendor_id') == $vendor->id ? 'selected' : '' }}>{{ $vendor->name }}</option>
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
            $('#country_id').select2({
                width: "100%"
            });
        });
        $('#user_id').select2({
            width: "100%"
        });
        $('#vendor_id').select2({
            width: "100%"
        });
    </script>
    <script>
        $(document).ready(function() {
            $("#user_type").on('change', function() {
                var user_type = $(this).val();
                if (user_type == 0) {
                    //stores
                    $("#users").css('display', '');
                    $("#vendors").css('display', 'none');
                }
                if (user_type == 1) {
                    $("#users").css('display', 'none');
                    $("#vendors").css('display', 'none');

                }
                if (user_type == 2) {
                    $("#users").css('display', 'none');
                    $("#vendors").css('display', 'none');
                }
                if (user_type == 3) {
                    $("#users").css('display', 'none');
                    $("#vendors").css('display', 'none');
                }
                if (user_type == 4) {
                    $("#users").css('display', 'none');
                    $("#vendors").css('display', '');
                }
                if (user_type == 5) {
                    $("#users").css('display', 'none');
                    $("#vendors").css('display', 'none');
                }
            });

        });
    </script>
@endsection
