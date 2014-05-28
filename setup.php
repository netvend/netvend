<?
require('mysql.php');

$db = new DatabaseHandler();

$result = $db->query('
CREATE TABLE IF NOT EXISTS deposits (
    txid CHAR(64) NOT NULL PRIMARY KEY
);

CREATE TABLE IF NOT EXISTS accounts (
    address VARCHAR(34) NOT NULL PRIMARY KEY,
    balance BIGINT UNSIGNED NOT NULL
);

CREATE TABLE IF NOT EXISTS history (
    id        BIGINT UNSIGNED NOT NULL auto_increment PRIMARY KEY,
    address   VARCHAR(34) NOT NULL,
    command   LONGTEXT NOT NULL,
    signature CHAR(65) NOT NULL,
    fee       BIGINT UNSIGNED NOT NULL,
    timestamp TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    recipient VARCHAR(34) NULL,
    amount    BIGINT UNSIGNED NULL,
    KEY address (address),
    KEY timestamp (timestamp),
    KEY recipient (recipient)
) AUTO_INCREMENT=1;
');

echo 'Success? ';
echo $result;