<div class="row mb-1">
    <div class="col-md-4">
        <h5>Nama Lengkap : </h5>
    </div>
    <div class="col-md-8">
        {{ $student->student->fullname }}
    </div>
</div>

<div class="row mb-1">
    <div class="col-md-4">
        <h5>Kelas : </h5>
    </div>
    <div class="col-md-8">
        {{ \App\Room::whereId($student->student->room_id)->first()['name'] }}
    </div>
</div>

<div class="row mb-1">
    <div class="col-md-4">
        <h5>Omset : </h5>
    </div>
    <div class="col-md-8">
        Rp. {{ number_format($student->detail_profit, 0, '', '.') }}
    </div>
</div>
