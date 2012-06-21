<?php
/**
 * A Forrst API Method Map
 *
 * Refer to the apis plugin for how to build a method map
 * https://github.com/ProLoser/CakePHP-Api-Datasources
 *
 */
$config['Apis']['Forrst']['hosts'] = array(
	//Documentation online suggests that OAuth is not available for primetime yet
	//However it may still work
	'oauth' => 'forrst.com/oauth',
	'rest' => 'forrst.com/api/v2/',
);
// https://forrst.com/api
$config['Apis']['Forrst']['oauth'] = array(
	'version' => '2.0',
	'scheme' => 'https',
	'login' => 'authenticate', //Exactly like authorize, just auto-redirects
	'request' => 'request_token',
	'authorize' => 'authorize',
	'access' => 'access_token',
);
$config['Apis']['Forrst']['read'] = array(
	// field
	'users' => array(
		'users/auth' => array(
			'email_or_username',
		),
		'users/info' => array(
			'id',
			'username',
		),
	),
	'user' => array(
		'user/posts' => array(
			'id',
			'username',
			'optional' => array(
				'type', 	//Post type (code, snap, link, question)
				'limit',	//Default 10, max 25 number of posts to return per page
				'after',	//if given, return posts with an ID lower than after
		),
	),
	'posts' => array(
		'posts/list' => array(
			'post_type',
			'optional' => array(
				'sort', // Method to sort by: newest, oldest, most_played, most_commented, or most_liked.
				'page', // The page number to show.
			),
		),
		'posts/all' => array(
			'optional' => array(
				'after', //if passed, only return posts posted after this ID
			),
		),
		'posts/show' => array(
			'id',
			'tiny_id',
		),
	),
	'post' => array(
		'post/comments' => array(
			'id',
			'tiny_id',
		),

	),
);

$config['Apis']['Forrst']['write'] = array(
);

$config['Apis']['Forrst']['update'] = array(
);

$config['Apis']['Forrst']['delete'] = array(
);