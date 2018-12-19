<?php

class AdsController extends BaseController {

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
     *   Funcion:		form_ads
     *   Descripcion:   Devuelve el formulario de nueva publicacion.
     *
     ************************************************************************/
	public function form_ads(){
		return View::make('admin/ads/form_ads');
	}

	/************************************************************************
     *   Funcion:		list_ads
     *   Descripcion:   Devuelve el listado de publicaciones.
     *
     ************************************************************************/
	public function list_ads(){

		$ad_list =  Ads::get_list_ads();
		return View::make('admin/ads/list_ads',array('ad_list'=>$ad_list));
	}

	/************************************************************************
     *   Funcion:		new_ads
     *   Descripcion:   Crea una nueva publicacion
     *
     ************************************************************************/
	public function new_ads(){

		$new_ad = Ads::register_new_ad(Input::all());

        if($new_ad['error'] == true){

            Session::flash('danger', "Problemas Al registrar la publicaci&oacute;n ");
            return Redirect::back()->withErrors($new_ad['mensaje'])->withInput();

        }elseif($new_ad['error'] == false){

            Session::flash('success', "Al registrar su publicaci&oacute;n.");
            return Redirect::back();
        }

	}

	/************************************************************************
     *   Funcion:		deactivate_ad
     *   Descripcion:   Desactiva una publicacion.
     *
     ************************************************************************/
	public function deactivate_ad($id){

		$ad_deactivate =  Ads::deactivate_ads($id);
		return Redirect::to('/admin/publicaciones/listado')->with('msj',"Al Desactivar Publicacion!");
	}

	/************************************************************************
     *   Funcion:		activate_ad
     *   Descripcion:   Reactiva una publicacion.
     *
     ************************************************************************/
	public function activate_ad($id){

		$ad_activate =  Ads::activate_ad($id);
		return Redirect::to('/admin/publicaciones/listado')->with('msj',"Al Activar la Publicacion!");
	}

	/************************************************************************
     *   Funcion:		form_edit_ad
     *   Descripcion:   Mustra Formulario Editar una publicacion.
     *
     ************************************************************************/
	public function form_edit_ad($id){

		$ad_edit =  Ads::search_ad($id);
		return View::make('admin/ads/form_edit_ads',array('ad_edit'=>$ad_edit));
	}

	/************************************************************************
     *   Funcion:		edit_ad
     *   Descripcion:   Editar una publicacion.
     *
     ************************************************************************/
	public function edit_ad(){

		$update_add = Ads::update_ad(Input::all());

        if($update_add['error'] == true){
            return Redirect::back()->withErrors($update_add['mensaje'])->withInput();
        }
        elseif($update_add['error'] == false){
            return Redirect::to('/admin/publicaciones/listado')->with('msj',"Al Modificar la publicacion!");
        }
	}
}