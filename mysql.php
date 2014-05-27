<?
/* Import MySQL Credentials */
require_once('config.php');


/**
 * A database handler to abstract away database intergration.
 */
class DatabaseHandler {
    /**
     * DatabaseHandler constructor.
     * 
     * @param string $host The MySQL server's address.
     * @param int $port The MySQL server's port.
     * @param string $db The database name.
     * @param string $write_user A MySQL username with write access.
     * @param string $write_pass The MySQL password for the associated $write_user.
     * @param string $read_user A MySQL username with read access.
     * @param string $read_pass The MySQL password for the associated $read_user.
     * @access public
     * 
     */
    public function __construct($host=MYSQL_HOST, $port=MYSQL_PORT, $db=MYSQL_DB, $write_user=MYSQL_WRITE_USER, $write_pass=MYSQL_WRITE_PASS, $read_user=MYSQL_READ_USER, $read_pass=MYSQL_READ_PASS) {
        $this->mysql_write = new mysqli($host, $write_user, $write_pass, $db, $port);
        $this->mysql_read = new mysqli($host, $read_user, $read_pass, $db, $port);
    }
    
    /**
     * A query executer.
     * 
     * @param string $sql The SQL query.
     * @param boolean $write Whether to use the read or write connections.
     * @return boolean Success?
     * @access public
     * 
     */
    public function query($sql, $write=true) {
        $mysql = $write ? $this->mysql_write : $this->mysql_read;
        return $mysql->query($sql);
    }
}