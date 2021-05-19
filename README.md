# Installation

First, clone this repository:

Add `symfony.localhost` in your `/etc/hosts` file.

Then, run:

```bash
$ docker-compose up
```

_Note :_ you can rebuild all Docker images by running:

```bash
$ docker-compose build
```

# Install composer packages

Please run the command below

```bash
docker exec -d php-fpm sh -c "composer install"
```

You can also use an interactive terminal and execute the composer install

```bash
docker exec -it php-fpm sh -c "composer install"
```

Please wait for a while as it may take a few minutes to install the dependencies and clear cache.
You can visit your Symfony application on the following URL: `http://symfony.localhost` . Please give the required permission to symfony/var/log folder if it complains not writeable.

# How it works?

Here are the `docker-compose` built images:

* `db`: This is the MySQL database container,
* `phpmyadmin`: This is the phpmyadmin container,
* `php`: This is the PHP-FPM container including the application volume mounted on,
* `nginx`: This is the Nginx webserver container in which php volumes are mounted too,
* `elasticsearch`: This is the Elasticsearch server used to store our data,
* `ofelia`: This is the container to run scheduled tasks


# Environment Customizations

You are free to customize the exposed ports and other parameters changing the docker-compose .env file.

# Read logs

Nginx and Symfony application logs can be accessed in the following directories on your host machine:

* `logs/nginx`
* `logs/symfony`

# Use Phpmyadmin!

You can also use Phpmyadmin by visiting `http://symfony.localhost:8080`.
User:`symfony` Password:`symfony` DbName: `symfony`


# Use xdebug!

Start by updating your `docker-compose.yaml` file with `ENABLE_PHP_XDEBUG: 1` under the `php` service.
You will need to re-build the php container for this value to take effect.

Configure your IDE to use port 5902 for XDebug.
