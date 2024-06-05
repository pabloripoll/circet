<?php

use App\Kernel;
use App\Http\Request;
use App\Middleware\ApiAdaptorMiddleware;

class Application extends Kernel
{

    /**
     * Middleware register before execution
     */
    public function middlewareBefore()
    {
        //
    }

    /**
     *
     */
    public function run()
    {
        $request = new Request;

        if ($request->routeParsed()[0] == 'api') {

            new ApiAdaptorMiddleware;

            include_once dirname(__DIR__, 1).'/adaptor/api.php';
        }

        include_once dirname(__DIR__, 1).'/adaptor/web.php';
    }

    /**
     * Middleware register after execution
     */
    public function middlewareAfter()
    {
        //
    }

}

$app = new Application;

return $app;
