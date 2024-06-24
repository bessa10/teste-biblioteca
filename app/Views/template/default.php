<!doctype html>
<html lang="br">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>App Biblioteca</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel="stylesheet" href="<?= site_url().'assets/css/style.css?v='.time() ?>">
        <link rel="stylesheet" href="<?= site_url().'assets/vendor/fontawesome/css/fontawesome.min.css' ?>">
    </head>
    <body>
        <?php if(session()->getFlashdata('msg')):?>
            <div class="w-100" id="msg-alert">
                <div class="bg-<?= session()->getFlashdata('type') ?> p-2 text-center text-white">
                    <strong><?= session()->getFlashdata('msg') ?></strong>
                </div>
            </div>
        <?php endif ?>

        <div class="col-lg-12 col-sm-12 col-md-12">
            <div class="bg-blue text-center text-white p-4">
                <h1>Biblioteca Livros</h1>    
            </div>
        </div>
        <?= $this->renderSection('content') ?>
        <script>
            var base_url_sis;
            base_url_sis = '<?= site_url() ?>';
        </script>
        <script src="<?= site_url().'assets/js/jquery.min.js'?>"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <script src="<?= site_url().'assets/vendor/fontawesome/js/fontawesome.min.js' ?>"></script>
        <script src="<?= site_url().'assets/vendor/fontawesome/js/be1cab109c.js'?>"></script>
        <script src="<?= site_url().'assets/js/main.js'?>"></script>
    </body>
</html>