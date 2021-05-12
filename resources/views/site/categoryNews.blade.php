@extends('site.siteLayout')

@section('content')
    <div class="innerHeader">
        <div class="container">
            @if($categoryNews->count() > 0)
                @foreach($categoryNews as $index=>$categoryNew)
                    @if($categoryNew->category_id == $id)
                        <div class="row">
                            <div class="col-md-6">
                                <h2>{{$categoryNew->category->name}}</h2>
                            </div>
                            <div class="col-md-6 headerLinks float-left text-left">
                                <a href="{{route('site.index')}}">
                                    <span class="homeLink">{{__('admin.homePage')}}</span>
                                </a>
                                    <span>-</span>
                                <a href="#">
                                    <span>{{$categoryNew->category->name}}</span></a>
                            </div>
                        </div>
                        @break;
                    @endif
                @endforeach
            @else
                <div class="row">
                    <div class="col-md-12">
                        <a href="{{route('site.index')}}" class="headerLinks float-left">
                            <span class="homeLink">{{__('admin.homePage')}}</span>
                        </a>
                    </div>
                </div>
            @endif
        </div>
    </div>
    <section class="middleEastsection">
        <div class="container">
            <div class="row">
                <div class="col-md-12 ">
                    <div class="latestNews  marginBottomsection">
                        <div class="row clearfix">
                            @if($categoryNews->count() > 0)
                                @foreach($categoryNews as $index=>$categoryNew)
                                    @if($index == 0)
                                        <div class="col-md-12">
                                            <div class="newsSection ">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="heroNewsImg">
                                                            <img src="{{asset('Admin/assets/images/news/'.$categoryNew->image)}}" alt="">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="heronewsDetails">
                                                            <div class="topNews">
                                                                <div class="tag">
                                            <span class="circle">
                                                <i class="lni lni-tag"></i>
                                            </span>{{$categoryNew->category->name}}
                                                                </div>
                                                                <div class="tag"> <span class="circle">
                                                <i class="far fa-clock"></i></span>
                                                                    {{__('admin.lastUpdate')}}
                                                                    <span>{{$categoryNew->created_at->diffForHumans()}}</span>
                                                                </div>
                                                            </div>
                                                            <h4><a href="{{route('site.showNew',$categoryNew->slug)}}">{{$categoryNew->title}}</a></h4>
                                                            <p>{!! substr(strip_tags($categoryNew->details), 0, 600) !!}
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @elseif($index > 0 && $index < 9)
                                        <div class="col-lg-3 col-6 ">
                                    <div class="newsBox">
                                        <div class="heroNewsImgcont">
                                            <div class="newsImg">
                                                <img src="{{asset('Admin/assets/images/news/'.$categoryNew->image)}}" alt="">
                                            </div>
                                            <div class="categ">
                                                <div class="tag">
                                                    <span class="circle">
                                                        <i class="lni lni-tag"></i>
                                                    </span>{{$categoryNew->category->name}}</div>
                                            </div>
                                        </div>
                                        <h6><a href="{{route('site.showNew',$categoryNew->slug)}}">{{$categoryNew->title}}</a></h6>
                                        <span class="date">
                                            <i class="far fa-clock"></i>
                                            {{__('admin.lastUpdate')}}
                                            <span>{{$categoryNew->created_at->diffForHumans()}}</span>
                                        </span>
                                    </div>
                                </div>
                                    @endif
                                @endforeach
                            @endif
                        </div>
                    </div>
                    <div class="freeBox">
                        <div class="innerBox">
                            <h3>مساحة حرة</h3>
                        </div>
                    </div>
                    <div class="latestNews  marginBottomsection">
                        <div class="row clearfix">
                            @if($categoryNews->count() > 0)
                                @foreach($categoryNews as $index=>$categoryNew)
                                    @if($index >= 9)
                                        <div class="col-lg-3 col-6 ">
                                            <div class="newsBox">
                                                <div class="heroNewsImgcont">
                                                    <div class="newsImg">
                                                        <img src="{{asset('Admin/assets/images/news/'.$categoryNew->image)}}" alt="">
                                                    </div>
                                                    <div class="categ">
                                                        <div class="tag">
                                                <span class="circle">
                                                    <i class="lni lni-tag"></i>
                                                </span>{{$categoryNew->category->name}}</div>
                                                    </div>
                                                </div>
                                                <h6><a href="{{route('site.showNew',$categoryNew->slug)}}">{{$categoryNew->title}}</a></h6>
                                                <span class="date">
                                                    <i class="far fa-clock"></i>
                                                    {{__('admin.lastUpdate')}}
                                                    <span>{{$categoryNew->created_at->diffForHumans()}}</span>
                                                </span>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <nav aria-label="...">
                    {{ $categoryNews->links('pagination.custom') }}
                    </nav>
                 </div>
            </div>
        </div>
    </section>
@endsection
