<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use DB;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = DB::table('categories')->get();

        return view('admin/category/index', ['category'=> $category]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/category/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $file = $request->file('image');
        
        // Mendapatkan Nama File
        $nama_file = $file->getClientOriginalName();
       
          // Proses Upload File
          $destinationPath = 'image';
          $file->move($destinationPath,$file->getClientOriginalName());

        $data = $request->all();

        $data['image'] = $nama_file;

        Donatur::create($data);

        return view('admin/category/index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('admin/category/update', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $category->name = $request->name;
        $category->slug = $request->slug;
        if ($request->file('image')) {
            $file = $request->file('image');
        // Mendapatkan Nama File
        $nama_file = $file->getClientOriginalName();
       
          // Proses Upload File
          $destinationPath = 'image';
          $file->move($destinationPath,$file->getClientOriginalName());
          $donatur->avatar = $nama_file;
        }
        $donatur->save();
        return redirect('/admin/category');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
