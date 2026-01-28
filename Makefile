.PHONY: help format

# Default target
help:
	@echo "Available commands:"
	@echo "  make format    		- Format code using Pint"

format:
	./vendor/bin/pint
