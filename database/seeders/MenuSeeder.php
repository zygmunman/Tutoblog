<?php

namespace Database\Seeders;

use App\Models\Backend\Menu;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $menu = array(

            array('id' => '1', 'menu_id' => NULL, 'nombre' => 'Navegación', 'url' => 'javascript:;', 'orden' => '2', 'icono' => NULL, 'created_at' => '2021-06-10 17:21:08', 'updated_at' => '2021-06-10 17:25:22'),
            array('id' => '2', 'menu_id' => '1', 'nombre' => 'Menu', 'url' => 'menu', 'orden' => '1', 'icono' => NULL, 'created_at' => '2021-06-10 17:21:08', 'updated_at' => '2021-06-10 17:25:22'),
            array('id' => '3', 'menu_id' => NULL, 'nombre' => 'Dashboard', 'url' => 'dashboard', 'orden' => '1', 'icono' => NULL, 'created_at' => '2021-06-10 17:21:08', 'updated_at' => '2021-06-10 17:25:22'),
            array('id' => '4', 'menu_id' => '1', 'nombre' => 'Menu Rol', 'url' => 'menu-rol', 'orden' => '2', 'icono' => NULL, 'created_at' => '2021-06-10 17:21:08', 'updated_at' => '2021-06-10 17:25:22'),
            array('id' => '5', 'menu_id' => NULL, 'nombre' => 'Seguridad', 'url' => 'javascript:;', 'orden' => '3', 'icono' => NULL, 'created_at' => '2021-06-10 17:22:14', 'updated_at' => '2021-06-10 17:25:22'),
            array('id' => '6', 'menu_id' => '5', 'nombre' => 'Rol', 'url' => 'rol', 'orden' => '1', 'icono' => NULL, 'created_at' => '2021-06-10 17:22:28', 'updated_at' => '2021-06-10 17:25:22'),
            array('id' => '7', 'menu_id' => '5', 'nombre' => 'Permiso', 'url' => 'permiso', 'orden' => '2', 'icono' => NULL, 'created_at' => '2021-06-10 17:22:50', 'updated_at' => '2021-06-10 17:25:22'),
            array('id' => '8', 'menu_id' => '5', 'nombre' => 'Permiso Rol', 'url' => 'permiso-rol', 'orden' => '3', 'icono' => NULL, 'created_at' => '2021-06-10 17:23:12', 'updated_at' => '2021-06-10 17:25:22'),
            array('id' => '9', 'menu_id' => NULL, 'nombre' => 'Post', 'url' => 'javascript:;', 'orden' => '4', 'icono' => NULL, 'created_at' => '2021-06-10 17:24:49', 'updated_at' => '2021-06-10 17:25:22'),
            array('id' => '10', 'menu_id' => '9', 'nombre' => 'Categorías', 'url' => 'categoria', 'orden' => '1', 'icono' => NULL, 'created_at' => '2021-06-10 17:25:09', 'updated_at' => '2021-06-10 17:25:22')
          );
          DB::statement('SET FOREIGN_KEY_CHECKS = 0;');
          DB::table('menu')->truncate();
          DB::statement('SET FOREIGN_KEY_CHECKS = 1;');

          foreach ($menu as $item) {
            Menu::create([
                'id' => $item['id'],
                'menu_id' => $item['menu_id'],
                'nombre' => $item['nombre'],
                'url' => $item['url'],
                'orden' => $item['orden'],
                'icono' => $item['icono']
            ]);
        }

    }
}
