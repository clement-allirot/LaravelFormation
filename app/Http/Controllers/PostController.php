<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Models\Comment;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use App\Models\Video;
use App\Rules\Uppercase;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function index()
    {
        if (!Auth::user()) {
            return redirect()->route('login');
        }
        return view('dashboard');
    }

    public function showAll()
    {
        $posts = Post::orderByDesc(
            'created_at'
        )
            ->take('*')
            ->get();

        // Post::where('title', 'test')
        //     ->delete();

        //Post::all()
        // return view('articles', compact('posts'));

        return view('articles', [
            'posts' => $posts
        ]);
    }

    public function show($id)
    {
        $post = Post::findOrFail($id);
        $countPosts = count(Post::all());

       // Post::find(108)->tags()->toggle(9);

        $video = Video::find(1);

        // $post = Post::where(
        //     'id',
        //     $id
        // )->firstOrFail();


        return view('article', [
            'post' => $post,
            'video' => $video,
            'countPosts' => $countPosts
        ]);
    }

    public function create()
    {
        return view('form');
    }

    public function store(Request $request)
    {
        //$userCo = Auth::user();
        if (!Gate::allows('access-admin')) {
            abort(403);
        }

        $request->validate([
            'title' => [
                'required',
                'max:255',
                'min:5',
                'unique:posts',
                new Uppercase
            ],
            'content' => ['required']
        ]);

        $filename = time() . '.' . $request->avatar->extension();

        $path = $request->avatar->storeAs(
            'photos',
            $filename,
            'public'
        );

        $newPost = Post::create([
            'title' => $request->title,
            'content' => $request->content
        ]);

        $image = new Image();
        $image->path = $path;
        //$image->post_id = $newPost->id;    
        $newPost->image()->save($image);

        return redirect()->route('show', $newPost->id);

        //dd($request->file('avatar'));
        /*$request->avatar->store('photos');
        $title = $request->title;
        $content = $request->content;*/
        // $post = new Post();
        // $post->title = $title;
        // $post->content = $content;
        // $post->save();

        //$name = Storage::disk('local')->put('photos', $request->avatar);
        //return Storage::download($name);
    }

    public function contact()
    {
        return view('contact');
    }

    public function bootstrap()
    {
        return view('bootstrap');
    }

    public function register()
    {

        $post =  Post::find(38);

        $video = Video::find(1);

        $comment1 = new Comment(['body' => 'mon premier com']);
        $comment2 = new Comment(['body' => 'mon dexuieme com']);
        $post->comments()->saveMany([
            $comment1,
            $comment2
        ]);

        $comment3 = new Comment(['body' => 'mon troisieme com']);
        $video->comments()->save($comment3);
    }
}
