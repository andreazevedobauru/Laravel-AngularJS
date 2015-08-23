<?php
/**
 * Created by PhpStorm.
 * User: andreazevedo
 * Date: 8/23/15
 * Time: 18:15
 */

namespace GerenciadorProjeto\OAuth;

use Illuminate\Support\Facades\Auth;

class Verifier
{

    public function verify($username, $password)
    {
        $credentials = [
            'email'    => $username,
            'password' => $password,
        ];

        if (Auth::once($credentials)) {
            return Auth::user()->id;
        }

        return false;
    }

}