<?php

use Illuminate\Database\Seeder;

class CountriesTableSeeder extends Seeder
{
/**
* Run the database seeds.
*
* @return void
*/
public function run()
{
	DB::table('countries')->delete();
	$countries = array(
		array('id' => 101,'code' => 'IN' ,'name' => "India",'phonecode' => 91,"currencyCode"=>'INR',"currencySymbol"=>'₹',"timezone"=>'GMT+5:30'),
		array('id' => 166,'code' => 'PK' ,'name' => "Pakistan",'phonecode' => 92,"currencyCode"=>'PKR',"currencySymbol"=>'₨',"timezone"=>'GMT+5'),
		array('id' => 18,'code' => 'BD' ,'name' => "Bangladesh",'phonecode' => 880,"currencyCode"=>'BDT',"currencySymbol"=>'৳',"timezone"=>'GMT+6'),
		array('id' => 206,'code' => 'LK' ,'name' => "Sri Lanka",'phonecode' => 94,"currencyCode"=>'LKR',"currencySymbol"=>'₨',"timezone"=>'GMT+5:30'),
		array('id' => 153,'code' => 'NP' ,'name' => "Nepal",'phonecode' => 977,"currencyCode"=>'NPR',"currencySymbol"=>'₨',"timezone"=>'GMT+5:45'),
		array('id' => 229,'code' => 'AE' ,'name' => "United Arab Emirates",'phonecode' => 971,"currencyCode"=>'AED',"currencySymbol"=>'د.إ',"timezone"=>'GMT+4'),
		array('id' => 191,'code' => 'SA' ,'name' => "Saudi Arabia",'phonecode' => 966,"currencyCode"=>'SAR',"currencySymbol"=>'ر.س',"timezone"=>'GMT+3'),
		array('id' => 178,'code' => 'QA' ,'name' => "Qatar",'phonecode' => 974,"currencyCode"=>'QAR',"currencySymbol"=>'ر.ق',"timezone"=>'GMT+3'),
		array('id' => 117,'code' => 'KW' ,'name' => "Kuwait",'phonecode' => 965,"currencyCode"=>'KWD',"currencySymbol"=>'د.ك',"timezone"=>'GMT+3'),
		array('id' => 196,'code' => 'SG','name' => "Singapore",'phonecode' => 65,"currencyCode"=>'SGD',"currencySymbol"=>'$',"timezone"=>'GMT+8'),
		array('id' => 132,'code' => 'MY','name' => "Malaysia",'phonecode' => 60,"currencyCode"=>'MYR',"currencySymbol"=>'RM',"timezone"=>'GMT+8'),
		array('id' => 231,'code' => 'US','name' => "United States",'phonecode' => 1,"currencyCode"=>'USD',"currencySymbol"=>'$',"timezone"=>'GMT-5'),
		array('id' => 38,'code' => 'CA','name' => "Canada",'phonecode' => 1,"currencyCode"=>'CAD',"currencySymbol"=>'$',"timezone"=>'GMT-4'),
		array('id' => 230,'code' => 'GB','name' => "United Kingdom",'phonecode' => 44,"currencyCode"=>'GBP',"currencySymbol"=>'£',"timezone"=>'GMT'),
		array('id' => 13,'code' => 'AU','name' => "Australia",'phonecode' => 61,"currencyCode"=>'AUD',"currencySymbol"=>'$',"timezone"=>'GMT+12'),
		array('id' => 157,'code' => 'NZ','name' => "New Zealand",'phonecode' => 64,"currencyCode"=>'NZD',"currencySymbol"=>'$',"timezone"=>'GMT+13'),
		array('id' => 82,'code' => 'DE','name' => "Germany",'phonecode' => 49,"currencyCode"=>'EUR',"currencySymbol"=>'€',"timezone"=>'GMT+1'),
		array('id' => 75,'code' => 'FR','name' => "France",'phonecode' => 33,"currencyCode"=>'EUR',"currencySymbol"=>'€',"timezone"=>'GMT+1'),
		array('id' => 205,'code' => 'ES','name' => "Spain",'phonecode' => 34,"currencyCode"=>'EUR',"currencySymbol"=>'€',"timezone"=>'GMT+1'),
		array('id' => 107,'code' => 'IT','name' => "Italy",'phonecode' => 39,"currencyCode"=>'EUR',"currencySymbol"=>'€',"timezone"=>'GMT+1'),
		);
		DB::table('countries')->insert($countries);
	}
}
