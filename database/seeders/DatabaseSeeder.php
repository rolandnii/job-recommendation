<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Enums\JobType;
use App\Enums\Role;
use App\Models\Job;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
//        Job::factory()->count(3)
//            ->state(new Sequence([
//                ['job_type' => 'part-time'],
//                ['job_type' => 'full-time'],
//            ]))
//            ->create();
//        Job::factory()->count(3)
//            ->state(new Sequence([
//                fn(Sequence $sequence) => ['job_type', collect(Role::cases())->random()->value]
//            ]))
//            ->create();

//        $user = User::factory()
//            ->has(
//                Post::factory()
//                    ->count(3)
//                    ->state(function (array $attributes, User $user) {
//                        return ['user_type' => $user->type];
//                    })
//            )
//            ->create();
//        User::factory()
//            ->hasJobs(2,[
//                'job_type' => collect(JobType::cases())->random()->value
//            ])
//        ->create();
       $users = User::factory()->count(10)->verifyUser()->create();

       foreach ($users as $user) {
           $user->assignRole('student');
       }
    }
}
