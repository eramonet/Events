@extends('layouts.admin.master')
@section('title')
Create New Advertisement
@endsection

@section('content')
    {{-- on top --}}

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-client-center py-2">
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
                    <li class="breadcrumb-item active" aria-current="page">Create New Advertisement</li>
                </ol>
            </nav>
            <h2 class="h4">Create New Advertisement</h2>
            <div style="margin: auto">
                @foreach ($errors->all() as $error)
                    <div class="alert alert-danger" role="alert">
                        {{ $error }}
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <p style="color: red;">
        In Brand Page
        <span style="color: #fff; font-weight: bold; background-color: red; padding: 1px 10px; border-radius: 30px;">
            width=209 * height=199
        </span>
    </p>

    <p style="color: red;">
        In Main Home
        <span style="color: #fff; font-weight: bold; background-color: red; padding: 1px 10px; border-radius: 30px;">
            width=978 * height=408
        </span>
    </p>
    <p style="color: red;">
        In Sub Home 1
        <span style="color: #fff; font-weight: bold; background-color: red; padding: 1px 10px; border-radius: 30px;">
            width=209 * height=199
        </span>
    </p>
    <p style="color: red;">
        In Sub Home 2
        <span style="color: #fff; font-weight: bold; background-color: red; padding: 1px 10px; border-radius: 30px;">
            width=209 * height=199
        </span>
    </p>
    <p style="color: red;">
        In Category Menu
        <span style="color: #fff; font-weight: bold; background-color: red; padding: 1px 10px; border-radius: 30px;">
            width=209 * height=199
        </span>
    </p>
    <p style="color: red;">
        In Brand Menu
        <span style="color: #fff; font-weight: bold; background-color: red; padding: 1px 10px; border-radius: 30px;">
            width=209 * height=199
        </span>
    </p>
    <p style="color: red;">
        In Mobile App Home
        <span style="color: #fff; font-weight: bold; background-color: red; padding: 1px 10px; border-radius: 30px;">
            width=209 * height=199
        </span>
    </p>
    <form action="{{ route('admin.advertisements.add_advertisements') }}" method="POST" enctype="multipart/form-data">
        <div class="modal-body">

            <div class="wrapper m-auto">

                <ul class="list-group list-group-flush">
                    <label> Name </label>
                    <input type="text" name="name" class="form-control" value="{{ old('name') }}"><br>

                    <label> Image * </label>
                    <input type="file" name="image" class="form-control"><br>

                    <label> Title [En] </label>
                    <input type="text" name="title_en" class="form-control" value="{{ old('title_en') }}"><br>

                    <label> Title [Ar] </label>
                    <input type="text" name="title_ar" class="form-control" value="{{ old('title_ar') }}"><br>

                    <label> Description [En] </label>
                    <input type="text" name="description_en" class="form-control"
                        value="{{ old('description_en') }}"><br>

                    <label> Description [Ar] </label>
                    <input type="text" name="description_ar" class="form-control"
                        value="{{ old('description_ar') }}"><br>


                    <label> Link * </label>
                    <input type="text" name="link" class="form-control" value="{{ old('link') }}"><br>


                </ul>
            </div>

        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary">
                Add
            </button>
        </div>
    </form>

@endsection
