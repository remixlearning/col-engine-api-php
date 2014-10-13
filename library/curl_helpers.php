<?php
/** 
 * Setup of cURL calls for setup based on type
 * 
 * @author mark ellul https://github.com/mark-ellul
 * @author tre everette https://github.com/teverette
 *
 */

class WWW {
  const HTTP_CONNECTION_TIMEOUT = 0;
  const HTTP_TIMEOUT            = 30000;
  const HTTP_USER_AGENT         = 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_7_2) AppleWebKit/534.52.7 (KHTML, like Gecko) Version/5.1.2 Safari/534.52.7';

  public static function get( $sURL ) {
    $sResponse = NULL;

    if( ( $hCurl = curl_init() ) ) {
      curl_setopt( $hCurl, CURLOPT_CONNECTTIMEOUT, self::HTTP_CONNECTION_TIMEOUT );
      curl_setopt( $hCurl, CURLOPT_TIMEOUT,        self::HTTP_TIMEOUT );
      curl_setopt( $hCurl, CURLOPT_USERAGENT,      self::HTTP_USER_AGENT );
      curl_setopt( $hCurl, CURLOPT_FOLLOWLOCATION, TRUE );
      curl_setopt( $hCurl, CURLOPT_MAXREDIRS,      15 );
      curl_setopt( $hCurl, CURLOPT_RETURNTRANSFER, TRUE );
      curl_setopt( $hCurl, CURLOPT_FAILONERROR,    FALSE );
      curl_setopt( $hCurl, CURLOPT_SSL_VERIFYPEER, FALSE );
      curl_setopt( $hCurl, CURLOPT_SSL_VERIFYHOST, 0 );
      curl_setopt( $hCurl, CURLOPT_HEADER,         FALSE );
      curl_setopt( $hCurl, CURLOPT_NOBODY,         FALSE );

      curl_setopt( $hCurl, CURLOPT_URL, $sURL );

      $sResponse = curl_exec( $hCurl );
      $iErrno    = curl_errno( $hCurl );
      $aInfo     = curl_getinfo( $hCurl );
      
      curl_close( $hCurl );
    }

    return $sResponse;
  }

  public static function get_with_headers( $sURL, $aHeaders ) {
    $sResponse = NULL;

    if( ( $hCurl = curl_init() ) ) {
      curl_setopt( $hCurl, CURLOPT_CONNECTTIMEOUT, self::HTTP_CONNECTION_TIMEOUT );
      curl_setopt( $hCurl, CURLOPT_TIMEOUT,        self::HTTP_TIMEOUT );
      curl_setopt( $hCurl, CURLOPT_USERAGENT,      self::HTTP_USER_AGENT );
      curl_setopt( $hCurl, CURLOPT_FOLLOWLOCATION, TRUE );
      curl_setopt( $hCurl, CURLOPT_MAXREDIRS,      15 );
      curl_setopt( $hCurl, CURLOPT_RETURNTRANSFER, TRUE );
      curl_setopt( $hCurl, CURLOPT_FAILONERROR,    FALSE );
      curl_setopt( $hCurl, CURLOPT_SSL_VERIFYPEER, FALSE );
      curl_setopt( $hCurl, CURLOPT_SSL_VERIFYHOST, 0 );
      curl_setopt( $hCurl, CURLOPT_HEADER,         false );
      curl_setopt($hCurl, CURLOPT_HTTPHEADER, $aHeaders);
      curl_setopt( $hCurl, CURLOPT_NOBODY,         FALSE );
      curl_setopt( $hCurl, CURLOPT_FRESH_CONNECT,  FALSE );
      curl_setopt( $hCurl, CURLOPT_FORBID_REUSE,  FALSE );
      curl_setopt( $hCurl, CURLOPT_URL, $sURL );

      $sResponse = curl_exec( $hCurl );
      $iErrno    = curl_errno( $hCurl );
      $aInfo     = curl_getinfo( $hCurl );
      
      curl_close( $hCurl );
    }

    return $sResponse;
  }

  public static function post( $sURL, $aData ) {
    $sResponse = NULL;

    if( ( $hCurl = curl_init() ) ) {
      curl_setopt( $hCurl, CURLOPT_CONNECTTIMEOUT, self::HTTP_CONNECTION_TIMEOUT );
      curl_setopt( $hCurl, CURLOPT_TIMEOUT,        self::HTTP_TIMEOUT );
      curl_setopt( $hCurl, CURLOPT_USERAGENT,      self::HTTP_USER_AGENT );
      curl_setopt( $hCurl, CURLOPT_FOLLOWLOCATION, TRUE );
      curl_setopt( $hCurl, CURLOPT_MAXREDIRS,      15 );
      curl_setopt( $hCurl, CURLOPT_RETURNTRANSFER, TRUE );
      curl_setopt( $hCurl, CURLOPT_FAILONERROR,    FALSE );
      curl_setopt( $hCurl, CURLOPT_SSL_VERIFYPEER, FALSE );
      curl_setopt( $hCurl, CURLOPT_SSL_VERIFYHOST, 0 );
      curl_setopt( $hCurl, CURLOPT_HEADER,         FALSE );
      curl_setopt( $hCurl, CURLOPT_NOBODY,         FALSE );
      curl_setopt( $hCurl, CURLOPT_FRESH_CONNECT,  FALSE );
      curl_setopt( $hCurl, CURLOPT_FORBID_REUSE,  FALSE );
      curl_setopt( $hCurl, CURLOPT_POST,           TRUE );
      curl_setopt( $hCurl, CURLOPT_POSTFIELDS,     $aData );

      curl_setopt( $hCurl, CURLOPT_URL, $sURL );

      $sResponse = curl_exec( $hCurl );
      $iErrno    = curl_errno( $hCurl );
      $aInfo     = curl_getinfo( $hCurl );

      curl_close( $hCurl );
    }

    return $sResponse;
  }

  public static function post_with_headers( $sURL, $aData, $aHeaders ) {
    $sResponse = NULL;

    if( ( $hCurl = curl_init() ) ) {
      curl_setopt( $hCurl, CURLOPT_CONNECTTIMEOUT, self::HTTP_CONNECTION_TIMEOUT );
      curl_setopt( $hCurl, CURLOPT_TIMEOUT,        self::HTTP_TIMEOUT );
      curl_setopt( $hCurl, CURLOPT_USERAGENT,      self::HTTP_USER_AGENT );
      curl_setopt( $hCurl, CURLOPT_FOLLOWLOCATION, TRUE );
      curl_setopt( $hCurl, CURLOPT_MAXREDIRS,      15 );
      curl_setopt( $hCurl, CURLOPT_RETURNTRANSFER, TRUE );
      curl_setopt( $hCurl, CURLOPT_FAILONERROR,    FALSE );
      curl_setopt( $hCurl, CURLOPT_SSL_VERIFYPEER, FALSE );
      curl_setopt( $hCurl, CURLOPT_SSL_VERIFYHOST, 0 );
      curl_setopt( $hCurl, CURLOPT_HEADER,         false );
      curl_setopt($hCurl, CURLOPT_HTTPHEADER, $aHeaders);
      curl_setopt( $hCurl, CURLOPT_NOBODY,         FALSE );
      curl_setopt( $hCurl, CURLOPT_FRESH_CONNECT,  FALSE );
      curl_setopt( $hCurl, CURLOPT_FORBID_REUSE,  FALSE );
      curl_setopt( $hCurl, CURLOPT_POST,           TRUE );
      curl_setopt( $hCurl, CURLOPT_POSTFIELDS,     $aData );

      curl_setopt( $hCurl, CURLOPT_URL, $sURL );

      $sResponse = curl_exec( $hCurl );
      $iErrno    = curl_errno( $hCurl );
      $aInfo     = curl_getinfo( $hCurl );

      curl_close( $hCurl );
    }

    return $sResponse;
  }

  public static function put( $sURL, $aData ) {
    $sResponse = NULL;

    if( ( $hCurl = curl_init() ) )
    {
      curl_setopt( $hCurl, CURLOPT_CONNECTTIMEOUT, self::HTTP_CONNECTION_TIMEOUT );
      curl_setopt( $hCurl, CURLOPT_TIMEOUT,        self::HTTP_TIMEOUT );
      curl_setopt( $hCurl, CURLOPT_USERAGENT,      self::HTTP_USER_AGENT );
      curl_setopt( $hCurl, CURLOPT_FOLLOWLOCATION, TRUE );
      curl_setopt( $hCurl, CURLOPT_MAXREDIRS,      15 );
      curl_setopt( $hCurl, CURLOPT_RETURNTRANSFER, TRUE );
      curl_setopt( $hCurl, CURLOPT_FAILONERROR,    FALSE );
      curl_setopt( $hCurl, CURLOPT_SSL_VERIFYPEER, FALSE );
      curl_setopt( $hCurl, CURLOPT_SSL_VERIFYHOST, 0 );
      curl_setopt( $hCurl, CURLOPT_HEADER,         FALSE );
      curl_setopt( $hCurl, CURLOPT_NOBODY,         FALSE );
      curl_setopt( $hCurl, CURLOPT_FRESH_CONNECT,  FALSE );
      curl_setopt( $hCurl, CURLOPT_FORBID_REUSE,  FALSE );
      curl_setopt( $hCurl, CURLOPT_PUT,           TRUE );
      curl_setopt( $hCurl, CURLOPT_POSTFIELDS,     $aData );

      curl_setopt( $hCurl, CURLOPT_URL, $sURL );

      $sResponse = curl_exec( $hCurl );
      $iErrno    = curl_errno( $hCurl );
      $aInfo     = curl_getinfo( $hCurl );

      curl_close( $hCurl );
    }

    return $sResponse;
  }
}
?>