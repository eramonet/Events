@extends('layouts.admin.master')
@section('title')
    Edit Vendor Admin
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
                        <a href="{{ route('admin.vendor-admins.index') }}">Vendor Admins</a>
                    </li>

                    <li class="breadcrumb-item active" aria-current="page">Edit Admin</li>

                </ol>
            </nav>
            <h2 class="h4">Edit Admin</h2>

        </div>

    </div>






    {{-- on top --}}


    <form action="{{ route('admin.vendor-admins.update', $admin->id) }}" method="POST" enctype="multipart/form-data">


        @csrf
        @method('PUT')
        <div class="card mb-4">
            <div class="card-header">
                Admin Info
            </div>

            <div class="card-body">



                <div class="row">


                    {{-- name --}}
                    <div class="col-md-6">
                        <div class="form-group mb-4">
                            <label for="name">Name <span class="text-danger">*</span></label>
                            <input required type="text" name="name"
                                class="form-control @error('name') is-invalid @enderror" value="{{ $admin->name }}">
                        </div>


                        @error('name')
                            <div class="d-flex justify-content-center ">

                                <div class="text-danger">
                                    <strong>{{ $message }}</strong>
                                </div>
                            </div>
                        @enderror
                    </div>

                    {{-- name --}}



                    {{-- email --}}
                    <div class="col-md-6">
                        <div class="form-group mb-4">
                            <label for="email">Email <span class="text-danger">*</span></label>
                            <input required type="email" name="email"
                                class="form-control @error('email') is-invalid @enderror" value="{{ $admin->email }}">
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
                                class="form-control @error('phone') is-invalid @enderror" value="{{ $admin->phone }}">
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


                    {{-- gender --}}
                    <div class="col-md-6">
                        <div class="form-group mb-4">
                            <label required for="gender">Gender <span class="text-danger">*</span></label>
                            <select name="gender" id="gender" class="form-select @error('gender') is-invalid @enderror">
                                <option value="male" {{ $admin->gender == 'male' ? 'selected' : '' }}>Male</option>
                                <option value="female" {{ $admin->gender == 'female' ? 'selected' : '' }}>Female</option>
                            </select>
                        </div>


                        @error('gender')
                            <div class="d-flex justify-content-center ">

                                <div class="text-danger">
                                    <strong>{{ $message }}</strong>
                                </div>
                            </div>
                        @enderror
                    </div>

                    {{-- gender --}}


                    {{-- vendor_id --}}
                    <div class="col-md-6">
                        <div class="form-group mb-4">
                            <label for="vendor_id">Vendor <span class="text-danger">*</span></label>
                            <select required name="vendor_id" id="vendor_id"
                                class="form-select @error('vendor_id') is-invalid @enderror">

                                @foreach ($vendors as $vendor)
                                    <option value="{{ $vendor->id }}"
                                        {{ $admin->vendor_id == $vendor->id ? 'selected' : '' }}>
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


                    {{-- category_id --}}
                    <div class="col-md-6">
                        <div class="form-group mb-4">
                            <label for="category_id">Category <span class="text-danger">*</span></label>
                            <select required name="category_id" id="category_id"
                                class="form-select @error('category_id') is-invalid @enderror">

                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}"
                                        {{ $admin->category_id == $category->id ? 'selected' : '' }}>
                                        {{ $category->title_en . ' - ' . $category->title_ar }}</option>
                                @endforeach
                            </select>
                        </div>


                        @error('category_id')
                            <div class="d-flex justify-content-center ">

                                <div class="text-danger">
                                    <strong>{{ $message }}</strong>
                                </div>
                            </div>
                        @enderror
                    </div>

                    {{-- category_id --}}







                    {{-- status --}}
                    <div class="col-md-6">
                        <div class="form-group mb-4">
                            <label required for="status">Status <span class="text-danger">*</span></label>
                            <select name="status" id="status" class="form-select @error('status') is-invalid @enderror">
                                <option value="1" {{ $admin->status == '1' ? 'selected' : '' }}>Active</option>
                                <option value="0" {{ $admin->status == '0' ? 'selected' : '' }}>InActive</option>
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
                Password
            </div>

            <div class="card-body">



                <div class="row">



                    {{-- password --}}
                    <div class="col-md-6">
                        <div class="form-group mb-4">
                            <label for="password">Password </label>
                            <input type="password" name="password"
                                class="form-control @error('password') is-invalid @enderror"
                                value="{{ old('password') }}">
                        </div>


                        @error('password')
                            <div class="d-flex justify-content-center ">

                                <div class="text-danger">
                                    <strong>{{ $message }}</strong>
                                </div>
                            </div>
                        @enderror
                    </div>

                    {{-- password --}}


                    {{-- password_confirmation --}}
                    <div class="col-md-6">
                        <div class="form-group mb-4">
                            <label for="password_confirmation">Password Confirmation </label>
                            <input type="password" name="password_confirmation"
                                class="form-control @error('password_confirmation') is-invalid @enderror"
                                value="{{ old('password_confirmation') }}">
                        </div>


                        @error('password_confirmation')
                            <div class="d-flex justify-content-center ">

                                <div class="text-danger">
                                    <strong>{{ $message }}</strong>
                                </div>
                            </div>
                        @enderror
                    </div>

                    {{-- password_confirmation --}}





                </div>

            </div>
        </div>




        <div class="card mb-4">
            <div class="card-header">
                Image
            </div>

            <div class="card-body">
                {{-- image --}}

                <span>Prefer 180*180 Pexel</span>
                <div class="form-group mb-4 d-flex justify-content-center">
                    <input accept="image/*" type="file" name="image" data-default-file="{{ $admin->image_url }}"
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



        <div class="card mb-4">
            <div class="card-header">
                Permissions <span class="text-danger">*</span>
            </div>

            <div class="card-body">




                <div class="accordion" id="accordionPermissions">


                    <div class="row">

                        @foreach ($permissions as $model => $cruds)
                            <div class="col-md-4">
                                <div class="accordion-item mb-4">
                                    <h2 class="accordion-header" id="heading-{{ $model }}">
                                        <button class="accordion-button collapsed" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#{{ $model }}"
                                            aria-expanded="false" aria-controls="{{ $model }}">
                                            @php
                                                $explodeed = explode('-', $model);
                                                $imploded = implode(' ', $explodeed);
                                                $model_with_capital_letters = ucfirst($imploded);
                                            @endphp
                                            {{ ucwords($model_with_capital_letters) }}
                                        </button>
                                    </h2>
                                    <div id="{{ $model }}" class="accordion-collapse collapse"
                                        aria-labelledby="heading-{{ $model }}"
                                        data-bs-parent="#accordionPermissions">
                                        <div class="accordion-body">


                                            @foreach ($cruds as $crud)
                                                <div class="form-group d-flex justify-content-between">
                                                    <label for="{{ $model . '-' . $crud }}">
                                                        {{ ucwords($crud . ' ' . $model_with_capital_letters) }}
                                                    </label>
                                                    <input {{ $admin->hasPermission($model . '-' . $crud) ? 'checked' : '' }}
                                                        id="{{ $model . '-' . $crud }}" type="checkbox"
                                                        name="permissions[]" value="{{ $model . '-' . $crud }}"
                                                        class="form-check-input">
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>

                            </div>
                        @endforeach
                    </div>



                    @error('permissions')
                        <div class="d-flex justify-content-center ">

                            <div class="text-danger">
                                <strong>{{ $message }}</strong>
                            </div>
                        </div>
                    @enderror



                </div>

            </div>
        </div>




        <button type="submit" class="btn btn-primary d-block m-auto">
            Edit
            <i class="fa-regular fa-pen-to-square icon icon-xs ms-2"></i>
        </button>
    </form>
@endsection
@section('scripts')
    <script>
        $(document).ready(function() {
            $('#category_id').select2({
                width: "100%"
            });
        });
    </script>
@endsection
