<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Album;
use App\Models\Song;
use App\Models\Location;
use App\Models\Genre;
use App\Models\User;
use App\Models\Role;
use App\Models\Rating;
use App\Models\Playlist;
use App\Models\Method;
use App\Models\Functionality;
use App\Models\Card_Type;
use App\Models\Bank;
use App\Models\FunctionalityRole;
use App\Models\SongPlaylist;
use App\Models\Followup;


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

                //Role::factory(1)->create();
                Role::create([
                        'nombre_rol' => 'administrador',
                ]);
                Role::create([
                        'nombre_rol' => 'usuario',
                ]);
                Role::create([
                        'nombre_rol' => 'artista',
                ]);
                //Functionality::factory(10)->create();
                Functionality::create([
                        'nombre_fun' => 'crear',
                ]);
                
                Functionality::create([
                        'nombre_fun' => 'editar',
                ]);

                Functionality::create([
                        'nombre_fun' => 'eliminar',
                ]);

                Functionality::create([
                        'nombre_fun' => 'ver',
                ]);
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
                FunctionalityRole::factory(10)->create();
                SongPlaylist::factory(10)->create();
                Followup::factory(10)->create();




                // \App\Models\User::factory()->create([
                //     'name' => 'Test User',
                //     'email' => 'test@example.com',
                // ]);
        }
}
