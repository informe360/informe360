<?php
//Para que se ejecute el script la hora de Venezuela
setlocale(LC_TIME, 'es_PYT'); # Localiza en español es_Venezuela
//date_default_timezone_set('America/Asuncion');
date_default_timezone_set('Etc/GMT+4');

if(!isset($_SESSION)){
    session_start();
}

class ErrorIncidence extends Eloquent{

	protected $table       = 'errorincidence';
    protected $fillable    = array('id', 'script', 'funcion', 'linea', 'descripcion');

    /**********************************************************************
    *   Función:     error_incidences                                            *
    *   Descripción: Envia correo a los administradores en caso de error. *
    *                                                                     *
    *   Parametros de entrada:                                            *
    *                           + $script: Archivo que tiene el error.    *
    *                           + $funcion: Metodo que contiene el error. *
    *                           + $line : Linea donde este el error.      *
    *                           + $description: descripcion del error.    *
    **********************************************************************/
    public static function error_incidences($script,$function,$line,$description){
        $answer = 1;

        $array  = array();

        array_push($array, 'silma.natera@gmail.com');
        array_push($array, 'kvnnatera@gmail.com');

        Mail::send('emails.error', array('script' => $script, 'funcion' => $function, 'linea' => $line, 'descripcion' => $description), function($message) use ($array)
        {   
            foreach ($array as $email) {
                $message->to($email)->subject('Error en Aliados');
            }
        });

        return $answer;
    }

    public static function send_mail($script,$function,$line,$description){
        $answer = 1;

        $array  = array();

        array_push($array, 'silma.natera@gmail.com');
        array_push($array, 'kvnnatera@gmail.com');

        Mail::send('emails.error', array('script' => $script, 'funcion' => $function, 'linea' => $line, 'descripcion' => $description), function($message) use ($array)
        {
            foreach ($array as $email) {
                $message->to($email)->subject('Error en Aliados');
            }
        });

        return $answer;
    }
}
