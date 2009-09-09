<?php
	/**
	 * This is a MetaControl class, providing a QForm or QPanel access to event handlers
	 * and QControls to perform the Create, Edit, and Delete functionality
	 * of the WordStatusLog class.  This code-generated class
	 * contains all the basic elements to help a QPanel or QForm display an HTML form that can
	 * manipulate a single WordStatusLog object.
	 *
	 * To take advantage of some (or all) of these control objects, you
	 * must create a new QForm or QPanel which instantiates a WordStatusLogMetaControl
	 * class.
	 *
	 * Any and all changes to this file will be overwritten with any subsequent
	 * code re-generation.
	 * 
	 * @package My Application
	 * @subpackage MetaControls
	 * property-read WordStatusLog $WordStatusLog the actual WordStatusLog data class being edited
	 * property QLabel $WordStatusLogIdControl
	 * property-read QLabel $WordStatusLogIdLabel
	 * property QListBox $WordIdControl
	 * property-read QLabel $WordIdLabel
	 * property QListBox $StatusTypeIdControl
	 * property-read QLabel $StatusTypeIdLabel
	 * property QTextBox $ChangedByControl
	 * property-read QLabel $ChangedByLabel
	 * property QDateTimePicker $ChangedAtControl
	 * property-read QLabel $ChangedAtLabel
	 * property-read string $TitleVerb a verb indicating whether or not this is being edited or created
	 * property-read boolean $EditMode a boolean indicating whether or not this is being edited or created
	 */

	class WordStatusLogMetaControlGen extends QBaseClass {
		// General Variables
		protected $objWordStatusLog;
		protected $objParentObject;
		protected $strTitleVerb;
		protected $blnEditMode;

		// Controls that allow the editing of WordStatusLog's individual data fields
		protected $lblWordStatusLogId;
		protected $lstWord;
		protected $lstStatusType;
		protected $txtChangedBy;
		protected $calChangedAt;

		// Controls that allow the viewing of WordStatusLog's individual data fields
		protected $lblWordId;
		protected $lblStatusTypeId;
		protected $lblChangedBy;
		protected $lblChangedAt;

		// QListBox Controls (if applicable) to edit Unique ReverseReferences and ManyToMany References

		// QLabel Controls (if applicable) to view Unique ReverseReferences and ManyToMany References


		/**
		 * Main constructor.  Constructor OR static create methods are designed to be called in either
		 * a parent QPanel or the main QForm when wanting to create a
		 * WordStatusLogMetaControl to edit a single WordStatusLog object within the
		 * QPanel or QForm.
		 *
		 * This constructor takes in a single WordStatusLog object, while any of the static
		 * create methods below can be used to construct based off of individual PK ID(s).
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this WordStatusLogMetaControl
		 * @param WordStatusLog $objWordStatusLog new or existing WordStatusLog object
		 */
		 public function __construct($objParentObject, WordStatusLog $objWordStatusLog) {
			// Setup Parent Object (e.g. QForm or QPanel which will be using this WordStatusLogMetaControl)
			$this->objParentObject = $objParentObject;

			// Setup linked WordStatusLog object
			$this->objWordStatusLog = $objWordStatusLog;

			// Figure out if we're Editing or Creating New
			if ($this->objWordStatusLog->__Restored) {
				$this->strTitleVerb = QApplication::Translate('Edit');
				$this->blnEditMode = true;
			} else {
				$this->strTitleVerb = QApplication::Translate('Create');
				$this->blnEditMode = false;
			}
		 }

		/**
		 * Static Helper Method to Create using PK arguments
		 * You must pass in the PK arguments on an object to load, or leave it blank to create a new one.
		 * If you want to load via QueryString or PathInfo, use the CreateFromQueryString or CreateFromPathInfo
		 * static helper methods.  Finally, specify a CreateType to define whether or not we are only allowed to 
		 * edit, or if we are also allowed to create a new one, etc.
		 * 
		 * @param mixed $objParentObject QForm or QPanel which will be using this WordStatusLogMetaControl
		 * @param integer $intWordStatusLogId primary key value
		 * @param QMetaControlCreateType $intCreateType rules governing WordStatusLog object creation - defaults to CreateOrEdit
 		 * @return WordStatusLogMetaControl
		 */
		public static function Create($objParentObject, $intWordStatusLogId = null, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			// Attempt to Load from PK Arguments
			if (strlen($intWordStatusLogId)) {
				$objWordStatusLog = WordStatusLog::Load($intWordStatusLogId);

				// WordStatusLog was found -- return it!
				if ($objWordStatusLog)
					return new WordStatusLogMetaControl($objParentObject, $objWordStatusLog);

				// If CreateOnRecordNotFound not specified, throw an exception
				else if ($intCreateType != QMetaControlCreateType::CreateOnRecordNotFound)
					throw new QCallerException('Could not find a WordStatusLog object with PK arguments: ' . $intWordStatusLogId);

			// If EditOnly is specified, throw an exception
			} else if ($intCreateType == QMetaControlCreateType::EditOnly)
				throw new QCallerException('No PK arguments specified');

			// If we are here, then we need to create a new record
			return new WordStatusLogMetaControl($objParentObject, new WordStatusLog());
		}

		/**
		 * Static Helper Method to Create using PathInfo arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this WordStatusLogMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing WordStatusLog object creation - defaults to CreateOrEdit
		 * @return WordStatusLogMetaControl
		 */
		public static function CreateFromPathInfo($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intWordStatusLogId = QApplication::PathInfo(0);
			return WordStatusLogMetaControl::Create($objParentObject, $intWordStatusLogId, $intCreateType);
		}

		/**
		 * Static Helper Method to Create using QueryString arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this WordStatusLogMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing WordStatusLog object creation - defaults to CreateOrEdit
		 * @return WordStatusLogMetaControl
		 */
		public static function CreateFromQueryString($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intWordStatusLogId = QApplication::QueryString('intWordStatusLogId');
			return WordStatusLogMetaControl::Create($objParentObject, $intWordStatusLogId, $intCreateType);
		}



		///////////////////////////////////////////////
		// PUBLIC CREATE and REFRESH METHODS
		///////////////////////////////////////////////

		/**
		 * Create and setup QLabel lblWordStatusLogId
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblWordStatusLogId_Create($strControlId = null) {
			$this->lblWordStatusLogId = new QLabel($this->objParentObject, $strControlId);
			$this->lblWordStatusLogId->Name = QApplication::Translate('Word Status Log Id');
			if ($this->blnEditMode)
				$this->lblWordStatusLogId->Text = $this->objWordStatusLog->WordStatusLogId;
			else
				$this->lblWordStatusLogId->Text = 'N/A';
			return $this->lblWordStatusLogId;
		}

		/**
		 * Create and setup QListBox lstWord
		 * @param string $strControlId optional ControlId to use
		 * @return QListBox
		 */
		public function lstWord_Create($strControlId = null) {
			$this->lstWord = new QListBox($this->objParentObject, $strControlId);
			$this->lstWord->Name = QApplication::Translate('Word');
			$this->lstWord->Required = true;
			if (!$this->blnEditMode)
				$this->lstWord->AddItem(QApplication::Translate('- Select One -'), null);
			$objWordArray = Word::LoadAll();
			if ($objWordArray) foreach ($objWordArray as $objWord) {
				$objListItem = new QListItem($objWord->__toString(), $objWord->WordId);
				if (($this->objWordStatusLog->Word) && ($this->objWordStatusLog->Word->WordId == $objWord->WordId))
					$objListItem->Selected = true;
				$this->lstWord->AddItem($objListItem);
			}
			return $this->lstWord;
		}

		/**
		 * Create and setup QLabel lblWordId
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblWordId_Create($strControlId = null) {
			$this->lblWordId = new QLabel($this->objParentObject, $strControlId);
			$this->lblWordId->Name = QApplication::Translate('Word');
			$this->lblWordId->Text = ($this->objWordStatusLog->Word) ? $this->objWordStatusLog->Word->__toString() : null;
			$this->lblWordId->Required = true;
			return $this->lblWordId;
		}

		/**
		 * Create and setup QListBox lstStatusType
		 * @param string $strControlId optional ControlId to use
		 * @return QListBox
		 */
		public function lstStatusType_Create($strControlId = null) {
			$this->lstStatusType = new QListBox($this->objParentObject, $strControlId);
			$this->lstStatusType->Name = QApplication::Translate('Status Type');
			$this->lstStatusType->Required = true;
			foreach (StatusType::$NameArray as $intId => $strValue)
				$this->lstStatusType->AddItem(new QListItem($strValue, $intId, $this->objWordStatusLog->StatusTypeId == $intId));
			return $this->lstStatusType;
		}

		/**
		 * Create and setup QLabel lblStatusTypeId
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblStatusTypeId_Create($strControlId = null) {
			$this->lblStatusTypeId = new QLabel($this->objParentObject, $strControlId);
			$this->lblStatusTypeId->Name = QApplication::Translate('Status Type');
			$this->lblStatusTypeId->Text = ($this->objWordStatusLog->StatusTypeId) ? StatusType::$NameArray[$this->objWordStatusLog->StatusTypeId] : null;
			$this->lblStatusTypeId->Required = true;
			return $this->lblStatusTypeId;
		}

		/**
		 * Create and setup QTextBox txtChangedBy
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtChangedBy_Create($strControlId = null) {
			$this->txtChangedBy = new QTextBox($this->objParentObject, $strControlId);
			$this->txtChangedBy->Name = QApplication::Translate('Changed By');
			$this->txtChangedBy->Text = $this->objWordStatusLog->ChangedBy;
			$this->txtChangedBy->Required = true;
			$this->txtChangedBy->MaxLength = WordStatusLog::ChangedByMaxLength;
			return $this->txtChangedBy;
		}

		/**
		 * Create and setup QLabel lblChangedBy
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblChangedBy_Create($strControlId = null) {
			$this->lblChangedBy = new QLabel($this->objParentObject, $strControlId);
			$this->lblChangedBy->Name = QApplication::Translate('Changed By');
			$this->lblChangedBy->Text = $this->objWordStatusLog->ChangedBy;
			$this->lblChangedBy->Required = true;
			return $this->lblChangedBy;
		}

		/**
		 * Create and setup QDateTimePicker calChangedAt
		 * @param string $strControlId optional ControlId to use
		 * @return QDateTimePicker
		 */
		public function calChangedAt_Create($strControlId = null) {
			$this->calChangedAt = new QDateTimePicker($this->objParentObject, $strControlId);
			$this->calChangedAt->Name = QApplication::Translate('Changed At');
			$this->calChangedAt->DateTime = $this->objWordStatusLog->ChangedAt;
			$this->calChangedAt->DateTimePickerType = QDateTimePickerType::DateTime;
			$this->calChangedAt->Required = true;
			return $this->calChangedAt;
		}

		/**
		 * Create and setup QLabel lblChangedAt
		 * @param string $strControlId optional ControlId to use
		 * @param string $strDateTimeFormat optional DateTimeFormat to use
		 * @return QLabel
		 */
		public function lblChangedAt_Create($strControlId = null, $strDateTimeFormat = null) {
			$this->lblChangedAt = new QLabel($this->objParentObject, $strControlId);
			$this->lblChangedAt->Name = QApplication::Translate('Changed At');
			$this->strChangedAtDateTimeFormat = $strDateTimeFormat;
			$this->lblChangedAt->Text = sprintf($this->objWordStatusLog->ChangedAt) ? $this->objWordStatusLog->ChangedAt->__toString($this->strChangedAtDateTimeFormat) : null;
			$this->lblChangedAt->Required = true;
			return $this->lblChangedAt;
		}

		protected $strChangedAtDateTimeFormat;




		/**
		 * Refresh this MetaControl with Data from the local WordStatusLog object.
		 * @param boolean $blnReload reload WordStatusLog from the database
		 * @return void
		 */
		public function Refresh($blnReload = false) {
			if ($blnReload)
				$this->objWordStatusLog->Reload();

			if ($this->lblWordStatusLogId) if ($this->blnEditMode) $this->lblWordStatusLogId->Text = $this->objWordStatusLog->WordStatusLogId;

			if ($this->lstWord) {
					$this->lstWord->RemoveAllItems();
				if (!$this->blnEditMode)
					$this->lstWord->AddItem(QApplication::Translate('- Select One -'), null);
				$objWordArray = Word::LoadAll();
				if ($objWordArray) foreach ($objWordArray as $objWord) {
					$objListItem = new QListItem($objWord->__toString(), $objWord->WordId);
					if (($this->objWordStatusLog->Word) && ($this->objWordStatusLog->Word->WordId == $objWord->WordId))
						$objListItem->Selected = true;
					$this->lstWord->AddItem($objListItem);
				}
			}
			if ($this->lblWordId) $this->lblWordId->Text = ($this->objWordStatusLog->Word) ? $this->objWordStatusLog->Word->__toString() : null;

			if ($this->lstStatusType) $this->lstStatusType->SelectedValue = $this->objWordStatusLog->StatusTypeId;
			if ($this->lblStatusTypeId) $this->lblStatusTypeId->Text = ($this->objWordStatusLog->StatusTypeId) ? StatusType::$NameArray[$this->objWordStatusLog->StatusTypeId] : null;

			if ($this->txtChangedBy) $this->txtChangedBy->Text = $this->objWordStatusLog->ChangedBy;
			if ($this->lblChangedBy) $this->lblChangedBy->Text = $this->objWordStatusLog->ChangedBy;

			if ($this->calChangedAt) $this->calChangedAt->DateTime = $this->objWordStatusLog->ChangedAt;
			if ($this->lblChangedAt) $this->lblChangedAt->Text = sprintf($this->objWordStatusLog->ChangedAt) ? $this->objWordStatusLog->ChangedAt->__toString($this->strChangedAtDateTimeFormat) : null;

		}



		///////////////////////////////////////////////
		// PROTECTED UPDATE METHODS for ManyToManyReferences (if any)
		///////////////////////////////////////////////





		///////////////////////////////////////////////
		// PUBLIC WORDSTATUSLOG OBJECT MANIPULATORS
		///////////////////////////////////////////////

		/**
		 * This will save this object's WordStatusLog instance,
		 * updating only the fields which have had a control created for it.
		 */
		public function SaveWordStatusLog() {
			try {
				// Update any fields for controls that have been created
				if ($this->lstWord) $this->objWordStatusLog->WordId = $this->lstWord->SelectedValue;
				if ($this->lstStatusType) $this->objWordStatusLog->StatusTypeId = $this->lstStatusType->SelectedValue;
				if ($this->txtChangedBy) $this->objWordStatusLog->ChangedBy = $this->txtChangedBy->Text;
				if ($this->calChangedAt) $this->objWordStatusLog->ChangedAt = $this->calChangedAt->DateTime;

				// Update any UniqueReverseReferences (if any) for controls that have been created for it

				// Save the WordStatusLog object
				$this->objWordStatusLog->Save();

				// Finally, update any ManyToManyReferences (if any)
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * This will DELETE this object's WordStatusLog instance from the database.
		 * It will also unassociate itself from any ManyToManyReferences.
		 */
		public function DeleteWordStatusLog() {
			$this->objWordStatusLog->Delete();
		}		



		///////////////////////////////////////////////
		// PUBLIC GETTERS and SETTERS
		///////////////////////////////////////////////

		/**
		 * Override method to perform a property "Get"
		 * This will get the value of $strName
		 *
		 * @param string $strName Name of the property to get
		 * @return mixed
		 */
		public function __get($strName) {
			switch ($strName) {
				// General MetaControlVariables
				case 'WordStatusLog': return $this->objWordStatusLog;
				case 'TitleVerb': return $this->strTitleVerb;
				case 'EditMode': return $this->blnEditMode;

				// Controls that point to WordStatusLog fields -- will be created dynamically if not yet created
				case 'WordStatusLogIdControl':
					if (!$this->lblWordStatusLogId) return $this->lblWordStatusLogId_Create();
					return $this->lblWordStatusLogId;
				case 'WordStatusLogIdLabel':
					if (!$this->lblWordStatusLogId) return $this->lblWordStatusLogId_Create();
					return $this->lblWordStatusLogId;
				case 'WordIdControl':
					if (!$this->lstWord) return $this->lstWord_Create();
					return $this->lstWord;
				case 'WordIdLabel':
					if (!$this->lblWordId) return $this->lblWordId_Create();
					return $this->lblWordId;
				case 'StatusTypeIdControl':
					if (!$this->lstStatusType) return $this->lstStatusType_Create();
					return $this->lstStatusType;
				case 'StatusTypeIdLabel':
					if (!$this->lblStatusTypeId) return $this->lblStatusTypeId_Create();
					return $this->lblStatusTypeId;
				case 'ChangedByControl':
					if (!$this->txtChangedBy) return $this->txtChangedBy_Create();
					return $this->txtChangedBy;
				case 'ChangedByLabel':
					if (!$this->lblChangedBy) return $this->lblChangedBy_Create();
					return $this->lblChangedBy;
				case 'ChangedAtControl':
					if (!$this->calChangedAt) return $this->calChangedAt_Create();
					return $this->calChangedAt;
				case 'ChangedAtLabel':
					if (!$this->lblChangedAt) return $this->lblChangedAt_Create();
					return $this->lblChangedAt;
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
			try {
				switch ($strName) {
					// Controls that point to WordStatusLog fields
					case 'WordStatusLogIdControl':
						return ($this->lblWordStatusLogId = QType::Cast($mixValue, 'QControl'));
					case 'WordIdControl':
						return ($this->lstWord = QType::Cast($mixValue, 'QControl'));
					case 'StatusTypeIdControl':
						return ($this->lstStatusType = QType::Cast($mixValue, 'QControl'));
					case 'ChangedByControl':
						return ($this->txtChangedBy = QType::Cast($mixValue, 'QControl'));
					case 'ChangedAtControl':
						return ($this->calChangedAt = QType::Cast($mixValue, 'QControl'));
					default:
						return parent::__set($strName, $mixValue);
				}
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}
	}
?>