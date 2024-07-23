#!/bin/bash

docker compose up --build -d

docker exec -it phpvoyage composer install

docker exec -it phpvoyage bin/console make:migration

docker exec -it phpvoyage bin/console doctrine:migrations:migrate

docker exec -it phpvoyage bin/console doctrine:fixtures:load