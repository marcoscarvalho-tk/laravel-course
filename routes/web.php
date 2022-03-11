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
/**##Comandos##
 * php artisan route:list => retorna  uma lista com todas as rotas
 * php artisan serve => starta o servidor local
/*
Route::get('/', function () {
    return view('welcome');
});
*/
/**Aqui é informado a URI e @ função de callback ou a string do controlador
 * comando para criação de um controlador: php artisan make:controller <NomeDoControlador>
 * controladores estão em: app>Controllers 
 * o método name() tem a função de substituir os path absoluto das rotas
 * Ex: /contato => site.contato. 
 * Porém a sintax deverá ser incluida, a função route() dentro de chaves duplas 
 * Ex:{{'route(site.contato)')}} Vide exemplo em contato.blade.php
 */
Route::get('/', 'PrincipalController@principal')->name('site.index'); 
Route::get('/sobre-nos', 'SobreNosController@sobreNos')->name('site.sobrenos');
Route::get('/contato', 'ContatoController@contato')->name('site.contato');
Route::get('/login', function(){return 'login';})->name('site.login');

/**O objeto Route::prefix realiza um agrupamento de rotas
 * dentro de uma função de callback do método group()abaixo
 * em um novo diretório (ex: /app)
  */
Route::prefix('/app')->group(function(){
    Route::get('/clientes', function(){return 'Cliente';})->name('app.clientes');
    Route::get('/fornecedores', function(){return 'Fornecedores';})->name('app.fornecedores');
    Route::get('/produtos', function(){return 'Produtos';})->name('app.login');

});

/**Rota de redirecionamento 
 * O método redirect() realiza um redirecionamento de rotas
 * abaixo temos um exemplo:
 * caso seja acessada a /rota2,
 * automaticamente será redirecionado para /rota1 
 */
Route::get('/rota1', function(){
  echo 'Rota 1';
})->name('site.rota1');

Route::get('/rota2', function(){
  return redirect()->route('site.rota1');
})->name('site.rota2');

/*Outro exemplo de redirect 
Route::redirect('/rota2','rota1');
*/

/** Rota de contingência 
 * O método fallback() realiza um procedimento predefinido caso o usuário tente acessar uma rota inexistente
 * no caso abaixo, foi predeterminado uma opção de retorno à página principal com o emprego de um link
 * caso não seja adotada a função de fallback() o framework exibirá um erro de página não encontrada (404) padrão.
  */
Route::fallback(function(){
  echo 'A rota acessada não existe. <a href="'.route('site.index').'">clique aqui</a> para retornar a página principal';
});



/**Este tipo de Route, não conflita com a rota /contato apenas
 * devido estar recebendo parametros {nome, categoria, mensagem, etc} na URI
 * o próprio framework consegue diferenciá-la
 * para tornar o parâmetro opcional adicione um ponto exclamação (?) após o parâmetro
 * recomenda-se atribuir um valor padrão à variavel do parâmetro opcional.
 * #######OBS: EXISTE UMA LIMITAÇÃO DE INTERPRETAÇÃO DO LARAVEL#####
 * Os parâmetros opcionais só podem ser informados seguindo a ordem da dir. para esq.
 * de modo que não haja parâmetro sem valor opcional
 * este problema pode ser resolvido com condicionais
 
Route::get('/contato/{nome?}/{categoria?}/{assunto?}/{mensagem?}', 
      function(string $nome = 'Desconhecido', 
      string $categoria = 'Categoria não informada', 
      string $assunto = 'Sem assunto', 
      string $mensagem = 'mensagem não informada'){
    echo 'Estamos aqui:'.$nome.' '.$categoria.' '.$assunto.' '.$mensagem;
    }
);
*/

/**Para garantir que sejam enviados nomes (ou pelo menos um) no parametro {nome}
 * implementa-se uma expressão regular restringindo o valor em caracter não numérico
 * invertendo a lógica,o parâmetro {categoria_id} serão enviados apenas caracteres
 * numéricos
 
Route::get('/contato/{nome}/{categoria_id}', 
      function(string $nome = 'Desconhecido', 
      int $categoria_id = 1 // 1 = 'Informação'
      ){
    echo 'Estamos aqui:'.$nome.' '.$categoria_id;
    }
)->where('categoria_id','[0-9]+')->where('nome','[A-Za-z]+');
*/


/* principais verbos http para controle de requisiçõe de servidores
Route::get($uri, $callback)
get
post
put
patch
delete
options
*/