install:
	composer install

brain-even:
	./bin/brain-even

brain-calc:
	./bin/brain-calc

validate:
	composer validate

lint:
	composer exec --verbose phpcs -- --standard=PSR12 src bin
