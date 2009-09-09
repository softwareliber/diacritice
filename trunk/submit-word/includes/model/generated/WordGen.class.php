<?php
	/**
	 * The abstract WordGen class defined here is
	 * code-generated and contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 *
	 * To use, you should use the Word subclass which
	 * extends this WordGen class.
	 *
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the Word class.
	 * 
	 * @package My Application
	 * @subpackage GeneratedDataObjects
	 * @property-read integer $WordId the value for intWordId (Read-Only PK)
	 * @property string $Word the value for strWord (Unique)
	 * @property integer $StatusTypeId the value for intStatusTypeId (Not Null)
	 * @property integer $ProposalCount the value for intProposalCount (Not Null)
	 * @property QDateTime $LastSent the value for dttLastSent (Not Null)
	 * @property-read SentLog $_SentLogAsWord the value for the private _objSentLogAsWord (Read-Only) if set due to an expansion on the submit_word_sent_log.word_id reverse relationship
	 * @property-read SentLog[] $_SentLogAsWordArray the value for the private _objSentLogAsWordArray (Read-Only) if set due to an ExpandAsArray on the submit_word_sent_log.word_id reverse relationship
	 * @property-read WordStatusLog $_WordStatusLogAsWord the value for the private _objWordStatusLogAsWord (Read-Only) if set due to an expansion on the submit_word_word_status_log.word_id reverse relationship
	 * @property-read WordStatusLog[] $_WordStatusLogAsWordArray the value for the private _objWordStatusLogAsWordArray (Read-Only) if set due to an ExpandAsArray on the submit_word_word_status_log.word_id reverse relationship
	 * @property-read boolean $__Restored whether or not this object was restored from the database (as opposed to created new)
	 */
	class WordGen extends QBaseClass implements IteratorAggregate {

		///////////////////////////////////////////////////////////////////////
		// PROTECTED MEMBER VARIABLES and TEXT FIELD MAXLENGTHS (if applicable)
		///////////////////////////////////////////////////////////////////////
		
		/**
		 * Protected member variable that maps to the database PK Identity column submit_word_word.word_id
		 * @var integer intWordId
		 */
		protected $intWordId;
		const WordIdDefault = null;


		/**
		 * Protected member variable that maps to the database column submit_word_word.word
		 * @var string strWord
		 */
		protected $strWord;
		const WordMaxLength = 255;
		const WordDefault = null;


		/**
		 * Protected member variable that maps to the database column submit_word_word.status_type_id
		 * @var integer intStatusTypeId
		 */
		protected $intStatusTypeId;
		const StatusTypeIdDefault = null;


		/**
		 * Protected member variable that maps to the database column submit_word_word.proposal_count
		 * @var integer intProposalCount
		 */
		protected $intProposalCount;
		const ProposalCountDefault = null;


		/**
		 * Protected member variable that maps to the database column submit_word_word.last_sent
		 * @var QDateTime dttLastSent
		 */
		protected $dttLastSent;
		const LastSentDefault = null;


		/**
		 * Private member variable that stores a reference to a single SentLogAsWord object
		 * (of type SentLog), if this Word object was restored with
		 * an expansion on the submit_word_sent_log association table.
		 * @var SentLog _objSentLogAsWord;
		 */
		private $_objSentLogAsWord;

		/**
		 * Private member variable that stores a reference to an array of SentLogAsWord objects
		 * (of type SentLog[]), if this Word object was restored with
		 * an ExpandAsArray on the submit_word_sent_log association table.
		 * @var SentLog[] _objSentLogAsWordArray;
		 */
		private $_objSentLogAsWordArray = array();

		/**
		 * Private member variable that stores a reference to a single WordStatusLogAsWord object
		 * (of type WordStatusLog), if this Word object was restored with
		 * an expansion on the submit_word_word_status_log association table.
		 * @var WordStatusLog _objWordStatusLogAsWord;
		 */
		private $_objWordStatusLogAsWord;

		/**
		 * Private member variable that stores a reference to an array of WordStatusLogAsWord objects
		 * (of type WordStatusLog[]), if this Word object was restored with
		 * an ExpandAsArray on the submit_word_word_status_log association table.
		 * @var WordStatusLog[] _objWordStatusLogAsWordArray;
		 */
		private $_objWordStatusLogAsWordArray = array();

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
		 * Initialize each property with default values from database definition
		 */
		public function Initialize()
		{
			$this->intWordId = Word::WordIdDefault;
			$this->strWord = Word::WordDefault;
			$this->intStatusTypeId = Word::StatusTypeIdDefault;
			$this->intProposalCount = Word::ProposalCountDefault;
			$this->dttLastSent = (Word::LastSentDefault === null)?null:new QDateTime(Word::LastSentDefault);
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
		 * Load a Word from PK Info
		 * @param integer $intWordId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Word
		 */
		public static function Load($intWordId, $objOptionalClauses = null) {
			// Use QuerySingle to Perform the Query
			return Word::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::Word()->WordId, $intWordId)
				),
				$objOptionalClauses
			);
		}

		/**
		 * Load all Words
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Word[]
		 */
		public static function LoadAll($objOptionalClauses = null) {
			if (func_num_args() > 1) {
				throw new QCallerException("LoadAll must be called with an array of optional clauses as a single argument");
			}
			// Call Word::QueryArray to perform the LoadAll query
			try {
				return Word::QueryArray(QQ::All(), $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count all Words
		 * @return int
		 */
		public static function CountAll() {
			// Call Word::QueryCount to perform the CountAll query
			return Word::QueryCount(QQ::All());
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
			$objDatabase = Word::GetDatabase();

			// Create/Build out the QueryBuilder object with Word-specific SELET and FROM fields
			$objQueryBuilder = new QQueryBuilder($objDatabase, 'submit_word_word');
			Word::GetSelectFields($objQueryBuilder);
			$objQueryBuilder->AddFromItem('submit_word_word');

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
		 * Static Qcubed Query method to query for a single Word object.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return Word the queried object
		 */
		public static function QuerySingle(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = Word::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
			
			// Perform the Query, Get the First Row, and Instantiate a new Word object
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			
			// Do we have to expand anything?
			if ($objQueryBuilder->ExpandAsArrayNodes) {
				$objToReturn = array();
				while ($objDbRow = $objDbResult->GetNextRow()) {
					$objItem = Word::InstantiateDbRow($objDbRow, null, $objQueryBuilder->ExpandAsArrayNodes, $objToReturn, $objQueryBuilder->ColumnAliasArray);
					if ($objItem)
						$objToReturn[] = $objItem;					
				}			
				// Since we only want the object to return, lets return the object and not the array.
				return $objToReturn[0];
			} else {
				// No expands just return the first row
				$objToReturn = null;
				while ($objDbRow = $objDbResult->GetNextRow())
					$objToReturn = Word::InstantiateDbRow($objDbRow, null, null, null, $objQueryBuilder->ColumnAliasArray);
			}
			
			return $objToReturn;
		}

		/**
		 * Static Qcubed Query method to query for an array of Word objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return Word[] the queried objects as an array
		 */
		public static function QueryArray(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = Word::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query and Instantiate the Array Result
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			return Word::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNodes, $objQueryBuilder->ColumnAliasArray);
		}

		/**
		 * Static Qcubed Query method to query for a count of Word objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return integer the count of queried objects as an integer
		 */
		public static function QueryCount(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = Word::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, true);
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
			$objDatabase = Word::GetDatabase();

			$strQuery = Word::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			
			$objCache = new QCache('qquery/word', $strQuery);
			$cacheData = $objCache->GetData();
			
			if (!$cacheData || $blnForceUpdate) {
				$objDbResult = $objQueryBuilder->Database->Query($strQuery);
				$arrResult = Word::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNodes, $objQueryBuilder->ColumnAliasArray);
				$objCache->SaveData(serialize($arrResult));
			} else {
				$arrResult = unserialize($cacheData);
			}
			
			return $arrResult;
		}

		/**
		 * Updates a QQueryBuilder with the SELECT fields for this Word
		 * @param QQueryBuilder $objBuilder the Query Builder object to update
		 * @param string $strPrefix optional prefix to add to the SELECT fields
		 */
		public static function GetSelectFields(QQueryBuilder $objBuilder, $strPrefix = null) {
			if ($strPrefix) {
				$strTableName = $strPrefix;
				$strAliasPrefix = $strPrefix . '__';
			} else {
				$strTableName = 'submit_word_word';
				$strAliasPrefix = '';
			}

			$objBuilder->AddSelectItem($strTableName, 'word_id', $strAliasPrefix . 'word_id');
			$objBuilder->AddSelectItem($strTableName, 'word', $strAliasPrefix . 'word');
			$objBuilder->AddSelectItem($strTableName, 'status_type_id', $strAliasPrefix . 'status_type_id');
			$objBuilder->AddSelectItem($strTableName, 'proposal_count', $strAliasPrefix . 'proposal_count');
			$objBuilder->AddSelectItem($strTableName, 'last_sent', $strAliasPrefix . 'last_sent');
		}



		///////////////////////////////
		// INSTANTIATION-RELATED METHODS
		///////////////////////////////

		/**
		 * Instantiate a Word from a Database Row.
		 * Takes in an optional strAliasPrefix, used in case another Object::InstantiateDbRow
		 * is calling this Word::InstantiateDbRow in order to perform
		 * early binding on referenced objects.
		 * @param DatabaseRowBase $objDbRow
		 * @param string $strAliasPrefix
		 * @param string $strExpandAsArrayNodes
		 * @param QBaseClass $arrPreviousItem
		 * @param string[] $strColumnAliasArray
		 * @return Word
		*/
		public static function InstantiateDbRow($objDbRow, $strAliasPrefix = null, $strExpandAsArrayNodes = null, $arrPreviousItems = null, $strColumnAliasArray = array()) {
			// If blank row, return null
			if (!$objDbRow) {
				return null;
			}
			// See if we're doing an array expansion on the previous item
			$strAlias = $strAliasPrefix . 'word_id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (($strExpandAsArrayNodes) && is_array($arrPreviousItems) && count($arrPreviousItems)) {
				foreach ($arrPreviousItems as $objPreviousItem) {            
					if ($objPreviousItem->intWordId == $objDbRow->GetColumn($strAliasName, 'Integer')) {        
						// We are.  Now, prepare to check for ExpandAsArray clauses
						$blnExpandedViaArray = false;
						if (!$strAliasPrefix)
							$strAliasPrefix = 'submit_word_word__';


						// Expanding reverse references: SentLogAsWord
						$strAlias = $strAliasPrefix . 'sentlogasword__word_sent_log_id';
						$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
						if ((array_key_exists($strAlias, $strExpandAsArrayNodes)) &&
							(!is_null($objDbRow->GetColumn($strAliasName)))) {
							if ($intPreviousChildItemCount = count($objPreviousItem->_objSentLogAsWordArray)) {
								$objPreviousChildItems = $objPreviousItem->_objSentLogAsWordArray;
								$objChildItem = SentLog::InstantiateDbRow($objDbRow, $strAliasPrefix . 'sentlogasword__', $strExpandAsArrayNodes, $objPreviousChildItems, $strColumnAliasArray);
								if ($objChildItem) {
									$objPreviousItem->_objSentLogAsWordArray[] = $objChildItem;
								}
							} else {
								$objPreviousItem->_objSentLogAsWordArray[] = SentLog::InstantiateDbRow($objDbRow, $strAliasPrefix . 'sentlogasword__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
							}
							$blnExpandedViaArray = true;
						}

						// Expanding reverse references: WordStatusLogAsWord
						$strAlias = $strAliasPrefix . 'wordstatuslogasword__word_status_log_id';
						$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
						if ((array_key_exists($strAlias, $strExpandAsArrayNodes)) &&
							(!is_null($objDbRow->GetColumn($strAliasName)))) {
							if ($intPreviousChildItemCount = count($objPreviousItem->_objWordStatusLogAsWordArray)) {
								$objPreviousChildItems = $objPreviousItem->_objWordStatusLogAsWordArray;
								$objChildItem = WordStatusLog::InstantiateDbRow($objDbRow, $strAliasPrefix . 'wordstatuslogasword__', $strExpandAsArrayNodes, $objPreviousChildItems, $strColumnAliasArray);
								if ($objChildItem) {
									$objPreviousItem->_objWordStatusLogAsWordArray[] = $objChildItem;
								}
							} else {
								$objPreviousItem->_objWordStatusLogAsWordArray[] = WordStatusLog::InstantiateDbRow($objDbRow, $strAliasPrefix . 'wordstatuslogasword__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
							}
							$blnExpandedViaArray = true;
						}

						// Either return false to signal array expansion, or check-to-reset the Alias prefix and move on
						if ($blnExpandedViaArray) {
							return false;
						} else if ($strAliasPrefix == 'submit_word_word__') {
							$strAliasPrefix = null;
						}
					}
				}
			}

			// Create a new instance of the Word object
			$objToReturn = new Word();
			$objToReturn->__blnRestored = true;

			$strAliasName = array_key_exists($strAliasPrefix . 'word_id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'word_id'] : $strAliasPrefix . 'word_id';
			$objToReturn->intWordId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'word', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'word'] : $strAliasPrefix . 'word';
			$objToReturn->strWord = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'status_type_id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'status_type_id'] : $strAliasPrefix . 'status_type_id';
			$objToReturn->intStatusTypeId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'proposal_count', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'proposal_count'] : $strAliasPrefix . 'proposal_count';
			$objToReturn->intProposalCount = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'last_sent', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'last_sent'] : $strAliasPrefix . 'last_sent';
			$objToReturn->dttLastSent = $objDbRow->GetColumn($strAliasName, 'DateTime');

			if (isset($arrPreviousItems) && is_array($arrPreviousItems)) {
				foreach ($arrPreviousItems as $objPreviousItem) {
					if ($objToReturn->WordId != $objPreviousItem->WordId) {
						continue;
					}
					if (array_diff($objPreviousItem->_objSentLogAsWordArray, $objToReturn->_objSentLogAsWordArray) != null) {
						continue;
					}
					if (array_diff($objPreviousItem->_objWordStatusLogAsWordArray, $objToReturn->_objWordStatusLogAsWordArray) != null) {
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
				$strAliasPrefix = 'submit_word_word__';




			// Check for SentLogAsWord Virtual Binding
			$strAlias = $strAliasPrefix . 'sentlogasword__word_sent_log_id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if (($strExpandAsArrayNodes) && (array_key_exists($strAlias, $strExpandAsArrayNodes)))
					$objToReturn->_objSentLogAsWordArray[] = SentLog::InstantiateDbRow($objDbRow, $strAliasPrefix . 'sentlogasword__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					$objToReturn->_objSentLogAsWord = SentLog::InstantiateDbRow($objDbRow, $strAliasPrefix . 'sentlogasword__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
			}

			// Check for WordStatusLogAsWord Virtual Binding
			$strAlias = $strAliasPrefix . 'wordstatuslogasword__word_status_log_id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if (($strExpandAsArrayNodes) && (array_key_exists($strAlias, $strExpandAsArrayNodes)))
					$objToReturn->_objWordStatusLogAsWordArray[] = WordStatusLog::InstantiateDbRow($objDbRow, $strAliasPrefix . 'wordstatuslogasword__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					$objToReturn->_objWordStatusLogAsWord = WordStatusLog::InstantiateDbRow($objDbRow, $strAliasPrefix . 'wordstatuslogasword__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}

		/**
		 * Instantiate an array of Words from a Database Result
		 * @param DatabaseResultBase $objDbResult
		 * @param string $strExpandAsArrayNodes
		 * @param string[] $strColumnAliasArray
		 * @return Word[]
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
					$objItem = Word::InstantiateDbRow($objDbRow, null, $strExpandAsArrayNodes, $objToReturn, $strColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
					}
				}
			} else {
				while ($objDbRow = $objDbResult->GetNextRow())
					$objToReturn[] = Word::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}



		///////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Single Load and Array)
		///////////////////////////////////////////////////
			
		/**
		 * Load a single Word object,
		 * by WordId Index(es)
		 * @param integer $intWordId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Word
		*/
		public static function LoadByWordId($intWordId, $objOptionalClauses = null) {
			return Word::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::Word()->WordId, $intWordId)
				),
				$objOptionalClauses
			);
		}
			
		/**
		 * Load a single Word object,
		 * by Word Index(es)
		 * @param string $strWord
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Word
		*/
		public static function LoadByWord($strWord, $objOptionalClauses = null) {
			return Word::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::Word()->Word, $strWord)
				),
				$objOptionalClauses
			);
		}
			
		/**
		 * Load an array of Word objects,
		 * by StatusTypeId Index(es)
		 * @param integer $intStatusTypeId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Word[]
		*/
		public static function LoadArrayByStatusTypeId($intStatusTypeId, $objOptionalClauses = null) {
			// Call Word::QueryArray to perform the LoadArrayByStatusTypeId query
			try {
				return Word::QueryArray(
					QQ::Equal(QQN::Word()->StatusTypeId, $intStatusTypeId),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Words
		 * by StatusTypeId Index(es)
		 * @param integer $intStatusTypeId
		 * @return int
		*/
		public static function CountByStatusTypeId($intStatusTypeId) {
			// Call Word::QueryCount to perform the CountByStatusTypeId query
			return Word::QueryCount(
				QQ::Equal(QQN::Word()->StatusTypeId, $intStatusTypeId)
			);
		}



		////////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Array via Many to Many)
		////////////////////////////////////////////////////




		//////////////////////////
		// SAVE, DELETE AND RELOAD
		//////////////////////////

		/**
		 * Save this Word
		 * @param bool $blnForceInsert
		 * @param bool $blnForceUpdate
		 * @return int
		 */
		public function Save($blnForceInsert = false, $blnForceUpdate = false) {
			// Get the Database Object for this Class
			$objDatabase = Word::GetDatabase();

			$mixToReturn = null;

			try {
				if ((!$this->__blnRestored) || ($blnForceInsert)) {
					// Perform an INSERT query
					$objDatabase->NonQuery('
						INSERT INTO `submit_word_word` (
							`word`,
							`status_type_id`,
							`proposal_count`,
							`last_sent`
						) VALUES (
							' . $objDatabase->SqlVariable($this->strWord) . ',
							' . $objDatabase->SqlVariable($this->intStatusTypeId) . ',
							' . $objDatabase->SqlVariable($this->intProposalCount) . ',
							' . $objDatabase->SqlVariable($this->dttLastSent) . '
						)
					');

					// Update Identity column and return its value
					$mixToReturn = $this->intWordId = $objDatabase->InsertId('submit_word_word', 'word_id');
				} else {
					// Perform an UPDATE query

					// First checking for Optimistic Locking constraints (if applicable)

					// Perform the UPDATE query
					$objDatabase->NonQuery('
						UPDATE
							`submit_word_word`
						SET
							`word` = ' . $objDatabase->SqlVariable($this->strWord) . ',
							`status_type_id` = ' . $objDatabase->SqlVariable($this->intStatusTypeId) . ',
							`proposal_count` = ' . $objDatabase->SqlVariable($this->intProposalCount) . ',
							`last_sent` = ' . $objDatabase->SqlVariable($this->dttLastSent) . '
						WHERE
							`word_id` = ' . $objDatabase->SqlVariable($this->intWordId) . '
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
		 * Delete this Word
		 * @return void
		 */
		public function Delete() {
			if ((is_null($this->intWordId)))
				throw new QUndefinedPrimaryKeyException('Cannot delete this Word with an unset primary key.');

			// Get the Database Object for this Class
			$objDatabase = Word::GetDatabase();


			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`submit_word_word`
				WHERE
					`word_id` = ' . $objDatabase->SqlVariable($this->intWordId) . '');
		}

		/**
		 * Delete all Words
		 * @return void
		 */
		public static function DeleteAll() {
			// Get the Database Object for this Class
			$objDatabase = Word::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				DELETE FROM
					`submit_word_word`');
		}

		/**
		 * Truncate submit_word_word table
		 * @return void
		 */
		public static function Truncate() {
			// Get the Database Object for this Class
			$objDatabase = Word::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				TRUNCATE `submit_word_word`');
		}

		/**
		 * Reload this Word from the database.
		 * @return void
		 */
		public function Reload() {
			// Make sure we are actually Restored from the database
			if (!$this->__blnRestored)
				throw new QCallerException('Cannot call Reload() on a new, unsaved Word object.');

			// Reload the Object
			$objReloaded = Word::Load($this->intWordId);

			// Update $this's local variables to match
			$this->strWord = $objReloaded->strWord;
			$this->StatusTypeId = $objReloaded->StatusTypeId;
			$this->intProposalCount = $objReloaded->intProposalCount;
			$this->dttLastSent = $objReloaded->dttLastSent;
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
				case 'WordId':
					/**
					 * Gets the value for intWordId (Read-Only PK)
					 * @return integer
					 */
					return $this->intWordId;

				case 'Word':
					/**
					 * Gets the value for strWord (Unique)
					 * @return string
					 */
					return $this->strWord;

				case 'StatusTypeId':
					/**
					 * Gets the value for intStatusTypeId (Not Null)
					 * @return integer
					 */
					return $this->intStatusTypeId;

				case 'ProposalCount':
					/**
					 * Gets the value for intProposalCount (Not Null)
					 * @return integer
					 */
					return $this->intProposalCount;

				case 'LastSent':
					/**
					 * Gets the value for dttLastSent (Not Null)
					 * @return QDateTime
					 */
					return $this->dttLastSent;


				///////////////////
				// Member Objects
				///////////////////

				////////////////////////////
				// Virtual Object References (Many to Many and Reverse References)
				// (If restored via a "Many-to" expansion)
				////////////////////////////

				case '_SentLogAsWord':
					/**
					 * Gets the value for the private _objSentLogAsWord (Read-Only)
					 * if set due to an expansion on the submit_word_sent_log.word_id reverse relationship
					 * @return SentLog
					 */
					return $this->_objSentLogAsWord;

				case '_SentLogAsWordArray':
					/**
					 * Gets the value for the private _objSentLogAsWordArray (Read-Only)
					 * if set due to an ExpandAsArray on the submit_word_sent_log.word_id reverse relationship
					 * @return SentLog[]
					 */
					return (array) $this->_objSentLogAsWordArray;

				case '_WordStatusLogAsWord':
					/**
					 * Gets the value for the private _objWordStatusLogAsWord (Read-Only)
					 * if set due to an expansion on the submit_word_word_status_log.word_id reverse relationship
					 * @return WordStatusLog
					 */
					return $this->_objWordStatusLogAsWord;

				case '_WordStatusLogAsWordArray':
					/**
					 * Gets the value for the private _objWordStatusLogAsWordArray (Read-Only)
					 * if set due to an ExpandAsArray on the submit_word_word_status_log.word_id reverse relationship
					 * @return WordStatusLog[]
					 */
					return (array) $this->_objWordStatusLogAsWordArray;


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
				case 'Word':
					/**
					 * Sets the value for strWord (Unique)
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strWord = QType::Cast($mixValue, QType::String));
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

				case 'ProposalCount':
					/**
					 * Sets the value for intProposalCount (Not Null)
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						return ($this->intProposalCount = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'LastSent':
					/**
					 * Sets the value for dttLastSent (Not Null)
					 * @param QDateTime $mixValue
					 * @return QDateTime
					 */
					try {
						return ($this->dttLastSent = QType::Cast($mixValue, QType::DateTime));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}


				///////////////////
				// Member Objects
				///////////////////
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

			
		
		// Related Objects' Methods for SentLogAsWord
		//-------------------------------------------------------------------

		/**
		 * Gets all associated SentLogsAsWord as an array of SentLog objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return SentLog[]
		*/ 
		public function GetSentLogAsWordArray($objOptionalClauses = null) {
			if ((is_null($this->intWordId)))
				return array();

			try {
				return SentLog::LoadArrayByWordId($this->intWordId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated SentLogsAsWord
		 * @return int
		*/ 
		public function CountSentLogsAsWord() {
			if ((is_null($this->intWordId)))
				return 0;

			return SentLog::CountByWordId($this->intWordId);
		}

		/**
		 * Associates a SentLogAsWord
		 * @param SentLog $objSentLog
		 * @return void
		*/ 
		public function AssociateSentLogAsWord(SentLog $objSentLog) {
			if ((is_null($this->intWordId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateSentLogAsWord on this unsaved Word.');
			if ((is_null($objSentLog->WordSentLogId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateSentLogAsWord on this Word with an unsaved SentLog.');

			// Get the Database Object for this Class
			$objDatabase = Word::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`submit_word_sent_log`
				SET
					`word_id` = ' . $objDatabase->SqlVariable($this->intWordId) . '
				WHERE
					`word_sent_log_id` = ' . $objDatabase->SqlVariable($objSentLog->WordSentLogId) . '
			');
		}

		/**
		 * Unassociates a SentLogAsWord
		 * @param SentLog $objSentLog
		 * @return void
		*/ 
		public function UnassociateSentLogAsWord(SentLog $objSentLog) {
			if ((is_null($this->intWordId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateSentLogAsWord on this unsaved Word.');
			if ((is_null($objSentLog->WordSentLogId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateSentLogAsWord on this Word with an unsaved SentLog.');

			// Get the Database Object for this Class
			$objDatabase = Word::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`submit_word_sent_log`
				SET
					`word_id` = null
				WHERE
					`word_sent_log_id` = ' . $objDatabase->SqlVariable($objSentLog->WordSentLogId) . ' AND
					`word_id` = ' . $objDatabase->SqlVariable($this->intWordId) . '
			');
		}

		/**
		 * Unassociates all SentLogsAsWord
		 * @return void
		*/ 
		public function UnassociateAllSentLogsAsWord() {
			if ((is_null($this->intWordId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateSentLogAsWord on this unsaved Word.');

			// Get the Database Object for this Class
			$objDatabase = Word::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`submit_word_sent_log`
				SET
					`word_id` = null
				WHERE
					`word_id` = ' . $objDatabase->SqlVariable($this->intWordId) . '
			');
		}

		/**
		 * Deletes an associated SentLogAsWord
		 * @param SentLog $objSentLog
		 * @return void
		*/ 
		public function DeleteAssociatedSentLogAsWord(SentLog $objSentLog) {
			if ((is_null($this->intWordId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateSentLogAsWord on this unsaved Word.');
			if ((is_null($objSentLog->WordSentLogId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateSentLogAsWord on this Word with an unsaved SentLog.');

			// Get the Database Object for this Class
			$objDatabase = Word::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`submit_word_sent_log`
				WHERE
					`word_sent_log_id` = ' . $objDatabase->SqlVariable($objSentLog->WordSentLogId) . ' AND
					`word_id` = ' . $objDatabase->SqlVariable($this->intWordId) . '
			');
		}

		/**
		 * Deletes all associated SentLogsAsWord
		 * @return void
		*/ 
		public function DeleteAllSentLogsAsWord() {
			if ((is_null($this->intWordId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateSentLogAsWord on this unsaved Word.');

			// Get the Database Object for this Class
			$objDatabase = Word::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`submit_word_sent_log`
				WHERE
					`word_id` = ' . $objDatabase->SqlVariable($this->intWordId) . '
			');
		}

			
		
		// Related Objects' Methods for WordStatusLogAsWord
		//-------------------------------------------------------------------

		/**
		 * Gets all associated WordStatusLogsAsWord as an array of WordStatusLog objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return WordStatusLog[]
		*/ 
		public function GetWordStatusLogAsWordArray($objOptionalClauses = null) {
			if ((is_null($this->intWordId)))
				return array();

			try {
				return WordStatusLog::LoadArrayByWordId($this->intWordId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated WordStatusLogsAsWord
		 * @return int
		*/ 
		public function CountWordStatusLogsAsWord() {
			if ((is_null($this->intWordId)))
				return 0;

			return WordStatusLog::CountByWordId($this->intWordId);
		}

		/**
		 * Associates a WordStatusLogAsWord
		 * @param WordStatusLog $objWordStatusLog
		 * @return void
		*/ 
		public function AssociateWordStatusLogAsWord(WordStatusLog $objWordStatusLog) {
			if ((is_null($this->intWordId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateWordStatusLogAsWord on this unsaved Word.');
			if ((is_null($objWordStatusLog->WordStatusLogId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateWordStatusLogAsWord on this Word with an unsaved WordStatusLog.');

			// Get the Database Object for this Class
			$objDatabase = Word::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`submit_word_word_status_log`
				SET
					`word_id` = ' . $objDatabase->SqlVariable($this->intWordId) . '
				WHERE
					`word_status_log_id` = ' . $objDatabase->SqlVariable($objWordStatusLog->WordStatusLogId) . '
			');
		}

		/**
		 * Unassociates a WordStatusLogAsWord
		 * @param WordStatusLog $objWordStatusLog
		 * @return void
		*/ 
		public function UnassociateWordStatusLogAsWord(WordStatusLog $objWordStatusLog) {
			if ((is_null($this->intWordId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateWordStatusLogAsWord on this unsaved Word.');
			if ((is_null($objWordStatusLog->WordStatusLogId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateWordStatusLogAsWord on this Word with an unsaved WordStatusLog.');

			// Get the Database Object for this Class
			$objDatabase = Word::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`submit_word_word_status_log`
				SET
					`word_id` = null
				WHERE
					`word_status_log_id` = ' . $objDatabase->SqlVariable($objWordStatusLog->WordStatusLogId) . ' AND
					`word_id` = ' . $objDatabase->SqlVariable($this->intWordId) . '
			');
		}

		/**
		 * Unassociates all WordStatusLogsAsWord
		 * @return void
		*/ 
		public function UnassociateAllWordStatusLogsAsWord() {
			if ((is_null($this->intWordId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateWordStatusLogAsWord on this unsaved Word.');

			// Get the Database Object for this Class
			$objDatabase = Word::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`submit_word_word_status_log`
				SET
					`word_id` = null
				WHERE
					`word_id` = ' . $objDatabase->SqlVariable($this->intWordId) . '
			');
		}

		/**
		 * Deletes an associated WordStatusLogAsWord
		 * @param WordStatusLog $objWordStatusLog
		 * @return void
		*/ 
		public function DeleteAssociatedWordStatusLogAsWord(WordStatusLog $objWordStatusLog) {
			if ((is_null($this->intWordId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateWordStatusLogAsWord on this unsaved Word.');
			if ((is_null($objWordStatusLog->WordStatusLogId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateWordStatusLogAsWord on this Word with an unsaved WordStatusLog.');

			// Get the Database Object for this Class
			$objDatabase = Word::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`submit_word_word_status_log`
				WHERE
					`word_status_log_id` = ' . $objDatabase->SqlVariable($objWordStatusLog->WordStatusLogId) . ' AND
					`word_id` = ' . $objDatabase->SqlVariable($this->intWordId) . '
			');
		}

		/**
		 * Deletes all associated WordStatusLogsAsWord
		 * @return void
		*/ 
		public function DeleteAllWordStatusLogsAsWord() {
			if ((is_null($this->intWordId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateWordStatusLogAsWord on this unsaved Word.');

			// Get the Database Object for this Class
			$objDatabase = Word::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`submit_word_word_status_log`
				WHERE
					`word_id` = ' . $objDatabase->SqlVariable($this->intWordId) . '
			');
		}





		////////////////////////////////////////
		// METHODS for SOAP-BASED WEB SERVICES
		////////////////////////////////////////

		public static function GetSoapComplexTypeXml() {
			$strToReturn = '<complexType name="Word"><sequence>';
			$strToReturn .= '<element name="WordId" type="xsd:int"/>';
			$strToReturn .= '<element name="Word" type="xsd:string"/>';
			$strToReturn .= '<element name="StatusTypeId" type="xsd:int"/>';
			$strToReturn .= '<element name="ProposalCount" type="xsd:int"/>';
			$strToReturn .= '<element name="LastSent" type="xsd:dateTime"/>';
			$strToReturn .= '<element name="__blnRestored" type="xsd:boolean"/>';
			$strToReturn .= '</sequence></complexType>';
			return $strToReturn;
		}

		public static function AlterSoapComplexTypeArray(&$strComplexTypeArray) {
			if (!array_key_exists('Word', $strComplexTypeArray)) {
				$strComplexTypeArray['Word'] = Word::GetSoapComplexTypeXml();
			}
		}

		public static function GetArrayFromSoapArray($objSoapArray) {
			$objArrayToReturn = array();

			foreach ($objSoapArray as $objSoapObject)
				array_push($objArrayToReturn, Word::GetObjectFromSoapObject($objSoapObject));

			return $objArrayToReturn;
		}

		public static function GetObjectFromSoapObject($objSoapObject) {
			$objToReturn = new Word();
			if (property_exists($objSoapObject, 'WordId'))
				$objToReturn->intWordId = $objSoapObject->WordId;
			if (property_exists($objSoapObject, 'Word'))
				$objToReturn->strWord = $objSoapObject->Word;
			if (property_exists($objSoapObject, 'StatusTypeId'))
				$objToReturn->intStatusTypeId = $objSoapObject->StatusTypeId;
			if (property_exists($objSoapObject, 'ProposalCount'))
				$objToReturn->intProposalCount = $objSoapObject->ProposalCount;
			if (property_exists($objSoapObject, 'LastSent'))
				$objToReturn->dttLastSent = new QDateTime($objSoapObject->LastSent);
			if (property_exists($objSoapObject, '__blnRestored'))
				$objToReturn->__blnRestored = $objSoapObject->__blnRestored;
			return $objToReturn;
		}

		public static function GetSoapArrayFromArray($objArray) {
			if (!$objArray)
				return null;

			$objArrayToReturn = array();

			foreach ($objArray as $objObject)
				array_push($objArrayToReturn, Word::GetSoapObjectFromObject($objObject, true));

			return unserialize(serialize($objArrayToReturn));
		}

		public static function GetSoapObjectFromObject($objObject, $blnBindRelatedObjects) {
			if ($objObject->dttLastSent)
				$objObject->dttLastSent = $objObject->dttLastSent->__toString(QDateTime::FormatSoap);
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
			$iArray['WordId'] = $this->intWordId;
			$iArray['Word'] = $this->strWord;
			$iArray['StatusTypeId'] = $this->intStatusTypeId;
			$iArray['ProposalCount'] = $this->intProposalCount;
			$iArray['LastSent'] = $this->dttLastSent;
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
     * @property-read QQNode $WordId
     * @property-read QQNode $Word
     * @property-read QQNode $StatusTypeId
     * @property-read QQNode $ProposalCount
     * @property-read QQNode $LastSent
     *
     *
     * @property-read QQReverseReferenceNodeSentLog $SentLogAsWord
     * @property-read QQReverseReferenceNodeWordStatusLog $WordStatusLogAsWord

     * @property-read QQNode $_PrimaryKeyNode
     **/
	class QQNodeWord extends QQNode {
		protected $strTableName = 'submit_word_word';
		protected $strPrimaryKey = 'word_id';
		protected $strClassName = 'Word';
		public function __get($strName) {
			switch ($strName) {
				case 'WordId':
					return new QQNode('word_id', 'WordId', 'Integer', $this);
				case 'Word':
					return new QQNode('word', 'Word', 'VarChar', $this);
				case 'StatusTypeId':
					return new QQNode('status_type_id', 'StatusTypeId', 'Integer', $this);
				case 'ProposalCount':
					return new QQNode('proposal_count', 'ProposalCount', 'Integer', $this);
				case 'LastSent':
					return new QQNode('last_sent', 'LastSent', 'DateTime', $this);
				case 'SentLogAsWord':
					return new QQReverseReferenceNodeSentLog($this, 'sentlogasword', 'reverse_reference', 'word_id');
				case 'WordStatusLogAsWord':
					return new QQReverseReferenceNodeWordStatusLog($this, 'wordstatuslogasword', 'reverse_reference', 'word_id');

				case '_PrimaryKeyNode':
					return new QQNode('word_id', 'WordId', 'integer', $this);
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
     * @property-read QQNode $WordId
     * @property-read QQNode $Word
     * @property-read QQNode $StatusTypeId
     * @property-read QQNode $ProposalCount
     * @property-read QQNode $LastSent
     *
     *
     * @property-read QQReverseReferenceNodeSentLog $SentLogAsWord
     * @property-read QQReverseReferenceNodeWordStatusLog $WordStatusLogAsWord

     * @property-read QQNode $_PrimaryKeyNode
     **/
	class QQReverseReferenceNodeWord extends QQReverseReferenceNode {
		protected $strTableName = 'submit_word_word';
		protected $strPrimaryKey = 'word_id';
		protected $strClassName = 'Word';
		public function __get($strName) {
			switch ($strName) {
				case 'WordId':
					return new QQNode('word_id', 'WordId', 'integer', $this);
				case 'Word':
					return new QQNode('word', 'Word', 'string', $this);
				case 'StatusTypeId':
					return new QQNode('status_type_id', 'StatusTypeId', 'integer', $this);
				case 'ProposalCount':
					return new QQNode('proposal_count', 'ProposalCount', 'integer', $this);
				case 'LastSent':
					return new QQNode('last_sent', 'LastSent', 'QDateTime', $this);
				case 'SentLogAsWord':
					return new QQReverseReferenceNodeSentLog($this, 'sentlogasword', 'reverse_reference', 'word_id');
				case 'WordStatusLogAsWord':
					return new QQReverseReferenceNodeWordStatusLog($this, 'wordstatuslogasword', 'reverse_reference', 'word_id');

				case '_PrimaryKeyNode':
					return new QQNode('word_id', 'WordId', 'integer', $this);
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
