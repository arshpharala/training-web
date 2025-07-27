<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DeliveryMethodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $methods = [
            [
                'name' => 'Onsite',
                'shot_description' => 'Xcademia delivers this training at your corporate location for hands-on learning.',
                'icon' => null,
                'position' => 1,
                'is_active' => true,
            ],
            [
                'name' => 'Instructor-Led',
                'shot_description' => 'Live virtual training sessions conducted by certified Xcademia experts.',
                'icon' => null,
                'position' => 2,
                'is_active' => true,
            ],
            [
                'name' => 'Self Paced',
                'shot_description' => 'Pre-recorded training content from Xcademia accessible anytime, anywhere.',
                'icon' => null,
                'position' => 3,
                'is_active' => true,
            ],
            [
                'name' => 'Classroom',
                'shot_description' => 'Traditional classroom learning experience offered at Xcademia centers.',
                'icon' => null,
                'position' => 4,
                'is_active' => true,
            ],
        ];

        foreach ($methods as $method) {
            DB::table('delivery_methods')->insert(array_merge($method, [
                'created_at' => now(),
                'updated_at' => now(),
            ]));
        }
    }
}
