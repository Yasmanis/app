<?php

namespace App\Http\Middleware;

use App\Http\Repository\TokenRepository;
use Closure;

class ValidateToken
{
    protected $tokenRepository;
    public function __construct(TokenRepository $tokenRepository)
    {
        $this->tokenRepository = $tokenRepository;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle($request, Closure $next)
    {
        if ($this->tokenRepository->find($request)) return $next($request);
        return abort(401);
    }
}
