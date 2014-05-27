<?
/* MySQL Credentials (pre-configured for OpenShift) */
define('MYSQL_HOST', getenv('OPENSHIFT_MYSQL_DB_HOST');
define('MYSQL_PORT', getenv('OPENSHIFT_MYSQL_DB_PORT'));
define('MYSQL_DB', getenv('OPENSHIFT_APP_NAME'))
define('MYSQL_WRITE_USER', getenv('OPENSHIFT_MYSQL_DB_USERNAME'));
define('MYSQL_WRITE_PASS'), getenv('OPENSHIFT_MYSQL_DB_PASSWORD'));
define('MYSQL_READ_USER', 'netvend_readonly');
define('MYSQL_READ_PASS', 'CHANGE_THIS')

/* Deposit Details */
define('DEPOSIT_ADDRESS', 'CHANGE_THIS');
define('DEPOSIT_CONFIRMATIONS', 3);
?>