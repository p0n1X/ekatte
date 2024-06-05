#!/bin/bash
echo "Creating table"
mysql -u${MYSQL_USER} -p${MYSQL_PASSWORD} ${MYSQL_DATABASE} < table.sql

echo "Importing data"
php controller/Import.php

echo "Done!!"