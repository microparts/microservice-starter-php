IMAGE = microparts/microservice-starter-php
VERSION = latest
STAGE = dev

image:
	docker build -t $(IMAGE):$(VERSION) .

push:
	docker push $(IMAGE):$(VERSION)

run:
	docker run --name microservice_starter --rm -it --init -p 8080:8080 \
		-e STAGE=$(STAGE) \
		$(IMAGE):$(VERSION)

all: image push
