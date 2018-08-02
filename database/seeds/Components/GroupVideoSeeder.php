<?php

use ArbaFilm\Repositories\v1\Components\Models\GroupVideo;
use Illuminate\Database\Seeder;

class GroupVideoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = array(
            ['name' => 'Action'],
            ['name' => 'Comedy'],
            ['name' => 'Drama'],
            ['name' => 'Family'],
            ['name' => 'Hollywood'],
        );

        /** Delete if exist data in table */
        if (GroupVideo::get()->count() > 0) {
            GroupVideo::truncate();
        }

        GroupVideo::insert($data);
    }
}
