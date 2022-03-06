<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PrincipalController extends Controller
{
    /**Esta função realiza a chamada da view (nativa do artisan)
     * que tem como parâmetro a view (página) 
     * armazenada em: resources>views> <nome_da_página.blade.php>
     * NOTE: a extensão .blade.php deverá ser omitida
     */
    public function principal(){
        return view('site.principal');
    }
}
