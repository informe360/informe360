<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/


/*
|--------------------------------------------------------------------------
| 								Home
|--------------------------------------------------------------------------
|
*/

// Vista del Home
Route::get('/','HomeController@home');
// Formulario de Login
Route::get('/login','HomeController@login_form');
// Formulario de Registro
Route::get('/register','HomeController@register_form');
// Home Categorias
Route::get('/categorias','HomeController@showCategories');
// Home ruta para buscar los anuncios segun lo que inserte en el campo
Route::post('/buscando-anuncios','HomeController@buscadorAnuncios');
// Home Categoria filtrada.
Route::get('/categorias/{id}','HomeController@showCategoriesFilter');
// Home all anuncios
Route::get('/todos-los-anuncios','HomeController@allPost');
// Home ver detalles de un anuncio
Route::get('/anuncio/detalles/{id}','HomeController@detailsPost');
// Validar Login
Route::post('validate-login', 'HomeController@login_validate');
// Registro de Usuario
Route::post('register-new-user', 'HomeController@register_new_user');
//Route::get('register-new-user', 'HomeController@register_new_user');
// Cerrar Sesion
Route::get('logout', 'HomeController@logout');
/*
|--------------------------------------------------------------------------
| 								Admin
|--------------------------------------------------------------------------
|
*/

// Home del administrador
Route::get('/admin','HomeController@home_admin');

/*
| 								Publicaciones
*/

// Formulario de registro de publicaciones
Route::get('/admin/publicaciones/nuevo','AdsController@form_ads');
// Listado de Publicaciones
Route::get('/admin/publicaciones/listado','AdsController@list_ads');
// Crear nueva publicacion
Route::post('admin/publicaciones/agregar_nueva', 'AdsController@new_ads');
// Desactivar publicacion
Route::get('/admin/publicaciones/desactivar-publicacion/{id}', 'AdsController@deactivate_ad');
// Activar publicacion
Route::get('/admin/publicaciones/activar-publicacion/{id}', 'AdsController@activate_ad');
// Vista Editar publicacion
Route::get('/admin/publicaciones/vista-modificar-publicacion/{id}', 'AdsController@form_edit_ad');
// Editar publicacion
Route::post('/admin/publicaciones/add-edit-ads', 'AdsController@edit_ad');

/*
| 								Administrador
*/

// Formulario nuevo administrador
Route::get('admin/nuevo-admin','UsersController@form_admin');
// Crear nuevo administrador
Route::post('admin/agregar','UsersController@new_admin');
// Listado de los administradores
Route::get('admin/listado-administradores','UsersController@list_admin');
// Editar administrador
Route::get('admin/editar-administrador/{id}','UsersController@edit_admin');
// Desactiva al administrador seleccionado
Route::get('admin/desactivar/{id}','UsersController@desactivate_admin');
// Activa al administrador seleccionado
Route::get('admin/activar/{id}','UsersController@activate_admin');
// Actualizar un administrador
Route::post('admin/actualizar/{id}','UsersController@update_admin');

/*
| 								Compradores
*/

// Listado de los compradores
Route::get('/admin/listado-compradores','UsersController@list_buyer');
// Listado de los vendedores
Route::get('/admin/listado-vendedores','UsersController@list_seller');
// Desactiva o activa al comprador seleccionado
Route::get('admin/cambiar_comprador/{id}','UsersController@change_status_buyer');

/*
| 								Vendedores
*/

// Listado de los vendedores
Route::get('/admin/listado-vendedores','UsersController@list_seller');
// Desactiva o activa al vendedor seleccionado
Route::get('admin/cambiar_vendedor/{id}','UsersController@change_status_seller');

/*
| 								Categoria
*/

// Crear una nueva categoria
Route::get('admin/categorias/nueva','CategoryController@form_category');
// Agrega una nueva categoria
Route::post('admin/categorias/nueva','CategoryController@new_category');
// Listar categorias
Route::get('admin/categorias/listar','CategoryController@list_category');
// Desactiva la categoria seleccionada
Route::get('admin/categorias/desactivar/{id}','CategoryController@desactivate_category');
// Retorrna vista Editar la categoria seleccionada
Route::get('admin/categorias/editar/{id}','CategoryController@edit_category');
// Actualiza la cateoria indicada
Route::post('admin/categorias/actualizar/{id}','CategoryController@update_category');

/*
| 								SubCategoria
*/

// Listar subcategorias
Route::get('admin/subcategorias/listar/{id}','SubcategoryController@list_subcategory');
// Editar subcategorias
Route::get('admin/subcategorias/editar/{id}','SubcategoryController@edit_subcategory');
// Retorna el formulario para agregar una nueva subcategorias
Route::get('admin/subcategorias/agregar-nueva/{id}','SubcategoryController@form_new_subcategory');
// Agregar nueva subcategorias
Route::post('admin/subcategorias/agregar/{id}','SubcategoryController@add_new_subcategory');
// Desactiva o activa una subcategorias
Route::get('admin/subcategorias/desactivar/{id}','SubcategoryController@desactivate_subcategory');
// Actualiza una subcategorias
Route::post('admin/subcategorias/Actualizar/{id}','SubcategoryController@update_subcategory');
// Retorna perfil de usuario administrador
Route::get('admin/perfil','UsersController@profile_admin');
// Actualiza el perfil de usuario administrador
Route::post('admin/actualizar_pefil','UsersController@update_profile_admin');
// Muestra un usuario indicado
Route::post('admin/users/details','UsersController@get_details');

/*
| 								Iconos
*/

// Formulario para agregar nuevo icono
Route::get('admin/icono/nuevo','IconController@form_new_icon');
// Agrega un nuevo icono
Route::post('admin/icono/nuevo','IconController@form_new_icon');
// Listado de iconos
Route::get('admin/icono/listar','IconController@list_icons');
// Desactivar icono
Route::get('/admin/icono/desactivar-icono/{id}', 'IconController@deactivate_icon');
// Activar icono
Route::get('/admin/icono/activar-icono/{id}', 'IconController@activate_icon');
// Formulario Editar icono
Route::get('/admin/icono/vista-modificar-icono/{id}', 'IconController@form_edit_icon');
// Editar icono
Route::post('/admin/icono/edit-icon', 'IconController@edit_icon');

/*
|--------------------------------------------------------------------------
| 								Buyer
|--------------------------------------------------------------------------
|
*/
Route::get('/comprador','HomeController@home_buyer');

/*
|--------------------------------------------------------------------------
| 								Seller
|--------------------------------------------------------------------------
|
*/
//Retona el home del vendedor
Route::get('/vendedor','HomeController@home_seller');
//Retorna formulario para registrar anuncio
Route::get('vendedor/nuevo-anuncio','ProductController@select_product');
//Retorna Perfil del vendedor
Route::get('vendedor/perfil','UsersController@profile_seller');
//Retorna formulario de detalles
Route::get('vendedor/agregar-detalles/{id_cat}/{id_sub}','ProductController@ad_post_details');
//Registra un nuevo producto
Route::post('vendedor/agregar_producto/{id_cat}/{id_sub}','ProductController@add_product');
//Desactiva un producto seleccionado
Route::get('vendedor/desactivar/{id}','ProductController@desactivate_product');
//Activa un producto seleccionado
Route::get('vendedor/activar/{id}','ProductController@activate_product');
//Retorna los anuncios no publicados
Route::get('vendedor/no-publicados','ProductController@productsNotPublished');
//Retorna los productos pendientes
Route::get('vendedor/productos-pendientes','ProductController@pending_products');