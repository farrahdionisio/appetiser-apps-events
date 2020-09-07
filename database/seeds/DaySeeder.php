<?php

use Illuminate\Database\Seeder;
use App\Day;
use Carbon\Carbon;

class DaySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $timestamp = Carbon::now();
        $days = [
            [
                'name' => 'Mon',
                'created_at' => $timestamp,
            ],
            [
                'name' => 'Tue',
                'created_at' => $timestamp,
            ],
            [
                'name' => 'Wed',
                'created_at' => $timestamp,
            ],
            [
                'name' => 'Thu',
                'created_at' => $timestamp,
            ],
            [
                'name' => 'Fri',
                'created_at' => $timestamp,
            ],
            [
                'name' => 'Sat',
                'created_at' => $timestamp,
            ],
            [
                'name' => 'Sun',
                'created_at' => $timestamp,
            ],
        ];
        
        Day::insert($days);   
    }
}
