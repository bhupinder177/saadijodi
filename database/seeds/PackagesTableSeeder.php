<?php

use Illuminate\Database\Seeder;
use App\Model\Package;

class PackagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $packages = [
            [
                'name' => 'Silver',
                'price' => 999,
                'duration' => 3,
                'chat' => 1,
                'connects' => 15,
                'phoneNumberDisplay' => 0,
                'description' => '<li>15 connects to send interest</li><li>Unlimited chat with your matches</li><li>Valid for 3 months</li><li>Basic customer support</li>',
            ],
            [
                'name' => 'Gold',
                'price' => 2499,
                'duration' => 4,
                'chat' => 1,
                'connects' => 50,
                'phoneNumberDisplay' => 1,
                'description' => '<li>50 connects to send interest</li><li>Unlimited chat with your matches</li><li>View contact numbers of matches</li><li>Valid for 6 months</li><li>Priority customer support</li>',
            ],
            [
                'name' => 'Platinum',
                'price' => 4999,
                'duration' => 5,
                'chat' => 1,
                'connects' => 150,
                'phoneNumberDisplay' => 1,
                'description' => '<li>150 connects to send interest</li><li>Unlimited chat with your matches</li><li>View contact numbers of matches</li><li>Valid for 12 months</li><li>Dedicated relationship manager</li><li>Profile highlighted in search results</li>',
            ],
            [
                'name' => 'Lifetime',
                'price' => 9999,
                'duration' => 6,
                'chat' => 1,
                'connects' => 999,
                'phoneNumberDisplay' => 1,
                'description' => '<li>Unlimited connects to send interest</li><li>Unlimited chat with your matches</li><li>View contact numbers of matches</li><li>Lifetime validity</li><li>Dedicated relationship manager</li><li>Profile highlighted in search results</li>',
            ],
        ];

        foreach ($packages as $package) {
            Package::create($package);
        }
    }
}
