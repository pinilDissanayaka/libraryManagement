<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Book;
use Illuminate\Support\Str;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach(range(1,1500) as $index) {
            Book::create([
                'title' => 'title'.$index,
                'author' => 'author'.$index,
                'ISBN'=> 'ISBN'.$index,
                'genre'=> 'genre'.$index,
                'publicationYear'=> 2012,
                'description'=> 'description'.$index,
                'shelfLocation'=> rand(1, 8),
                'status'=> 'Available'
            ]);
        }
    }
}
