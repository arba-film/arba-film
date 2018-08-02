<?php

use ArbaFilm\Repositories\v1\Components\Models\TypeCollection;
use Illuminate\Database\Seeder;

class TypeCollectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = array(
            ['name' => 'Favorite'],
            ['name' => 'Watching later'],
        );

        /** Delete if exist data in table */
        if (TypeCollection::get()->count() > 0) {
            TypeCollection::truncate();
        }

        TypeCollection::insert($data);
    }
}
