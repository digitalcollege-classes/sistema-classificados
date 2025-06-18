# Makefile para automatizar setup do projeto Sistema de Classificados

.PHONY: up install_dependencies

# Inicia os serviços Docker em modo detached
up:
	docker compose up -d

# Para os serviços Docker
stop:
	docker compose stop

# Para e remove os serviços Docker
down:
	docker compose down

# Entra dentro do container PHP
container_php:
	docker compose exec php bash

# Entra dentro do container MySQL
container_mysql:
	docker compose exec mysql bash

# Entra dentro do container Nginx
container_nginx:
	docker compose exec nginx bash

# Instala dependências dentro do contêiner PHP
install_dependencies:
	docker compose exec -T php bash -c "COMPOSER_MEMORY_LIMIT=-1 composer install"

# Limpa o cache do projeto
reset:
	docker compose exec -T php bash -c "php bin/doctrine orm:clear-cache"

# Limpa a cache e o banco
reset_banco:
	docker compose exec -T php bash -c "php bin/doctrine orm:schema-tool:drop"
	docker compose exec -T php bash -c "php bin/doctrine orm:schema-tool:create"

style:
	docker compose exec -T -e PHP_CS_FIXER_IGNORE_ENV=1 php bash -c "php vendor/bin/php-cs-fixer fix --dry-run --diff -vvv"

# Comando para rodar todos os passos juntos
setup: up install_dependencies