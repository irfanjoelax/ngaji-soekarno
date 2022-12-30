<?php

namespace Database\Seeders;

use App\Models\Information;
use Illuminate\Database\Seeder;

class InformationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Information::create([
            'phone'   => '083140617623',
            'email'   => 'admin@admin.com',
            'address' => 'Rapak Indah Street No.127, Samarinda City, East Borneo',
        ]);
    }
}
