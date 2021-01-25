#!/bin/bash
sudo cp ./.env.example ./.env
sudo docker-compose build --force-rm
sudo docker-compose up -d
sudo docker-compose run --entrypoint="composer install" composer
sudo cp ./build_yii.sh ./src/
sudo chmod +x ./src/build_yii.sh
sudo cp ./src/config/db.example.php ./src/config/db.php
sudo docker-compose exec php_server1 "./build_yii.sh"