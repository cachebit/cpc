<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $this->call('UsersTableSeeder');
        $this->call('StoriesTableSeeder');
        $this->call('CoversTableSeeder');
        $this->call('PostersTableSeeder');
        $this->call('SettingsTableSeeder');
        $this->call('SketchesTableSeeder');
        $this->call('GalleriesTableSeeder');
        $this->call('ScoresTableSeeder');

        Model::reguard();
    }
}
