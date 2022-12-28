@extends('admin.master')
@section('content')
<div class="container">
    <div id="tableFooter" class="col-lg-12 col-12 layout-spacing">
        <div class="statbox widget box box-shadow">
            <div class="widget-header">
                <div class="row">
                    <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                        <h4>Tabel Surat Keluar </h4>
                    </div>
                    <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                        <a href="{{route('surat.surat_keluar.add')}}" class="btn btn-primary ms-5">Add</a>
                    </div>
                </div>
            </div>
            <div class="widget-content widget-content-area">
                <div class="table-responsive">
                    <table id="myTable" class="table table-bordered table-hover table-condensed mb-4">
                        <thead>
                            <tr>
                                <th>No. </th>
                                <th>Tanggal</th>
                                <th>Nomor Surat</th>
                                <th>Perihal</th>
                                <th>Untuk</th>
                                <th>Tgl Keluar</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>

                    </table>
                </div>

            </div>
        </div>
    </div>
</div>
@push('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>
<script>
    $(document).ready(function() {
        isi()
    })

    function isi() {
        $('#myTable').DataTable({
            serverSide: true,
            responseive: true,
            ajax: {
                url: "{{route('surat.surat_keluar.data')}}",
                "type": "GET"
            },
            columns: [{
                    render: function(data, type, row, meta) {
                        return meta.row + meta.settings._iDisplayStart + 1;
                    },
                },
                {
                    data: 'tanggal',
                    name: 'tanggal'
                },
                {
                    data: 'nomor_surat',
                    name: 'nomor_surat'
                },
                {
                    data: 'perihal',
                    name: 'perihal'
                },
                {
                    data: 'dari',
                    name: 'dari'
                },
                {
                    data: 'tanggal_diterima',
                    name: 'tanggal_diterima'
                },
                {
                    render: function(data, type, row) {
                        console.log(row.file);
                        return '<ul class="table-controls"> <li><a href="" class="badge badge-primary">download</a></li> <li><a href="/surat/surat_keluar/edit/' + row.id + '" data-toggle="tooltip" data-placement="top" title="Edit"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check-circle text-primary"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path> <polyline points="22 4 12 14.01 9 11.01"></polyline></svg></a></li><li><a href="/surat/surat_keluar/destroy/' + row.id +
                        '" data-toggle="tooltip" data-placement="top" title="Delete"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x-circle text-danger"> <circle cx="12" cy="12" r="10"></circle> <line x1="15" y1="9" x2="9" y2="15"></line> <line x1="9" y1="9" x2="15" y2="15"></line> </svg></a></li> </ul>'
                    }
                },
            ]
        });
    }
</script>
@endpush
@endsection