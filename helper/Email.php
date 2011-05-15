<?php

/**
 * Email Class
 * @author garethflowers
 */
class Email
{

    const EOL = "\n";

    /**
     * from email address
     * @var string
     */
    private $from;
    /**
     * name of sender
     * @var string
     */
    private $name;

    /**
     * creates a new instance of the Email class
     * @param string $from from email address
     * @param string $fromname name of sender
     */
    public function __construct( $from, $fromname )
    {
        $this->from = $from;
        $this->name = $fromname;
    }

    /**
     * send an email
     * @param string $to email address to send to
     * @param string $subject subject of the email
     * @param string $message content of the email body
     */
    public function Send( $to, $subject, $message )
    {
        $headers = 'From: ' . $this->fromname . '<' . $this->from . '>' . EOL;
        $headers .= 'Reply-To: ' . $this->fromname . '<' . $this->from . '>' . EOL;
        $headers .= 'Return-Path: ' . $this->fromname . '<' . $this->from . '>' . EOL;
        $headers .= 'Message-ID: <' . date( 'u' ) . ' ' . $this->from . '>' . EOL;
        $headers .= 'X-Mailer: PHP v' . phpversion() . EOL;
        $headers .= 'MIME-Version: 1.0' . EOL;
        $headers .= 'Content-Type: text/html; charset=utf8' . EOL;
        $headers .= 'Content-Transfer-Encoding: 8bit' . EOL;

        ini_set( sendmail_from, $this->from );
        mail( $to, $subject, $message, $headers );
    }

}
