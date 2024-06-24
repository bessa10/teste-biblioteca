<?= $this->extend('template/default') ?>
<?= $this->section('content') ?>
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 mt-2">
        <div class="col-12">
            <div class="d-flex justify-content-between p-3">
                <a href="<?= site_url() ?>" class="btn btn-lg btn-primary"><i class="fas fa-home"></i>&nbsp;Home</a>
                <a href="<?= site_url().'?favoritos=1' ?>" class="btn btn-lg btn-primary"><i class="fas fa-heart"></i>&nbsp;Favoritos</a>
            </div>
        </div>
    </div>
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 mt-2">
        <div class="px-3 pr-3 pb-3">
            <div class="bl-livros p-4">
                <?php if($livros): ?>
                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4">
                    <?php foreach($livros as $livro): ?>
                        <div class="col d-flex justify-content-md-center">
                            <div class="card border-rounded" style="width: 18rem;">
                                <div class="header-card-livro">
                                    <div class="img-card-header">
                                        <?php if(file_exists(WRITEPATH.'uploads/'.$livro['url_imagem'])): ?>
                                            <?php $img_existe = 1; ?>
                                            <img src="<?= site_url().'uploads/'.$livro['url_imagem'] ?>" class="img-livro card-img-top">
                                        <?php else: ?>
                                            <?php $img_existe = 2; ?>
                                            <img src="<?= site_url().'assets/img/livros.jpeg' ?>" class="img-livro card-img-top">
                                        <?php endif ?>
                                    </div>
                                    <div class="bl-favorito">
                                        <?php 
                                            if($livro['favorito'] == true) {
                                                $display1 = 'block';
                                                $display2 = 'none';
                                            } else {
                                                $display1 = 'none';
                                                $display2 = 'block';
                                            }
                                        ?>
                                        <a 
                                            href="javascript:" 
                                            class="btn-favorito" 
                                            style="display: <?= $display1 ?>"
                                            id="btn_desmark_fav_<?= $livro['id'] ?>" 
                                            onclick="markDesmarkFavorite(<?= $livro['id'] ?>, 2)"
                                        >
                                            <i class="fas fa-heart"></i>
                                        </a>

                                        <a 
                                            href="javascript:" 
                                            class="btn-favorito"
                                            style="display: <?= $display2 ?>" 
                                            id="btn_mark_fav_<?= $livro['id'] ?>" 
                                            onclick="markDesmarkFavorite(<?= $livro['id'] ?>, 1)"
                                        >
                                            <i class="far fa-heart"></i>
                                        </a>
                                    </div>
                                    <div class="borda-inferior">
                                        <div class="ponta"></div>
                                        <div class="corpo"></div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="mh-20">
                                        <h5 class="card-title desc-livro"><?= $livro['titulo'] ?></h5>
                                    </div>
                                    <div class="mh-20">
                                        <p class="card-text desc-livro"><?= $livro['descricao'] ?></p>
                                    </div>
                                    <div class="bl-options">
                                        <div class="me-3">
                                            <a href="javascript:" onclick="detalhesLivro(<?= $livro['id'] ?>, <?= $img_existe ?>)" class="btn-option-livro text-primary mr-4"><i class="fas fa-eye"></i></a>
                                        </div>
                                        <div>
                                            <a href="javascript:" onclick="removeLivro(<?= $livro['id'] ?>, '<?= $livro['titulo'] ?>')" class="btn-option-livro text-danger"><i class="fas fa-trash"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach ?>
                </div>
                <?php else: ?>
                    <div class="row row-cols-12">
                    <div class="col d-flex justify-content-center align-self-center">
                        <h3>Não existe nenhum livro cadastrado...</h3>
                    </div>
                    </div>
                <?php endif ?>
            </div>
        </div>
    </div>
    <button type="button" class="btn btn-lg btn-info btn-add-livro text-white" data-bs-toggle="modal" data-bs-target="#modalAddLivro">
        <i class="fa fa-plus"></i>&nbsp;Adicionar
    </button>
<?php echo view('modal_adicionar_livro') ?>
<?php echo view('modal_remover_livro') ?>
<?php echo view('modal_detalhes_livro') ?>
<?= $this->endSection() ?>
