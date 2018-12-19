<?php

class SubcategoryController extends BaseController{

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
     *   Funcion:		edit_subcategory
     *   Descripcion:   Retorna formulario de edicion de subcategorias
     *
     ************************************************************************/
	public function edit_subcategory($id){
        if(SubCategory::exist_subcategory($id)){

            $subcategory = SubCategory::getSubCategory($id);
            Session::flash('subcategory', $subcategory);

            return View::make('admin/subcategory/form_edit_subcategory',array('id'=>$id));

        }else{
            return View::make('errors/404');
        }
	}

    /************************************************************************
     *   Funcion:       list_subcategory
     *   Descripcion:   Retorna Lista de subcategorias
     *
     ************************************************************************/
    public function list_subcategory($id){
        if(Category::exist_category($id)){

            $list = SubCategory::get_list_subcategory($id);
            Session::flash('list',$list);
            return View::make('admin/subcategory/list_subcategory');

        }else{
            return View::make('errors/404');
        }
        
    }

    /************************************************************************
     *   Funcion:       form_new_subcategory
     *   Descripcion:   Retorna formulario para agregar subcategorias
     *
     ************************************************************************/
    public function form_new_subcategory($id){
        if(Category::exist_category($id)){

            Session::flash('id',$id);
            return View::make('admin/subcategory/form_subcategory');

        }else{
            return View::make('errors/404');
        }
    }

    /************************************************************************
     *   Funcion:       add_new_subcategory
     *   Descripcion:   Agregar subcategorias
     *
     ************************************************************************/
    public function add_new_subcategory($id){
        if(Category::exist_category($id)){
            $new_subcateg = SubCategory::new_register(Input::all(), $id);

            if($new_subcateg['error'] == true){

                Session::flash('danger', "Problemas Al registrar. Revise los Campos que tienen error.");
                return Redirect::back()->withErrors($new_subcateg['mensaje'])->withInput();

            }elseif($new_subcateg['error'] == false){

                $list = SubCategory::get_list_subcategory($id);
                Session::flash('list',$list);
                Session::flash('success', "Al registrar la subcategoria.");
                return Redirect::to('admin/subcategorias/listar/'.$id);

            }
        }else{
            return View::make('errors/404');
        }
    }

    /************************************************************************
     *   Funcion:       desactivate_subcategory
     *   Descripcion:   Desactiva una subcategorias
     *
     ************************************************************************/
    public function desactivate_subcategory($id){
        if(SubCategory::exist_subcategory($id)){

            $activate = SubCategory::desactivate_subcategory($id);

            if($activate){
                Session::flash('success', "Al Activar la subcategoria.");
            }else{
                Session::flash('success', "Al Eliminar la subcategoria.");
            }

            $list = SubCategory::get_list_subcategory($id);
            Session::flash('list',$list);

            return Redirect::to('admin/subcategorias/listar/'.SubCategory::getCategoryId($id));

        }else{
            return View::make('errors/404');
        }
    }

    /************************************************************************
     *   Funcion:       update_subcategory
     *   Descripcion:   Actualiza una subcategorias
     *
     ************************************************************************/
    public function update_subcategory($id){
        if(SubCategory::exist_subcategory($id)){
            $up_subcateg = SubCategory::update_subcategory(Input::all(), $id);

            if($up_subcateg['error'] == true){

                Session::flash('danger', "Problemas Al registrar. Revise los Campos que tienen error.");
                return Redirect::back()->withErrors($up_subcateg['mensaje'])->withInput();

            }elseif($up_subcateg['error'] == false){

                $list = SubCategory::get_list_subcategory(SubCategory::getCategoryId($id));
                Session::flash('list',$list);
                Session::flash('success', "Al actualizar la subcategoria.");
                return Redirect::to('admin/subcategorias/listar/'.SubCategory::getCategoryId($id));

            }
        }else{
            return View::make('errors/404');
        }
    }
}    