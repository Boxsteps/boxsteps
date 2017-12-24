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
        $this->call(KnowledgeAreasTableSeeder::class);
        $this->call(ConceptualSectionsTableSeeder::class);
        $this->call(StatesTableSeeder::class);
        $this->call(EvaluationTypesTableSeeder::class);
        $this->call(EvaluationScalesTableSeeder::class);
        $this->call(MessagesTableSeeder::class);
        $this->call(CoursesTableSeeder::class);
        $this->call(GroupsTableSeeder::class);
        $this->call(PlansTableSeeder::class);
        $this->call(ConditionsTableSeeder::class);
    }
}
