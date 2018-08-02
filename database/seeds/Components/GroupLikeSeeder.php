<?php

use ArbaFilm\Repositories\v1\Components\Models\GroupLike;
use Illuminate\Database\Seeder;

class GroupLikeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = array(
            ['name' => 'Comment'],
            ['name' => 'Video']
        );

        /** Delete if exist data in table */
        if (GroupLike::get()->count() > 0) {
            GroupLike::truncate();
        }

        GroupLike::insert($data);
    }
}
