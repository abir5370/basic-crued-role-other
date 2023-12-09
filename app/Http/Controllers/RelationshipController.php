<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Phone;
use App\Models\Post;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class RelationshipController extends Controller
{
    public function oneToOne(){
        return view('relation.one_to_one',[
            'users'=>User::all(),
            'phones'=>Phone::all()
        ]);
    }
    public function oneToCreate(Request $request){
       Phone::create([
        'user_id'=>$request->user_id,
        'name'=>$request->name,
       ]);
       return back();
    }

    //one to many
    public function oneToMany(){
        return view('relation.one_to_many',[
            'posts'=>Post::all(),
            'comments'=>Comment::all(),
        ]);
    }
    public function oneToManyPostCreate(Request $request){
        Post::create([
            'post_title'=>$request->title
        ]);
        return back();
    }
    public function oneToManyCommentCreate(Request $request){
        Comment::create([
            'post_id'=>$request->post_id,
            'comment'=>$request->comment
        ]);
        return back();
    }

     //many to many
     public function manyToMany(){
        return view('relation.many_to_many',[
            'categories'=>Category::all(),
            'Products'=>Product::all()
        ]);
     }

     public function manyToManyCategoryCreate(Request $request){
        Category::create([
            'name'=>$request->name,
        ]);
        return back();
    }
    public function manyToManyProductCreate(Request $request){
        $product = Product::create([
            'name'=>$request->name,
        ]);
        $categoryIds = Category::find($request->category_id);
        $product->categories()->attach($categoryIds); 
        return back();
    }

}
