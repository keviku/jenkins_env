#!/bin/bash

docker stop gatsby wordpress mysql
docker rmi $(docker images -aq)-f
docker system prune -f
docker volume prune -f
docker rmi test2_gatsby node wordpress mysql
