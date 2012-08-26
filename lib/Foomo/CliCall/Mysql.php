<?php

/*
 * This file is part of the foomo Opensource Framework.
 *
 * The foomo Opensource Framework is free software: you can redistribute it
 * and/or modify it under the terms of the GNU Lesser General Public License as
 * published  by the Free Software Foundation, either version 3 of the
 * License, or (at your option) any later version.
 *
 * The foomo Opensource Framework is distributed in the hope that it will
 * be useful, but WITHOUT ANY WARRANTY; without even the implied warranty
 * of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU Lesser General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public License along with
 * the foomo Opensource Framework. If not, see <http://www.gnu.org/licenses/>.
 */

namespace Foomo\CliCall;

/**
 * @link www.foomo.org
 * @license www.gnu.org/licenses/lgpl.txt
 * @author franklin <franklin@weareinteractive.com>
 */
class Mysql extends \Foomo\CliCall
{
	//---------------------------------------------------------------------------------------------
	// ~ Constructor
	//---------------------------------------------------------------------------------------------

	/**
	 *
	 */
	public function __construct()
	{
		parent::__construct('mysql');
	}

	//---------------------------------------------------------------------------------------------
	// ~ Public methods
	//---------------------------------------------------------------------------------------------

	/**
	 * @param string $username
	 * @return \Foomo\CliCall\Mysql
	 */
	public function username($username)
	{
		return $this->addArguments(array('-u' . $username));
	}

	/**
	 * @param string $password
	 * @return \Foomo\CliCall\Mysql
	 */
	public function password($password)
	{
		return $this->addArguments(array('-p' . $password));
	}

	/**
	 * @param string $host
	 * @return \Foomo\CliCall\Mysql
	 */
	public function host($host)
	{
		return $this->addArguments(array('-h', $host));
	}

	/**
	 * @param string $port
	 * @return \Foomo\CliCall\Mysql
	 */
	public function port($port)
	{
		return $this->addArguments(array('-P' . $port));
	}

	/**
	 * @param string|string[] $statment
	 * @return \Foomo\CliCall\Mysql
	 */
	public function executeStatements($statements)
	{
		if (!\is_array($statements)) $statements = array($statements);
		return $this->addArguments(array('-e', \implode (';', $statements) . ';'));
	}

	/**
	 * @param string $database
	 * @param string $filename
	 * @return \Foomo\CliCall\Mysql
	 */
	public function importDatabase($database, $filename)
	{
		$this->addArguments(array($database, '<', $filename));
		return $this->execute();
	}

	//---------------------------------------------------------------------------------------------
	// ~ Overriden methods
	//---------------------------------------------------------------------------------------------

	/**
	 * @param array $arguments
	 * @return \Foomo\CliCall\Mysql
	 */
	public function addArguments(array $arguments)
	{
		return parent::addArguments($arguments);
	}

	//---------------------------------------------------------------------------------------------
	// ~ Overriden static methods
	//---------------------------------------------------------------------------------------------

	/**
	 * Create a call
	 *
	 * @return \Foomo\CliCall\Mysql
	 */
	public static function create()
	{
		return new self();
	}
}