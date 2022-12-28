<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Proposal;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Storage;

class ProposalController extends Controller
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
        $data = Proposal::all();
        return DataTables::of($data)->toJson();
    }

    public function index()
    {
        return view('admin.kegiatan.proposal.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.kegiatan.proposal.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $fileName = 'public/uploads/proposal/pdf-' . time() . '.' . request()->file->getClientOriginalExtension();
        $fileName_save = 'storage/uploads/proposal/pdf-' . time() . '.' . request()->file->getClientOriginalExtension(); //simpan ke db
        request()->file->move(storage_path('app/public/uploads/proposal/'), $fileName);
        $store = new Proposal();
        $store->nama_kegiatan = $request->nama_kegiatan;
        $store->tema_kegiatan = $request->tema_kegiatan;
        $store->waktu_pelaksanaan = $request->waktu_pelaksanaan;
        $store->tempat_pelaksanaan = $request->tempat_pelaksanaan;
        $store->file = $fileName_save;
        $store->save();

        return redirect()->route('proposal');
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
        $data = Proposal::find($id);
        return view('admin.kegiatan.proposal.edit', $data);
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
        $data = Proposal::find($id);

        if (isset($request->file)) {
            $fileName = 'public/uploads/proposal/pdf-' . time() . '.' . request()->file->getClientOriginalExtension();
            $fileName_save = 'storage/uploads/proposal/pdf-' . time() . '.' . request()->file->getClientOriginalExtension(); //simpan ke db
            request()->file->move(storage_path('app/public/uploads/proposal/'), $fileName);

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
        return redirect()->route('proposal');
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
