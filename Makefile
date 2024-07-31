install:
	composer install

brain-even:
	./bin/brain-even

brain-calc:
	./bin/brain-calc

brain-gcd:
	./bin/brain-gcd

validate:
	composer validate

lint:
	composer exec --verbose phpcs -- --standard=PSR12 src bin
