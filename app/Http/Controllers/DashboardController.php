<?php

namespace App\Http\Controllers;

use App\Profit;
use Illuminate\Http\Request;
use App\ProfitStudent;
use Jenssegers\Date\Date;

class DashboardController extends Controller
{
    public function index(){
        // get the month now
        $now = Date::now()->format('Y-m');

        //get the big profit
        $bigProfit = ProfitStudent::where('periode', 'LIKE', '%'.$now.'%')->orderBy('detail_profit', 'desc')->first();

        // get top 3 reseller
        $myacv = false;

        if($bigProfit){
            $achievement = ProfitStudent::where('detail_profit', '<=', $bigProfit['detail_profit'])->where('periode', 'LIKE', '%'.$now.'%')->orderBy('detail_profit', 'desc')->take(3)->get();

            $myacv = $achievement->filter(function($acv){
                if($acv->student_id == auth()->user()->student->id){
                    return true;
                }
            });
        }

        return view('pages.dashboard', compact('myacv'));
    }

    public function leaderboard(){
        $now = Date::now()->format('Y-m');
        $data = ProfitStudent::with(['student'])->where('periode', 'LIKE', '%'.$now.'%')->orderBy('detail_profit', 'desc')->orderBy('created_at', 'desc')->take(3)->get();
        $id = [];

        foreach ($data as $key => $value){
            array_push($id, $value->id);
        }

        $else = ProfitStudent::with(['student'])->whereNotIn('id', $id)->where('periode', 'LIKE', '%'.$now.'%')->orderBy('detail_profit', 'desc')->get();

        return view('layouts.partials.leaderboard', ['data' => $data, 'data2' => $else]);
    }

    public function showStudent($id){
        $student = ProfitStudent::with(['student'])->findOrFail($id);
        return view('layouts.partials.show_student', compact('student'));
    }

    public function profit(){
        return view('layouts.partials.chart');
    }

    public function chart(){
        $now = Date::now()->format('Y-m');

        $data = ProfitStudent::whereStudentId(auth()->user()->student->id)->where('periode', 'LIKE', '%'.$now.'%')->get(['periode', 'detail_profit']);

        return $data;
    }
}
