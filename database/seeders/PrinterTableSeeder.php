<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Printer;
use Illuminate\Support\Facades\DB;

class PrinterTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('printers')->insert([
            'name'=>'AURES ODP-333',
        ]);
    }
}
