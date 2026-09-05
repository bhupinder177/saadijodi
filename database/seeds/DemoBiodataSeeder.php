<?php

use Illuminate\Database\Seeder;
use App\Model\User;
use App\Model\UserBasicDetails;
use App\Model\UserFamilyDetails;
use App\Model\UserEducations;
use App\Model\UserReligious;
use App\Model\UserLocations;
use App\Model\UserContactDetails;
use App\Model\UserBirthDetails;

class DemoBiodataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $religionId = DB::table('religions')->insertGetId(['name' => 'Hindu']);
        DB::table('religions')->insert([
            ['name' => 'Sikh'],
            ['name' => 'Muslim'],
            ['name' => 'Christian'],
            ['name' => 'Jain'],
        ]);

        $motherTongueId = DB::table('mother_tongues')->insertGetId(['name' => 'Hindi']);
        DB::table('mother_tongues')->insert([
            ['name' => 'Punjabi'],
            ['name' => 'English'],
            ['name' => 'Gujarati'],
            ['name' => 'Tamil'],
        ]);

        $khatriCommunityId = DB::table('communities')->insertGetId(['name' => 'Khatri']);
        $aroraCommunityId = DB::table('communities')->insertGetId(['name' => 'Arora']);
        DB::table('communities')->insert([
            ['name' => 'Jat'],
            ['name' => 'Brahmin'],
            ['name' => 'Rajput'],
        ]);

        $btech = DB::table('qualifications')->where('name', 'B.E / B.Tech')->value('id');
        $ma = DB::table('qualifications')->where('name', 'M.A')->value('id');
        $softwareDev = DB::table('working_sectors')->where('name', 'Software Developer / Programmer')->value('id');
        $teacher = DB::table('working_sectors')->where('name', 'Teacher')->value('id');
        $height5ft8 = DB::table('heights')->where('inch', '5ft 8in')->value('id');
        $height5ft4 = DB::table('heights')->where('inch', '5ft 4in')->value('id');
        $india = DB::table('countries')->where('name', 'India')->value('id');
        $punjab = DB::table('states')->where('name', 'Punjab')->where('country_id', $india)->value('id');
        $delhi = DB::table('states')->where('name', 'Delhi')->where('country_id', $india)->value('id');
        $ludhiana = DB::table('cities')->where('name', 'Ludhiana')->where('state_id', $punjab)->value('id');
        $newDelhi = DB::table('cities')->where('name', 'New Delhi')->where('state_id', $delhi)->value('id');

        $last = User::orderby('id', 'desc')->first();
        $uniqueNo = !empty($last->uniqueNo) ? $last->uniqueNo + 1 : 1111;

        // Groom
        $groom = User::create([
            'firstName' => 'Arjun',
            'lastName' => 'Sharma',
            'email' => 'arjun.sharma@example.com',
            'password' => bcrypt('password'),
            'phone' => '9876543210',
            'type' => 2,
            'status' => 1,
            'uniqueId' => 'AB' . $uniqueNo,
            'uniqueNo' => $uniqueNo,
            'profileUpdate' => 1,
        ]);

        UserBasicDetails::create([
            'userId' => $groom->id,
            'gender' => 1,
            'dateOfBirth' => '1996-05-14',
            'height' => $height5ft8,
            'maritalStatus' => 1,
            'bloodGroup' => 'B+',
            'diet' => 2,
            'profileCreatedBy' => 1,
            'about' => 'Software engineer working in Bangalore, looking for a caring and like-minded life partner.',
        ]);

        UserFamilyDetails::create([
            'userId' => $groom->id,
            'fatherStatus' => 1,
            'motherStatus' => 4,
            'familyLocation' => 'Ludhiana, Punjab',
            'nativePlace' => 'Ludhiana, Punjab',
            'sibling' => 1,
            'familyType' => 2,
        ]);

        UserEducations::create([
            'userId' => $groom->id,
            'highestQualification' => $btech,
            'workingWith' => 1,
            'workingAs' => $softwareDev,
            'employerName' => 'Infosys Ltd',
            'income' => 4,
        ]);

        UserReligious::create([
            'userId' => $groom->id,
            'religion' => $religionId,
            'motherTongue' => $motherTongueId,
            'community' => $khatriCommunityId,
        ]);

        UserLocations::create([
            'userId' => $groom->id,
            'country' => $india,
            'state' => $punjab,
            'city' => $ludhiana,
            'pincode' => '141001',
        ]);

        UserContactDetails::create([
            'userId' => $groom->id,
            'mobile' => '9876543210',
            'nameContactPerson' => 'Rakesh Sharma',
            'relationWithMember' => 'Father',
        ]);

        UserBirthDetails::create([
            'userId' => $groom->id,
            'birthCountry' => $india,
            'birthCity' => 'Ludhiana',
            'manglik' => 2,
        ]);

        // Bride
        $bride = User::create([
            'firstName' => 'Priya',
            'lastName' => 'Verma',
            'email' => 'priya.verma@example.com',
            'password' => bcrypt('password'),
            'phone' => '9876500000',
            'type' => 2,
            'status' => 1,
            'uniqueId' => 'AB' . ($uniqueNo + 1),
            'uniqueNo' => $uniqueNo + 1,
            'profileUpdate' => 1,
        ]);

        UserBasicDetails::create([
            'userId' => $bride->id,
            'gender' => 2,
            'dateOfBirth' => '1998-08-22',
            'height' => $height5ft4,
            'maritalStatus' => 1,
            'bloodGroup' => 'O+',
            'diet' => 1,
            'profileCreatedBy' => 2,
            'about' => 'School teacher based in New Delhi, family-oriented and looking for a well-settled partner.',
        ]);

        UserFamilyDetails::create([
            'userId' => $bride->id,
            'fatherStatus' => 2,
            'motherStatus' => 4,
            'familyLocation' => 'New Delhi',
            'nativePlace' => 'New Delhi',
            'sibling' => 2,
            'familyType' => 1,
        ]);

        UserEducations::create([
            'userId' => $bride->id,
            'highestQualification' => $ma,
            'workingWith' => 2,
            'workingAs' => $teacher,
            'employerName' => 'Delhi Public School',
            'income' => 3,
        ]);

        UserReligious::create([
            'userId' => $bride->id,
            'religion' => $religionId,
            'motherTongue' => $motherTongueId,
            'community' => $aroraCommunityId,
        ]);

        UserLocations::create([
            'userId' => $bride->id,
            'country' => $india,
            'state' => $delhi,
            'city' => $newDelhi,
            'pincode' => '110001',
        ]);

        UserContactDetails::create([
            'userId' => $bride->id,
            'mobile' => '9876500000',
            'nameContactPerson' => 'Sunita Verma',
            'relationWithMember' => 'Mother',
        ]);

        UserBirthDetails::create([
            'userId' => $bride->id,
            'birthCountry' => $india,
            'birthCity' => 'New Delhi',
            'manglik' => 3,
        ]);
    }
}
