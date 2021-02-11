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
            array('id' => '1','menu_id' => NULL,'nombre' => 'Navegación','url' => 'javascript:;','orden' => '2','icono' => NULL,'created_at' => '2021-01-31 17:15:14','updated_at' => '2021-02-11 22:09:15'),
            array('id' => '2','menu_id' => '1','nombre' => 'Menú','url' => 'menu','orden' => '1','icono' => NULL,'created_at' => '2021-01-31 17:20:57','updated_at' => '2021-02-11 22:09:15'),
            array('id' => '3','menu_id' => NULL,'nombre' => 'Dashboard','url' => 'dashboard','orden' => '1','icono' => NULL,'created_at' => '2021-01-31 17:21:55','updated_at' => '2021-02-11 22:09:15'),
            array('id' => '4','menu_id' => '1','nombre' => 'Menu Rol','url' => 'menu-rol','orden' => '2','icono' => NULL,'created_at' => '2021-02-11 21:58:35','updated_at' => '2021-02-11 22:09:15')
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
