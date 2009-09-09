<?php
	/**
	 * This is a MetaControl class, providing a QForm or QPanel access to event handlers
	 * and QControls to perform the Create, Edit, and Delete functionality
	 * of the Word class.  This code-generated class
	 * contains all the basic elements to help a QPanel or QForm display an HTML form that can
	 * manipulate a single Word object.
	 *
	 * To take advantage of some (or all) of these control objects, you
	 * must create a new QForm or QPanel which instantiates a WordMetaControl
	 * class.
	 *
	 * Any and all changes to this file will be overwritten with any subsequent
	 * code re-generation.
	 * 
	 * @package My Application
	 * @subpackage MetaControls
	 * property-read Word $Word the actual Word data class being edited
	 * property QLabel $WordIdControl
	 * property-read QLabel $WordIdLabel
	 * property QTextBox $WordControl
	 * property-read QLabel $WordLabel
	 * property QListBox $StatusTypeIdControl
	 * property-read QLabel $StatusTypeIdLabel
	 * property QIntegerTextBox $ProposalCountControl
	 * property-read QLabel $ProposalCountLabel
	 * property QDateTimePicker $LastSentControl
	 * property-read QLabel $LastSentLabel
	 * property-read string $TitleVerb a verb indicating whether or not this is being edited or created
	 * property-read boolean $EditMode a boolean indicating whether or not this is being edited or created
	 */

	class WordMetaControlGen extends QBaseClass {
		// General Variables
		protected $objWord;
		protected $objParentObject;
		protected $strTitleVerb;
		protected $blnEditMode;

		// Controls that allow the editing of Word's individual data fields
		protected $lblWordId;
		protected $txtWord;
		protected $lstStatusType;
		protected $txtProposalCount;
		protected $calLastSent;

		// Controls that allow the viewing of Word's individual data fields
		protected $lblWord;
		protected $lblStatusTypeId;
		protected $lblProposalCount;
		protected $lblLastSent;

		// QListBox Controls (if applicable) to edit Unique ReverseReferences and ManyToMany References

		// QLabel Controls (if applicable) to view Unique ReverseReferences and ManyToMany References


		/**
		 * Main constructor.  Constructor OR static create methods are designed to be called in either
		 * a parent QPanel or the main QForm when wanting to create a
		 * WordMetaControl to edit a single Word object within the
		 * QPanel or QForm.
		 *
		 * This constructor takes in a single Word object, while any of the static
		 * create methods below can be used to construct based off of individual PK ID(s).
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this WordMetaControl
		 * @param Word $objWord new or existing Word object
		 */
		 public function __construct($objParentObject, Word $objWord) {
			// Setup Parent Object (e.g. QForm or QPanel which will be using this WordMetaControl)
			$this->objParentObject = $objParentObject;

			// Setup linked Word object
			$this->objWord = $objWord;

			// Figure out if we're Editing or Creating New
			if ($this->objWord->__Restored) {
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
		 * @param mixed $objParentObject QForm or QPanel which will be using this WordMetaControl
		 * @param integer $intWordId primary key value
		 * @param QMetaControlCreateType $intCreateType rules governing Word object creation - defaults to CreateOrEdit
 		 * @return WordMetaControl
		 */
		public static function Create($objParentObject, $intWordId = null, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			// Attempt to Load from PK Arguments
			if (strlen($intWordId)) {
				$objWord = Word::Load($intWordId);

				// Word was found -- return it!
				if ($objWord)
					return new WordMetaControl($objParentObject, $objWord);

				// If CreateOnRecordNotFound not specified, throw an exception
				else if ($intCreateType != QMetaControlCreateType::CreateOnRecordNotFound)
					throw new QCallerException('Could not find a Word object with PK arguments: ' . $intWordId);

			// If EditOnly is specified, throw an exception
			} else if ($intCreateType == QMetaControlCreateType::EditOnly)
				throw new QCallerException('No PK arguments specified');

			// If we are here, then we need to create a new record
			return new WordMetaControl($objParentObject, new Word());
		}

		/**
		 * Static Helper Method to Create using PathInfo arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this WordMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing Word object creation - defaults to CreateOrEdit
		 * @return WordMetaControl
		 */
		public static function CreateFromPathInfo($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intWordId = QApplication::PathInfo(0);
			return WordMetaControl::Create($objParentObject, $intWordId, $intCreateType);
		}

		/**
		 * Static Helper Method to Create using QueryString arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this WordMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing Word object creation - defaults to CreateOrEdit
		 * @return WordMetaControl
		 */
		public static function CreateFromQueryString($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intWordId = QApplication::QueryString('intWordId');
			return WordMetaControl::Create($objParentObject, $intWordId, $intCreateType);
		}



		///////////////////////////////////////////////
		// PUBLIC CREATE and REFRESH METHODS
		///////////////////////////////////////////////

		/**
		 * Create and setup QLabel lblWordId
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblWordId_Create($strControlId = null) {
			$this->lblWordId = new QLabel($this->objParentObject, $strControlId);
			$this->lblWordId->Name = QApplication::Translate('Word Id');
			if ($this->blnEditMode)
				$this->lblWordId->Text = $this->objWord->WordId;
			else
				$this->lblWordId->Text = 'N/A';
			return $this->lblWordId;
		}

		/**
		 * Create and setup QTextBox txtWord
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtWord_Create($strControlId = null) {
			$this->txtWord = new QTextBox($this->objParentObject, $strControlId);
			$this->txtWord->Name = QApplication::Translate('Word');
			$this->txtWord->Text = $this->objWord->Word;
			$this->txtWord->Required = true;
			$this->txtWord->MaxLength = Word::WordMaxLength;
			return $this->txtWord;
		}

		/**
		 * Create and setup QLabel lblWord
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblWord_Create($strControlId = null) {
			$this->lblWord = new QLabel($this->objParentObject, $strControlId);
			$this->lblWord->Name = QApplication::Translate('Word');
			$this->lblWord->Text = $this->objWord->Word;
			$this->lblWord->Required = true;
			return $this->lblWord;
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
				$this->lstStatusType->AddItem(new QListItem($strValue, $intId, $this->objWord->StatusTypeId == $intId));
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
			$this->lblStatusTypeId->Text = ($this->objWord->StatusTypeId) ? StatusType::$NameArray[$this->objWord->StatusTypeId] : null;
			$this->lblStatusTypeId->Required = true;
			return $this->lblStatusTypeId;
		}

		/**
		 * Create and setup QIntegerTextBox txtProposalCount
		 * @param string $strControlId optional ControlId to use
		 * @return QIntegerTextBox
		 */
		public function txtProposalCount_Create($strControlId = null) {
			$this->txtProposalCount = new QIntegerTextBox($this->objParentObject, $strControlId);
			$this->txtProposalCount->Name = QApplication::Translate('Proposal Count');
			$this->txtProposalCount->Text = $this->objWord->ProposalCount;
			$this->txtProposalCount->Required = true;
			return $this->txtProposalCount;
		}

		/**
		 * Create and setup QLabel lblProposalCount
		 * @param string $strControlId optional ControlId to use
		 * @param string $strFormat optional sprintf format to use
		 * @return QLabel
		 */
		public function lblProposalCount_Create($strControlId = null, $strFormat = null) {
			$this->lblProposalCount = new QLabel($this->objParentObject, $strControlId);
			$this->lblProposalCount->Name = QApplication::Translate('Proposal Count');
			$this->lblProposalCount->Text = $this->objWord->ProposalCount;
			$this->lblProposalCount->Required = true;
			$this->lblProposalCount->Format = $strFormat;
			return $this->lblProposalCount;
		}

		/**
		 * Create and setup QDateTimePicker calLastSent
		 * @param string $strControlId optional ControlId to use
		 * @return QDateTimePicker
		 */
		public function calLastSent_Create($strControlId = null) {
			$this->calLastSent = new QDateTimePicker($this->objParentObject, $strControlId);
			$this->calLastSent->Name = QApplication::Translate('Last Sent');
			$this->calLastSent->DateTime = $this->objWord->LastSent;
			$this->calLastSent->DateTimePickerType = QDateTimePickerType::DateTime;
			$this->calLastSent->Required = true;
			return $this->calLastSent;
		}

		/**
		 * Create and setup QLabel lblLastSent
		 * @param string $strControlId optional ControlId to use
		 * @param string $strDateTimeFormat optional DateTimeFormat to use
		 * @return QLabel
		 */
		public function lblLastSent_Create($strControlId = null, $strDateTimeFormat = null) {
			$this->lblLastSent = new QLabel($this->objParentObject, $strControlId);
			$this->lblLastSent->Name = QApplication::Translate('Last Sent');
			$this->strLastSentDateTimeFormat = $strDateTimeFormat;
			$this->lblLastSent->Text = sprintf($this->objWord->LastSent) ? $this->objWord->LastSent->__toString($this->strLastSentDateTimeFormat) : null;
			$this->lblLastSent->Required = true;
			return $this->lblLastSent;
		}

		protected $strLastSentDateTimeFormat;




		/**
		 * Refresh this MetaControl with Data from the local Word object.
		 * @param boolean $blnReload reload Word from the database
		 * @return void
		 */
		public function Refresh($blnReload = false) {
			if ($blnReload)
				$this->objWord->Reload();

			if ($this->lblWordId) if ($this->blnEditMode) $this->lblWordId->Text = $this->objWord->WordId;

			if ($this->txtWord) $this->txtWord->Text = $this->objWord->Word;
			if ($this->lblWord) $this->lblWord->Text = $this->objWord->Word;

			if ($this->lstStatusType) $this->lstStatusType->SelectedValue = $this->objWord->StatusTypeId;
			if ($this->lblStatusTypeId) $this->lblStatusTypeId->Text = ($this->objWord->StatusTypeId) ? StatusType::$NameArray[$this->objWord->StatusTypeId] : null;

			if ($this->txtProposalCount) $this->txtProposalCount->Text = $this->objWord->ProposalCount;
			if ($this->lblProposalCount) $this->lblProposalCount->Text = $this->objWord->ProposalCount;

			if ($this->calLastSent) $this->calLastSent->DateTime = $this->objWord->LastSent;
			if ($this->lblLastSent) $this->lblLastSent->Text = sprintf($this->objWord->LastSent) ? $this->objWord->LastSent->__toString($this->strLastSentDateTimeFormat) : null;

		}



		///////////////////////////////////////////////
		// PROTECTED UPDATE METHODS for ManyToManyReferences (if any)
		///////////////////////////////////////////////





		///////////////////////////////////////////////
		// PUBLIC WORD OBJECT MANIPULATORS
		///////////////////////////////////////////////

		/**
		 * This will save this object's Word instance,
		 * updating only the fields which have had a control created for it.
		 */
		public function SaveWord() {
			try {
				// Update any fields for controls that have been created
				if ($this->txtWord) $this->objWord->Word = $this->txtWord->Text;
				if ($this->lstStatusType) $this->objWord->StatusTypeId = $this->lstStatusType->SelectedValue;
				if ($this->txtProposalCount) $this->objWord->ProposalCount = $this->txtProposalCount->Text;
				if ($this->calLastSent) $this->objWord->LastSent = $this->calLastSent->DateTime;

				// Update any UniqueReverseReferences (if any) for controls that have been created for it

				// Save the Word object
				$this->objWord->Save();

				// Finally, update any ManyToManyReferences (if any)
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * This will DELETE this object's Word instance from the database.
		 * It will also unassociate itself from any ManyToManyReferences.
		 */
		public function DeleteWord() {
			$this->objWord->Delete();
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
				case 'Word': return $this->objWord;
				case 'TitleVerb': return $this->strTitleVerb;
				case 'EditMode': return $this->blnEditMode;

				// Controls that point to Word fields -- will be created dynamically if not yet created
				case 'WordIdControl':
					if (!$this->lblWordId) return $this->lblWordId_Create();
					return $this->lblWordId;
				case 'WordIdLabel':
					if (!$this->lblWordId) return $this->lblWordId_Create();
					return $this->lblWordId;
				case 'WordControl':
					if (!$this->txtWord) return $this->txtWord_Create();
					return $this->txtWord;
				case 'WordLabel':
					if (!$this->lblWord) return $this->lblWord_Create();
					return $this->lblWord;
				case 'StatusTypeIdControl':
					if (!$this->lstStatusType) return $this->lstStatusType_Create();
					return $this->lstStatusType;
				case 'StatusTypeIdLabel':
					if (!$this->lblStatusTypeId) return $this->lblStatusTypeId_Create();
					return $this->lblStatusTypeId;
				case 'ProposalCountControl':
					if (!$this->txtProposalCount) return $this->txtProposalCount_Create();
					return $this->txtProposalCount;
				case 'ProposalCountLabel':
					if (!$this->lblProposalCount) return $this->lblProposalCount_Create();
					return $this->lblProposalCount;
				case 'LastSentControl':
					if (!$this->calLastSent) return $this->calLastSent_Create();
					return $this->calLastSent;
				case 'LastSentLabel':
					if (!$this->lblLastSent) return $this->lblLastSent_Create();
					return $this->lblLastSent;
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
					// Controls that point to Word fields
					case 'WordIdControl':
						return ($this->lblWordId = QType::Cast($mixValue, 'QControl'));
					case 'WordControl':
						return ($this->txtWord = QType::Cast($mixValue, 'QControl'));
					case 'StatusTypeIdControl':
						return ($this->lstStatusType = QType::Cast($mixValue, 'QControl'));
					case 'ProposalCountControl':
						return ($this->txtProposalCount = QType::Cast($mixValue, 'QControl'));
					case 'LastSentControl':
						return ($this->calLastSent = QType::Cast($mixValue, 'QControl'));
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