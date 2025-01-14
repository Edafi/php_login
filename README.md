# How to run
`docker-compose up --build -d`.</p>
After docker start, enter the mariadb_app container
`docker exec -it mariadb_app bash`, and insert the dump of database
`mariadb -p php_login < '/var/lib/mysql/php_login_dump.sql'`. The default password is `admin`, but you can change it 
in `docker-compose.yml` file.
