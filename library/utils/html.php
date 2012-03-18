<?php

/**
 *
 */
class HtmlUtil {

    /**
     *
     * @param string $fileName
     * @return string
     */
    public static function jsLink($fileName) {
        $data = '<script src="/js/' . $fileName . '.js"></script>';
        return $data;
    }

    /**
     *
     * @param string $code
     * @return string
     */
    public static function jsBlock($code) {
        $data = '<script>' . $code . '</script>';
        return $data;
    }

    /**
     *
     * @param string $fileName
     * @return string
     */
    public static function cssLink($fileName) {
        $data = '<style href="/css/' . $fileName . '.css"></script>';
        return $data;
    }

}
