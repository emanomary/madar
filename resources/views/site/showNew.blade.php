@extends('site.siteLayout')

@section('content')
    <div class="innerHeader">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h2>{{$showNew->title}}</h2>
                </div>
                <div class="col-md-6">
                    <a href="{{route('site.index')}}" class="headerLinks float-left"> <span class="homeLink">
                            {{__('admin.homePage')}}
                        </span> <span>-</span>
                        <span class="homeLink">{{$showNew->category->name}}</span>{{--<span>-</span>--}}
                        {{--<span> هذا النص هو ...</span>--}}
                    </a>
                </div>
            </div>
        </div>
    </div>
    <section class="newsDetailsSec">
        <div class="container">
            <div class="row newsSection">
                <div class="col-md-12">
                    <div class="heroNewsImg">
                        <img src="{{asset('Admin/assets/images/news/'.$showNew->image)}}" alt="">
                        <div class="topNews">
                            <div class="tag">
                                <span class="circle"><i class="lni lni-tag"></i>
                                </span>
                                {{$showNew->category->name}}
                            </div>
                            <div class="tag"> <span class="circle"><i class="far fa-clock"></i></span>
                                {{__('admin.latestUpdate')}}
                                <span>{{$showNew->created_at->diffForHumans()}}</span>
                            </div>
                        </div>
                    </div>
                    <div class="heronewsDetails">
                        <h4>{{$showNew->title}}</h4>
                        <p>{!! $showNew->details !!}</p>

                        <div class="freeBox detailspagefreeBox">
                            <div class="innerBox">
                                <h3>مساحة حرة</h3>
                            </div>
                        </div>
                    </div>

                    <div class="latestNews detailsNewsPge">
                        <div class='col-md-12'>
                            <h2 class="title">{{__('admin.latestNews')}}</h2>
                        </div>
                        <div class="row">
                        @if($latestNews->count() > 0)
                            @foreach($latestNews as $latestNew)
                                <div class="col-lg-3 col-6 ">
                                <div class="newsBox">
                                    <div class="heroNewsImgcont">
                                        <div class="newsImg">
                                            <img src="{{asset('Admin/assets/images/news/'.$latestNew->image)}}" alt="">
                                        </div>
                                        <div class="categ">
                                            <div class="tag">
                                                <span class="circle">
                                                    <i class="lni lni-tag"></i>
                                                </span>
                                                {{$latestNew->category->name}}
                                            </div>
                                        </div>
                                    </div>
                                    <h6><a href="{{route('site.showNew',$latestNew->slug)}}">{{$latestNew->title}}</a></h6>
                                    <span class="date">
                                        <i class="far fa-clock"></i>
                                        {{__('admin.latestUpdate')}}
                                        <span>{{$latestNew->created_at->diffForHumans()}}</span>
                                    </span>
                                </div>
                            </div>
                            @endforeach
                        @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
