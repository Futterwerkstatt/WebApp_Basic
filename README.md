
# docker WebApp

Docker, Apache2, PHP, MySQL, phpMyAdmin, Symfony

## Installation

```bash
bash symfony.sh
```

.env :

```bash
#MySQL
MYSQL_ROOT_PASSWORD=root
MYSQL_DATABASE=db
MYSQL_USER=user
MYSQL_PASSWORD=password

#apache2
project=symfony # the name of the project will be the name of folder
DocumentRoot=/var/www/html/symfony/web # DocumentRoot html by default or project_name/web for Symfony project
ServerName=mywebsite.de
ServerAlias=www.mywebsite.de
ServerAdmin=admin@mywebsite.de
ssl_cert_file=/etc/apache2/ssl-certs/domain.crt # certificate file
ssl_key_file=/etc/apache2/ssl-certs/domain_private.key # private key file
ssl_interim_file=/etc/apache2/ssl-certs/domain_interim.crt # intermediate certificate file
```

> **Note :** SSL Only :
> ```bash
> <VirtualHost *:80>
>     Redirect permanent / https://${ServerAlias}/
> (...)
> ```

> **Note :** :
> ```bash
> <VirtualHost *:443>
>
>	  <FilesMatch \.php$>
>		 SetHandler "proxy:fcgi://php:9000"
>	  </FilesMatch>
>
>	  ServerName ${ServerName}
>	  ServerAlias ${ServerAlias}
>	  ServerAdmin ${ServerAdmin}
>	  DocumentRoot ${DocumentRoot}
>
>	  SSLEngine on
>   SSLCertificateFile /etc/apache2/ssl-certs/${ssl_cert_file}
>   SSLCertificateKeyFile /etc/apache2/ssl-certs/${ssl_key_file}
>   SSLCACertificateFile /etc/apache2/ssl-certs/${ssl_interim_file}
>
>	  <Directory ${DocumentRoot}>
>		 AllowOverride All
>		 Order Allow,Deny
>		 Allow from All
>		 Require all granted
>   </Directory>
>
>	  ErrorLog ${APACHE_LOG_DIR}/error.log
>	  CustomLog ${APACHE_LOG_DIR}/access.log combined
>
> </VirtualHost>
> ```

Build :

```bash
docker-compose build
```

```bash
cd src
compose install
```

```bash
docker-compose up
```

```bash
nano .gitignore
/data/
/logs/
/src/
/.idea/
/WebApp/vendor/
```

```bash
php bin/console doctrine:migrations:migrate
```

```bash
php bin/console fos:user:create
php bin/console fos:user:promote admin ROLE_ADMIN
```

