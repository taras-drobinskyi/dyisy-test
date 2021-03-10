<?php

class MysqlLoggerService implements Logger
{
    private $db;

    public function __construct() {
        $this->db = new PDO(DB_TYPE . ':host=' . DB_HOST . ':' . DB_PORT . ';dbname=' . DB_NAME . "; charset=" . DB_CHARSET, DB_USER, DB_PASS);
    }

    public function log(string $buttonId, string $ip): array {
        $success = false;
        $result = '';
        try {
            $sql = $this->db->prepare('CREATE TABLE IF NOT EXISTS log (
                    id BIGINT(20) NOT NULL AUTO_INCREMENT,
                    ip varchar(255),
                    button_id varchar(255),
                    date TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
                    PRIMARY KEY (id)
                );
                INSERT INTO log (ip, button_id)
                VALUES (:ip, :button_id)
                ');

            $sql->bindParam('ip', $ip);
            $sql->bindParam('button_id', $buttonId);

            $success = $sql->execute();
        } catch (\Exception $e) {
            $result = $e->getMessage();
        }

        return ['success' => $success, 'result' => $result];
    }
}