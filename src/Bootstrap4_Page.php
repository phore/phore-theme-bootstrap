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
        $this->document = $doc = fhtml("html");

        $this->head = $head = $doc->elem("head");
        $this->body = $body = $doc->elem("body");

        if ($config->content !== null) {
            $body->tpl($config->content);
        }

        $head->elem("meta @charset=?", [$config->charset]);
        $this->title = $head->elem("title");
        $this->title->content($config->title);
        $head->elem("meta @name=viewport @content=width=device-width, initial-scale=1, shrink-to-fit=no");

        foreach ($config->cssUrls as $cur)
            $head->elem("link @rel=stylesheet @crossorigin=anonymous @href=?", [$cur]);
        foreach ($config->cssCode as $cur)
            $head->elem("style")->content(new RawHtmlNode($cur));

        foreach ($config->jsUrls as $cur)
            $doc->elem("script @language=javascript @crossorigin=anonymous @src=?", [$cur]);
        foreach ($config->jsCode as $cur)
            $doc->elem("script @language=javascript ")->content(new RawHtmlNode($cur));
    }


    public function render() : string
    {
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