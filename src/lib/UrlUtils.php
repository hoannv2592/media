<?php

Class UrlUtil {

    protected static $method = 849573251;

    public static function _encodeUrl($id) {
        if (!empty($id)) {
            $method = UrlUtil::$method;
            if (!empty($method)) {
                return $id * $method;
            } else {
                return $id;
            }
        }
    }

    public static function _decodeUrl($id) {
        if (!empty($id)) {
            $method = UrlUtil::$method;
            if (!empty($method)) {
                return $id / $method;
            } else {
                return $id;
            }
        }
    }

}
