<?php
/**
 * Created by PhpStorm.
 * User: matthes
 * Date: 13.06.18
 * Time: 17:54
 */

namespace Phore\Theme\Bootstrap;


class Bootstrap4_Config
{
    public $charset = "utf-8";

    public $cssUrls = [
        "/asset/bs/css/bootstrap.min.css",
        "/asset/fontawesome/css/all.css"
    ];

    public $cssCode = [];

    public $jsUrls = [
        "/asset/jquery-3.3.1.min.js",
        "/asset/popper.min.js",
        "/asset/bs/js/bootstrap.min.js",
    ];


    public $title = "Unnamed theme document";

    public $jsCode = [];


    public $content = [
        "Hello World"
    ];

}