build:
	docker-compose build

run:
	docker-compose up -d

setup:
	docker exec ekatte_app sh 'create_table.sh'

stop:
	docker-compose stop
