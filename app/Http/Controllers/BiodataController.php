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
        $biodatas = Biodata::latest()->paginate(5);
        return view('biodata.index', compact('biodatas'))
                ->with('i' , (request()->input('page',1) -1)*5);
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
    public function show(biodata $biodata)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\biodata  $biodata
     * @return \Illuminate\Http\Response
     */
    public function edit(biodata $biodata)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\biodata  $biodata
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, biodata $biodata)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\biodata  $biodata
     * @return \Illuminate\Http\Response
     */
    public function destroy(biodata $biodata)
    {
        //
    }
}
