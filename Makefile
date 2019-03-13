IMAGE = rg.teamc.io/teamc.io/microservice/countries
G_IMAGE = eu.gcr.io/teamcio-195516/teamc-microservice-countries
VERSION = latest
ENV = local
FILE = docker-compose.test.yaml

image:
	docker build -t $(IMAGE):$(VERSION) .

push:
	docker push $(IMAGE):$(VERSION)

push-to-g:
	docker tag $(IMAGE):$(VERSION) $(G_IMAGE):$(VERSION)
	docker push $(G_IMAGE):$(VERSION)

migrate:
	vendor/bin/phinx migrate -c ./configuration/$(ENV)/phinx.yml -e default

rollback:
	vendor/bin/phinx rollback -c ./configuration/$(ENV)/phinx.yml -e default

seed:
	vendor/bin/phinx seed:run -c ./configuration/$(ENV)/phinx.yml -e default

# Запуск docker-compose вместе с приложением и БД, но только для исполнения тестов, см. Dockerfile.testing
test:
	docker-compose -f $(FILE) build
	docker-compose -f $(FILE) up -d; docker-compose -f $(FILE) logs -f | awk '/app_1 exited/ { system("docker-compose -f $(FILE) logs && docker-compose -f $(FILE) down") }'
	#docker-compose up --abort-on-container-exit

all: image push
