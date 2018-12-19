<?php

class ProductController extends BaseController{

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
     *   Funcion:       select_product
     *   Descripcion:   Retorna el formulario de registro
     *
     ************************************************************************/
    public function select_product(){
        $listCat = Category::get_list_category();
        return View::make('seller/product/select_product', array('listCategory' => $listCat));
    }

    /************************************************************************
     *   Funcion:       ad_post_details
     *   Descripcion:   Retorna el formulario de detalles
     *
     ************************************************************************/
    public function  ad_post_details($id_cat, $id_sub){
        if(SubCategory::exist_subcategory($id_sub) == true && Category::exist_category($id_cat) == true){
            return View::make('seller/product/ad_details', array('id_category'=>$id_cat, 'id_subcategory'=>$id_sub));
        }else{
            return View::make('errors/404');
        }
    }

    /************************************************************************
     *   Funcion:       add_product
     *   Descripcion:   Registra un nuevo producto
     *
     ************************************************************************/
    public function add_product($id_cat, $id_sub){
        if(SubCategory::exist_subcategory($id_sub) == true && Category::exist_category($id_cat) == true){

            $new_product = Product::register(Input::all(), $id_cat, $id_sub);

            if($new_product['error'] == true){

                Session::flash('danger', "Problemas Al registrar la producto. ");
                return Redirect::back()->withErrors($new_product['mensaje'])->withInput();

            }elseif($new_product['error'] == false){

                Session::flash('success', "Al registrar su producto.");
                return Redirect::back();
            }

        }else{
            return View::make('errors/404');
        }
    }

    /************************************************************************
     *   Funcion:       desactivate_product
     *   Descripcion:   Desactiva un producto
     *
     ************************************************************************/
    public function desactivate_product($id){
        if(Product::exist_product($id)){
            Product::desactivate_product($id);

            Session::flash('success', 'Al eliminar el producto');
            return Redirect::back();
        }else{
            return View::make('errors/404');
        }
    }

    /************************************************************************
     *   Funcion:       pending_products
     *   Descripcion:   Retorna una lista de productos pendientes
     *
     ************************************************************************/
    public function pending_products(){
        $products = Product::get_pending();
        return View::make('seller/product/pending_product',array('products'=>$products));
    }

    /************************************************************************
     *   Funcion:       productsNotPublich
     *   Descripcion:   Retorna una lista de los poductos no publicados
     *
     ************************************************************************/
    public function productsNotPublished(){
        return View::make('seller/product/not_published');
    }
}