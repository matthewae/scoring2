<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Project;
use App\Models\ProjectDocument;
use App\Models\DocumentType;
use App\Models\User;
use Carbon\Carbon;

class ProjectSeeder extends Seeder
{
    public function run()
    {
        // Create assessor user if not exists
        $assessor = User::firstOrCreate(
            ['email' => 'assessor@example.com'],
            [
                'name' => 'Assessor',
                'password' => bcrypt('password'),
                'role_id' => 2, // Assuming 2 is assessor role
            ]
        );

        // Create a completed project
        $completedProject = Project::create([
            'name' => 'Pembangunan Jembatan Suramadu',
            'description' => 'Proyek pembangunan jembatan penghubung Surabaya-Madura',
            'location' => 'Surabaya-Madura',
            'estimated_cost' => 1000000000000,
            'start_date' => '2024-01-01',
            'end_date' => '2024-12-31',
            'status' => 'completed',
            'user_id' => $assessor->id,
            'created_at' => Carbon::now()->subDays(30),
            'updated_at' => Carbon::now()->subDays(15)
        ]);

        // Create an ongoing project
        $ongoingProject = Project::create([
            'name' => 'Renovasi Gedung Perkantoran',
            'description' => 'Proyek renovasi gedung perkantoran di Jakarta Pusat',
            'location' => 'Jakarta Pusat',
            'estimated_cost' => 500000000000,
            'start_date' => '2024-02-01',
            'end_date' => '2024-08-31',
            'status' => 'in_progress',
            'user_id' => $assessor->id,
            'created_at' => Carbon::now()->subDays(10),
            'updated_at' => Carbon::now()->subDays(5)
        ]);


    }
}