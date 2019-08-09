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
        </section>
    </section>
 </section>

@endsection