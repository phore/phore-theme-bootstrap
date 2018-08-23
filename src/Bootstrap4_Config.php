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

    const FRAMEWORK_CSS = [
        "bootstrap" => [
            "/assets/bs/css/bootstrap.min.css"
        ],
        "fontawesome" => [
            "/assets/fontawesome/css/all.css"
        ]
    ];

    const FRAMEWORK_JS = [
        "jquery" => [
            "/assets/jquery-3.3.1.min.js"
        ],
        "popper" => [
            "/assets/popper.min.js"
        ],
        "bootstrap" => [
            "/assets/bs/js/bootstrap.min.js"
        ],
        "vue" => [
            "/assets/vue-2.5.17.js"
        ]

    ];


    public $frameworks = [
        "jquery" => true,
        "bootstrap" => true,
        "fontawesome" => true,
        "popper" => false,
        "vue" => false
    ];


    public $cssUrls = [];

    public $cssCode = [];

    public $jsUrls = [];


    public $title = "Unnamed theme document";

    public $jsCode = [];


    public $content = [];

}