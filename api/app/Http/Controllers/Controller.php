<?php

namespace App\Http\Controllers;
use OpenApi\Attributes as OA;

#[
    OA\Info(title:"antena-radar", version:"0.1"),
    OA\Server(url:"http://localhost:8080/", description:"development"),
    OA\SecurityScheme(securityScheme:"bearerAuth", type: "http", name: "Authorization", in:"header", scheme:"bearer"),
]
abstract class Controller
{
    //
}
