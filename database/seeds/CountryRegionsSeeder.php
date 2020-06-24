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
            ]
        ];

        foreach($countries as $country => $regions){
            $country = Country::firstOrCreate(['country' => $country]);
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
