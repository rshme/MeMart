<?php

use Illuminate\Database\Seeder;
use App\CriteriaParentIncome as CPI;

class CriteriaParentIncome extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $parentIncomes = [
            ['amount' => '< Rp.500.000', 'score' => '1.0'],
            ['amount' => 'Rp.500.000 - Rp.1.000.000', 'score' => '0.7'],
            ['amount' => 'Rp.500.000 - Rp.1.000.000', 'score' => '0.5'],
            ['amount' => '> Rp.1.000.000', 'score' => '0.3'],
        ];

        foreach($parentIncomes as $incomes){
            CPI::create($incomes);
        }
    }
}
