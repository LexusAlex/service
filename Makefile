init: docker-build docker-up
docker-build:
	docker compose build --pull
docker-up:
	docker compose up -d
docker-down:
	docker compose down --remove-orphans
composer-be-updated-all:
	docker compose run --rm php-cli composer show -l -o
composer-dump-autoload:
	docker compose run --rm php-cli composer dump-autoload
composer-tree-package:
	docker compose run --rm php-cli composer show -t