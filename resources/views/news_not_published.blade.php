@extends('layouts.app')
@section('content')
    @if(session()->has('message'))
        <div class="alert alert-success">
            {{ session()->get('message') }}
        </div>
    @endif
    <div class="container">
        @foreach($news as $item)
            <div class="card m-1 p-1">
                <h4 class="card-title text-center">
                    {{$item->title}}
                </h4>
                <div class="card-body">
                    {{$item->text}}
                </div>
                <div class="text-center">
                    <form action="{{route('news.published',['id'=>$item->id])}}" method="post">
                        @csrf
                    <input class="btn btn-primary" type="submit" value="@lang('base.published_news')">
                    </form>
                </div>
            </div>
        @endforeach
    </div>
    <div class="text-center">
        <a href="{{url()->previous()}}">@lang('base.back')</a>
    </div>
@stop
