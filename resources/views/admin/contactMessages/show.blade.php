@extends('layouts.admin.master')
@section('title')
    Show Contact Us Message
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
                        <a href="{{ route('admin.contact-messages.index') }}">Contact Us</a>
                    </li>

                    <li class="breadcrumb-item active" aria-current="page">Show Contact Us</li>

                </ol>
            </nav>
            <h2 class="h4">Show Contact Us</h2>

        </div>

    </div>






    {{-- on top --}}


        <div class="card mb-4">

            <div class="card-body">



                <div class="row">

                    <div class="col-md-12">
                        <div class="form-group mb-5">
                            <label for="name">name</label>
                            <input type="text" value="{{ $contact_message->name }}" readonly  name="name" class="form-control @error('name') is-invalid @enderror">
                        </div>


                        @error('name')
                            <div class="d-flex justify-content-center ">

                                <div class="text-danger">
                                    <strong>{{ $name }}</strong>
                                </div>
                            </div>
                        @enderror
                    </div>


                    <div class="col-md-12">
                        <div class="form-group mb-5">
                            <label for="email">email</label>
                            <input type="text" value="{{ $contact_message->email }}" readonly name="email" class="form-control  @error('email') is-invalid @enderror">
                        </div>


                        @error('email')
                            <div class="d-flex justify-content-center ">

                                <div class="text-danger">
                                    <strong>{{ $message }}</strong>
                                </div>
                            </div>
                        @enderror
                    </div>

                    <div class="col-md-12">
                        <div class="form-group mb-5">
                            <label for="message">message</label>
                            <input type="text" value="{{ $contact_message->message }}" readonly name="message" class="form-control  @error('message') is-invalid @enderror">
                        </div>


                        @error('message')
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






        <a href="{{ route("admin.contact-messages.index") }}"  class="btn btn-primary d-block m-auto">
            back<i class="fa-regular fa-pen-to-square icon icon-xs ms-2"></i>
        </a>


        {{-- <button type="submit" class="btn btn-primary d-block m-auto">
            Edit
            <i class="fa-regular fa-pen-to-square icon icon-xs ms-2"></i>
        </button> --}}

@endsection



