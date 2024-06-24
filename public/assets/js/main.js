setTimeout(function () {
    $('#msg-alert').hide();
}, 4000);

function markDesmarkFavorite(id, type) {

    if (id != '') {

        url = base_url_sis + 'home/favorito';

        $.ajax({
            url: url,
            type: 'POST',
            dataType: 'json',
            data:{
                id: id,
                type: type
            },  
            beforeSend: function () {
            },         
            success: function(response) {

                if(response['error']) {
                    alert(response['msg']);
                    return; 
                }

                if(type == 1) {

                    $("#btn_mark_fav_"+id).hide();
                    $("#btn_desmark_fav_"+id).show();
            
                } else if(type == 2) {  
                    
                    $("#btn_desmark_fav_"+id).hide();
                    $("#btn_mark_fav_"+id).show();
                }
            },
            error: function(error) {

                console.log(error);
            }   
        });
    }
}

function removeLivro(id, titulo) {
    $("#id_exc").val(id);
    $("#titulo-livro").html(titulo);
    $("#modalExcLivro").modal('show');
}