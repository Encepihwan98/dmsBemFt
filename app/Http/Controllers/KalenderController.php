<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Storage;
use App\Models\Kegiatan;

class KalenderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {   
        $this->middleware('auth');
    }
    
    public function data()
    {
        $data = Kegiatan::all();
        return DataTables::of($data)->toJson();
    }

    public function index()
    {
        return view('admin.kegiatan.kegiatan.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.kegiatan.kegiatan.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $fileName = 'public/uploads/kegiatan/pdf-' . time() . '.' . request()->file->getClientOriginalExtension();
        $fileName_save = 'storage/uploads/kegiatan/pdf-' . time() . '.' . request()->file->getClientOriginalExtension(); //simpan ke db
        request()->file->move(storage_path('app/public/uploads/kegiatan/'), $fileName);
        $store = new Kegiatan();
        $store->nama_kabinet = $request->nama_kabinet;
        $store->periode = $request->periode;
        $store->file = $fileName_save;
        $store->save();

        return redirect()->route('kegiatan');
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
    public function edit($id)
    {
        $data = Kegiatan::find($id);
        return view('admin.kegiatan.kegiatan.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = Kegiatan::find($id);

        if (isset($request->file)) {
            $fileName = 'public/uploads/kegiatan/pdf-' . time() . '.' . request()->file->getClientOriginalExtension();
            $fileName_save = 'storage/uploads/kegiatan/pdf-' . time() . '.' . request()->file->getClientOriginalExtension(); //simpan ke db
            request()->file->move(storage_path('app/public/uploads/kegiatan/'), $fileName);

            $data->update([
                'nama_kabinet' => $request->nama_kabinet,
                'periode' => $request->periode,
                'file' => $fileName_save,
            ]);
        } else {
            $data->update([
                'nama_kabinet' => $request->nama_kabinet,
                'periode' => $request->periode,
            ]);
        }
        return redirect()->route('kegiatan');
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
