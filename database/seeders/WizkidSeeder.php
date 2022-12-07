<?php

namespace Database\Seeders;

use App\Models\Wizkid;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WizkidSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Wizkid::factory(10)->create();
    }
}
