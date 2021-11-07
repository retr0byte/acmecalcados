<?php

use Source\Class\Mysql;

const HOST = 'localhost';
const USER = 'root';
const PASSWD = '';
const DATABASE = 'acme_calcados';

$mysql = new Mysql(HOST,USER,PASSWD,DATABASE);
$mysql_conn = $mysql->connect();

$GLOBALS['mysql_conn'] = $mysql_conn;

global $mysql_conn;
