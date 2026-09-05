<?php

use App\Model\Home;
use Illuminate\Database\Seeder;

class HomeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Home::firstOrCreate([], [
            'title' => 'Find Your Perfect Life Partner',
            'image' => 'HomePage_banner.jpg',
        ]);
    }
}
