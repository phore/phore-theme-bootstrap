<?php
/**
 * Created by PhpStorm.
 * User: matthes
 * Date: 13.06.18
 * Time: 17:48
 */

namespace Phore\Theme\Bootstrap;



use Phore\Html\Elements\RawHtmlNode;
use Phore\Html\Fhtml\FHtml;

class Bootstrap4_Page
{
    /**
     * @var Bootstrap4_Config
     */
    private $config;

    /**
     * @var FHtml
     */
    public $document;

    /**
     * @var FHtml
     *
     */
    public $head;

    /**
     * @var FHtml
     */
    public $body;

    /**
     * @var FHtml
     */
    public $title;



    public function __construct(Bootstrap4_Config $config)
    {
        $this->config = $config;
        $this->document = $doc = fhtml("html");

        $doc[] = $this->head = fhtml("head");
        $doc[] = $this->body = fhtml("body");

        if ($config->content !== null) {
            $body[] = $config->content;
        }
    }


    public function addContent($data = null) : FHtml
    {
        $this->body[] =$data;
        return $this->body;
    }


    public function render() : string
    {
        $config = $this->config;

        $head = $this->head;
        $head[] = fhtml("meta @charset=?", [$config->charset]);
        $this->title = $head["title"];
        $this->title[] = $config->title;
        $head[] = fhtml("meta @name=viewport @content=width=device-width, initial-scale=1, shrink-to-fit=no");

        foreach ($config->frameworks as $framework => $enabled) {
            if ( ! $enabled)
                continue;
            if ( ! isset($config::FRAMEWORK_CSS[$framework]))
                continue;
            foreach ($config::FRAMEWORK_CSS[$framework] as $cssHref)
                $head[] = fhtml("link @rel=stylesheet @crossorigin=anonymous @href=?", [str_replace("%assetPath%", $config->assetPath, $cssHref)]);
        }

        foreach ($config->cssUrls as $cur)
            $head[] = fhtml("link @rel=stylesheet @crossorigin=anonymous @href=?", [str_replace("%assetPath%", $config->assetPath, $cur)]);
        foreach ($config->cssCode as $cur)
            $head["style"] = new RawHtmlNode($cur);


        foreach ($config->frameworks as $framework => $enabled) {
            if ( ! $enabled)
                continue;
            if ( ! isset($config::FRAMEWORK_JS[$framework]))
                continue;
            foreach ($config::FRAMEWORK_JS[$framework] as $jsHref)
                $this->body[] = fhtml("script @language=javascript @crossorigin=anonymous @src=?", [str_replace("%assetPath%", $config->assetPath, $jsHref)]);
        }
        foreach ($config->jsUrls as $cur)
            $this->body[] = fhtml("script @language=javascript @crossorigin=anonymous @src=?", [str_replace("%assetPath%", $config->assetPath, $cur)]);
        foreach ($config->jsCode as $cur)
            $this->body["script @language=javascript"][] = new RawHtmlNode($cur);
        return $this->document->renderPage();
    }

    /**
     * Render output and exit.
     */
    public function out()
    {
        echo $this->render();
        exit;
    }

}