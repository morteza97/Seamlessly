<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(SystemSeed::class);
        $this->call(PermissionSeed::class);
        $this->call(RoleSeed::class);
        $this->call(GendersTable::class);
        $this->call(Marital_StatusesTable::class);
        $this->call(Public_Consciption_StatusesTable::class);
        $this->call(AssistantSeed::class);
        $this->call(Scientific_GroupsSeed::class);
        $this->call(Scientific_LevelsSeed::class);
        $this->call(GradeSeeder::class);
        $this->call(FieldOfStudySeeder::class);
        $this->call(OrientationSeeder::class);
        $this->call(LessonsTypeSeed::class);
        $this->call(LessonsMethodSeed::class);
        $this->call(LessonsGenderSeed::class);
        $this->call(TermSeeder::class);
        $this->call(UserSeed::class);
        $this->call(ProfessorsSeed::class);
    }
}
