@extends('layouts.app')

@section('content')
<div id="wrapper">
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h3 class="page-header">Pegawai</h3>
            </div>
        </div>
        <div class="row">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-group fa-fw"></i> List Pegawai
                </div>
                <br>
                <div class="panel-body top-operation">
                    <div class="col-lg-5 search-head-outer">
                        <form
                            class="form-inline"
                            role="form"
                            method="GET"
                            action="{{ route('pegawai-search')}}">
                            <div class="input-group search-head">
                                <input type="text" class="form-control input-sm" name="keyword" placeholder="Nama User">
                                <div class="input-group-btn">
                                    <button class="btn btn-default btn-sm" type="submit">
                                        <i class="glyphicon glyphicon-search"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <a href="#" data-toggle="modal" data-target="#createModal">
                        <div class="btn btn-sm btn-primary pull-right">
                            <i class="fa fa-plus-circle"></i>
                            Tambah
                        </div>
                    </a>
                </div>
                <div class="panel-body">
                    <div class="table-responsive table-data">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Jabatan</th>
                                    <th>Nomor HP</th>
                                    <th>Alamat</th>
                                    <th class="text-right"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $index = 0; @endphp
                                @foreach ($user as $us)
                                @php $index += 1 @endphp
                                    <tr>
                                        <td>{{ $index }}</td>
                                        <td>{{ $us->name }}</td>
                                        <td>{{ $us->email }}</td>
                                        <td>{{ $us->jabatan }}</td>
                                        <td>{{ $us->no_telepon }}</td>
                                        <td>{{ $us->alamat }}</td>
                                        <td class="text-right">
                                            <a class="detail-info" href="#">
                                                <button
                                                    class="btn btn-primary"
                                                    onclick="editModal('{{ $us->id }}')"
                                                    data-toggle="modal"
                                                    data-target="#editModal">
                                                    <i class="fa fa-edit fa-fw"></i>Edit
                                                </button>
                                            </a>
                                            <a href="#">
                                                <button
                                                    onclick="deleteModal('{{ $us->id }}')"
                                                    class="btn btn-danger" 
                                                    data-toggle="modal" 
                                                    data-target="#confirmDelete" 
                                                    class="btn btn-danger">
                                                    <i class="fa fa-trash fa-fw"></i>Delete
                                                </button>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="pull-right" id="page-control">
                            <ul class="pagination">
                                {{ $user->links() }}
                            </ul>
                        </div>
                    </div>
                </div>

                 <!-- Modal Create -->
                <div class="modal fade" id="createModal" role="dialog">
                    <div class="modal-dialog">
                        <!-- Modal content-->
                        <div class="modal-content">
                            <form action="{{ route('pegawai-create') }}" method="POST">
                                @csrf
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Tambah User</h4>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="nama-lengkap">Nama Lengkap</label>
                                        <input
                                            type="text"
                                            class="form-control"
                                            name="nama-lengkap"
                                            required id="nama-lengkap"
                                            placeholder="Nama lengkap">
                                    </div>
                                    <div class="form-group">
                                        <label for="email">E-mail</label>
                                        <input
                                            type="email"
                                            class="form-control"
                                            name="email"
                                            required id="email"
                                            placeholder="E-mail">
                                    </div>
                                    <div class="form-group">
                                        <label for="password">Password</label>
                                        <input
                                            type="password"
                                            class="form-control"
                                            name="password"
                                            required id="password"
                                            placeholder="Password">
                                    </div>
                                    <div class="form-group">
                                        <label for="jabatan">Jabatan</label>
                                        <input
                                            type="text"
                                            class="form-control"
                                            name="jabatan"
                                            required id="jabatan"
                                            placeholder="Jabatan">
                                    </div>
                                    <div class="form-group">
                                        <label for="nama-lengkap">Nomor HP</label>
                                        <input
                                            type="text"
                                            class="form-control"
                                            name="no_telepon"
                                            required id="no-hp"
                                            placeholder="Nomor HP">
                                    </div>
                                    <div class="form-group">
                                        <label for="nama-lengkap">Alamat</label>
                                        <input
                                            type="text"
                                            class="form-control"
                                            name="alamat"
                                            required id="alamat"
                                            placeholder="Alamat">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Modal Edit -->
                <div class="modal fade" id="editModal" role="dialog">
                    <div class="modal-dialog">
                        <!-- Modal content-->
                        <div class="modal-content">
                            <form action="{{ route('pegawai-put') }}" method="POST">
                                @csrf
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Edit User</h4>
                                </div>
                                <div class="modal-body">
                                    <input type="hidden" name="idPegawai" id="edit-idPegawai">
                                    <div class="form-group">
                                        <label for="nama-lengkap">Nama Lengkap</label>
                                        <input
                                            type="text"
                                            class="form-control"
                                            name="nama-lengkap"
                                            id="edit-nama-lengkap"
                                            required
                                            placeholder="Nama lengkap">
                                    </div>
                                    <div class="form-group">
                                        <label for="email">E-mail</label>
                                        <input
                                            type="email"
                                            class="form-control"
                                            name="email"
                                            id="edit-email"
                                            required
                                            placeholder="E-mail">
                                    </div>
                                    <div class="form-group">
                                        <label for="password">Password</label>
                                        <input
                                            type="password"
                                            class="form-control"
                                            name="password"
                                            id="edit-password"
                                            required
                                            placeholder="Password">
                                    </div>
                                    <div class="form-group">
                                        <label for="jabatan">Jabatan</label>
                                        <input
                                            type="text"
                                            class="form-control"
                                            name="jabatan"
                                            id="edit-jabatan"
                                            required
                                            placeholder="Jabatan">
                                    </div>
                                    <div class="form-group">
                                        <label for="nama-lengkap">Nomor HP</label>
                                        <input
                                            type="text"
                                            class="form-control"
                                            name="no_telepon"
                                            required id="edit-no-telepon"
                                            placeholder="Nomor HP">
                                    </div>
                                    <div class="form-group">
                                        <label for="nama-lengkap">Alamat</label>
                                        <input
                                            type="text"
                                            class="form-control"
                                            name="alamat"
                                            required id="edit-alamat"
                                            placeholder="Alamat">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    <button type="submit" data-id="$user->id" class="btn btn-primary">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- Modal Dialog -->
                <div class="modal fade" id="confirmDelete" role="dialog" aria-labelledby="confirmDeleteLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                <h4 class="modal-title">Delete Parmanently</h4>
                            </div>
                            <div class="modal-body">
                                <p>Are you sure about this ?</p>
                            </div>
                            <div class="modal-footer">
                                <meta name="csrf-token" content="{{ csrf_token() }}">
                                <button type="button" class="btn btn-default" id="btn-close-confirmDelete" data-dismiss="modal">Cancel</button>
                                <button type="button" class="btn btn-danger" data-id="$user->id" id="confirm">Delete</button>
                            </div>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>
