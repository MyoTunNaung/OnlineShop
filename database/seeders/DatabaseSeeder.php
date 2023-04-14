<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        \App\Models\Category::factory()->create([
            'name_eng'      => 'Computer',
            'name_unicode'  => 'ကွန်ပျူတာ',
            'photo'         => '1.jpg',
            'remark'        => ''
         ]);

        \App\Models\Category::factory()->create([
            'name_eng'      => 'Phone',
            'name_unicode'  => 'ဖုန်း',
            'photo'         => '2.jpg',
            'remark'        => 'buy it!'
         ]);

        \App\Models\Item::factory()->create([
            'category_id'   => '1',
            'name_eng'      => 'Acer i5',
            'name_unicode'  => 'အေဆာ လက်တော့ပ်',
            'photo'         => '4.jpg',
            'remark'        => 'ဝယ်ယူပါ!'
         ]);

        \App\Models\Product::factory()->create([
            'category_id'   => '1',
            'item_id'       => '1',
            'name_eng'      => 'Acer i5 white',
            'name_unicode'  => 'အေဆာ လက်တော့ပ်အဖြူ',
            'photo1'         => '1.jpg',
            'photo2'         => '2.jpg',
            'photo3'         => '4.jpg',
            'photo4'         => '5.jpg',
            'price'         => 5000,
            'qty'           => 10,
            'remark'        => 'အဖြူရောင်'
         ]);

        \App\Models\Product::factory()->create([
            'category_id'   => '1',
            'item_id'       => '1',
            'name_eng'      => 'Acer i5 white',
            'name_unicode'  => 'အေဆာ လက်တော့ပ်အဖြူ',
            'photo1'         => '1.jpg',
            'photo2'         => '2.jpg',
            'photo3'         => '4.jpg',
            'photo4'         => '5.jpg',
            'price'         => 7000,
            'qty'           => 5,
            'remark'        => 'အဖြူရောင်'
         ]);
    

    }
}
