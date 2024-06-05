<?php

/**
 * All kinds of application response must be set through this object
 */

namespace App\Http;

class Response
{
    /**
     * JSON response format
     */
    public function json(object | array $data = null, int $state = 200): void
    {
        ob_start();

        ob_clean();

        header_remove();

        header("Content-type: application/json; charset=utf-8");

        http_response_code($state);

        echo json_encode($data);
    }

    /**
     * HTML view
     */
    public function view(string $script, array | object $data = null): void
    {
        $script = (str_replace('.', '/', $script)).'.php';

        $script = dirname(__DIR__, 2).'/resource/view/'.$script;

        try {

            if ($data != null) {
                $data = ! is_object($data) ? $data : (array) $data;
                $data = ! is_array($data) ? null : extract($data);
            }

            ob_start();

            include $script;

            $html = ob_get_contents();

            ob_end_clean();

            echo $html;

        } catch (Exception $e) {

            echo 'Caught exception: ', $e->getMessage(),"\n";
        }
    }

}
