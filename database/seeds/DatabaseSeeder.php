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
        /** Create component */
        $this->call(CountrySeeder::class);
        $this->call(GroupLikeSeeder::class);
        $this->call(GroupNotificationSeeder::class);
        $this->call(GroupVideoSeeder::class);
        $this->call(TypeCollectionSeeder::class);
        $this->call(TypeNotificationSeeder::class);
    }
}
