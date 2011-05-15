<?php

/**
 * SiteMap Class
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
    private function RenderPage( $page )
    {
        $xml = '<url>';
        $xml .= '<loc>http://' . $_SERVER['HTTP_HOST'] . $page['url'] . '</loc>';
        $xml .= '<lastmod>' . $page['modified'] . '</lastmod>';
        $xml .= '<changefreq>weekly</changefreq>';
        $xml .= '<priority>' . $page['priority'] . '</priority>';
        $xml .= '</url>';
        return $xml;
    }

    /**
     * Add a page to the SiteMap
     * @param string $url URL of the page
     * @param date $modified Date last modified in ISO 8601 format
     * @param integer $priority Priority of the URL
     */
    public function Add( $url, $modified, $priority )
    {
        $this->pages[] = array(
            'url' => $url,
            'modified' => $modified,
            'priority' => $priority
        );
    }

    /**
     * Output the SiteMap as an XML document
     * @return xml
     */
    public function Render()
    {
        header( 'Content-Type: text/xml;charset=utf-8' );

        $xml = '<?xml version="1.0" encoding="UTF-8"?>';
        $xml .= "\n" . '<urlset xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd" xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';

        foreach ( $this->pages as $node )
        {
            $xml .= "\n" . $this->RenderPage( $node );
        }

        $xml .= '</urlset>';

        return $xml;
    }

}
