@extends('user.layout.guest')
@section('title') Contact Us @endsection
@section('content')

<!-- section start -->
<section class="contact-page section-b-space">
    <div class="container">
        <div class="row section-b-space">
            <div class="col-lg-6" style="margin: auto">
                <div class="contact-right">
                    <ul   @if (session()->get('locale') == 'ar') style="text-align:right" @endif>
                        <li>
                            <div class="contact-icon"><img src="../assets/images/icon/phone.png"
                                    alt="Generic placeholder image">
                                <h6>{{ __('trans.Phone') }}</h6>
                            </div>
                            <div class="media-body">
                                <p>{{ $contact_us->phone1 }}</p>
                                <p>{{ $contact_us->phone2 }}</p>
                            </div>
                        </li>
                        <li>
                            <div class="contact-icon"><i class="fa fa-map-marker" aria-hidden="true"></i>
                                <h6>{{ __('trans.Address') }}</h6>
                            </div>
                            <div class="media-body">
                                <p>{{ $contact_us->address }}</p>
                            </div>
                        </li>
                        <li>
                            <div class="contact-icon"><img src="../assets/images/icon/email.png"
                                    alt="Generic placeholder image">
                                <h6>{{ __('trans.Email') }}</h6>
                            </div>
                            <div class="media-body">
                                <p>{{ $contact_us->email }}</p>
                            </div>
                        </li>
                        <li>
                            <div class="contact-icon"><i class="fa fa-fax" aria-hidden="true"></i>
                                <h6>{{ __('trans.Social Media') }}</h6>
                            </div>
                            <div class="media-body">
                                <p>{{ __('trans.Facebook') }} : {{ $contact_us->facebook }}</p>
                                <p>{{ __('trans.LinedIn') }} : {{ $contact_us->linkedIn }}</p>
                                <p>{{ __('trans.Instegtram') }}  : {{ $contact_us->instegram }}</p>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        {{-- <div class="row">
            <div class="col-sm-12">
                <form class="theme-form">
                    <div class="form-row row">
                        <div class="col-md-6">
                            <label for="name">First Name</label>
                            <input type="text" class="form-control" id="name" placeholder="Enter Your name"
                                required="">
                        </div>
                        <div class="col-md-6">
                            <label for="email">Last Name</label>
                            <input type="text" class="form-control" id="last-name" placeholder="Email" required="">
                        </div>
                        <div class="col-md-6">
                            <label for="review">Phone number</label>
                            <input type="text" class="form-control" id="review" placeholder="Enter your number"
                                required="">
                        </div>
                        <div class="col-md-6">
                            <label for="email">Email</label>
                            <input type="text" class="form-control" id="email" placeholder="Email" required="">
                        </div>
                        <div class="col-md-12">
                            <label for="review">Write Your Message</label>
                            <textarea class="form-control" placeholder="Write Your Message"
                                id="exampleFormControlTextarea1" rows="6"></textarea>
                        </div>
                        <div class="col-md-12">
                            <button class="btn btn-solid" type="submit">Send Your Message</button>
                        </div>
                    </div>
                </form>
            </div>
        </div> --}}
    </div>
</section>
<!-- Section ends -->



@endsection
