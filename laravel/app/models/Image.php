<?php

class Image extends Eloquent{

	protected $table = 'image';
	protected $fillable = array('product_id','route');

}