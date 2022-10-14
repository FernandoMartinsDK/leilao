
# Aplicação de Leilão

Sistema básico de leilão construida com Laravel + Bootstrap 5.

  

## Pré-requesitos

  

1. Ter aberto na máquina o Docker Desktop.

2. Ter instalado Git na máquina.

  

## Instalação

  

- Entre no terminal de sua preferência e vá até algum diretório, no caso será usada a pasta 'projetos' no diretório 'C:'

- Iniciar `cmd`, `cd C:\projetos\`

- Baixe o código `git clone https://github.com/FernandoMartinsDK/youtan.git`

- Entre no diretorio com comando `cd youtan` e abra com o seu editor de código preferido

- Modifique o arquivo `.env.example` para `.env` e modifique as seguintes váriaveis  segundo sua necessidade, mas por padrão se deve usar os seguintes valores: 
	- `APP_API=http://localhost:8000/api/`

>  caminho padrão da api

    DB_CONNECTION=pgsql
    DB_HOST=database
    DB_PORT=5432
    DB_DATABASE=youtan
    DB_USERNAME=root
    DB_PASSWORD=secret

> Valores do banco de dados.

- Suba o script docker com comando `docker docker-compose up -d`, docker ira gerar e instalar tudo que precisa, o arquivo .env será criado sozinho.