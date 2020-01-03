<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(RoomSeeder::class);
        $this->call(StudentSeeder::class);
        $this->call(ProfitSeeder::class);
        $this->call(CriteriaParent::class);
        $this->call(CriteriaParentIncome::class);
        $this->call(CriteriaOther::class);
    }
}
