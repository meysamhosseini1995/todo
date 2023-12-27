<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Constants\RoleConstant;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->makeFirstUser();
        $this->call(TodoSeeder::class);
    }

    public function makeFirstUser(): void
    {
        $superAdmin = User::query()->firstOrCreate([
            'email' => 'meysamhosseini1995@gmail.com',
        ], [
            'name' => 'Meysam Hosseini',
            'password' => Hash::make('12345678'),
        ]);
    }
}
