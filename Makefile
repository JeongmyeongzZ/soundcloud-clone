DOCKER ?= cd docker &&

.PHONY: start
start: erase build up ## clean current environment, recreate dependencies and spin up again

.PHONY: rebuild
rebuild: start ## same as start

.PHONY: migration
migration: dumpautoload migrate ## run app composer dumpautoload && composer rebuild

.PHONY: erase
erase: ## stop and delete containers, clean volumes.
		$(DOCKER) docker-compose stop
		$(DOCKER) docker-compose rm -v -f

.PHONY: build
build: ## build environment and initialize composer and project dependencies
		$(DOCKER) docker-compose build

.PHONY: up
up: ## spin up environment
		$(DOCKER) docker-compose up -d
		$(DOCKER) docker-compose exec --user="www-data" app composer install --no-interaction

.PHONY: restart
restart: ## spin restart environment
		$(DOCKER) docker-compose restart

.PHONY: keygen
keygen: ## laravel key generate
		$(DOCKER) docker-compose exec --user="www-data" app php artisan key:generate
		$(DOCKER) docker-compose exec --user="www-data" app php artisan jwt:secret

.PHONY: bash
bash: ## run app bash
		$(DOCKER) docker-compose exec --user="www-data" app bash

.PHONY: env
env: ## copy .env
		cp .env.example .env
		$(DOCKER) cp .env.example .env
		$(DOCKER) cp docker-compose.sample.yml docker-compose.yml

.PHONY: dumpautoload
dumpautoload: ## run app composer dumpautoload
		$(DOCKER) docker-compose exec --user="www-data" app composer dumpautoload

.PHONY: migrate
migrate: ## run app composer dumpautoload
		$(DOCKER) docker-compose exec --user="www-data" app composer rebuild
