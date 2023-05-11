FROM php:8.1-cli
COPY . /usr/src/ggg
WORKDIR /usr/src/ggg
CMD [ "php", "./index.php" ]