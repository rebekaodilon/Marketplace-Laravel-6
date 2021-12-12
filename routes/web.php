<?php

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

Route::get('/', function () {

    $helloworld = "Hello World!";
    return view('welcome', compact('helloworld'));
})->name('home');

Route::get('/model', function (){

    // $products = \App\Product::all(); //SELECT * FROM Products

    //    $user = \App\User::find(1);
    //    $user = new \App\User();
    //    $user->name = 'Usuario Teste';
    //    $user->email = 'email@teste.com';
    //    $user->password = bcrypt('12345678');
    //    $user->save();

    //    return \App\User::all();

    //    Mass Assigment - Atribuição em Massa

    //    $user = \App\User::create([
    //        'name' => 'Rebeka Odilon',
    //        'email' => 'rebeka@email.com',
    //        'password' => bcrypt('2134567890')
    //    ]);
    //    dd($user);

    //    Mass Update - Atualização em Massa
    //    $user = \App\User::find(4);
    //    $user->update([
    //        'name' => 'Atualizando com mass update...'
    //    ]); // Retorna true ou false
    //    dd($user);


    /**
     * Como eu faria para pegar a loja de um usuário
     */
    // $user = \App\User::find(6);

    // dd($user->store()->count()); //Objeto único (Store) se for Collection de Dados(Objetos)


    /**
     * Como fazer para pegar os produtos de uma loja?
     */
    // $loja = \App\Store::find(1);

    // return $loja->product;

    /**
     * Como pegar as categorias de uma loja?
     */
    // $categoria = \App\Category::find(1);

    // $categoria->product;


    /**
     * Criar uma loja para um usuário
     */
    // $user = \App\User::find(10);

    // $loja = $user->store()->create([
    //     'name' => 'Loja Teste',
    //     'description' => 'Loja teste de produtos de informática',
    //     'phone' => 'XXXXX-XXXX',
    //     'mobile_phone' => 'XXXXX-XXXX',
    //     'slug' => 'loja-teste'
    // ]);

    /**
     * Criar um produto para uma loja
     */
    // $loja = \App\Store::find(7);

    // $produto = $loja->product()->create([
    //     'name' => 'Notebook Dell',
    //     'description' => 'CORE i9 16GB',
    //     'body' => 'Lorem ipsum dolor sit amet',
    //     'price' => 5999.90,
    //     'slug' => 'notebook-dell',
    // ]);

    /**
     * Criar uma categoria
     */
    // \App\Category::create([
    //     'name' => 'Games',
    //     'description' => null,
    //     'slug' => 'games'
    // ]);

    // \App\Category::create([
    //     'name' => 'Notebooks',
    //     'description' => null,
    //     'slug' => 'notebooks'
    // ]);

    // return \App\Category::all();

    /**
     * Adicionar uma categoria para um produto e vice-versa
     */
    // $produto = \App\Product::find(6);

    // dd($produto->categories()->sync([1, 2]));

    $product = \App\Product::find(6);

    return $product;
});

Route::group(['middleware' => ['auth']], function(){
    Route::prefix('admin')->name('admin.')->namespace('Admin')->group(function(){

        //    Route::prefix('stores')->name('stores.')->group(function(){
        
            //         Route::get('/', 'StoreController@index')->name('index');
        
            //         Route::get('/create', 'StoreController@create')->name('create');
        
            //         Route::post('/store', 'StoreController@store')->name('store');
        
            //         Route::get('/{store}/edit', 'StoreController@edit')->name('edit');
        
            //         Route::post('/update/{store}', 'StoreController@update')->name('update');
        
            //         Route::get('/destroy/{store}', 'StoreController@destroy')->name('destroy');
        
        //    });
        
           Route::resource('stores', 'StoreController');
           Route::resource('products', 'ProductController');
        
        });
});

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');//->middleware('auth');
