<?php
	/**
	 * This is a MetaControl class, providing a QForm or QPanel access to event handlers
	 * and QControls to perform the Create, Edit, and Delete functionality
	 * of the SentLog class.  This code-generated class
	 * contains all the basic elements to help a QPanel or QForm display an HTML form that can
	 * manipulate a single SentLog object.
	 *
	 * To take advantage of some (or all) of these control objects, you
	 * must create a new QForm or QPanel which instantiates a SentLogMetaControl
	 * class.
	 *
	 * Any and all changes to this file will be overwritten with any subsequent
	 * code re-generation.
	 * 
	 * @package My Application
	 * @subpackage MetaControls
	 * property-read SentLog $SentLog the actual SentLog data class being edited
	 * property QLabel $WordSentLogIdControl
	 * property-read QLabel $WordSentLogIdLabel
	 * property QTextBox $IpAddressControl
	 * property-read QLabel $IpAddressLabel
	 * property QTextBox $UserAgentControl
	 * property-read QLabel $UserAgentLabel
	 * property QDateTimePicker $DateSentControl
	 * property-read QLabel $DateSentLabel
	 * property QListBox $WordIdControl
	 * property-read QLabel $WordIdLabel
	 * property-read string $TitleVerb a verb indicating whether or not this is being edited or created
	 * property-read boolean $EditMode a boolean indicating whether or not this is being edited or created
	 */

	class SentLogMetaControlGen extends QBaseClass {
		// General Variables
		protected $objSentLog;
		protected $objParentObject;
		protected $strTitleVerb;
		protected $blnEditMode;

		// Controls that allow the editing of SentLog's individual data fields
		protected $lblWordSentLogId;
		protected $txtIpAddress;
		protected $txtUserAgent;
		protected $calDateSent;
		protected $lstWord;

		// Controls that allow the viewing of SentLog's individual data fields
		protected $lblIpAddress;
		protected $lblUserAgent;
		protected $lblDateSent;
		protected $lblWordId;

		// QListBox Controls (if applicable) to edit Unique ReverseReferences and ManyToMany References

		// QLabel Controls (if applicable) to view Unique ReverseReferences and ManyToMany References


		/**
		 * Main constructor.  Constructor OR static create methods are designed to be called in either
		 * a parent QPanel or the main QForm when wanting to create a
		 * SentLogMetaControl to edit a single SentLog object within the
		 * QPanel or QForm.
		 *
		 * This constructor takes in a single SentLog object, while any of the static
		 * create methods below can be used to construct based off of individual PK ID(s).
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this SentLogMetaControl
		 * @param SentLog $objSentLog new or existing SentLog object
		 */
		 public function __construct($objParentObject, SentLog $objSentLog) {
			// Setup Parent Object (e.g. QForm or QPanel which will be using this SentLogMetaControl)
			$this->objParentObject = $objParentObject;

			// Setup linked SentLog object
			$this->objSentLog = $objSentLog;

			// Figure out if we're Editing or Creating New
			if ($this->objSentLog->__Restored) {
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
		 * @param mixed $objParentObject QForm or QPanel which will be using this SentLogMetaControl
		 * @param integer $intWordSentLogId primary key value
		 * @param QMetaControlCreateType $intCreateType rules governing SentLog object creation - defaults to CreateOrEdit
 		 * @return SentLogMetaControl
		 */
		public static function Create($objParentObject, $intWordSentLogId = null, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			// Attempt to Load from PK Arguments
			if (strlen($intWordSentLogId)) {
				$objSentLog = SentLog::Load($intWordSentLogId);

				// SentLog was found -- return it!
				if ($objSentLog)
					return new SentLogMetaControl($objParentObject, $objSentLog);

				// If CreateOnRecordNotFound not specified, throw an exception
				else if ($intCreateType != QMetaControlCreateType::CreateOnRecordNotFound)
					throw new QCallerException('Could not find a SentLog object with PK arguments: ' . $intWordSentLogId);

			// If EditOnly is specified, throw an exception
			} else if ($intCreateType == QMetaControlCreateType::EditOnly)
				throw new QCallerException('No PK arguments specified');

			// If we are here, then we need to create a new record
			return new SentLogMetaControl($objParentObject, new SentLog());
		}

		/**
		 * Static Helper Method to Create using PathInfo arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this SentLogMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing SentLog object creation - defaults to CreateOrEdit
		 * @return SentLogMetaControl
		 */
		public static function CreateFromPathInfo($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intWordSentLogId = QApplication::PathInfo(0);
			return SentLogMetaControl::Create($objParentObject, $intWordSentLogId, $intCreateType);
		}

		/**
		 * Static Helper Method to Create using QueryString arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this SentLogMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing SentLog object creation - defaults to CreateOrEdit
		 * @return SentLogMetaControl
		 */
		public static function CreateFromQueryString($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intWordSentLogId = QApplication::QueryString('intWordSentLogId');
			return SentLogMetaControl::Create($objParentObject, $intWordSentLogId, $intCreateType);
		}



		///////////////////////////////////////////////
		// PUBLIC CREATE and REFRESH METHODS
		///////////////////////////////////////////////

		/**
		 * Create and setup QLabel lblWordSentLogId
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblWordSentLogId_Create($strControlId = null) {
			$this->lblWordSentLogId = new QLabel($this->objParentObject, $strControlId);
			$this->lblWordSentLogId->Name = QApplication::Translate('Word Sent Log Id');
			if ($this->blnEditMode)
				$this->lblWordSentLogId->Text = $this->objSentLog->WordSentLogId;
			else
				$this->lblWordSentLogId->Text = 'N/A';
			return $this->lblWordSentLogId;
		}

		/**
		 * Create and setup QTextBox txtIpAddress
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtIpAddress_Create($strControlId = null) {
			$this->txtIpAddress = new QTextBox($this->objParentObject, $strControlId);
			$this->txtIpAddress->Name = QApplication::Translate('Ip Address');
			$this->txtIpAddress->Text = $this->objSentLog->IpAddress;
			$this->txtIpAddress->Required = true;
			$this->txtIpAddress->MaxLength = SentLog::IpAddressMaxLength;
			return $this->txtIpAddress;
		}

		/**
		 * Create and setup QLabel lblIpAddress
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblIpAddress_Create($strControlId = null) {
			$this->lblIpAddress = new QLabel($this->objParentObject, $strControlId);
			$this->lblIpAddress->Name = QApplication::Translate('Ip Address');
			$this->lblIpAddress->Text = $this->objSentLog->IpAddress;
			$this->lblIpAddress->Required = true;
			return $this->lblIpAddress;
		}

		/**
		 * Create and setup QTextBox txtUserAgent
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtUserAgent_Create($strControlId = null) {
			$this->txtUserAgent = new QTextBox($this->objParentObject, $strControlId);
			$this->txtUserAgent->Name = QApplication::Translate('User Agent');
			$this->txtUserAgent->Text = $this->objSentLog->UserAgent;
			$this->txtUserAgent->Required = true;
			$this->txtUserAgent->MaxLength = SentLog::UserAgentMaxLength;
			return $this->txtUserAgent;
		}

		/**
		 * Create and setup QLabel lblUserAgent
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblUserAgent_Create($strControlId = null) {
			$this->lblUserAgent = new QLabel($this->objParentObject, $strControlId);
			$this->lblUserAgent->Name = QApplication::Translate('User Agent');
			$this->lblUserAgent->Text = $this->objSentLog->UserAgent;
			$this->lblUserAgent->Required = true;
			return $this->lblUserAgent;
		}

		/**
		 * Create and setup QDateTimePicker calDateSent
		 * @param string $strControlId optional ControlId to use
		 * @return QDateTimePicker
		 */
		public function calDateSent_Create($strControlId = null) {
			$this->calDateSent = new QDateTimePicker($this->objParentObject, $strControlId);
			$this->calDateSent->Name = QApplication::Translate('Date Sent');
			$this->calDateSent->DateTime = $this->objSentLog->DateSent;
			$this->calDateSent->DateTimePickerType = QDateTimePickerType::DateTime;
			$this->calDateSent->Required = true;
			return $this->calDateSent;
		}

		/**
		 * Create and setup QLabel lblDateSent
		 * @param string $strControlId optional ControlId to use
		 * @param string $strDateTimeFormat optional DateTimeFormat to use
		 * @return QLabel
		 */
		public function lblDateSent_Create($strControlId = null, $strDateTimeFormat = null) {
			$this->lblDateSent = new QLabel($this->objParentObject, $strControlId);
			$this->lblDateSent->Name = QApplication::Translate('Date Sent');
			$this->strDateSentDateTimeFormat = $strDateTimeFormat;
			$this->lblDateSent->Text = sprintf($this->objSentLog->DateSent) ? $this->objSentLog->DateSent->__toString($this->strDateSentDateTimeFormat) : null;
			$this->lblDateSent->Required = true;
			return $this->lblDateSent;
		}

		protected $strDateSentDateTimeFormat;


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
				if (($this->objSentLog->Word) && ($this->objSentLog->Word->WordId == $objWord->WordId))
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
			$this->lblWordId->Text = ($this->objSentLog->Word) ? $this->objSentLog->Word->__toString() : null;
			$this->lblWordId->Required = true;
			return $this->lblWordId;
		}



		/**
		 * Refresh this MetaControl with Data from the local SentLog object.
		 * @param boolean $blnReload reload SentLog from the database
		 * @return void
		 */
		public function Refresh($blnReload = false) {
			if ($blnReload)
				$this->objSentLog->Reload();

			if ($this->lblWordSentLogId) if ($this->blnEditMode) $this->lblWordSentLogId->Text = $this->objSentLog->WordSentLogId;

			if ($this->txtIpAddress) $this->txtIpAddress->Text = $this->objSentLog->IpAddress;
			if ($this->lblIpAddress) $this->lblIpAddress->Text = $this->objSentLog->IpAddress;

			if ($this->txtUserAgent) $this->txtUserAgent->Text = $this->objSentLog->UserAgent;
			if ($this->lblUserAgent) $this->lblUserAgent->Text = $this->objSentLog->UserAgent;

			if ($this->calDateSent) $this->calDateSent->DateTime = $this->objSentLog->DateSent;
			if ($this->lblDateSent) $this->lblDateSent->Text = sprintf($this->objSentLog->DateSent) ? $this->objSentLog->DateSent->__toString($this->strDateSentDateTimeFormat) : null;

			if ($this->lstWord) {
					$this->lstWord->RemoveAllItems();
				if (!$this->blnEditMode)
					$this->lstWord->AddItem(QApplication::Translate('- Select One -'), null);
				$objWordArray = Word::LoadAll();
				if ($objWordArray) foreach ($objWordArray as $objWord) {
					$objListItem = new QListItem($objWord->__toString(), $objWord->WordId);
					if (($this->objSentLog->Word) && ($this->objSentLog->Word->WordId == $objWord->WordId))
						$objListItem->Selected = true;
					$this->lstWord->AddItem($objListItem);
				}
			}
			if ($this->lblWordId) $this->lblWordId->Text = ($this->objSentLog->Word) ? $this->objSentLog->Word->__toString() : null;

		}



		///////////////////////////////////////////////
		// PROTECTED UPDATE METHODS for ManyToManyReferences (if any)
		///////////////////////////////////////////////





		///////////////////////////////////////////////
		// PUBLIC SENTLOG OBJECT MANIPULATORS
		///////////////////////////////////////////////

		/**
		 * This will save this object's SentLog instance,
		 * updating only the fields which have had a control created for it.
		 */
		public function SaveSentLog() {
			try {
				// Update any fields for controls that have been created
				if ($this->txtIpAddress) $this->objSentLog->IpAddress = $this->txtIpAddress->Text;
				if ($this->txtUserAgent) $this->objSentLog->UserAgent = $this->txtUserAgent->Text;
				if ($this->calDateSent) $this->objSentLog->DateSent = $this->calDateSent->DateTime;
				if ($this->lstWord) $this->objSentLog->WordId = $this->lstWord->SelectedValue;

				// Update any UniqueReverseReferences (if any) for controls that have been created for it

				// Save the SentLog object
				$this->objSentLog->Save();

				// Finally, update any ManyToManyReferences (if any)
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * This will DELETE this object's SentLog instance from the database.
		 * It will also unassociate itself from any ManyToManyReferences.
		 */
		public function DeleteSentLog() {
			$this->objSentLog->Delete();
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
				case 'SentLog': return $this->objSentLog;
				case 'TitleVerb': return $this->strTitleVerb;
				case 'EditMode': return $this->blnEditMode;

				// Controls that point to SentLog fields -- will be created dynamically if not yet created
				case 'WordSentLogIdControl':
					if (!$this->lblWordSentLogId) return $this->lblWordSentLogId_Create();
					return $this->lblWordSentLogId;
				case 'WordSentLogIdLabel':
					if (!$this->lblWordSentLogId) return $this->lblWordSentLogId_Create();
					return $this->lblWordSentLogId;
				case 'IpAddressControl':
					if (!$this->txtIpAddress) return $this->txtIpAddress_Create();
					return $this->txtIpAddress;
				case 'IpAddressLabel':
					if (!$this->lblIpAddress) return $this->lblIpAddress_Create();
					return $this->lblIpAddress;
				case 'UserAgentControl':
					if (!$this->txtUserAgent) return $this->txtUserAgent_Create();
					return $this->txtUserAgent;
				case 'UserAgentLabel':
					if (!$this->lblUserAgent) return $this->lblUserAgent_Create();
					return $this->lblUserAgent;
				case 'DateSentControl':
					if (!$this->calDateSent) return $this->calDateSent_Create();
					return $this->calDateSent;
				case 'DateSentLabel':
					if (!$this->lblDateSent) return $this->lblDateSent_Create();
					return $this->lblDateSent;
				case 'WordIdControl':
					if (!$this->lstWord) return $this->lstWord_Create();
					return $this->lstWord;
				case 'WordIdLabel':
					if (!$this->lblWordId) return $this->lblWordId_Create();
					return $this->lblWordId;
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
					// Controls that point to SentLog fields
					case 'WordSentLogIdControl':
						return ($this->lblWordSentLogId = QType::Cast($mixValue, 'QControl'));
					case 'IpAddressControl':
						return ($this->txtIpAddress = QType::Cast($mixValue, 'QControl'));
					case 'UserAgentControl':
						return ($this->txtUserAgent = QType::Cast($mixValue, 'QControl'));
					case 'DateSentControl':
						return ($this->calDateSent = QType::Cast($mixValue, 'QControl'));
					case 'WordIdControl':
						return ($this->lstWord = QType::Cast($mixValue, 'QControl'));
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