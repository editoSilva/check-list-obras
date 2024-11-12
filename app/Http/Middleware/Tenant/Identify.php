<?php

namespace App\Http\Middleware\Tenant;

use Closure;
use Illuminate\Http\Request;
use App\Traits\Tenant\ManagerTenant;
use Symfony\Component\HttpFoundation\Response;

class Identify
{
    use ManagerTenant;
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(!request()->header('domain')) {

            return response()->json([
                'message' => 'Contate a equipe de suporte da Orix. Você não está informando um dominio válido'
            ], 401); die;
        }

        if(!self::status()) {
            return response()->json([
                'message' => 'Contate a equipe de suporte da Orix. Não identificamos o seu domínio'
            ]); die;
        }

        return $next($request);
    }
}
