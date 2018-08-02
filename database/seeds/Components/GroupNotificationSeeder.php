<?php

use ArbaFilm\Repositories\v1\Components\Models\GroupNotification;
use Illuminate\Database\Seeder;

class GroupNotificationSeeder extends Seeder
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
            ['name' => 'New video'],
            ['name' => 'Chat'],
        );

        /** Delete if exist data in table */
        if (GroupNotification::get()->count() > 0) {
            GroupNotification::truncate();
        }

        GroupNotification::insert($data);
    }
}
