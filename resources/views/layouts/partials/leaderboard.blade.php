<div class="row">
    @if(count($data) > 1)
        @foreach($data as $top3)
            <div class="col-md-4 mb-4">
                <div class="card leaderboard">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-4">
                                <img src="{{ asset('assets/images/medal-'.($loop->index+1).'.svg')  }}" alt="" class="icon-achievement">
                            </div>
                            <div class="col-6">
                                @php
                                    $fullname = explode(' ', $top3->student->fullname);
                                    $first = $fullname[0];
                                    $last = str_limit($fullname[1], 1, '');
                                    echo '<h4>'.$first.' '.$last.'</h4>'
                                @endphp
                            </div>
                            <div class="col-2">
                                <i class="fas fa-eye" data-url="{{ route('profit_student.show', $top3->id) }}" data-name="{{ $top3->student->fullname }}" id="btn-show"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach

        @foreach($data2 as $top10)
            <div class="col-md-4">
                <div class="card leaderboard">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-4">
                                <div class="medal-top10">
                                    {{ $loop->index+4 }}
                                </div>
                            </div>
                            <div class="col-6">
                                @php
                                    $fullname = explode(' ', $top10->student->fullname);
                                    $first = $fullname[0];
                                    $last = str_limit($fullname[1], 1, '');
                                    echo '<h4 class="text-center">'.$first.' '.$last.'</h4>'
                                @endphp
                            </div>
                            <div class="col-2">
                                <i class="fas fa-eye" data-url="{{ route('profit_student.show', $top10->id) }}" data-name="{{ $top10->student->fullname }}" id="btn-show"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach

        @else
        <div class="col-12">
            <h3 class="text-center">Tidak ada data untuk saat ini</h3>
        </div>
    @endif
</div>
