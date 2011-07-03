<?php

/**
 * SiteMap Class
 *
 * @author garethflowers
 */
class SiteMap
{

    /**
     * Pages within the SiteMap
     * @var array
     */
    private $pages = array( );

    /**
     * Output a page as an XML node
     * @param array $page
     * @return xml
     */
    private function renderPage( $page )
    {
        $result = '<url>';
        $result .= '<loc>http://' . $_SERVER['HTTP_HOST'] . $page['url'] . '</loc>';
        $result .= '<lastmod>' . $page['modified'] . '</lastmod>';
        $result .= '<changefreq>weekly</changefreq>';
        $result .= '<priority>' . $page['priority'] . '</priority>';
        $result .= '</url>';
        return $result;
    }

    /**
     * Add a page to the SiteMap
     * @param string $url URL of the page
     * @param date $modified Date last modified in ISO 8601 format
     * @param integer $priority Priority of the URL
     */
    public function add( $url, $modified, $priority )
    {
        $this->pages[] = array(
            'url' => $url,
            'modified' => $modified,
            'priority' => $priority
        );
    }

    /**
     * Output the SiteMap as an XML document
     * @return string
     */
    public function render()
    {
        header( 'Content-Type: text/xml;charset=utf-8' );

        $result = '<?xml version="1.0" encoding="UTF-8"?>';
        $result .= PHP_EOL . '<urlset xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd" xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';

        foreach ( $this->pages as $node )
        {
            $result .= PHP_EOL . $this->renderPage( $node );
        }

        $result .= PHP_EOL . '</urlset>';

        return $result;
    }

}
