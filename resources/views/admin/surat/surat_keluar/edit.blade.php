@extends('admin.master')
@section('content')
<div class="container">
    <div id="flHorizontalForm" class="col-lg-12 layout-spacing">
        <div class="statbox widget box box-shadow">
            <div class="widget-header">
                <div class="row">
                    <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                        <h4>Edit Surat Keluar</h4>
                    </div>
                </div>
            </div>
            <div class="widget-content widget-content-area">
                <form action="{{route('surat.surat_keluar.update',$id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                    <div class="form-group row mb-4">
                        <label class="col-xl-2 col-sm-3 col-sm-2 col-form-label">Tanggal</label>
                        <div class="col-xl-10 col-lg-9 col-sm-10">
                            <input type="date" class="form-control" value="{{$tanggal}}" name="tanggal" placeholder="">
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label for="" class="col-xl-2 col-sm-3 col-sm-2 col-form-label">Nomor Surat</label>
                        <div class="col-xl-10 col-lg-9 col-sm-10">
                            <input type="text" class="form-control" value="{{$nomor_surat}}" name="nomor_surat" placeholder="">
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label for="" class="col-xl-2 col-sm-3 col-sm-2 col-form-label">Perihal</label>
                        <div class="col-xl-10 col-lg-9 col-sm-10">
                            <input type="text" class="form-control" value="{{$perihal}}" name="perihal" placeholder="">
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label for="hPassword" class="col-xl-2 col-sm-3 col-sm-2 col-form-label">Untuk</label>
                        <div class="col-xl-10 col-lg-9 col-sm-10">
                            <input type="text" class="form-control" value="{{$dari}}" name="dari" placeholder="">
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label for="hPassword" class="col-xl-2 col-sm-3 col-sm-2 col-form-label">Tanggal Diterima</label>
                        <div class="col-xl-10 col-lg-9 col-sm-10">
                            <input type="date" class="form-control" value="{{$tanggal_diterima}}" name="tanggal_diterima" placeholder="">
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label for="hPassword" class="col-xl-2 col-sm-3 col-sm-2 col-form-label">File Surat</label>
                        <div class="col-xl-10 col-lg-9 col-sm-10">
                            <input type="file" class="form-control" name="file" placeholder="">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary mt-3">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection