@extends('layouts.app')

@section('content')
<div id="wrapper">
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h3 class="page-header">Barang</h3>
            </div>
        </div>
        <div class="row">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-group fa-fw"></i> List Barang
                </div>
                <br>
                <div class="panel-body top-operation">
                    <div class="col-lg-5 search-head-outer">
                        <form class="form-inline" role="form" method="GET" action="{{ route('barang-search') }}">
                            <div class="input-group search-head">
                                <input type="text" class="form-control input-sm" name="keyword" placeholder="Nama Bahan Baku">
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
                                    <th>Nama Barang</th>
                                    <th>Jumlah Barang</th>
                                    <th>Jenis Barang</th>
                                    <th>Satuan</th>
                                    <th class="text-right"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $index = 0; @endphp
                                @foreach ($bahanbaku as $barangs)
                                @php $index += 1 @endphp
                                <tr>
                                    <td>{{ $index }}</td>
                                    <td>{{ $barangs->nama_bahan_baku }}</td>
                                    <td>{{ $barangs->jumlah_bahan_baku }}</td>
                                    <td>{{ $barangs->jenis_bahan_baku }}</td>
                                    <td>{{ $barangs->satuan }}</td>
                                    <td class="detail-info" href="#">
                                        <a class="detail-info" href="#">
                                            <button
                                                class="btn btn-primary"
                                                onclick="editModal('{{ $barangs->id }}')"
                                                data-toggle="modal"
                                                data-target="#editModal">
                                                <i class="fa fa-edit fa-fw"></i>
                                                Edit
                                            </button>
                                        </a>
                                        <a href="#">
                                            <button 
                                                onclick="deleteModal('{{ $barangs->id }}')"
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
                                {{ $bahanbaku->links() }}
                            </ul>
                        </div>
                    </div>
                    <!-- Modal Create -->
                    <div class="modal fade" id="createModal" role="dialog">
                        <div class="modal-dialog">
                            <!-- Modal content-->
                            <div class="modal-content">
                                <form action="{{ route('barang-create') }}" method="POST">
                                    @csrf
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">Tambah Barang</h4>
                                    </div>
                                    <div class="modal-body">
                                        <input type="hidden" name="id-bahan-baku" id="edit-id-bahan-baku">
                                        <div class="form-group">
                                            <label for="nama-project">Nama Bahan Baku</label>
                                            <input type="text" class="form-control" name="nama_bahan_baku" required placeholder="Nama Bahan Baku">
                                        </div>
                                        <div class="form-group">
                                            <label for="nama-project">Jumlah Barang</label>
                                            <input type="text" class="form-control" name="jumlah_bahan_baku" required placeholder="Jumlah Bahan Baku">
                                        </div>
                                        <div class="form-group">
                                            <label for="nama-project">Jenis Barang</label>
                                            <input type="text" class="form-control" name="jenis_bahan_baku" required placeholder="Jenis Bahan Baku">
                                        </div>
                                        <div class="form-group">
                                            <label for="nama-project">Satuan</label>
                                            <input type="text" class="form-control" name="satuan" required placeholder="Satuan">
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
                                <form action="{{ route('barang-update') }}" method="POST">
                                    @csrf
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">Edit Bahan Baku</h4>
                                    </div>
                                    <div class="modal-body">
                                        <input type="hidden" name="id-bahan-baku" id="edit-id-bahan-baku">
                                        <div class="form-group">
                                            <label for="nama-bahan-baku">Nama Bahan Baku</label>
                                            <input type="text" class="form-control" name="nama_bahan_baku" required id="edit-nama-bahan-baku" placeholder="Nama Barang">
                                        </div>
                                        <div class="form-group">
                                            <label for="jumlah-bahan-baku">Jumlah Bahan Baku</label>
                                            <input type="text" class="form-control" name="jumlah_bahan_baku" required id="edit-jumlah-bahan-baku" placeholder="Jumlah Barang">
                                        </div>
                                        <div class="form-group">
                                            <label for="jenis-bahan-baku">Jenis Bahan Baku</label>
                                            <input type="text" class="form-control" name="jenis_bahan_baku" required id="edit-jenis-bahan-baku" placeholder="Jenis Barang">
                                        </div>
                                        <div class="form-group">
                                            <label for="satuan">Satuan</label>
                                            <input type="text" class="form-control" name="satuan" required id="edit-satuan" placeholder="Satuan">
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
                                <button type="button" class="btn btn-danger" data-id="$barangs->id" id="confirm">Delete</button>
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
    function deleteModal(idBahanBaku) {
        $('#confirm').on('click', function () {
            var route = "{{ route('barang-delete') }}";
            var token = $("meta[name='csrf-token']").attr("content");
            $.ajax({
                type: "post",
                url: route,
                dataType: "json",
                data: {
                    'id-bahan-baku': idBahanBaku,
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
    function editModal(idBahanBaku) {
        $.ajax({
            type: "GET",
            url: "{{ url('barang/') }}"+'/'+idBahanBaku,
            data: "data",
            dataType: "json",
            success: function (response) {
                console.log(response[0]);
                $('#edit-id-bahan-baku').val(response[0].id);
                $('#edit-nama-bahan-baku').val(response[0].nama_bahan_baku);
                $('#edit-jumlah-bahan-baku').val(response[0].jumlah_bahan_baku);
                $('#edit-jenis-bahan-baku').val(response[0].jenis_bahan_baku);
                $('#edit-satuan').val(response[0].satuan);
            }
        });
    }
    $(document).ready(function () {
        
    });
</script>
@endsection
