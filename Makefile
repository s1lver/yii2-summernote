build:
	COMPOSE_FILE=tests/docker/docker-compose.yml docker-compose up -d --build php$(v)

down:
	COMPOSE_FILE=tests/docker/docker-compose.yml docker-compose down php$(v)

analyse:
	COMPOSE_FILE=tests/docker/docker-compose.yml docker-compose build --pull php$(v)
	COMPOSE_FILE=tests/docker/docker-compose.yml docker-compose run php$(v) vendor/bin/psalm --stats -m --output-format=console --php-version=$(v) --threads=2
	COMPOSE_FILE=tests/docker/docker-compose.yml docker-compose down