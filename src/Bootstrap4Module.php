<?php
/**
 * Created by PhpStorm.
 * User: matthes
 * Date: 13.07.18
 * Time: 15:49
 */

namespace Phore\Theme\Bootstrap;


use Phore\MicroApp\App;
use Phore\MicroApp\AppModule;

class Bootstrap4Module implements AppModule
{

    /**
     * Called just after adding this to a app by calling
     * `$app->addModule(new SomeModule());`
     *
     * Here is the right place to add Routes, etc.
     *
     * @param App $app
     *
     * @return mixed
     */
    public function register(App $app)
    {
        $app->assets()->addAssetSearchPath(Bootstrap4_Config::ASSETS_DIR_BOOTSTAP);
    }
}