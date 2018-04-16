@extends('layouts.internal')

@section('title')
    Detalhes da Notícia
@stop

@section('content')
    <h1>{{ $item['data']['title'] }}</h1>
    @if (isset($item['data']['url']))
        <a href="{{$item['data']['url']}}" target="_blank">
           <span class="glyphicon glyphicon-arrow-right" aria-hidden="true"></span>{{ __('views.access_news') }}</a>
        |
    @endif
    <span class="glyphicon glyphicon-star" aria-hidden="true"></span> Pontos ({{$item['data']['score']}})
    | <span class="glyphicon glyphicon-calendar" aria-hidden="true"></span> {{ date('d/m/Y á\s h:i:s',$item['data']['time'])}}
    <hr>
    <h3><span class="glyphicon glyphicon-comment"></span> {{ __('views.comments') }} ({{ isset($item['kids'])? count($item['kids']):0 }})</h3>
    @if (isset($item['kids']))
        @foreach($item['kids'] as $i => $subItem)
            <div class="comment">
                <div class="by pull-left"><strong>{{$subItem['data']['by']}}</strong></div>
                <div class="date pull-right"><i
                            class="text-muted"> {{date('d/m/Y á\s h:i:s',$subItem['data']['time'])}}</i></div>
                <div class="clearfix"></div>
                <br>
                {!! $subItem['data']['text'] !!}
            </div>
            <h5><strong>{{ __('views.answer') }} ({{ isset($subItem['kids'])? count($subItem['kids']):0 }})</strong></h5>
            @if (isset($subItem['kids']))
                @foreach($subItem['kids'] as $i => $answer)
                    <div class="answer">
                        <div class="by pull-left"><strong>{{$answer['data']['by']}}</strong></div>
                        <div class="date pull-right"><i class="text-muted"> {{date('d/m/Y á\s h:i:s',$subItem['data']['time'])}}</i></div>
                        <div class="clearfix"></div>
                        <br>
                        {!! $answer['data']['text'] !!}
                    </div>
                    <br>
                @endforeach
            @endif
            <hr>
        @endforeach
    @endif
@stop