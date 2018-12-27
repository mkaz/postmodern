
.PHONY: watch
watch:
	node-sass -w --output-style compact -o ./ ./src/style.scss

.PHONY: build
build:
	node-sass --output-style compact -o ./ ./src/style.scss

