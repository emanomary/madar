@extends('site.siteLayout')

@section('content')
    {{--SECTION 1--}}
    <section class="hero">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="latestNews">
                        <div class="row">
                            @if($news->count() > 0)
                                @foreach($news as $index=>$new)
                                    @if($index == 0)
                                        <div class="col-md-12">
                                            <div class="newsSection">
                                                <div class="row">
                                                    <div class="col-md-7">
                                                        <div class="heroNewsImg">
                                                            <img src="{{asset('Admin/assets/images/news/'.$new->image)}}" alt="">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-5">
                                                        <div class="heronewsDetails">
                                                            <div class="topNews">
                                                                <div class="tag">
                                                                    <span class="circle">
                                                                        <i><img src="{{asset('MadarTemplate/assets/images/tag.png')}}" alt=""></i>
                                                                    </span>{{$new->category->name}}
                                                                </div>
                                                                <div class="tag">
                                                                <span class="circle">
                                                                    <i><img src="{{asset('MadarTemplate/assets/images/clock.png')}}" alt=""></i>
                                                                </span>{{__('admin.lastUpdate')}}
                                                                    <span>{{$new->created_at->diffForHumans()}}</span>
                                                                </div>
                                                            </div>
                                                            <h4><a href="{{route('site.showNew',$new->slug)}}">{{$new->title}}</a></h4>
                                                            <p>{!! $new->details !!}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @elseif($index > 0)
                                        <div class="col-lg-3 col-6 ">
                                            <div class="newsBox">
                                                <div class="heroNewsImgcont">
                                                    <div class="newsImg">
                                                        <img src="{{asset('Admin/assets/images/news/'.$new->image)}}" alt="">
                                                    </div>
                                                    <div class="categ">
                                                        <div class="tag">
                                                            <span class="circle">
                                                                <i><img src="{{asset('MadarTemplate/assets/images/tag.png')}}" alt=""></i>
                                                            </span>{{$new->category->name}}
                                                        </div>
                                                    </div>
                                                </div>
                                                <h6><a href="{{route('site.showNew',$new->slug)}}">{{$new->title}}</a></h6>
                                                <span class="date">
                                                    <i><img src="{{asset('MadarTemplate/assets/images/clock2.png')}}" alt=""></i>
                                                    {{__('admin.lastUpdate')}}
                                                    <span>{{$new->created_at->diffForHumans()}}</span>
                                                </span>
                                            </div>
                                        </div>
                                    @else
                                        <div class="col-lg-3 col-6 ">
                                            <div class="alert alert-danger">عذراً لا يوجد أخبار مضافة</div>
                                        </div>
                                    @endif
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{--SECTION 2--}}
    <section class="middleEast">
        <div class="container">
            <div class="row">
                <div class="col-md-12 ">
                    <div class="sectionTitle clearfix">
                        <h2 class="title">{{__('admin.middleEast')}}</h2>
                        @if(isset($middleEast) && $middleEast->count() >0)
                        <a href="{{route('site.categoryNews',$middleEast->first()->category->id)}}"
                           class="float-left moreBtn">
                            المزيد
                            <span class="circle">
                                <i class="fas fa-arrow-left"></i>
                            </span>
                        </a>
                        @endif
                    </div>
                </div>
                <div class="middleEastSlider owl-carousel">
                    @if($middleEast->count() > 0)
                        @foreach($middleEast as $middle)
                            <div class="newsBox">
                                <div class="heroNewsImgcont">
                                    <div class="newsImg">
                                        <img src="{{asset('Admin/assets/images/news/'.$middle->image)}}" alt="">
                                    </div>
                                    <div class="categ">
                                        <div class="tag">
                                            <span class="circle">
                                                <i><img src="{{asset('MadarTemplate/assets/images/tag.png')}}" alt=""></i>
                                            </span>{{$middle->category->name}}
                                        </div>
                                    </div>
                                </div>
                                <h6><a href="{{route('site.showNew',$middle->slug)}}">{{$middle->title}}</a></h6>
                                <span class="date">
                                    <i><img src="{{asset('MadarTemplate/assets/images/clock2.png')}}" alt=""></i>
                                    {{__('admin.lastUpdate')}}
                                    <span>{{$middle->created_at->diffForHumans()}}</span>
                                </span>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </section>

    {{--FREE SPACE--}}
    <section class="freeSpace">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="freeBox">
                        <div class="innerBox">
                            <h3>{{__('admin.freeSpace')}}</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{--ARTICLES--}}
    <section class="articles">
        <div class="container">
            <div class="col-md-12">
                <div class="sectionTitle clearfix">
                    <h4 class="title">{{__('admin.investigationArticles')}}</h4>
                </div>
                <div class="owl-carousel articlesCarousel">
                    @if($articleNews->count() > 0 || $investigationNews->count() > 0)
                        @foreach($articleNews as $articleNew)
                            <div class="articlesItem clearfix">
                            <div class="writerImgCont">
                                <div class="articlesWriter">
                                    <img src="{{asset('Admin/assets/images/users/'.$articleNew->user->avatar)}}" alt="">
                                </div>
                            </div>
                            <div class="articleInfo">
                                <div class="type">
                                    <span>
                                        <i><img src="{{asset('MadarTemplate/assets/images/tag.png')}}" alt=""></i>
                                        {{$articleNew->category->name}}
                                    </span>
                                </div>
                                <h5>{{$articleNew->user->name}}</h5>
                                <span class="date">
                                    <i><img src="{{asset('MadarTemplate/assets/images/clock2.png')}}" alt=""></i>
                                    {{__('admin.lastUpdate')}}
                                    <span>{{$articleNew->created_at->diffForHumans()}}</span>
                                </span>
                            </div>
                        </div>
                        @endforeach
                        @foreach($investigationNews as $investigationNew)
                                <div class="articlesItem clearfix">
                                    <div class="writerImgCont">
                                        <div class="articlesWriter">
                                            <img src="{{asset('Admin/assets/images/users/'.$investigationNew->user->avatar)}}" alt="">
                                        </div>
                                    </div>
                                    <div class="articleInfo">
                                        <div class="type">
                                    <span>
                                        <i><img src="{{asset('MadarTemplate/assets/images/tag.png')}}" alt=""></i>
                                        {{$investigationNew->category->name}}
                                    </span>
                                        </div>
                                        <h5>{{$investigationNew->user->name}}</h5>
                                        <span class="date">
                                    <i><img src="{{asset('MadarTemplate/assets/images/clock2.png')}}" alt=""></i>
                                    {{__('admin.lastUpdate')}}
                                    <span>{{$investigationNew->created_at->diffForHumans()}}</span>
                                </span>
                                    </div>
                                </div>
                            @endforeach
                    @endif
                    {{--<div class="articlesItem clearfix">
                        <div class="writerImgCont">
                            <div class="articlesWriter">
                                <img src="{{asset('MadarTemplate/assets/images/artice.png')}}" alt="">
                            </div>
                        </div>
                        <div class="articleInfo">
                            <div class="type"><span><i><img src="{{asset('MadarTemplate/assets/images/tag.png')}}" alt=""></i> تحقيق</span> </div>
                            <h5>اسم الكاتب الكامل </h5>
                            <span class="date"><i><img src="{{asset('MadarTemplate/assets/images/clock2.png')}}" alt=""></i> آخر تحديث
                <span>18/3/2021</span></span>

                        </div>
                    </div>
                    <div class="articlesItem clearfix">
                        <div class="writerImgCont">
                            <div class="articlesWriter">
                                <img src="{{asset('MadarTemplate/assets/images/ee.png')}}" alt="">
                            </div>
                        </div>
                        <div class="articleInfo">
                            <div class="type"><span><i><img src="{{asset('MadarTemplate/assets/images/tag.png')}}" alt=""></i> مقالة</span> </div>
                            <h5>اسم الكاتب الكامل </h5>
                            <span class="date"><i><img src="{{asset('MadarTemplate/assets/images/clock2.png')}}" alt=""></i> آخر تحديث
                <span>18/3/2021</span></span>

                        </div>
                    </div>
                    <div class="articlesItem clearfix">
                        <div class="writerImgCont">
                            <div class="articlesWriter">
                                <img src="{{asset('MadarTemplate/assets/images/Ellipse 10.png')}}" alt="">
                            </div>
                        </div>
                        <div class="articleInfo">
                            <div class="type"><span><i><img src="{{asset('MadarTemplate/assets/images/tag.png')}}" alt=""></i> مقالة</span> </div>
                            <h5>اسم الكاتب الكامل </h5>
                            <span class="date"><i><img src="{{asset('MadarTemplate/assets/images/clock2.png')}}" alt=""></i> آخر تحديث
                <span>18/3/2021</span></span>

                        </div>
                    </div>
                    <div class="articlesItem clearfix">
                        <div class="writerImgCont">
                            <div class="articlesWriter">
                                <img src="{{asset('MadarTemplate/assets/images/ee.png')}}" alt="">
                            </div>
                        </div>
                        <div class="articleInfo">
                            <div class="type"><span><i><img src="{{asset('MadarTemplate/assets/images/tag.png')}}" alt=""></i> مقالة</span> </div>
                            <h5>اسم الكاتب الكامل </h5>
                            <span class="date"><i><img src="{{asset('MadarTemplate/assets/images/clock2.png')}}" alt=""></i> آخر تحديث
                <span>18/3/2021</span></span>

                        </div>
                    </div>--}}
                </div>
            </div>
        </div>
    </section>

    {{--HEALTH SEICNE--}}
    <section class="health-seicne">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-12">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="sectionTitle clearfix">
                                <h2 class="title">{{__('admin.tech')}}</h2>
                                @if(isset($techs) && $techs->count() >0)
                                    <a href="{{route('site.categoryNews',$techs->first()->category->id)}}"
                                       class="float-left moreBtn">
                                        المزيد
                                        <span class="circle">
                                            <i class="fas fa-arrow-left"></i>
                                        </span>
                                    </a>
                                @endif
                            </div>
                        </div>
                        @if($techs->count() > 0)
                            @foreach($techs as $tech)
                                <div class="col-6">
                                    <div class="newsBox">
                                        <div class="heroNewsImgcont">
                                            <div class="newsImg">
                                                <img src="{{asset('Admin/assets/images/news/'.$tech->image)}}" alt="">
                                            </div>
                                            <div class="categ">
                                                <div class="tag">
                                                    <span class="circle">
                                                        <i><img src="{{asset('MadarTemplate/assets/images/tag.png')}}" alt=""></i>
                                                    </span>{{$tech->category->name}}</div>
                                            </div>
                                        </div>
                                        <h6><a href="{{route('site.showNew',$tech->slug)}}">{{$tech->title}}</a></h6>
                                        <span class="date">
                                            <i><img src="{{asset('MadarTemplate/assets/images/clock2.png')}}" alt=""></i>
                                            {{__('admin.lastUpdate')}}
                                            <span>{{$tech->created_at->diffForHumans()}}</span>
                                        </span>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
                <div class="col-lg-6 col-md-12">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="sectionTitle clearfix">
                                <h2 class="title">{{__('admin.health')}}</h2>
                                @if(isset($healths) && $healths->count() >0)
                                    <a href="{{route('site.categoryNews',$healths->first()->category->id)}}" class="float-left moreBtn">
                                        المزيد
                                        <span class="circle"><i class="fas fa-arrow-left"></i></span>
                                    </a>
                                @endif
                            </div>
                        </div>
                        @if($healths->count() > 0)
                            @foreach($healths as $health)
                                <div class="col-6">
                                    <div class="newsBox">
                                        <div class="heroNewsImgcont">
                                            <div class="newsImg">
                                                <img src="{{asset('Admin/assets/images/news/'.$health->image)}}" alt="">
                                            </div>
                                            <div class="categ">
                                                <div class="tag">
                                                    <span class="circle">
                                                        <i><img src="{{asset('MadarTemplate/assets/images/tag.png')}}" alt=""></i>
                                                    </span>{{$health->category->name}}</div>
                                            </div>
                                        </div>
                                        <h6><a href="{{route('site.showNew',$health->slug)}}">{{$health->title}}</a></h6>
                                        <span class="date">
                                            <i><img src="{{asset('MadarTemplate/assets/images/clock2.png')}}" alt=""></i>
                                            {{__('admin.lastUpdate')}}
                                            <span>{{$health->created_at->diffForHumans()}}</span>
                                        </span>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{--InfoGrapgic--}}
    <section class="infonGraphic">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="sectionTitle clearfix">
                        <h2 class="title">{{__('admin.infoGraphic')}}</h2>
                        @if(isset($infoGraphics) && $infoGraphics->count() >0)
                            <a href="{{route('site.categoryNews',$infoGraphics->first()->category->id)}}" class="float-left moreBtn">
                                <span class="circle">
                                    <i class="fas fa-arrow-left"></i>
                                </span>
                            </a>
                        @endif
                    </div>
                </div>

                @if($infoGraphics->count() > 0)
                    @foreach($infoGraphics as $index=>$infographic)
                        @if($index == 0)
                            <div class="col-md-9">
                                <div class="rightInfographic">
                                    <div class="rightInfographicImg">
                                        <img src="{{asset('Admin/assets/images/news/'.$infographic->image)}}" alt="">
                                    </div>
                                    <h4><a href="{{route('site.showNew',$infographic->slug)}}">{{$infographic->title}}</a></h4>
                                </div>
                            </div>
                        @endif
                    @endforeach
                    <div class="col-md-3">
                    @foreach($infoGraphics as $index=>$infographic)
                        @if($index > 0)
                            <div class="leftInfoGraphic">
                                <div class="InfographicImgLeft">
                                    <img src="{{asset('Admin/assets/images/news/'.$infographic->image)}}" alt="">
                                </div>
                                <p><a href="{{route('site.showNew',$infographic->slug)}}">{{$infographic->title}}</a></p>
                            </div>
                        @endif
                    @endforeach
                    </div>
                @endif
            </div>
        </div>
    </section>

    {{--Videos--}}
    <section class="videos">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="sectionTitle clearfix">
                        <h2 class="title">{{__('admin.youtube')}}</h2>
                    </div>
                </div>
                @if($youtubes->count() > 0)
                    @foreach($youtubes as $index=>$youtube)
                        @if($index == 0)
                            <div class="col-md-12">
                                <div class="newsSection">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="heroNewsImg">
                                                {{parse_str(parse_url($youtube->url,PHP_URL_QUERY ), $my_array_of_vars)}}
                                                <iframe height="300px"
                                                        src="{{url('https://www.youtube.com/embed/'.$my_array_of_vars['v'])}}"
                                                        title="YouTube video player"
                                                        frameborder="0"
                                                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                                        allowfullscreen>
                                                </iframe>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="heronewsDetails">
                                                <div class="topNews">
                                                    <div class="tag">
                                                        <span class="circle">
                                                            <i><img src="{{asset('MadarTemplate/assets/images/play.png')}}" alt=""></i>
                                                        </span>{{__('admin.youtube')}}
                                                    </div>
                                                    <div class="tag">
                                                        <span class="circle">
                                                            <i><img src="{{asset('MadarTemplate/assets/images/clock.png')}}" alt=""></i>
                                                        </span>{{__('admin.lastUpdate')}}
                                                        <span>{{$youtube->created_at->diffForHumans() }}</span>
                                                    </div>
                                                </div>
                                                <h4><a href="{{route('site.showNew',$youtube->id)}}">{{$youtube->title}}</a></h4>
                                                <p>{!!$youtube->description!!}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                @endif
                @if($youtubes->count() > 0)
                    <div class="col-md-12">
                        <div class="newsSection">
                            <div class="row">
                                @foreach($youtubes as $index=>$youtube)
                                    @if($index > 0)
                                        <div class="col-lg-3 col-6">
                                            <div class="newsBox">
                                                <div class="heroNewsImgcont">
                                                    {{parse_str(parse_url($youtube->url,PHP_URL_QUERY ), $my_array_of_vars)}}
                                                    <iframe
                                                            src="{{url('https://www.youtube.com/embed/'.$my_array_of_vars['v'])}}"
                                                            title="YouTube video player"
                                                            frameborder="0"
                                                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                                            allowfullscreen>
                                                    </iframe>
                                                </div>
                                                <h6>{{$youtube->title}}</h6>
                                                <span class="date">
                                                    <i><img src="{{asset('MadarTemplate/assets/images/clock2.png')}}" alt=""></i>
                                                    {{__('admin.lastUpdate')}}
                                                    <span>{{$youtube->created_at->diffForHumans() }}</span>
                                                </span>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </section>
@endsection
