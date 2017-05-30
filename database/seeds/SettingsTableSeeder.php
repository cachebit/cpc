<?php

use Illuminate\Database\Seeder;
use App\Setting;
use App\Story;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      for($i = 1; $i <= 10; $i++)
      {
        $setting = factory(Setting::class)->make();
        $story = Story::find($i);
        $story->posters()->save($setting);
      }
    }
}
