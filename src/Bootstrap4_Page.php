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

        $this->head = $head = $doc->elem("head");
        $this->body = $body = $doc->elem("body");

        if ($config->content !== null) {
            $body->tpl($config->content);
        }
    }


    public function addContent($data = null) : FHtml
    {
        $this->body->tpl($data);
        return $this->body;
    }


    public function render() : string
    {
        $config = $this->config;

        $head = $this->head;
        $head->elem("meta @charset=?", [$config->charset]);
        $this->title = $head->elem("title");
        $this->title->content($config->title);
        $head->elem("meta @name=viewport @content=width=device-width, initial-scale=1, shrink-to-fit=no");

        foreach ($config->frameworks as $framework => $enabled) {
            if ( ! $enabled)
                continue;
            if ( ! isset($config::FRAMEWORK_CSS[$framework]))
                continue;
            foreach ($config::FRAMEWORK_CSS[$framework] as $cssHref)
                $head->elem("link @rel=stylesheet @crossorigin=anonymous @href=?", [$cssHref]);
        }

        foreach ($config->cssUrls as $cur)
            $head->elem("link @rel=stylesheet @crossorigin=anonymous @href=?", [$cur]);
        foreach ($config->cssCode as $cur)
            $head->elem("style")->content(new RawHtmlNode($cur));


        foreach ($config->frameworks as $framework => $enabled) {
            if ( ! $enabled)
                continue;
            if ( ! isset($config::FRAMEWORK_JS[$framework]))
                continue;
            foreach ($config::FRAMEWORK_JS[$framework] as $jsHref)
                $this->body->elem("script @language=javascript @crossorigin=anonymous @src=?", [$jsHref]);
        }
        foreach ($config->jsUrls as $cur)
            $this->body->elem("script @language=javascript @crossorigin=anonymous @src=?", [$cur]);
        foreach ($config->jsCode as $cur)
            $this->body->elem("script @language=javascript ")->content(new RawHtmlNode($cur));
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