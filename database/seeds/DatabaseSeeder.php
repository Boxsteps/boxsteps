<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RolesTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(FeaturesTableSeeder::class);
        $this->call(PermissionsTableSeeder::class);
        $this->call(InstitutionsTableSeeder::class);
        $this->call(PeriodsTableSeeder::class);
        $this->call(StudentsTableSeeder::class);
    }
}
