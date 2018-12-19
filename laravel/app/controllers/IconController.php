<?php

class IconController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| IconController Controller
	|--------------------------------------------------------------------------
	*/

	/************************************************************************
     *   Funcion:		form_new_icon
     *   Descripcion:   Devuelve el formulario de nuevo icono.
     *
     ************************************************************************/
	public function form_new_icon(){
		
		if(!Auth::check()){
            return Redirect::to('/login');
        }

        if(isset($_POST['saveicon'])){
            $new_icon = Icons::save_icon(Input::all());  

            if($new_icon['error'] == true){
            	Session::flash('danger', "Problemas Al registrar el &iacute;cono ");
                return Redirect::back()->withErrors($new_icon['mensaje'])->withInput();

            }elseif($new_icon['error'] == false){ 
                //return Redirect::to('admin/icono/nuevo')->with('msj',$new_icon['mensaje']);
                Session::flash('success', "Al registrar el &iacute;cono");
            	return Redirect::back();

            }
        }

		return View::make('admin/icons/form_icon');
	}

	/************************************************************************
     *   Funcion:		list_icons
     *   Descripcion:   Devuelve el listado de iconos.
     *
     ************************************************************************/
	public function list_icons(){

		$icons_list =  Icons::get_list_icons();
		//var_dump($icons_list);
		return View::make('admin/icons/list_icons',array('icons_list'=>$icons_list));
	}

	/************************************************************************
     *   Funcion:		deactivate_icon
     *   Descripcion:   Desactiva un icono.
     *
     ************************************************************************/
	public function deactivate_icon($id){

		$get_category_icon = Category::get_icon($id);

		if($get_category_icon==true){
			Session::flash('danger', "El &iacute;cono esta asociado a una categor&iacute;a. Debe cambiar el icono de la categor&iacute;a para poder desactivar el &iacute;cono!");
            return Redirect::back();
		}

		$icon_deactivate =  Icons::deactivate_icon($id);
		return Redirect::to('/admin/icono/listar')->with('msj',"Al Desactivar el Icono!");
	}

	/************************************************************************
     *   Funcion:		activate_icon
     *   Descripcion:   activa un icono.
     *
     ************************************************************************/
	public function activate_icon($id){

		$icon_activate =  Icons::activate_icon($id);
		return Redirect::to('/admin/icono/listar')->with('msj',"Al Desactivar el Icono!");
	}

	/************************************************************************
     *   Funcion:		form_edit_icon
     *   Descripcion:   Mustra Formulario Editar un icono.
     *
     ************************************************************************/
	public function form_edit_icon($id){

		$icon_edit =  Icons::search_icon($id);
		//var_dump($icon_edit);exit;
		return View::make('admin/icons/form_edit_icon',array('icon_edit'=>$icon_edit));
	}

	/************************************************************************
     *   Funcion:		edit_icon
     *   Descripcion:   Editar informacion del icono.
     *
     ************************************************************************/
	public function edit_icon(){

		$update_icon = Icons::update_icon(Input::all());

        if($update_icon['error'] == true){
            return Redirect::back()->withErrors($update_icon['mensaje'])->withInput();
        }
        elseif($update_icon['error'] == false){
            return Redirect::to('/admin/icono/listar')->with('success',"Al Modificar el icono!");
        }
	}
}