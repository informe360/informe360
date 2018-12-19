<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class City extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'city';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('name');

	 /**************************************************************
	 *   Funci�n:    list_cities
	 *   Descripci�n: Funcion para obtener todas las ciudades
	 *                
	 **************************************************************/
    public static function list_cities(){
        
        try {

            DB::beginTransaction(); 

            $categories = DB::table('city')
            	->select('id_city','name')
                ->orderBy('name', 'asc')
                ->get();

            DB::commit();

            return $categories;

        }catch(\Exception $e){
            DB::rollback();
            $errores                =   New ErrorIncidence();
            $errores->script        =   "City";
            $errores->funcion       =   "list_cities";
            $errores->codigo        =   $e->getCode();
            $errores->linea         =   $e->getLine();
            $errores->descripcion   = 	$e->getMessage();
            $errores->save();
            // Habilitamos esto cuando tengamos configurado los correos.
            //$error_anwser = ErrorIncidence::error_incidences('City','list_cities',$e->getLine(),$e->getMessage());


        }
    }

}
