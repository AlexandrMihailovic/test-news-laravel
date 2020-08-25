@extends('layouts.app')
@section('content')
    <h1 class="text-center">{{$news->title}}</h1>
    <div class="p-1 m-1">
        {{$news->text}}
    </div>
    <div class="text-center">
        <a href="{{url()->previous()}}">@lang('base.back')</a>
    </div>
@stop
