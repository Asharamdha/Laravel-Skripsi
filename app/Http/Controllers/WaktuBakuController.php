<?php

namespace App\Http\Controllers;
use App\Model\WaktuBaku;
use Carbon\Carbon;

use Illuminate\Http\Request;

class WaktuBakuController extends Controller
{
    public function index()
    {
        
        $bulan = Carbon::now()->month;

        $tahun = Carbon::now()->year;

        $data = WaktuBaku::where('bulan', $bulan)->where('tahun', $tahun)->get();
        return view('waktubaku/index')->with( 'data', $data );
    }

    public function create()
    {
        return view('waktubaku/new');
    }

    public function store(Request $request)
    {

        // dd($request->m1);
        $bulan = Carbon::now()->month;

        $tahun = Carbon::now()->year;

        $tanggal = Carbon::now()->timezone('Asia/Jakarta')->format('Y-m-d');

        // $data = WaktuBaku::updateOrCreate(
        //     ['bulan' => $bulan, 
        //     'tahun' => $tahun],
        //     [
        //     // 'tanggal' => $tanggal, 
        //     'm1' => $request->m1,
        //     'm2' => $request->m2,
        //     'm3' => $request->m3,
        //     'm4' => $request->m4,
        //     'm5' => $request->m5,
        //     ]
        // );

        $data = new WaktuBaku;
        $data->bulan = $bulan;
        $data->tahun = $tahun;
        $data->tanggal = $tanggal;
        $data->m1 = $request->m1;
        $data->m2 = $request->m2;
        $data->m3 = $request->m3;
        $data->m4 = $request->m4;
        $data->m5 = $request->m5;
 
        $data->save();

        return redirect('waktu-baku');
    }

    public function edit($id)
    {
        $order = Order::find($id);
        return view('edit')->with('order', $order);
    }
}
