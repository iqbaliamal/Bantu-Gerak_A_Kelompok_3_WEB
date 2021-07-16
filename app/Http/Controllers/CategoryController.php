<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Category::All();

        return view('admin.pages.category.index', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'image'         => 'required|image|mimes:jpeg,jpg,png|max:2000',
            'name'          => 'required|unique:categories',
            'description'   => 'required',
        ]);

        //upload image
        $image = $request->file('image');
        $image->storeAs('public/categories', $image->hashName());

        //save to DB
        $category = Category::create([
            'name'   => $request->name,
            'slug'   => Str::slug($request->name, '-'),
            'image'  => $image->hashName(),
            'description'  => $request->description,
        ]);

        if ($category) {
            //redirect dengan pesan sukses
            return redirect()->route('admin.category.index')->with(['success' => 'Data Berhasil Disimpan!']);
        } else {
            //redirect dengan pesan error
            return redirect()->route('admin.category.index')->with(['error' => 'Data Gagal Disimpan!']);
        }
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
        return view('admin.pages.category.edit', compact('category'));
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
        $this->validate($request, 
        [
            'name'          => 'required|unique:categories,name,' . $category->id,
            'description'   => 'required'
        ],
        [
            'name.required'=>'nama wajib diisi',
            'nama.unique'=>'gunakan penamaan yang unik',
            'description.required'=>'deskripsi wajib diisi',
        ]
    );

        //check jika image kosong
        if ($request->file('image') == '') {

            //update data tanpa image
            $category = Category::findOrFail($category->id);
            $category->update([
                'name'          => $request->name,
                'slug'          => Str::slug($request->name, '-'),
                'description'   => $request->description,
            ]);
        } else {
            //hapus image lama
            Storage::disk('local')->delete('public/categories/' . basename($category->image));

            //upload image baru
            $image = $request->file('image');
            $image->storeAs('public/categories', $image->hashName());

            //update dengan image baru
            $category = Category::findOrFail($category->id);
            $category->update([
                'name'          => $request->name,
                'slug'          => Str::slug($request->name, '-'),
                'image'         => $image->hashName(),
                'description'   => $request->description,
            ]);
        }

        if ($category) {
            //redirect dengan pesan sukses
            return redirect()->route('admin.category.index')->with(['success' => 'Data Berhasil Diupdate!']);
        } else {
            //redirect dengan pesan error
            return redirect()->route('admin.category.index')->with(['error' => 'Data Gagal Diupdate!']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        Storage::disk('local')->delete('public/categories/' . basename($category->image));
        $category->delete();

        if ($category) {
            return response()->json([
                'status' => 'success'
            ]);
        } else {
            return response()->json([
                'status' => 'error'
            ]);
        }
    }
}
