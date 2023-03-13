<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        DB::table('categories')->truncate();

        $data = [
            'Data Science', 'Technology', 'Programming'
        ];

        foreach ($data as $item) {
            Category::create([
                'slug' => str()->slug($item),
                'name' => $item,
            ]);
        }

        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
