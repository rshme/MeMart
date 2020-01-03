<?php

use Illuminate\Database\Seeder;
use App\CriteriaOther as CO;

class CriteriaOther extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $others = [
            ['value' => 'Korban Bencana', 'score' => '1.0'],
            ['value' => 'Kelainan Fisik', 'score' => '0.7'],
            ['value' => 'Normal', 'score' => '0.5'],
        ];

        foreach($others as $other){
            CO::create($other);
        }
    }
}
