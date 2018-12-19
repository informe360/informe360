var num_sub = 1; 
$(document).ready(function(){

	//var num_sub = 1; 

	$('.new-sub').on('click',function(e){
		num_sub++;
		e.preventDefault();
		var new_subcategory = '';
		// var new_remove = $('<div class="delete-sub" align="right"><a class="delete-item" href="#" data-toggle="tooltip" data-placement="top" title="Quitar Subcategoria"><i class="fa fa-times"></i></a></div>');
		// e.preventDefault();
		// var last = $('.last-sub');
		// var clon_sub = last.clone();
		// $('.last-sub').after(clon_sub);
		// last.attr('class','form-control');
		// $('.last-sub').val('').attr('name','subcategory-'+num_sub).hide();
		// $('.last-sub').before(new_remove).slideDown('slow').focus();
		//alert('aqui');
		new_subcategory = '<div class="form-group" id="subcategory-'+num_sub+'">'
						 +'<input type="text" class="form-control last-sub" name="subcategory-'+num_sub+'" placeholder="Nombre Subcategor&iacute;a" style="width:96%;float:left">'
						 +'<a class="delete-item" href="#" onclick=deletesubcategory("subcategory-'+num_sub+'") title="Quitar Subcategoria" style="float:right;color:red;margin-top:2%"><i class="fa fa-times"></i></a>'
						+'</div>';
		$("#subcategories").append(new_subcategory).slideDown('slow');

	});
	

	// $('.delete').on('click',function(e){
	// 	e.preventDefault();
	// 	num_sub--;
	// 	$(this).remove();
	// });

	$('.send-message').click(function(){
		var value = ($('#send').attr('value') == '0')? '1' : '0' ;
		$('#send').val(value);
	});

	
});

function deletesubcategory(id){
	num_sub--;
	$('#'+id).remove();
}
