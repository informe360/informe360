<?php

class SubCategory extends Eloquent{

	protected $table = 'subcategory';
    protected $fillable = array('category_id','name');

	/************************************************************************
     *   Funcion:		register
     *   Descripcion:   Registra una nueva subcategoria desde
     *                  form categorias
     *
     ************************************************************************/
	public static function register($name, $categ_id){

        try {
            
            DB::beginTransaction();

            $subcategory                   = New SubCategory();
            $subcategory->category_id      = $categ_id;
            $subcategory->name             = $name;
            $subcategory->status           = 1;

            if ($subcategory->save()) {

                DB::commit();

                return 1;

            }

        }catch(\Exception $e){

            DB::rollback();

            $errores                =   New ErrorIncidence();
            $errores->script        =   "SubCategory";
            $errores->funcion       =   "register";
            $errores->codigo        =   $e->getCode();
            $errores->linea         =   $e->getLine();
            $errores->descripcion   =   $e->getMessage();
            $errores->save();
        }
	}

    /************************************************************************
     *   Funcion:       new_register
     *   Descripcion:   Registra una nueva subcategoria
     *
     ************************************************************************/
    public static function new_register($inputs, $categ_id){

        $rules = array(
            'subcategory-1'             => array('required'),
            );

        $validator = Validator::make($inputs, $rules);

        if ($validator->fails()){
            // si no cumple las reglas se van a devolver los errores al controlador
            $response['mensaje']     = $validator;
            $response['error']       = true;

            return $response;

        }else {

            try {

                DB::beginTransaction();

                $num_subcateg = count($inputs);

                $subcategory = null;
                for($i = 1; $i <= $num_subcateg; $i++){
                    if(!empty($inputs['subcategory-'.$i])){

                        $subcategory                   = New SubCategory();
                        $subcategory->category_id      = $categ_id;
                        $subcategory->name             = $inputs['subcategory-'.$i];
                        $subcategory->status           = 1;

                        $subcategory->save();

                    }
                }

                $response['error']  = false;
                $response['data']   = $subcategory;

                DB::commit();

                return $response;

            }catch(\Exception $e){

                DB::rollback();

                $errores                =   New ErrorIncidence();
                $errores->script        =   "SubCategory";
                $errores->funcion       =   "new_register";
                $errores->codigo        =   $e->getCode();
                $errores->linea         =   $e->getLine();
                $errores->descripcion   =   $e->getMessage();
                $errores->save();
            }
        }
    }

    /************************************************************************
     *   Funcion:       get_list_subcategory
     *   Descripcion:   Retorna un listado de las subcategorias
     *
     ************************************************************************/
    public static function get_list_subcategory($id){
        try{

            DB::beginTransaction();

            $list = SubCategory::where('category_id','=',$id)->get();

            DB::commit();
            
            return $list;

        }catch(\Exception $e){

            DB::rollback();

            $errores                =   New ErrorIncidence();
            $errores->script        =   "SubCategory";
            $errores->funcion       =   "get_list_subcategory";
            $errores->codigo        =   $e->getCode();
            $errores->linea         =   $e->getLine();
            $errores->descripcion   =   $e->getMessage();
            $errores->save();
        }
    }

    /************************************************************************
     *   Funcion:       exist_subcategory
     *   Descripcion:   Indica si la subcategoria existe
     *
     ************************************************************************/
    public static function exist_subcategory($id){
        $subcategory = SubCategory::find($id);

        if(is_null($subcategory)){
            return false;
        }else{
            return true;
        }
    }

    /************************************************************************
     *   Funcion:       desactivate_subcategory
     *   Descripcion:   Desactiva una subcategoria indicada
     *
     ************************************************************************/
    public static function desactivate_subcategory($id){
        try{

            DB::beginTransaction();

            $activate = false;

            $subcategory = SubCategory::find($id);
            $subcategory->status = !$subcategory->status;
            $activate = $subcategory->status;
            $subcategory->save();

            DB::commit();

            if($activate){
                return true;
            }else{
                return false;
            }

        }catch(\Exception $e){

            DB::rollback();

            $errores                =   New ErrorIncidence();
            $errores->script        =   "SubCategory";
            $errores->funcion       =   "desactivate_subcategory";
            $errores->codigo        =   $e->getCode();
            $errores->linea         =   $e->getLine();
            $errores->descripcion   =   $e->getMessage();
            $errores->save();
        }
    }

    /************************************************************************
     *   Funcion:       getCategoryId
     *   Descripcion:   Retorna el id de la categoria a la que
     *                  pertenece la subcategoria indicada
     *
     ************************************************************************/
    public static function getCategoryId($id){
        return SubCategory::find($id)->category_id;
    }

    /************************************************************************
     *   Funcion:       getSubCategory
     *   Descripcion:   Retorna la info de una subcategoria
     *
     ************************************************************************/
    public static function getSubCategory($id){
        return SubCategory::find($id);
    }

    /************************************************************************
     *   Funcion:       getSubCategory
     *   Descripcion:   Retorna la info de una subcategoria
     *
     ************************************************************************/
    public static function update_subcategory($inputs, $id){

        $rules = array(
            'subcategory-1'             => array('required'),
            );

        $validator = Validator::make($inputs, $rules);

        if ($validator->fails()){
            // si no cumple las reglas se van a devolver los errores al controlador
            $response['mensaje']     = $validator;
            $response['error']       = true;

            return $response;

        }else {

            try {

                DB::beginTransaction();

                $subcategory                   = SubCategory::find($id);
                $subcategory->name             = $inputs['subcategory-1'];

                if($subcategory->save()){
                    $response['error']  = false;
                    $response['data']   = $subcategory;

                    DB::commit();

                    return $response;
                }   

            }catch(\Exception $e){

                DB::rollback();

                $errores                =   New ErrorIncidence();
                $errores->script        =   "SubCategory";
                $errores->funcion       =   "update_subcategory";
                $errores->codigo        =   $e->getCode();
                $errores->linea         =   $e->getLine();
                $errores->descripcion   =   $e->getMessage();
                $errores->save();
            }
        }
    }
}