<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Magazine;

class MagazineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach(range(1,1500) as $index) {
            Magazine::create([
                'title' => 'title'.$index,
                'publisher' => 'publisher'.$index,
                'publicationDate'=> '2015-10-25',
                'shelfLocation'=> rand(1, 8),
            ]);
        }
    }
}
