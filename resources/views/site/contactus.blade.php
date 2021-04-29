@extends('site.siteLayout')

@section('content')
    <div class="innerHeader">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h2>اتصل بنا </h2>
                </div>
                <div class="col-md-6">
                    <a href="{{route('site.index')}}" class="headerLinks float-left">
                        <span class="homeLink">{{__('admin.homePage')}}</span>
                        <span>-</span>
                        <span>{{__('admin.contactUs')}}</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <section class="contactUs">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    @include('site.includes.alerts.success')
                    @include('site.includes.alerts.errors')
                    <h2 class="title">{{__('admin.communicationData')}}</h2>
                    <ul class="contactInfoSec">
                        <li>
                            <div class="contactInfo clearfix">
                                <span class="contactIcon">
                                    <img src="{{asset('MadarTemplate/assets/images/mobile.png')}}" alt=""></span>
                                <span class="infoDetails">
                                    <p>{{__('admin.mobile')}}</p>
                                    <h3>{{$setting->mobile}}</h3>
                                </span>
                            </div>
                            <div class="contactInfo clearfix">
                                <span class="contactIcon">
                                    <img src="{{asset('MadarTemplate/assets/images/phone.png')}}" alt="">
                                </span>
                                <span class="infoDetails">
                                    <p>{{__('admin.phone')}}</p>
                                    <h3>{{$setting->phone}}</h3>
                                </span>
                            </div>
                        </li>
                        <li>
                            <div class="contactInfo clearfix">
                                <span class="contactIcon">
                                    <img src="{{asset('MadarTemplate/assets/images/mobile.png')}}" alt="">
                                </span>
                                <span class="infoDetails">
                                    <p>{{__('admin.email')}}</p>
                                    <h3>{{$setting->email}}</h3>
                                </span>
                            </div>
                            <div class="contactInfo clearfix">
                                <span class="infoDetails">
                                    <p>{{__('admin.followUs')}}</p>
                                    <ul class="socialIcons contactSocial ">
                                        <li class="paperPlane">
                                            <a href="{{$setting->telegram_url}}"><i class="fab fa-telegram"></i></a>
                                        </li>
                                        <li class="facebook">
                                            <a href="{{$setting->facebook_url}}"><i class="lni lni-facebook-oval"></i></a>
                                        </li>
                                        <li class="twitter">
                                            <a href="{{$setting->twitter_url}}"><i class="fab fa-twitter"></i></a>
                                        </li>
                                    </ul>
                                </span>
                            </div>
                        </li>
                    </ul>
                    <div class="googlemap">
                        <div class="container">
                            <div class="row">
                                <div class="col-12">
                                    <object
                                        data="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d34015.943594576835!2d-106.43242624069771!3d31.677719472407432!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x86e75d90e99d597b%3A0x6cd3eb9a9fcd23f1!2sCourtyard+by+Marriott+Ciudad+Juarez!5e0!3m2!1sen!2sbd!4v1533791187584">
                                    </object>
                                </div>
                            </div>
                        </div>
                    </div>

                    <form action="{{route('site.contactUs.store')}}" class="contactForm" method="post">
                        @csrf
                        <h2 class="title">{{__('admin.directContact')}}</h2>
                        <div class="form-group marginGroup">
                            <input type="text" class="form-control" placeholder="الاسم" name="name">
                            @error('name')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group marginGroup">
                            <input type="text" class="form-control" placeholder="رقم الجوال" name="mobile">
                            @error('mobile')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control" placeholder="mail@mail.mail" name="email">
                            @error('email')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group textareaGroup">
                            <textarea class="form-control" placeholder=" اكتب رسالتك هنا" name="message"></textarea>
                            @error('message')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <button class="sendBtn btn circle" type="submit">
                            <i class="fas fa-paper-plane"></i>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
