
    <div class="topHeader clearfix">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <a class="logo" href="{{route('site.index')}}">
                        <img src="{{asset('Admin/assets/images/logo/'.$setting->logo)}}" alt="">
                    </a>
                </div>
                <div class="col-md-6">
                    <ul class="socialIcons">
                        <li class="paperPlane">
                            <a href="{{$setting->telegram_url}}" target="_blank">
                                <i class="fab fa-telegram"></i>
                            </a>
                        </li>
                        <li class="facebook">
                            <a href="{{$setting->facebook_url}}" target="_blank">
                                <i class="lni lni-facebook-oval"></i>
                            </a>
                        </li>
                        <li class="twitter">
                            <a href="{{$setting->twitter_url}}" target="_blank">
                                <i class="fab fa-twitter"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <header>
        <div class="container">
            <div class="row">
                <nav class="navbar navbar-expand-lg float-right">
                    <button class=" navbar-toggle navbar-toggler  navbar-toggler-right"
                            type="button" data-toggle="collapse"
                            data-target="#navbarNav" aria-controls="navbarNav"
                            aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon">
                          <i></i>
                          <i></i>
                          <i></i>
                        </span>
                    </button>
                    <a class="logo d-lg-none d-md-none d-block" href="{{route('site.index')}}">
                        <img src="{{asset('Admin/assets/images/logo/'.$setting->logo)}}" alt="">
                    </a>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <button type="button" class="close d-lg-none d-md-none d-block " data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <a class="logo d-lg-none d-md-none d-block" href="{{route('site.index')}}">
                            <img src="{{asset('Admin/assets/images/logo/'.$setting->logo)}}" alt="">
                        </a>
                        <ul class="navbar-nav">
                            <li class="nav-item active">
                                <a class="nav-link d-lg-block d-md-block d-none" href="{{route('site.index')}}">
                                    <i class="fas fa-home"></i>
                                </a>
                                <a class="nav-link  mobileHome d-block d-lg-none d-md-none " href="{{route('site.index')}}">
                                    {{__('admin.homePage')}}
                                </a>
                            </li>
                            @if($categories->count() > 0)
                                @foreach($categories as $category)
                                    @if($category->child->count() > 0)
                                        <li class="dropdown">
                                            <a class="nav-link dropdown-toggle"
                                                    type="button" id="dropdownMenu2"
                                                    data-toggle="dropdown"
                                                    aria-haspopup="true"
                                                    aria-expanded="false">
                                                {{$category->name}}
                                            </a>
                                            <ul class="dropdown-menu float-right text-right"
                                                aria-labelledby="dropdownMenu2"
                                                style="background-image: linear-gradient(45deg,#36BCBB 0%, #1191D0 100% );border-radius: 0px;border: 0px;margin-top: 18px;">
                                                @foreach($category->child as $child)
                                                    <li class="dropdown-item" style="font-family: 'DUBAI-MEDIUM';">
                                                        <a href="{{route('site.categoryNews',$child->id)}}" style="display: block;">{{$child->name}}</a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </li>
                                    @else
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{route('site.categoryNews',$category->id)}}">{{$category->name}}</a>
                                        </li>
                                    @endif
                                @endforeach
                            @endif
                        </ul>
                        <ul class="socialIcons  d-lg-none d-md-none d-block">
                            <li class="paperPlane">
                                <a href="{{$setting->telegram_url}}" target="_blank">
                                    <i class="fas fa-paper-plane"></i>
                                </a>
                            </li>
                            <li class="facebook">
                                <a href="{{$setting->facebook_url}}" target="_blank">
                                    <i class="fab fa-facebook-f"></i>
                                </a>
                            </li>
                            <li class="twitter">
                                <a href="{{$setting->twitter_url}}" target="_blank">
                                    <i class="fab fa-twitter"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <a href="#" class="float-left d-lg-none d-md-none d-block mobilesearch">
                        <i class="fas fa-search"></i>
                    </a>
                </nav>
                <div class="searchBox float-left ">
                    <form action="" class="headerSearch">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="ابحث بالموقع">
                        </div>
                        <button class="seachBtn" type="submit">
                            <i class="fas fa-search"></i>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </header>
