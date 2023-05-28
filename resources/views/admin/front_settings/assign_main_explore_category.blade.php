@extends('layouts.admin.master')
@section('title')
    Assign Explore Category Banner
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
                    <li class="breadcrumb-item active" aria-current="page">Assign Explore Category Banner</li>
                </ol>
            </nav>
            <div style="margin: auto">
                @foreach ($errors->all() as $error)
                    <div class="alert alert-danger" role="alert">
                        {{ $error }}
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <form action="{{ route('admin.front-settings.edit_assign_explore_category') }}" method="POST">
        <div class="card card-body border-0 shadow table-wrapper table-responsive">
            <h2 class="h4">Main Explore Category Banner</h2><br>

            <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>


            <div class="container">
                <select name="main_selector" class="form-control">
                    @foreach ($main_categories as $main_category_main)
                        <option value="{{ $main_category_main->id }}">
                            {{ $main_category_main->title_en . '---' . $main_category_main->title_ar }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="card card-body border-0 shadow table-wrapper table-responsive">
            <h2 class="h4">Right Explore Category Banner</h2><br>

            <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>


            <div class="container">
                <div class="row">
                    @foreach ($main_categories as $main_category_main)
                        <div class="col-4">
                            <label class="form-control">
                                <input type="checkbox" class="right_section_selector" class="radio" value="1"
                                    name="right_selector[{{ $main_category_main->id }}]" />
                                <span
                                    style="margin-left: 30px;">{{ $main_category_main->title_en . '---' . $main_category_main->title_ar }}</span>
                            </label>
                        </div>
                    @endforeach
                </div>



            </div>
        </div>

        <div class="card card-body border-0 shadow table-wrapper table-responsive">
            <h2 class="h4">Below Explore Category Banner</h2><br>

            <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>


            <div class="container">
                <div class="row">
                    @foreach ($main_categories as $main_category_main)
                        <div class="col-4">
                            <label class="form-control">
                                <input type="checkbox" class="below_section_selector" class="radio" value="1"
                                    name="below_selector[{{ $main_category_main->id }}]" />
                                <span
                                    style="margin-left: 30px;">{{ $main_category_main->title_en . '---' . $main_category_main->title_ar }}</span>
                            </label>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <br>
        <button type="submit" class="btn btn-primary d-block m-auto">
            Save
            <i class="fas fa-plus icon icon-xs ms-2"></i>
        </button>
    </form>


    <script>
        $(".right_section_selector").on("click", (event) => {
            // get chkbox id from 'for' attr on label
            var chkboxID = $(event.currentTarget).prop("for");

            // toggle label, toggle checkbox
            if ($(event.currentTarget).text() === "Item added") {
                $(event.currentTarget).text("Compare");
                $("#" + chkboxID).removeAttr("checked");
            } else {
                $(event.currentTarget).text("Item added");
                $("#" + chkboxID).prop("checked", "checked");
            }

            // enable / disable checks
            if ($('.right_section_selector:checked').length < 6) {
                $(event.currentTarget).addClass("visible");
                $(".right_section_selector[type=checkbox]").removeAttr("disabled");
            } else {
                $(".right_section_selector[type=checkbox]").prop("disabled", "disabled");
                $(".right_section_selector[type=checkbox]:checked").removeAttr("disabled");
            }
        });

        $(".below_section_selector").on("click", (event) => {
            // get chkbox id from 'for' attr on label
            var chkboxID = $(event.currentTarget).prop("for");

            // toggle label, toggle checkbox
            if ($(event.currentTarget).text() === "Item added") {
                $(event.currentTarget).text("Compare");
                $("#" + chkboxID).removeAttr("checked");
            } else {
                $(event.currentTarget).text("Item added");
                $("#" + chkboxID).prop("checked", "checked");
            }

            // enable / disable checks
            if ($('.below_section_selector:checked').length < 6) {
                $(event.currentTarget).addClass("visible");
                $(".below_section_selector[type=checkbox]").removeAttr("disabled");
            } else {
                $(".below_section_selector[type=checkbox]").prop("disabled", "disabled");
                $(".below_section_selector[type=checkbox]:checked").removeAttr("disabled");
            }
        });
    </script>
@endsection
