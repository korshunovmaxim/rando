<?php

define("__ROOT__", realpath(__DIR__ . "/.."));

try {

    include(__ROOT__.'/init.php');

    $router = new Router();
    $router->execute();

} catch(RandoHTTPException $e) {

    /* handle application exceptions
     * to provide correct response header */
    header_status( $e->httpCode() );
    respond([
        'message' => $e->getMessage()
    ]);

} catch(Exception $e) {

    /* handle other exceptions */
    header_status( "500" );
    respond([
        'message' => $e->getMessage()
    ]);
}

