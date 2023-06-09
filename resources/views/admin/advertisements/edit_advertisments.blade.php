@extends('layouts.admin.master')
@section('title')
Edit Advertisement
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
                    <li class="breadcrumb-item active" aria-current="page">Edit Advertisement</li>
                </ol>
            </nav>
            <h2 class="h4">Edit Advertisement</h2>
            <div style="margin: auto">
                @foreach ($errors->all() as $error)
                    <div class="alert alert-danger" role="alert">
                        {{ $error }}
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <form
                                        action="{{ route('admin.advertisements.edit_advertisements', $advertisement->id) }}"
                                        method="POST" enctype="multipart/form-data">
                                        <div class="modal-body">

                                            <div class="wrapper m-auto">

                                                <ul class="list-group list-group-flush">
                                                    <label> Name </label>
                                                    <input type="text" name="name" class="form-control"
                                                        value="{{ $advertisement->name }}"><br>
                                                    <label> Image </label>
                                                    <input type="file" name="image" class="form-control"><br>
                                                    <label> Title [En] </label>
                                                    <input type="text" name="title_en"
                                                        value="{{ $advertisement->title_en }}" class="form-control"><br>
                                                    <label> Title [Ar] </label>
                                                    <input type="text" name="title_ar"
                                                        value="{{ $advertisement->title_ar }}" class="form-control"><br>
                                                    <label> Description [En] </label>
                                                    <input type="text" name="description_en"
                                                        value="{{ $advertisement->description_en }}"
                                                        class="form-control"><br>
                                                    <label> Description [Ar] </label>
                                                    <input type="text" name="description_ar"
                                                        value="{{ $advertisement->description_ar }}"
                                                        class="form-control"><br>

                                                    <label> Link </label>
                                                    <input type="text" name="link"
                                                        value="{{ $advertisement->link }}" class="form-control"><br>
                                                </ul>
                                            </div>

                                        </div>
                                        <div class="modal-footer">


                                            <button type="submit" class="btn btn-primary">
                                                Edit
                                            </button>


                                            <button type="button" class="btn btn-link text-gray ms-auto"
                                                data-bs-dismiss="modal">Close</button>
                                        </div>
                                    </form>


    </div>
@endsection
