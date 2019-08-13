@extends('layouts.app')

@section('title')
    Schedule
@endsection

@section('body')

<section class="vbox">
    <section class="scrollable padder">
        <ul class="breadcrumb no-border no-radius b-b b-light pull-in">
            <li><a href="{{url('/')}}"><i class="fa fa-home"></i> Home</a></li>
            <li class="active">Workset</li>
        </ul>
        <div class="m-b-md">
            <h3 class="m-b-none">Schedule</h3>
        </div>
        <section class="panel panel-default">
            <header class="panel-heading">
                Schedule
            </header>
            <div class="btn-group">
                <a href="{{ route('schedule.generate') }}" type="button" class="btn btn-sm btn-dark btn-icon" title="New project"><i class="fa fa-plus"></i></a>
                <div class="btn-group hidden-nav-xs">
                    <a href="{{ route('schedule.generate') }}" type="button" class="btn btn-sm btn-primary dropdown-toggle">
                        Generate
                    </a>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-striped m-b-none" data-ride="datatables" id="table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Product</th>
                            <th>{{ $data['schedules'][0]->day_date }}</th>
                            <th>{{ $data['schedules'][1]->day_date }}</th>
                            <th>{{ $data['schedules'][2]->day_date }}</th>
                            <th>{{ $data['schedules'][3]->day_date }}</th>
                            <th>{{ $data['schedules'][4]->day_date }}</th>
                            <th>{{ $data['schedules'][5]->day_date }}</th>
                            <th>{{ $data['schedules'][6]->day_date }}</th>
                        </tr>
                    </thead>

                    <tbody>
                        @php
                            $j = 0;
                            $n = 0;
                        @endphp
                        @foreach($data['orders'] as $key => $order)
                            <tr>
                                <td>{{ ++$n }}</td>
                                <td>{{ $data['schedules'][$j + 0]->company_name }}</td>
                                <td>{{ $data['schedules'][$j + 0]->product_id }}</td>
                                @if ($data['schedules'][$j + 0]->quantity == 0)
                                <td>-</td>
                                @else
                                <td>{{ $data['schedules'][$j + 0]->quantity }}</td>
                                @endif
                                @if ($data['schedules'][$j + 1]->quantity == 0)
                                <td>-</td>
                                @else
                                <td>{{ $data['schedules'][$j + 1]->quantity }}</td>
                                @endif
                                @if ($data['schedules'][$j + 2]->quantity == 0)
                                <td>-</td>
                                @else
                                <td>{{ $data['schedules'][$j + 2]->quantity }}</td>
                                @endif
                                @if ($data['schedules'][$j + 3]->quantity == 0)
                                <td>-</td>
                                @else
                                <td>{{ $data['schedules'][$j + 3]->quantity }}</td>
                                @endif
                                @if ($data['schedules'][$j + 4]->quantity == 0)
                                <td>-</td>
                                @else
                                <td>{{ $data['schedules'][$j + 4]->quantity }}</td>
                                @endif
                                @if ($data['schedules'][$j + 5]->quantity == 0)
                                <td>-</td>
                                @else
                                <td>{{ $data['schedules'][$j + 5]->quantity }}</td>
                                @endif
                                @if ($data['schedules'][$j + 6]->quantity == 0)
                                <td>-</td>
                                @else
                                <td>{{ $data['schedules'][$j + 6]->quantity }}</td>
                                @endif
                            </tr>
                            @php
                                $j = $j + 7;
                            @endphp
                        @endforeach
                    </tbody>
                </table>
            </div>
        </section>
    </section>
 </section>

@endsection