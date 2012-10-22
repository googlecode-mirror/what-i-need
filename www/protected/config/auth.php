<?php

return array(
/*
	'createOrder' => array(CAuthItem::TYPE_OPERATION),
	'updateOrder' => array(CAuthItem::TYPE_OPERATION),
	'viewOrder' => array(CAuthItem::TYPE_OPERATION),
	'deleteOrder' => array(CAuthItem::TYPE_OPERATION),
	'indexOrder' => array(CAuthItem::TYPE_OPERATION),
	'adminOrder' => array(CAuthItem::TYPE_OPERATION),
*/	
	'viewOwnOrder' => array(
		'type' => CAuthItem::TYPE_OPERATION,
		'description' => '',
		'bizRule' => '',
		'data' => null,
	),

	'guest' => array(
		'type' => CAuthItem::TYPE_ROLE,
		'description' => 'Guest',
		'bizRule' => null,
		'data' => null
	),
	'user' => array(
		'type' => CAuthItem::TYPE_ROLE,
		'description' => 'User',
		'children' => array(
			'guest',
		),
		'bizRule' => null,
		'data' => null
	),
	'admin' => array(
		'type' => CAuthItem::TYPE_ROLE,
		'description' => 'Administrator',
		'children' => array(
			'user',
		),
		'bizRule' => null,
		'data' => null
	),
	
	
	
);