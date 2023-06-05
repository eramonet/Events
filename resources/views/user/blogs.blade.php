
@extends('user.layout.guest')
@section('title') Blogs @endsection
@section('content')


    <!-- breadcrumb start -->
    <div class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="page-title">
                        <h2>blog</h2>
                    </div>
                </div>
                <div class="col-sm-6">
                    <nav aria-label="breadcrumb" class="theme-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">{{ __('trans.Home') }}</a></li>
                            <li class="breadcrumb-item active">{{ __('trans.blogs') }}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb End -->


    <!-- section start -->
    <section class="section-b-space blog-page ratio2_3">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    @foreach($blogs as $blog)
                    <div class="row blog-media">
                        <div class="col-xl-6">
                            <div class="blog-left">
                                <a href="{{ route("blog.details",$blog->id) }}"><img src="{{ $blog->image }}"
                                        class="img-fluid blur-up lazyload bg-img" alt=""></a>
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="blog-right">
                                <div>
                                    <h6> {{ \Carbon\Carbon::parse($blog->created_at)->format('dMY') }}</h6> <a href="{{ route("blog.details",$blog->id) }}">
                                        <h4>@if(session()->get('locale') == 'en'){{ $blog->title_en }}@else{{ $blog->title_ar }}@endif</h4>
                                    </a>
                                    <ul class="post-social">
                                        <li>{{ __('trans.Posted By') }} : {{ $blog->admin->name }}</li>
                                        <li><i class="fa fa-comments"></i> {{ App\Models\BlogComment::where('blog_id',$blog->id)->count() }} Comment</li>
                                    </ul>
                                    <p>@if(session()->get('locale') == 'en'){{ $blog->desc_en }}@else{{ $blog->desc_ar }}@endif</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>
            </div>
        </div>
    </section>
    <!-- Section ends -->



@endsection
