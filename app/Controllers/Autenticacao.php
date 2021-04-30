<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class Autenticacao extends BaseController
{
    public function __construct()
    {
        helper(['url', 'form']);
    }

    public function index()
    {
        return view('autenticacao/login');
    }

    public function cadastro()
    {
        return view('autenticacao/cadastro');
    }

    public function salvarCadastro()
    {
        $validacao = $this->validate([
            'email'=>[
                'rules'=>'required|valid_email|is_unique[usuarios.email]',
                'errors'=>[
                    'required'=>'Informe seu email, campo obrigatório',
                    'valid_email'=>'Informe um email válido',
                    'is_unique'=>'Este email já está cadastrado'
                ]
                ],
            'senha'=>[
                'rules'=>'required|min_length[6]|regex_match[/[A-Z]/]|regex_match[/[0-9]/]|regex_match[/\W/]',
                'errors'=>[
                    'required'=>'Informe a senha, campo obrigatório',
                    'min_length'=>'A senha deve ter no mínímo 6 caracteres',
                    'regex_match'=>'A senha deve conter pelo menos um número, um caractere maiscúlo e um caractere especial'
                ]
                ],
            'confirma_senha'=>[
                'rules'=>'required|min_length[6]|regex_match[/[A-Z]/]|regex_match[/[0-9]/]|regex_match[/\W/]|matches[senha]',
                'errors'=>[
                    'required'=>'Confirme a senha, campo obrigatório',
                    'min_length'=>'A senha deve ter no mínímo 6 caracteres',
                    'regex_match'=>'A senha deve conter pelo menos um número, um caractere maiscúlo e um caractere especial',
                    'matches'=>'A senha não é igual a que foi informada anteriormente'
                ]
                ],
            'nome_da_empresa'=>[
                'rules'=>'required',
                'errors'=>[
                    'required'=>'Informe o nome da empresa, campo obrigatório'
                ]
                ],
            'endereco_da_empresa'=>[
                'rules'=>'required',
                'errors'=>[
                    'required'=>'Informe o endereco da empresa, campo obrigatório'
                ]
                ],
            'nome_da_pessoa_de_contato'=>[
                'rules'=>'required',
                'errors'=>[
                    'required'=>'Informe o nome da pessoa para contato da empresa, campo obrigatório'
                ]
                ],
            'descricao_da_empresa'=>[
                'rules'=>'required',
                'errors'=>[
                    'required'=>'Informe a descrição da empresa, campo obrigatório'
                ]
                ],
            'nome'=>[
                'rules'=>'required',
                'errors'=>[
                    'required'=>'Informe seu nome completo, campo obrigatório'
                ]
                ],
            'curso'=>[
                'rules'=>'required',
                'errors'=>[
                    'required'=>'Informe o nome do seu curso, campo obrigatório'
                ]
                ],
            'ano_de_ingresso'=>[
                'rules'=>'required',
                'errors'=>[
                    'required'=>'Informe o ano de ingresso no curso, campo obrigatório'
                ]
                ],
            'minicurriculo'=>[
                'rules'=>'required|min_length[100]',
                'errors'=>[
                    'required'=>'Informe um minicurrículo, campo obrigatório',
                    'min_length'=>'O minicurriculo deve ter no mínimo 100 caracteres'
                ]
                ]
        ]);

        if (!$validacao)
        {
            return view('autenticacao/cadastro', ['validacao'=>$this->validator]);
        }
        else
        {
            $email = $this->request->getPost('email');
            $senha =  $this->request->getPost('senha');
        }
    }
}
?>