<?php

class Product extends Eloquent{

	protected $table = 'product';
    protected $fillable = array('user_id', 'title', 'conditions', 'cost', 'brand', 'specification', 'model', 'description', 'type_ad', 'featured', 'negotiable', 'ad_id', 'time_to_expired');

	/************************************************************************
     *   Funcion:		register
     *   Descripcion:   Registra una nueva producto
     *
     ************************************************************************/
	public static function register($inputs, $id_cat, $id_sub){
		$rules = array(
            'sellType'              => array('required'),
            'title-ad'              => array('required'),
            'itemCon'               => array('required'),
            'price'                 => array('required'),
            'file1'                 => array('required'),
            'brand'                 => array('required'),
            'specifications'        => array('required'),
            'description'           => array('required'),
            'premiumOption'         => array('required'),
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
                
                $product                   = New Product();
                $product->user_id          = Auth::user()->id;
                $product->title            = $inputs['title-ad'];
                $product->conditions       = $inputs['itemCon'];
                $product->cost             = $inputs['price']; 
                $product->brand            = $inputs['brand'];
                $product->specification    = $inputs['specifications'];
                $product->model            = $inputs['model'];
                $product->description      = $inputs['description'];
                //$product->featured         = $inputs[''];  // y estas caracteristicas??
                //$product->type_ad          = $inputs[''];
                $product->status           = 1;
                $product->ad_id            = $inputs['premiumOption'];
                $product->time_to_expired  = Ads::search_ad($product->ad_id)->valid_time;
                if(isset($inputs['negotiable'])){
					$product->negotiable   = $inputs['negotiable'];
                }else{
                	$product->negotiable   = 0;
                }
                
                if ($product->save()) {

                	if(isset($inputs['send'])){
                		//se envia el correo o el sms

                	}

                    DB::commit();
                    
                	//se guardan las imagenes
                	for($i = 1; $i < 5; $i++){

                		$image = $inputs['file'.$i];

                		if(!is_null($image)){
                            //guardamos el achivo
                            
	                		$name_file = $image->getClientOriginalName();
                            $destination = '../uploads/';
							$image->move($destination, $name_file);

							//cargamos el archivo a la bd 
	                		$files                 = new Image();
	                		$files->product_id     = $product->id;
	                		$files->route          = $destination.$name_file;
                            $files->save();
                            
                            // A partir de aca empezamos a modificar las imagenes cargadas para que posean la misma resolucion
                            $rutaImagen = $files->route; 
                            $rutaDestino = $files->route;
                            
                            $anchoThumb = 1000;
                            $altoThumb = 667;
                            $calidad = 80;

                            $original = imagecreatefromJPEG($rutaImagen);
                            if ($original !== false){
                            $thumb = imageCreatetrueColor($anchoThumb,$altoThumb);
                                if ($thumb !== false){
                                    $ancho = imagesx($original);
                                    $alto = imagesy($original);

                                    imagecopyresampled($thumb,$original,0,0,0,0,$anchoThumb,$altoThumb,$ancho,$alto);
                                    $resultado = imagejpeg($thumb,$rutaDestino,$calidad);
                                }
                            }
                		}
                		
                	}

                	//se registra la relacion entre poducto, categoria y subcategoria
	                $relation                  = new ProdCateSubc();
	                $relation->product_id      = $product->id;
	                $relation->category_id	   = $id_cat;
	                $relation->subcategory_id  = $id_sub;
	                $relation->save();

                    $response['error']  = false;
                    $response['data']   = $product;

                    return $response;

                }

            }catch(\Exception $e){

                DB::rollback();

                $errores                =   New ErrorIncidence();
                $errores->script        =   "Product";
                $errores->funcion       =   "register";
                $errores->codigo        =   $e->getCode();
                $errores->linea         =   $e->getLine();
                $errores->descripcion   =   $e->getMessage();
                $errores->save();
            }
        }
    }

    /************************************************************************
     *   Funcion:       get_list
     *   Descripcion:   Retorna una lista de productos
     *
     ************************************************************************/
    public static function get_list($id){
        try {
            DB::beginTransaction();

            $list = Product::where('user_id','=',$id)->where('status','!=',0)->get();
            DB::commit();
            return $list;

        } catch (\Exception $e) {
            DB::rollback();
            
            $errores                =   New ErrorIncidence();
            $errores->script        =   "Product";
            $errores->funcion       =   "get_list";
            $errores->codigo        =   $e->getCode();
            $errores->linea         =   $e->getLine();
            $errores->descripcion   =   $e->getMessage();
            $errores->save();
        }
    }

    /************************************************************************
     *   Funcion:       exist_product
     *   Descripcion:   Verifica que exista el producto
     *
     ************************************************************************/
    public static function exist_product($id){
        $product = Product::find($id);

        return (!is_null($product))? true : false;
    }

    /************************************************************************
     *   Funcion:       desactivate_product
     *   Descripcion:   Elimina un producto seleccionado
     *
     ************************************************************************/
    public static function desactivate_product($id){
        try {
            DB::beginTransaction(); 

            $product = Product::find($id);

            $product->status = 0;

            $product->save();

            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            
            $errores                =   New ErrorIncidence();
            $errores->script        =   "Product";
            $errores->funcion       =   "desactivate_product";
            $errores->codigo        =   $e->getCode();
            $errores->linea         =   $e->getLine();
            $errores->descripcion   =   $e->getMessage();
            $errores->save();
        }
        
    }

    public static function activate_product($id){
        try {
            DB::beginTransaction(); 

            $product = Product::find($id);

            $product->status = 2;

            $product->save();

            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            
            $errores                =   New ErrorIncidence();
            $errores->script        =   "Product";
            $errores->funcion       =   "activate_product";
            $errores->codigo        =   $e->getCode();
            $errores->linea         =   $e->getLine();
            $errores->descripcion   =   $e->getMessage();
            $errores->save();
        }
        
    }
    /************************************************************************
     *   Funcion:       get_pending
     *   Descripcion:   Retona un listado de los productos pendientes
     *
     ************************************************************************/
    public static function get_pending(){
        try {
            DB::beginTransaction(); 

            $products = Product::where('user_id','=',Auth::user()->id)
                                        ->where('status','=',1)
                                        ->get();
            DB::commit();                            
            return $products;

        } catch (\Exception $e) {
            DB::rollback();
            
            $errores                =   New ErrorIncidence();
            $errores->script        =   "Product";
            $errores->funcion       =   "desactivate_product";
            $errores->codigo        =   $e->getCode();
            $errores->linea         =   $e->getLine();
            $errores->descripcion   =   $e->getMessage();
            $errores->save();
        }
    }
}