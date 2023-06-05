
@extends('user.layout.guest')
@section('title') Blog Details @endsection
@section('content')
    <!-- breadcrumb start-->
    <div class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="page-title">
                        <h2>blog details</h2>
                    </div>
                </div>
                <div class="col-sm-6">
                    <nav aria-label="breadcrumb" class="theme-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">{{ __('trans.Home') }}</a></li>
                            <li class="breadcrumb-item"><a href="index.html">{{ __('trans.blog') }}</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{ __('trans.blog deatils') }}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb end-->


    <!--section start-->
    <section class="blog-detail-page section-b-space ratio2_3">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 blog-detail">
                    <img src="{{ $blog->image }}" class="img-fluid blur-up lazyload" alt="">
                    <h3>@if(session()->get('locale') == 'en'){{ $blog->title_en }}@else{{ $blog->title_ar }}@endif</h3>
                    <ul class="post-social">
                        <li>{{ \Carbon\Carbon::parse($blog->created_at)->format('dMY') }}</li>
                        <li>{{ __('trans.Posted By') }} : {{ $blog->admin->name }}</li>
                        <li><i class="fa fa-comments"></i> {{ App\Models\BlogComment::where('blog_id',$blog->id)->count() }} Comment</li>
                    </ul>
                    <p>@if(session()->get('locale') == 'en'){{ $blog->desc_en }}@else{{ $blog->desc_ar }}@endif</p>

                </div>
            </div>

            <div class="row section-b-space">
                <div class="col-sm-12">
                    <ul class="comment-section">
                        @foreach(App\Models\BlogComment::where('blog_id',$blog->id)->get() as $comment)
                        <li>
                            <div class="media"><img src="{{ $comment->user->image_url }}" alt="Generic placeholder image">
                                <div class="media-body">
                                    <h6>{{ $comment->user->name }} <span>( {{ $comment->created_at }} )</span></h6>
                                    <p>{{ $comment->text_encomment }}</p>
                                </div>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="row blog-contact">
                <div class="col-sm-12">
                    <h2>{{ __('trans.Leave Your Comment') }}</h2>
                    <form class="theme-form" method="POST" action="{{ route("comment.blog") }}">
                        @csrf
                        <input hidden name="blog_id" value="{{ $blog->id }}"/>
                        <input hidden name="user_id" value="{{ auth()->user()->id }}"/>
                        <div class="form-row row">
                            <div class="col-md-12">
                                <label for="exampleFormControlTextarea1">{{ __('trans.Comment') }}</label>
                                <textarea class="form-control" placeholder="{{ __('trans.Comment') }}"
                                    id="exampleFormControlTextarea1" name="text_encomment" rows="6"></textarea>
                            </div>
                            <div class="col-md-12">
                                <button class="btn btn-solid" type="submit">{{ __('trans.Post Comment') }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!--Section ends-->

@endsection
