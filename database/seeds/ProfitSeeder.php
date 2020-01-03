<?php

use Illuminate\Database\Seeder;
use App\Profit;

class ProfitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $profits = [
            ['value' => '< Rp.100.000', 'score' => '0.5'],
            ['value' => '>= Rp.100.000', 'score' => '0.7'],
        ];

        foreach($profits as $profit){
            Profit::create($profit);
        }
    }
}
