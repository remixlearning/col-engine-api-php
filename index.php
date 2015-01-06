<?php
require_once 'library/Authentication/JWT.php';
require_once 'library/curl_helpers.php';

class COL_API {
	// Example uses test org *Staging*
	
	// this is your organization's secret
	const KEY = "9ea75e0be02e26ef4d3dfd8030e2b75f3da6674165b13bde4b676aed54a8b490";
	const SECRET = "eda8db792f04b014f54634f8cc9d5b7cc5fd204fae31d4b08e786c7a180b67ad84ef3e149514dec04a28528c6d531b0bb1df53f077d042ac263caded5ebe00c3";
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
		$jwt = JWT::encode( $token, self::SECRET );
		return $jwt;
	}	
	
	// Decode jwt string
	public static function decode($jwt) {
		$jsonData = JWT::decode($jwt, self::SECRET);
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
echo "Encoded jwt request<br/>" . $jwt;

// Decodes JWT encoded request
$json = COL_API::decode($jwt);
$json = json_decode(json_encode($json), true);
echo "<br/><br/>Decoded jwt request<br/>";
print_r($json);

// Full api call to get list of badges
$resp = COL_API::get_authorized($jwt);

// todo add example json parsing decoded response
$badge_list = json_decode($resp);
echo "<br/>Response status: " .  $badge_list->status;
$badges = $badge_list->result;
echo "Badges in COL: " . count($badges);
	foreach($badges as $badge) {
		echo "<br/><br/>badge name: " . $badge->name;
		echo "<br/>description: " . $badge->description;
		echo "<br/>informal_description: " . $badge->informal_description;
		echo "<br/>blurb: ". $badge->blurb;
		echo "<br/>badge type: " . $badge->badge_type;
		echo "<br/>image url: " . $badge->image_url;
		echo "<br/>issue count: " . $badge->issue_count;
	}

// whole response
echo "<br/><br/>";
print_r($resp);


// todo encode request to issue badge

?>