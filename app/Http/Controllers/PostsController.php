<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\carImage;
use Illuminate\Support\Facades\Storage;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Browse Our Cars';
        if(isset($_POST['sortBy'])){
            $sort = $_POST['sortBy'];
            if($sort == 'newest'){
                $posts = Post::orderBy('created_at','desc')->paginate(6);
            }elseif($sort == 'popularity'){
                $posts = Post::orderBy('views','desc')->paginate(6);
            }else{
                $posts = Post::orderBy('price','asc')->paginate(6);
            }}else{
        $posts = Post::orderBy('created_at','desc')->paginate(6);
        }
        return view('posts.index')->with(array('title'=>$title,'posts'=>$posts));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Create a Listing';
        return view('posts.create')->with('title', $title);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

     public function __construct()
     {
         $this->middleware('auth');
     }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'year' => 'required',
            'make' => 'required',
            'model' => 'required',
            'extColor' => 'required',
            'intColor' => 'required',
            'mileage' => 'required',
            'bodyStyle' => 'required',
            'driveType' => 'required',
            'engine' => 'required',
            'fuelType' => 'required',
            'vin' => 'required',
            'transmission' => 'required',
            'features' => 'nullable',
        ]);

        //Create post
        $post = new Post;
        $post->user_id = auth()->user()->id;
        $post->title = $request->input('title');
        $post->price = $request->input('price');
        $post->intColor = $request->input('intColor');
        $post->extColor = $request->input('extColor');
        $post->model = $request->input('model');
        $post->make = $request->input('make');
        $post->year = $request->input('year');
        $post->mileage = $request->input('mileage');
        $post->bodyStyle = $request->input('bodyStyle');
        $post->driveType = $request->input('driveType');
        $post->engine = $request->input('engine');
        $post->fuelType = $request->input('fuelType');
        $post->vin = $request->input('vin');
        $post->transmission = $request->input('transmission');
        $post->features = $request->input('features');
        $post->views = 0;

        $post->save();

        //Handle Images
        $imgArray = $request->file('files');
        if(null !== $imgArray){
            foreach($imgArray as $file) {
                $filename = $file->getClientOriginalName();
                $noext = pathinfo($filename, PATHINFO_FILENAME);
                $ext = $file->getClientOriginalExtension();
                $imagetostore = $noext.'_'.time().'.'.$ext;
                $path = $file->storeAs('public/images/', $imagetostore);
                $image = new carImage;
                $image->postId = $post->id;
                $image->link = $imagetostore;
                $image->orderNum = 0;
                $image->save();
            }
        }

        return redirect('/browse')->with('success', "Listing Created Successfully");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($vin)
    {
        $post = Post::where('vin', $vin)->first();
        $title = $post['title'];
        return view('posts.show')->with(array('post'=>$post,'title'=>$title));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        $title = $post['title'];
        return view('posts.edit')->with(array('post'=>$post,'title'=>$title));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required',
            'year' => 'required',
            'make' => 'required',
            'model' => 'required',
            'extColor' => 'required',
            'intColor' => 'required',
            'mileage' => 'required',
            'bodyStyle' => 'required',
            'driveType' => 'required',
            'engine' => 'required',
            'fuelType' => 'required',
            'vin' => 'required',
            'transmission' => 'required',
            'features' => 'required',

        ]);

        //Create post
        $post = Post::find($id);
        $post->user_id = auth()->user()->id;
        $post->title = $request->input('title');
        $post->price = $request->input('price');
        $post->intColor = $request->input('intColor');
        $post->extColor = $request->input('extColor');
        $post->model = $request->input('model');
        $post->make = $request->input('make');
        $post->year = $request->input('year');
        $post->mileage = $request->input('mileage');
        $post->bodyStyle = $request->input('bodyStyle');
        $post->driveType = $request->input('driveType');
        $post->engine = $request->input('engine');
        $post->fuelType = $request->input('fuelType');
        $post->vin = $request->input('vin');
        $post->transmission = $request->input('transmission');
        $post->features = $request->input('features');

        $post->save();

        return redirect('/browse')->with('success', 'Listing Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        $images = carImage::where('postID',$id)->get();
        $post->delete();
        foreach($images as $image){
            echo $image->id;
            echo $image->link;
            $link = '/public/images/'.$image->link;
            Storage::delete($link);
            $image->delete();
        }
        return redirect('/browse')->with('success', 'Listing Deleted!');
    }

    public function sell($id)
    {
        $post = Post::find($id);
        if($post->sold !== 1){
            $post->sold = 1;
        }else{
            $post->sold = 0;
        }
        $post->save();
        
        
        return redirect('/browse')->with('success', 'Listing Updated!');
    }
}
