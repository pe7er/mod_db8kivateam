<?php
/**
 * @package     mod_db8kivateam
 * @author      Peter Martin, https://db8.nl
 * @copyright   Copyright (C) 2014-2022 Peter Martin. All rights reserved.
 * @license     GNU General Public License version 2 or later.
 */

defined('_JEXEC') or die;

/**
 * Helper for db8KivaTeam
 */
abstract class modDb8KivaTeamHelper
{
	/**
	 * @param $jsonurl
	 *
	 * @return mixed|void
	 */
	public static function getJSON(&$jsonurl)
	{
		if (ini_get('allow_url_fopen'))
		{
			// Use file_get_contents to retrieve JSON data

			$data = file_get_contents(urldecode($jsonurl), true);

			return json_decode($data);
		}
		elseif (in_array('curl', get_loaded_extensions()))
		{
			// Use cURL to retrieve JSON data
			$session = curl_init($jsonurl);
			curl_setopt($session, CURLOPT_RETURNTRANSFER, true);
			$data = curl_exec($session);
			curl_close($session);

			return json_decode($data);
		}
		else
		{
			die('Your server has nog been configured to import external data. You need allow_url_fopen or cURL for this module.');
		}
	}

	/**
	 * @param $params
	 *
	 * @return mixed
	 */
	public static function getTeam(&$params)
	{
		$jsonurl = 'http://api.kivaws.org/v1/teams/using_shortname/' . urlencode($params->get('shortname', 'joomla')) . '.json';
		$result  = modDB8KivaTeamHelper::getJSON($jsonurl);

		return $result->teams[0];
	}

	/**
	 * @param $params
	 *
	 * @return mixed
	 */
	public static function getLenders(&$params)
	{
		$team = modDB8KivaTeamHelper::getTeam($params);

		$jsonurl = 'http://api.kivaws.org/v1/teams/' . $team->id . '/lenders.json';
		$result  = modDB8KivaTeamHelper::getJSON($jsonurl);

		return $result->lenders;
	}

	/**
	 * @param $params
	 *
	 * @return mixed
	 */
	public static function getLoans(&$params)
	{
		$team = modDB8KivaTeamHelper::getTeam($params);

		$jsonurl = 'http://api.kivaws.org/v1/teams/' . $team->id . '/loans.json';
		$result  = modDB8KivaTeamHelper::getJSON($jsonurl);

		return $result->loans;
	}
}
