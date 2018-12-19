<?php

class ProdCateSubc extends Eloquent{

	protected $table = 'prod_cate_subc';
	protected $fillable = array('product_id','category_id','subcategory_id');

}