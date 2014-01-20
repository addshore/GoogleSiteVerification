<?php
/**
 * GoogleSiteVerification Extension for MediaWiki
 *
 * @author Adam Shorland
 * @license GPL v2 or later
 */

if ( !defined( 'MEDIAWIKI' ) ) {
	die( 'This file is a MediaWiki extension, it is not a valid entry point' );
}

$wgExtensionCredits['other'][] = array(
	'path'           => __FILE__,
	'name'           => 'Google Site Verification Integration',
	'version'        => '0.1.1',
	'author'         => 'Adam Shorland',
	'descriptionmsg' => 'gsv-desc',
	'url'            => 'https://www.github.com/addshore/GoogleSiteVerification',
);

$wgHooks['BeforePageDisplay'][]  = 'efGoogleSiteVerificationHook';

$wgGoogleVerificationCode = '';

$wgExtensionMessagesFiles['GoogleSiteVerification'] = __DIR__ . '/GoogleSiteVerification.i18n.php';

function efGoogleSiteVerificationHook( OutputPage &$out, Skin &$skin ) {
	global $wgGoogleVerificationCode;
	if( $wgGoogleVerificationCode !== '' ) {
		$out->addMeta( 'google-site-verification', $wgGoogleVerificationCode );
	}
	return true;
}
