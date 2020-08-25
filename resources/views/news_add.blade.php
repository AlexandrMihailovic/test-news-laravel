@extends('layouts.app')
@section('content')
    <div class="container">
        <form action="{{route('news.store')}}" id="addNews" method="POST">
            @csrf
            <div>
                <label>@lang('base.title')</label>
                <input class="form-control" type="text" name="title" required >
            </div>
            <div>
                <label>@lang('base.text')</label>
                <textarea class="form-control" name="text" ></textarea >
            </div>
            <br>
            <div>
                <input class="btn btn-info" type="submit" value="@lang('base.save_news')"/ >
            </div>
        </form>
    </div>

@stop
