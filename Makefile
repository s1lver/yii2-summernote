export COMPOSE_PROJECT_NAME=yii2-summernote

help:		## Show this help.
	@fgrep -h "##" $(MAKEFILE_LIST) | fgrep -v fgrep | sed -e 's/\\$$//' | sed -e 's/##//'

build:		## Build Docker images
	docker-compose -f tests/docker/docker-compose.yml up -d --build php$(v)

down:		## Stop the built and running image
	docker-compose -f tests/docker/docker-compose.yml down

analyse:	## Run static analyse
	docker-compose -f tests/docker/docker-compose.yml build --pull php$(v)
	docker-compose -f tests/docker/docker-compose.yml run php$(v) vendor/bin/psalm --stats -m --output-format=console --php-version=$(v) --threads=2
	make down

test:		## Run Unit tests
	docker-compose -f tests/docker/docker-compose.yml build --pull php$(v)
	docker-compose -f tests/docker/docker-compose.yml run php$(v) vendor/bin/phpunit --colors=always -v
	make down

mutation-test:	## Run mutation tests
	env > .env
	docker-compose -f tests/docker/docker-compose.yml --env-file .env build --pull php$(v)
	docker-compose -f tests/docker/docker-compose.yml --env-file .env run php$(v) php -dpcov.enabled=1 -dpcov.directory=. vendor/bin/roave-infection-static-analysis-plugin -j2 --ignore-msi-with-no-mutations --only-covered
	make down
