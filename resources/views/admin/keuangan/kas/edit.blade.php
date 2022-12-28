@extends('admin.master')
@section('content')
<div class="container">
    <div id="flHorizontalForm" class="col-lg-12 layout-spacing">
        <div class="statbox widget box box-shadow">
            <div class="widget-header">
                <div class="row">
                    <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                        <h4>Form Surat</h4>
                    </div>
            </div>
            </div>
            <div class="widget-content widget-content-area">
                <form action="{{route('user.update',$id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row mb-4">
                        <label for="" class="col-xl-2 col-sm-3 col-sm-2 col-form-label">Nama</label>
                        <div class="col-xl-10 col-lg-9 col-sm-10">
                            <input type="text" class="form-control" value="{{$name}}" name="name" placeholder="">
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label for="" class="col-xl-2 col-sm-3 col-sm-2 col-form-label">email</label>
                        <div class="col-xl-10 col-lg-9 col-sm-10">
                            <input type="text" class="form-control" value="{{$email}}" name="email" placeholder="">
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label for="" class="col-xl-2 col-sm-3 col-sm-2 col-form-label">Roles</label>
                        <div class="col-xl-10 col-lg-9 col-sm-10">
                            <select name="roles" class="form-control" id="exampleFormControlSelect1">
                                <option>Pilih Roles</option>
                                @foreach ($roles as $role => $roles)
                                <option value="{{$roles}}">{{$roles}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <!--  -->

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