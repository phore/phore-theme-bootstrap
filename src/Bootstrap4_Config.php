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

    public $assetPath = "/assets";

    const FRAMEWORK_CSS = [
        "bootstrap" => [
            "%assetPath%/bs/css/bootstrap.min.css"
        ],
        "fontawesome" => [
            "%assetPath%/fontawesome/css/all.css"
        ]
    ];

    const FRAMEWORK_JS = [
        "jquery" => [
            "%assetPath%/jquery-3.3.1.min.js"
        ],
        "popper" => [
            "%assetPath%/popper.min.js"
        ],
        "bootstrap" => [
            "%assetPath%/bs/js/bootstrap.min.js"
        ],
        "vue" => [
            "%assetPath%/vue-2.5.17.js"
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