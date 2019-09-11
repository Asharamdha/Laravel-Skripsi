<?php

namespace App\Http\Controllers;
use App\Model\WaktuBaku;
use Carbon\Carbon;
use DateTime;

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
        $data->pelanggan = $request->pelanggan;
        $data->kuantitas = $request->kuantitas;
        $data->m1 = $request->m1;
        $data->m2 = $request->m2;
        $data->m3 = $request->m3;
        $data->m4 = $request->m4;
        $data->m5 = $request->m5;
        $data->m1_waktu_proses = $request->kuantitas*$request->m1;
        $data->m2_waktu_proses = $request->kuantitas*$request->m2;
        $data->m3_waktu_proses = $request->kuantitas*$request->m3;
        $data->m4_waktu_proses = $request->kuantitas*$request->m4;
        $data->m5_waktu_proses = $request->kuantitas*$request->m5;        
 
        $data->save();

        return redirect('waktu-baku');
    }

    public function edit($id)
    {
        $order = Order::find($id);
        return view('edit')->with('order', $order);
    }

    public function idle()
    {
        
        $bulan = Carbon::now()->month;

        $tahun = Carbon::now()->year;

        $data = WaktuBaku::where('bulan', $bulan)->where('tahun', $tahun)->get();
        return view('waktubaku/idle')->with( 'data', $data );
    }

    public function destroy($id)
    {
        $data = WaktuBaku::findOrFail($id);

        $data->delete();

        return redirect('waktu-baku')->with('update_message', 'Hapus Berhasil');
    
    }

    public function output()
    {
        
        $bulan = Carbon::now()->month;

        $tahun = Carbon::now()->year;

        $data = WaktuBaku::where('bulan', $bulan)->where('tahun', $tahun)->get();

 
        return view('waktubaku/output')->with( 'data', $data );
    }

    public function delivery(){
        $tanggal = Carbon::today()->timezone('Asia/Jakarta');
        $data = [];
        // return view('waktubaku/delivery')->with( 'data', $tahun );
        return view('delivery/index', compact('data', 'tanggal'));
    }

    public function search(Request $request)
    {
       $tanggal = $request->tanggal;
       $month = date("n",strtotime($tanggal));
       $year = date("Y",strtotime($tanggal));

       $waktu = WaktuBaku::where('bulan', $month)->where('tahun', $year)->get();

        if ($waktu->isEmpty()) {

            $data = [];
            return view('delivery/index', compact('data', 'tanggal'));
        }

       foreach ($waktu as $key => $value) {
        if($key == 0){
            $data[$key]['pelanggan'] = $value->pelanggan;
            $data[$key]['m1_masuk'] = DateTime::createFromFormat('Y-m-d', $tanggal)->modify('+0 day')->format('d-m-Y');
            $hari = round($value->m1_waktu_proses/28800);           
            $data[$key]['m1_keluar'] = DateTime::createFromFormat('d-m-Y', $data[$key]['m1_masuk'])
                                    ->modify('+'.$hari.'day')
                                    ->format('d-m-Y');
            
            $data[$key]['m2_masuk'] = $data[$key]['m1_keluar'];
            $hari = round($value->m2_waktu_proses/28800);           
            $data[$key]['m2_keluar'] = DateTime::createFromFormat('d-m-Y', $data[$key]['m2_masuk'])
            ->modify('+'.$hari.'day')
            ->format('d-m-Y');

            $data[$key]['m3_masuk'] = $data[$key]['m2_keluar'];
            $hari = round($value->m3_waktu_proses/28800);
            $data[$key]['m3_keluar'] =DateTime::createFromFormat('d-m-Y', $data[$key]['m3_masuk'])
            ->modify('+'.$hari.'day')
            ->format('d-m-Y');

            $data[$key]['m4_masuk'] = $data[$key]['m3_keluar'];
            $hari = round($value->m4_waktu_proses/28800);
            $data[$key]['m4_keluar'] = DateTime::createFromFormat('d-m-Y', $data[$key]['m4_masuk'])
            ->modify('+'.$hari.'day')
            ->format('d-m-Y');

            $data[$key]['m5_masuk'] = $data[$key]['m4_keluar'];
            $hari = round($value->m5_waktu_proses/28800);
            $data[$key]['m5_keluar'] =DateTime::createFromFormat('d-m-Y', $data[$key]['m5_masuk'])
            ->modify('+'.$hari.'day')
            ->format('d-m-Y');

            $data[$key]['delivery'] = DateTime::createFromFormat('d-m-Y', $data[$key]['m5_keluar'])
            ->modify('+2 day')
            ->format('d-m-Y');
            $tampung = $data[$key]['m1_keluar'];
            $perulangan = $key;
            
        }
        else {
            $data[$key]['pelanggan'] = $value->pelanggan;
            $data[$key]['m1_masuk'] = $tampung;
            $hari = round($value->m1_waktu_proses/28800);           
            $data[$key]['m1_keluar'] = DateTime::createFromFormat('d-m-Y', $data[$key]['m1_masuk'])
                                    ->modify('+'.$hari.'day')
                                    ->format('d-m-Y');
            
            $data[$key]['m2_masuk'] = $data[$key]['m1_keluar'];
            $hari = round($value->m2_waktu_proses/28800);           
            $data[$key]['m2_keluar'] = DateTime::createFromFormat('d-m-Y', $data[$key]['m2_masuk'])
            ->modify('+'.$hari.'day')
            ->format('d-m-Y');

            $data[$key]['m3_masuk'] = $data[$key]['m2_keluar'];
            $hari = round($value->m3_waktu_proses/28800);
            $data[$key]['m3_keluar'] =DateTime::createFromFormat('d-m-Y', $data[$key]['m3_masuk'])
            ->modify('+'.$hari.'day')
            ->format('d-m-Y');

            $data[$key]['m4_masuk'] = $data[$key]['m3_keluar'];
            $hari = round($value->m4_waktu_proses/28800);
            $data[$key]['m4_keluar'] = DateTime::createFromFormat('d-m-Y', $data[$key]['m4_masuk'])
            ->modify('+'.$hari.'day')
            ->format('d-m-Y');

            $data[$key]['m5_masuk'] = $data[$key]['m4_keluar'];
            $hari = round($value->m5_waktu_proses/28800);
            $data[$key]['m5_keluar'] =DateTime::createFromFormat('d-m-Y', $data[$key]['m5_masuk'])
            ->modify('+'.$hari.'day')
            ->format('d-m-Y');

            $data[$key]['delivery'] = DateTime::createFromFormat('d-m-Y', $data[$key]['m5_keluar'])
            ->modify('+2 day')
            ->format('d-m-Y');
            $tampung = $data[$key]['m1_keluar'];
            $perulangan = $key;
        }
       
    }
        return view('delivery/index', compact('data', 'perulangan', 'tanggal'));
    }
}
