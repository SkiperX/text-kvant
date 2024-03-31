up:
	docker-compose up -d
stop:
	docker-compose stop

init: up app-grant-write-permission app-composer-install app-migrations app-storage-link

app-composer-install:
	docker-compose run --rm laravel composer install
	docker-compose run --rm laravel composer run-script post-root-package-install
	docker-compose run --rm laravel composer run-script post-create-project-cmd

app-migrations:
	docker-compose run --rm laravel php artisan migrate --force

app-storage-link:
	docker-compose run --rm laravel php artisan storage:link

app-grant-write-permission:
	docker-compose run --rm laravel chmod -R 775 storage
	docker-compose run --rm laravel chmod -R ugo+rw storage

bash:
	docker-compose run --rm laravel bash

bash-nuxt:
	docker-compose run --rm nuxt bash