<?php
/**
 * Created by PhpStorm.
 * User: matthias
 * Date: 23.08.18
 * Time: 17:21
 */

namespace App;
use Phore\Html\Helper\Highlighter;
use Phore\MicroApp\App;
use Phore\Theme\Bootstrap\Bootstrap4_Config;
use Phore\Theme\Bootstrap\Bootstrap4_Page;

/**
 * @var $page Bootstrap4_Page
 * @var $config Bootstrap4_Config
 * @var $app App
 */

$hl = new Highlighter();
$config->frameworks["vue"] = true; // Enable VueJS
$config->jsUrls[] = "/assets/vueapp1.js"; // Link to virtual asset
$config->cssUrls[] = "/assets/github.css"; // Link to virtual asset

$page->addContent([
    "div @container" => [
        "h2" => "Script (VueJS)",
        "p @id=vue-example1" => [
            "some",
            "span" => "{{ counter }} clicks on ",
            "button @btn btn-primary @v-on:click=counter += 1" => "Click me"
        ]
    ]
]);
$hl->end_recording();




$page->addContent([
    "div @container" => [
        "pre" => [
            "code" => $hl->getCode()
        ]
    ]
]);