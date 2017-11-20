
# docker WebApp

Docker, Apache2, PHP, MySQL, phpMyAdmin, Symfony

## Installation

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
php bin/console doctrine:migrations:migrate
```

Login

```bash
admin / admin
boss / boss
team / team
worker / worker
trainee / trainee
```
