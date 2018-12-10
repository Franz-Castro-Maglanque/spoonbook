<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Post;
use App\Photo;
use App\User;

class PostsController extends Controller
{

      /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth',['except' => ['index', 'show','get_data']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        //
        $posts = Post::all();
        $category = Post::distinct()->get(['category']);
        $company = User::distinct()->get(['company']);
        // return view('post/testing')->with('posts',$test);
        return view('post/index')->with('posts',$posts)->with('categories',$category)->with('companies',$company);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('post/create');
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
            'title' => 'required',
            'description' => 'required',
            'price' => 'required',
            'category' => 'required',
            'inclusion' => 'required',
            'cover_image' => 'image|nullable|max:1999',
            
        ]);


            // Handle File Upload for cover_image
            if($request->hasFile('cover_image')){
                // get filename with extension
                 $filenameWithExt = $request->file('cover_image')->getClientOriginalName();
                //Just Get the filename
                 $filename = pathInfo($filenameWithExt,PATHINFO_FILENAME);
                //Just Get the extension
                 $extension = $request->file('cover_image')->getClientOriginalExtension();
                //Filename to store
                 $fileNameToStore = $filename . '_' . time() . '.' . $extension;
                //Upload the file
                $path = $request->file('cover_image')->storeAs('public/cover_images',$fileNameToStore);
            }else{
                $fileNameToStore = 'noimage.jpg';
            }

            $post = new Post;
            $post->title = $request->input('title');
            $post->description = $request->input('description');
            $post->price = $request->input('price');
            $post->category = $request->input('category');
            $post->user_id = auth()->user()->id;
            $post->cover_image = $fileNameToStore;
            $post->inclusions = $request->input('inclusion');
            $post->save();

              // Handle File Upload for Photo Gallery Images
              if($request->hasFile('image_gallery')){
                foreach($request->file('image_gallery') as $file){
                    $filenameWithExt = $file->getClientOriginalName();
                    $filename = pathInfo($filenameWithExt,PATHINFO_FILENAME);
                    $extension = $file->getClientOriginalExtension();
                    $fileNameToStore = $filename . '_' . time()  . '.' . $extension;
                    $path = $file->storeAs('public/photo_gallery',$fileNameToStore);
                    $filemodel = new Photo;
                    $filemodel->name = $fileNameToStore;
                    $filemodel->post_id = $post->id;
                    $filemodel->save();
                }
            } //End of image_gallery 

            return redirect('posts')->with('success', 'Post Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        return view('post.show')->with('post', $post);
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
        if(auth()->user()->id !== $post->user_id){
           return redirect('/posts')->with('error','Unauthorized page');
        }
        return view('post/edit')->with('posts',$post);
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

         //Handle File Upload
         if($request->hasFile('cover_image')){
            // get filename with extension
             $filenameWithExt = $request->file('cover_image')->getClientOriginalName();
            //Just Get the filename
             $filename = pathInfo($filenameWithExt,PATHINFO_FILENAME);
            //Just Get the extension
             $extension = $request->file('cover_image')->getClientOriginalExtension();
            //Filename to store
             $fileNameToStore = $filename . '_' . time() . '.' . $extension;

            //Upload the file
            $path = $request->file('cover_image')->storeAs('public/cover_images',$fileNameToStore);
        }

        $post = Post::find($id);
        $post->title = $request->input('title');
        $post->description = $request->input('description');
        $post->price = $request->input('price');
        $post->category = $request->input('category');
        if($request->hasFile('cover_image')){
            $post->cover_image = $fileNameToStore;
        }
        $post->save();
        return redirect('/posts')->with('success','Post Updated');
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
        if($post->cover_image != 'noimage.jpg'){
            //Delete Image
            Storage::delete('public/cover_images/' . $post->cover_image);
        }
        foreach($post->photos as $photo){
            Storage::delete('public/photo_gallery' . $photo->name);
            $photo->delete();
        }
        if(auth()->user()->id !== $post->user_id){
            return redirect('/posts')->with('error','Unauthorized page');
         }
        $post->delete();
        return redirect('posts')->with('success', 'Post Removed');
    }

    public function test(){
        $post = Post::find(18);
        return view('post/testing')->with('posts',$post);
    }


    public function get_data(Request $request){
        $query = [];
        if(isset($request->company)){
            $query = ['company' => $request->company,];
        }
        if(isset($request->category)){
            $query['category'] = $request->category;    
        }
        
        $post = Post::where($query)->get();
        $count = $post->count();
        return view('post/data')->with('posts',$post)->with('count',$count);
    }
}
