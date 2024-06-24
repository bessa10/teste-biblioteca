<div class="modal fade" id="modalDetailLivro" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-blue">
                <h5 class="text-white text-center" id="staticBackdropLabel">Detalhes do Livro</h5>
                <a href="#" class="btn-close-modal" data-bs-dismiss="modal" aria-label="Close"><i class="fa fa-times"></i></a>
            </div>
            <div class="modal-body bg-light-grey p-4">
                <div class="row">
                    <div class="form-group mb-2 col-12 text-center">
                        <label class="mb-1"><strong>Título:</strong></label>
                        <p><span id="dt_titulo"></span></p>
                    </div>
                    <div class="form-group mb-2 col-12 text-center">
                        <label class="mb-1"><strong>Descrição:</strong></label>
                        <p><span id="dt_descricao"></span></p>
                    </div>
                    <div class="form-group mb-2 col-12 text-center">
                        <img src="" id="dt_image" class="img-fluid">
                    </div>
                </div>
            </div>
            <div class="modal-footer bg-light-grey p-4">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Fechar</button>
            </div>
        </div>
    </div>
</div>