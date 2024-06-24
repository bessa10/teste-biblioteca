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

function detalhesLivro(id, img_existe) {

    if (id != '') {

        url = base_url_sis + 'home/detalhes/' + id;

        $("#dt_titulo").html('');
        $("#dt_descricao").html('');

        $.ajax({
            url: url,
            type: 'GET',
            dataType: 'json',
            beforeSend: function () {
            },         
            success: function(response) {

                if(response['error']) {
                    $("#dt_titulo").html(response['msg']);
                    return; 
                }

                $("#modalDetailLivro").modal('show');
                $("#dt_titulo").html(response['titulo']);
                $("#dt_descricao").html(response['descricao']);

                if(img_existe == 1) {
                    $("#dt_image").attr('src', base_url_sis + 'uploads/'+response['url_imagem']);
                } else {
                    $("#dt_image").attr('src', base_url_sis + 'assets/img/livros.jpeg');
                }

                console.log(response);
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