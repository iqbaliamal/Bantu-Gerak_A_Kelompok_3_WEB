<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Publication;

class PublicationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $publications = Publication::all();

        return view('admin.pages.publication.index', compact('publications'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = Publication::all();

        return view('admin.pages.publication.create', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(
            $request,
            [
                'title'     => 'required',
                'image'     => 'required|image|mimes:jpeg,jpg,png|max:2000',
                'content'   => 'required',
            ],
            [
                'title.required' => 'Title wajib diisi',
                'image.required' => 'Image wajib diisi',
                'content.required' => 'Image wajib diisi',
            ]
        );

        //upload image
        $image = $request->file('image');
        $image->storeAs('public/publications', $image->hashName());

        //save to DB
        $publication = Publication::create([
            'title'     => $request->title,
            'image'     => $image->hashName(),
            'slug'      => Str::slug($request->title, '-'),
            'user_id'   => auth()->user()->id,
            'content'   => $request->content,
        ]);

        if ($publication) {
            //redirect dengan pesan sukses
            return redirect()->route('admin.publication.index')->with(['success' => 'Data Berhasil Disimpan!']);
        } else {
            //redirect dengan pesan error
            return redirect()->route('admin.publication.index')->with(['error' => 'Data Gagal Disimpan!']);
        }
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Publication $publication)
    {
        return view('admin.pages.publication.edit', compact('publication'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Publication $publication)
    {
        $this->validate($request, [
            'title'     => 'required',
            'content'   => 'required'
        ]);

        //check jika image kosong
        if ($request->file('image') == '') {

            //update data tanpa image
            $publication = Publication::findOrFail($publication->id);
            $publication->update([
                'title'     => $request->title,
                'content'   => $request->content,
            ]);
        } else {
            //hapus image lama
            Publication::disk('local')->delete('public/publication/' . basename($publication->image));

            //upload image baru
            $image = $request->file('image');
            $image->storeAs('public/publication', $image->hashName());

            //update dengan image baru
            $publication = Publication::findOrFail($publication->id);
            $publication->update([
                'title'         => $request->title,
                'image'         => $image->hashName(),
                'content'   => $request->content,
            ]);
        }

        if ($publication) {
            //redirect dengan pesan sukses
            return redirect()->route('admin.publication.index')->with(['success' => 'Data Berhasil Diupdate!']);
        } else {
            //redirect dengan pesan error
            return redirect()->route('admin.publication.index')->with(['error' => 'Data Gagal Diupdate!']);
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
        $publication = Publication::findOrFail($id);
        Storage::disk('local')->delete('public/publication/' . basename($publication->image));
        $publication->delete();

        if ($publication) {
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