</div>
<script>
    function deleteModal(idPegawai) {
        $('#confirm').on('click', function () {
            var route = "{{ route('pegawai-remove') }}";
            var token = $("meta[name='csrf-token']").attr("content");
            $.ajax({
                type: "post",
                url: route,
                dataType: "json",
                data: {
                    'idPegawai': idPegawai,
                    '_token': token
                }
            })
            .done(function(data) {
                if(data.status == "error") return alert("Gagal Menghapus Data !");
                $("#confirmDelete").children().children().children().children()[4].click()
                setTimeout(() => {
                    window.location.reload();
                }, 500);
            })
            .fail(function(e) {
                console.log('error => '+e.responseJSON.message);
            })
        });
    }
    function editModal(idPegawai) {
        $.ajax({
            type: "GET",
            url: "{{ url('pegawai/') }}"+'/'+idPegawai,
            data: "data",
            dataType: "json",
            success: function (response) {
                $('#edit-idPegawai').val(response[0].id);
                $('#edit-nama-lengkap').val(response[0].name);
                $('#edit-email').val(response[0].email);
                $('#edit-password').val(response[0].password);
                $('#edit-jabatan').val(response[0].jabatan);
                $('#edit-no-telepon').val(response[0].no_telepon);
                $('#edit-alamat').val(response[0].alamat);
            }
        });
    }
</script>

@endsection
