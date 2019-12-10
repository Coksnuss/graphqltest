#!/bin/sh

exec docker run --name testdb --rm -p 3306:3306 -v ~/test/db:/var/lib/mysql -e MYSQL_DATABASE=symfony -e MYSQL_USER=symfony -e MYSQL_PASSWORD=symfony -e MYSQL_ROOT_PASSWORD=toor mysql:8.0 --character-set-server=utf8mb4 --collation-server=utf8mb4_unicode_ci
