<?php

/**
 * HTML Table
 * Generates a HTML <table> element
 *
 * @author garethflowers
 */
class HtmlTable extends HtmlContainer
{

    /**
     * Construct a new HtmlTable
     */
    protected function __construct()
    {
        parent::__construct( 'table' );
    }

    /**
     * Factory method
     * @param mixed $content
     * @return HtmlTable
     */
    public static function create( $content = NULL )
    {
        $class = parent::create( $content );

        return $class;
    }

    /**
     *
     * @param HtmlTableRow $value
     */
    public function addContent( $value )
    {
        if ( isset( $value ) && !($value instanceof HtmlTableRow ) )
        {
            throw new Exception( 'Only HtmlTableRow\'s can be added to a HtmlTable!' );
            exit;
        }

        parent::addContent( $value );
    }

    /**
     * Creates a new row in the table
     */
    public function addRow( $class = NULL )
    {
        $row = HTMLTableRow::create( NULL );
        $row->setClass( $class );
        $this->addContent( $row );
    }

    /**
     * Adds a new cell to the last table row
     * @param mixed $content
     */
    public function addCell( $content, $header = FALSE )
    {
        if ( $this->getContentCount() == 0 )
        {
            throw new Exception( 'At least 1 row is required for adding cells!' );
            exit;
        }

        $rows = $this->getContent();
        $rows = $rows[$this->getContentCount() - 1];

        if ( $content instanceof HtmlTableCell )
        {
            $rows->addContent( $content );
        }
        else
        {
            $cell = HtmlTableCell::create( NULL );
            $cell->setContent( $content );
            $cell->setHeaderCell( $header );
            $rows->addContent( $cell );
        }
    }

}

