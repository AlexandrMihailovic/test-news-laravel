@extends('layouts.app')
@section('content')
    @if(session()->has('message'))
        <div class="alert alert-success">
            {{ session()->get('message') }}
        </div>
    @endif
    @auth()
        <div class="text-center">
            @if(auth()->user()->isAdmin())
                <a href="{{route('news.index_not_published')}}" class="btn btn-info">@lang('base.wait_to_published')</a>
            @else
                <a href="{{route('news.create')}}" class="btn btn-info">@lang('base.add_new_news')</a>
            @endif
        </div>
    @endauth
    <div class="container">
        @foreach ($news as $item)
            <h4>
                <a href="{{ route('news.show',['id'=>$item->id]) }}">{{$item->title}}</a>
            </h4>
            <hr/>
        @endforeach
    </div>
    {{ $news->links() }}
@stop
