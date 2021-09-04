<?php

use Illuminate\Database\Seeder;

class WorkingSectorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $inputs = [
            [
                'name' => 'Banking Professional',
            ],
            [
                'name' => 'Chartered Accountant',
            ],
            [
                'name' => 'Company Secretary',
            ],
            [
                'name' => 'Finance Professional',
            ],
            [
                'name' => 'Investment Professional',
            ],
            [
                'name' => 'Accounting Professional (Others)',
            ],
            [
                'name' => 'Admin Professional',
            ],
            [
                'name' => 'Human Resources Professional',
            ],
            [
                'name' => 'Actor',
            ],
            [
                'name' => 'Advertising Professional',
            ],
            [
                'name' => 'Entertainment Professional',
            ],
            [
                'name' => 'Event Manager',
            ],
            [
                'name' => 'Journalist',
            ],
            [
                'name' => 'Media Professional',
            ],
            [
                'name' => 'Public Relations Professional',
            ],
            [
                'name' => 'Farming',
            ],
            [
                'name' => 'Horticulturist',
            ],
            [
                'name' => 'Agricultural Professional (Others)',
            ],
            [
                'name' => 'Air Hostess / Flight Attendant',
            ],
            [
                'name' => 'Pilot / Co-Pilot',
            ],
            [
                'name' => 'Other Airline Professional',
            ],
            [
                'name' => 'Architect',
            ],
            [
                'name' => 'Interior Designer',
            ],
            [
                'name' => 'Landscape Architect',
            ],
            [
                'name' => 'Animator',
            ],
            [
                'name' => 'Commercial Artist',
            ],
            [
                'name' => 'Web / UX Designers',
            ],
            [
                'name' => 'Artist (Others)',
            ],
            [
                'name' => 'Beautician',
            ],
            [
                'name' => 'Fashion Designer',
            ],
            [
                'name' => 'Hairstylist',
            ],
            [
                'name' => 'Jewellery Designer',
            ],
            [
                'name' => 'Designer (Others)',
            ],
            [
                'name' => 'Customer Support / BPO / KPO Professional',
            ],
            [
                'name' => 'IAS / IRS / IES / IFS',
            ],
            [
                'name' => 'Indian Police Services (IPS)',
            ],
            [
                'name' => 'Law Enforcement Employee (Others)',
            ],
            [
                'name' => 'Airforce',
            ],
            [
                'name' => 'Army',
            ],
            [
                'name' => 'Navy',
            ],
            [
                'name' => 'Defense Services (Others)',
            ],
            [
                'name' => 'Lecturer',
            ],
            [
                'name' => 'Professor',
            ],
            [
                'name' => 'Research Assistant',
            ],
            [
                'name' => 'Research Scholar',
            ],
            [
                'name' => 'Teacher',
            ],
            [
                'name' => 'Training Professional (Others)',
            ],
            [
                'name' => 'Civil Engineer',
            ],   
            [
                'name' => 'Electronics / Telecom Engineer',
            ],
            [
                'name' => 'Mechanical / Production Engineer',
            ],
            [
                'name' => 'Non IT Engineer (Others)',
            ],
            [
                'name' => 'Chef / Sommelier / Food Critic',
            ],
            [
                'name' => 'Catering Professional',
            ],
            [
                'name' => 'Hotel &amp; Hospitality Professional (Others)',
            ],
            [
                'name' => 'Software Developer / Programmer',
            ],
            [
                'name' => 'Software Consultant',
            ],
            [
                'name' => 'Hardware &amp; Networking professional',
            ],
            [
                'name' => 'Software Professional (Others)',
            ],
            [
                'name' => 'Lawyer',
            ],
            [
                'name' => 'Legal Assistant',
            ],
            [
                'name' => 'Legal Professional (Others)',
            ],
            [
                'name' => 'Dentist',
            ],
            [
                'name' => 'Doctor',
            ],
            [
                'name' => 'Medical Transcriptionist',
            ],
            [
                'name' => 'Nurse',
            ],
            [
                'name' => 'Pharmacist',
            ],
            [
                'name' => 'Physician Assistant',
            ],
            [
                'name' => 'Physiotherapist / Occupational Therapist',
            ],
            [
                'name' => 'Psychologist',
            ],
            [
                'name' => 'Surgeon',
            ],
            [
                'name' => 'Veterinary Doctor',
            ],
            [
                'name' => 'Therapist (Others)',
            ],
            [
                'name' => 'Medical / Healthcare Professional (Others)',
            ],
            [
                'name' => 'Merchant Naval Officer',
            ],
            [
                'name' => 'Mariner',
            ],
            [
                'name' => 'Marketing Professional',
            ],
            [
                'name' => 'Sales Professional',
            ],
            [
                'name' => 'Biologist / Botanist',
            ],
            [
                'name' => 'Physicist',
            ],
            [
                'name' => 'Science Professional (Others)',
            ],
            [
                'name' => 'CxO / Chairman / Director / President',
            ],
            [
                'name' => 'VP / AVP / GM / DGM',
            ],
            [
                'name' => 'Sr. Manager / Manager',
            ],
            [
                'name' => 'Consultant / Supervisor / Team Leads',
            ],
            [
                'name' => 'Team Member / Staff',
            ],
            [
                'name' => 'Agent / Broker / Trader / Contractor',
            ],
            [
                'name' => 'Business Owner / Entrepreneur',
            ],
            [
                'name' => 'Politician',
            ],
            [
                'name' => 'Social Worker / Volunteer / NGO',
            ],
            [
                'name' => 'Sportsman',
            ],
            [
                'name' => 'Travel &amp; Transport Professional',
            ],
            [
                'name' => 'Writer',
            ],
            [
                'name' => 'Student',
            ],
            [
                'name' => 'Retired',
            ],
            [
                'name' => 'Not working',
            ],
        
        ];
        foreach ($inputs as $val) {
            \DB::table('working_sectors')->insert($val);
        }
    }
}
