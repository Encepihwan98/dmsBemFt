<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Surat;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Storage;

class SuratKeluarController extends Controller
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

    public function data(){
        $data = Surat::where('jenis_surat','surat keluar');
        return DataTables::of($data)->toJson();
    }
    
    public function index()
    {
        return view('admin.surat.surat_keluar.index');
        
    }

    /** 
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.surat.surat_keluar.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->tanggal);
        $fileName = 'public/uploads/surat/pdf-' . time() . '.' . request()->file->getClientOriginalExtension(); 
        $fileName_save = 'storage/uploads/surat/pdf-' . time() . '.' . request()->file->getClientOriginalExtension(); //simpan ke db
        request()->file->move(storage_path('app/public/uploads/surat/'), $fileName);
        $store = new Surat();
        $store->tanggal = $request->tanggal;
        $store->nomor_surat = $request->nomor_surat;
        $store->perihal = $request->perihal;
        $store->dari = $request->dari;
        $store->jenis_surat = "surat keluar";
        $store->tanggal_diterima = $request->tanggal_diterima;
        $store->file = $fileName_save;
        $store->save();

        return redirect()->route('surat.surat_keluar');

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
        $data = Surat::find($id);
        return view('admin.surat.surat_keluar.edit', $data);
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

        $data = Surat::find($id);

        if (isset($request->file)){
            $fileName = 'public/uploads/surat/img-' . time() . '.' . request()->file->getClientOriginalExtension(); 
            $fileName_save = 'storage/uploads/surat/pdf-' . time() . '.' . request()->file->getClientOriginalExtension(); //simpan ke db
            request()->file->move(storage_path('app/public/uploads/surat/'), $fileName);

            $data->update([
                'tanggal' => $request->tanggal,
                'nomor_surat' => $request->nomor_surat,
                'perihal' => $request->perihal,
                'dari' => $request->dari,
                'tanggal_diterima' => $request->tanggal_diterima,
                'file' => $fileName_save,
            ]);
        } else {
            $data->update([
                'tanggal' => $request->tanggal,
                'nomor_surat' => $request->nomor_surat,
                'perihal' => $request->perihal,
                'dari' => $request->dari,
                'tanggal_diterima' => $request->tanggal_diterima,
            ]);
        }
        return redirect()->route('surat.surat_keluar');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Surat::find($id);
        $pisah = explode('/', $data->file);
        Storage::delete('app/public/uploads/surat',$pisah[3]);
        $data->delete();
        return redirect()->route('surat.surat_keluar');
    }
}
