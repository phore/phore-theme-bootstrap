<?php

namespace Demo;

use Phore\MicroApp\App;
use Phore\MicroApp\Handler\JsonExceptionHandler;
use Phore\Theme\Bootstrap\Bootstrap4_Config;
use Phore\Theme\Bootstrap\Bootstrap4_Page;
use Phore\Theme\Bootstrap\Bootstrap4Module;
use Phore\Theme\CoreUI\CoreUi_Config_PageWithSidebar;
use Phore\Theme\CoreUI\CoreUi_PageWithSidebar;

require __DIR__ . "/../vendor/autoload.php";


$app = new App();
$app->setOnExceptionHandler(new JsonExceptionHandler());

$app->acl->addRule(aclRule()->ALLOW());

$app->addModule(new Bootstrap4Module());

/*
$app->router->get("/", function () {
    header("Location: /PageWithSidebar");
    return true;
});
*/


$app->router->get("/", function () {
    $config = new Bootstrap4_Config();
    $tpl = new Bootstrap4_Page($config);
    $tpl->out();
});


$app->serve();
