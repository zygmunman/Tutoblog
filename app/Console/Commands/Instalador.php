<?php

namespace App\Console\Commands;

use App\Models\Backend\Rol;
use App\Models\Usuario;
use Illuminate\Support\Str;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

/**
 * A través de la consola de Artisan creamos un comando en PHP llamado
 * Instalador y que servirá para que el Superadministrador pueda crear diferentes
 * roles, tales como Administrador, Supervisor, el propio SuperAdministrador, etc.
 */
class Instalador extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'tutoblog:install';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Este comando ejecuta el instalador del proyecto';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Con la función 'handle' lo que hacemos es verificar que no haya un rol ya creado asignado
     * a un usuario; si no lo hay, creamos el rol, 'SuperAdmin' en nuestro caso, creamos también
     * el usuario para ese rol y, mediante la función 'roles' que une 'usuarios'  y 'roles',
     * añadimos ('attach') el rol a ese usuario.
     * @return int
     */
    public function handle()
    {
        if(!$this->verificar())
        {
            $rol = $this->crearRolSuperAdmin();
            $usuario = $this->crearUsuarioSuperAdmin();
            $usuario->roles()->attach($rol);
            $this->line('El Rol y usuario Administrador se instalaron correctamente');
        }else{
            $this->error('No se puede ejecutar el instalador, porque ya hay un rol creado');
        }

    }

    private function verificar()
    {
        return Rol::find(1);
    }

    private function crearRolSuperAdmin()
    {
        $rol = "Super Administrador";

        return Rol::create([
            'nombre' => $rol,
            'slug' => Str::slug($rol, '_')
        ]);
    }

    private function crearUsuarioSuperAdmin()
    {
        return Usuario::create([
            'nombre' => 'tuto_admin',
            'email' => 'jmart237@gmail.com',
            'password' => Hash::make('averroes47'),
            'estado' => 1
        ]);
    }
}
