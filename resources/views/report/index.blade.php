@extends('layouts.app')

@section('content')
<div id="wrapper">
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h3 class="page-header">Laporan</h3>
            </div>
        </div>
        <div class="row">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-group fa-fw"></i> Buat Laporan Transaksi
                </div>
                <div class="panel-body">
                    <form action="{{ route('report-transaksi') }}" method="GET">
                        @csrf
                        <div class="col-sm form-group{{ $errors->has('tanggal_awal') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="tanggal_awal">{{ __('Tanggal Awal *') }}</label>
                                    <input 
                                        type="date" 
                                        name="tanggal_awal" 
                                        id="tanggal_awal" 
                                        class="form-control form-control-alternative{{ $errors->has('tanggal_awal') ? ' is-invalid' : '' }}" 
                                        required 
                                        autofocus>
                                        @if ($errors->has('tanggal_awal'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('tanggal_awal') }}</strong>
                                            </span>
                                        @endif
                                        
                                        @if ($errors->has('tanggal_awal'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('tanggal_awal') }}</strong>
                                            </span>
                                        @endif
                                </div>

                                <div class="col-sm form-group{{ $errors->has('tanggal_akhir') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="tanggal_akhir">{{ __('Tanggal Akhir *') }}</label>
                                    <input 
                                        type="date" 
                                        name="tanggal_akhir" 
                                        id="tanggal_akhir" 
                                        class="form-control form-control-alternative{{ $errors->has('tanggal_akhir') ? ' is-invalid' : '' }}" 
                                        required 
                                        autofocus>
                                        @if ($errors->has('tanggal_akhir'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('tanggal_akhir') }}</strong>
                                            </span>
                                        @endif
                                        
                                        @if ($errors->has('tanggal_akhir'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('tanggal_akhir') }}</strong>
                                            </span>
                                        @endif
                                </div>
                                {{ Form::label('jenis_pelayanan', 'Jenis Pelayanan*') }}
                                {{ Form::select('jenis_pelayanan', $jenpel, '',['class' => 'form-control']) }}
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Download Laporan</button>
                            <button data-baseUrl="{{ route('report-preview') }}" type="submit" id="btnPreview" class="btn btn-info">Preview Laporan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(function() {
        $('#btnPreview').on('click', function(e) {
            e.preventDefault();
            let tanggal_awal = $('input[name="tanggal_awal"]').val()
            let tanggal_akhir = $('input[name="tanggal_akhir"]').val()
            let jenis_pelayanan = $('select[name="jenis_pelayanan"]').val()
            let baseUrl = $(this).attr('data-baseUrl')
            window.open(baseUrl + '?tanggal_awal=' + tanggal_awal + '&tanggal_akhir=' + tanggal_akhir + '&jenis_pelayanan=' + jenis_pelayanan)
        })
    })
</script>
@endsection