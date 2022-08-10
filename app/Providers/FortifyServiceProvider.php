<?php
namespace App\Providers;
use App\Actions\Fortify\CreateNewUser;
use App\Actions\Fortify\ResetUserPassword;
use App\Actions\Fortify\UpdateUserPassword;
use App\Actions\Fortify\UpdateUserProfileInformation;
use App\Models\Usuario;
use Illuminate\Support\ServiceProvider;
use Laravel\Fortify\Fortify;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
class FortifyServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Fortify::createUsersUsing(CreateNewUser::class);
        Fortify::updateUserProfileInformationUsing(UpdateUserProfileInformation::class);
        Fortify::updateUserPasswordsUsing(UpdateUserPassword::class);
        Fortify::resetUserPasswordsUsing(ResetUserPassword::class);
        Fortify::loginView(fn () => view('theme.back.login'));

        Fortify::authenticateUsing(function (Request $request) {
            $usuario = Usuario::where('email', $request->email)->first();
            if ($usuario && Hash::check($request->password, $usuario->password)) {
                $roles = $usuario->roles()->first();
                if ($roles) {
                    $request->session()->put('rol_slug', $roles->slug);//en la var de sesion del ususario ponemos su slug
                    $request->session()->put('rol_id', $roles->id);//en la var de sesión del usuario ponemos su rol
                    return $usuario;
                }
                return false;
            }
            return false;
        });
    }
}
