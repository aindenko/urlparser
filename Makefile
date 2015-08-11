COVERAGE_HTML_DIR ?= $(PWD)/build/coverage

test:
	phpunit --bootstrap bootstrap.php

coverage:
	mkdir -p $(COVERAGE_HTML_DIR)
	phpunit  --bootstrap bootstrap.php --coverage-html $(COVERAGE_HTML_DIR)

phpcs:
	phpcs src/ || true
