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
test:
	docker compose run --rm php-cli composer phpunit
fixer:
	docker compose run --rm php-cli composer php-cs-fixer
psalm:
	docker compose run --rm php-cli composer psalm -- --no-diff
create-migrate:
	docker compose run --rm php-cli composer phinx create -- --configuration src/Db/phinx.php --template vendor/robmorgan/phinx/src/Phinx/Migration/Migration.up_down.template.php.dist $(name)
run-migrate:
	docker compose run --rm php-cli composer phinx migrate -- --configuration src/Db/phinx.php
rollback-migrate:
	docker compose run --rm php-cli composer phinx rollback -- --configuration src/Db/phinx.php
status-migrate:
	docker compose run --rm php-cli composer phinx status -- --configuration src/Db/phinx.php