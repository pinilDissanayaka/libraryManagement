<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\NewsPaper;

class NewsPaperSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach(range(1,1500) as $index) {
            NewsPaper::create([
                'title' => 'title'.$index,
                'publisher' => 'publisher'.$index,
                'publicationDate'=> '2012-12-05',
                'shelfLocation'=> rand(1, 8),
            ]);
        }
    }
}
