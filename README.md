# SETUP PHP

Uma base de aplicação limpa (sem frameworks), para estudos em PHP Orientado a objetos.

Essa estrutura já está dockerizada, então basta ter o docker compose rodando em seu computador que é pra dar tudo certo.

## Tecnologias

- PHP 8.3
- MySQL
- nginx

## Como usar

Primeiro basta clonar o repositório

`git clone https://github.com/digitalcollege-classes/php-03`

Agora entre na pasta com o terminal 

`cd php-03`

E agora basta rodar o docker

`docker compose up -d`

Pronto,é sucesso!

Acesse o http://localhost:8080

## Como acessar os containers do Docker
### Para acessar o container do mysql
```shell
docker compose mysql exec bash
```

ou

```shell
docker exec -it <id> bash
```

O mesmo de cima vale pro container do `php`

## Como migrar o banco de dados
Execute no seu terminal:
```shell
make migrar-database
```
## Como cadastrar dados falsos
Execute no seu terminal:
```shell
make load-fixtures
```


## Para alterar alguma coisa

Dentro da pasta `public` existe um arquivo `index.php`, altere-o, salve e dê um F5 lá no navegaro <http://localhost:8080>
