<?php

use Illuminate\Database\Seeder;
use App\CriteriaParent as CP;

class CriteriaParent extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $parents = [
            ['type' => 'Yatim Piatu', 'score' => '1.0'],
            ['type' => 'Yatim', 'score' => '0.7'],
            ['type' => 'Piatu', 'score' => '0.5'],
            ['type' => 'Lengkap', 'score' => '0.3'],
        ];

        foreach($parents as $parent){
            CP::create($parent);
        }
    }
}
