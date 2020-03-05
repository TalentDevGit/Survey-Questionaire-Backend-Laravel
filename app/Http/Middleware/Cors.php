<?php
namespace App\Http\Middleware;

use Closure;

class Cors
{
    public function handle($request, Closure $next)
    {
        header('Access-Control-Allow-Origin: *');
        $headers = [
            'Access-Control-Allow-Methods'=>'POST, GET, OPTIONS, PUT, DELETE',
            'Access-Control-Allow-Headers'=>'Content-Type, Accept, X-CSRF-TOKEN, Origin, Authorization, X-Requested-With, Application',
        ];
        if($request->getMethod() == "OPTIONS") {
            return response()->json('OK', 200, $headers);
        }
        $response = $next($request);
        foreach($headers as $key=>$value){
            $response->headers->set($key, $value);
        }
        
        return $response;
    }
}