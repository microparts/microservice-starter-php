<?php

namespace Tests;

abstract class FeatureTestCase extends \PHPUnit\Framework\TestCase
{
    /**
     * @var \Igni\Application\HttpApplication
     */
    protected static $app;

    public static function setUpBeforeClass()
    {
        self::$app = require_once __DIR__ . '/../bootstrap.php';
        self::$app->startup();
    }

    /**
     * Close the database connection after tests executed.
     */
    public static function tearDownAfterClass()
    {
        $pdo = self::$app->getContainer()->get(\PDO::class);
        $pdo = null;
    }

    /**
     * @param $id
     * @return mixed
     */
    protected function resolve($id)
    {
        return self::$app->getContainer()->get($id);
    }
}
