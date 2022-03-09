<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
/*
Route::get('/', function () {
    return view('welcome');
});
*/
/**Aqui é informado a URI e @ função de callback ou a string do controlador
 * comando para criação de um controlador: php artisan make:controller <NomeDoControlador>
 * controladores estão em: app>Controllers 
 */
Route::get('/', 'PrincipalController@principal'); 
Route::get('/sobre-nos', 'SobreNosController@sobreNos');
Route::get('/contato', 'ContatoController@contato');

/**Este tipo de Route, não conflita com a anterior
 * devido estar recebendo parametros {nome, categoria, mensagem, etc}
 * o próprio framework consegue diferenciá-la
 * para tornar o parâmetro opcional adicione um ponto exclamação (?) após o parâmetro
 * recomenda-se atribuir um valor padrão à variavel do parâmetro opcional.
 * #######OBS: EXISTE UMA LIMITAÇÃO DE INTERPRETAÇÃO DO LARAVEL#####
 * Os parâmetros opcionais só podem ser informados seguindo a ordem da dir. para esq.
 * de modo que não haja parâmetro sem valor opcional
 * este problema pode ser resolvido com condicionais
 */
Route::get('/contato/{nome?}/{categoria?}/{assunto?}/{mensagem?}', 
      function(string $nome = 'Desconhecido', 
      string $categoria = 'Categoria não informada', 
      string $assunto = 'Sem assunto', 
      string $mensagem = 'mensagem não informada'){
    echo 'Estamos aqui:'.$nome.' '.$categoria.' '.$assunto.' '.$mensagem;
    }
);

/* principais verbos http para controle de requisiçõe de servidores
Route::get($uri, $callback)
get
post
put
patch
delete
options
*/