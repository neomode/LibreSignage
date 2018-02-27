<?php
/*
*  ====>
*
*  *Get the Markdown version of the third party licenses file.
*  This endpoint doesn't require or consume the API rate quota.*
*
*  <====
*/
require_once($_SERVER['DOCUMENT_ROOT'].'/common/php/config.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/common/php/auth/auth.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/api/api.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/api/api_error.php');

$LIBRARY_LICENSES = new APIEndpoint(array(
	APIEndpoint::METHOD		=> API_METHOD['GET'],
	APIEndpoint::RESPONSE_TYPE	=> API_RESPONSE['TEXT'],
	APIEndpoint::REQ_QUOTA		=> FALSE
));
session_start();
api_endpoint_init($LIBRARY_LICENSES, auth_session_user());

$LIBRARY_LICENSES->resp_set(file_get_contents(
	realpath(LIBRESIGNAGE_ROOT.LICENSES_EXT_RST)
));
$LIBRARY_LICENSES->send();