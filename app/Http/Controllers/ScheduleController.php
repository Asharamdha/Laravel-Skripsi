<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;

use App\User;
use Hash;
use Validator;
use Auth;

use App\Order;
use App\Schedule;
use Carbon\Carbon;


class ScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::all();
        return view('schedule');
    }

    public function generateSchedule()
    {
        $today = Carbon::now();
        $orders = Order::where('delivery_date', '>', $today)->get();
        foreach ($orders as $key => $value) {
            $start = Carbon::createFromFormat("Y-m-d", $value->order_date);
            $delivery = Carbon::createFromFormat("Y-m-d", $value->delivery_date)->addDays(1);
            $diff = $delivery->diffInDays($start);
            $diff_from_today = $delivery->diffInDays(Carbon::now());
            $item_per_day = $value->quantity/$diff;
            for ($i=0; $i < 7; $i++) {
                $per_day = Carbon::now()->addDays($i);
                $schedule = new Schedule;
                $schedule->generate_date = $today;
                $schedule->company_name = $value->name;
                $schedule->product_id = $value->product_id;
                $schedule->day_date = $per_day;
                if ($i >= $diff_from_today) {
                    $schedule->quantity = 0;
                } else {
                    $schedule->quantity = $item_per_day;
                }
                $schedule->save();
            }
        }
        return redirect()->route('schedule');
    }

}