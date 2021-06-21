<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Donatur;
use DB;

class DonaturController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $donatur = DB::table('donaturs')->get();

        return view('admin/donatur/index', ['donatur'=> $donatur]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/donatur/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $file = $request->file('avatar');
        
        // Mendapatkan Nama File
        $nama_file = $file->getClientOriginalName();
       
          // Proses Upload File
          $destinationPath = 'avatar';
          $file->move($destinationPath,$file->getClientOriginalName());

        $data = $request->all();

        $data['avatar'] = $nama_file;

        Donatur::create($data);

        return view('admin/donatur/index');

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
    public function edit(Donatur $donatur)
    {
        return view('admin/donatur/update', compact('donatur'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Donatur $donatur)
    {
        $donatur->name = $request->name;
        $donatur->email = $request->email;
        if ($request->file('avatar')) {
            $file = $request->file('avatar');
        // Mendapatkan Nama File
        $nama_file = $file->getClientOriginalName();
       
          // Proses Upload File
          $destinationPath = 'avatar';
          $file->move($destinationPath,$file->getClientOriginalName());
          $donatur->avatar = $nama_file;
        }
        $donatur->save();
        return redirect('/admin/donatur');
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
