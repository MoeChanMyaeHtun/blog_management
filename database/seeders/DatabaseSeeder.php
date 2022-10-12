<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Admin;
use App\Models\Category;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        //Admin
        // Admin::create([
        //         'name'=>'Admin',
        //         'email'=>'admin@gmail.com',
        //         'phone'=>'09987456123',
        //         'address'=>'Mdy',
        //         'password'=>'admin1234',

        // ]);
        //category
        Category::create([

            'name' => 'Samsung Phone',

        ]);

        Category::create([

            'name' => 'Samsung Tablet',

        ]);

        Category::create([

            'name' => 'Samsung Laptop',

        ]);

        Category::create([

            'name' => 'mac book',

        ]);

        Category::create([

            'name' => 'iphone',

        ]);

        Category::create([

            'name' => 'ipad',

        ]);

        Category::create([

            'name' => 'iwatch',

        ]);
        Category::create([

            'name' => 'Asus laptop',

        ]);
        Category::create([

            'name' => 'Acer Laptop',

        ]);


    }
}
