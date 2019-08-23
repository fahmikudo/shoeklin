@extends('layouts.app')

@section('content')
<div id="wrapper">
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h3 class="page-header">Jenis Pelayanan</h3>
            </div>
        </div>
        <div class="row">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-group fa-fw"></i> List Jenis Pelayanan
                </div>
                <br>
                <div class="panel-body top-operation">
                    <div class="col-lg-5 search-head-outer">
                        <form class="form-inline" role="form" method="GET">
                            <div class="input-group search-head">
                                <input type="text" class="form-control input-sm" name="keyword" placeholder="Nama Jenis Pelayanan">
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
                                    <th>Nama Jenis Pelayanan</th>
                                    <th>Harga Pelayanan</th>
                                    <th class="text-right"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $index = 0; @endphp
                                @foreach ($jenispelayanan as $jp)
                                @php $index += 1 @endphp
                                <tr>
                                    <td>{{ $index }}</td>
                                    <td>{{ $jp->nama_pelayanan }}</td>
                                    <td>{{ $jp->harga_pelayanan }}</td>
                                    <td class="detail-info" href="#">
                                        <a class="detail-info" href="#">
                                            <button
                                                class="btn btn-primary"
                                                data-toggle="modal"
                                                onclick="editModal('{{ $jp->id }}')"
                                                data-target="#editModal">
                                                <i class="fa fa-edit fa-fw"></i>
                                                Edit
                                            </button>
                                        </a>
                                        <a href="#">
                                            <button 
                                                onclick="deleteModal('{{ $jp->id }}')"
                                                class="btn btn-danger" 
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
                                {{ $jenispelayanan->links() }}
                            </ul>
                        </div>
                    </div>
                    <!-- Modal Create -->
                    <div class="modal fade" id="createModal" role="dialog">
                        <div class="modal-dialog">                            
                            <div class="modal-content">
                                <form action="{{ route('jenis-pelayanan-create') }}" method="POST">
                                    @csrf
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">Tambah Jenis Pelayanan</h4>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="nama-jenis-pelayanan">Nama Jenis Pelayanan</label>
                                            <input type="text" class="form-control" name="nama_pelayanan" required placeholder="Jenis Pelayanan">
                                        </div>
                                        <div class="form-group">
                                            <label for="harga-jenis-pelayanan">Harga Jenis Pelayanan</label>
                                            <input type="text" class="form-control" name="harga_pelayanan" required placeholder="Harga Pelayanan">
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
                            <div class="modal-content">
                                <form action="{{ route('jenis-pelayanan-update') }}" method="POST">
                                    @csrf
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">Edit Jenis Pelayanan</h4>
                                    </div>
                                    <div class="modal-body">
                                        <input type="hidden" name="id-jenis-pelayanan" id="edit-id-jenis-pelayanan">
                                        <div class="form-group">
                                            <label for="nama-project">Nama Jenis Pelayanan</label>
                                            <input type="text" class="form-control" name="nama_pelayanan" required id="edit-jenis-pelayanan" placeholder="Jenis Pelayanan">
                                        </div>
                                        <div class="form-group">
                                            <label for="nama-project">Harga Jenis Pelayanan</label>
                                            <input type="text" class="form-control" name="harga_pelayanan" required id="edit-harga-pelayanan" placeholder="Harga Pelayanan">
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
                                <button type="button" class="btn btn-default" id="btn-close-confirmDelete" data-dismiss="modal">Cancel</button>
                                <button type="button" class="btn btn-danger" data-id="$jenispelayanan->id" id="confirm">Delete</button>
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
    function deleteModal(idJenisPelayanan) {
        $('#confirm').on('click', function () {
            var route = "{{ route('jenis-pelayanan-delete') }}";
            var token = $("meta[name='csrf-token']").attr("content");
            $.ajax({
                type: "post",
                url: route,
                dataType: "json",
                data: {
                    'id-jenis-pelayanan': idJenisPelayanan,
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
    function editModal(idJenisPelayanan) {
        $.ajax({
            type: "GET",
            url: "{{ url('jenispelayanan/') }}"+'/'+idJenisPelayanan,
            data: "data",
            dataType: "json",
            success: function (response) {
                console.log(response[0]);
                $('#edit-id-jenis-pelayanan').val(response[0].id);
                $('#edit-jenis-pelayanan').val(response[0].nama_pelayanan);
                $('#edit-harga-pelayanan').val(response[0].harga_pelayanan);
            }
        });
    }
</script>
@endsection
