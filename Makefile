MAKEFILE_PATH := $(abspath $(lastword $(MAKEFILE_LIST)))
CWD := $(dir $(MAKEFILE_PATH))
COMPOSE := docker compose
COMPOSE_APP := $(COMPOSE) exec -u app app
COMPOSE_CONSOLE := $(COMPOSE_APP) php bin/console

.DEFAULT_GOAL := help

.PHONY: start
start: 
	chmod +x _docker/api/docker-entrypoint.sh
	chmod +x _docker/front/docker-entrypoint.sh
	docker compose up -d
	echo "Api: http://localhost/api"
	echo "Front: http://localhost:3000" 
	docker compose logs --tail 100 --follow

.PHONY: api
api: ## Shell into the app container
	docker compose exec -u app api ash '-l'

.PHONY: front
front: ## Shell into the front container
	docker compose exec -u node front ash '-l'
