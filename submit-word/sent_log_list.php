<?php
	// Load the QCubed Development Framework
	require('qcubed.inc.php');

	/**
	 * This is a quick-and-dirty draft QForm object to do the List All functionality
	 * of the SentLog class.  It uses the code-generated
	 * SentLogDataGrid control which has meta-methods to help with
	 * easily creating/defining SentLog columns.
	 *
	 * Any display customizations and presentation-tier logic can be implemented
	 * here by overriding existing or implementing new methods, properties and variables.
	 *
	 * NOTE: This file is overwritten on any code regenerations.  If you want to make
	 * permanent changes, it is STRONGLY RECOMMENDED to move both sent_log_list.php AND
	 * sent_log_list.tpl.php out of this Form Drafts directory.
	 *
	 * @package My Application
	 * @subpackage Drafts
	 */
	class SentLogListForm extends QForm {
		// Local instance of the Meta DataGrid to list SentLogs
		protected $dtgSentLogs;

		// Create QForm Event Handlers as Needed

//		protected function Form_Exit() {}
//		protected function Form_Load() {}
//		protected function Form_PreRender() {}
//		protected function Form_Validate() {}

		protected function Form_Run() {
			// Security check for ALLOW_REMOTE_ADMIN
			// To allow access REGARDLESS of ALLOW_REMOTE_ADMIN, simply remove the line below
			QApplication::CheckRemoteAdmin();
		}

		protected function Form_Create() {
			// Instantiate the Meta DataGrid
			$this->dtgSentLogs = new SentLogDataGrid($this);

			// Style the DataGrid (if desired)
			$this->dtgSentLogs->CssClass = 'datagrid';
			$this->dtgSentLogs->AlternateRowStyle->CssClass = 'alternate';

			// Add Pagination (if desired)
			$this->dtgSentLogs->Paginator = new QPaginator($this->dtgSentLogs);
			$this->dtgSentLogs->ItemsPerPage = 20;

			$strEditPageUrl = __VIRTUAL_DIRECTORY__ . __SUBDIRECTORY__ . '/word_edit.php';

			// Use the MetaDataGrid functionality to add Columns for this datagrid

			// Create the Other Columns (note that you can use strings for submit_word_sent_log's properties, or you
			// can traverse down QQN::submit_word_sent_log() to display fields that are down the hierarchy)
			$this->dtgSentLogs->MetaAddColumn('WordSentLogId', 'Name=Id');
			$this->dtgSentLogs->MetaAddColumn('IpAddress', 'Name=Adresă IP');
			$this->dtgSentLogs->MetaAddColumn('UserAgent', 'Name=Agent de utilizator');
			$this->dtgSentLogs->MetaAddColumn('DateSent', 'Name=Data propunerii');
            if (QApplication::$User)
                $this->dtgSentLogs->MetaAddColumn('WordId', 'Name=Cuvânt', 'HtmlEntities=false', 'Html=<?= \'<a href="' . $strEditPageUrl . '/\' . $_ITEM->WordId . \'">\' . $_ITEM->Word->Word . \'</a>\'?>');
            else
                $this->dtgSentLogs->MetaAddColumn(QQN::SentLog()->Word->Word, 'Name=Cuvânt');
		}
	}

	// Go ahead and run this form object to generate the page and event handlers, implicitly using
	// sent_log_list.tpl.php as the included HTML template file
	SentLogListForm::Run('SentLogListForm');
?>