<?php declare(strict_types=1);

/**
 * Created by Roquie.
 * E-mail: roquie0@gmail.com
 * GitHub: Roquie
 * Date: 26/10/2018
 */

namespace App\Controllers;

use Igni\Application\Http\Controller;
use Igni\Network\Http\Response;
use Igni\Network\Http\Route;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class ExampleController implements Controller
{
    /**
     * @param \Psr\Http\Message\ServerRequestInterface $request
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function __invoke(ServerRequestInterface $request): ResponseInterface
    {
        return Response::asJson([
            'punks' => 'hoy!'
        ]);
    }

    /**
     * @return \Igni\Network\Http\Route
     */
    public static function getRoute(): Route
    {
        return Route::get('/example');
    }
}
