@extends('layouts.app')

@section('content')
<div id="wrapper">
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h3 class="page-header">Pengaturan</h3>
                @if(Session::has('message'))
                <div class="alert alert-success">
                    {{ Session::get('message') }}
                </div>
                @endif
            </div>
        </div>
        <div class="row">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Pengaturan
                </div>
                <div class="panel-body">
                    {!! Form::open(['route' => 'settings-save']) !!}
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="">Pengaturan Promo</label>
                            <input type="text" name="promo" class="form-control" value="{{ $settings[0]->value }}">
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <input type="submit" value="Simpan" class="btn btn-success">
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection