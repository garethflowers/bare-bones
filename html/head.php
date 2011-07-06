<?php

/**
 * HTML Head
 * Generates a HTML <head> element
 *
 * @author garethflowers
 */
class HtmlHead implements IRenderable
{

    private $template;
    private $title = '';
    private $sitename = '';
    private $meta = array( );
    private $script = array( );
    private $keyword = array( );
    private $link = array( );

    public function __construct()
    {
        $this->addMeta( 'handheldfriendly', 'true', '' );
        $this->addMeta( 'viewport', 'width=device-width,height=device-height,user-scalable=no,initial-scale=0.5', '' );

        if ( !empty( $this->template ) )
        {
            require_once( $_SERVER['DOCUMENT_ROOT'] . '/lib/template/' . $this->template . '/header.php' );
            require_once( $_SERVER['DOCUMENT_ROOT'] . '/lib/template/' . $this->template . '/footer.php' );
        }
    }

    /**
     * Factory method
     * @param mixed $content
     * @return htmlHead
     */
    public static function create( $content = NULL )
    {
        $class = parent::create( $content );

        return $class;
    }

    /**
     * set the page title
     * @param string $title
     */
    public function setTitle( $title )
    {
        $this->title = $title;
    }

    /**
     * set the document description
     * @param string $description
     */
    public function setDescription( $description )
    {
        $this->AddMeta( 'description', $description, '' );
    }

    /**
     * add a keyword to the page header
     * @param string $word
     */
    public function addKeyword( $word )
    {
        if ( !in_array( $word, $this->keyword ) )
        {
            $this->keyword[] = $word;
        }
    }

    /**
     * set the website name that owns this page
     * @param string $sitename
     */
    public function setSiteName( $sitename )
    {
        $this->sitename = $sitename;
    }

    /**
     * set the document author
     * @param string $author
     */
    public function setAuthor( $author )
    {
        $this->AddMeta( 'copyright', $author . ' &copy; ' . date( 'Y' ), '' );
    }

    /**
     *
     * @param string $code
     */
    public function setGoogleVerification( $code )
    {
        $this->AddMeta( 'google-site-verification', $code, '' );
    }

    /**
     *
     * @param string $code
     */
    public function setYahooVerification( $code )
    {
        $this->AddMeta( 'y_key', $code, '' );
    }

    /**
     * add a stylesheet to the page header
     * @param string $style
     */
    public function addStyle( $style )
    {
        $this->AddLink( 'stylesheet', 'text/css', $style );
    }

    /**
     * add a linked page to the page header
     * @param string $rel
     * @param string $type
     * @param string $href
     */
    public function addLink( $rel, $type, $href )
    {
        if ( !in_array( array( $rel, $type, $href ), $this->link ) )
        {
            $this->link[] = array( $rel, $type, $href );
        }
    }

    /**
     * add an external client script file to the page header
     * @param string $script
     */
    public function addScript( $script )
    {
        if ( !in_array( $script, $this->script ) )
        {
            $this->script[] = $script;
        }
    }

    /**
     * add a meta tag to the page header
     * @param string $name
     * @param string $content
     * @param string $httpequiv
     */
    public function addMeta( $name, $content, $httpequiv )
    {
        $this->meta[$name] = array( $content, $httpequiv );
    }

    /**
     * render the page header as html
     * @return html
     */
    public function render()
    {
        $html = '<head>';
        $html .= '<meta charset="utf-8" />';

        if ( count( $this->keyword ) > 0 )
        {
            $this->AddMeta( 'keyword', implode( ', ', $this->keyword ), '' );
        }

        if ( !empty( $this->title ) )
        {
            $this->AddMeta( 'title', $this->title, '' );
            $html .= '<title>' . $this->title . ' &laquo; ' . $this->sitename . '</title>';
        }
        else
        {
            $this->AddMeta( 'title', $this->sitename, '' );
            $html .= '<title>' . $this->sitename . '</title>';
        }

        foreach ( $this->meta as $name => $value )
        {
            $html .= $this->renderMeta( $name, $value[0], $value[1] );
        }

        foreach ( $this->link as $value )
        {
            $html .= $this->renderLink( $value[0], $value[1], $value[2] );
        }

        foreach ( $this->script as $value )
        {
            $html .= $this->renderScript( $value );
        }

        $html .= '</head>';

        return $html;
    }

    /**
     *
     * @param string $name
     * @param string $content
     * @param string $httpequiv
     * @return string
     */
    private function renderMeta( $name, $content, $httpequiv )
    {
        $html = '<meta';

        if ( !empty( $name ) )
        {
            $html .= ' name="' . htmlspecialchars( $name ) . '"';
        }

        if ( !empty( $content ) )
        {
            $html .= ' content="' . htmlspecialchars( $content ) . '"';
        }

        if ( !empty( $httpequiv ) )
        {
            $html .= ' http-equiv="' . htmlspecialchars( $httpequiv ) . '"';
        }

        $html .= ' />';

        return $html;
    }

    /**
     *
     * @param string $rel
     * @param string $type
     * @param string $href
     * @return string
     */
    private function renderLink( $rel, $type, $href )
    {
        $html = '<link';

        if ( !empty( $rel ) )
        {
            $html .= ' rel="' . htmlspecialchars( $rel ) . '"';
        }

        if ( !empty( $type ) )
        {
            $html .= ' type="' . htmlspecialchars( $type ) . '"';
        }

        if ( !empty( $href ) )
        {
            $html .= ' href="' . htmlspecialchars( $href ) . '"';
        }

        $html .= ' />';

        return $html;
    }

    /**
     *
     * @param string $file
     * @return string
     */
    private function renderScript( $file )
    {
        return '<script type="text/javascript" src="' . $file . '"></script>';
    }

}
