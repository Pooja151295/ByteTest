<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
	public function index(Request $request)
	{
		if(request()->ajax()) {
			return datatables()->of(Post::select('*'))
			->addColumn('action', function($row){
				$edit_btn = '<a class="btn btn-primary" href="post/'.$row->id.'/edit">Edit</a>';
				$delete_btn = '<a class="btn btn-primary" href="delete/'.$row->id.'">Delete</a>';
				return $edit_btn." ".$delete_btn;
			})
			->rawColumns(['action'])
			->addIndexColumn()
			->make(true);
		}
		return view('post.post');
	}
	public function create()
	{
		return view('post.create');
	}
	public function store(Request $request)
	{
		$request->validate([
			'post_name' => 'required',
		]);
		Post::create($request->post());

		return redirect()->route('post.index')->with('success','Your post has been created successfully.');
	}
	public function edit(Post $post)
	{
		return view('post.edit',compact('post'));
	}
	public function update(Request $request, Post $post)
	{
		$request->validate([
			'post_name' => 'required',
		]);
		$post->fill($request->post())->save();

		return redirect()->route('post.index')->with('success','Your post has been updated successfully');
	}
	public function destroy(Request $request,Post $post)
	{
		$id = $request->route('id');
		$post::where('id', $id)->delete();
		return redirect()->route('post.index')
						->with('success','Your post has been deleted successfully');
	}
}
