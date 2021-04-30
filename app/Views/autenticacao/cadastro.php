<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema Moe</title>
    <link rel="stylesheet" href="<?= base_url('bootstrap/css/bootstrap.min.css'); ?>">
    <script src="<?= base_url('bootstrap/js/hide_fields.js'); ?>"></script>
</head>
<body>

<div class="container">
    <div class="row" style="margin-top:45px">
        <div class="col-md-4 col-md-offset-4"> 
            <h4>Sistema MOE - Cadastro</h4><hr>
            <form action="<?= base_url('autenticacao/salvarCadastro'); ?>" method="post">
                <?= csrf_field(); ?>
                <?php if(!empty(session()->getFlashdata('erro'))) : ?>
                    <div class="alert alert-danger"><?= session()->getFlashdata('erro'); ?></div>
                <?php endif ?>

                <?php if(!empty(session()->getFlashdata('sucesso'))) : ?>
                    <div class="alert alert-success"><?= session()->getFlashdata('sucesso'); ?></div>
                <?php endif ?>
                <div class="form-group">
                    <label for="">Email</label>
                    <input type="text" class="form-control" name="email" placeholder="Insira seu email" value="<?= set_value('email'); ?>">
                    <span class="text-danger"><?= isset($validacao) ? display_error($validacao, 'email'): '' ?></span>
                </div>
                <div class="form-group">
                    <label for="">Senha</label>
                    <input type="password" class="form-control" name="senha" placeholder="Informe sua senha" value="<?= set_value('senha'); ?>">
                    <span class="text-danger"><?= isset($validacao) ? display_error($validacao, 'senha'): '' ?></span>
                </div>
                <div class="form-group">
                    <label for="">Confirmar senha</label>
                    <input type="password" class="form-control" name="confirma_senha" placeholder="Confirme sua senha" value="<?= set_value('confirma_senha'); ?>">
                    <span class="text-danger"><?= isset($validacao) ? display_error($validacao, 'confirma_senha'): '' ?></span>
                </div>
                <select name="tipo_conta" id="tipo_conta" class="form-control" onchange="exibir_ocultar()">
                    <option selected>Selecione o tipo de conta</option>
                    <option value="empregador" <?php set_select('tipo_conta', 'empregador'); ?>>Empregador</option>
                    <option value="estagiario" <?php set_select('tipo_conta', 'estagiario'); ?>>Estagiário</option>
                </select>
                <br>
                <div class="form-group" id="nome_da_empresa" style='display:none'>
                    <label for="nome_da_empresa">Nome da empresa</label>
                    <input type="text" class="form-control" name="nome_da_empresa" placeholder="Nome da Empresa" value="<?= set_value('nome_da_empresa'); ?>">
                    <span class="text-danger"><?= isset($validacao) ? display_error($validacao, 'nome_da_empresa'): '' ?></span>
                </div>
                <div class="form-group" id="endereco_da_empresa" style='display:none'>
                    <label for="">Endereço da empresa</label>
                    <input type="text" class="form-control" name="endereco_da_empresa" placeholder="Endereço da Empresa" value="<?= set_value('endereco_da_empresa'); ?>">
                    <span class="text-danger"><?= isset($validacao) ? display_error($validacao, 'endereco_da_empresa'): '' ?></span>
                </div>
                <div class="form-group" id="nome_da_pessoa_de_contato" style='display:none'>
                    <label for="">Nome da pessoa para contato</label>
                    <input type="text" class="form-control" name="nome_da_pessoa_de_contato" placeholder="Informe o nome do contato" value="<?= set_value('nome_da_pessoa_de_contato'); ?>">
                    <span class="text-danger"><?= isset($validacao) ? display_error($validacao, 'nome_da_pessoa_de_contato'): '' ?></span>
                </div>
                <div class="form-group" id="descricao_da_empresa" style='display:none'>
                    <label for="">Descrição da Empresa</label>
                    <textarea class="form-control" name="descricao_da_empresa" rows="3" placeholder="Informe a descrição da empresa" value="<?= set_value('descrica_da_empresa'); ?>"></textarea>
                    <span class="text-danger"><?= isset($validacao) ? display_error($validacao, 'descricao_da_empresa'): '' ?></span>
                </div>
                <div class="form-group" id="nome" style='display:none'>
                    <label for="">Nome</label>
                    <input type="text" class="form-control" name="nome" placeholder="Digite seu nome" value="<?= set_value('nome'); ?>">
                    <span class="text-danger"><?= isset($validacao) ? display_error($validacao, 'nome'): '' ?></span>
                </div>
                <div class="form-group" id="curso" style='display:none'>
                    <label for="">Curso</label>
                    <input type="text" class="form-control" name="curso" placeholder="Informe seu curso" value="<?= set_value('curso'); ?>">
                    <span class="text-danger"><?= isset($validacao) ? display_error($validacao, 'curso'): '' ?></span>
                </div>
                <div class="form-group" id="ano_de_ingresso" style='display:none'>
                    <label for="">Ano de Ingresso</label>
                    <input type="text" class="form-control" name="ano_de_ingresso" placeholder="Digite o ano de ingresso" value="<?= set_value('ano_de_ingresso'); ?>">
                    <span class="text-danger"><?= isset($validacao) ? display_error($validacao, 'ano_de_ingresso'): '' ?></span>
                </div>
                <div class="form-group" id="minicurriculo" style='display:none'>
                    <label for="">Minicurrículo</label>
                    <textarea class="form-control" name="minicurriculo" rows="3" placeholder="Minicurrículo" value="<?= set_value('minicurriculo'); ?>"></textarea>
                    <span class="text-danger"><?= isset($validacao) ? display_error($validacao, 'minicurriculo'): '' ?></span>
                </div>
                <br>
                <div class="form-group">
                    <button class="btn btn-primay btn-block" type="submit">Cadastrar</button>
                </div>
                <br>
                <a href="<?= site_url('autenticacao'); ?>">Já tenho acesso, fazer login.</a>
            </form>
        </div>
    </div>
</div>
    
</body>
</html>