<div class="modal fade" id="modalAddLivro" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-blue">
                <h5 class="text-white text-center" id="staticBackdropLabel">Adicionar Livro</h5>
                <a href="#" class="btn-close-modal" data-bs-dismiss="modal" aria-label="Close"><i class="fa fa-times"></i></a>
            </div>
            <form action="<?= site_url().'home/create' ?>" method="POST" enctype="multipart/form-data">
                <div class="modal-body bg-light-grey p-4">
                    <div class="row">
                        <div class="form-group mb-2 col-12 text-center">
                            <label class="mb-1"><strong>Título:</strong></label>
                            <input type="text" class="form-control text-center" name="titulo" id="titulo">
                        </div>
                        <div class="form-group mb-2 col-12 text-center">
                            <label class="mb-1"><strong>Descrição:</strong></label>
                            <input type="text" class="form-control text-center" name="descricao" id="descricao">
                        </div>
                        <div class="form-group mb-2 col-12 text-center">
                            <label class="mb-1"><strong>Imagem:</strong></label>
                            <input type="file" class="form-control" name="userfile" id="userfile">
                        </div>
                    </div>
                </div>
                <div class="modal-footer bg-light-grey p-4">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-info text-white">Confirmar</button>
                </div>
            </form>
        </div>
    </div>
</div>