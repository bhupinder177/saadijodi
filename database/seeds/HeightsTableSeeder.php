<?php

use Illuminate\Database\Seeder;

class HeightsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $inputs = [
            [
                'inch' => '4ft 5in',
                'cm' => '',
            ],
            [
                'inch' => '4ft 6in',
                'cm' => '',
            ],
            [
                'inch' => '4ft 7in',
                'cm' => '',
            ],
            [
                'inch' => '4ft 8in',
                'cm' => '',
            ],
            [
                'inch' => '4ft 9in',
                'cm' => '',
            ],
            [
                'inch' => '4ft 10in',
                'cm' => '',
            ],
            [
                'inch' => '4ft 11in',
                'cm' => '',
            ],
            [
                'inch' => '5ft',
                'cm' => '',
            ],
            [
                'inch' => '5ft 1in',
                'cm' => '',
            ],
            [
                'inch' => '5ft 2in',
                'cm' => '',
            ],
            [
                'inch' => '5ft 3in',
                'cm' => '',
            ],
            [
                'inch' => '5ft 4in',
                'cm' => '',
            ],
            [
                'inch' => '5ft 5in',
                'cm' => '',
            ],
            [
                'inch' => '5ft 6in',
                'cm' => '',
            ],
            [
                'inch' => '5ft 7in',
                'cm' => '',
            ],
            [
                'inch' => '5ft 8in',
                'cm' => '',
            ],
            [
                'inch' => '5ft 9in',
                'cm' => '',
            ],
            [
                'inch' => '5ft 10in',
                'cm' => '',
            ],
            [
                'inch' => '5ft 11in',
                'cm' => '',
            ],
            [
                'inch' => '6ft',
                'cm' => '',
            ],
            [
                'inch' => '6ft 1in',
                'cm' => '',
            ],
            [
                'inch' => '6ft 2in',
                'cm' => '',
            ],
            [
                'inch' => '6ft 3in',
                'cm' => '',
            ],
            [
                'inch' => '6ft 4in',
                'cm' => '',
            ],
            [
                'inch' => '6ft 5in',
                'cm' => '',
            ],
            [
                'inch' => '6ft 6in',
                'cm' => '',
            ],
            [
                'inch' => '6ft 7in',
                'cm' => '',
            ],
            [
                'inch' => '6ft 8in',
                'cm' => '',
            ],
            [
                'inch' => '6ft 9in',
                'cm' => '',
            ],
            [
                'inch' => '6ft 10in',
                'cm' => '',
            ],
            [
                'inch' => '6ft 11in',
                'cm' => '',
            ],
            [
                'inch' => '7ft',
                'cm' => '',
            ],
            
        ];
        foreach ($inputs as $val) {
            \DB::table('heights')->insert($val);
        }
    }
}
