<?php

namespace App\Helpers;

class Helper
{
	private $modules = [
		'posts',
		'categories',
		'admins'
	];

	public static function getAllModules()
	{
		return [
			'posts',
			'categories',
			'admins'
		];
	}

	public static function getAllActions()
	{
		return ['create', 'read', 'update', 'delete'];
	}
}