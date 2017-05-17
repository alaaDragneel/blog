<?php

use Illuminate\Database\Seeder;

use App\Category;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cat = new Category();
        $cat->name = 'phones';
        $cat->save();

        $cat = new Category();
        $cat->name = 'Labtop';
        $cat->save();

        $cat = new Category();
        $cat->name = 'Food';
        $cat->save();
    }
}
