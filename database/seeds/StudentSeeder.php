<?php

use Illuminate\Database\Seeder;
use App\Student;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $students = [
            [
                'nis' => '11700477',
                'fullname' => 'Zahra Maharani',
                'room_id' => 2,
                'no_phone' => '088786886574',
                'gender' => 'P',
                'address' => 'Pagaden Barat'
            ],
            [
                'nis' => '11700475',
                'fullname' => 'Fauzan Fadilah',
                'room_id' => 2,
                'no_phone' => '088786886534',
                'gender' => 'L',
                'address' => 'Cikondang'
            ],
            [
                'nis' => '11700277',
                'fullname' => 'Jajang Peri',
                'room_id' => 2,
                'no_phone' => '088786456574',
                'gender' => 'L',
                'address' => 'Pintu Uyuh'
            ],
        ];

        foreach($students as $student){
            Student::create($student);
        }
    }
}
