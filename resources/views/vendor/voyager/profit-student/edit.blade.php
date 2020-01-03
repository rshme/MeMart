@extends('voyager::master')

@section('css')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@stop

@section('page_title', __('Edit Profit Student'))

@section('page_header')
    <h1 class="page-title">
        <i class="voyager-dollar"></i>
        {{ __('Edit Profit Student') }}
    </h1>
    @include('voyager::multilingual.language-selector')
@stop

@section('content')
    <div class="page-content edit-add container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-bordered">
                   <div class="panel-body">
                       <form action="{{ route('voyager.profit-student.update', $data->id) }}" method="post">
                           @csrf
                           @method('PUT')
                           <div class="form-group col-md-12">
                               <label for="periode" class="control-label">Periode</label>
                               <input type="date" name="periode" id="periode" class="form-control" value="{{ $data->periode }}">
                           </div>

                           <div class="form-group col-md-12">
                               <label class="control-label" for="student_id">Student Name</label>
                               <select name="student_id" id="student_id" class="form-control select2 select2-hidden-accessible">
                                   <option value="{{ $data->student->id }}" selected>{{ $data->student->fullname }}</option>
                                   @foreach(\App\Student::all() as $student)
                                       @if($student->id !== $data->student->id)
                                           <option value="{{ $student->id }}">{{ $student->fullname }}</option>
                                       @endif
                                   @endforeach
                               </select>
                           </div>

                           <div class="form-group col-md-12">
                               <label class="control-label" for="profit_id">Profit</label>
                               <select name="profit_id" id="profit_id" class="form-control select2 select2-hidden-accessible">
                                   <option value="{{ $data->profit->id }}" selected>{{ $data->profit->value }}</option>
                                   @foreach(\App\Profit::all() as $profit)
                                       @if($profit->id !== $data->profit->id)
                                           <option value="{{ $profit->id }}">{{ $profit->value }}</option>
                                       @endif
                                   @endforeach
                               </select>
                           </div>

                           <div class="form-group col-md-12">
                               <label for="detail_profit" class="control-label">Detail Profit</label>
                               <input type="number" name="detail_profit" id="detail_profit" min="100" class="form-control" value="{{ $data->detail_profit }}">
                           </div>

                           <div class="form-group col-md-12">
                               <label class="control-label" for="status">Status</label>
                               <select name="status" id="status" class="form-control select2 select2-hidden-accessible">
                                  <?php
                                    if(!$data->student->status){
                                        ?>
                                            <option value="0" selected>Student</option>
                                            <option value="1">Reseller</option>
                                        <?php
                                    }
                                    else{
                                      ?>
                                          <option value="1" selected>Reseller</option>
                                          <option value="0">Student</option>
                                      <?php
                                    }
                                  ?>
                               </select>
                           </div>
                           <button type="submit" class="btn btn-primary mr-auto">Save</button>
                       </form>
                   </div>
                </div>
            </div>
        </div>
    </div>
@endsection
