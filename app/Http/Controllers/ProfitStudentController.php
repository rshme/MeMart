<?php

namespace App\Http\Controllers;

use App\ProfitStudent;
use DataTables;
use Illuminate\Http\Request;

class ProfitStudentController extends Controller
{
    public function edit($id){
        $data = ProfitStudent::with(['student', 'profit'])->findOrFail($id);
        return view('vendor.voyager.profit-student.edit', compact('data'));
    }

    public function update(Request $request, $id){
        $data = ProfitStudent::findOrFail($id);

        $data->update([
            'periode' => $request->periode,
            'student_id' => $request->student_id,
            'profit_id' => $request->profit_id,
            'detail_profit' => $request->detail_profit
        ]);

        if($request->status == 1){
            if($data->student->user_id == NULL){
                $user = \App\User::create([
                    'role_id' => 5,
                    'username'=> $data->student->nis,
                    'name' => $data->student->fullname,
                    'password' => bcrypt(substr($data->student->no_phone, -4))
                ]);

                $data->student->update([
                    'user_id' => $user->id
                ]);
            }
        }

        $data->student->update(['status' => $request->status]);

        return redirect('/admin/profit-student');
    }

    public function datatables(){
        $students = ProfitStudent::query()->with(['student', 'profit'])->get();
        return DataTables::of($students)->
        addColumn('student', function($students){
            return $students->student->fullname;
        })->
        addColumn('profit', function($students){
            return $students->profit->value;
        })->addColumn('score', function($students){
           $cop = $students->student->criteria->cop->score;
           $cpi = $students->student->criteria->cpi->score;
           $other = $students->student->criteria->other->score;
           $profit = $students->profit->score;
           $allScore = $profit + $cop + $cpi + $other;
           return $allScore;
        })->
        addColumn('detail_profit', function($students){
            return 'Rp. ' . number_format($students->detail_profit, 2, ',', '.');
        })->
        addColumn('status', function($students){
            if($students->student->status){
                return 'Reseller';
            }
            return 'Student';
        })->
        addColumn('action', function($students){
            return view('layouts.partials.action', [
                'url_show' => route('voyager.profit-student.show', $students->id),
                'url_edit' => route('voyager.profit-student.edit', $students->id),
                'url_delete' => route('voyager.profit-student.destroy', $students->id),
                'student_id' => $students->id
            ]);
        })->
        rawColumns(['action'])->
        addIndexColumn()->
        toJson();
    }
}
