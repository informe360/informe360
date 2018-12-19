<?php


class Ads extends Eloquent{


    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'ad';
    protected $fillable = array('valid_time','cost');

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = array('password', 'remember_token');


    /**************************************************************
     *   Funcion:       register_new_ad
     *   Descripcion:   Funcion para crear publicaciones 
     *                  
     **************************************************************/
    public static function register_new_ad($inputs){

        $rules = array(
            'days'  => array('required'),
            'cost'  => array('required'),           
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
                $user               = New Ads();
                $user->valid_time   = $inputs['days'];
                $user->cost         = $inputs['cost'];

                if ($user->save()) {
                    // se retorna un mensaje de Exito al controlador
                    $response['error']  = false;
                    $response['data']   = $user;
                    DB::commit();
                    return $response;

                }
                
               
            }catch(\Exception $e){

                DB::rollback();

                $errores                =   New ErrorIncidence();
                $errores->script        =   "Ads";
                $errores->funcion       =   "register_new_ad";
                $errores->codigo        =   $e->getCode();
                $errores->linea         =   $e->getLine();
                $errores->descripcion   =   $e->getMessage();
                $errores->save();
                //$error_anwser = ErrorIncidence::error_incidences('Ads','register_new_ad',$e->getLine(),$e->getMessage());


            }
        }
    }

    /**************************************************************
     *   Funcion:    get_list_ads
     *   Descripcion: Funcion para listar lor precios de las
     *                publicaciones.
     **************************************************************/
    public static function get_list_ads(){
        
        try {

            DB::beginTransaction();

            $list_ads = DB::table('ad')
                ->orderBy('valid_time', 'asc')
                ->get();

            DB::commit();
                
            return $list_ads;

        }catch(\Exception $e){
            DB::rollback();
            $errores                =   New ErrorIncidence();
            $errores->script        =   "Ads";
            $errores->funcion       =   "get_list_ads";
            $errores->codigo        =   $e->getCode();
            $errores->linea         =   $e->getLine();
            $errores->descripcion   =   $e->getMessage();
            $errores->save();
            //$error_anwser = ErrorIncidence::error_incidences('Ads','get_list_ads',$e->getLine(),$e->getMessage());

        }
    }

     /**************************************************************
     *   Funcion:    deactivate_ads
     *   Descripcion: Funcion para desactivar una publicacion
     *   Parametros:
     *              + id: identificador de la publicacion.
     **************************************************************/
    public static function deactivate_ads($id){

        try {
            DB::beginTransaction(); 
            DB::beginTransaction();  

            $ad_information = Ads::find($id);
            $ad_information->status = 0;
            $ad_information->save();
                 
            DB::commit();
                
            return $ad_information;

        }catch(\Exception $e){
            DB::rollback();
            DB::rollback();

            $errores                =   New ErrorIncidence();
            $errores->script        =   "Ad";
            $errores->funcion       =   "deactivate_ads";
            $errores->codigo        =   $e->getCode();
            $errores->linea         =   $e->getLine();
            $errores->descripcion   = $e->getMessage();
            $errores->save();
            //$error_anwser = ErrorIncidence::error_incidences('Category','deactivate_ads',$e->getLine(),$e->getMessage());


        }
    }


     /**************************************************************
     *   Funcion:    activate_ad
     *   Descripcion: Funcion para activar una publicacion
     *   Parametros:
     *              + id: identificador de la publicacion.
     **************************************************************/
    public static function activate_ad($id){

        try {
            DB::beginTransaction(); 

            $ad_information = Ads::find($id);
            $ad_information->status = 1;
            $ad_information->save();
            
            DB::commit();

            return $ad_information;

        }catch(\Exception $e){
            DB::rollback();

            $errores                =   New ErrorIncidence();
            $errores->script        =   "Ad";
            $errores->funcion       =   "activate_ad";
            $errores->codigo        =   $e->getCode();
            $errores->linea         =   $e->getLine();
            $errores->descripcion   = $e->getMessage();
            $errores->save();
            //$error_anwser = ErrorIncidence::error_incidences('Category','activate_ad',$e->getLine(),$e->getMessage());


        }
    }

    /**************************************************************
     *   Funcion:    search_ad
     *   Descripcion: Funcion que devuelve formulario para
     *                editar publicacion.
     *   Parametros:
     *              + id: identificador de la publicacion.
     **************************************************************/
    public static function search_ad($id){

        try {

            DB::beginTransaction(); 

            $ad_information = Ads::find($id);
            
            DB::commit();

            return $ad_information;

        }catch(\Exception $e){
            DB::rollback();
            $errores                =   New ErrorIncidence();
            $errores->script        =   "Ad";
            $errores->funcion       =   "search_ad";
            $errores->codigo        =   $e->getCode();
            $errores->linea         =   $e->getLine();
            $errores->descripcion   = $e->getMessage();
            $errores->save();
            //$error_anwser = ErrorIncidence::error_incidences('Category','search_ad',$e->getLine(),$e->getMessage());

        }
    }

    /**************************************************************
     *   Funcion:    update_ad
     *   Descripcion: Funcion para modificar publicaciones
     **************************************************************/
    public static function update_ad($inputs)
    {
        $rules = array(
            'days'  => array('required'),
            'cost'  => array('required'),           
            );

        $validator = Validator::make($inputs, $rules);


        if ($validator->fails()){
            // si no cumple las reglas se van a devolver los errores al controlador
            $response['mensaje']                = $validator;
            $response['error']                   = true;

            return $response;
        }else {
            try {
                DB::beginTransaction(); 
                $id = $inputs['id'];
                $ad_data                = Ads::find($id);
                $ad_data->valid_time    = $inputs['days'];
                $ad_data->cost          = $inputs['cost'];

                if ($ad_data->save()) {
                    // se retorna un mensaje de �xito al controlador
                    $response['error'] = false;
                    $response['data'] = $ad_data;
                    DB::commit();
                    return $response;
                }
            }catch(\Exception $e){
                DB::rollback();
                $errores                =   New ErrorIncidence();
                $errores->script        =   "Ads";
                $errores->funcion       =   "update_ad";
                $errores->codigo        =   $e->getCode();
                $errores->linea         =   $e->getLine();
                $errores->descripcion   =   $e->getMessage();
                $errores->save();
                //$error_anwser = ErrorIncidence::error_incidences('CategoAdsry','update_ad',$e->getLine(),$e->getMessage());


            }
        }
    }
}
