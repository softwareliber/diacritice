<?php
	/**
	 * The abstract SentLogGen class defined here is
	 * code-generated and contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 *
	 * To use, you should use the SentLog subclass which
	 * extends this SentLogGen class.
	 *
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the SentLog class.
	 * 
	 * @package My Application
	 * @subpackage GeneratedDataObjects
	 * @property-read integer $WordSentLogId the value for intWordSentLogId (Read-Only PK)
	 * @property string $IpAddress the value for strIpAddress (Not Null)
	 * @property string $UserAgent the value for strUserAgent (Not Null)
	 * @property QDateTime $DateSent the value for dttDateSent (Not Null)
	 * @property integer $WordId the value for intWordId (Not Null)
	 * @property Word $Word the value for the Word object referenced by intWordId (Not Null)
	 * @property-read boolean $__Restored whether or not this object was restored from the database (as opposed to created new)
	 */
	class SentLogGen extends QBaseClass implements IteratorAggregate {

		///////////////////////////////////////////////////////////////////////
		// PROTECTED MEMBER VARIABLES and TEXT FIELD MAXLENGTHS (if applicable)
		///////////////////////////////////////////////////////////////////////
		
		/**
		 * Protected member variable that maps to the database PK Identity column submit_word_sent_log.word_sent_log_id
		 * @var integer intWordSentLogId
		 */
		protected $intWordSentLogId;
		const WordSentLogIdDefault = null;


		/**
		 * Protected member variable that maps to the database column submit_word_sent_log.ip_address
		 * @var string strIpAddress
		 */
		protected $strIpAddress;
		const IpAddressMaxLength = 64;
		const IpAddressDefault = null;


		/**
		 * Protected member variable that maps to the database column submit_word_sent_log.user_agent
		 * @var string strUserAgent
		 */
		protected $strUserAgent;
		const UserAgentMaxLength = 255;
		const UserAgentDefault = null;


		/**
		 * Protected member variable that maps to the database column submit_word_sent_log.date_sent
		 * @var QDateTime dttDateSent
		 */
		protected $dttDateSent;
		const DateSentDefault = null;


		/**
		 * Protected member variable that maps to the database column submit_word_sent_log.word_id
		 * @var integer intWordId
		 */
		protected $intWordId;
		const WordIdDefault = null;


		/**
		 * Protected array of virtual attributes for this object (e.g. extra/other calculated and/or non-object bound
		 * columns from the run-time database query result for this object).  Used by InstantiateDbRow and
		 * GetVirtualAttribute.
		 * @var string[] $__strVirtualAttributeArray
		 */
		protected $__strVirtualAttributeArray = array();

		/**
		 * Protected internal member variable that specifies whether or not this object is Restored from the database.
		 * Used by Save() to determine if Save() should perform a db UPDATE or INSERT.
		 * @var bool __blnRestored;
		 */
		protected $__blnRestored;




		///////////////////////////////
		// PROTECTED MEMBER OBJECTS
		///////////////////////////////

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column submit_word_sent_log.word_id.
		 *
		 * NOTE: Always use the Word property getter to correctly retrieve this Word object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var Word objWord
		 */
		protected $objWord;



		/**
		 * Initialize each property with default values from database definition
		 */
		public function Initialize()
		{
			$this->intWordSentLogId = SentLog::WordSentLogIdDefault;
			$this->strIpAddress = SentLog::IpAddressDefault;
			$this->strUserAgent = SentLog::UserAgentDefault;
			$this->dttDateSent = (SentLog::DateSentDefault === null)?null:new QDateTime(SentLog::DateSentDefault);
			$this->intWordId = SentLog::WordIdDefault;
		}


		///////////////////////////////
		// CLASS-WIDE LOAD AND COUNT METHODS
		///////////////////////////////

		/**
		 * Static method to retrieve the Database object that owns this class.
		 * @return QDatabaseBase reference to the Database object that can query this class
		 */
		public static function GetDatabase() {
			return QApplication::$Database[1];
		}

		/**
		 * Load a SentLog from PK Info
		 * @param integer $intWordSentLogId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return SentLog
		 */
		public static function Load($intWordSentLogId, $objOptionalClauses = null) {
			// Use QuerySingle to Perform the Query
			return SentLog::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::SentLog()->WordSentLogId, $intWordSentLogId)
				),
				$objOptionalClauses
			);
		}

		/**
		 * Load all SentLogs
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return SentLog[]
		 */
		public static function LoadAll($objOptionalClauses = null) {
			if (func_num_args() > 1) {
				throw new QCallerException("LoadAll must be called with an array of optional clauses as a single argument");
			}
			// Call SentLog::QueryArray to perform the LoadAll query
			try {
				return SentLog::QueryArray(QQ::All(), $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count all SentLogs
		 * @return int
		 */
		public static function CountAll() {
			// Call SentLog::QueryCount to perform the CountAll query
			return SentLog::QueryCount(QQ::All());
		}




		///////////////////////////////
		// QCUBED QUERY-RELATED METHODS
		///////////////////////////////

		/**
		 * Internally called method to assist with calling Qcubed Query for this class
		 * on load methods.
		 * @param QQueryBuilder &$objQueryBuilder the QueryBuilder object that will be created
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause object or array of QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with (sending in null will skip the PrepareStatement step)
		 * @param boolean $blnCountOnly only select a rowcount
		 * @return string the query statement
		 */
		protected static function BuildQueryStatement(&$objQueryBuilder, QQCondition $objConditions, $objOptionalClauses, $mixParameterArray, $blnCountOnly) {
			// Get the Database Object for this Class
			$objDatabase = SentLog::GetDatabase();

			// Create/Build out the QueryBuilder object with SentLog-specific SELET and FROM fields
			$objQueryBuilder = new QQueryBuilder($objDatabase, 'submit_word_sent_log');
			SentLog::GetSelectFields($objQueryBuilder);
			$objQueryBuilder->AddFromItem('submit_word_sent_log');

			// Set "CountOnly" option (if applicable)
			if ($blnCountOnly)
				$objQueryBuilder->SetCountOnlyFlag();

			// Apply Any Conditions
			if ($objConditions)
				try {
					$objConditions->UpdateQueryBuilder($objQueryBuilder);
				} catch (QCallerException $objExc) {
					$objExc->IncrementOffset();
					throw $objExc;
				}

			// Iterate through all the Optional Clauses (if any) and perform accordingly
			if ($objOptionalClauses) {
				if ($objOptionalClauses instanceof QQClause)
					$objOptionalClauses->UpdateQueryBuilder($objQueryBuilder);
				else if (is_array($objOptionalClauses))
					foreach ($objOptionalClauses as $objClause)
						$objClause->UpdateQueryBuilder($objQueryBuilder);
				else
					throw new QCallerException('Optional Clauses must be a QQClause object or an array of QQClause objects');
			}

			// Get the SQL Statement
			$strQuery = $objQueryBuilder->GetStatement();

			// Prepare the Statement with the Query Parameters (if applicable)
			if ($mixParameterArray) {
				if (is_array($mixParameterArray)) {
					if (count($mixParameterArray))
						$strQuery = $objDatabase->PrepareStatement($strQuery, $mixParameterArray);

					// Ensure that there are no other Unresolved Named Parameters
					if (strpos($strQuery, chr(QQNamedValue::DelimiterCode) . '{') !== false)
						throw new QCallerException('Unresolved named parameters in the query');
				} else
					throw new QCallerException('Parameter Array must be an array of name-value parameter pairs');
			}

			// Return the Objects
			return $strQuery;
		}

		/**
		 * Static Qcubed Query method to query for a single SentLog object.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return SentLog the queried object
		 */
		public static function QuerySingle(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = SentLog::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
			
			// Perform the Query, Get the First Row, and Instantiate a new SentLog object
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			
			// Do we have to expand anything?
			if ($objQueryBuilder->ExpandAsArrayNodes) {
				$objToReturn = array();
				while ($objDbRow = $objDbResult->GetNextRow()) {
					$objItem = SentLog::InstantiateDbRow($objDbRow, null, $objQueryBuilder->ExpandAsArrayNodes, $objToReturn, $objQueryBuilder->ColumnAliasArray);
					if ($objItem)
						$objToReturn[] = $objItem;					
				}			
				// Since we only want the object to return, lets return the object and not the array.
				return $objToReturn[0];
			} else {
				// No expands just return the first row
				$objToReturn = null;
				while ($objDbRow = $objDbResult->GetNextRow())
					$objToReturn = SentLog::InstantiateDbRow($objDbRow, null, null, null, $objQueryBuilder->ColumnAliasArray);
			}
			
			return $objToReturn;
		}

		/**
		 * Static Qcubed Query method to query for an array of SentLog objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return SentLog[] the queried objects as an array
		 */
		public static function QueryArray(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = SentLog::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query and Instantiate the Array Result
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			return SentLog::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNodes, $objQueryBuilder->ColumnAliasArray);
		}

		/**
		 * Static Qcubed Query method to query for a count of SentLog objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return integer the count of queried objects as an integer
		 */
		public static function QueryCount(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = SentLog::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, true);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query and return the row_count
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);

			// Figure out if the query is using GroupBy
			$blnGrouped = false;

			if ($objOptionalClauses) foreach ($objOptionalClauses as $objClause) {
				if ($objClause instanceof QQGroupBy) {
					$blnGrouped = true;
					break;
				}
			}

			if ($blnGrouped)
				// Groups in this query - return the count of Groups (which is the count of all rows)
				return $objDbResult->CountRows();
			else {
				// No Groups - return the sql-calculated count(*) value
				$strDbRow = $objDbResult->FetchRow();
				return QType::Cast($strDbRow[0], QType::Integer);
			}
		}

		public static function QueryArrayCached(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null, $blnForceUpdate = false) {
			// Get the Database Object for this Class
			$objDatabase = SentLog::GetDatabase();

			$strQuery = SentLog::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			
			$objCache = new QCache('qquery/sentlog', $strQuery);
			$cacheData = $objCache->GetData();
			
			if (!$cacheData || $blnForceUpdate) {
				$objDbResult = $objQueryBuilder->Database->Query($strQuery);
				$arrResult = SentLog::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNodes, $objQueryBuilder->ColumnAliasArray);
				$objCache->SaveData(serialize($arrResult));
			} else {
				$arrResult = unserialize($cacheData);
			}
			
			return $arrResult;
		}

		/**
		 * Updates a QQueryBuilder with the SELECT fields for this SentLog
		 * @param QQueryBuilder $objBuilder the Query Builder object to update
		 * @param string $strPrefix optional prefix to add to the SELECT fields
		 */
		public static function GetSelectFields(QQueryBuilder $objBuilder, $strPrefix = null) {
			if ($strPrefix) {
				$strTableName = $strPrefix;
				$strAliasPrefix = $strPrefix . '__';
			} else {
				$strTableName = 'submit_word_sent_log';
				$strAliasPrefix = '';
			}

			$objBuilder->AddSelectItem($strTableName, 'word_sent_log_id', $strAliasPrefix . 'word_sent_log_id');
			$objBuilder->AddSelectItem($strTableName, 'ip_address', $strAliasPrefix . 'ip_address');
			$objBuilder->AddSelectItem($strTableName, 'user_agent', $strAliasPrefix . 'user_agent');
			$objBuilder->AddSelectItem($strTableName, 'date_sent', $strAliasPrefix . 'date_sent');
			$objBuilder->AddSelectItem($strTableName, 'word_id', $strAliasPrefix . 'word_id');
		}



		///////////////////////////////
		// INSTANTIATION-RELATED METHODS
		///////////////////////////////

		/**
		 * Instantiate a SentLog from a Database Row.
		 * Takes in an optional strAliasPrefix, used in case another Object::InstantiateDbRow
		 * is calling this SentLog::InstantiateDbRow in order to perform
		 * early binding on referenced objects.
		 * @param DatabaseRowBase $objDbRow
		 * @param string $strAliasPrefix
		 * @param string $strExpandAsArrayNodes
		 * @param QBaseClass $arrPreviousItem
		 * @param string[] $strColumnAliasArray
		 * @return SentLog
		*/
		public static function InstantiateDbRow($objDbRow, $strAliasPrefix = null, $strExpandAsArrayNodes = null, $arrPreviousItems = null, $strColumnAliasArray = array()) {
			// If blank row, return null
			if (!$objDbRow) {
				return null;
			}

			// Create a new instance of the SentLog object
			$objToReturn = new SentLog();
			$objToReturn->__blnRestored = true;

			$strAliasName = array_key_exists($strAliasPrefix . 'word_sent_log_id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'word_sent_log_id'] : $strAliasPrefix . 'word_sent_log_id';
			$objToReturn->intWordSentLogId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'ip_address', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'ip_address'] : $strAliasPrefix . 'ip_address';
			$objToReturn->strIpAddress = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'user_agent', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'user_agent'] : $strAliasPrefix . 'user_agent';
			$objToReturn->strUserAgent = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'date_sent', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'date_sent'] : $strAliasPrefix . 'date_sent';
			$objToReturn->dttDateSent = $objDbRow->GetColumn($strAliasName, 'DateTime');
			$strAliasName = array_key_exists($strAliasPrefix . 'word_id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'word_id'] : $strAliasPrefix . 'word_id';
			$objToReturn->intWordId = $objDbRow->GetColumn($strAliasName, 'Integer');

			if (isset($arrPreviousItems) && is_array($arrPreviousItems)) {
				foreach ($arrPreviousItems as $objPreviousItem) {
					if ($objToReturn->WordSentLogId != $objPreviousItem->WordSentLogId) {
						continue;
					}

					// complete match - all primary key columns are the same
					return null;
				}
			}

			// Instantiate Virtual Attributes
			foreach ($objDbRow->GetColumnNameArray() as $strColumnName => $mixValue) {
				$strVirtualPrefix = $strAliasPrefix . '__';
				$strVirtualPrefixLength = strlen($strVirtualPrefix);
				if (substr($strColumnName, 0, $strVirtualPrefixLength) == $strVirtualPrefix)
					$objToReturn->__strVirtualAttributeArray[substr($strColumnName, $strVirtualPrefixLength)] = $mixValue;
			}

			// Prepare to Check for Early/Virtual Binding
			if (!$strAliasPrefix)
				$strAliasPrefix = 'submit_word_sent_log__';

			// Check for Word Early Binding
			$strAlias = $strAliasPrefix . 'word_id__word_id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName)))
				$objToReturn->objWord = Word::InstantiateDbRow($objDbRow, $strAliasPrefix . 'word_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);




			return $objToReturn;
		}

		/**
		 * Instantiate an array of SentLogs from a Database Result
		 * @param DatabaseResultBase $objDbResult
		 * @param string $strExpandAsArrayNodes
		 * @param string[] $strColumnAliasArray
		 * @return SentLog[]
		 */
		public static function InstantiateDbResult(QDatabaseResultBase $objDbResult, $strExpandAsArrayNodes = null, $strColumnAliasArray = null) {
			$objToReturn = array();
			
			if (!$strColumnAliasArray)
				$strColumnAliasArray = array();

			// If blank resultset, then return empty array
			if (!$objDbResult)
				return $objToReturn;

			// Load up the return array with each row
			if ($strExpandAsArrayNodes) {
				$objToReturn = array();
				while ($objDbRow = $objDbResult->GetNextRow()) {
					$objItem = SentLog::InstantiateDbRow($objDbRow, null, $strExpandAsArrayNodes, $objToReturn, $strColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
					}
				}
			} else {
				while ($objDbRow = $objDbResult->GetNextRow())
					$objToReturn[] = SentLog::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}



		///////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Single Load and Array)
		///////////////////////////////////////////////////
			
		/**
		 * Load a single SentLog object,
		 * by WordSentLogId Index(es)
		 * @param integer $intWordSentLogId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return SentLog
		*/
		public static function LoadByWordSentLogId($intWordSentLogId, $objOptionalClauses = null) {
			return SentLog::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::SentLog()->WordSentLogId, $intWordSentLogId)
				),
				$objOptionalClauses
			);
		}
			
		/**
		 * Load an array of SentLog objects,
		 * by WordId Index(es)
		 * @param integer $intWordId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return SentLog[]
		*/
		public static function LoadArrayByWordId($intWordId, $objOptionalClauses = null) {
			// Call SentLog::QueryArray to perform the LoadArrayByWordId query
			try {
				return SentLog::QueryArray(
					QQ::Equal(QQN::SentLog()->WordId, $intWordId),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count SentLogs
		 * by WordId Index(es)
		 * @param integer $intWordId
		 * @return int
		*/
		public static function CountByWordId($intWordId) {
			// Call SentLog::QueryCount to perform the CountByWordId query
			return SentLog::QueryCount(
				QQ::Equal(QQN::SentLog()->WordId, $intWordId)
			);
		}



		////////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Array via Many to Many)
		////////////////////////////////////////////////////




		//////////////////////////
		// SAVE, DELETE AND RELOAD
		//////////////////////////

		/**
		 * Save this SentLog
		 * @param bool $blnForceInsert
		 * @param bool $blnForceUpdate
		 * @return int
		 */
		public function Save($blnForceInsert = false, $blnForceUpdate = false) {
			// Get the Database Object for this Class
			$objDatabase = SentLog::GetDatabase();

			$mixToReturn = null;

			try {
				if ((!$this->__blnRestored) || ($blnForceInsert)) {
					// Perform an INSERT query
					$objDatabase->NonQuery('
						INSERT INTO `submit_word_sent_log` (
							`ip_address`,
							`user_agent`,
							`date_sent`,
							`word_id`
						) VALUES (
							' . $objDatabase->SqlVariable($this->strIpAddress) . ',
							' . $objDatabase->SqlVariable($this->strUserAgent) . ',
							' . $objDatabase->SqlVariable($this->dttDateSent) . ',
							' . $objDatabase->SqlVariable($this->intWordId) . '
						)
					');

					// Update Identity column and return its value
					$mixToReturn = $this->intWordSentLogId = $objDatabase->InsertId('submit_word_sent_log', 'word_sent_log_id');
				} else {
					// Perform an UPDATE query

					// First checking for Optimistic Locking constraints (if applicable)

					// Perform the UPDATE query
					$objDatabase->NonQuery('
						UPDATE
							`submit_word_sent_log`
						SET
							`ip_address` = ' . $objDatabase->SqlVariable($this->strIpAddress) . ',
							`user_agent` = ' . $objDatabase->SqlVariable($this->strUserAgent) . ',
							`date_sent` = ' . $objDatabase->SqlVariable($this->dttDateSent) . ',
							`word_id` = ' . $objDatabase->SqlVariable($this->intWordId) . '
						WHERE
							`word_sent_log_id` = ' . $objDatabase->SqlVariable($this->intWordSentLogId) . '
					');
				}

			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Update __blnRestored and any Non-Identity PK Columns (if applicable)
			$this->__blnRestored = true;


			// Return 
			return $mixToReturn;
		}

		/**
		 * Delete this SentLog
		 * @return void
		 */
		public function Delete() {
			if ((is_null($this->intWordSentLogId)))
				throw new QUndefinedPrimaryKeyException('Cannot delete this SentLog with an unset primary key.');

			// Get the Database Object for this Class
			$objDatabase = SentLog::GetDatabase();


			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`submit_word_sent_log`
				WHERE
					`word_sent_log_id` = ' . $objDatabase->SqlVariable($this->intWordSentLogId) . '');
		}

		/**
		 * Delete all SentLogs
		 * @return void
		 */
		public static function DeleteAll() {
			// Get the Database Object for this Class
			$objDatabase = SentLog::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				DELETE FROM
					`submit_word_sent_log`');
		}

		/**
		 * Truncate submit_word_sent_log table
		 * @return void
		 */
		public static function Truncate() {
			// Get the Database Object for this Class
			$objDatabase = SentLog::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				TRUNCATE `submit_word_sent_log`');
		}

		/**
		 * Reload this SentLog from the database.
		 * @return void
		 */
		public function Reload() {
			// Make sure we are actually Restored from the database
			if (!$this->__blnRestored)
				throw new QCallerException('Cannot call Reload() on a new, unsaved SentLog object.');

			// Reload the Object
			$objReloaded = SentLog::Load($this->intWordSentLogId);

			// Update $this's local variables to match
			$this->strIpAddress = $objReloaded->strIpAddress;
			$this->strUserAgent = $objReloaded->strUserAgent;
			$this->dttDateSent = $objReloaded->dttDateSent;
			$this->WordId = $objReloaded->WordId;
		}



		////////////////////
		// PUBLIC OVERRIDERS
		////////////////////

				/**
		 * Override method to perform a property "Get"
		 * This will get the value of $strName
		 *
		 * @param string $strName Name of the property to get
		 * @return mixed
		 */
		public function __get($strName) {
			switch ($strName) {
				///////////////////
				// Member Variables
				///////////////////
				case 'WordSentLogId':
					/**
					 * Gets the value for intWordSentLogId (Read-Only PK)
					 * @return integer
					 */
					return $this->intWordSentLogId;

				case 'IpAddress':
					/**
					 * Gets the value for strIpAddress (Not Null)
					 * @return string
					 */
					return $this->strIpAddress;

				case 'UserAgent':
					/**
					 * Gets the value for strUserAgent (Not Null)
					 * @return string
					 */
					return $this->strUserAgent;

				case 'DateSent':
					/**
					 * Gets the value for dttDateSent (Not Null)
					 * @return QDateTime
					 */
					return $this->dttDateSent;

				case 'WordId':
					/**
					 * Gets the value for intWordId (Not Null)
					 * @return integer
					 */
					return $this->intWordId;


				///////////////////
				// Member Objects
				///////////////////
				case 'Word':
					/**
					 * Gets the value for the Word object referenced by intWordId (Not Null)
					 * @return Word
					 */
					try {
						if ((!$this->objWord) && (!is_null($this->intWordId)))
							$this->objWord = Word::Load($this->intWordId);
						return $this->objWord;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}


				////////////////////////////
				// Virtual Object References (Many to Many and Reverse References)
				// (If restored via a "Many-to" expansion)
				////////////////////////////


				case '__Restored':
					return $this->__blnRestored;

				default:
					try {
						return parent::__get($strName);
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}
			}
		}

				/**
		 * Override method to perform a property "Set"
		 * This will set the property $strName to be $mixValue
		 *
		 * @param string $strName Name of the property to set
		 * @param string $mixValue New value of the property
		 * @return mixed
		 */
		public function __set($strName, $mixValue) {
			switch ($strName) {
				///////////////////
				// Member Variables
				///////////////////
				case 'IpAddress':
					/**
					 * Sets the value for strIpAddress (Not Null)
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strIpAddress = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'UserAgent':
					/**
					 * Sets the value for strUserAgent (Not Null)
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strUserAgent = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'DateSent':
					/**
					 * Sets the value for dttDateSent (Not Null)
					 * @param QDateTime $mixValue
					 * @return QDateTime
					 */
					try {
						return ($this->dttDateSent = QType::Cast($mixValue, QType::DateTime));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'WordId':
					/**
					 * Sets the value for intWordId (Not Null)
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						$this->objWord = null;
						return ($this->intWordId = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}


				///////////////////
				// Member Objects
				///////////////////
				case 'Word':
					/**
					 * Sets the value for the Word object referenced by intWordId (Not Null)
					 * @param Word $mixValue
					 * @return Word
					 */
					if (is_null($mixValue)) {
						$this->intWordId = null;
						$this->objWord = null;
						return null;
					} else {
						// Make sure $mixValue actually is a Word object
						try {
							$mixValue = QType::Cast($mixValue, 'Word');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						} 

						// Make sure $mixValue is a SAVED Word object
						if (is_null($mixValue->WordId))
							throw new QCallerException('Unable to set an unsaved Word for this SentLog');

						// Update Local Member Variables
						$this->objWord = $mixValue;
						$this->intWordId = $mixValue->WordId;

						// Return $mixValue
						return $mixValue;
					}
					break;

				default:
					try {
						return parent::__set($strName, $mixValue);
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}
			}
		}

		/**
		 * Lookup a VirtualAttribute value (if applicable).  Returns NULL if none found.
		 * @param string $strName
		 * @return string
		 */
		public function GetVirtualAttribute($strName) {
			if (array_key_exists($strName, $this->__strVirtualAttributeArray))
				return $this->__strVirtualAttributeArray[$strName];
			return null;
		}



		///////////////////////////////
		// ASSOCIATED OBJECTS' METHODS
		///////////////////////////////





		////////////////////////////////////////
		// METHODS for SOAP-BASED WEB SERVICES
		////////////////////////////////////////

		public static function GetSoapComplexTypeXml() {
			$strToReturn = '<complexType name="SentLog"><sequence>';
			$strToReturn .= '<element name="WordSentLogId" type="xsd:int"/>';
			$strToReturn .= '<element name="IpAddress" type="xsd:string"/>';
			$strToReturn .= '<element name="UserAgent" type="xsd:string"/>';
			$strToReturn .= '<element name="DateSent" type="xsd:dateTime"/>';
			$strToReturn .= '<element name="Word" type="xsd1:Word"/>';
			$strToReturn .= '<element name="__blnRestored" type="xsd:boolean"/>';
			$strToReturn .= '</sequence></complexType>';
			return $strToReturn;
		}

		public static function AlterSoapComplexTypeArray(&$strComplexTypeArray) {
			if (!array_key_exists('SentLog', $strComplexTypeArray)) {
				$strComplexTypeArray['SentLog'] = SentLog::GetSoapComplexTypeXml();
				Word::AlterSoapComplexTypeArray($strComplexTypeArray);
			}
		}

		public static function GetArrayFromSoapArray($objSoapArray) {
			$objArrayToReturn = array();

			foreach ($objSoapArray as $objSoapObject)
				array_push($objArrayToReturn, SentLog::GetObjectFromSoapObject($objSoapObject));

			return $objArrayToReturn;
		}

		public static function GetObjectFromSoapObject($objSoapObject) {
			$objToReturn = new SentLog();
			if (property_exists($objSoapObject, 'WordSentLogId'))
				$objToReturn->intWordSentLogId = $objSoapObject->WordSentLogId;
			if (property_exists($objSoapObject, 'IpAddress'))
				$objToReturn->strIpAddress = $objSoapObject->IpAddress;
			if (property_exists($objSoapObject, 'UserAgent'))
				$objToReturn->strUserAgent = $objSoapObject->UserAgent;
			if (property_exists($objSoapObject, 'DateSent'))
				$objToReturn->dttDateSent = new QDateTime($objSoapObject->DateSent);
			if ((property_exists($objSoapObject, 'Word')) &&
				($objSoapObject->Word))
				$objToReturn->Word = Word::GetObjectFromSoapObject($objSoapObject->Word);
			if (property_exists($objSoapObject, '__blnRestored'))
				$objToReturn->__blnRestored = $objSoapObject->__blnRestored;
			return $objToReturn;
		}

		public static function GetSoapArrayFromArray($objArray) {
			if (!$objArray)
				return null;

			$objArrayToReturn = array();

			foreach ($objArray as $objObject)
				array_push($objArrayToReturn, SentLog::GetSoapObjectFromObject($objObject, true));

			return unserialize(serialize($objArrayToReturn));
		}

		public static function GetSoapObjectFromObject($objObject, $blnBindRelatedObjects) {
			if ($objObject->dttDateSent)
				$objObject->dttDateSent = $objObject->dttDateSent->__toString(QDateTime::FormatSoap);
			if ($objObject->objWord)
				$objObject->objWord = Word::GetSoapObjectFromObject($objObject->objWord, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intWordId = null;
			return $objObject;
		}


		////////////////////////////////////////
		// METHODS for JSON Object Translation
		////////////////////////////////////////

		// this function is required for objects that implement the
		// IteratorAggregate interface
		public function getIterator() {
			///////////////////
			// Member Variables
			///////////////////
			$iArray['WordSentLogId'] = $this->intWordSentLogId;
			$iArray['IpAddress'] = $this->strIpAddress;
			$iArray['UserAgent'] = $this->strUserAgent;
			$iArray['DateSent'] = $this->dttDateSent;
			$iArray['WordId'] = $this->intWordId;
			return new ArrayIterator($iArray);
		}

		// this function returns a Json formatted string using the 
		// IteratorAggregate interface
		public function getJson() {
			return json_encode($this->getIterator());
		}


	}



	/////////////////////////////////////
	// ADDITIONAL CLASSES for QCubed QUERY
	/////////////////////////////////////

    /**
     * @uses QQNode
     *
     * @property-read QQNode $WordSentLogId
     * @property-read QQNode $IpAddress
     * @property-read QQNode $UserAgent
     * @property-read QQNode $DateSent
     * @property-read QQNode $WordId
     * @property-read QQNodeWord $Word
     *
     *

     * @property-read QQNode $_PrimaryKeyNode
     **/
	class QQNodeSentLog extends QQNode {
		protected $strTableName = 'submit_word_sent_log';
		protected $strPrimaryKey = 'word_sent_log_id';
		protected $strClassName = 'SentLog';
		public function __get($strName) {
			switch ($strName) {
				case 'WordSentLogId':
					return new QQNode('word_sent_log_id', 'WordSentLogId', 'Integer', $this);
				case 'IpAddress':
					return new QQNode('ip_address', 'IpAddress', 'VarChar', $this);
				case 'UserAgent':
					return new QQNode('user_agent', 'UserAgent', 'VarChar', $this);
				case 'DateSent':
					return new QQNode('date_sent', 'DateSent', 'DateTime', $this);
				case 'WordId':
					return new QQNode('word_id', 'WordId', 'Integer', $this);
				case 'Word':
					return new QQNodeWord('word_id', 'Word', 'integer', $this);

				case '_PrimaryKeyNode':
					return new QQNode('word_sent_log_id', 'WordSentLogId', 'integer', $this);
				default:
					try {
						return parent::__get($strName);
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}
			}
		}
	}

    /**
     * @property-read QQNode $WordSentLogId
     * @property-read QQNode $IpAddress
     * @property-read QQNode $UserAgent
     * @property-read QQNode $DateSent
     * @property-read QQNode $WordId
     * @property-read QQNodeWord $Word
     *
     *

     * @property-read QQNode $_PrimaryKeyNode
     **/
	class QQReverseReferenceNodeSentLog extends QQReverseReferenceNode {
		protected $strTableName = 'submit_word_sent_log';
		protected $strPrimaryKey = 'word_sent_log_id';
		protected $strClassName = 'SentLog';
		public function __get($strName) {
			switch ($strName) {
				case 'WordSentLogId':
					return new QQNode('word_sent_log_id', 'WordSentLogId', 'integer', $this);
				case 'IpAddress':
					return new QQNode('ip_address', 'IpAddress', 'string', $this);
				case 'UserAgent':
					return new QQNode('user_agent', 'UserAgent', 'string', $this);
				case 'DateSent':
					return new QQNode('date_sent', 'DateSent', 'QDateTime', $this);
				case 'WordId':
					return new QQNode('word_id', 'WordId', 'integer', $this);
				case 'Word':
					return new QQNodeWord('word_id', 'Word', 'integer', $this);

				case '_PrimaryKeyNode':
					return new QQNode('word_sent_log_id', 'WordSentLogId', 'integer', $this);
				default:
					try {
						return parent::__get($strName);
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}
			}
		}
	}

?>
