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

Please wait for a while as it may take a few minutes to install the dependencies and clear cache.
You can visit your Symfony application on the following URL: `http://symfony.localhost` . Please give the required permission to symfony/var/log folder if it complains not writeable.

# How it works?

Here are the `docker-compose` built images:

* `db`: This is the MySQL database container,
* `phpmyadmin`: This is the phpmyadmin container,
* `php`: This is the PHP-FPM container including the application volume mounted on,
* `nginx`: This is the Nginx webserver container in which php volumes are mounted too,
* `elasticsearch`: This is the Elasticsearch server used to store our web server and application logs,
* `logstash`: This is the Logstash tool from Elastic Stack that allows to read logs and send them into our Elasticsearch server,
* `kibana`: This is the Kibana UI that is used to render logs and create beautiful dashboards. 


# Environment Customizations

You are free to customize the exposed ports and other parameters changing the docker-compose .env file.

# Read logs

Nginx and Symfony application logs can be accessed in the following directories on your host machine:

* `logs/nginx`
* `logs/symfony`

# Use Kibana!

To visualize Nginx & Symfony logs by visiting `http://symfony.localhost:81`.

# Use Phpmyadmin!

You can also use Phpmyadmin by visiting `http://symfony.localhost:8080`.
User:`symfony` Password:`symfony` DbName: `symfony`


# Use xdebug!

Start by updating your `docker-compose.yaml` file with `ENABLE_PHP_XDEBUG: 1` under the `php` service.
You will need to re-build the php container for this value to take effect.

Configure your IDE to use port 5902 for XDebug.
