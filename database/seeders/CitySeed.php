<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CitySeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $items = [

            ['id' => 1, 'title' => 'ADANA', 'plate_no' => '1'],
            ['id' => 2, 'title' => 'ADIYAMAN', 'plate_no' => '2'],
            ['id' => 3, 'title' => 'AFYONKARAHİSAR', 'plate_no' => '3'],
            ['id' => 4, 'title' => 'AĞRI', 'plate_no' => '4'],
            ['id' => 5, 'title' => 'AKSARAY', 'plate_no' => '68'],
            ['id' => 6, 'title' => 'AMASYA', 'plate_no' => '5'],
            ['id' => 7, 'title' => 'ANKARA', 'plate_no' => '6'],
            ['id' => 8, 'title' => 'ANTALYA', 'plate_no' => '7'],
            ['id' => 9, 'title' => 'ARDAHAN', 'plate_no' => '75'],
            ['id' => 10, 'title' => 'ARTVİN', 'plate_no' =>  '8'],
            ['id' => 11, 'title' => 'AYDIN', 'plate_no' =>  '9'],
            ['id' => 12, 'title' => 'BALIKESİR', 'plate_no' =>  '10'],
            ['id' => 13, 'title' => 'BARTIN', 'plate_no' =>  '74'],
            ['id' => 14, 'title' => 'BATMAN', 'plate_no' =>  '72'],
            ['id' => 15, 'title' => 'BAYBURT', 'plate_no' =>  '69'],
            ['id' => 16, 'title' => 'BİLECİK', 'plate_no' =>  '11'],
            ['id' => 17, 'title' => 'BİNGÖL', 'plate_no' =>  '12'],
            ['id' => 18, 'title' => 'BİTLİS', 'plate_no' =>  '13'],
            ['id' => 19, 'title' => 'BOLU', 'plate_no' =>  '14'],
            ['id' => 20, 'title' => 'BURDUR', 'plate_no' =>  '15'],
            ['id' => 21, 'title' => 'BURSA', 'plate_no' =>  '16'],
            ['id' => 22, 'title' => 'ÇANAKKALE', 'plate_no' =>  '17'],
            ['id' => 23, 'title' => 'ÇANKIRI', 'plate_no' =>  '18'],
            ['id' => 24, 'title' => 'ÇORUM', 'plate_no' =>  '19'],
            ['id' => 25, 'title' => 'DENİZLİ', 'plate_no' =>  '20'],
            ['id' => 26, 'title' => 'DİYARBAKIR', 'plate_no' =>  '21'],
            ['id' => 27, 'title' => 'DÜZCE', 'plate_no' =>  '81'],
            ['id' => 28, 'title' => 'EDİRNE', 'plate_no' =>  '22'],
            ['id' => 29, 'title' => 'ELAZIĞ', 'plate_no' =>  '23'],
            ['id' => 30, 'title' => 'ERZİNCAN', 'plate_no' =>  '24'],
            ['id' => 31, 'title' => 'ERZURUM', 'plate_no' =>  '25'],
            ['id' => 32, 'title' => 'ESKİŞEHİR', 'plate_no' =>  '26'],
            ['id' => 33, 'title' => 'GAZİANTEP', 'plate_no' =>  '27'],
            ['id' => 34, 'title' => 'GİRESUN', 'plate_no' =>  '28'],
            ['id' => 35, 'title' => 'GÜMÜŞHANE', 'plate_no' =>  '29'],
            ['id' => 36, 'title' => 'HAKKARİ', 'plate_no' =>  '30'],
            ['id' => 37, 'title' => 'HATAY', 'plate_no' =>  '31'],
            ['id' => 38, 'title' => 'IĞDIR', 'plate_no' =>  '76'],
            ['id' => 39, 'title' => 'ISPARTA', 'plate_no' =>  '32'],
            ['id' => 40, 'title' => 'İSTANBUL', 'plate_no' =>  '34'],
            ['id' => 41, 'title' => 'İZMİR', 'plate_no' =>  '35'],
            ['id' => 42, 'title' => 'KAHRAMANMARAŞ', 'plate_no' =>  '46'],
            ['id' => 43, 'title' => 'KARABÜK', 'plate_no' =>  '78'],
            ['id' => 44, 'title' => 'KARAMAN', 'plate_no' =>  '70'],
            ['id' => 45, 'title' => 'KARS', 'plate_no' =>  '36'],
            ['id' => 46, 'title' => 'KASTAMONU', 'plate_no' =>  '37'],
            ['id' => 47, 'title' => 'KAYSERİ', 'plate_no' =>  '38'],
            ['id' => 48, 'title' => 'KIRIKKALE', 'plate_no' =>  '71'],
            ['id' => 49, 'title' => 'KIRKLARELİ', 'plate_no' =>  '39'],
            ['id' => 50, 'title' => 'KIRŞEHİR', 'plate_no' =>  '40'],
            ['id' => 51, 'title' => 'KİLİS', 'plate_no' =>  '79'],
            ['id' => 52, 'title' => 'KOCAELİ', 'plate_no' =>  '41'],
            ['id' => 53, 'title' => 'KONYA', 'plate_no' =>  '42'],
            ['id' => 54, 'title' => 'KÜTAHYA', 'plate_no' =>  '43'],
            ['id' => 55, 'title' => 'MALATYA', 'plate_no' =>  '44'],
            ['id' => 56, 'title' => 'MANİSA', 'plate_no' =>  '45'],
            ['id' => 57, 'title' => 'MARDİN', 'plate_no' =>  '47'],
            ['id' => 58, 'title' => 'MERSİN', 'plate_no' =>  '33'],
            ['id' => 59, 'title' => 'MUĞLA', 'plate_no' =>  '48'],
            ['id' => 60, 'title' => 'MUŞ', 'plate_no' =>  '49'],
            ['id' => 61, 'title' => 'NEVŞEHİR', 'plate_no' =>  '50'],
            ['id' => 62, 'title' => 'NİĞDE', 'plate_no' =>  '51'],
            ['id' => 63, 'title' => 'ORDU', 'plate_no' =>  '52'],
            ['id' => 64, 'title' => 'OSMANİYE', 'plate_no' =>  '80'],
            ['id' => 65, 'title' => 'RİZE', 'plate_no' =>  '53'],
            ['id' => 66, 'title' => 'SAKARYA', 'plate_no' =>  '54'],
            ['id' => 67, 'title' => 'SAMSUN', 'plate_no' =>  '55'],
            ['id' => 68, 'title' => 'SİİRT', 'plate_no' =>  '56'],
            ['id' => 69, 'title' => 'SİNOP', 'plate_no' =>  '57'],
            ['id' => 70, 'title' => 'SİVAS', 'plate_no' =>  '58'],
            ['id' => 71, 'title' => 'ŞANLIURFA', 'plate_no' =>  '63'],
            ['id' => 72, 'title' => 'ŞIRNAK', 'plate_no' =>  '73'],
            ['id' => 73, 'title' => 'TEKİRDAĞ', 'plate_no' =>  '59'],
            ['id' => 74, 'title' => 'TOKAT', 'plate_no' =>  '60'],
            ['id' => 75, 'title' => 'TRABZON', 'plate_no' =>  '61'],
            ['id' => 76, 'title' => 'TUNCELİ', 'plate_no' =>  '62'],
            ['id' => 77, 'title' => 'UŞAK', 'plate_no' =>  '64'],
            ['id' => 78, 'title' => 'VAN', 'plate_no' =>  '65'],
            ['id' => 79, 'title' => 'YALOVA', 'plate_no' =>  '77'],
            ['id' => 80, 'title' => 'YOZGAT', 'plate_no' =>  '66'],
            ['id' => 81, 'title' => 'ZONGULDAK', 'plate_no' =>  '67']
        ];
        DB::table('cities')->insert($items);
    }
}
