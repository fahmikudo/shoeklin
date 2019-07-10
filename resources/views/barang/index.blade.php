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
                        <form class="form-inline" role="form" method="GET">
                            <div class="input-group search-head">
                                <input type="text" class="form-control input-sm" name="keyword" placeholder="Nama Barang">
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
                                <tr>
                                    <td>1</td>
                                    <td>Baygon</td>
                                    <td>5</td>
                                    <td>Pembersih</td>
                                    <td>ml</td>
                                    <td class="detail-info" href="#">
                                        <a class="detail-info" href="#">
                                            <button
                                                class="btn btn-primary"
                                                data-toggle="modal"
                                                data-target="#editModal">
                                                <i class="fa fa-edit fa-fw"></i>
                                                Edit
                                            </button>
                                        </a>
                                        <a href="#">
                                            <button class="btn btn-danger" data-toggle="modal" data-target="#confirmDelete">
                                                <i class="fa fa-trash fa-fw"></i>Delete
                                            </button>
                                        </a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="pull-right" id="page-control">
                            <ul class="pagination">
                                <li class="active"><a href="#">1</a></li>
                                <li><a href="#">2</a></li>
                                <li><a href="#">3</a></li>
                                <li><a href="#">4</a></li>
                                <li><a href="#">5</a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- Modal Create -->
                    <div class="modal fade" id="createModal" role="dialog">
                        <div class="modal-dialog">
                            <!-- Modal content-->
                            <div class="modal-content">
                                <form action="" method="POST">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">Tambah Barang</h4>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="nama-project">Nama Barang</label>
                                            <input type="text" class="form-control" name="nama-project" required id="nama-project" placeholder="Nama Barang">
                                        </div>
                                        <div class="form-group">
                                            <label for="nama-project">Jumlah Barang</label>
                                            <input type="text" class="form-control" name="nama-project" required id="nama-project" placeholder="Jumlah Barang">
                                        </div>
                                        <div class="form-group">
                                            <label for="nama-project">Jenis Barang</label>
                                            <input type="text" class="form-control" name="nama-project" required id="nama-project" placeholder="Jenis Barang">
                                        </div>
                                        <div class="form-group">
                                            <label for="nama-project">Satuan</label>
                                            <input type="text" class="form-control" name="nama-project" required id="nama-project" placeholder="Satuan">
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
                                <form action="" method="POST">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">Edit Barang</h4>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="nama-project">Nama Barang</label>
                                            <input type="text" class="form-control" name="nama-project" required id="nama-project" placeholder="Nama Barang">
                                        </div>
                                        <div class="form-group">
                                            <label for="nama-project">Jumlah Barang</label>
                                            <input type="text" class="form-control" name="nama-project" required id="nama-project" placeholder="Jumlah Barang">
                                        </div>
                                        <div class="form-group">
                                            <label for="nama-project">Jenis Barang</label>
                                            <input type="text" class="form-control" name="nama-project" required id="nama-project" placeholder="Jenis Barang">
                                        </div>
                                        <div class="form-group">
                                            <label for="nama-project">Satuan</label>
                                            <input type="text" class="form-control" name="nama-project" required id="nama-project" placeholder="Satuan">
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
                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                <button type="button" class="btn btn-danger" id="confirm">Delete</button>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
