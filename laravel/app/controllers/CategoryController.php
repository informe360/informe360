<?php

class CategoryController extends BaseController{

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
     *   Funcion:		form_category
     *   Descripcion:   Retorna formulario de una nueva categoria
     *
     ************************************************************************/
	public function form_category(){
        $icons_list =  Icons::get_list_icons();
		return View::make('admin/category/form_category',array('icons_list'=>$icons_list));
	}

	/************************************************************************
     *   Funcion:		new_category
     *   Descripcion:   Agrega una nueva categoria
     *
     ************************************************************************/
	public function new_category(){
		$new_categ = Category::register(Input::all());

		if($new_categ['error'] == true){

            Session::flash('danger', "Problemas Al registrar. Revise los Campos que tienen error.");
            return Redirect::back()->withErrors($new_categ['mensaje'])->withInput();

        }elseif($new_categ['error'] == false){

            Session::flash('success', "Al registrar la categoria.");
            return Redirect::back();

        }
	}

    /************************************************************************
     *   Funcion:       list_category
     *   Descripcion:   Retorna un listado de categorias
     *
     ************************************************************************/
    public function list_category(){
        $list = Category::get_list_category();

        Session::flash('list',$list);

        return View::make('admin/category/list_category');
    }

    /************************************************************************
     *   Funcion:       desactivate_category
     *   Descripcion:   Retorna un listado de categorias
     *
     ************************************************************************/
    public function desactivate_category($id){
        if(Category::exist_category($id)){
            $desactivate = Category::desactivate_category($id);
            
            if($desactivate){
                Session::flash('success','Categoria Activada correctamente');
            }else{
                Session::flash('success','Categoria eliminada correctamente');
            }

            return Redirect::back();
        }else{
            return View::make('errors/404');
        }
    }

    /************************************************************************
     *   Funcion:       edit_category
     *   Descripcion:   Retorna el form edita categorias
     *
     ************************************************************************/
    public function edit_category($id){
        if(Category::exist_category($id)){

            $info = Category::show_category($id);
            return View::make('admin/category/form_edit_category',array('category' => $info));

        }else{
            return View::make('errors/404');
        }
    }

    /************************************************************************
     *   Funcion:       update_category
     *   Descripcion:   Actualiza una categoria
     *
     ************************************************************************/
    public function update_category($id){
        if(Category::exist_category($id)){

            $up_category = Category::update_category(Input::all(),$id);

            if($up_category['error'] == true){

                Session::flash('danger', "Problemas Al registrar. Revise los Campos que tienen error.");
                return Redirect::back()->withErrors($up_category['mensaje'])->withInput();

            }elseif($up_category['error'] == false){

                Session::flash('success','Categoria modificada correctamente');
                return Redirect::to('admin/categorias/listar');

            }

        }else{
            return View::make('errors/404');
        }
    }
}