@extends('layouts.internal')

@section('title')
    Home
@stop

@section('content')
    <main>
        <div class="row">
            <div class="options col-md-12">
                <a class="btn btn-default {{ Illuminate\Support\Facades\Input::get('filter')=='news'?' active':'' }}"
                   href="{{route('news.index',['filter=new'])}}">
                    {{ __('views.recent') }}
                </a>
                <a class="btn btn-default{{ Illuminate\Support\Facades\Input::get('filter')=='best'?' active':'' }}"
                   href="{{route('news.index',['filter=best'])}}">
                    {{ __('views.best') }}
                </a>
                <a class="btn btn-default{{ Illuminate\Support\Facades\Input::get('filter')=='top'?' active':'' }}"
                   href="{{route('news.index',['filter=top'])}}" data-filter="news">{{ __('views.top') }}
                </a>
            </div>
        </div>
        <hr>
        <div class="list-news">
            @foreach($news as $item)
                <div class="col-md-12">
                    <span class="title"><a
                                href="{{ route('news.show',['id'=> $item['id']] )}}">{{$item['title']}}</a></span>
                    <samll class="pull-right text-muted"><i>{{ date('d/m/Y á\s h:i:s',$item['time'])}}</i>
                    </samll>
                    <p class="news-info text-muted">
                        <span class="glyphicon glyphicon-comment" aria-hidden="true"></span>
                        {{  __('views.comments') }} ({{ isset($item['kids'])?count($item['kids']):0 }})
                        | <span class="glyphicon glyphicon-star" aria-hidden="true"></span> {{ __('views.points')}}
                        ({{$item['score']}})
                    </p>
                    <hr>
                </div>
                <div class="clearfix"></div>
            @endforeach
        </div>
        <div class="col-md-12 text-center">
            {{ $news->appends( Illuminate\Support\Facades\Input::except('page'))->links() }}
        </div>
    </main>
@stop

