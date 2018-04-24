<?php

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
//        $p1 = [
//
//            'name'=>'Learn to Build websites using HTML5',
//            'image'=>'uploads/products/book.png',
//            'price'=> 5000,
//            'description'=>'sunt in culpa qui officia deserunt mollit anim id est laborum.'
//        ];
//
//        $p2 = [
//
//            'name'=>'PHP In DEPTH',
//            'image'=>'uploads/products/book.png',
//            'price'=> 5000,
//            'description'=>'sunt in culpa qui officia deserunt mollit anim id est laborum.'
//        ];
//
//        \App\Product::create($p1);
//        \App\Product::create($p2);

        factory(\App\Product::class,30)->create();

    }
}
