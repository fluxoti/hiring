@extends('app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <strong>
                        @if (Auth::check())
                            Você esta logado!
                        @else
                            Você não esta logado!
                        @endif
                        </strong>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection