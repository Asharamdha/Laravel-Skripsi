@extends('layouts.app')

@section('title')
    All Orders
@endsection

@section('body')

<section class="vbox">
    <section class="scrollable padder">
        <ul class="breadcrumb no-border no-radius b-b b-light pull-in">
            <li><a href="{{url('/')}}"><i class="fa fa-home"></i> Home</a></li>
            <li class="active">Scheduling</li>
        </ul>
        <div class="m-b-md">
            <h3 class="m-b-none">Delivery Time</h3>
        </div>
        <div class="col-md-12 col-sm-12 col-xs-12">
        <form action="{{route('waktu.delivery.search')}}" method="POST" class="form-horizontal form-label-left" enctype="multipart/form-data">
        {{ csrf_field() }}
        <br />
        <div class="form-group">
            {{-- <label class="control-label col-md-3 col-sm-4 col-xs-4" for="waktu_awal""> Selang Waktu Transaksi
                
            </label> --}}
            <div class="col-md-12 col-sm-6 col-xs-12">
                <div class="col-md-4 col-sm-4 col-xs-4">
                    <input type="date" name="tanggal" class="form-control col-md-7 col-xs-12" value="{{$tanggal}}" required>
                </div>
                <div class="col-md-2 col-sm-2 col-xs-6">
                        <button type="submit" class="btn btn-success">Proses</button>
                </div>               
            </div>
        </div>

        </form>
        
        </div>
        <section class="panel panel-default">
            <header class="panel-heading">
                All Scheduling Data
                <button onClick ="$('#table').tableExport({type:'pdf',escape:'false',pdfFontSize:12,separator: ','});" class="btn btn-default btn-xs pull-right">PDF</i></button>
                <button onClick ="$('#table').tableExport({type:'csv',escape:'false'});" class="btn btn-default btn-xs pull-right">CSV</button>
                <button onClick ="$('#table').tableExport({type:'excel',escape:'false'});" class="btn btn-default btn-xs pull-right">Excel</i></button>
                <button onClick ="$('#table').tableExport({type:'sql',escape:'false',tableName:'orders'});" class="btn btn-default btn-xs pull-right">SQL</i></button>
                <i class="fa fa-info-sign text-muted" data-toggle="tooltip" data-placement="bottom" data-title="ajax to load the data."></i>
            </header>
            <div class="table-responsive">
                <table class="table table-striped m-b-none" data-ride="datatables" id="table">
                    <thead>
                        <tr>
                            <th width="" rowspan="2">Pelanggan</th>
                            <th width="" rowspan="2">Job</th>
                            <th width="" colspan="2">Cetak Resin</th>
                            <th width="" colspan="2">Press</th>
                            <th width="" colspan="2">Peleburan</th>
                            <th width="" colspan="2">Cor</th>
                            <th width="" colspan="2">Pembongkahan</th>
                            <th width="" rowspan="2">Delivery</th>
                        </tr>
                        <tr>
                            <th width="">Masuk</th>
                            <th width="">Keluar</th>
                            <th width="">Masuk</th>
                            <th width="">Keluar</th>
                            <th width="">Masuk</th>
                            <th width="">Keluar</th>
                            <th width="">Masuk</th>
                            <th width="">Keluar</th>
                            <th width="">Masuk</th>
                            <th width="">Keluar</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse ($data as $item)
                        <tr>

                                <td>{{$item['pelanggan']}}</td>
                                <td>{{$loop->iteration}}</td>
                                <td>{{date("l,d-m-Y", strtotime($item['m1_masuk']))}}</td>
                                <td>{{date("l,d-m-Y", strtotime($item['m1_keluar']))}}</td>
                                <td>{{date("l,d-m-Y", strtotime($item['m2_masuk']))}}</td>
                                <td>{{date("l,d-m-Y", strtotime($item['m2_keluar']))}}</td>
                                <td>{{date("l,d-m-Y", strtotime($item['m3_masuk']))}}</td>
                                <td>{{date("l,d-m-Y", strtotime($item['m3_keluar']))}}</td>
                                <td>{{date("l,d-m-Y", strtotime($item['m4_masuk']))}}</td>
                                <td>{{date("l,d-m-Y", strtotime($item['m4_keluar']))}}</td>
                                <td>{{date("l,d-m-Y", strtotime($item['m5_masuk']))}}</td>
                                <td>{{date("l,d-m-Y", strtotime($item['m5_keluar']))}}</td>
                                <td>{{date("l,d-m-Y", strtotime($item['delivery']))}}</td>
    
                                </tr>
                        @empty
                            
                        @endforelse
                        {{-- @foreach ($data as $item)
                            <tr>

                            <td>{{$item['pelanggan']}}</td>
                            <td>{{date("l,d-m-Y", strtotime($item['m1_masuk']))}}</td>
                            <td>{{date("l,d-m-Y", strtotime($item['m1_keluar']))}}</td>
                            <td>{{date("l,d-m-Y", strtotime($item['m2_masuk']))}}</td>
                            <td>{{date("l,d-m-Y", strtotime($item['m2_keluar']))}}</td>
                            <td>{{date("l,d-m-Y", strtotime($item['m3_masuk']))}}</td>
                            <td>{{date("l,d-m-Y", strtotime($item['m3_keluar']))}}</td>
                            <td>{{date("l,d-m-Y", strtotime($item['m4_masuk']))}}</td>
                            <td>{{date("l,d-m-Y", strtotime($item['m4_keluar']))}}</td>
                            <td>{{date("l,d-m-Y", strtotime($item['m5_masuk']))}}</td>
                            <td>{{date("l,d-m-Y", strtotime($item['m5_keluar']))}}</td>
                            <td>{{date("l,d-m-Y", strtotime($item['delivery']))}}</td>

                            </tr>
                        @endforeach --}}
                    </tbody>
                </table>
            </div>
        </section>
    </section>
 </section>

@endsection