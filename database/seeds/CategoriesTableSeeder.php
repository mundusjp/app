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
        $c1 = new Category;
        $c1->category = "books";
        $c1->save();

        $c2 = new Category;
        $c2->category = "games";
        $c2->save();

        $c3 = new Category;
        $c3->category = "other";
        $c3->save();
    }
}
