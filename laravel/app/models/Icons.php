<?php


class Icons extends Eloquent{


    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'icons';
    protected $fillable = array('name','iconroute','user_id','active');

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = array('remember_token');


    /**************************************************************
     *   Funcion:       save_icon
     *   Descripcion:   Funcion para crear nuevo icono. 
     *                  
     **************************************************************/
    public static function save_icon($inputs){

        $reglas =  array(
            'iconname'  =>  array('required','max:1000'),
            'photo_1'   =>  array('required','max:600'),
        );

        $validator = Validator::make($inputs, $reglas); 

        if ($validator->fails()){
            // si no cumple las reglas se van a devolver los errores al controlador
            $response['mensaje']     = $validator;
            $response['error']       = true;

            return $response;

        }else{

            try{

                DB::beginTransaction(); 
                
                $photo_1 = Input::file("photo_1")->getClientOriginalName();//nombre original de la foto

                $icon            = New Icons();
                $icon->name      = $inputs['iconname'];
                $icon->iconroute = $photo_1;
                $icon->user_id   = Auth::user()->id;
                $icon->active    = 1;
               
                if ($icon->save()) {
                    Input::file('photo_1')->move('iconfolder', $photo_1);
                    // se retorna un mensaje de éxito al controlador
                    $response['error']      = false;
                    $response['mensaje']    = 'Icono Guardado Satisfactoriamente';

                    DB::commit();

                    return $response;
                }

            }catch(\Exception $e){

                DB::rollback();
                
                $errores            = New ErrorIncidence();
                $errores->script    =   "Icons";
                $errores->funcion   =   "save_icon";
                $errores->codigo    =   $e->getCode();
                $errores->linea     =   $e->getLine();
                $errores->descripcion = $e->getMessage();
                $errores->save();

               // $error_anwser = ErrorIncidence::error_incidences('Icons','save_icon',$e->getLine(),$e->getMessage());

            }


            
        }
    }

    /**************************************************************
     *   Funcion:    get_list_icons
     *   Descripcion: Funcion para listar los iconos
     *                disponibles.
     **************************************************************/
    public static function get_list_icons(){
        
        try {

            $list_icons = DB::table('icons')
                ->orderBy('name', 'asc')
                ->get();

            return $list_icons;

        }catch(\Exception $e){
            
            $errores                =   New ErrorIncidence();
            $errores->script        =   "Icons";
            $errores->funcion       =   "get_list_icons";
            $errores->codigo        =   $e->getCode();
            $errores->linea         =   $e->getLine();
            $errores->descripcion   =   $e->getMessage();
            $errores->save();
            //$error_anwser = ErrorIncidence::error_incidences('Ads','get_list_icons',$e->getLine(),$e->getMessage());

        }
    }

     /**************************************************************
     *   Funcion:    deactivate_icon
     *   Descripcion: Funcion para desactivar un icono
     *   Parametros:
     *              + id: identificador del icono.
     **************************************************************/
    public static function deactivate_icon($id){

        try {

            DB::beginTransaction(); 

            $icon_information = Icons::find($id);
            $icon_information->active = 0;
            $icon_information->save();
            DB::commit();

            return $icon_information;

        }catch(\Exception $e){
            DB::rollback();
            $errores                =   New ErrorIncidence();
            $errores->script        =   "Icons";
            $errores->funcion       =   "deactivate_icon";
            $errores->codigo        =   $e->getCode();
            $errores->linea         =   $e->getLine();
            $errores->descripcion   = $e->getMessage();
            $errores->save();
            //$error_anwser = ErrorIncidence::error_incidences('Category','deactivate_ads',$e->getLine(),$e->getMessage());


        }
    }


     /**************************************************************
     *   Funcion:    activate_icon
     *   Descripcion: Funcion para activar un icono
     *   Parametros:
     *              + id: identificador del icono.
     **************************************************************/
    public static function activate_icon($id){

        try {
            
            DB::beginTransaction(); 
            $icon_information = Icons::find($id);
            $icon_information->active = 1;
            $icon_information->save();
            DB::commit();
            return $icon_information;

        }catch(\Exception $e){
            DB::rollback();
            $errores                =   New ErrorIncidence();
            $errores->script        =   "Icons";
            $errores->funcion       =   "activate_icon";
            $errores->codigo        =   $e->getCode();
            $errores->linea         =   $e->getLine();
            $errores->descripcion   = $e->getMessage();
            $errores->save();
            //$error_anwser = ErrorIncidence::error_incidences('Category','activate_ad',$e->getLine(),$e->getMessage());


        }
    }

    /**************************************************************
     *   Funcion:    search_icon
     *   Descripcion: Funcion que devuelve formulario para
     *                editar un icono.
     *   Parametros:
     *              + id: identificador de un icono.
     **************************************************************/
    public static function search_icon($id){

        try {

            DB::beginTransaction(); 
            $icon_information = Icons::find($id);
            DB::commit();
            return $icon_information;

        }catch(\Exception $e){

            DB::rollback();
            $errores                =   New ErrorIncidence();
            $errores->script        =   "Icons";
            $errores->funcion       =   "search_icon";
            $errores->codigo        =   $e->getCode();
            $errores->linea         =   $e->getLine();
            $errores->descripcion   = $e->getMessage();
            $errores->save();
            //$error_anwser = ErrorIncidence::error_incidences('Category','search_icon',$e->getLine(),$e->getMessage());


        }
    }

    /**************************************************************
     *   Funcion:    update_icon
     *   Descripcion: Funcion para modificar icono.
     **************************************************************/
    public static function update_icon($inputs)
    {
       $reglas =  array(
            'iconname'  =>  array('required','max:1000'),
            'photo_1'   =>  array('max:600'),
        );

        $validator = Validator::make($inputs, $reglas);


        if ($validator->fails()){
            // si no cumple las reglas se van a devolver los errores al controlador
            $response['mensaje']                = $validator;
            $response['error']                   = true;

            return $response;
        }else {
            try {
                DB::beginTransaction(); 
                $photo_1 = $inputs['photo_1'];
                $id      = $inputs['id'];
                $ad_icon = Icons::find($id);

                if($photo_1==null){
                    $ad_icon->name  = $inputs['iconname'];
                }else{
                    $photo_1            = Input::file("photo_1")->getClientOriginalName();
                    $ad_icon->name      = $inputs['iconname'];
                    $ad_icon->iconroute = $photo_1;
                }
                
                if ($ad_icon->save()) {
                    // se retorna un mensaje de �xito al controlador
                    if($photo_1!=null){
                        Input::file('photo_1')->move('iconfolder', $photo_1);
                    }
                    
                    $response['error'] = false;
                    $response['data'] = $ad_icon;
                    DB::commit();
                    return $response;
                }
            }catch(\Exception $e){
                DB::rollback();
                $errores                =   New ErrorIncidence();
                $errores->script        =   "Icons";
                $errores->funcion       =   "update_icon";
                $errores->codigo        =   $e->getCode();
                $errores->linea         =   $e->getLine();
                $errores->descripcion   =   $e->getMessage();
                $errores->save();
                //$error_anwser = ErrorIncidence::error_incidences('CategoAdsry','update_icon',$e->getLine(),$e->getMessage());


            }
        }
    }
}
