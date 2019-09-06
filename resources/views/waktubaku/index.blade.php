@extends('layouts.app')

@section('title')
    All Orders
@endsection

@section('body')

<section class="vbox">
    <section class="scrollable padder">
        <ul class="breadcrumb no-border no-radius b-b b-light pull-in">
            <li><a href="{{url('/')}}"><i class="fa fa-home"></i> Home</a></li>
            <li class="active">Workset</li>
        </ul>
        <div class="m-b-md">
            <h3 class="m-b-none">Waktu Baku</h3>
        </div>
        <section class="panel panel-default">
            <header class="panel-heading">
                All Orders Data
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
                            <th width="">Pelanggan</th>
                            <th width="">Job</th>
                            <th width="">Kuantitas</th>
                            <th width="">M1 Baku</th>
                            <th width="">M2 Baku</th>
                            <th width="">M3 Baku</th>
                            <th width="">M4 Baku</th>
                            <th width="">M5 Baku</th>

                            <th width="">M1 Waktu Proses</th>
                            <th width="">M2 Waktu Proses</th>
                            <th width="">M3 Waktu Proses</th>
                            <th width="">M4 Waktu Proses</th>
                            <th width="">M5 Waktu Proses</th>
                            <th width="150px">Buttons</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($data as $data )
                            <tr>
                                <td>{{ $data->pelanggan }}</td>
                                <td>{{$loop->iteration}}</td>
                                <td>{{ $data->kuantitas }}</td>
                                <td>{{ $data->m1 }}</td>
                                <td>{{ $data->m2 }}</td>
                                <td>{{ $data->m3 }}</td>
                                <td>{{ $data->m4 }}</td>
                                <td>{{ $data->m5}}</td>

                                <td>{{ $data->m1_waktu_proses}}</td>
                                <td>{{ $data->m2_waktu_proses}}</td>
                                <td>{{ $data->m3_waktu_proses}}</td>
                                <td>{{ $data->m4_waktu_proses}}</td>
                                <td>{{ $data->m5_waktu_proses}}</td>

                                <td>
                                        {{-- <a class="btn btn-xs btn-danger" href="{{ route('waktubaku.destroy', [$data->id]) }}" data-toggle="tooltip" data-placement="top" data-title="Delete" onclick="return confirm('Anda yakin ingin menghapus butir ini?')"><i class="fa fa-trash"></i></a> --}}
                                        <a href="{{ route('waktubaku.destroy',$data->id) }}" class="btn btn-sm btn-icon btn-danger"><i class="fa fa-trash-o"></i></a>
        
        
                                </td>


                                {{-- <td>
                                    {{ Form::open(['route' => ['order.destroy', $order->id], 'method' => 'delete', 'style'=>'display:inline-block']) }}
                                    <button type="submit" class="btn btn-sm btn-icon btn-danger" onclick="return confirm('Are you sure you want to delete this?')" ><i class="fa fa-trash-o"></i></button>
                                    {{ Form::close() }}
                                    <a href="{{ route('order.edit',$order->id) }}" class="btn btn-sm btn-icon btn-warning"><i class="fa fa-edit"></i></a>
                                    <a href="{{ route('order.show',$order->id) }}" class="btn btn-sm btn-icon btn-success"><i class="fa fa-print"></i></a>
                                </td> --}}
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </section>
    </section>
 </section>

@endsection