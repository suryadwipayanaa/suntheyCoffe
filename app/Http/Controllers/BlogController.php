<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.dashboard.blog.blog',[
            'title' => 'Blog',
            'blogs' => Blog::latest()->paginate(7)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.dashboard.blog.addBlog',[
            'title' => 'Add Blog',
            'category' => Category::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'title' => 'required',
            'image' => 'required|max:1500',
            'category_id' => 'required',
            'desFull' => 'required',
            'slug' => 'required|unique:blogs',
        ]);

        $validateData['image'] = $request->file('image')->store('blog');
        $validateData['desSingkat'] = Str::limit(strip_tags($request->desFull),200);

        Blog::create($validateData);
        return redirect('/dashboard/blog')->with('success','Insert Successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show(Blog $blog)
    {
        return view('admin.dashboard.blog.detailBlog',[
            'title' => 'Detail Blog',
            'blog' => $blog
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit(Blog $blog)
    {
       return view('admin.dashboard.blog.editBlog',[
        'title' => 'Edit Blog',
        'blog' => $blog,
        'category' => Category::all()
       ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Blog $blog)
    {
        $rule = [
            'title' => 'required',
            'image' => 'max:1500',
            'category_id' => 'required',
            'desFull' => 'required',
        ];

        if($request->slug != $blog->slug){
            $rule['slug'] = 'required|unique:blogs';
        }

        $validateData = $request->validate($rule);

        if($request->file('image')){
            if($request->oldImage){
                Storage::delete($request->oldImage);
            }
            $validateData['image'] = $request->file('image')->store('blog');
        }

        $validateData['desFull'] = strip_tags($request->desFull);
        $validateData['desSingkat'] = Str::limit(strip_tags($request->desFull),200);

        Blog::where('id', $blog->id)->update($validateData);
        return redirect('/dashboard/blog')->with('successUpdate','Update succesfully!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blog $blog)
    {
        if($blog->image){
            Storage::delete($blog->image);
        }

        Blog::destroy($blog->id);
        return redirect('/dashboard/blog')->with('successDelete', 'Delete Successfully!');
    }
}
