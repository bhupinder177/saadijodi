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

class DemoBiodataBulkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $india = DB::table('countries')->where('name', 'India')->value('id');

        $religion = [
            'hindu' => DB::table('religions')->where('name', 'Hindu')->value('id'),
            'sikh' => DB::table('religions')->where('name', 'Sikh')->value('id'),
            'muslim' => DB::table('religions')->where('name', 'Muslim')->value('id'),
        ];
        $tongue = [
            'hindi' => DB::table('mother_tongues')->where('name', 'Hindi')->value('id'),
            'punjabi' => DB::table('mother_tongues')->where('name', 'Punjabi')->value('id'),
            'gujarati' => DB::table('mother_tongues')->where('name', 'Gujarati')->value('id'),
            'tamil' => DB::table('mother_tongues')->where('name', 'Tamil')->value('id'),
            'english' => DB::table('mother_tongues')->where('name', 'English')->value('id'),
        ];
        $community = [
            'khatri' => DB::table('communities')->where('name', 'Khatri')->value('id'),
            'arora' => DB::table('communities')->where('name', 'Arora')->value('id'),
            'jat' => DB::table('communities')->where('name', 'Jat')->value('id'),
            'brahmin' => DB::table('communities')->where('name', 'Brahmin')->value('id'),
            'rajput' => DB::table('communities')->where('name', 'Rajput')->value('id'),
        ];
        $qual = [
            'ba' => DB::table('qualifications')->where('name', 'B.A')->value('id'),
            'bcom' => DB::table('qualifications')->where('name', 'B.Com')->value('id'),
            'ca' => DB::table('qualifications')->where('name', 'CA / CPA')->value('id'),
            'mca' => DB::table('qualifications')->where('name', 'MCA')->value('id'),
            'bsc' => DB::table('qualifications')->where('name', 'B.Sc')->value('id'),
            'msc' => DB::table('qualifications')->where('name', 'M.Sc')->value('id'),
            'mbbs' => DB::table('qualifications')->where('name', 'MBBS')->value('id'),
            'mba' => DB::table('qualifications')->where('name', 'MBA')->value('id'),
        ];
        $sector = [
            'banking' => DB::table('working_sectors')->where('name', 'Banking Professional')->value('id'),
            'ca' => DB::table('working_sectors')->where('name', 'Chartered Accountant')->value('id'),
            'civil' => DB::table('working_sectors')->where('name', 'Civil Engineer')->value('id'),
            'lawyer' => DB::table('working_sectors')->where('name', 'Lawyer')->value('id'),
            'doctor' => DB::table('working_sectors')->where('name', 'Doctor')->value('id'),
            'nurse' => DB::table('working_sectors')->where('name', 'Nurse')->value('id'),
            'manager' => DB::table('working_sectors')->where('name', 'Sr. Manager / Manager')->value('id'),
            'business' => DB::table('working_sectors')->where('name', 'Business Owner / Entrepreneur')->value('id'),
            'software' => DB::table('working_sectors')->where('name', 'Software Developer / Programmer')->value('id'),
        ];
        $height = [];
        foreach (['5ft 2in', '5ft 3in', '5ft 5in', '5ft 6in', '5ft 7in', '5ft 9in', '5ft 10in'] as $h) {
            $height[$h] = DB::table('heights')->where('inch', $h)->value('id');
        }

        $city = function ($name, $stateName) use ($india) {
            $stateId = DB::table('states')->where('name', $stateName)->where('country_id', $india)->value('id');
            $cityId = DB::table('cities')->where('name', $name)->where('state_id', $stateId)->value('id');
            return [$stateId, $cityId];
        };

        [$maharashtraId, $mumbaiId] = $city('Mumbai', 'Maharashtra');
        [$haryanaId, $gurgaonId] = $city('Gurgaon', 'Haryana');
        [$karnatakaId, $bengaluruId] = $city('Bengaluru', 'Karnataka');
        [$tamilNaduId, $chennaiId] = $city('Chennai', 'Tamil Nadu');
        [$upId, $lucknowId] = $city('Lucknow', 'Uttar Pradesh');
        [$gujaratId, $ahmedabadId] = $city('Ahmedabad', 'Gujarat');
        [$rajasthanId, $jaipurId] = $city('Jaipur', 'Rajasthan');

        $boys = [
            [
                'firstName' => 'Rohan', 'lastName' => 'Mehta', 'phone' => '9800000001',
                'dob' => '1995-03-10', 'height' => $height['5ft 9in'], 'diet' => 2, 'bloodGroup' => 'A+',
                'religion' => $religion['hindu'], 'tongue' => $tongue['gujarati'], 'community' => $community['brahmin'],
                'qual' => $qual['mba'], 'workingWith' => 4, 'sector' => $sector['business'], 'employer' => 'Self Employed', 'income' => 5,
                'state' => $gujaratId, 'city' => $ahmedabadId, 'pincode' => '380001', 'fatherStatus' => 2, 'motherStatus' => 4,
                'familyType' => 1, 'sibling' => 2, 'manglik' => 2, 'contact' => 'Suresh Mehta', 'relation' => 'Father',
            ],
            [
                'firstName' => 'Karan', 'lastName' => 'Singh', 'phone' => '9800000002',
                'dob' => '1994-11-02', 'height' => $height['5ft 10in'], 'diet' => 1, 'bloodGroup' => 'O+',
                'religion' => $religion['sikh'], 'tongue' => $tongue['punjabi'], 'community' => $community['jat'],
                'qual' => $qual['bcom'], 'workingWith' => 1, 'sector' => $sector['banking'], 'employer' => 'HDFC Bank', 'income' => 4,
                'state' => $haryanaId, 'city' => $gurgaonId, 'pincode' => '122001', 'fatherStatus' => 3, 'motherStatus' => 4,
                'familyType' => 2, 'sibling' => 1, 'manglik' => 1, 'contact' => 'Gurpreet Singh', 'relation' => 'Father',
            ],
            [
                'firstName' => 'Aditya', 'lastName' => 'Rao', 'phone' => '9800000003',
                'dob' => '1997-06-18', 'height' => $height['5ft 7in'], 'diet' => 1, 'bloodGroup' => 'B+',
                'religion' => $religion['hindu'], 'tongue' => $tongue['english'], 'community' => $community['brahmin'],
                'qual' => $qual['mca'], 'workingWith' => 1, 'sector' => $sector['software'], 'employer' => 'Wipro Technologies', 'income' => 4,
                'state' => $karnatakaId, 'city' => $bengaluruId, 'pincode' => '560001', 'fatherStatus' => 1, 'motherStatus' => 1,
                'familyType' => 2, 'sibling' => 1, 'manglik' => 3, 'contact' => 'Suresh Rao', 'relation' => 'Father',
            ],
            [
                'firstName' => 'Vikram', 'lastName' => 'Nair', 'phone' => '9800000004',
                'dob' => '1993-09-25', 'height' => $height['5ft 6in'], 'diet' => 2, 'bloodGroup' => 'AB+',
                'religion' => $religion['hindu'], 'tongue' => $tongue['tamil'], 'community' => $community['rajput'],
                'qual' => $qual['mbbs'], 'workingWith' => 1, 'sector' => $sector['doctor'], 'employer' => 'Apollo Hospitals', 'income' => 5,
                'state' => $tamilNaduId, 'city' => $chennaiId, 'pincode' => '600001', 'fatherStatus' => 4, 'motherStatus' => 4,
                'familyType' => 1, 'sibling' => 3, 'manglik' => 2, 'contact' => 'Mohan Nair', 'relation' => 'Father',
            ],
            [
                'firstName' => 'Faizan', 'lastName' => 'Ahmed', 'phone' => '9800000005',
                'dob' => '1996-01-15', 'height' => $height['5ft 6in'], 'diet' => 2, 'bloodGroup' => 'B-',
                'religion' => $religion['muslim'], 'tongue' => $tongue['hindi'], 'community' => null,
                'qual' => $qual['ba'], 'workingWith' => 1, 'sector' => $sector['lawyer'], 'employer' => 'Ahmed & Associates', 'income' => 3,
                'state' => $upId, 'city' => $lucknowId, 'pincode' => '226001', 'fatherStatus' => 2, 'motherStatus' => 4,
                'familyType' => 2, 'sibling' => 2, 'manglik' => 3, 'contact' => 'Imran Ahmed', 'relation' => 'Father',
            ],
        ];

        $girls = [
            [
                'firstName' => 'Sneha', 'lastName' => 'Patel', 'phone' => '9800000011',
                'dob' => '1999-04-12', 'height' => $height['5ft 3in'], 'diet' => 1, 'bloodGroup' => 'A+',
                'religion' => $religion['hindu'], 'tongue' => $tongue['gujarati'], 'community' => $community['brahmin'],
                'qual' => $qual['bsc'], 'workingWith' => 1, 'sector' => $sector['nurse'], 'employer' => 'Civil Hospital Ahmedabad', 'income' => 2,
                'state' => $gujaratId, 'city' => $ahmedabadId, 'pincode' => '380001', 'fatherStatus' => 1, 'motherStatus' => 4,
                'familyType' => 1, 'sibling' => 1, 'manglik' => 2, 'contact' => 'Kiran Patel', 'relation' => 'Mother',
            ],
            [
                'firstName' => 'Simran', 'lastName' => 'Kaur', 'phone' => '9800000012',
                'dob' => '1997-07-30', 'height' => $height['5ft 5in'], 'diet' => 1, 'bloodGroup' => 'O+',
                'religion' => $religion['sikh'], 'tongue' => $tongue['punjabi'], 'community' => $community['jat'],
                'qual' => $qual['mba'], 'workingWith' => 1, 'sector' => $sector['manager'], 'employer' => 'ICICI Bank', 'income' => 4,
                'state' => $haryanaId, 'city' => $gurgaonId, 'pincode' => '122001', 'fatherStatus' => 1, 'motherStatus' => 4,
                'familyType' => 2, 'sibling' => 1, 'manglik' => 1, 'contact' => 'Harpreet Kaur', 'relation' => 'Mother',
            ],
            [
                'firstName' => 'Ananya', 'lastName' => 'Iyer', 'phone' => '9800000013',
                'dob' => '1998-12-05', 'height' => $height['5ft 2in'], 'diet' => 1, 'bloodGroup' => 'B+',
                'religion' => $religion['hindu'], 'tongue' => $tongue['tamil'], 'community' => $community['brahmin'],
                'qual' => $qual['mbbs'], 'workingWith' => 1, 'sector' => $sector['doctor'], 'employer' => 'Fortis Chennai', 'income' => 4,
                'state' => $tamilNaduId, 'city' => $chennaiId, 'pincode' => '600001', 'fatherStatus' => 1, 'motherStatus' => 1,
                'familyType' => 1, 'sibling' => 2, 'manglik' => 3, 'contact' => 'Ganesh Iyer', 'relation' => 'Father',
            ],
            [
                'firstName' => 'Divya', 'lastName' => 'Reddy', 'phone' => '9800000014',
                'dob' => '1999-02-20', 'height' => $height['5ft 5in'], 'diet' => 2, 'bloodGroup' => 'AB+',
                'religion' => $religion['hindu'], 'tongue' => $tongue['english'], 'community' => $community['rajput'],
                'qual' => $qual['mca'], 'workingWith' => 1, 'sector' => $sector['software'], 'employer' => 'Infosys Ltd', 'income' => 4,
                'state' => $karnatakaId, 'city' => $bengaluruId, 'pincode' => '560001', 'fatherStatus' => 3, 'motherStatus' => 4,
                'familyType' => 2, 'sibling' => 1, 'manglik' => 2, 'contact' => 'Srinivas Reddy', 'relation' => 'Father',
            ],
            [
                'firstName' => 'Fatima', 'lastName' => 'Sheikh', 'phone' => '9800000015',
                'dob' => '1996-10-08', 'height' => $height['5ft 3in'], 'diet' => 2, 'bloodGroup' => 'A-',
                'religion' => $religion['muslim'], 'tongue' => $tongue['hindi'], 'community' => null,
                'qual' => $qual['ca'], 'workingWith' => 1, 'sector' => $sector['ca'], 'employer' => 'Deloitte India', 'income' => 4,
                'state' => $rajasthanId, 'city' => $jaipurId, 'pincode' => '302001', 'fatherStatus' => 2, 'motherStatus' => 4,
                'familyType' => 1, 'sibling' => 2, 'manglik' => 3, 'contact' => 'Yusuf Sheikh', 'relation' => 'Father',
            ],
        ];

        $this->createUsers($boys, 1, $india);
        $this->createUsers($girls, 2, $india);
    }

    private function createUsers(array $people, int $gender, int $india)
    {
        foreach ($people as $p) {
            $last = User::orderby('id', 'desc')->first();
            $uniqueNo = !empty($last->uniqueNo) ? $last->uniqueNo + 1 : 1111;

            $user = User::create([
                'firstName' => $p['firstName'],
                'lastName' => $p['lastName'],
                'email' => strtolower($p['firstName'] . '.' . $p['lastName'] . '@example.com'),
                'password' => bcrypt('password'),
                'phone' => $p['phone'],
                'type' => 2,
                'status' => 1,
                'uniqueId' => 'AB' . $uniqueNo,
                'uniqueNo' => $uniqueNo,
                'profileUpdate' => 1,
            ]);

            UserBasicDetails::create([
                'userId' => $user->id,
                'gender' => $gender,
                'dateOfBirth' => $p['dob'],
                'height' => $p['height'],
                'maritalStatus' => 1,
                'bloodGroup' => $p['bloodGroup'],
                'diet' => $p['diet'],
                'profileCreatedBy' => 1,
                'about' => $p['firstName'] . ' is looking for a compatible life partner with similar values and outlook towards life.',
            ]);

            $placeName = DB::table('cities')->where('id', $p['city'])->value('name');

            UserFamilyDetails::create([
                'userId' => $user->id,
                'fatherStatus' => $p['fatherStatus'],
                'motherStatus' => $p['motherStatus'],
                'familyLocation' => $placeName,
                'nativePlace' => $placeName,
                'sibling' => $p['sibling'],
                'familyType' => $p['familyType'],
            ]);

            UserEducations::create([
                'userId' => $user->id,
                'highestQualification' => $p['qual'],
                'workingWith' => $p['workingWith'],
                'workingAs' => $p['sector'],
                'employerName' => $p['employer'],
                'income' => $p['income'],
            ]);

            UserReligious::create([
                'userId' => $user->id,
                'religion' => $p['religion'],
                'motherTongue' => $p['tongue'],
                'community' => $p['community'],
            ]);

            UserLocations::create([
                'userId' => $user->id,
                'country' => $india,
                'state' => $p['state'],
                'city' => $p['city'],
                'pincode' => $p['pincode'],
            ]);

            UserContactDetails::create([
                'userId' => $user->id,
                'mobile' => $p['phone'],
                'nameContactPerson' => $p['contact'],
                'relationWithMember' => $p['relation'],
            ]);

            UserBirthDetails::create([
                'userId' => $user->id,
                'birthCountry' => $india,
                'birthCity' => $placeName,
                'manglik' => $p['manglik'],
            ]);
        }
    }
}
