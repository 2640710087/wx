<?php

//namespace /wx/format;
/**
 * Class format
 *
 */
class Format {

  /**
   * @param array $data
   * @return int|string
   */
  public static function formatToJson ($data) {
    header("Content-type: application/json; charset=UTF-8;");

    if (is_array($data)) {
      return json_encode($data);
    } else {
      return 0;
    }
  }

  /**
   * @param array $array
   * @return string
   */
  private static function arrayToXml ($array) {
    $res = "";
    foreach ($array as $key => $value) {
      $res .= "<$key>";
      if (is_array($value)) {
        $res .= self::arrayToXml($value);
      } else {
        $res .= "$value";
      }
      $res .= "</$key>";
    }
    return $res;
  }

  /**
   * @param array $data
   * @return string
   */
  public static function formatToXml ($data) {
    header("Content-Type: text/xml; charset=UTF-8;");
    $res = '<Result>';
    if (is_array($data)) {
       $res .= self::arrayToXml($data);
       $res .= "</Result>";
       return $res;
    } else {
      return "<errMsg>401</errMsg>";
    }
  }
}
