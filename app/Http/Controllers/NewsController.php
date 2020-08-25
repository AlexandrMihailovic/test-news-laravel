<?php

namespace App\Http\Controllers;

use App\Http\Requests\NewsStoreRequest;
use App\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news=News::published()->paginate();
        return  view('news',compact('news'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('news_add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\NewsStoreRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NewsStoreRequest $request)
    {
        $news=$request->only(['title','text']);
        $news['user_id']=auth()->user()->id;
        $news_id=News::create($news)->id;
        return ($news_id)?redirect()->route('news')->with('message',trans('base.success_create_news')) : abort(404);
    }

    /**
     * Display the specified resource.
     *
     * @param   $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   $news=News::find($id);
        return view('news_show',compact('news'));
    }


    public function indexNotPublished(){
        $news=News::notPublished()->paginate(5);
        return  view('news_not_published',compact('news'));
    }

    public function published(int $id){
        $news=News::find($id);
        $news->update(['published'=>true]);
        return redirect()->route('news.index_not_published')->with('message',trans('base.success_published_news'));
    }
}
