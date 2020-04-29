<?php

namespace App\Http\Middleware;

use Closure;
use Symfony\Component\HttpFoundation\Response;
use App\Models\userModel;
use Illuminate\Support\Facades\Auth;
class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $roleid = userModel::where('email', '=', $request->email)->firstOrFail(); //pega o primeiro objeto que tiver o email igual , para dps comparar o role_id :).
        //Se o role_id for diferente de 1 (ROLE ID DE ADMIN) , retorna a pagina de erro , e desloga o user.
        if ($roleid->role_id != 1){
            return new Response(view('unauthorized')->with('role','ADMIN'));
            Auth::logout();
        }
        //Senão , segue o baile! haha
        return $next($request);
    }
}
