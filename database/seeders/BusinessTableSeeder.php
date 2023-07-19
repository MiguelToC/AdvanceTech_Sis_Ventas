<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Business;
use Illuminate\Support\Facades\DB;

class BusinessTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('businesses')->insert([
            'name'=>'AdvanceTech',
            'description'=>'Te ayudamos a conectar el presente con tu futuro.',
            'logo'=>'logo.png',
            'mail'=>'advancetech@contacus.com',
            'address'=>'San Isidro Cdra 10',
            'ruc'=>'10778127661',
        ]);
    }
}


