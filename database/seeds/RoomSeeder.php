<?php

use Illuminate\Database\Seeder;
use App\Room;

class RoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rooms = [
            [
                'name' => 'XII RPL I'
            ],
            [
                'name' => 'XII RPL II'
            ],
            [
                'name' => 'XII TKJ I'
            ],
            [
                'name' => 'XII TKJ II'
            ],
        ];

        foreach($rooms as $room){
            Room::create($room);
        }
    }
}
