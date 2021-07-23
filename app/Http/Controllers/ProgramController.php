<?php

namespace App\Http\Controllers;

use App\Models\Program;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProgramController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $programs = Program::all();

        return view('admin.pages.program.index', compact('programs'));
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
                'title'             => 'required',
                'image'             => 'required|image|mimes:jpeg,jpg,png|max:2000',
                'description'       => 'required',
            ],
            [
                'title.required'        => 'Kolom Judul program wajib diisi',
                'image.required'        => 'Kolom Gambar wajib diisi',
                'image.image'           => 'Gambar harus diisi gambar',
                'image.mimes'           => 'Gambar harus berekstensi: jpeg, jpg, png',
                'image.max'             => 'Ukuran gambar maksimal 2000',
                'description.required'  => 'Kolom Deskripsi wajib diisi',
            ]
        );

        //upload image
        $image = $request->file('image');
        $image->storeAs('public/programs', $image->hashName());

        //save to DB
        $program = Program::create([
            'title'   => $request->title,
            'image'  => $image->hashName(),
            'description'  => $request->description,
        ]);

        if ($program) {
            //redirect dengan pesan sukses
            return redirect()->route('admin.program.index')->with(['success' => 'Data Berhasil Disimpan!']);
        } else {
            //redirect dengan pesan error
            return redirect()->route('admin.program.index')->with(['error' => 'Data Gagal Disimpan!']);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Program $program)
    {
        return view('admin.pages.program.edit', compact('program'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Program $program)
    {
        $this->validate(
            $request,
            [
                'title'         => 'required',
                'description'   => 'required'
            ],
            [
                'title.required' => 'Kolom Judul program wajib diisi',
                'description.required' => 'Kolom Deskripsi wajib diisi',
            ]
        );

        //check jika image kosong
        if ($request->file('image') == '') {

            //update data tanpa image
            $program = Program::findOrFail($program->id);
            $program->update([
                'title'          => $request->title,
                'description'   => $request->description,
            ]);
        } else {
            //hapus image lama
            Program::disk('local')->delete('public/programs/' . basename($program->image));

            //upload image baru
            $image = $request->file('image');
            $image->storeAs('public/programs', $image->hashName());

            //update dengan image baru
            $program = Program::findOrFail($program->id);
            $program->update([
                'title'         => $request->title,
                'image'         => $image->hashName(),
                'description'   => $request->description,
            ]);
        }

        if ($program) {
            //redirect dengan pesan sukses
            return redirect()->route('admin.program.index')->with(['success' => 'Data Berhasil Diupdate!']);
        } else {
            //redirect dengan pesan error
            return redirect()->route('admin.program.index')->with(['error' => 'Data Gagal Diupdate!']);
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
        $program = Program::findOrFail($id);
        Storage::disk('local')->delete('public/program/' . basename($program->image));
        $program->delete();

        if ($program) {
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
