<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FaqController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Faq::All();

        return view('admin.pages.faq.index', compact('data'));
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
                'pertanyaan'         => 'required',
                'jawaban'          => 'required',

            ],
            [
                'pertanyaan.required'        => 'Kolom Pertanyaan wajib diisi',
                'jawaban.required'           => 'Kolom Jawaban wajib diisi',

            ]
        );

        //save to DB
        $faq = Faq::create([
            'pertanyaan'   => $request->pertanyaan,
            'jawaban'   => $request->jawaban,

        ]);
        if ($faq) {
            //redirect dengan pesan sukses
            return redirect()->route('admin.faq.index')->with(['success' => 'Data Berhasil Disimpan!']);
        } else {
            //redirect dengan pesan error
            return redirect()->route('admin.faq.index')->with(['error' => 'Data Gagal Disimpan!']);
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
    public function edit(Faq $faq)
    {
        return view('admin.pages.faq.edit', compact('faq'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Faq $faq)
    {
        $this->validate(
            $request,
            [
                'pertanyaan'          => 'required',
                'jawaban'   => 'required'
            ],
            [
                'pertanyaan.required'         => 'pertanyaan wajib diisi',
                'jawaban.unique'           => 'jawaban wajib diisi',
            ]
        );

        $faq = Faq::findOrFail($faq->id);
        $faq->update([
                'pertanyaan'          => $request->pertanyaan,
                'jawaban'          => $request->jawaban,

            ]);

            if ($faq) {
                //redirect dengan pesan sukses
                return redirect()->route('admin.faq.index')->with(['success' => 'Data Berhasil Diupdate!']);
            } else {
                //redirect dengan pesan error
                return redirect()->route('admin.faq.index')->with(['error' => 'Data Gagal Diupdate!']);
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
        $faq = Faq::findOrFail($id);
        Storage::disk('local')->delete('public/faq/' . basename($faq->image));
        $faq->delete();

        if ($faq) {
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
