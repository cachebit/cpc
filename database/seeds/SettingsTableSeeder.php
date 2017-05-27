<?php

use Illuminate\Database\Seeder;
use App\Setting;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $setting = factory(Setting::class)->times(500)->make();
      Setting::insert($setting->toArray());

      for($i = 1; $i <= 500; $i++)
      {
        $setting = Setting::find($i);
        $setting->story_id = $i;
        $setting->save();
      }
    }
}
