<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'user';
	protected $fillable = array('name','identification','address','email','celphone','username','password','city_id','type','status','last_login','conditions');

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');


	/**************************************************************
     *   Funcion:		register_user
     *   Descripcion: 	Funcion para crear usuarios 
     *					comprador/vendedor
     **************************************************************/
    public static function register_user($inputs){

        $rules = array(
        	'name'        		=> array('required'),
            'identification'    => array('required'),
            'email'             => array('required','email','unique:user,email'),
            'password'          => array('required','min:6'),
            'password_repeat'	=> array('required', 'same:password'),
            'celphone'			=> array('required'),
            'type'				=> array('required'),
            'city'				=> array('required'),
            );

        $validator = Validator::make($inputs, $rules);

        if ($validator->fails()){
            // si no cumple las reglas se van a devolver los errores al controlador
            $response['mensaje']     = $validator;
            $response['error']       = true;

            return $response;

        }else {

            try {
				
                $user               	= New User();
                $user->name         	= $inputs['name'];
                $user->identification   = $inputs['identification'];
                $user->email        	= $inputs['email'];
                $user->password     	= Hash::make($inputs['password']);
                $user->celphone       	= $inputs['celphone'];
                $user->type         	= $inputs['type'];
                $user->city_id         	= $inputs['city'];

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
                $errores->script        =   "User";
                $errores->funcion       =   "register_user";
                $errores->codigo        =   $e->getCode();
                $errores->linea         =   $e->getLine();
                $errores->descripcion   = 	$e->getMessage();
                $errores->save();
				//$error_anwser = ErrorIncidence::error_incidences('User','register_user',$e->getLine(),$e->getMessage());

			}
        }
    }

    /**************************************************************
     *   Funcion:       exist_admin
     *   Descripcion:   Verifica que el administrador exista
     **************************************************************/
    public static function exist_admin($id){
        try{
            DB::beginTransaction();

            $my_id = Auth::user()->id;
            $user = DB::table('user')
                    ->where('id','=',$id)
                    ->where('type','=','1')
                    ->where('id','<>',$my_id)
                    ->get();

                    DB::commit();
            if($user){
                return true;
            }else{
                return false;
            }

        }catch(\Exception $e){

            DB::rollback();

            $errores                =   New ErrorIncidence();
            $errores->script        =   "User";
            $errores->funcion       =   "update_admin";
            $errores->codigo        =   $e->getCode();
            $errores->linea         =   $e->getLine();
            $errores->descripcion   =   $e->getMessage();
            $errores->save();
        }
    }

    /**************************************************************
     *   Funcion:       register_admin
     *   Descripcion:   Funcion para crear usuarios (administrador)
     **************************************************************/
    public static function register_admin($inputs){

        $rules = array(
            'name'              => array('required'),
            'user'              => array('required','unique:user,username'),
            'email'             => array('required','email','unique:user,email'),
            'celphone'          => array('required'),
            );

        $validator = Validator::make($inputs, $rules);

        if ($validator->fails()){
            // si no cumple las reglas se van a devolver los errores al controlador
            $response['mensaje']     = $validator;
            $response['error']       = true;

            return $response;

        }else {

            try {
                
                $cadena = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890_-@.";
                $longitudCadena=strlen($cadena);
                $pass = "";
                //genera la contraseña de 8 caracteres
                for($i=1 ; $i<=8 ; $i++){
                    $pos=rand(0,$longitudCadena-1);
                    $pass .= substr($cadena,$pos,1);
                }

                $user                   = New User();
                $user->name             = $inputs['name'];
                $user->username         = $inputs['user'];
                $user->email            = $inputs['email'];
                $user->password         = Hash::make($pass);
                $user->celphone         = $inputs['celphone'];
                $user->type             = 1;

                if ($user->save()) {

                    $response['error']  = false;
                    $response['data']   = $user;

                    DB::commit();

                    return $response;

                }

            }catch(\Exception $e){

                DB::rollback();

                $errores                =   New ErrorIncidence();
                $errores->script        =   "User";
                $errores->funcion       =   "register_admin";
                $errores->codigo        =   $e->getCode();
                $errores->linea         =   $e->getLine();
                $errores->descripcion   =   $e->getMessage();
                $errores->save();
            }
        }
    }

    /**************************************************************
     *   Funcion:       get_list_admin
     *   Descripcion:   Retorna los administradores
     **************************************************************/
    public static function get_list_admin(){
        try{

            DB::beginTransaction(); 

            $my_id = Auth::user()->id;
            $list = DB::table('user')->where('type','=','1')->where('id','<>',$my_id)->get();
            DB::commit();
            return $list;

            }catch(\Exception $e){

                DB::rollback();

                $errores                =   New ErrorIncidence();
                $errores->script        =   "User";
                $errores->funcion       =   "get_list_admin";
                $errores->codigo        =   $e->getCode();
                $errores->linea         =   $e->getLine();
                $errores->descripcion   =   $e->getMessage();
                $errores->save();
            }
    }

    /**************************************************************
     *   Funcion:       update_status_admin
     *   Descripcion:   Retorna lista de administradores
     **************************************************************/
    public static function update_status_admin($id, $status){
        try{

            DB::beginTransaction();

            $admin = User::find($id);

            $admin->status = $status;
            
            $admin->save();

            DB::commit();

        }catch(\Exception $e){

            DB::rollback();

            $errores                =   New ErrorIncidence();
            $errores->script        =   "User";
            $errores->funcion       =   "update_status_admin";
            $errores->codigo        =   $e->getCode();
            $errores->linea         =   $e->getLine();
            $errores->descripcion   =   $e->getMessage();
            $errores->save();
        }
    }   

    /**************************************************************
     *   Funcion:       show_admin
     *   Descripcion:   Retorna un administrador
     **************************************************************/
    public static function show_admin($id)
    {
        $admin = User::find($id);
        
        return $admin;
    }   

    /**************************************************************
     *   Funcion:       update_admin
     *   Descripcion:   Funcion para actualizar administradores
     **************************************************************/
    public static function update_admin($inputs, $id){

        $rules = array(
            'name'              => array('required'),
            'user'              => array('required','unique:user,username,'.$id),
            'email'             => array('required','email','unique:user,email,'.$id),
            'celphone'          => array('required'),
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

                $user                   = User::find($id);
                $user->name             = $inputs['name'];
                $user->username         = $inputs['user'];
                $user->email            = $inputs['email'];
                $user->celphone         = $inputs['celphone'];

                if ($user->save()) {

                    $response['mensaje']     = $user;
                    $response['error']       = false;

                    DB::commit();

                    return $response;

                }

            }catch(\Exception $e){

                DB::rollback();

                $errores                =   New ErrorIncidence();
                $errores->script        =   "User";
                $errores->funcion       =   "update_admin";
                $errores->codigo        =   $e->getCode();
                $errores->linea         =   $e->getLine();
                $errores->descripcion   =   $e->getMessage();
                $errores->save();
            }
        }
    } 

    /**************************************************************
     *   Funcion:       get_list_buyer
     *   Descripcion:   Retorna lista de compradores
     **************************************************************/
    public static function get_list_buyer(){
        try{
            DB::beginTransaction();

            $list = DB::table('user')->where('type','=','2')->get();

            DB::commit();
            return $list;

        }catch(\Exception $e){

            DB::rollback();

            $errores                =   New ErrorIncidence();
            $errores->script        =   "User";
            $errores->funcion       =   "get_list_buyer";
            $errores->codigo        =   $e->getCode();
            $errores->linea         =   $e->getLine();
            $errores->descripcion   =   $e->getMessage();
            $errores->save();
        }
    }

    /**************************************************************
     *   Funcion:       get_list_seller
     *   Descripcion:   Retorna lista de vendedores
     **************************************************************/
    public static function get_list_seller(){
        try{
                DB::beginTransaction();

                $list = DB::table('user')->where('type','=','3')->get();
                DB::commit();

                return $list;

        }catch(\Exception $e){

            DB::rollback();

            $errores                =   New ErrorIncidence();
            $errores->script        =   "User";
            $errores->funcion       =   "get_list_seller";
            $errores->codigo        =   $e->getCode();
            $errores->linea         =   $e->getLine();
            $errores->descripcion   =   $e->getMessage();
            $errores->save();
        }
    }

    /**************************************************************
     *   Funcion:       get_list_seller
     *   Descripcion:   Cambia el status de los compradores y
     *                  vendedores
     **************************************************************/
    public static function update_status_duyer_seller($id){
        try{
            DB::beginTransaction();
            $active = false;
            $user = User::find($id);
            $user->status = !$user->status;
            $active = $user->status;
            $user->save();

            DB::commit();
            return $active;

        }catch(\Exception $e){

            DB::rollback();

            $errores                =   New ErrorIncidence();
            $errores->script        =   "User";
            $errores->funcion       =   "update_status_duyer_seller";
            $errores->codigo        =   $e->getCode();
            $errores->linea         =   $e->getLine();
            $errores->descripcion   =   $e->getMessage();
            $errores->save();
        }
    }

    /**************************************************************
     *   Funcion:       user_exist
     *   Descripcion:   Permite saber si un usuario existe
     **************************************************************/
    public static function user_exist($id){
        $user = User::find($id);
        if(!is_null($user)){
            return true;
        }else{
            return false;
        }
    }

    /**************************************************************
     *   Funcion:       update_profile
     *   Descripcion:   Permite actualizar el perfil de usuario
     **************************************************************/
    public static function update_profile_admin($inputs){

        $id = Auth::user()->id;
        $save_password = false;
        if(empty($inputs['old-password'])){
            $rules = array(
                'name'              => array('required'),
                'email'             => array('required','email','unique:user,email,'.$id),
                'celphone'          => array('required'),
            );
        }else{
            $save_password = true;
            $rules = array(
                'name'              => array('required'),
                'email'             => array('required','email','unique:user,email,'.$id),
                'celphone'          => array('required'),
                'old-password'      => array('required'),
                'new-password'      => array('required'),
                'confirm-password'  => array('required'),
            );
        }

        $validator = Validator::make($inputs, $rules);

        if ($validator->fails()){
            // si no cumple las reglas se van a devolver los errores al controlador
            Session::flash('danger', "Problemas Al registrar. Revise los Campos que tienen error.");
            $response['mensaje']     = $validator;
            $response['error']       = true;

            return $response;

        }else {

            try {

                DB::beginTransaction();

                if($save_password){
                    if(Hash::check($inputs['old-password'], Auth::user()->password)){
                        if($inputs['new-password'] == $inputs['confirm-password']){
                            $user                   = User::find($id);
                            $user->name             = $inputs['name'];
                            $user->email            = $inputs['email'];
                            $user->password         = Hash::make($inputs['new-password']);
                            $user->celphone         = $inputs['celphone'];

                            if ($user->save()) {

                                $response['mensaje']     = $user;
                                $response['error']       = false;

                                DB::commit();

                                return $response;

                            }
                        }else{
                            Session::flash('danger', "Las contraseñas no coinsiden.");
                            $response['mensaje']     = null;
                            $response['error']       = true;

                            return $response;
                        }
                    }else{
                        Session::flash('danger', "Contraseña antigua incorrecta.");
                        $response['mensaje']     = null;
                        $response['error']       = true;

                        return $response;
                    }
                }else{
                    $user                   = User::find($id);
                    $user->name             = $inputs['name'];
                    $user->email            = $inputs['email'];
                    $user->celphone         = $inputs['celphone'];

                    if ($user->save()) {

                        $response['mensaje']     = $user;
                        $response['error']       = false;

                        DB::commit();

                        return $response;

                    }
                }

            }catch(\Exception $e){

                DB::rollback();

                $errores                =   New ErrorIncidence();
                $errores->script        =   "User";
                $errores->funcion       =   "update_profile";
                $errores->codigo        =   $e->getCode();
                $errores->linea         =   $e->getLine();
                $errores->descripcion   =   $e->getMessage();
                $errores->save();
            }
        }
    }

    /**************************************************************
     *   Funcion:       details
     *   Descripcion:   Retornas los detalles de un usuario
     **************************************************************/
    public static function details($inputs){
        $user = User::find($inputs['user']);

        $data = array(
            'success' => true,
            'name' => $user->name,
            'celphone' => $user->celphone,
            'email' => $user->email
        );

        return $data;
    }
}
