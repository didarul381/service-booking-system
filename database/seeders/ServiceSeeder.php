<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Service;

class ServiceSeeder extends Seeder
{
    public function run()
    {
        Service::create([
            'name' => 'Cleaning',
            'description' => 'House Cleaning',
            'price' => 100,
            'status' => 'active'
        ]);

        Service::create([
            'name' => 'Plumbing',
            'description' => 'Pipe fixing',
            'price' => 150,
            'status' => 'active'
        ]);
    }
}
