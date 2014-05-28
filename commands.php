<?
/* Import Fee Config */
require('config.php');

/* Import DatabaseHandler */
require('mysql.php');

/**
 * A command handler.
 */
class CommandHandler {
    /**
     * Command handler.
     * 
     * @param array $both [json_command, signature, sql_if_this_is_a_query]
     * @return mixed The response. An associative array if there is an error. History ID for post, tip and withdraw. [id, sql_results] for querys.
     */
    public function handle($transport) {
        /* Command Transport Sanity Checking. */
        if (!is_array($transport)) {
            return array('error' => 'INVALID_COMMAND_TRANSPORT', 'error_message' => 'Command transport is not an array.');
        }
        
        if (!count($transport) == 2 && !count($transport) == 3) {
            return array('error' => 'INVALID_COMMAND_TRANSPORT', 'error_message' => 'Command transport length is not 2 or 3.');
        }
        
        /* Split up command transport. */
        $json = $transport[0];
        $signature = $transport[1];
        if (count($transport) == 3) {
            $sql = $transport[2];
        }
        
        /* Decode JSON command. */
        $command = json_decode($json);
        
        /* Command Sanity Checking. */
        if (!is_array($command)) {
            return array('error' => 'INVALID_COMMAND', 'error_message' => 'Command is not an array.');
        }
        
        if (!count($command) == 2 && !count($command) == 4) {
            return array('error' => 'INVALID_COMMAND', 'error_message' => 'Command length is not 2 or 4.');
        }
        
        switch ($command[0]) {
            case 0:
                /* Post */
                if (!count($command) == 2) {
                    return array('error' => 'INVALID_COMMAND', 'error_message' => 'Command length is not 2.');
                }
                
                $data = $commands[1];
                break;
            case 1:
                /* Tip */
                break;
            case 2:
                /* Query */
                break;
            case 3:
                /* Withdraw */
                break;
            default:
                 return array('error' => 'INVALID_COMMAND', 'error_message' => 'Command type not in [1, 2, 3, 4].');
        }
    }
    
    /**
     * Bulk command handler. Loops through commands and calls $this->handle($command).
     * 
     * @param array $commands An array of commands.
     * @return array An array of responses from $this->handle.
     */
    public function handleMultiple($commmands) {
        $results = array();
        foreach ($commands as $command) {
            $results.append($this->handle($command));
        }
        return $results;
    }
}