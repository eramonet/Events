@extends('layouts.admin.master')
@section('title')
<<<<<<< HEAD
Contact Messages
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

                <li class="breadcrumb-item">
                    <a href="{{ url('acp/contact-messages') }}">
                        Contact Us
                    </a>
                </li>

                <li class="breadcrumb-item active" aria-current="page">Contact Messages</li>
            </ol>
        </nav>
        <h2 class="h4">Contact Messages</h2>

    </div>
</div>
=======
    Contact Messages
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

                    <li class="breadcrumb-item">
                        <a href="{{ url('acp/contact-messages') }}">
                            Contact Us
                        </a>
                    </li>

                    <li class="breadcrumb-item active" aria-current="page">Contact Messages</li>
                </ol>
            </nav>
            <h2 class="h4">Contact Messages</h2>

        </div>
    </div>
>>>>>>> d36cbbda453e24bf36fa2ba7c87f57a3db5f1ab4






<<<<<<< HEAD
{{-- on top --}}
=======
    {{-- on top --}}
>>>>>>> d36cbbda453e24bf36fa2ba7c87f57a3db5f1ab4




<<<<<<< HEAD
{{-- table --}}
<div class="card card-body border-0 shadow table-wrapper table-responsive">
    <table class="table table-hover table-centered table-striped table-bordered text-center ">
        <thead>
            <tr>
                <th class="border-gray-200">Name</th>
                <th class="border-gray-200">Email</th>
                <th class="border-gray-200">Message</th>
                <th class="border-gray-200">Action</th>
            </tr>
        </thead>
        <tbody>

            @foreach ($contact_messages as $contact_message)
            <tr>

                <td>
                    <p class="text-nowrap">{{ $contact_message->name }}</a>
                </td>

                <td>
                    <p class="text-nowrap">{{ $contact_message->email }}</a>
                </td>

                <td>
                    <p class="text-nowrap">{{ substr($contact_message->message, 0, 30) }} ....</a>
                </td>
=======
    {{-- table --}}
    <div class="card card-body border-0 shadow table-wrapper table-responsive">
        <table class="table table-hover table-centered table-striped table-bordered text-center ">
            <thead>
                <tr>
                    <th class="border-gray-200">Name</th>
                    <th class="border-gray-200">Email</th>
                    <th class="border-gray-200">Message</th>
                    <th class="border-gray-200">Action</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($contact_messages as $contact_message)
                    <tr>

                        <td>
                            <p class="text-nowrap">{{ $contact_message->name }}</a>
                        </td>

                        <td>
                            <p class="text-nowrap">{{ $contact_message->email }}</a>
                        </td>

                        <td>
                            <p class="text-nowrap">{{ substr($contact_message->message, 0, 30) }} ....</a>
                        </td>
>>>>>>> d36cbbda453e24bf36fa2ba7c87f57a3db5f1ab4





<<<<<<< HEAD
                <td>



                    <div class="d-flex  align-items-center justify-content-center flex-md-nowrap">


                        <div class="">
                            <a href="{{ route('admin.contact-messages.destroy', $contact_message->id) }}"
                                class="btn btn-danger m-1">
                                <span class="fas fa-trash "></span>
                            </a>
                        </div>

                        <div class="">
                            <div data-bs-toggle="tooltip" data-bs-placement="top" title="Show Details">
                                <button class="btn btn-primary  m-1" data-bs-toggle="modal"
                                    data-bs-target="#modal2-{{ $contact_message->id }}" class=""><span
                                        class="fas fa-eye "></span>
                                </button>
                            </div>
                        </div>








                    </div>






                </td>











                <div class="modal fade" id="modal1-{{ $contact_message->id }}" tabindex="-1" role="dialog"
                    aria-labelledby="modal-default" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h2 class="h6 modal-title">Contact Us Details</h2>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <form action="{{ route('admin.contact-message-reply.send_reply', $contact_message->id) }}"
                                method="POST">
                                @csrf
                                <div class="modal-body">

                                    <div class="wrapper m-auto">

                                        <ul class="list-group list-group-flush">
                                            <textarea class="form-control" name="message" cols="30" rows="10"
                                                placeholder="Enter Reply"></textarea>
                                        </ul>
                                    </div>

                                </div>
                                <div class="modal-footer">


                                    <button type="submit" class="btn btn-success">
                                        <span class="fas fa-edit me-2"></span>Send</a>
                                    </button>

                                    <button type="button" class="btn btn-link text-gray ms-auto"
                                        data-bs-dismiss="modal">Close</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>


                <div class="modal fade" id="modal2-{{ $contact_message->id }}" tabindex="-1" role="dialog"
                    aria-labelledby="modal-default" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h2 class="h6 modal-title">Contact Us Details</h2>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">

                                <div class="wrapper m-auto">

                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item">Name : {{ $contact_message->name }} </li>
                                        <li class="list-group-item">Email : {{ $contact_message->email }} </li>
                                        @if ($contact_message->subject)
                                        <li class="list-group-item">Subject : {{ $contact_message->subject }}
                                        </li>
                                        @endif

                                        <li class="list-group-item">Message : {{ $contact_message->message }}
                                        </li>

                                    </ul>
                                    {{-- @if ($contact_message->replies->count() > 0)
                                    <hr>
                                    <h2 class="h6 modal-title">Replies</h2>
                                    <ul class="list-group list-group-flush">
                                        @foreach ($contact_message->replies as $reply)
                                        <li class="list-group-item">Reply : {{ $reply->message }} </li>
                                        @endforeach
                                    </ul>
                                    @endif --}}

                                </div>

                            </div>
                            <div class="modal-footer">
