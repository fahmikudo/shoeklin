@extends('layouts.app')

@section('content')
<div id="wrapper">
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h3 class="page-header">Pelanggan</h3>
            </div>
        </div>
        <div class="row">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-group fa-fw"></i> List Pelanggan
                </div>
                <br>
                <div class="panel-body top-operation">
                    <div class="col-lg-5 search-head-outer">
                        <form class="form-inline" role="form" method="GET">
                            <div class="input-group search-head">
                                <input type="text" class="form-control input-sm" name="keyword" placeholder="Nama Pelanggan">
                                <div class="input-group-btn">
                                    <button class="btn btn-default btn-sm" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <a href="#" data-toggle="modal" data-target="#createModal"><div class="btn btn-sm btn-primary pull-right"><i class="fa fa-plus-circle"></i> Tambah </div></a>
                </div>
                <div class="panel-body">
                    <div class="table-responsive table-data">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Pelanggan</th>
                                    <th>Alamat</th>
                                    <th>No. Telepon</th>
                                    <th>Status Member</th>
                                    <th class="text-right"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $index = 0; @endphp
                                @foreach ($pelanggan as $plg)
                                @php $index += 1 @endphp
                                <tr>
                                    <td>{{ $index }}</td>
                                    <td>{{ $plg->nama_pelanggan }}</td>
                                    <td>{{ $plg->alamat_pelanggan }}</td>
                                    <td>{{ $plg->no_telepon }}</td>
                                    <td>{{ $plg->status_member }}</td>
                                    <td style="width: 200px;" class="detail-info" href="#">
                                        <a class="detail-info" href="#">
                                            <button
                                                class="btn btn-primary"
                                                data-toggle="modal"
                                                onclick="editModal('{{ $plg->id }}')"
                                                data-target="#editModal">
                                                <i class="fa fa-edit fa-fw"></i>
                                                Edit
                                            </button>
                                        </a>
                                        <a href="#">
                                            <button 
                                                class="btn btn-danger"
                                                onclick="deleteModal('{{ $plg->id }}')" 
                                                data-toggle="modal" 
                                                data-target="#confirmDelete">
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
                                {{ $pelanggan->links() }}
                            </ul>
                        </div>
                    </div>
                    <!-- Modal Create -->
                    <div class="modal fade" id="createModal" role="dialog">
                        <div class="modal-dialog">
                            <!-- Modal content-->
                            <div class="modal-content">
                                <form action="{{ route('pelanggan-create') }}" method="POST">
                                    @csrf
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">Tambah Pelanggan</h4>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="nama-project">Nama Pelanggan</label>
                                            <input type="text" class="form-control" name="nama_pelanggan" required id="nama-pelanggan" placeholder="Nama Pelanggan">
                                        </div>
                                        <div class="form-group">
                                            <label for="nama-project">Nomor Telepon</label>
                                            <input type="text" class="form-control" name="no_telepon" required id="no-telepon" placeholder="Nomor Telepon">
                                        </div>
                                        <div class="form-group">
                                            <label for="nama-project">Status</label>
                                            <select class="form-control" name="status_member" id="sel1">
                                                <option value="MEMBER">MEMBER</option>
                                                <option value="NON MEMBER">NON MEMBER</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="nama-project">Alamat</label>
                                            <input type="text" class="form-control" name="alamat_pelanggan" required id="alamat" placeholder="Alamat">
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
                                <form action="{{ route('pelanggan-update') }}" method="POST">
                                    @csrf
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">Edit Pelanggan</h4>
                                    </div>
                                    <div class="modal-body">
                                        <input type="hidden" name="id-pelanggan" id="edit-id-pelanggan">
                                        <div class="form-group">
                                            <label for="nama-project">Nama Pelanggan</label>
                                            <input type="text" class="form-control" name="nama_pelanggan" required id="edit-nama-pelanggan" placeholder="Nama Pelanggan">
                                        </div>
                                        <div class="form-group">
                                            <label for="nama-project">Nomor Telepon</label>
                                            <input type="text" class="form-control" name="no_telepon" required id="edit-no-telepon" placeholder="Nomor Telepon">
                                        </div>
                                        <div class="form-group">
                                            <label for="nama-project">Status</label>
                                            <select class="form-control" name="status_member" id="edit-status">
                                                <option value="MEMBER">MEMBER</option>
                                                <option value="NON MEMBER">NON MEMBER</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="nama-project">Alamat</label>
                                            <input type="text" class="form-control" name="alamat_pelanggan" required id="edit-alamat" placeholder="Alamat">
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
                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                <button type="button" class="btn btn-danger" data-id="$pelanggan->id" id="confirm">Delete</button>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function deleteModal(idPelanggan) {
        $('#confirm').on('click', function () {
            var route = "{{ route('pelanggan-delete') }}";
            var token = $("meta[name='csrf-token']").attr("content");
            $.ajax({
                type: "post",
                url: route,
                dataType: "json",
                data: {
                    'id-pelanggan': idPelanggan,
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
    function editModal(idPelanggan) {
        $.ajax({
            type: "GET",
            url: "{{ url('pelanggan/') }}"+'/'+idPelanggan,
            data: "data",
            dataType: "json",
            success: function (response) {
                console.log(response[0]);
                $('#edit-id-pelanggan').val(response[0].id);
                $('#edit-nama-pelanggan').val(response[0].nama_pelanggan);
                $('#edit-no-telepon').val(response[0].no_telepon);
                $('#edit-alamat').val(response[0].alamat_pelanggan);
                $('#edit-status').val(response[0].status_member);
                $('#edit-jumlah-pencucian').val(response[0].jumlah_pencucian);
            }
        });
    }
</script>
@endsection
