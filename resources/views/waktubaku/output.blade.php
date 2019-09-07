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
                            <th width="">No. </th>
                            <th width="">Pelanggan</th>
                            <th width="">M1</th>
                            <th width="">M2</th>
                            <th width="">M3</th>
                            <th width="">M4</th>
                            <th width="">M5</th>
                            <th width="">Total</th>
                            
                            <th width="150px">Buttons</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($data as $data )
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $data->pelanggan }}</td>
                                {{-- <td>{{ round(8*($data->m1_waktu_proses/3600) , 9)  }}</td>
                                <td>{{ 8*($data->m2_waktu_proses/3600) }}</td>
                                <td>{{ 8*($data->m3_waktu_proses/3600) }}</td>
                                <td>{{ 8*($data->m4_waktu_proses/3600) }}</td>
                                <td>{{ 8*($data->m5_waktu_proses/3600)}}</td> --}}
                                @php
                                    $total = 0;
                                @endphp
                               @for ($i = 1; $i <= 5; $i++)
                                <td>{{ round(8*($data['m'.$i.'_waktu_proses']/3600) , 9)  }}</td>
                                    @php
                                        $total= $total + round(8*($data['m'.$i.'_waktu_proses']/3600) , 9);
                                    @endphp
                               @endfor

                                <td>{{ $total }}</td>                                   
                                <td>
                                        {{-- <a class="btn btn-xs btn-danger" href="{{ route('waktubaku.destroy', [$data->id]) }}" data-toggle="tooltip" data-placement="top" data-title="Delete" onclick="return confirm('Anda yakin ingin menghapus butir ini?')"><i class="fa fa-trash"></i></a> --}}
                                        <a href="{{ route('waktubaku.destroy',$data->id) }}" class="btn btn-sm btn-icon btn-danger"><i class="fa fa-trash-o"></i></a>
        
        
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </section>
    </section>
 </section>

@endsection