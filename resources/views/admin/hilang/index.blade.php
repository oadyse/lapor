@extends('layouts.admin.main')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 mb-4 mt-1">
            @foreach ($errors->all() as $message)
                {{$message}}
            @endforeach
        </div>
        <div class="col-md-12 mb-4 mt-1">
            <div class="d-flex flex-wrap justify-content-between align-items-center">
                <h4 class="font-weight-bold">{{ __('Barang Hilang') }}</h4>
                <button type="button" class="btn btn-primary mt-2" data-toggle="modal" data-target="#exampleModal">
                    <i style="height:20px;width:20px" class="d-inline-block">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                        </svg>                          
                    </i>
                     Tambah Barang Hilang
                </button>
                @include('admin.hilang.create')
            </div>
        </div>
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <table id="datatable-ajax" class="table data-table table-striped table-bordered" >
                        <thead>
                           <tr>
                              <th>Nomor Polisi</th>
                              <th>Lokasi</th>
                              <th>Spesifikasi</th>
                              <th>Foto</th>
                           </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
    <script>
        $('#datatable-ajax').DataTable( {
            'processing': true,
            'serverSide': true,
            'serverMethod': 'post',
            ajax: {
                url: '{{route('barang.hilang.page')}}',
                method: 'POST',
                data: {'_token':'{{csrf_token()}}'}
            },
            columns: [
                { data: 'no_polisi' },
                { data: 'lokasi' },
                { data: 'spesifikasi' },
                { data: 'foto' },
            ]
        } );
    </script>
@endsection