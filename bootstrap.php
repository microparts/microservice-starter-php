<?php declare(strict_types=1);

use Igni\Application\HttpApplication;
use Igni\Network\Server\Configuration;
use Igni\Network\Server\HttpServer;
use Illuminate\Container\Container;
use Microparts\Igni\Support\Middleware\ErrorHandlerMiddleware;
use Microparts\Igni\Support\Modules\AutoRegisterControllersModule;
use Microparts\Igni\Support\Modules\ConfigurationModule;
use Microparts\Igni\Support\Modules\HealthcheckModule;
use Microparts\Igni\Support\Modules\LoggerModule;
//use Microparts\Igni\Support\Modules\PostgresPdoModule;
use Microparts\Igni\Support\Modules\ServiceInfoModule;
use Microparts\Igni\Support\Modules\ValidationModule;

// Setup server
$conf = new Configuration(8080, '0.0.0.0');
$conf->setWorkers(4);

// NullLogger disables access logs
$server = new HttpServer($conf /*, new \Psr\Log\NullLogger() */);
$container = new Container();

// Setup application and routes
$app = new HttpApplication($container);
$app->use(ErrorHandlerMiddleware::class);
$app->extend(HealthcheckModule::class);
$app->extend(LoggerModule::class);
$app->extend(ConfigurationModule::class);
$app->extend(ServiceInfoModule::class);
// $app->extend(PostgresPdoModule::class);
$app->extend(ValidationModule::class);
$app->extend(AutoRegisterControllersModule::class);

return $app;
