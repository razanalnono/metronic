<?php

namespace Database\Seeders;

use App\Models\Category ;
// use Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
            Category::create([
                'name' => ['en' => 'Clothes', 'ar' => 'ملابس'],
                'slug' => 'category71' ,
            ]);


        Category::create([
            'name' => ['en' => 'Clothes', 'ar' => 'ملابس'],
            'slug' => 'category13',
        ]);


        Category::create([
            'name' => ['en' => 'Clothes', 'ar' => 'ملابس'],
            'slug' => 'category14',
        ]);


        Category::create([
            'name' => ['en' => 'Clothes', 'ar' => 'ملابس'],
            'slug' => 'category15',
        ]);
        
    }
}