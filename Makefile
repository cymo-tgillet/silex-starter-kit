#!/usr/bin/env bash
all:
	echo "Make sans paramètre est impossible"

dev:
	git pull origin master
	composer install
	sudo rm -rf var/cache/* && touch var/cache/.gitkeep
	chmod 777 var/cache var/logs var/sessions

rights:
	chmod 777 var/cache var/logs var/sessions

db:
	php vendor/bin/doctrine.php orm:schema-tool:update --force
