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
                <h4 class="font-weight-bold">{{ __('User') }}</h4>
                <button type="button" class="btn btn-primary mt-2" data-toggle="modal" data-target="#exampleModal">
                    <i style="height:20px;width:20px" class="d-inline-block">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                        </svg>                          
                    </i>
                     Tambah User
                </button>
                @include('admin.user.create')
                @include('admin.user.update')
            </div>
        </div>
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <table id="datatable-ajax" class="table data-table table-striped table-bordered" >
                        <thead>
                           <tr>
                              <th>Nama</th>
                              <th>Email</th>
                              <th>Role</th>
                              <th>Pilihan</th>
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
                url: '{{route('user.page')}}',
                method: 'POST',
                data: {'_token':'{{csrf_token()}}'}
            },
            columns: [
                { data: 'name' },
                { data: 'email' },
                { data: 'role' },
                { data: 'pilihan' },
            ]
        } );

        var updateModal = new bootstrap.Modal(document.getElementById('updateModal'))

        function modalEdit(id) {
            updateModal.show()
            $.ajax({
                url: '{{route('user.detail')}}/'+id,
                method: 'GET',
                success: function(response) {
                    $("#userTitle").html(response.name)
                    $("#updateModal #id").val(response.id)
                    $("#updateModal #name").val(response.name)
                    $("#updateModal #email").val(response.email)
                    $("#updateModal #role").val(response.role).change()
                }
            })
        }
    </script>
@endsection