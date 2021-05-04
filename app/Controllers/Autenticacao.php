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
        $tipo_conta = $this->request->getPost('tipo_conta');

        // Usuário
        $email = $this->request->getPost('email');
        $senha = $this->request->getPost('senha');

        $dados_usuario = [
            'email'=>$email,
            'senha'=>$senha
        ];

        // Empregador
        if ($tipo_conta == 'empregador')
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
                    ]
            ]);

            if (!$validacao)
            {
                return view('autenticacao/cadastro', ['validacao'=>$this->validator]);
            }
            else
            {   
                $nome_da_empresa = $this->request->getPost('nome_da_empresa');
                $endereco_da_empresa = $this->request->getPost('endereco_da_empresa');
                $nome_da_pessoa_de_contato = $this->request->getPost('nome_da_pessoa_de_contato');
                $descricao_da_empresa = $this->request->getPost('descricao_da_empresa');

                $dados_empregador = [
                    'nome_da_empresa'=>$nome_da_empresa,
                    'endereco_da_empresa'=>$endereco_da_empresa,
                    'nome_da_pessoa_de_contato'=>$nome_da_pessoa_de_contato,
                    'descricao_da_empresa'=>$descricao_da_empresa
                ];

                $usuarioModel = new \App\Models\UsuarioModel();
                $dados_empregador['id_usuario'] = $usuarioModel->insert($dados_usuario);

                $empregadorModel = new \App\Models\EmpregadorModel();
                $insert = $empregadorModel->insert($dados_empregador);

                $email = \Config\Services::email();
                $email_empregador=$dados_usuario['email'];
                $email->setFrom('cadastromoe@gmail.com', 'Sistema MOE');
                $email->setTo($email_empregador);

                $email->setSubject('Ativação de Conta - Sistema MOE');
                $email->setMessage("
                <html>
                    <head>
                        <meta charset='utf-8'>
                        <title></title>
                    </head>
                    <body>
                        <p>Olá Empregaodr, $dados_empregador[nome_da_empresa]!</p><br>
                        <p>Por favor confirme seu cadasrto no link a seguinte:</p>
                        <a href='http://localhost/sistema-moe/public/autenticacao/confirmacao/$dados_empregador[id_usuario]'></a>
                        <p>Obrigado e boa sorte!</p>
                        <p>Atenciosamente,</p>
                        <p>Equipe MOE</p>
                    </body>
                </html>
                ");

                $envio_do_email = $email->send();

                if (!$insert && !$envio_do_email)
                {
                    echo '<script type="text/javascript">'; 
                    echo 'alert("Erro ao realizar o cadastro!");'; 
                    echo 'window.location.href = "cadastro";';
                    echo '</script>';
                    //return redirect()->back()->with('fail', 'Erro ao realizar o cadastro!');
                }
                else
                {
                    echo '<script type="text/javascript">'; 
                    echo 'alert("Cadastro realizado com sucesso e email de confirmação enviado!");'; 
                    echo 'window.location.href = "index";';
                    echo '</script>';
                    //return redirect()->to('index')->with('successs', 'Cadastro realizado com sucesso e email de confirmação enviado!');  
                }
            }
        } 
        // Estagiario      
        else 
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
                    'rules'=>'required|numeric|min_length[4]|max_length[4]',
                    'errors'=>[
                        'required'=>'Informe o ano de ingresso no curso, campo obrigatório',
                        'numeric'=>'Este campo precisa ser númerico',
                        'min_length'=>'O ano deve ter 4 digítos',
                        'max_length'=>'O ano deve ter 4 digítos'
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
        
                $nome = $this->request->getPost('nome');
                $curso = $this->request->getPost('curso');
                $ano_de_ingresso = $this->request->getPost('ano_de_ingresso');
                $minicurriculo = $this->request->getPost('minicurriculo');

                $dados_estagiario = [
                    'nome'=>$nome,
                    'curso'=>$curso,
                    'ano_de_ingresso'=>$ano_de_ingresso,
                    'minicurriculo'=>$minicurriculo
                ];

                $usuarioModel = new \App\Models\UsuarioModel();
                $dados_estagiario['id_usuario'] = $usuarioModel->insert($dados_usuario);

                $estagiarioModel = new \App\Models\EstagiarioModel();
                $insert = $estagiarioModel->insert($dados_estagiario);

                $email = \Config\Services::email();
                $email_estagiario=$dados['email'];
                $email->setFrom('cadastromoe@gmail.com', 'Sistema MOE');
                $email->setTo($email_estagiario);

                $email->setSubject('Ativação de Conta - Sistema MOE');
                $email->setMessage("
                <html>
                    <head>
                        <meta charset='utf-8'>
                        <title></title>
                    </head>
                    <body>
                        <p>Olá $dados_estagiario[nome]!</p><br>
                        <p>Por favor confirme seu cadasrto no link a seguinte:</p>
                        <a href='http://localhost/sistema-moe/public/autenticacao/confirmacao/$dados_estagiario[id_usuario]'></a>
                        <p>Obrigado e boa sorte!</p>
                        <p>Atenciosamente,</p>
                        <p>Equipe MOE</p>
                    </body>
                </html>
                ");

                $envio_do_email = $email->send();

                if (!$insert && !$envio_do_email)
                {
                    echo '<script type="text/javascript">'; 
                    echo 'alert("Erro ao realizar o cadastro!");'; 
                    echo 'window.location.href = "cadastro";';
                    echo '</script>';
                    //return redirect()->back()->with('fail', 'Erro ao realizar o cadastro!');
                }
                else
                {
                    echo '<script type="text/javascript">'; 
                    echo 'alert("Cadastro realizado com sucesso e email de confirmação enviado!");'; 
                    echo 'window.location.href = "index";';
                    echo '</script>';
                    //return redirect()->to('index')->with('successs', 'Cadastro realizado com sucesso e email de confirmação enviado!');  
                }
            }
        }

    }

    public function confirmacao($id_usuario)
    {
        $database = $db_connect();
        
        $status = [
            'status'=>'ativo'
        ];

        $database->table('usuarios')->where('id', $id_usuario)->update($status);
        $database.close();
        return redirect('index');
    }


    public function validacaoLogin()
    {
        $validacao = $this->validate([
            'email' => [
                'rules' => 'required|valid_email|is_not_unique[usuarios.email]',
                'errors' => [
                    'required' => 'O campo email é obrigatório!',
                    'valid_email' => 'Informe um email válido!',
                    'is_not_unique' => 'Email não cadastrado!'
                ]
            ],
            'senha'=>[
                'rules'=>'required|min_length[6]|regex_match[/[A-Z]/]|regex_match[/[0-9]/]|regex_match[/\W/]',
                'errors'=>[
                    'required'=>'Informe a senha, campo obrigatório',
                    'min_length'=>'A senha deve ter no mínímo 6 caracteres',
                    'regex_match'=>'A senha deve conter pelo menos um número, um caractere maiscúlo e um caractere especial'
                ]
            ]
        ]);

        if (!$validacao)
        {
            return view('autenticacao/cadastro', ['validacao'=>$this->validator]);
        }
        else
        {
            echo "Bem vindo ao Sistema MOE";
        }
    }
}
?>