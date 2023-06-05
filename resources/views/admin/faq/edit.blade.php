@extends('layouts.admin.master')
@section('title')
    Edit FAQ
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
                        <a href="{{ route('admin.faqs.index') }}">FAQ`s</a>
                    </li>

                    <li class="breadcrumb-item active" aria-current="page">Edit FAQ</li>

                </ol>
            </nav>
            <h2 class="h4">Edit FAQ</h2>

        </div>

    </div>






    {{-- on top --}}


    <form action="{{ route('admin.faqs.update', $faq->id) }}" method="POST" enctype="multipart/form-data">


        @csrf
        @method('PUT')
        <div class="card mb-4">


            <div class="card-body">



                <div class="row">





                    {{-- question_ar --}}
                    <div class="col-md-6">
                        <div class="form-group mb-4">
                            <label for="question_ar">Question In Arabic <span class="text-danger">*</span></label>
                            <input dir="rtl" required type="text" name="question_ar"
                                class="form-control @error('question_ar') is-invalid @enderror"
                                value="{{ $faq->question_ar }}">
                        </div>


                        @error('question_ar')
                            <div class="d-flex justify-content-center ">

                                <div class="text-danger">
                                    <strong>{{ $message }}</strong>
                                </div>
                            </div>
                        @enderror
                    </div>

                    {{-- question_ar --}}


                    {{-- question_en --}}
                    <div class="col-md-6">
                        <div class="form-group mb-4">
                            <label for="question_en">Question In English <span class="text-danger">*</span></label>
                            <input required type="text" name="question_en"
                                class="form-control @error('question_en') is-invalid @enderror"
                                value="{{ $faq->question_en }}">
                        </div>


                        @error('question_en')
                            <div class="d-flex justify-content-center ">

                                <div class="text-danger">
                                    <strong>{{ $message }}</strong>
                                </div>
                            </div>
                        @enderror
                    </div>

                    {{-- question_en --}}



                    {{-- answer_ar --}}
                    <div class="col-md-6">
                        <div class="form-group mb-4">
                            <label for="answer_ar"> Answer In Arabic </label>


                            <textarea required dir="rtl" name="answer_ar" id="answer_ar" cols="30" rows="3"
                                class="form-control @error('answer_ar') is-invalid @enderror">{{ $faq->answer_ar }}</textarea>
                        </div>


                        @error('answer_ar')
                            <div class="d-flex justify-content-center ">

                                <div class="text-danger">
                                    <strong>{{ $message }}</strong>
                                </div>
                            </div>
                        @enderror
                    </div>

                    {{-- answer_ar --}}



                    {{-- answer_en --}}
                    <div class="col-md-6">
                        <div class="form-group mb-4">
                            <label for="answer_en"> Answer In English </label>


                            <textarea name="answer_en" id="answer_en" cols="30" rows="3"
                                class="form-control @error('answer_en') is-invalid @enderror">{{ $faq->answer_en }}</textarea>
                        </div>


                        @error('answer_en')
                            <div class="d-flex justify-content-center ">

                                <div class="text-danger">
                                    <strong>{{ $message }}</strong>
                                </div>
                            </div>
                        @enderror
                    </div>

                    {{-- answer_en --}}
                    {{-- category_id --}}
                    <div class="col-md-6">
                        <div class="form-group mb-4">
                            <label for="category_id">Category <span class="text-danger">*</span></label>
                            <select required name="category_id" id="category_id"
                                class="form-select @error('category_id') is-invalid @enderror">

                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}"
                                        {{ $faq->category_id == $category->id ? 'selected' : '' }}>
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
                            <label for="status">Status <span class="text-danger">*</span></label>
                            <select required name="status" id="status"
                                class="form-select @error('status') is-invalid @enderror">
                                <option value="1" {{ $faq->status == '1' ? 'selected' : '' }}>Active</option>
                                <option value="0" {{ $faq->status == '0' ? 'selected' : '' }}>InActive</option>
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


































        <button type="submit" class="btn btn-primary d-block m-auto">
            Edit
            <i class="fa-regular fa-pen-to-square icon icon-xs ms-2"></i>
        </button>
    </form>
@endsection


@section('scripts')
<script>

$(document).ready(function() {
    $('#category_id').select2(
        {
            width: "100%"
        }
    );





});
</script>
@endsection

