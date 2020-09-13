<?php

use Illuminate\Database\Seeder;
use \App\Models\Region;
use \App\Models\Country;

class CountryRegionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $countries = [
            'USA' => [
                'region_naming' => 'State',
                'regions' => [
                    'Alabama',' Alaska',' Arizona',' Arkansas',' California',' Colorado',' Connecticut',' Delaware',' Florida',' Georgia',' Hawaii',' Idaho',' Illinois',' Indiana',' Iowa',' Kansas',' Kentucky',' Louisiana',' Maine',' Maryland',' Massachusetts',' Michigan',' Minnesota',' Mississippi',' Missouri',' Montana',' Nebraska',' Nevada',' New Hampshire',' New Jersey',' New Mexico',' New York',' North Carolina',' North Dakota',' Ohio',' Oklahoma',' Oregon',' Pennsylvania',' Rhode Island',' South Carolina',' South Dakota',' Tennessee',' Texas',' Utah',' Vermont',' Virginia',' Washington',' West Virginia',' Wisconsin',' Wyoming',
                ]
            ],
            'Australia' => [
                'region_naming' => 'State',
                'regions' => [
                    'Queensland',' New South Wales',' Australian Capital Territory',' Victoria',' South Australia',' Western Australia',' Tasmania',' Northern Territory',
                ]
            ],
            'United Kingdom' => [
                'region_naming' => 'Region',
                'regions' => [
                    'South East',' London',' North West',' East of England',' West Midlands',' South West',' Yorkshire and the Humber',' East Midlands',' North East',
                ]
            ],
            'India' => [
                'region_naming' => 'State',
                'regions' => [
                    'Andhra Pradesh',' Arunachal Pradesh',' Assam',' Bihar',' Chhattisgarh',' Goa',' Gujarat',' Haryana',' Himachal Pradesh',' Jharkhand',' Karnataka',' Kerala',' Madhya Pradesh',' Maharashtra',' Manipur',' Meghalaya',' Mizoram',' Nagaland',' Odisha',' Punjab',' Rajasthan',' Sikkim',' Tamil Nadu',' Telangana',' Tripura',' Uttar Pradesh',' Uttarakhand',' West Bengal',
                ]
            ],
            'Canada' => [
                'region_naming' => 'Province',
                'regions' => [
                    'Alberta',' British Columbia',' Manitoba',' New Brunswick',' Newfoundland and Labrador',' Northwest Territories',' Nova Scotia',' Nunavut',' Ontario',' Prince Edward Island',' Quebec',' Saskatchewan',
                ]
            ],
            'China' => [
                'region_naming' => 'Province',
                'regions' => [
                    'Anhui',' Fujian',' Gansu',' Guangdong',' Guizhou',' Hainan',' Hebei',' Heilongjiang',' Henan',' Hubei',' Hunan',' Jiangsu',' Jiangxi',' Jilin',' Liaoning',' Qinghai',' Shaanxi',' Shandong',' Shanxi',' Sichuan',' Yunnan',' Zhejiang',' Guangxi',' Inner Mongolia',' Ningxia ',' Xinjiang ',' Tibet ',' Beijing',' Chongqing',' Shanghai',' Tianjin',' Hong Kong',' Macau',
                ]
            ],
            'Pakistan' => [
                'region_naming' => 'Province',
                'regions' => [
                    'Sindh',' Punjab',' Khyber Pakhtunkhwa',' Islamabad Capital Territory',' Gilgit-Baltistan',' Balochistan',' Azad Kashmir',
                ]
            ],
            'South Africa' => [
                'region_naming' => 'Province',
                'regions' => [
                    'Eastern Cape',' Free State',' Gauteng',' KwaZulu-Natal',' Limpopo',' Mpumalanga',' North West',' Northern Cape',' Western Cape',
                ]
            ],
            'Afghanistan' => [], 'Albania' => [], 'Algeria' => [], 'American Samoa' => [], 'Andorra' => [], 'Angola' => [], 'Anguilla' => [], 'Antigua and Barbuda' => [], 'Argentina' => [], 'Armenia' => [], 'Aruba' => [], 'Austria' => [], 'Azerbaijan' => [], 'Bangladesh' => [], 'Barbados' => [], 'Bahamas' => [], 'Bahrain' => [], 'Belarus' => [], 'Belgium' => [], 'Belize' => [], 'Benin' => [], 'Bermuda' => [], 'Bhutan' => [], 'Bolivia' => [], 'Bosnia and Herzegovina' => [], 'Botswana' => [], 'Brazil' => [], 'British Indian Ocean Territory' => [], 'British Virgin Islands' => [], 'Brunei Darussalam' => [], 'Bulgaria' => [], 'Burkina Faso' => [], 'Burma' => [], 'Burundi' => [], 'Cambodia' => [], 'Cameroon' => [], 'Cape Verde' => [], 'Cayman Islands' => [], 'Central African Republic' => [], 'Chad' => [], 'Chile' => [], 'Christmas Island' => [], 'Cocos (Keeling) Islands' => [], 'Colombia' => [], 'Comoros' => [], 'Congo-Brazzaville' => [], 'Congo-Kinshasa' => [], 'Cook Islands' => [], 'Costa Rica' => [], 'Croatia' => [], 'Cura?ao' => [], 'Cyprus' => [], 'Czech Republic' => [], 'Denmark' => [], 'Djibouti' => [], 'Dominica' => [], 'Dominican Republic' => [], 'East Timor' => [], 'Ecuador' => [], 'El Salvador' => [], 'Egypt' => [], 'Equatorial Guinea' => [], 'Eritrea' => [], 'Estonia' => [], 'Ethiopia' => [], 'Falkland Islands' => [], 'Faroe Islands' => [], 'Federated States of Micronesia' => [], 'Fiji' => [], 'Finland' => [], 'France' => [], 'French Guiana' => [], 'French Polynesia' => [], 'French Southern Lands' => [], 'Gabon' => [], 'Gambia' => [], 'Georgia' => [], 'Germany' => [], 'Ghana' => [], 'Gibraltar' => [], 'Greece' => [], 'Greenland' => [], 'Grenada' => [], 'Guadeloupe' => [], 'Guam' => [], 'Guatemala' => [], 'Guernsey' => [], 'Guinea' => [], 'Guinea-Bissau' => [], 'Guyana' => [], 'Haiti' => [], 'Heard and McDonald Islands' => [], 'Honduras' => [], 'Hong Kong' => [], 'Hungary' => [], 'Iceland' => [], 'Indonesia' => [], 'Iraq' => [], 'Ireland' => [], 'Isle of Man' => [], 'Israel' => [], 'Italy' => [], 'Jamaica' => [], 'Japan' => [], 'Jersey' => [], 'Jordan' => [], 'Kazakhstan' => [], 'Kenya' => [], 'Kiribati' => [], 'Kuwait' => [], 'Kyrgyzstan' => [], 'Laos' => [], 'Latvia' => [], 'Lebanon' => [], 'Lesotho' => [], 'Liberia' => [], 'Libya' => [], 'Liechtenstein' => [], 'Lithuania' => [], 'Luxembourg' => [], 'Macau' => [], 'Macedonia' => [], 'Madagascar' => [], 'Malawi' => [], 'Malaysia' => [], 'Maldives' => [], 'Mali' => [], 'Malta' => [], 'Marshall Islands' => [], 'Martinique' => [], 'Mauritania' => [], 'Mauritius' => [], 'Mayotte' => [], 'Mexico' => [], 'Moldova' => [], 'Monaco' => [], 'Mongolia' => [], 'Montenegro' => [], 'Montserrat' => [], 'Morocco' => [], 'Mozambique' => [], 'Namibia' => [], 'Nauru' => [], 'Nepal' => [], 'Netherlands' => [], 'New Caledonia' => [], 'New Zealand' => [], 'Nicaragua' => [], 'Niger' => [], 'Nigeria' => [], 'Niue' => [], 'Norfolk Island' => [], 'Northern Mariana Islands' => [], 'Norway' => [], 'Oman' => [], 'Palau' => [], 'Panama' => [], 'Papua New Guinea' => [], 'Paraguay' => [], 'Peru' => [], 'Philippines' => [], 'Pitcairn Islands' => [], 'Poland' => [], 'Portugal' => [], 'Puerto Rico' => [], 'Qatar' => [], 'R?union' => [], 'Romania' => [], 'Russia' => [], 'Rwanda' => [], 'Saint Barth?lemy' => [], 'Saint Helena' => [], 'Saint Kitts and Nevis' => [], 'Saint Lucia' => [], 'Saint Martin' => [], 'Saint Pierre and Miquelon' => [], 'Saint Vincent' => [], 'Samoa' => [], 'San Marino' => [], 'S?o Tom? and Pr?ncipe' => [], 'Saudi Arabia' => [], 'Senegal' => [], 'Serbia' => [], 'Seychelles' => [], 'Sierra Leone' => [], 'Singapore' => [], 'Sint Maarten' => [], 'Slovakia' => [], 'Slovenia' => [], 'Solomon Islands' => [], 'Somalia' => [], 'South Georgia' => [], 'South Korea' => [], 'Spain' => [], 'Sri Lanka' => [], 'Sudan' => [], 'Suriname' => [], 'Svalbard and Jan Mayen' => [], 'Sweden' => [], 'Swaziland' => [], 'Switzerland' => [], 'Syria' => [], 'Taiwan' => [], 'Tajikistan' => [], 'Tanzania' => [], 'Thailand' => [], 'Togo' => [], 'Tokelau' => [], 'Tonga' => [], 'Trinidad and Tobago' => [], 'Tunisia' => [], 'Turkey' => [], 'Turkmenistan' => [], 'Turks and Caicos Islands' => [], 'Tuvalu' => [], 'Uganda' => [], 'Ukraine' => [], 'United Arab Emirates' => [], 'Uruguay' => [], 'Uzbekistan' => [], 'Vanuatu' => [], 'Vatican City' => [], 'Vietnam' => [], 'Venezuela' => [], 'Wallis and Futuna' => [], 'Western Sahara' => [], 'Yemen' => [], 'Zambia' => [], 'Zimbabwe' =>[]
        ];

        foreach($countries as $country => $regions){
            $country = Country::firstOrCreate(['country' => $country]);
            if(!empty($regions)){
                foreach($regions['regions'] as $region){
                    Region::firstOrCreate([
                        'region_naming' => $regions['region_naming'],
                        'region' => $region,
                        'country_id' => $country->id,
                    ]);
                }
            }
        }
    }
}
