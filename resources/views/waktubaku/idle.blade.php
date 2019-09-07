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
            <h3 class="m-b-none">Idle Time</h3>
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
                            <th width="">Job</th>
                            <th width="">t(i,1)</th>
                            <th width="">t(i,2)</th>
                            <th width="">I(i,2)</th>
                            <th width="">tnew(i),2</th>
                            <th width="">t(i,3)</th>
                            <th width="">I(i,3)</th>
                            <th width="">tnew(i),3</th>
                            <th width="">t(i,4)</th>
                            <th width="">I(i,4)</th>
                            <th width="">tnew(i),4</th>
                            <th width="">t(i,5)</th>
                            <th width="">I(i,5)</th>
                            <th width="">tnew(i),5</th>

                        </tr>
                    </thead>

                    <tbody>
                        @php
                            $t1 = 0;
                            $t2 = 0;
                            $i2 = 0;
                            $i3 = 0;

                            $i2tampung = 0;
                            $tnew2= 0;
                        @endphp 

                        @php
                            $t2a = 0;
                            $t3a = 0;
                            $i3a = 0;
                            $i4a = 0;

                            $i3tampunga = 0;
                            $tnew3a = 0;
                        @endphp 

                        @php
                            $t2b = 0;
                            $t3b = 0;
                            $i3b = 0;
                            $i4b = 0;

                            $i3tampungb = 0;
                            $tnew3b = 0;
                        @endphp 

                        @php
                            $t2c = 0;
                            $t3c = 0;
                            $i3c = 0;
                            $i4c = 0;

                            $i3tampungc = 0;
                            $tnew3c = 0;
                        @endphp 
                        
                        @foreach($data as $data )
                            <tr>
                                
                                <td>{{$loop->iteration}}</td>
                                <td>{{ $data->m1_waktu_proses}}</td>
                                <td>{{ $data->m2_waktu_proses}}</td>

                                @php
                                    if ($loop->iteration == 1) {
                                        $t1 = $data->m1_waktu_proses;
                                        $t2 = $data->m2_waktu_proses;
                                        $i2 = $data->m1_waktu_proses;
                                        $tnew2= $t2 + $i2;

                                    }
                                    else {
                                        $i2tampung = $i2;
                                        $i2 = $t1 + $data->m1_waktu_proses - $t2 - $i2;

                                        if ($i2 < 0) {
                                            $i2 = 0;
                                        }
                                        $tnew2= $data->m2_waktu_proses + $i2;                                        

                                        $t1 = $t1 + $data->m1_waktu_proses;
                                        $t2 = $t2 + $data->m2_waktu_proses;
                                        
                                    }
                                @endphp

                                @php
                                if ($loop->iteration == 1) {
                                    $t2a = $tnew2;
                                    $t3a = $data->m3_waktu_proses;
                                    $i3a = $tnew2;
                                    $tnew3a = $t3a + $i3a;

                                }
                                else {

                                    $i3tampunga = $i3a;
                                    $i3a = $t2a + $tnew2 - $t3a - $i3a;

                                    if ($i3a < 0) {
                                            $i3a = 0;
                                    }
                                    $tnew3a= $data->m3_waktu_proses + $i3a;                                        

                                    $t2a = $t2a + $tnew2;
                                    $t3a = $t3a + $data->m3_waktu_proses;
                                }
                                @endphp

                                @php
                                if ($loop->iteration == 1) {
                                    $t2b = $tnew3a;
                                    $t3b = $data->m4_waktu_proses;
                                    $i3b = $tnew3a;
                                    $tnew3b = $t3b + $i3b;

                                }
                                else {

                                    $i3tampungb = $i3b;
                                    $i3b = $t2b + $tnew3a - $t3b - $i3b;


                                    if ($i3b < 0) {
                                            $i3b = 0;
                                    }
                                    $tnew3b= $data->m4_waktu_proses + $i3b;                                        

                                    $t2b = $t2b + $tnew3a;
                                    $t3b = $t3b + $data->m4_waktu_proses;
                                }
                                @endphp

                                @php
                                if ($loop->iteration == 1) {
                                    $t2c = $tnew3b;
                                    $t3c = $data->m5_waktu_proses;
                                    $i3c = $tnew3b;
                                    $tnew3c = $t3c + $i3c;

                                }
                                else {

                                    $i3tampungc = $i3c;
                                    $i3c = $t2c + $tnew3b - $t3c - $i3c;
                                
                                    if ($i3c < 0) {
                                            $i3c = 0;
                                    }

                                    $tnew3c= $data->m5_waktu_proses + $i3c;                                        

                                    $t2c = $t2c + $tnew3b;
                                    $t3c = $t3c + $data->m5_waktu_proses;

                                }
                                @endphp
                                <td>{{$i2}}</td>
                                    @php
                                        $i2 = $i2tampung + $i2;
                                    @endphp
                                <td>{{$tnew2}}</td>
                                <td>{{ $data->m3_waktu_proses}}</td>
                                <td>{{$i3a}}</td>
                                    @php
                                        $i3a = $i3tampunga + $i3a;
                                    @endphp
                                <td>{{$tnew3a}}</td>
                                <td>{{ $data->m4_waktu_proses}}</td>
                                <td>{{$i3b}}</td>
                                    @php
                                    $i3b = $i3tampungb + $i3b;
                                    @endphp
                                <td>{{$tnew3b}}</td>
                                <td>{{ $data->m5_waktu_proses}}</td>
                                <td>{{$i3c}}</td>
                                    @php
                                    $i3c = $i3tampungc + $i3c;
                                    @endphp
                                <td>{{$tnew3c}}</td>

                                <td></td>


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