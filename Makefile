build:
	COMPOSE_FILE=tests/docker/docker-compose.yml docker-compose up -d --build

analyse:
	COMPOSE_FILE=tests/docker/docker-compose.yml docker-compose run php{$v} vendor/bin/psalm --shepherd --stats --output-format=checkstyle --php-version={$v} | cs2pr --graceful-warnings --colorize