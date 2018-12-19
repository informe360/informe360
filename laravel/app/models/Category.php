<?php

class Category extends Eloquent{

	protected $table = 'category';
    protected $fillable = array('name','icon_id');

	/************************************************************************
     *   Funcion:		register
     *   Descripcion:   Registra una nueva categoria
     *
     ************************************************************************/
	public static function register($inputs){

		$rules = array(
            'name'              => array('required','unique:category,name'),
            'icon'              => array('required'),
            'subcategory-1'     => array('required'),
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

                $category                   = new Category();
                $category->name             = $inputs['name'];
                $category->icon_id          = $inputs['icon'];
                $category->status           = 1;
                
                if ($category->save()) {

					$id = $category->id;
                	$num_subcateg = count($inputs)-3;

                    DB::commit();

                	for($i = 1; $i <= $num_subcateg; $i++){
                		if(!empty($inputs['subcategory-'.$i])){
							SubCategory::register($inputs['subcategory-'.$i], $id);
                		}
            		}

                    $response['error']  = false;
                    $response['data']   = $category;

                    return $response;

                }

            }catch(\Exception $e){

                DB::rollback();

                $errores                =   New ErrorIncidence();
                $errores->script        =   "Category";
                $errores->funcion       =   "register";
                $errores->codigo        =   $e->getCode();
                $errores->linea         =   $e->getLine();
                $errores->descripcion   =   $e->getMessage();
                $errores->save();
            }
        }
	}

	/************************************************************************
     *   Funcion:		get_list_category
     *   Descripcion:   Retorna un listado de las categorias
     *
     ************************************************************************/
	public static function get_list_category(){
		$list = Category::all();
        return $list;
	}

    /************************************************************************
     *   Funcion:       exit_category
     *   Descripcion:   Indica si la categoria existe
     *
     ************************************************************************/
    public static function exist_category($id){
        $category = Category::find($id);
        if(is_null($category)){
            return false;
        }else{
            return true;
        }
    }

    /************************************************************************
     *   Funcion:       desactivate_category
     *   Descripcion:   Desactiva una categoria (status = 0)
     *
     ************************************************************************/
    public static function desactivate_category($id){
        try{

            DB::beginTransaction();

            $desactivate = false;
            $category = Category::find($id);

            $category->status = !$category->status;
            $desactivate = $category->status;

            $category->save();

            DB::commit();
            
            return $desactivate;
        } catch (\Exception $e) {
            DB::rollback();
            $errores                =   New ErrorIncidence();
            $errores->script        =   "Category";
            $errores->funcion       =   "show_category";
            $errores->codigo        =   $e->getCode();
            $errores->linea         =   $e->getLine();
            $errores->descripcion   =   $e->getMessage();
            $errores->save();
            
        }
    }

    /************************************************************************
     *   Funcion:       show_category
     *   Descripcion:   Retorna la informacion de la categoria
     *
     ************************************************************************/
    public static function show_category($id){

            $info = Category::find($id);

            return $info;
        
    }

    /************************************************************************
     *   Funcion:       update_category
     *   Descripcion:   Retorna la informacion de la categoria
     *
     ************************************************************************/
    public static function update_category($inputs, $id){
        
        $rules = array(
            'name'              => array('required','unique:category,name,'.$id),
            'icon'              => array('required'),
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
                
                $category                   = Category::find($id);
                $category->name             = $inputs['name'];
                $category->icon_id             = $inputs['icon'];
                
                if ($category->save()) {

                    $response['error']  = false;
                    $response['data']   = $category;

                    DB::commit();
                    
                    return $response;

                }

            }catch(\Exception $e){

                DB::rollback();

                $errores                =   New ErrorIncidence();
                $errores->script        =   "Category";
                $errores->funcion       =   "update_category";
                $errores->codigo        =   $e->getCode();
                $errores->linea         =   $e->getLine();
                $errores->descripcion   =   $e->getMessage();
                $errores->save();
            }
        }
    }

    /************************************************************************
     *   Funcion:       get_icon
     *   Descripcion:   Retorna la informacion de un icono.
     *
     ************************************************************************/
    public static function get_icon($icon_id){

        $icon_detail = DB::table('category')
                ->select('name')
                ->where('icon_id','=',$icon_id)
                ->get();

        if(count($icon_detail)>0){
            $icon_detail = true;
        }else{
            $icon_detail = false;
        }

        return $icon_detail;
    }

}