@extends('layouts.app')

@section('title')
    Add Order
@endsection

@section('body')

<section class="vbox">
    <section class="scrollable padder">
        <ul class="breadcrumb no-border no-radius b-b b-light pull-in">
            <li><a href="index.html"><i class="fa fa-home"></i> Home</a></li>
            <li class="active">Workset</li>
        </ul>
        <div class="m-b-md">
            <h3 class="m-b-none">ADD Waktu Baku</h3>
        </div>
        <section class="panel panel-default">
            <header class="panel-heading">
                Add Order
                <i class="fa fa-info-sign text-muted" data-toggle="tooltip" data-placement="bottom" data-title="ajax to load the data."></i>
            </header>

            <div class="x_content">
            	<form action="{{route('waktu.store')}}" method="POST" class="form-horizontal form-label-left" enctype="multipart/form-data">
            	{{ csrf_field() }}
            	<br />

                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="pelanggan">Pelanggan
                        <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" name="pelanggan"  class="form-control col-md-7 col-xs-12" required>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="kuantitas">Kuantitas
                        <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" name="kuantitas"  class="form-control col-md-7 col-xs-12" required>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="m1">M1
                        <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" name="m1"  class="form-control col-md-7 col-xs-12" required>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="m2">M2
                        <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" name="m2"  class="form-control col-md-7 col-xs-12" required>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="m3">M3
                        <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" name="m3"  class="form-control col-md-7 col-xs-12" required>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="m4">M4
                        <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" name="m4"  class="form-control col-md-7 col-xs-12" required>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="m5">M5
                        <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" name="m5"  class="form-control col-md-7 col-xs-12" required>
                    </div>
                </div>

                

                <div class="ln_solid"></div>
                <div class="form-group">
                    <div class="col-md-12 col-sm-12 col-xs-12" style="text-align:center">
                        <button type="submit" class="btn btn-success">Save</button>
                        <a class="btn btn-danger" href="{{ URL::previous() }}">Cancel</a>
                        
                    </div>
                </div>
            	</form>
            </div>

        </section>
    </section>
</section>

@endsection