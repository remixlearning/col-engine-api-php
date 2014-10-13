<?php
require_once 'library/Authentication/JWT.php';
require_once 'library/curl_helpers.php';

class COL_API {
	// Example uses test org *Staging*
	
	// this is your organization's secret
	const KEY = "c126224c657b5abf21e4f180319cc2a7dfa72d78b967d17604c85aec631e2d03";
	
	// this is the COL ENDPOINT
	const STAGING_ENDPOINT = "http://chicago.col-engine-staging.com/partner_organizations/api.json";
	
	// encode specific action
	// $action represents the api action
	public static function encode($action) {
		$token = array("exp" => time() + 30,
				version => "v1",
				sub => $action,
				payload => array()
		);
		$jwt = JWT::encode( $token, self::KEY );
		return $jwt;
	}	
	
	// Decode jwt string
	public static function decode($jwt) {
		$jsonData = JWT::decode($jwt, self::KEY);
		return $jsonData;
	}
	
	
	// Make the API call with the jwt and required authorization header
	public static function get_authorized($jwt) {
		$headers = array("Authorization: JWT Token=" . self::KEY);
		$encoded_request = self::STAGING_ENDPOINT . '?jwt='.$jwt;
		$resp = WWW::get_with_headers($encoded_request, $headers);
		return $resp;
	}
}

// JWT encode the get badges request
$jwt = COL_API::encode("badges");
print_r($jwt);

// Decodes JWT encoded request
$json = COL_API::decode($jwt);
print_r("<br/><br/>");
print_r($json);

// Full api call to get list of badges
print_r("<br/><br/>authorized:<br/>");
$resp = COL_API::get_authorized($jwt);
// todo add example json parsing decoded response
print_r($resp);

// todo encode request to issue badge

?>