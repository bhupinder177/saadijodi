<?php

use Illuminate\Database\Seeder;
use App\Model\UserImages;

class DemoBiodataImagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $userIds = [2, 3, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14];

        foreach ($userIds as $userId) {
            $filename = "user{$userId}_profile.jpg";
            if (!file_exists(public_path('profiles/' . $filename))) {
                continue;
            }

            UserImages::updateOrCreate(
                ['userId' => $userId, 'isProfile' => 1],
                ['image' => $filename]
            );
        }
    }
}
