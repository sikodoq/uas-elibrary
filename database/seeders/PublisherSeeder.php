<?php

namespace Database\Seeders;

use App\Models\Publisher;
use Illuminate\Database\Seeder;

class PublisherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = ['PT. Gramedia', 'LIKMI', 'Andi Offset'];
        foreach ($data as $publisher) {
            Publisher::create([
                'name' => $publisher
            ]);
        }
    }
}
