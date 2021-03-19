<?php


class FileLoggerService implements Logger
{

    public function __construct() {

    }

    public function log(string $buttonId, string $ip): array {
        $success = false;

        try {
            $log = '[' . date('Y-m-d H:m:s') . ']' . ' IP: ' . $ip . ', ButtonId: ' . $buttonId . PHP_EOL;

            if (!file_exists('log')) {
                mkdir('log', 0777, true);
            }

            $result = file_put_contents('./log/' . date("Y-m-d") . '-click.log', $log, FILE_APPEND);
            $success = true;
        } catch (Exception $e) {
            $result = $e->getMessage();
        }

        return [
            'success' => $success,
            'result' => $result
        ];
    }
}