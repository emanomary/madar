<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="footerLogo">
                    <img src="{{asset('MadarTemplate/assets/images/footerLogo.png')}}" alt="">
                </div>
            </div>
            <div class="col-lg-6 col-md-5">
                <p class="footerText">هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص
                    العربى، حيث يمكنك أن
                    تولد مثل هذا النص أو العديد من النصوص الأخرى إضافة إلى زيادة عدد الحروف التى يولدها التطبيق.
                </p>
            </div>
            <div class="col-lg-3 col-md-4">
                <ul class="socialIcons footerSocial float-left">
                    <li class="paperPlane">
                        <a href="{{$setting->telegram_url}}">
                            <i class="fab fa-telegram"></i>
                        </a>
                    </li>
                    <li class="facebook">
                        <a href="{{$setting->facebook_url}}">
                            <i class="lni lni-facebook-oval"></i>
                        </a>
                    </li>
                    <li class="twitter">
                        <a href="{{$setting->twitter_url}}">
                            <i class="fab fa-twitter"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="footerMenuSection">
        <div class="container">
            <div class="col-md-12">
                <ul class="footerMenu">
                    <li>
                        <a href="{{route('site.index')}}">{{__('admin.homePage')}}</a>
                    </li>
                    <li>
                        <a href="#">{{__('admin.aboutUs')}}</a>
                    </li>
                    @if($categories->count() > 0)
                        @foreach($categories as $category)
                            <li>
                                <a href="{{route('site.categoryNews',$category->id)}}">{{$category->name}}</a>
                            </li>
                        @endforeach
                    @endif
                    <li>
                        <a href="{{route('site.contactUs')}}">{{__('admin.contactUs')}}</a>
                    </li>
                </ul>
                <div class="copyRights">
                    <div class="row">
                        <div class="col-md-6 order-lg-1 order-md-1 order-2">
                            <p>جميع الحقوق محفوظة للمدار نيوز </p>
                        </div>
                        <div class="col-md-6 order-lg-2 order-md-2 order-1">
                            <div class="links float-left">
                                <a href="#">
                                    <p>سياسة الخصوصية</p>
                                </a>
                                <a href="">
                                    <p>شروط الاستخدام</p>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
