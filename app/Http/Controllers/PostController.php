<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{

    public function index()
    {
        $data['posts'] = Post::paginate(5);
        return view("post.index" , $data);
    }

    public function search(Request $request)
    {
        //$data = $request->all();
        $data = $request->input('search');
        $query = Post::select()
            //->join('categories as cat', 'posts.category_id', '=', 'cat.id')
            ->where('tittle','like',"%$data%")
            ->orWhere('summary','like',"%$data%")
            ->orWhere('description','like',"%$data%")
            ->orWhere('otra','like',"%$data%")
            ->get();

        return view("post.index")->with(["posts" => $query]);
    }


    public function create()
    {
        return view("post.create");
    }


    public function store(Request $request)
    {
        //$data = $request -> all();
        $data = $request -> except('_token');
        if ($request->hasFile('image')) {
            $data['image'] = $request -> file('image') -> store('uploads', 'public');
        }
        Post::insert($data);
        return redirect() -> route("post.index");
    }


    public function show(Post $post)
    {
        //
    }


    public function edit($id)
    {
        $data = Post::findOrFail($id);
        return view("post.edit")->with(["post" => $data]);
    }


    public function update(Request $request, $id)
    {
        //$data = $request -> all();
        $data = $request -> except('_token','_method');

        if ($request-> hasFile('image')) {
            $post = Post::findOrFile($id);
            Storage::delete(['public/$post->image']);
            $data['image'] = $request -> file('image') -> store('uploads', 'public');
        }

        Post::where('id','=','$id')-> update($data);
        return redirect() -> route("post.index");
    }


    public function destroy($id)
    {
        Post::destroy($id);
        return redirect() -> route("post.index");
    }
}
