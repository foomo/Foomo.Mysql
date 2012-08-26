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
class Mysqldump extends \Foomo\CliCall
{
	//---------------------------------------------------------------------------------------------
	// ~ Constructor
	//---------------------------------------------------------------------------------------------

	/**
	 *
	 */
	public function __construct()
	{
		parent::__construct('mysqldump');
	}

	//---------------------------------------------------------------------------------------------
	// ~ Public methods
	//---------------------------------------------------------------------------------------------

	/**
	 * @param string $username
	 * @return \Foomo\CliCall\Mysqldump
	 */
	public function username($username)
	{
		return $this->addArguments(array('-u', $username));
	}

	/**
	 * @param string $password
	 * @return \Foomo\CliCall\Mysqldump
	 */
	public function password($password)
	{
		return $this->addArguments(array('-p' . $password));
	}

	/**
	 * @param string $host
	 * @return \Foomo\CliCall\Mysqldump
	 */
	public function host($host)
	{
		return $this->addArguments(array('-h', $host));
	}

	/**
	 * @param string $port
	 * @return \Foomo\CliCall\Mysqldump
	 */
	public function port($port)
	{
		return $this->addArguments(array('-P' . $port));
	}

	/**
	 * @return \Foomo\CliCall\Mysqldump
	 */
	public function noCreateInfo()
	{
		return $this->addArguments(array('-t'));
	}

	/**
	 * @return \Foomo\CliCall\Mysqldump
	 */
	public function noCreateDb()
	{
		return $this->addArguments(array('-n'));
	}

	/**
	 * @param string $table
	 * @return \Foomo\CliCall\Mysqldump
	 */
	public function ignoreTable($table)
	{
		return $this->addArguments(array('--ignore-table', $table));
	}

	/**
	 * @param string $charset
	 * @return \Foomo\CliCall\Mysqldump
	 */
	public function setCharset($charset)
	{
		return $this->addArguments(array('--set-charset', $charset));
	}

	/**
	 * @return \Foomo\CliCall\Mysqldump
	 */
	public function noData()
	{
		return $this->addArguments(array('--no-data'));
	}

	/**
	 * @return \Foomo\CliCall\Mysqldump
	 */
	public function allDatabases()
	{
		return $this->addArguments(array('–all-databases'));
	}

	/**
	 * @return \Foomo\CliCall\Mysqldump
	 */
	public function singleTransaction()
	{
		return $this->addArguments(array('--single-transaction'));
	}

	/**
	 * @return \Foomo\CliCall\Mysqldump
	 */
	public function addDropDatabase()
	{
		return $this->addArguments(array('--add-drop-database'));
	}

	/**
	 * @param string $filename
	 * @return \Foomo\CliCall\Mysqldump
	 */
	public function dumpToFile($filename)
	{
		$this->addArguments(array('>', $filename));
		$this->execute();
		//\file_put_contents($filename, $this->stdOut);
		return $this;
	}

	/**
	 * @param string $database
	 * @param string $filename
	 * @return \Foomo\CliCall\Mysqldump
	 */
	public function dumpDatabaseToFile($database, $filename)
	{
		$this->addArguments(array($database));
		return $this->dumpToFile($filename);
	}

	//---------------------------------------------------------------------------------------------
	// ~ Overriden methods
	//---------------------------------------------------------------------------------------------

	/**
	 * @param array $arguments
	 * @return \Foomo\CliCall\Mysqldump
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
	 * @return \Foomo\CliCall\Mysqldump
	 */
	public static function create()
	{
		return new self();
	}
}