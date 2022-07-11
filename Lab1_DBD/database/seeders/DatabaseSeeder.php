<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Album;
use App\Models\Song;
use App\Models\Location;
use App\Models\Genre;
use App\Models\User;
use App\Models\Rating;
use App\Models\Playlist;
use App\Models\Method;
use App\Models\Card_Type;
use App\Models\Bank;
use App\Models\SongPlaylist;
use App\Models\Followup;
use Spatie\Permission\Exceptions\RoleAlreadyExists;
//se agrega la libreria spatie
use Spatie\Permission\Models\Role;


class DatabaseSeeder extends Seeder
{
        /**
         * Seed the application's database.
         *
         * @return void
         */
        public function run()
        {
                // \App\Models\User::factory(10)->create();
                // 1ro - Modelos sin llaves Foraneas (sin FK)
                
                Role::create(['name' => 'admin']);
                Role::create(['name' => 'user']);
                Role::create(['name' => 'artist']);
                User::create([
                        'name' => 'admin',
                        'username' => 'admin',
                        'email' => 'admin@test',
                        'fecha_nacimiento' => '2020-01-01',
                        'password' => bcrypt('admin'),
                        'fecha_creacion' => NULL,
                        'suscripcion' => true,
                        'num_tarjeta' => NULL,
                ])->assignRole('admin');
                Genre::factory(10)->create();
                Location::factory(10)->create();
                Card_Type::factory(10)->create();
                Bank::factory(10)->create();
                // 2do - con llaves Foraneas (Con FK)
                Method::factory(10)->create();
                User::factory(10)->create();
                Album::factory(10)->create();
                Song::factory(10)->create();
                Rating::factory(10)->create();
                Playlist::factory(10)->create();
                SongPlaylist::factory(10)->create();
                Followup::factory(10)->create();




                // \App\Models\User::factory()->create([
                //     'name' => 'Test User',
                //     'email' => 'test@example.com',
                // ]);
        }
}
