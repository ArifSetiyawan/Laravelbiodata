<?php

namespace App\Http\Controllers;

use App\Biodata;
use Illuminate\Http\Request;

class BiodataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $biodatas = Biodata::latest()->paginate(10);
        return view('biodata.index', compact('biodatas'))
                ->with('i' , (request()->input('page',1) -1)*10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('biodata.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_siswa' => 'required',
            'alamat_siswa' => 'required'
        ]);
        
        Biodata::create($request->all());
        return redirect()->route('biodata.index')
                ->with('Success' , 'Biodata Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\biodata  $biodata
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $biodata = Biodata::find($id);
        return view('biodata.detail', compact('biodata'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\biodata  $biodata
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $biodata = Biodata::find($id);
        return view('biodata.edit', compact('biodata'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\biodata  $biodata
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_siswa' => 'required',
            'alamat_siswa' => 'required'
        ]);
        
        $biodata = Biodata::find($id);
        $biodata->nama_siswa = $request->get('nama_siswa');
        $biodata->alamat_siswa = $request->get('alamat_siswa');
        $biodata->save();
        return redirect()->route('biodata.index')
                ->with('Success' , 'Biodata Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\biodata  $biodata
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $biodata = Biodata::find($id);
        $biodata->delete();
        return redirect()->route('biodata.index')
                ->with('Success' , 'Biodata Deleted Successfully');
    }
}
