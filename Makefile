define bash-c
	docker-compose exec --user docker app bash -c
endef

up:
	docker-compose up -d
ps:
	docker-compose ps
down:
	docker-compose down
init:
	echo DOCKER_UID=`id -u` > .env
	docker-compose build --no-cache
	docker-compose up -d
	$(bash-c) 'composer install'
	$(bash-c) 'chmod 777 -R storage bootstrap/cache'
	echo 'sleep 10' && sleep 10
	$(bash-c) 'php artisan migrate:fresh --seed'
