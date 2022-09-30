<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        $this->call([
            CustomerSeeder::class,
            ProductSeeder::class,
            /*
            Essa classe deve ser mantida na ultima posição
            pois depende de CustomerSeeder e ProductSeeder para se auto popular!
            */
            OrderSeeder::class,
        ]);
    }
}
