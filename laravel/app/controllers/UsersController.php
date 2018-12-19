<?php

class UsersController extends BaseController{

    /************************************************************************
     *   Funcion:       __construct
     *   Descripcion:   Constructor de la clase (verifica que el usuario
     *                  este logeado)
     *
     ************************************************************************/
    public function __construct(){
        $this->beforeFilter('auth');
    }

	/************************************************************************
     *   Funcion:		form_admin
     *   Descripcion:   Retorna el formulario de nuevo administrador
     *
     ************************************************************************/
	public function form_admin(){
		return View::make('admin/admin/form_admin');
	}

	/************************************************************************
     *   Funcion:		new_admin
     *   Descripcion:   Crea un nuevo administrador
     *
     ************************************************************************/
	public function new_admin(){
		$new_user = User::register_admin(Input::all());

        if($new_user['error'] == true){

            Session::flash('danger', "Problemas Al registrar. Revise los Campos que tienen error.");
            return Redirect::back()->withErrors($new_user['mensaje'])->withInput();

        }elseif($new_user['error'] == false){

            Session::flash('success', "Al registrar el administrador.");
            return Redirect::back();
        }
	}

	/************************************************************************
     *   Funcion:		list_admin
     *   Descripcion:   Retorna un listado de los administradores
     *
     ************************************************************************/
	public function list_admin(){
		$list = User::get_list_admin();

		Session::flash('list',$list);

		return View::make('admin/admin/list_admin');
	}

	/************************************************************************
     *   Funcion:		edit_admin
     *   Descripcion:   Retorna la vista de edicion de administrador
     *
     ************************************************************************/
	public function edit_admin($id){
        if(User::exist_admin($id)){

            $info = User::show_admin($id);
            return View::make('admin/admin/form_edit_admin', array('admin' => $info));

        }else{
            // Redireccionamos a la vista 404
            return View::make('errors/404');
        }
	}

	/************************************************************************
     *   Funcion:		desactivate_admin
     *   Descripcion:   Esta funcion permite desactivar un administrador
     *
     ************************************************************************/
	public function desactivate_admin($id){
        if(User::exist_admin($id)){

            User::update_status_admin($id, 0);
            Session::flash('success','Administrador desactivado correctamente');
            return Redirect::back();

        }else{
            // Redireccionamos a la vista 404
            return View::make('errors/404');
        }
	}

	/************************************************************************
     *   Funcion:		activate_admin
     *   Descripcion:   Esta funcion permite activar un administrador
     *
     ************************************************************************/
	public function activate_admin($id){
		if(User::exist_admin($id)){

            User::update_status_admin($id, 1);
            Session::flash('success','Administrador activado correctamente');
            return Redirect::back();

        }else{
            // Redireccionamos a la vista 404
            return View::make('errors/404');
        }
	}

	/************************************************************************
     *   Funcion:		update_admin
     *   Descripcion:   Actualiza un administrador
     *
     ************************************************************************/
	public function update_admin($id){
        if(User::exist_admin($id)){

            $up_admin = User::update_admin(Input::all(), $id);

            if($up_admin['error'] == true){

                Session::flash('danger', "Problemas Al registrar. Revise los Campos que tienen error.");
                return Redirect::back()->withErrors($up_admin['mensaje'])->withInput();

            }elseif($up_admin['error'] == false){

                Session::flash('success','Administrador modificado correctamente');
                return Redirect::to('admin/listado-administradores');

            }

        }else{
            // Redireccionamos a la vista 404
            return View::make('errors/404');
        }
	}

    /************************************************************************
     *   Funcion:       list_buyer
     *   Descripcion:   Retorna un listado de los compradores
     *
     ************************************************************************/
    public function list_buyer(){
        $list = User::get_list_buyer();

        Session::flash('list',$list);

        return View::make('admin/buyer/list_buyer');
    }

    /************************************************************************
     *   Funcion:       list_seller
     *   Descripcion:   Retorna un listado de los vendedores
     *
     ************************************************************************/
    public function list_seller(){
        $list = User::get_list_seller();

        Session::flash('list',$list);

        return View::make('admin/seller/list_seller');
    }

    /************************************************************************
     *   Funcion:       change_status_buyer
     *   Descripcion:   Esta funcion permite activar o 
     *                  desactivar un comprador
     *
     ************************************************************************/
    public function change_status_buyer($id){
        if(User::user_exist($id)){
            $active = User::update_status_duyer_seller($id);
            if($active == true){
                Session::flash('success','Comprador activado correctamente');
            }else{
                Session::flash('success','Comprador desactivado correctamente');
            }
            return Redirect::back();
        }else{
            return View::make('errors/404');
        }
    }

    /************************************************************************
     *   Funcion:       change_status_seller
     *   Descripcion:   Esta funcion permite activar o 
     *                  desactivar un vendedor
     *
     ************************************************************************/
    public function change_status_seller($id){
        if(User::user_exist($id)){
            $active = User::update_status_duyer_seller($id);
            if($active == true){
                Session::flash('success','Vendedor activado correctamente');
            }else{
                Session::flash('success','Vendedor desactivado correctamente');
            }
            return Redirect::back();
        }else{
            return View::make('errors/404');
        }
    }

    /************************************************************************
     *   Funcion:       pofile_admin
     *   Descripcion:   Retorna el perfil del usuario
     *
     ************************************************************************/
    public function profile_admin(){
        $user = Auth::user();
        return View::make('admin/user/profile',array('user' => $user));
    }

    /************************************************************************
     *   Funcion:       update_pofile_admin
     *   Descripcion:   Actuliza el perfil del usuario
     *
     ************************************************************************/
    public function update_profile_admin(){
        $up_profile = User::update_profile_admin(Input::all());

        if($up_profile['error'] == true){

            return Redirect::back()->withErrors($up_profile['mensaje'])->withInput();

        }elseif($up_profile['error'] == false){

            Session::flash('success','Perfil modificado correctamente');
            return Redirect::to('admin/perfil');

        }
    }

    /************************************************************************
     *   Funcion:       get_details
     *   Descripcion:   Retorna los detalles de un usuaio
     *
     ************************************************************************/
    public function get_details(){
        $data = User::details(Input::all());
        return Response::json($data);
    }

    /************************************************************************
     *   Funcion:       pofile_seller
     *   Descripcion:   Retorna el perfil del usuario
     *
     ************************************************************************/
    public function profile_seller(){
        $user = Auth::user();
        return View::make('seller/user/profile',array('user' => $user));
    }

    /************************************************************************
     *   Funcion:       update_pofile_seller
     *   Descripcion:   Actuliza el perfil del usuario
     *
     ************************************************************************/
    public function update_profile_seller(){
        $up_profile = User::update_profile_seller(Input::all());

        if($up_profile['error'] == true){

            return Redirect::back()->withErrors($up_profile['mensaje'])->withInput();

        }elseif($up_profile['error'] == false){

            Session::flash('success','Perfil modificado correctamente');
            return Redirect::to('vendedor/perfil');

        }
    }
} 