# Sistema de gerenciamento de vagas ofertadas para estagiários

## Passo a passo para executar a aplicação

#### 1 - Instale o CodeIgniter 4 via Composer ou manualmente

#### 2 - Copie todos os arquivos do repositório para a pasta do CodeIgniter

#### 3 - Abra um terminal e inicie o servidor PHP executando o seguinte comando
`php spark serve`

#### 4 - Acesse o sistema na seguinte URL:
`localhost:8080`

### Observação: 
Este projeto não está fazendo o uso do Xampp por ter sido executado em um sistema operacional linux, então neste caso para ter um banco de dados MySQL é necessário realizar uma instalação manual ou simplesmente subir um banco utilizando docker

#### Para subir um banco MySQL usando docker execute o seguinte comando no terminal linux:
`sudo docker run --name db-mysql -e MYSQL_ROOT_PASSWORD=moe123456 -d mysql:latest`

#### Para identificar o IP do banco, basta inspecionar o container e identificar o IP no campo IPAddress: 

`sudo docker ps -a` - para identificar o id do container

`sudo docker container inspect id_do_container` - identificando o IP