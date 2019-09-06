@extends('layouts.app')

@section('body')

<section class="vbox bg-white">
    <header class="header b-b b-light hidden-print">
        <button href="#" class="btn btn-sm btn-info pull-right" onClick="window.print();">Print</button>
        <p>Invoice</p>
    </header>
    <section class="scrollable wrapper" id="print">
        <div class="row">
            <div class="col-xs-6">
                <h2 style="margin-top: 0px">KONFIRMASI <b>PEMBAYARAN</b></h2>
                <p>CV. Sumber Baja Perkasa <br>
                    Sentono, Ngawonggo, Ceper, Klaten<br>
                    Indonesia
                </p>
            </div>
            <div class="col-xs-6 text-right">
                <h4>INVOICE</h4>
            </div>
        </div>
        <div class="well m-t" style="margin-bottom: 50px">
            <div class="row">
                <div class="col-xs-6">
                    <strong>KEPADA:</strong>
                    <h4>{{ $order->name }}</h4>
                    <p>
                        {{ $order->address }}
                    </p>
                </div>
                <div class="col-xs-6 text-right">
                    <p class="h4">#{{ $order->id }}</p>
                    <h5>{{ $order->delivery_date }}</h5>
                    <p class="m-t m-b">Order date: <strong>27 Agustus 2019</strong><br>
                        Order ID: <strong>#9399034</strong>
                    </p>
                </div>
            </div>
        </div>
        <div class="line"></div>
        <table class="table">
            <thead>
            <tr>
                <th width="60">QTY</th>
                <th>DEATIL TRANSAKSI</th>
                <th width="120">TOTAL</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>1</td>
                <td>{{ $order->product_id }}</td>
                <td> {{ $order->amount }}</td>
            </tr>
            <tr>
                <td colspan="2" class="text-right no-border"><strong>Total</strong></td>
                <td><strong> {{ $order->amount }}</strong></td>
            </tr>
            </tbody>
        </table>
        <div class="row">
            <div class="col-xs-8">
                <p><i>Terima kasih telah melakukan pembayaran. </i></p>

                <p>Diterima Oleh : __________________ </p>
            </div>
        </div>
    </section>
</section>

@endsection