<?php

/**
 * Serialiser
 *
 * Allows serialising any object into a HTTP safe short encoded string
 */
class SerialiserUtil {

    /**
     * HTTP_POST and HTTP_GET safe Serialise an object
     * @param object $object
     */
    public static function serialise($object) {
        return strtr(base64_encode(addslashes(gzcompress(serialize($object), 9))), '+/=', '-_,');
    }

    /**
     * HTTP_POST and HTTP_GET safe unserialise a serialised object
     * @param object $object
     */
    public static function unserialise($object) {
        $newobj = gzuncompress(stripslashes(base64_decode(strtr($object, '-_,', '+/='))));
        return unserialize($newobj);
    }

}
