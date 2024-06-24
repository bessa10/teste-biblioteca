<div class="modal fade" id="modalExcLivro" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-light-grey justify-content-end">
                <a href="#" class="btn-close-modal text-dark" data-bs-dismiss="modal" aria-label="Close"><i class="fa fa-times"></i></a>
            </div>
            <form action="<?= site_url().'home/remover_livro' ?>" method="POST">
                <input type="hidden" id="id_exc" name="id_exc" value="">
                <div class="modal-body bg-light-grey p-4">
                    <div class="row">
                        <div class="col-12 text-center">
                            <h2>Deseja excluir o livro "<span id="titulo-livro"></span>" ?</h2>
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