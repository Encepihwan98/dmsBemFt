@extends('admin.master')
@section('content')
<div class="container">
    <div id="flHorizontalForm" class="col-lg-12 layout-spacing">
        <div class="statbox widget box box-shadow">
            <div class="widget-header">
                <div class="row">
                    <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                        <h4>LPJ</h4>
                    </div>
                </div>
            </div>
            <div class="widget-content widget-content-area">
                <form action="{{route('lpj.update',$id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                    <div class="form-group row mb-4">
                        <label class="col-xl-2 col-sm-3 col-sm-2 col-form-label">Nama Kegiatan</label>
                        <div class="col-xl-10 col-lg-9 col-sm-10">
                            <input type="text" class="form-control" value="{{$nama_kegiatan}}" name="nama_kegiatan" placeholder="">
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label for="" class="col-xl-2 col-sm-3 col-sm-2 col-form-label">Tema Kegiatan</label>
                        <div class="col-xl-10 col-lg-9 col-sm-10">
                            <input type="text" class="form-control" value="{{$tema_kegiatan}}" name="tema_kegiatan" placeholder="">
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label for="" class="col-xl-2 col-sm-3 col-sm-2 col-form-label">Waktu Pelaksanaan</label>
                        <div class="col-xl-10 col-lg-9 col-sm-10">
                            <input type="date" class="form-control" value="{{$waktu_pelaksanaan}}" name="waktu_pelaksanaan" placeholder="">
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label for="hPassword" class="col-xl-2 col-sm-3 col-sm-2 col-form-label">Tempat Pelaksanaan</label>
                        <div class="col-xl-10 col-lg-9 col-sm-10">
                            <input type="text" class="form-control" value="{{$tempat_pelaksanaan}}" name="tempat_pelaksanaan" placeholder="">
                        </div>
                    </div>
                    
                    <div class="form-group row mb-4">
                        <label for="hPassword" class="col-xl-2 col-sm-3 col-sm-2 col-form-label">File</label>
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