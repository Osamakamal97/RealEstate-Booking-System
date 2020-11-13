<?php

use App\Models\RealEstateFacility;
use Illuminate\Database\Seeder;

class FacilitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $indoor_facilities = [
            'تكييف',
            'واي فاي مجاني',
            'موقف سيارات مجاني',
            'مسبح',
            'غسالة ملابس',
            'تلفزيون بشاشة مسطحة',
            'مطبخ',
            'مطبخ صغير',
            'ساونا',
            'ميني بار'
        ];
        $outdoor_facilities = [
            'شرفة',
            'إطلالة على حديقة',
            'إطلالة على بحر',
            'تراس',
        ];
        foreach ($indoor_facilities as $facility) {
            RealEstateFacility::create(['name' => $facility, 'place' => 'indoor']);
        }
        foreach ($outdoor_facilities as $facility) {
            RealEstateFacility::create(['name' => $facility, 'place' => 'outdoor']);
        }
    }
}
