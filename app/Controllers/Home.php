<?php

namespace App\Controllers;

use CodeIgniter\Files\File;

use Exception;

class Home extends BaseController
{
    protected $helpers = ['form'];

    private $livroModel;

    public function __construct()
    {
        $this->livroModel = new \App\Models\LivroModel();
    }

    public function index(): string
    {
        $livros = $this->livroModel->orderBy('titulo')->findAll();

        /*
        $this->session->setFlashdata(array(
            'msg' => 'Senha inválida',
            'type' => 'danger'
        ));
        */

        return view('home', compact('livros'));
    }

    public function create()
    {
        $validationRule = [
            'titulo'    => [
                'label' => 'Título',
                'rules' => [
                    'required',
                    'is_unique[livros.titulo,id,{id}]'
                ]
            ],
            'descricao'    => [
                'label' => 'Descrição',
                'rules' => [
                    'required'
                ]
            ],
            'userfile'  => [
                'label' => 'Image File',
                'rules' => [
                    'uploaded[userfile]',
                    'is_image[userfile]',
                    'mime_in[userfile,image/jpg,image/jpeg,image/gif,image/png,image/webp]',
                    'max_size[userfile,2048]',
                    //'max_dims[userfile,1024,768]',
                ],
            ],
        ];

        $form = $this->request->getPost();

        if (!$this->validateData($form, $validationRule)) {
            
            $msg = '';

            foreach ($this->validator->getErrors() as $key => $value) {
                $msg .= '<p>'.$value.'</p>';
            }            

            $this->session->setFlashdata(array(
                'validation_error' => true,
                'msg' => $msg,
                'type' => 'danger'
            ));

            return redirect()->to('/');
        }

        $img = $this->request->getFile('userfile');

        $url_imagem = '';

        if(!$img->hasMoved()) {

            $img->store('livros');

            if($img->getError()) {
                
                $this->session->setFlashdata(array(
                    'msg' => 'Erro ao realizar upload da imagem, por favor tente novamente',
                    'type' => 'danger'
                ));

                return redirect()->to('/');
            }

            $url_imagem = 'livros/' . $img->getName();

            // Realizando cadastro do livro
            $dados['titulo']        = $this->request->getPost('titulo');
            $dados['descricao']     = $this->request->getPost('descricao');
            $dados['url_imagem']    = $url_imagem;

            $id = $this->livroModel->insert($dados, true);

            if($id) {

                $msg  = "Livro '".$dados['titulo']."' inserido com sucesso";
                $type = "success";

            } else {

                $msg  = "Não foi possível cadastrar o livro, por favor tente novamente";
                $type = "danger";

            }

            $this->session->setFlashdata(array(
                'msg' => $msg,
                'type' => $type
            ));

            return redirect()->to('/');
        
        } else {

            $this->session->setFlashdata(array(
                'msg' => 'Erro ao realizar upload da imagem, por favor tente novamente',
                'type' => 'danger'
            ));

            return redirect()->to('/');
        }
    }


    public function update_favorito()
    {
        try {
            
            if ($this->request->getPost()) {

                $form = $this->request->getPost();

                if(!array_key_exists('id', $form) || empty($form['id'])) {
                    throw new Exception('Código do livro não informado');
                }

                if(!array_key_exists('type', $form) || empty($form['type'])) {
                    throw new Exception('Tipo de operação não informada');
                }

                // Verifiando se o livro informado é valido
                $livro = $this->livroModel->find($form['id']);

                if(!$livro) {
                    throw new Exception('Livro informado é inválido');
                }

                if($form['type'] == 1) {
                    // Marcar como favorito
                    $dados['favorito'] = 1;

                    $msg = 'Livro marcado como favorito com sucesso!';

                } elseif($form['type'] == 2) {
                    // Desmarcar como favorito
                    $dados['favorito'] = 0;

                    $msg = 'Livro desmarcado como favorito com sucesso!';

                } else {
                    throw new Exception('Tipo de operação inválida');
                }

                $this->livroModel->update($form['id'], $dados);

                $response = [
                    'error' => false,
                    'msg'   => $msg
                ];

            } else {

                $response = [
                    'error' => true,
                    'msg'   => 'Método inválido'
                ];
            }
            
        } catch(Exception $e) {

            $response = [
                'error' => true,
                'msg'   => $e->getMessage()
            ];

        }

        return $this->response->setJSON($response);
    }

    public function remover_livro()
    {
        try {

            $form = $this->request->getPost();
        
            if(!array_key_exists('id_exc', $form) || empty($form['id_exc'])) {
                throw new Exception('Código do livro não informado');
            }

            // Verifiando se o livro informado é valido
            $livro = $this->livroModel->find($form['id_exc']);

            if(!$livro) {
                throw new Exception('Livro informado é inválido');
            }

            $this->livroModel->delete($form['id_exc']);

            $type = 'success';
            $msg  = 'Livro excluído com sucesso!';

        } catch(Exception $e) {

            $type = 'danger';
            $msg  = $e->getMessage();
        }

        $this->session->setFlashdata(array(
            'msg'  => $msg,
            'type' => $type
        ));

        return redirect()->to('/');
    }
}
