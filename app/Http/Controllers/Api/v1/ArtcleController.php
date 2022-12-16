<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Resources\v1\ArticleCollection;
use App\Models\Article;
use Illuminate\Http\Request;
use App\Http\Resources\v1\Article as ArticleResource;
use Illuminate\Support\Facades\Validator;

class ArtcleController extends Controller
{
    public function index(){

        $articles = Article::paginate(10);
        //return response()->json($articles);

        return new ArticleCollection($articles);
    }

    public function show(Article $article){

        return new ArticleResource($article);
        return $article;
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
           'title' => 'required|max:255',
           'body' => 'required',
        ]);

        if ($validator->fails()){
            return response()->json($validator->errors());
        }

        return response()->json($request->all());
    }
}
