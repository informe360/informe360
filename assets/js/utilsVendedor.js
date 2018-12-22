$(document).ready(function(){
    let category_id = "";
    let sub_category_id = "";

	$('.categories-selected').on('click',function(e){
        category_id = $(this).attr('id_category');
    });

    $('.sub-categories-selected').on('click',function(e){
        sub_category_id = $(this).attr('id_sub_category');
    });

    $('#btn_next_details').click(function(e) {
        console.log(`Categoria ${category_id} y subcategoria ${sub_category_id}`);
        if ( (category_id == undefined || category_id == "") && (sub_category_id == undefined || sub_category_id == "")) {
            alert('Te falta por seleccionar una categoria o una sub-categoria');
        }else {
            window.location.href = `/vendedor/agregar-detalles/${category_id}/${sub_category_id}`;
        }
    })
});
