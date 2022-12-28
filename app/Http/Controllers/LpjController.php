<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lpj;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Storage;

class LpjController extends Controller
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
        $data = Lpj::all();
        return DataTables::of($data)->toJson();
    }

    public function index()
    {
        return view('admin.kegiatan.lpj.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.kegiatan.lpj.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $fileName = 'public/uploads/lpj/pdf-' . time() . '.' . request()->file->getClientOriginalExtension();
        $fileName_save = 'storage/uploads/lpj/pdf-' . time() . '.' . request()->file->getClientOriginalExtension(); //simpan ke db
        request()->file->move(storage_path('app/public/uploads/lpj/'), $fileName);
        $store = new Lpj();
        $store->nama_kegiatan = $request->nama_kegiatan;
        $store->tema_kegiatan = $request->tema_kegiatan;
        $store->waktu_pelaksanaan = $request->waktu_pelaksanaan;
        $store->tempat_pelaksanaan = $request->tempat_pelaksanaan;
        $store->file = $fileName_save;
        $store->save();

        return redirect()->route('lpj');
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
        $data = Lpj::find($id);
        return view('admin.kegiatan.lpj.edit', $data);
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
        $data = Lpj::find($id);

        if (isset($request->file)) {
            $fileName = 'public/uploads/lpj/pdf-' . time() . '.' . request()->file->getClientOriginalExtension();
            $fileName_save = 'storage/uploads/lpj/pdf-' . time() . '.' . request()->file->getClientOriginalExtension(); //simpan ke db
            request()->file->move(storage_path('app/public/uploads/lpj/'), $fileName);

            $data->update([
                'nama_kegiatan' => $request->nama_kegiatan,
                'tema_kegiatan' => $request->tema_kegiatan,
                'waktu_pelaksanaan' => $request->waktu_pelaksanaan,
                'tempat_pelaksanaan' => $request->tempat_pelaksanaan,
                'file' => $fileName_save,
            ]);
        } else {
            $data->update([
                'nama_kegiatan' => $request->nama_kegiatan,
                'tema_kegiatan' => $request->tema_kegiatan,
                'waktu_pelaksanaan' => $request->waktu_pelaksanaan,
                'tempat_pelaksanaan' => $request->tempat_pelaksanaan,
            ]);
        }
        return redirect()->route('lpj');
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
