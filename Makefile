help:		## Show this help.
	@fgrep -h "##" $(MAKEFILE_LIST) | fgrep -v fgrep | sed -e 's/\\$$//' | sed -e 's/##//'

build:		## Build Docker images
	COMPOSE_FILE=tests/docker/docker-compose.yml docker-compose up -d --build php$(v)

down:		## Stop the built and running image
	COMPOSE_FILE=tests/docker/docker-compose.yml docker-compose down php$(v)

analyse:	## Run static analyse
	COMPOSE_FILE=tests/docker/docker-compose.yml docker-compose build --pull php$(v)
	COMPOSE_FILE=tests/docker/docker-compose.yml docker-compose run php$(v) vendor/bin/psalm --stats -m --output-format=console --php-version=$(v) --threads=2
	COMPOSE_FILE=tests/docker/docker-compose.yml docker-compose down