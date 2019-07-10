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
                        <form class="form-inline" role="form" method="GET">
                            <div class="input-group search-head">
                                <input type="text" class="form-control input-sm" name="keyword" placeholder="Nama Pegawai">
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
                                    <th>Nama Pegawai</th>
                                    <th>Email</th>
                                    <th>Jabatan</th>
                                    <th>No. Telepon</th>
                                    <th>Alamat</th>
                                    <th class="text-right"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Aditya M Farhan</td>
                                    <td>adityamfarhan@gmail.com</td>
                                    <td>STAFF</td>
                                    <td>08997345956</td>
                                    <td>Jl. Kesehatan No. 77</td>
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
                                        <h4 class="modal-title">Tambah Pegawai</h4>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="nama-project">Nama Pegawai</label>
                                            <input type="text" class="form-control" name="nama-project" required id="nama-project" placeholder="Nama Pelanggan">
                                        </div>
                                        <div class="form-group">
                                            <label for="nama-project">Email</label>
                                            <input type="text" class="form-control" name="nama-project" required id="nama-project" placeholder="Email">
                                        </div>
                                        <div class="form-group">
                                            <label for="nama-project">Jabatan</label>
                                            <input type="text" class="form-control" name="nama-project" required id="nama-project" placeholder="Jabatan">
                                        </div>
                                        <div class="form-group">
                                            <label for="nama-project">No. Telepon</label>
                                            <input type="text" class="form-control" name="nama-project" required id="nama-project" placeholder="No. Telepon">
                                        </div>
                                        <div class="form-group">
                                            <label for="nama-project">Alamat</label>
                                            <input type="text" class="form-control" name="nama-project" required id="nama-project" placeholder="Alamat">
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
                                        <h4 class="modal-title">Edit Jenis Pelanggan</h4>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="nama-project">Nama Pegawai</label>
                                            <input type="text" class="form-control" name="nama-project" required id="nama-project" placeholder="Nama Pelanggan">
                                        </div>
                                        <div class="form-group">
                                            <label for="nama-project">Email</label>
                                            <input type="text" class="form-control" name="nama-project" required id="nama-project" placeholder="Email">
                                        </div>
                                        <div class="form-group">
                                            <label for="nama-project">Jabatan</label>
                                            <input type="text" class="form-control" name="nama-project" required id="nama-project" placeholder="Jabatan">
                                        </div>
                                        <div class="form-group">
                                            <label for="nama-project">No. Telepon</label>
                                            <input type="text" class="form-control" name="nama-project" required id="nama-project" placeholder="No. Telepon">
                                        </div>
                                        <div class="form-group">
                                            <label for="nama-project">Alamat</label>
                                            <input type="text" class="form-control" name="nama-project" required id="nama-project" placeholder="Alamat">
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