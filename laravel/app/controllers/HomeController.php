<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	/************************************************************************
     *   Funcion:		home
     *   Descripcion:   Home del site.
     *
     ************************************************************************/
	public function home(){
          $products = Product::where('status', 1)->get();
		return View::make('home/home', array('products'=>$products));
     }
     
     public function detailsPost($id) {
          $productDetail = Product::where('id', $id)->get();
          $productDetail = $productDetail[0];
          $listCat = Category::get_list_category();
          $user = User::where('id', '=', $productDetail['user_id'])->get()->first();
          $imagesProduct = Image::where('product_id','=',$productDetail->id)->get();
          return View::make('product/details', compact('productDetail', 'user'), array('listCategory' => $listCat, 'imagesProduct' => $imagesProduct));
     }

	/************************************************************************
     *   Funcion: 		login_form
     *   Descripcion:   Redirecciona al formulario de inicio de sesion de
     *					usuario.
     ************************************************************************/
	public function login_form(){
		return View::make('home/form_login');
	}

	/************************************************************************
     *   Funcion: 		register_form
     *   Descripcion:   Redirecciona al formulario de registro de 
     *					usuario.
     ************************************************************************/
	public function register_form(){

		$cities = City::list_cities();
		
		return View::make('home/form_register',array('list_cities'=>$cities));
	}

	/************************************************************************
     *   Funcion: 		register_new_user
     *   Descripcion:   Registro de nuevo usuario comprador/vendedor
     *					
     ************************************************************************/
	public function register_new_user(){

		$new_user = User::register_user(Input::all());

        if($new_user['error'] == true){

            Session::flash('danger', "Problemas Al registrar su cuenta. Revise los Campos que tienen error. ");
            return Redirect::back()->withErrors($new_user['mensaje'])->withInput();

        }elseif($new_user['error'] == false){

            Session::flash('success', "Al registrar su cuenta.");
            return Redirect::back();
        }

	}

	/************************************************************************
     *   Funcion: 		login_validate
     *   Descripcion:   Valida las credenciales del usuario.
     *					Type 1: administrador, 2: comprador, 3: vendedor
     ************************************************************************/
	public function login_validate(){

		if(Auth::attempt(array('email' => Input::get('email'), 'password' => Input::get('password')), true)){

            if (Auth::user()->type == 1 && Auth::user()->status == 1) {
                return Redirect::to('/admin');
            }elseif(Auth::user()->type == 2 && Auth::user()->status == 1){
            	return Redirect::to('/comprador');
            }elseif(Auth::user()->type == 3 && Auth::user()->status == 1){
            	return Redirect::to('/vendedor/nuevo-anuncio');
            }elseif((Auth::user()->type == 1 && Auth::user()->status == 0) || (Auth::user()->type == 1 && Auth::user()->status == 2)){
            	Session::flash('danger', "Su cuenta esta inactiva o cerrada. Comun&iacute;quese con el administrador de la p&aacute;gina");
           		return Redirect::back();
            }elseif((Auth::user()->type == 2 && Auth::user()->status == 0) || (Auth::user()->type == 2 && Auth::user()->status == 2)){
            	Session::flash('danger', "Su cuenta esta inactiva o cerrada. Comun&iacute;quese con el administrador de la p&aacute;gina");
           		return Redirect::back();
            }elseif((Auth::user()->type == 3 && Auth::user()->status == 0) || (Auth::user()->type == 3 && Auth::user()->status == 2)){
            	Session::flash('danger', "Su cuenta esta inactiva o cerrada. Comun&iacute;quese con el administrador de la p&aacute;gina");
           		return Redirect::back();
            }
        }else{
            Session::flash('danger', "Correo o Contraseña invalida.");
            return Redirect::back();
        }
	}

	/************************************************************************
     *   Funcion: 		home_admin
     *   Descripcion:   Redirecciona al home del usuario administrador
     *					
     ************************************************************************/
	public function home_admin(){
          $products = Product::where('status', 1)->get();
		return View::make('admin/home', array('products'=>$products));
	}

	/************************************************************************
     *   Funcion: 		home_buyer
     *   Descripcion:   Redirecciona al home del usuario comprador
     *					
     ************************************************************************/
	public function home_buyer(){
		return View::make('buyer/home');
	}

	/************************************************************************
     *   Funcion: 		home_seller
     *   Descripcion:   Redirecciona al home del usuario vendedor
     *					
     ************************************************************************/
	public function home_seller(){
        $products = Product::get_list(Auth::user()->id);
		return View::make('seller/home', array('products'=>$products));
	}

	/************************************************************************
    *   Funcion: logout                                                    
    *   Descripcion: Se encarga de desloguear al usuario.
    *                                             
    ************************************************************************/
    protected function logout(){
    
        Auth::logout();
       
        return Redirect::to('/');
    }

    /*    Funcion showCategories
          descripcion: Busca las categorias y las muestras en una nueva vista junto con los anuncios
    */
    public function showCategories(){
          $list = Category::get_list_category();
          $products = Product::where('status', 1)->get();          
          return View::make('home/category', array('list'=>$list, 'products'=>$products));
    }

     /*    Funcion showCategoriesFilter
          descripcion: Busca las publicaciones de la categoria seleccionada.
    */
     public function showCategoriesFilter($id){
          $list = Category::get_list_category();
          $products = ProdCateSubc::join('product', 'prod_cate_subc.product_id', '=', 'product.id')
               ->join('category', 'prod_cate_subc.category_id', '=', 'category.id')
               ->join('subcategory', 'prod_cate_subc.subcategory_id', '=', 'subcategory.id')
               ->where('category.name', '=', $id)
               ->select('product.*', 'category.name as categoria', 'subcategory.name as subcategoria')
               ->get();
          return View::make('home/category', array('list'=>$list, 'products'=>$products));
     }

    /*    Funcion allPost
          descripcion: Funcion que retorna todo los articulos por paginacion.
    */
    public function allPost(){
     $list = Category::get_list_category();
     return View::make('home/all-post', array('list'=>$list));
}
}
