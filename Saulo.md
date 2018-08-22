# Saulo Gomes: Hacker News Com Laravel, VueJs e Docker [Compose]

Trabalho realizado para a <a href="http://www.fluxoti.com/" target="_blank">FluxoTI</a> como requisito para a posição de Programador PHP Full Stack. Este projeto está dividido em: (1) Backend do sistema, uma aplicação usando o framework Laravel que consulte a API do <a href="https://github.com/HackerNews/API" target="_blank">HackerNews</a> e (2) Frontend criado usando o VueJs.

A aplicação implementa a consulta dos recursos: Item, User, Stories [Top, New, Best]. A <a href="https://github.com/saulobr88/hnvue" target="_blank">aplicação cliente</a> usa o VueJs.

## Como instalar 
1 - O primeiro passo é confirmar se o PHP 7.0 ou maior, o cliente git e o <a href="https://getcomposer.org/" target="_blank">composer</a> estão instalados e funcionando no computador.

2 - Clonar este repositório:

\$ git clone https://github.com/saulobr88/hnl5.git

3 - Instalar as dependencias usando o Composer (tenha certeza de que o composer está instalado e que está no PATH do sistema operacional), no exemplo a pasta com o código fonte é hnl5:

\$ cd hnl5

\$ composer install

O composer fará o download e instalação dos pacotes do projeto, que estão indicados no arquivo composer.json

Se tudo der certo, será criada a pasta "vendor" dentro da pasta do projeto.

4 - Criar o arquivo .env e criar a chave para o Laravel:

\$ cp .env.example .env

\$ php artisan key:generate

## Como executar
Se tudo funcionou na fase de instalação agora basta executar o comando:

\$ php artisan serve

Para subir um mini servidor HTTP utilizando o artisan do Laravel, utilizando o servidor imbutido do PHP.

### Testes com o PHPUnit
O Laravel traz o PHPUnit e alguns métodos para realização de testes automatizados, com o Test Driven Development (TDD) em mente, criei alguns pequenos testes HTTP para certificar de que a aplicação está funcionando corretamente.

1 - Para executar os testes:

\$ vendor/bin/phpunit

2 - Para listar os testes disponíveis:

\$ vendor/bin/phpunit --list-tests

3 - Para executar o teste com a saída mais detalhada:

\$ vendor/bin/phpunit --debug

Ou

\$ vendor/bin/phpunit --testdox

4 - Para executar somente um método de teste:

\$ vendor/bin/phpunit --filter test_nome_do_method

Por exemplo:

\$ vendor/bin/phpunit --filter testApiRoot

<hr>

## Usando com o Docker
Existe uma <a href="https://hub.docker.com/r/saulobr88/hnl5/" taget="_blank">imagem</a> desta aplicação no DockerHub, a mesma pode ser usada com o seguinte comando:

1 - O docker irá baixar a imagem caso ela não exista no Docker Host:

\# docker run -d --rm -p 8080:8080 saulobr88/hnl5:latest

## Usando com o Docker Compose
Para usar com o Docker Compose, basta subir a aplicação usando o arquivo 'docker-compose.yml' do repositório, ele sobe a API e a aplicação cliente:

1 - Iniciar o Swarm caso não já esteja ativado:

\# docker swarm init

2 - Executar o Deploy com o docker-compose, no exemplo usei o nome 'hnlab':

\# docker stack deploy -c docker-compose.yml hnlab

3 - O mapeamento das portas no Docker Host está da seguinte forma:

- Porta 8080 serve a Aplicação Laravel (Backend)
- Porta 8081 serve a aplicação VueJs (Frontend)

<hr>

## Mais info
- O Backend está online e pode ser acessado em <a href="https://hnl5.herokuapp.com/" target="_blank">https://hnl5.herokuapp.com/</a>
- O Frontend está online e pode ser acessado em <a href="https://hnvue.netlify.com/" target="_blank">https://hnvue.netlify.com/</a>