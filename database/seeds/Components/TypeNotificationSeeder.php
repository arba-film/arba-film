<?php

use ArbaFilm\Repositories\v1\Components\Models\TypeNotification;
use Illuminate\Database\Seeder;

class TypeNotificationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = array(
            ['name' => 'Always'],
            ['name' => 'Sometimes'],
            ['name' => 'Non active'],
        );

        /** Delete if exist data in table */
        if (TypeNotification::get()->count() > 0) {
            TypeNotification::truncate();
        }

        TypeNotification::insert($data);
    }
}
