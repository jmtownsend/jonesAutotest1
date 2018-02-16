<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\carImage;

class PagesController extends Controller
{
    public function index(){
        $title = 'Jones Auto Sales';
        $newPosts = Post::orderBy('created_at','desc')->paginate(3);
        $popularPosts = Post::orderBy('views','desc')->paginate(3);
        $carImages = carImage::all();
        return view('pages.index')->with(array('title'=>$title,'newPosts'=>$newPosts, 'popularPosts'=>$popularPosts,'carImages'=>$carImages));
    }

    public function about(){
        $title = 'About Us - Jones Auto Sales';
        return view('pages.about')->with('title', $title);
    }

    public function services(){
        $title = 'Services - Jones Auto Sales';
        return view('pages.services')->with('title', $title);
    }

    public function contact(){
        $title = 'Contact Us - Jones Auto Sales';
        return view('pages.contact')->with('title', $title);
    }

    public function browse()
    {
        $title = 'Browse Our Cars';
        $carImages = carImage::all();
        if(isset($_POST['sortBy'])){
            $sort = $_POST['sortBy'];
            if($sort == 'newest'){
                $posts = Post::orderBy('created_at','desc')->paginate(6);
            }elseif($sort == 'popular'){
                $posts = Post::orderBy('views','desc')->paginate(6);
            }else{
                $posts = Post::orderBy('price','asc')->paginate(6);
            }}else{
        $posts = Post::orderBy('created_at','desc')->paginate(6);
        }
        return view('posts.index')->with(array('title'=>$title,'posts'=>$posts,'carImages'=>$carImages));
    }

    public function browseShow($vin)
    {
        $post = Post::where('vin', $vin)->first();
        $id = $post['id'];
        $carImages = carImage::where('postID',$id)->get();
        $title = $post['title'];
        $view = $post['views']+1;
        $post->views = $view;
        $post->save();
        return view('posts.show')->with(array('post'=>$post,'title'=>$title,'carImages'=>$carImages));
    }

}