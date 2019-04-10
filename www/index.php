<?php

namespace Demo;

use Phore\Html\Fhtml\FHtml;
use Phore\Html\Helper\Highlighter;
use Phore\MicroApp\App;
use Phore\MicroApp\Handler\JsonExceptionHandler;
use Phore\Theme\Bootstrap\Bootstrap4_Config;
use Phore\Theme\Bootstrap\Bootstrap4_Page;
use Phore\Theme\Bootstrap\Bootstrap4Module;
use Phore\Theme\CoreUI\CoreUi_Config_PageWithSidebar;
use Phore\Theme\CoreUI\CoreUi_PageWithSidebar;

require __DIR__ . "/../vendor/autoload.php";

$hl = new Highlighter();
$hl->start_recording();
$app = new App();
$app->setOnExceptionHandler(new JsonExceptionHandler());
$app->acl->addRule(aclRule()->ALLOW());

$app->addModule(new Bootstrap4Module());

$startCode = $hl->end_recording();

// Define a virtual file /assets/vueapp1.js
$app->assets()->addVirtualAsset("vueapp1.js", [
    __DIR__ . "/02_vue_app.js"
]);



$app->router->get("/", function () use ($startCode, $app) {


    $hl = new Highlighter();
    $config = new Bootstrap4_Config();
    $config->frameworks["vue"] = true;
    $config->title = "Phore Theme Bootstrap :: Documentation";

    $page = new Bootstrap4_Page($config);
    $page->addContent([
        "div @container" => [
            "h1" => "Phore theme bootstrap"
        ]
    ]);
    $hl->end_recording();

    $config->jsUrls[] = "//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.12.0/highlight.min.js";
    $config->jsUrls[] = "//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.12.0/languages/php.min.js";
    $config->jsCode[] = "hljs.initHighlightingOnLoad();";

    $page->addContent([
        "div @container" => [
            "h2" => "Basic setup",
            "pre" => [
                "code @highlighter-rouge" => $hl->getCode()
            ],
            "div @bs_autoformat" => FHtml::MarkdownFile(__DIR__ . "/markdown.inc.md")
        ]
    ]);

    require __DIR__ . "/02_script.php";

    $page->out();



});


$app->serve();
