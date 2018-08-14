<?php

use ArbaFilm\Repositories\v1\Components\Models\Country;
use Illuminate\Database\Seeder;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = array(
            ['name' => 'Afghanistan'],
            ['name' => 'Albania'],
            ['name' => 'Algeria'],
            ['name' => 'American Samoa'],
            ['name' => 'Andorra'],
            ['name' => 'Angola'],
            ['name' => 'Anguilla'],
            ['name' => 'Antarctica'],
            ['name' => 'Antigua and Barbuda'],
            ['name' => 'Argentina'],
            ['name' => 'Armenia'],
            ['name' => 'Aruba'],
            ['name' => 'Australia'],
            ['name' => 'Austria'],
            ['name' => 'Azerbaijan'],
            ['name' => 'Bahamas'],
            ['name' => 'Bahrain'],
            ['name' => 'Bangladesh'],
            ['name' => 'Barbados'],
            ['name' => 'Belarus'],
            ['name' => 'Belgium'],
            ['name' => 'Belize'],
            ['name' => 'Benin'],
            ['name' => 'Bermuda'],
            ['name' => 'Bhutan'],
            ['name' => 'Bolivia'],
            ['name' => 'Bosnia and Herzegovina'],
            ['name' => 'Botswana'],
            ['name' => 'Brazil'],
            ['name' => 'Brunei Darussalam'],
            ['name' => 'Bulgaria'],
            ['name' => 'Burkina Faso'],
            ['name' => 'Burundi'],
            ['name' => 'Cambodia'],
            ['name' => 'Cameroon'],
            ['name' => 'Canada'],
            ['name' => 'Cape Verde'],
            ['name' => 'Cayman Islands'],
            ['name' => 'Central African Republic'],
            ['name' => 'Chad'],
            ['name' => 'Chile'],
            ['name' => 'China'],
            ['name' => 'Christmas Island'],
            ['name' => 'Cocos (Keeling) Islands'],
            ['name' => 'Colombia'],
            ['name' => 'Comoros'],
            ['name' => 'Democratic Republic of the Congo (Kinshasa)'],
            ['name' => 'Congo, Republic of (Brazzaville)'],
            ['name' => 'Cook Islands'],
            ['name' => 'Costa Rica'],
            ['name' => 'Côte D\'ivoire (Ivory Coast)'],
            ['name' => 'Croatia'],
            ['name' => 'Cuba'],
            ['name' => 'Cyprus'],
            ['name' => 'Czech Republic'],
            ['name' => 'Denmark'],
            ['name' => 'Djibouti'],
            ['name' => 'Dominica'],
            ['name' => 'Dominican Republic'],
            ['name' => 'East Timor (Timor-Leste)'],
            ['name' => 'Ecuador'],
            ['name' => 'Egypt'],
            ['name' => 'El Salvador'],
            ['name' => 'Equatorial Guinea'],
            ['name' => 'Eritrea'],
            ['name' => 'Estonia'],
            ['name' => 'Ethiopia'],
            ['name' => 'Falkland Islands'],
            ['name' => 'Faroe Islands'],
            ['name' => 'Fiji'],
            ['name' => 'Finland'],
            ['name' => 'France'],
            ['name' => 'French Guiana'],
            ['name' => 'French Polynesia'],
            ['name' => 'French Southern Territories'],
            ['name' => 'Gabon'],
            ['name' => 'Gambia'],
            ['name' => 'Georgia'],
            ['name' => 'Germany'],
            ['name' => 'Ghana'],
            ['name' => 'Gibraltar'],
            ['name' => 'Great Britain'],
            ['name' => 'Greece'],
            ['name' => 'Greenland'],
            ['name' => 'Grenada'],
            ['name' => 'Guadeloupe'],
            ['name' => 'Guam'],
            ['name' => 'Guatemala'],
            ['name' => 'Guinea'],
            ['name' => 'Guinea-Bissau'],
            ['name' => 'Guyana'],
            ['name' => 'Haiti'],
            ['name' => 'Holy See'],
            ['name' => 'Honduras'],
            ['name' => 'Hong Kong'],
            ['name' => 'Hungary'],
            ['name' => 'Iceland'],
            ['name' => 'India'],
            ['name' => 'Indonesia'],
            ['name' => 'Iran (Islamic Republic of)'],
            ['name' => 'Iraq'],
            ['name' => 'Ireland'],
            ['name' => 'Israel'],
            ['name' => 'Italy'],
            ['name' => 'Ivory Coast'],
            ['name' => 'Jamaica'],
            ['name' => 'Japan'],
            ['name' => 'Jordan'],
            ['name' => 'Kazakhstan'],
            ['name' => 'Kenya'],
            ['name' => 'Kiribati'],
            ['name' => 'Korea, Democratic People\'s Rep. (North Korea)'],
            ['name' => 'Korea, Republic of (South Korea)'],
            ['name' => 'Kosovo'],
            ['name' => 'Kuwait'],
            ['name' => 'Kyrgyzstan'],
            ['name' => 'Lao, People\'s Democratic Republic'],
            ['name' => 'Latvia'],
            ['name' => 'Lebanon'],
            ['name' => 'Lesotho'],
            ['name' => 'Liberia'],
            ['name' => 'Libya'],
            ['name' => 'Liechtenstein'],
            ['name' => 'Lithuania'],
            ['name' => 'Luxembourg'],
            ['name' => 'Macau'],
            ['name' => 'Macedonia, Rep. of'],
            ['name' => 'Madagascar'],
            ['name' => 'Malawi'],
            ['name' => 'Malaysia'],
            ['name' => 'Maldives'],
            ['name' => 'Mali'],
            ['name' => 'Malta'],
            ['name' => 'Marshall Islands'],
            ['name' => 'Martinique'],
            ['name' => 'Mauritania'],
            ['name' => 'Mauritius'],
            ['name' => 'Mayotte'],
            ['name' => 'Mexico'],
            ['name' => 'Micronesia, Federal States of'],
            ['name' => 'Moldova, Republic of'],
            ['name' => 'Monaco'],
            ['name' => 'Mongolia'],
            ['name' => 'Montenegro'],
            ['name' => 'Montserrat'],
            ['name' => 'Morocco'],
            ['name' => 'Mozambique'],
            ['name' => 'Myanmar, Burma'],
            ['name' => 'Namibia'],
            ['name' => 'Nauru'],
            ['name' => 'Nepal'],
            ['name' => 'Netherlands'],
            ['name' => 'Netherlands Antilles'],
            ['name' => 'New Caledonia'],
            ['name' => 'New Zealand'],
            ['name' => 'Nicaragua'],
            ['name' => 'Niger'],
            ['name' => 'Nigeria'],
            ['name' => 'Niue'],
            ['name' => 'Northern Mariana Islands'],
            ['name' => 'Norway'],
            ['name' => 'Oman'],
            ['name' => 'Pakistan'],
            ['name' => 'Palau'],
            ['name' => 'Palestinian territories'],
            ['name' => 'Panama'],
            ['name' => 'Papua New Guinea'],
            ['name' => 'Paraguay'],
            ['name' => 'Peru'],
            ['name' => 'Philippines'],
            ['name' => 'Pitcairn Island'],
            ['name' => 'Poland'],
            ['name' => 'Portugal'],
            ['name' => 'Puerto Rico'],
            ['name' => 'Qatar'],
            ['name' => 'Reunion Island'],
            ['name' => 'Romania'],
            ['name' => 'Russian Federation'],
            ['name' => 'Rwanda'],
            ['name' => 'Saint Kitts and Nevis'],
            ['name' => 'Saint Lucia'],
            ['name' => 'Saint Vincent and the Grenadines'],
            ['name' => 'Samoa'],
            ['name' => 'San Marino'],
            ['name' => 'Sao Tome and Principe'],
            ['name' => 'Saudi Arabia'],
            ['name' => 'Senegal'],
            ['name' => 'Serbia'],
            ['name' => 'Seychelles'],
            ['name' => 'Sierra Leone'],
            ['name' => 'Singapore'],
            ['name' => 'Slovakia (Slovak Republic)'],
            ['name' => 'Slovenia'],
            ['name' => 'Solomon Islands'],
            ['name' => 'Somalia'],
            ['name' => 'South Africa'],
            ['name' => 'South Sudan'],
            ['name' => 'Spain'],
            ['name' => 'Sri Lanka'],
            ['name' => 'Sudan'],
            ['name' => 'Suriname'],
            ['name' => 'Swaziland'],
            ['name' => 'Sweden'],
            ['name' => 'Switzerland'],
            ['name' => 'Syria, Syrian Arab Republic'],
            ['name' => 'Taiwan (Republic of China'],
            ['name' => 'Tajikistan'],
            ['name' => 'Tanzania'],
            ['name' => 'Thailand'],
            ['name' => 'Tibet'],
            ['name' => 'Timor-Leste (East Timor)'],
            ['name' => 'Togo'],
            ['name' => 'Tokelau'],
            ['name' => 'Tonga'],
            ['name' => 'Trinidad and Tobago'],
            ['name' => 'Tunisia'],
            ['name' => 'Turkey'],
            ['name' => 'Turkmenistan'],
            ['name' => 'Turks and Caicos Islands'],
            ['name' => 'Tuvalu'],
            ['name' => 'Uganda'],
            ['name' => 'Ukraine'],
            ['name' => 'United Arab Emirates'],
            ['name' => 'United Kingdom'],
            ['name' => 'United States'],
            ['name' => 'Uruguay'],
            ['name' => 'Uzbekistan'],
            ['name' => 'Vanuatu'],
            ['name' => 'Vatican City State (Holy See)'],
            ['name' => 'Venezuela'],
            ['name' => 'Vietnam'],
            ['name' => 'Virgin Islands (British)'],
            ['name' => 'Virgin Islands (U.S.)'],
            ['name' => 'Wallis and Futuna Islands'],
            ['name' => 'Western Sahara'],
            ['name' => 'Yemen'],
            ['name' => 'Zambia'],
            ['name' => 'Zimbabwe']
        );

        /** Delete if exist data in table */
        if (Country::get()->count() > 0) {
            Country::truncate();
        }

        Country::insert($data);
    }
}