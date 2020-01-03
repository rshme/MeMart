@extends('layouts.master')

@section('content')
    @include('layouts.partials.navbar')

    <div class="container mt-5">
        <div class="row mb-5">
            <div class="col-md-6">
                <h3 class="section-title text-white text-center mb-4">
                    Reseller Name
                </h3>
                <div class="card">
                    <div class="card-body">
                        <div class="row align-items-center justify-content-center">
                            <div class="col-md-2">
                                <img src="{{ asset('storage/users/default.png')  }}" alt="" class="img-user">
                            </div>
                            <div class="col-md-6 student-text">
                                <h3>
                                    {{ auth()->user()->student->fullname  }}
                                </h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <h3 class="section-title text-white text-center mb-4">
                    Achievement
                </h3>
                <div class="card">
                    <div class="card-body">
                        <div class="row align-items-center justify-content-center">
                            @if($myacv)
                                <div class="col-md-2">
                                    <img src="{{ asset('assets/images/trophy.svg')  }}" alt="" class="icon-achievement">
                                </div>
                                <div class="col-md-6 student-text">
                                    <h3>
                                        Top 3 in School
                                    </h3>
                                </div>
                            @else
                                <div class="col-12">
                                    <h3 class="text-center pb-4">No Achievement</h3>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row nav mt-5">
            <div class="col-6 d-flex">
                <a href="{{ route('get.profit') }}" class="nav-item ml-auto active" id="profit">
                    My Profit
                </a>
            </div>
            <div class="col-6">
                <a href="{{ route('get.leaderboard') }}" class="nav-item" id="leaderboard">
                    Leaderboard
                </a>
            </div>
        </div>

        <div class="row mt-4" id="content">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body" id="leaderboard-content">

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script>
        function getProfit(){
            // ajax for put the canvas
            $.ajax({
                url: "{{ route('get.profit') }}",
                success: function(res){
                    $('#leaderboard-content').html(res);

                    $.ajax({
                        url: "{{ route('get.chart') }}",
                        success: function(data){
                            let label = [];
                            let dataset = [];
                            $.each(data, function(key, value){
                                label.push(value.periode);
                                dataset.push(value.detail_profit);
                            });
                            // for chart JS
                            var ctx = document.getElementById('myChart').getContext('2d');
                            var myChart = new Chart(ctx, {
                                type: 'bar',
                                data: {
                                    labels: label,
                                    datasets: [{
                                        label: 'My Profit',
                                        data: dataset,
                                        backgroundColor:[
                                            '#4e8ef5',
                                            '#4ef5d4'
                                        ],
                                        borderColor:'gray',
                                        borderWidth:3,
                                        hoverBorderColor:'black'
                                    }]
                                },
                                options: {
                                    scales: {
                                        yAxes: [{
                                            ticks: {
                                                beginAtZero: true
                                            }
                                        }]
                                    },

                                    title:{
                                        display:true,
                                        text:'My Profit',
                                        fontSize:22
                                    },

                                    legend:{
                                        display:false
                                    }
                                }
                            });
                        }
                    });
                }
            })
        }

        function getLeaderBoard(){
            $.ajax({
                url: "{{ route('get.leaderboard') }}",
                success: function(res){
                    $('#leaderboard-content').html(res);
                }
            });
        }

            // first reload page
        window.onload = function(){
            getProfit();
        };

        $('body').on('click', 'a#profit', function(e){
            e.preventDefault();
            $('a.nav-item').removeClass('active');
            $(this).addClass('active');
            getProfit();
        });

        $('body').on('click', 'a#leaderboard', function(e){
            e.preventDefault();
            $('a.nav-item').removeClass('active');
            $(this).addClass('active');
            getLeaderBoard();
        });
    </script>
@endpush