=======
                        <td>



                            <div class="d-flex  align-items-center justify-content-center flex-md-nowrap">


                                <div class="">
                                    <a href="{{ route('admin.contact-messages.destroy', $contact_message->id) }}"
                                        class="btn btn-danger m-1">
                                        <span class="fas fa-trash "></span>
                                    </a>
                                </div>


                                <div class="">
                                    <div data-bs-toggle="tooltip" data-bs-placement="top" title="Show Details">
                                        <button class="btn btn-success  m-1" data-bs-toggle="modal"
                                            data-bs-target="#modal1-{{ $contact_message->id }}" class=""><span
                                                class="fas fa-reply "></span>
                                        </button>
                                    </div>
                                </div>

                                <div class="">
                                    <div data-bs-toggle="tooltip" data-bs-placement="top" title="Show Details">
                                        <button class="btn btn-primary  m-1" data-bs-toggle="modal"
                                            data-bs-target="#modal2-{{ $contact_message->id }}" class=""><span
                                                class="fas fa-eye "></span>
                                        </button>
                                    </div>
                                </div>








                            </div>
>>>>>>> d36cbbda453e24bf36fa2ba7c87f57a3db5f1ab4





<<<<<<< HEAD
                                <button type="button" class="btn btn-link text-gray ms-auto"
                                    data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
            </tr>
            @endforeach
=======

                        </td>











                        <div class="modal fade" id="modal1-{{ $contact_message->id }}" tabindex="-1" role="dialog"
                            aria-labelledby="modal-default" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h2 class="h6 modal-title">Contact Us Details</h2>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <form
                                        action="{{ route('admin.contact-message-reply.send_reply', $contact_message->id) }}"
                                        method="POST">
                                        @csrf
                                        <div class="modal-body">

                                            <div class="wrapper m-auto">

                                                <ul class="list-group list-group-flush">
                                                    <textarea class="form-control" name="message" cols="30" rows="10" placeholder="Enter Reply"></textarea>
                                                </ul>
                                            </div>

                                        </div>
                                        <div class="modal-footer">


                                            <button type="submit" class="btn btn-success">
                                                <span class="fas fa-edit me-2"></span>Send</a>
                                            </button>

                                            <button type="button" class="btn btn-link text-gray ms-auto"
                                                data-bs-dismiss="modal">Close</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>


                        <div class="modal fade" id="modal2-{{ $contact_message->id }}" tabindex="-1" role="dialog"
                            aria-labelledby="modal-default" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h2 class="h6 modal-title">Contact Us Details</h2>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">

                                        <div class="wrapper m-auto">

                                            <ul class="list-group list-group-flush">
                                                <li class="list-group-item">Name : {{ $contact_message->name }} </li>
                                                <li class="list-group-item">Email : {{ $contact_message->email }} </li>
                                                <li class="list-group-item">Subject : {{ $contact_message->subject }}
                                                </li>
                                                <li class="list-group-item">Message : {{ $contact_message->message }}
                                                </li>

                                            </ul>
                                            {{-- @if ($contact_message->replies->count() > 0)
                                                <hr>
                                                <h2 class="h6 modal-title">Replies</h2>
                                                <ul class="list-group list-group-flush">
                                                    @foreach ($contact_message->replies as $reply)
                                                        <li class="list-group-item">Reply : {{ $reply->message }} </li>
                                                    @endforeach
                                                </ul>
                                            @endif --}}

                                        </div>

                                    </div>
                                    <div class="modal-footer">





                                        <button type="button" class="btn btn-link text-gray ms-auto"
                                            data-bs-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </tr>
                @endforeach
>>>>>>> d36cbbda453e24bf36fa2ba7c87f57a3db5f1ab4








<<<<<<< HEAD
        </tbody>
    </table>
    <div class="card-footer px-3 border-0 d-flex flex-column flex-lg-row align-items-center justify-content-between">
        {{-- {!! $taxes->appends(request()->query())->links('pagination::bootstrap-5') !!} --}}



    </div>

    {{-- @if ($taxes->count() < 1) <div class="d-flex justify-content-center" style="min-height: 300px">
        Empty
</div>
@endif --}}
</div>

{{-- table --}}
@endsection
=======
            </tbody>
        </table>
        <div class="card-footer px-3 border-0 d-flex flex-column flex-lg-row align-items-center justify-content-between">
            {{-- {!! $taxes->appends(request()->query())->links('pagination::bootstrap-5') !!} --}}



        </div>

        {{-- @if ($taxes->count() < 1)
            <div class="d-flex justify-content-center" style="min-height: 300px">
                Empty
            </div>
        @endif --}}
    </div>

    {{-- table --}}
@endsection
>>>>>>> d36cbbda453e24bf36fa2ba7c87f57a3db5f1ab4
