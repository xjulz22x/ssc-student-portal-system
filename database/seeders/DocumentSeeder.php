<?php

namespace Database\Seeders;

use App\Models\Document;
use App\Models\Requirement;
use Illuminate\Database\Seeder;
use PhpParser\Comment\Doc;

class DocumentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $documents = [
            'Transcript of Records',
            'Reconstructed Diploma',
            'Certificate of Graduation',
            'Form 137a(High School)',
            'Certificate of Grade',
            'Certificate of General Weighted Average'
        ];
        $requirements = Requirement::all();
        foreach ($documents as $document){
            Document::create([
               'document_name' => $document,
                'price' => '50'
            ])->requirements()->attach($requirements);
        }
    }
}
