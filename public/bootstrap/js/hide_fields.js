function exibir_ocultar()
{
    var valor = document.getElementById("tipo_conta").value;

    if (valor == 'empregador')
    {
        document.getElementById('nome_da_empresa').style.display = 'block';
        document.getElementById('endereco_da_empresa').style.display = 'block';
        document.getElementById('nome_da_pessoa_de_contato').style.display = 'block';
        document.getElementById('descricao_da_empresa').style.display = 'block';
        document.getElementById('nome').style.display = 'none';
        document.getElementById('curso').style.display = 'none';
        document.getElementById('ano_de_ingresso').style.display = 'none';
        document.getElementById('minicurriculo').style.display = 'none';
    }
    else if(valor == 'estagiario')
    {
        document.getElementById('nome_da_empresa').style.display = 'none';
        document.getElementById('endereco_da_empresa').style.display = 'none';
        document.getElementById('nome_da_pessoa_de_contato').style.display = 'none';
        document.getElementById('descricao_da_empresa').style.display = 'none';
        document.getElementById('nome').style.display = 'block';
        document.getElementById('curso').style.display = 'block';
        document.getElementById('ano_de_ingresso').style.display = 'block';
        document.getElementById('minicurriculo').style.display = 'block';
    }
    else
    {
        document.getElementById('nome_da_empresa').style.display = 'none';
        document.getElementById('endereco_da_empresa').style.display = 'none';
        document.getElementById('nome_da_pessoa_de_contato').style.display = 'none';
        document.getElementById('descricao_da_empresa').style.display = 'none';
        document.getElementById('nome').style.display = 'none';
        document.getElementById('curso').style.display = 'none';
        document.getElementById('ano_de_ingresso').style.display = 'none';
        document.getElementById('minicurriculo').style.display = 'none';
    }
}