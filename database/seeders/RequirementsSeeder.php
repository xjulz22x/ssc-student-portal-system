<?php

namespace Database\Seeders;

use App\Models\Requirement;
use Illuminate\Database\Seeder;

class RequirementsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $descriptions = [
                'Duly Signed Clearance(for First Request)',
                '1 Documentary Stamp per Documents Requested',
                '1 pc 2x2 latest ID Picture',
                'Accomplishment Request form',
                'Special Power of Attorney - (if representative)',
                'Valid ID of Student and the representatives',
            ];

        foreach ($descriptions as $description){
            Requirement::create([
                'doc_description' => $description
            ]);
        }

    }
}
