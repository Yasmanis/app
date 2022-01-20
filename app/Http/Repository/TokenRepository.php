<?php

namespace App\Http\Repository;

class TokenRepository
{
    protected $model;

    public function __construct()
    {
        $this->model = \App\Models\Token::class;
    }

    public function find($request)
    {
        return isset($request->token) && $this->model::where('token', $request->token)->first();
    }
}
