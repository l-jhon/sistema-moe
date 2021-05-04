<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema Moe</title>
    <link rel="stylesheet" href="<?= base_url('bootstrap/css/bootstrap.min.css') ?>">
</head>
<body>

<div class="container">
    <div class="row" style="margin-top:45px">
        <div class="col-md-4 col-md-offset-4">
            <h4>Sistema MOE - Login</h4><hr>
            <form action="<?= base_url('autenticacao/validacaoLogin'); ?>" method="post">
            <?= csrf_field(); ?>
                <div class="form-group">
                    <label for="">Email</label>
                    <input type="text" class="form-control" name="email" placeholder="Insira seu email" value="<?= set_value('email'); ?>">
                    <span class="text-danger"><?= isset($validacao) ? display_error($validacao, 'email'): '' ?></span>
                </div>
                <div class="form-group">
                    <label for="">Senha</label>
                    <input type="password" class="form-control" name="password" placeholder="Informe sua senha" value="<?= set_value('senha'); ?>">
                    <span class="text-danger"><?= isset($validacao) ? display_error($validacao, 'senha'): '' ?></span>
                </div>
                <div class="form-group">
                    <button class="btn btn-primay btn-block" type="submit">Entrar</button>
                </div>
                <a href="<?= site_url('autenticacao/cadastro'); ?>">Não tenho acesso, criar uma conta.</a>
            </form>
        </div>
    </div>
</div>
    
</body>
</html>