@extends('admin.master')
@section('content')
<div class="container">
    <div id="flHorizontalForm" class="col-lg-12 layout-spacing">
        <div class="statbox widget box box-shadow">
            <div class="widget-header">
                <div class="row">
                    <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                        <h4>Surat Keluar</h4>
                    </div>
                </div>
            </div>
            <div class="widget-content widget-content-area">
                <form action="{{ route('nota.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row mb-4">
                        <label for="" class="col-xl-2 col-sm-3 col-sm-2 col-form-label">Deskripsi</label>
                        <div class="col-xl-10 col-lg-9 col-sm-10">
                            <input type="text" class="form-control" name="deskripsi" placeholder="">
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label class="col-xl-2 col-sm-3 col-sm-2 col-form-label">Tanggal</label>
                        <div class="col-xl-10 col-lg-9 col-sm-10">
                            <input type="date" class="form-control" name="waktu" placeholder="">
                        </div>
                    </div>

                    <div class="form-group row mb-4">
                        <label for="" class="col-xl-2 col-sm-3 col-sm-2 col-form-label">Total</label>
                        <div class="col-xl-10 col-lg-9 col-sm-10">
                            <input type="text" class="form-control" name="total" placeholder="">
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