<?php

namespace prueba_laravel\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use prueba_laravel\Http\Requests;

use prueba_laravel\Article;
use prueba_laravel\Comment;

use Illuminate\Support\Facades\Redirect;

use Laracast\Flash\Flash;

use prueba_laravel\Http\Requests\CommentRequest;


class CommentsController extends Controller
{
    public function index(Request $request)
	{
	}

    public function create()
    {
        $articles=Article::orderBy('title','ASC')->lists('title','id');
        return view('admin.comments.create')->with('articles',$articles);
    }

    public function store(CommentRequest $request)
    {
        DB::beginTransaction();

        try 
        {
        $comment=new Comment();
        $comment->user_id=\Auth::user()->id;
        $comment->save();

        foreach($request->articles as $article_id)
        {
            $article=Article::find($article_id);
            $article->comments()->attach($comment->id,['comment' => $request->comment]);
        }

         DB::commit();

        flash('Gracias por comentar! Tu comentario se ha publicado con exito!', 'success');

        return redirect()->back();

        }
        catch(\Exception $e)
        {
            flash('El comentario NO se ha publicado!', 'warning');
            return redirect()->back();
            DB::rollback();
        }
    }

    public function edit($id)
    {
    }

    public function update(Request $request,$id)
    {
    }

    public function destroy($id)
    {
    }
}
