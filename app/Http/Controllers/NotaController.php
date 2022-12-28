<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Nota;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Storage;

class NotaController extends Controller
{
    public function __construct()
    {   
        $this->middleware('auth');
    }
    
    public function data(){
        $data = Nota::all();
        return DataTables::of($data)->toJson();
    }
    
    public function index()
    {
        return view('admin.keuangan.nota.index');
        
    }

    /** 
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.keuangan.nota.form');
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
        $fileName = 'public/uploads/nota/img-' . time() . '.' . request()->file->getClientOriginalExtension(); 
        $fileName_save = 'storage/uploads/nota/img-' . time() . '.' . request()->file->getClientOriginalExtension(); //simpan ke db
        request()->file->move(storage_path('app/public/uploads/nota/'), $fileName);
        $store = new Nota();
        $store->deskripsi = $request->deskripsi;
        $store->waktu = $request->waktu;
        $store->total = $request->total;
        $store->file = $fileName_save;
        $store->save();

        return redirect()->route('nota');

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
        $data = Nota::find($id);
        return view('admin.keuangan.nota.edit', $data);
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

        $data = Nota::find($id);

        if (isset($request->file)){
            $fileName = 'public/uploads/nota/img-' . time() . '.' . request()->file->getClientOriginalExtension(); 
            $fileName_save = 'storage/uploads/nota/img-' . time() . '.' . request()->file->getClientOriginalExtension(); //simpan ke db
            request()->file->move(storage_path('app/public/uploads/nota/'), $fileName);

            $data->update([
                'deskripsi' => $request->deskripsi,
                'waktu' => $request->waktu,
                'total' => $request->total,
                'file' => $fileName_save,
            ]);
        } else {
            $data->update([
                'deskripsi' => $request->deskripsi,
                'waktu' => $request->waktu,
                'total' => $request->total,
            ]);
        }
        return redirect()->route('nota');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Nota::find($id);
        $pisah = explode('/', $data->file);
        Storage::delete('app/public/uploads/nota',$pisah[3]);
        $data->delete();
        return redirect()->route('nota');
    }
}
