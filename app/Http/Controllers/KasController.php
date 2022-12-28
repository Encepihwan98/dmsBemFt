<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kas;
use App\Models\User;
use Yajra\DataTables\Facades\DataTables;

class KasController extends Controller
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
        $data = Kas::join('users','kas.id_user','=','users.id')->get();
        return DataTables::of($data)->toJson();
    }
    public function index()
    {
        return view('admin.keuangan.kas.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = User::get();
        return view('admin.keuangan.kas.form', ['data'=>$data]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $data =  Kas::create([
            'id_user' => $request->id_user,
            'waktu' => $request->waktu,
            'jumlah' => $request->jumlah,
        ]);
        
        
        return redirect()->route('kas');
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
        $data = Kas::find($id);
        $data['user'] = User::all();
        // dd($data);
        return view('admin.keuangan.kas.edit', $data);
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

        Kas::find($id)->update([
            'id_user' => $request->id_user,
            'waktu' => $request->waktu,
            'jumlah' => $request->jumlah,
        ]);

        return redirect()->route('user');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Kas::find($id)->delete();
        return redirect()->route('user');
    }
}
