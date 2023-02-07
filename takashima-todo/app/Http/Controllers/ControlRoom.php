<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use App\Http\Requests\HogeRequest;

class ControlRoom extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
        $search = $request->input('search');

        $query = Article::query();

        if(!empty($search)){
            $spaceConversion = mb_convert_kana($search, 's');
            $wordArraySearched = preg_split('/[\s,]+/', $spaceConversion, -1, PREG_SPLIT_NO_EMPTY);
            foreach($wordArraySearched as $value){
                $query->where('title', 'like', '%'.$value.'%');
            }
        }
        
        $articles = $query->orderBy('created_at', 'desc')->paginate(5);
        $data=['articles'=>$articles];
        return view('todos.index',$data)->with(['articles'=>$articles, 'search'=>$search]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $articles=new Article();
        $data=['articles'=>$articles];
        return view('todos.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'title'=>'required|max:255'
        ]);


        $article = new Article();
        $article->user_id = \Auth::id();
        $article->title = $request->title;
        $article->save();
        return redirect(route('todos.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id, Article $article)
    {
        $article=Article::find($id);
        $data=['articles'=>$article];
        return view('todos.show',$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id, Article $article)
    {
        $article=Article::find($id);
        $this->authorize($article);
        $data=['articles'=>$article];
        return view('todos.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id, Article $article)
    {
        $this->validate($request,[
            'title'=>'required|max:255'
        ]);
        $article=Article::find($id);
        $this->authorize($article);

        $article->title=$request->title;
        $article->save();
        return redirect(route('todos.show',$article));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id, Article $article)
    {
        $article=Article::find($id);
        $this->authorize($article);
        $article->delete();
        return redirect(route('todos.index'));

    }
}
