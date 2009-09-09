<?php
	/**
	 * The abstract WordStatusLogGen class defined here is
	 * code-generated and contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 *
	 * To use, you should use the WordStatusLog subclass which
	 * extends this WordStatusLogGen class.
	 *
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the WordStatusLog class.
	 * 
	 * @package My Application
	 * @subpackage GeneratedDataObjects
	 * @property-read integer $WordStatusLogId the value for intWordStatusLogId (Read-Only PK)
	 * @property integer $WordId the value for intWordId (Not Null)
	 * @property integer $StatusTypeId the value for intStatusTypeId (Not Null)
	 * @property string $ChangedBy the value for strChangedBy (Not Null)
	 * @property QDateTime $ChangedAt the value for dttChangedAt (Not Null)
	 * @property Word $Word the value for the Word object referenced by intWordId (Not Null)
	 * @property-read boolean $__Restored whether or not this object was restored from the database (as opposed to created new)
	 */
	class WordStatusLogGen extends QBaseClass implements IteratorAggregate {

		///////////////////////////////////////////////////////////////////////
		// PROTECTED MEMBER VARIABLES and TEXT FIELD MAXLENGTHS (if applicable)
		///////////////////////////////////////////////////////////////////////
		
		/**
		 * Protected member variable that maps to the database PK Identity column submit_word_word_status_log.word_status_log_id
		 * @var integer intWordStatusLogId
		 */
		protected $intWordStatusLogId;
		const WordStatusLogIdDefault = null;


		/**
		 * Protected member variable that maps to the database column submit_word_word_status_log.word_id
		 * @var integer intWordId
		 */
		protected $intWordId;
		const WordIdDefault = null;


		/**
		 * Protected member variable that maps to the database column submit_word_word_status_log.status_type_id
		 * @var integer intStatusTypeId
		 */
		protected $intStatusTypeId;
		const StatusTypeIdDefault = null;


		/**
		 * Protected member variable that maps to the database column submit_word_word_status_log.changed_by
		 * @var string strChangedBy
		 */
		protected $strChangedBy;
		const ChangedByMaxLength = 255;
		const ChangedByDefault = null;


		/**
		 * Protected member variable that maps to the database column submit_word_word_status_log.changed_at
		 * @var QDateTime dttChangedAt
		 */
		protected $dttChangedAt;
		const ChangedAtDefault = null;


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
		 * in the database column submit_word_word_status_log.word_id.
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
			$this->intWordStatusLogId = WordStatusLog::WordStatusLogIdDefault;
			$this->intWordId = WordStatusLog::WordIdDefault;
			$this->intStatusTypeId = WordStatusLog::StatusTypeIdDefault;
			$this->strChangedBy = WordStatusLog::ChangedByDefault;
			$this->dttChangedAt = (WordStatusLog::ChangedAtDefault === null)?null:new QDateTime(WordStatusLog::ChangedAtDefault);
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
		 * Load a WordStatusLog from PK Info
		 * @param integer $intWordStatusLogId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return WordStatusLog
		 */
		public static function Load($intWordStatusLogId, $objOptionalClauses = null) {
			// Use QuerySingle to Perform the Query
			return WordStatusLog::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::WordStatusLog()->WordStatusLogId, $intWordStatusLogId)
				),
				$objOptionalClauses
			);
		}

		/**
		 * Load all WordStatusLogs
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return WordStatusLog[]
		 */
		public static function LoadAll($objOptionalClauses = null) {
			if (func_num_args() > 1) {
				throw new QCallerException("LoadAll must be called with an array of optional clauses as a single argument");
			}
			// Call WordStatusLog::QueryArray to perform the LoadAll query
			try {
				return WordStatusLog::QueryArray(QQ::All(), $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count all WordStatusLogs
		 * @return int
		 */
		public static function CountAll() {
			// Call WordStatusLog::QueryCount to perform the CountAll query
			return WordStatusLog::QueryCount(QQ::All());
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
			$objDatabase = WordStatusLog::GetDatabase();

			// Create/Build out the QueryBuilder object with WordStatusLog-specific SELET and FROM fields
			$objQueryBuilder = new QQueryBuilder($objDatabase, 'submit_word_word_status_log');
			WordStatusLog::GetSelectFields($objQueryBuilder);
			$objQueryBuilder->AddFromItem('submit_word_word_status_log');

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
		 * Static Qcubed Query method to query for a single WordStatusLog object.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return WordStatusLog the queried object
		 */
		public static function QuerySingle(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = WordStatusLog::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
			
			// Perform the Query, Get the First Row, and Instantiate a new WordStatusLog object
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			
			// Do we have to expand anything?
			if ($objQueryBuilder->ExpandAsArrayNodes) {
				$objToReturn = array();
				while ($objDbRow = $objDbResult->GetNextRow()) {
					$objItem = WordStatusLog::InstantiateDbRow($objDbRow, null, $objQueryBuilder->ExpandAsArrayNodes, $objToReturn, $objQueryBuilder->ColumnAliasArray);
					if ($objItem)
						$objToReturn[] = $objItem;					
				}			
				// Since we only want the object to return, lets return the object and not the array.
				return $objToReturn[0];
			} else {
				// No expands just return the first row
				$objToReturn = null;
				while ($objDbRow = $objDbResult->GetNextRow())
					$objToReturn = WordStatusLog::InstantiateDbRow($objDbRow, null, null, null, $objQueryBuilder->ColumnAliasArray);
			}
			
			return $objToReturn;
		}

		/**
		 * Static Qcubed Query method to query for an array of WordStatusLog objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return WordStatusLog[] the queried objects as an array
		 */
		public static function QueryArray(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = WordStatusLog::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query and Instantiate the Array Result
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			return WordStatusLog::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNodes, $objQueryBuilder->ColumnAliasArray);
		}

		/**
		 * Static Qcubed Query method to query for a count of WordStatusLog objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return integer the count of queried objects as an integer
		 */
		public static function QueryCount(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = WordStatusLog::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, true);
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
			$objDatabase = WordStatusLog::GetDatabase();

			$strQuery = WordStatusLog::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			
			$objCache = new QCache('qquery/wordstatuslog', $strQuery);
			$cacheData = $objCache->GetData();
			
			if (!$cacheData || $blnForceUpdate) {
				$objDbResult = $objQueryBuilder->Database->Query($strQuery);
				$arrResult = WordStatusLog::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNodes, $objQueryBuilder->ColumnAliasArray);
				$objCache->SaveData(serialize($arrResult));
			} else {
				$arrResult = unserialize($cacheData);
			}
			
			return $arrResult;
		}

		/**
		 * Updates a QQueryBuilder with the SELECT fields for this WordStatusLog
		 * @param QQueryBuilder $objBuilder the Query Builder object to update
		 * @param string $strPrefix optional prefix to add to the SELECT fields
		 */
		public static function GetSelectFields(QQueryBuilder $objBuilder, $strPrefix = null) {
			if ($strPrefix) {
				$strTableName = $strPrefix;
				$strAliasPrefix = $strPrefix . '__';
			} else {
				$strTableName = 'submit_word_word_status_log';
				$strAliasPrefix = '';
			}

			$objBuilder->AddSelectItem($strTableName, 'word_status_log_id', $strAliasPrefix . 'word_status_log_id');
			$objBuilder->AddSelectItem($strTableName, 'word_id', $strAliasPrefix . 'word_id');
			$objBuilder->AddSelectItem($strTableName, 'status_type_id', $strAliasPrefix . 'status_type_id');
			$objBuilder->AddSelectItem($strTableName, 'changed_by', $strAliasPrefix . 'changed_by');
			$objBuilder->AddSelectItem($strTableName, 'changed_at', $strAliasPrefix . 'changed_at');
		}



		///////////////////////////////
		// INSTANTIATION-RELATED METHODS
		///////////////////////////////

		/**
		 * Instantiate a WordStatusLog from a Database Row.
		 * Takes in an optional strAliasPrefix, used in case another Object::InstantiateDbRow
		 * is calling this WordStatusLog::InstantiateDbRow in order to perform
		 * early binding on referenced objects.
		 * @param DatabaseRowBase $objDbRow
		 * @param string $strAliasPrefix
		 * @param string $strExpandAsArrayNodes
		 * @param QBaseClass $arrPreviousItem
		 * @param string[] $strColumnAliasArray
		 * @return WordStatusLog
		*/
		public static function InstantiateDbRow($objDbRow, $strAliasPrefix = null, $strExpandAsArrayNodes = null, $arrPreviousItems = null, $strColumnAliasArray = array()) {
			// If blank row, return null
			if (!$objDbRow) {
				return null;
			}

			// Create a new instance of the WordStatusLog object
			$objToReturn = new WordStatusLog();
			$objToReturn->__blnRestored = true;

			$strAliasName = array_key_exists($strAliasPrefix . 'word_status_log_id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'word_status_log_id'] : $strAliasPrefix . 'word_status_log_id';
			$objToReturn->intWordStatusLogId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'word_id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'word_id'] : $strAliasPrefix . 'word_id';
			$objToReturn->intWordId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'status_type_id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'status_type_id'] : $strAliasPrefix . 'status_type_id';
			$objToReturn->intStatusTypeId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'changed_by', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'changed_by'] : $strAliasPrefix . 'changed_by';
			$objToReturn->strChangedBy = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'changed_at', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'changed_at'] : $strAliasPrefix . 'changed_at';
			$objToReturn->dttChangedAt = $objDbRow->GetColumn($strAliasName, 'DateTime');

			if (isset($arrPreviousItems) && is_array($arrPreviousItems)) {
				foreach ($arrPreviousItems as $objPreviousItem) {
					if ($objToReturn->WordStatusLogId != $objPreviousItem->WordStatusLogId) {
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
				$strAliasPrefix = 'submit_word_word_status_log__';

			// Check for Word Early Binding
			$strAlias = $strAliasPrefix . 'word_id__word_id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName)))
				$objToReturn->objWord = Word::InstantiateDbRow($objDbRow, $strAliasPrefix . 'word_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);




			return $objToReturn;
		}

		/**
		 * Instantiate an array of WordStatusLogs from a Database Result
		 * @param DatabaseResultBase $objDbResult
		 * @param string $strExpandAsArrayNodes
		 * @param string[] $strColumnAliasArray
		 * @return WordStatusLog[]
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
					$objItem = WordStatusLog::InstantiateDbRow($objDbRow, null, $strExpandAsArrayNodes, $objToReturn, $strColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
					}
				}
			} else {
				while ($objDbRow = $objDbResult->GetNextRow())
					$objToReturn[] = WordStatusLog::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}



		///////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Single Load and Array)
		///////////////////////////////////////////////////
			
		/**
		 * Load a single WordStatusLog object,
		 * by WordStatusLogId Index(es)
		 * @param integer $intWordStatusLogId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return WordStatusLog
		*/
		public static function LoadByWordStatusLogId($intWordStatusLogId, $objOptionalClauses = null) {
			return WordStatusLog::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::WordStatusLog()->WordStatusLogId, $intWordStatusLogId)
				),
				$objOptionalClauses
			);
		}
			
		/**
		 * Load an array of WordStatusLog objects,
		 * by WordId Index(es)
		 * @param integer $intWordId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return WordStatusLog[]
		*/
		public static function LoadArrayByWordId($intWordId, $objOptionalClauses = null) {
			// Call WordStatusLog::QueryArray to perform the LoadArrayByWordId query
			try {
				return WordStatusLog::QueryArray(
					QQ::Equal(QQN::WordStatusLog()->WordId, $intWordId),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count WordStatusLogs
		 * by WordId Index(es)
		 * @param integer $intWordId
		 * @return int
		*/
		public static function CountByWordId($intWordId) {
			// Call WordStatusLog::QueryCount to perform the CountByWordId query
			return WordStatusLog::QueryCount(
				QQ::Equal(QQN::WordStatusLog()->WordId, $intWordId)
			);
		}
			
		/**
		 * Load an array of WordStatusLog objects,
		 * by StatusTypeId Index(es)
		 * @param integer $intStatusTypeId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return WordStatusLog[]
		*/
		public static function LoadArrayByStatusTypeId($intStatusTypeId, $objOptionalClauses = null) {
			// Call WordStatusLog::QueryArray to perform the LoadArrayByStatusTypeId query
			try {
				return WordStatusLog::QueryArray(
					QQ::Equal(QQN::WordStatusLog()->StatusTypeId, $intStatusTypeId),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count WordStatusLogs
		 * by StatusTypeId Index(es)
		 * @param integer $intStatusTypeId
		 * @return int
		*/
		public static function CountByStatusTypeId($intStatusTypeId) {
			// Call WordStatusLog::QueryCount to perform the CountByStatusTypeId query
			return WordStatusLog::QueryCount(
				QQ::Equal(QQN::WordStatusLog()->StatusTypeId, $intStatusTypeId)
			);
		}



		////////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Array via Many to Many)
		////////////////////////////////////////////////////




		//////////////////////////
		// SAVE, DELETE AND RELOAD
		//////////////////////////

		/**
		 * Save this WordStatusLog
		 * @param bool $blnForceInsert
		 * @param bool $blnForceUpdate
		 * @return int
		 */
		public function Save($blnForceInsert = false, $blnForceUpdate = false) {
			// Get the Database Object for this Class
			$objDatabase = WordStatusLog::GetDatabase();

			$mixToReturn = null;

			try {
				if ((!$this->__blnRestored) || ($blnForceInsert)) {
					// Perform an INSERT query
					$objDatabase->NonQuery('
						INSERT INTO `submit_word_word_status_log` (
							`word_id`,
							`status_type_id`,
							`changed_by`,
							`changed_at`
						) VALUES (
							' . $objDatabase->SqlVariable($this->intWordId) . ',
							' . $objDatabase->SqlVariable($this->intStatusTypeId) . ',
							' . $objDatabase->SqlVariable($this->strChangedBy) . ',
							' . $objDatabase->SqlVariable($this->dttChangedAt) . '
						)
					');

					// Update Identity column and return its value
					$mixToReturn = $this->intWordStatusLogId = $objDatabase->InsertId('submit_word_word_status_log', 'word_status_log_id');
				} else {
					// Perform an UPDATE query

					// First checking for Optimistic Locking constraints (if applicable)

					// Perform the UPDATE query
					$objDatabase->NonQuery('
						UPDATE
							`submit_word_word_status_log`
						SET
							`word_id` = ' . $objDatabase->SqlVariable($this->intWordId) . ',
							`status_type_id` = ' . $objDatabase->SqlVariable($this->intStatusTypeId) . ',
							`changed_by` = ' . $objDatabase->SqlVariable($this->strChangedBy) . ',
							`changed_at` = ' . $objDatabase->SqlVariable($this->dttChangedAt) . '
						WHERE
							`word_status_log_id` = ' . $objDatabase->SqlVariable($this->intWordStatusLogId) . '
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
		 * Delete this WordStatusLog
		 * @return void
		 */
		public function Delete() {
			if ((is_null($this->intWordStatusLogId)))
				throw new QUndefinedPrimaryKeyException('Cannot delete this WordStatusLog with an unset primary key.');

			// Get the Database Object for this Class
			$objDatabase = WordStatusLog::GetDatabase();


			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`submit_word_word_status_log`
				WHERE
					`word_status_log_id` = ' . $objDatabase->SqlVariable($this->intWordStatusLogId) . '');
		}

		/**
		 * Delete all WordStatusLogs
		 * @return void
		 */
		public static function DeleteAll() {
			// Get the Database Object for this Class
			$objDatabase = WordStatusLog::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				DELETE FROM
					`submit_word_word_status_log`');
		}

		/**
		 * Truncate submit_word_word_status_log table
		 * @return void
		 */
		public static function Truncate() {
			// Get the Database Object for this Class
			$objDatabase = WordStatusLog::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				TRUNCATE `submit_word_word_status_log`');
		}

		/**
		 * Reload this WordStatusLog from the database.
		 * @return void
		 */
		public function Reload() {
			// Make sure we are actually Restored from the database
			if (!$this->__blnRestored)
				throw new QCallerException('Cannot call Reload() on a new, unsaved WordStatusLog object.');

			// Reload the Object
			$objReloaded = WordStatusLog::Load($this->intWordStatusLogId);

			// Update $this's local variables to match
			$this->WordId = $objReloaded->WordId;
			$this->StatusTypeId = $objReloaded->StatusTypeId;
			$this->strChangedBy = $objReloaded->strChangedBy;
			$this->dttChangedAt = $objReloaded->dttChangedAt;
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
				case 'WordStatusLogId':
					/**
					 * Gets the value for intWordStatusLogId (Read-Only PK)
					 * @return integer
					 */
					return $this->intWordStatusLogId;

				case 'WordId':
					/**
					 * Gets the value for intWordId (Not Null)
					 * @return integer
					 */
					return $this->intWordId;

				case 'StatusTypeId':
					/**
					 * Gets the value for intStatusTypeId (Not Null)
					 * @return integer
					 */
					return $this->intStatusTypeId;

				case 'ChangedBy':
					/**
					 * Gets the value for strChangedBy (Not Null)
					 * @return string
					 */
					return $this->strChangedBy;

				case 'ChangedAt':
					/**
					 * Gets the value for dttChangedAt (Not Null)
					 * @return QDateTime
					 */
					return $this->dttChangedAt;


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

				case 'StatusTypeId':
					/**
					 * Sets the value for intStatusTypeId (Not Null)
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						return ($this->intStatusTypeId = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'ChangedBy':
					/**
					 * Sets the value for strChangedBy (Not Null)
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strChangedBy = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'ChangedAt':
					/**
					 * Sets the value for dttChangedAt (Not Null)
					 * @param QDateTime $mixValue
					 * @return QDateTime
					 */
					try {
						return ($this->dttChangedAt = QType::Cast($mixValue, QType::DateTime));
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
							throw new QCallerException('Unable to set an unsaved Word for this WordStatusLog');

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
			$strToReturn = '<complexType name="WordStatusLog"><sequence>';
			$strToReturn .= '<element name="WordStatusLogId" type="xsd:int"/>';
			$strToReturn .= '<element name="Word" type="xsd1:Word"/>';
			$strToReturn .= '<element name="StatusTypeId" type="xsd:int"/>';
			$strToReturn .= '<element name="ChangedBy" type="xsd:string"/>';
			$strToReturn .= '<element name="ChangedAt" type="xsd:dateTime"/>';
			$strToReturn .= '<element name="__blnRestored" type="xsd:boolean"/>';
			$strToReturn .= '</sequence></complexType>';
			return $strToReturn;
		}

		public static function AlterSoapComplexTypeArray(&$strComplexTypeArray) {
			if (!array_key_exists('WordStatusLog', $strComplexTypeArray)) {
				$strComplexTypeArray['WordStatusLog'] = WordStatusLog::GetSoapComplexTypeXml();
				Word::AlterSoapComplexTypeArray($strComplexTypeArray);
			}
		}

		public static function GetArrayFromSoapArray($objSoapArray) {
			$objArrayToReturn = array();

			foreach ($objSoapArray as $objSoapObject)
				array_push($objArrayToReturn, WordStatusLog::GetObjectFromSoapObject($objSoapObject));

			return $objArrayToReturn;
		}

		public static function GetObjectFromSoapObject($objSoapObject) {
			$objToReturn = new WordStatusLog();
			if (property_exists($objSoapObject, 'WordStatusLogId'))
				$objToReturn->intWordStatusLogId = $objSoapObject->WordStatusLogId;
			if ((property_exists($objSoapObject, 'Word')) &&
				($objSoapObject->Word))
				$objToReturn->Word = Word::GetObjectFromSoapObject($objSoapObject->Word);
			if (property_exists($objSoapObject, 'StatusTypeId'))
				$objToReturn->intStatusTypeId = $objSoapObject->StatusTypeId;
			if (property_exists($objSoapObject, 'ChangedBy'))
				$objToReturn->strChangedBy = $objSoapObject->ChangedBy;
			if (property_exists($objSoapObject, 'ChangedAt'))
				$objToReturn->dttChangedAt = new QDateTime($objSoapObject->ChangedAt);
			if (property_exists($objSoapObject, '__blnRestored'))
				$objToReturn->__blnRestored = $objSoapObject->__blnRestored;
			return $objToReturn;
		}

		public static function GetSoapArrayFromArray($objArray) {
			if (!$objArray)
				return null;

			$objArrayToReturn = array();

			foreach ($objArray as $objObject)
				array_push($objArrayToReturn, WordStatusLog::GetSoapObjectFromObject($objObject, true));

			return unserialize(serialize($objArrayToReturn));
		}

		public static function GetSoapObjectFromObject($objObject, $blnBindRelatedObjects) {
			if ($objObject->objWord)
				$objObject->objWord = Word::GetSoapObjectFromObject($objObject->objWord, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intWordId = null;
			if ($objObject->dttChangedAt)
				$objObject->dttChangedAt = $objObject->dttChangedAt->__toString(QDateTime::FormatSoap);
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
			$iArray['WordStatusLogId'] = $this->intWordStatusLogId;
			$iArray['WordId'] = $this->intWordId;
			$iArray['StatusTypeId'] = $this->intStatusTypeId;
			$iArray['ChangedBy'] = $this->strChangedBy;
			$iArray['ChangedAt'] = $this->dttChangedAt;
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
     * @property-read QQNode $WordStatusLogId
     * @property-read QQNode $WordId
     * @property-read QQNodeWord $Word
     * @property-read QQNode $StatusTypeId
     * @property-read QQNode $ChangedBy
     * @property-read QQNode $ChangedAt
     *
     *

     * @property-read QQNode $_PrimaryKeyNode
     **/
	class QQNodeWordStatusLog extends QQNode {
		protected $strTableName = 'submit_word_word_status_log';
		protected $strPrimaryKey = 'word_status_log_id';
		protected $strClassName = 'WordStatusLog';
		public function __get($strName) {
			switch ($strName) {
				case 'WordStatusLogId':
					return new QQNode('word_status_log_id', 'WordStatusLogId', 'Integer', $this);
				case 'WordId':
					return new QQNode('word_id', 'WordId', 'Integer', $this);
				case 'Word':
					return new QQNodeWord('word_id', 'Word', 'integer', $this);
				case 'StatusTypeId':
					return new QQNode('status_type_id', 'StatusTypeId', 'Integer', $this);
				case 'ChangedBy':
					return new QQNode('changed_by', 'ChangedBy', 'VarChar', $this);
				case 'ChangedAt':
					return new QQNode('changed_at', 'ChangedAt', 'DateTime', $this);

				case '_PrimaryKeyNode':
					return new QQNode('word_status_log_id', 'WordStatusLogId', 'integer', $this);
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
     * @property-read QQNode $WordStatusLogId
     * @property-read QQNode $WordId
     * @property-read QQNodeWord $Word
     * @property-read QQNode $StatusTypeId
     * @property-read QQNode $ChangedBy
     * @property-read QQNode $ChangedAt
     *
     *

     * @property-read QQNode $_PrimaryKeyNode
     **/
	class QQReverseReferenceNodeWordStatusLog extends QQReverseReferenceNode {
		protected $strTableName = 'submit_word_word_status_log';
		protected $strPrimaryKey = 'word_status_log_id';
		protected $strClassName = 'WordStatusLog';
		public function __get($strName) {
			switch ($strName) {
				case 'WordStatusLogId':
					return new QQNode('word_status_log_id', 'WordStatusLogId', 'integer', $this);
				case 'WordId':
					return new QQNode('word_id', 'WordId', 'integer', $this);
				case 'Word':
					return new QQNodeWord('word_id', 'Word', 'integer', $this);
				case 'StatusTypeId':
					return new QQNode('status_type_id', 'StatusTypeId', 'integer', $this);
				case 'ChangedBy':
					return new QQNode('changed_by', 'ChangedBy', 'string', $this);
				case 'ChangedAt':
					return new QQNode('changed_at', 'ChangedAt', 'QDateTime', $this);

				case '_PrimaryKeyNode':
					return new QQNode('word_status_log_id', 'WordStatusLogId', 'integer', $this);
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
