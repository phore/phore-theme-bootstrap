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
        ],
         "highlightjs" => [
            "%assetPath%/highlightjs/styles/github.css"
        ],
        "select2" => [
            "%assetPath%/select2/select2.min.css"
        ],
        "daterangepicker" => [
            "%assetPath%/daterangepicker/daterangepicker.css"
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
        ],
        "highlightjs" => [
            "%assetPath%/highlightjs/highlight.pack.js",
            "%assetPath%/highlightjs/run_highlight.js"
        ],
        "bs_autoformat" => [
            "%assetPath%/bs_autoformat.js"
        ],
        "select2" => [
            "%assetPath%/select2/select2.full.min.js"
        ],
        "daterangepicker" => [
            "%assetPath%/moment.js", # Version requires momentjs (keep this order!)
            "%assetPath%/daterangepicker/daterangepicker.js",
        ]
    ];

    const ASSETS_DIR_BOOTSTAP = __DIR__ . "/../lib-dist/";

    public $frameworks = [
        "jquery" => true,
        "bootstrap" => true,
        "fontawesome" => true,
        "popper" => false,
        "vue" => false,
        "highlightjs" => false,
        "bs_autoformat" => true,
        "daterangepicker" => false,
        "select2" => false
    ];


    public $cssUrls = [];

    public $cssCode = [];

    public $jsUrls = [];


    public $title = "Unnamed theme document";

    public $jsCode = [];

    public $content = [];

}
