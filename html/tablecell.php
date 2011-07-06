<?php

/**
 * HTML Table Cell
 * Generates a HTML <td> element
 *
 * @author garethflowers
 */
class HtmlTableCell extends HtmlContainer
{

    /**
     * Construct a new HtmlTableCell
     */
    protected function __construct()
    {
        parent::__construct( 'td' );
    }

    /**
     * Factory method
     * @param mixed $content
     * @return HtmlTableCell
     */
    public static function create( $content = NULL )
    {
        $class = parent::create( $content );

        return $class;
    }

    /**
     *
     * @param bool $isheader
     */
    public function setHeaderCell( $isheader )
    {
        if ( (bool) $isheader )
        {
            $this->setTag( 'th' );
        }
        else
        {
            $this->setTag( 'td' );
        }
    }

    /**
     *
     * @param type $count
     */
    public function setSpanColumns( $count )
    {
        $count = intval( $count );

        if ( $count <= 1 )
        {
            $this->setAttribute( 'colspan', NULL );
        }
        else
        {
            $this->setAttribute( 'colspan', intval( $count ) );
        }
    }

}
