<?php

/**
 * HTML Table Row
 * Generates a HTML <tr> element
 *
 * @author garethflowers
 */
class HtmlTableRow extends HtmlContainer
{

    /**
     * Construct a new HtmlTableRow
     */
    protected function __construct()
    {
        parent::__construct( 'tr' );
    }

    /**
     * Factory method
     * @param mixed $content
     * @return HtmlTableRow
     */
    public static function create( $content = NULL )
    {
        $class = parent::create( $content );

        return $class;
    }

    /**
     * Adds a HtmlTableCell to the container
     * @param HtmlTableCell $value
     */
    public function addContent( $value )
    {
        if ( isset( $value ) && !($value instanceof HtmlTableCell ) )
        {
            throw new Exception( 'Only HtmlTableCell\'s can be added to a HtmlTableRow!' );
            exit;
        }

        parent::addContent( $value );
    }

    /**
     * Alias for addContent
     * @param HtmlTableCell $cell
     */
    public function addCell( $cell )
    {
        $this->addContent( $cell );
    }

}
