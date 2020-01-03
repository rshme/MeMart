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
            ['value' => 'Yatim Piatu', 'score' => '1.0'],
            ['value' => 'Yatim', 'score' => '0.7'],
            ['value' => 'Piatu', 'score' => '0.5'],
            ['value' => 'Lengkap', 'score' => '0.3'],
        ];

        foreach($parents as $parent){
            CP::create($parent);
        }
    }
}
