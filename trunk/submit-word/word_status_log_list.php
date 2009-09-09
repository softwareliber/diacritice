<?php
	// Load the QCubed Development Framework
	require('qcubed.inc.php');

	/**
	 * This is a quick-and-dirty draft QForm object to do the List All functionality
	 * of the WordStatusLog class.  It uses the code-generated
	 * WordStatusLogDataGrid control which has meta-methods to help with
	 * easily creating/defining WordStatusLog columns.
	 *
	 * Any display customizations and presentation-tier logic can be implemented
	 * here by overriding existing or implementing new methods, properties and variables.
	 *
	 * NOTE: This file is overwritten on any code regenerations.  If you want to make
	 * permanent changes, it is STRONGLY RECOMMENDED to move both word_status_log_list.php AND
	 * word_status_log_list.tpl.php out of this Form Drafts directory.
	 *
	 * @package My Application
	 * @subpackage Drafts
	 */
	class WordStatusLogListForm extends QForm {
		// Local instance of the Meta DataGrid to list WordStatusLogs
		protected $dtgWordStatusLogs;

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
			$this->dtgWordStatusLogs = new WordStatusLogDataGrid($this);

			// Style the DataGrid (if desired)
			$this->dtgWordStatusLogs->CssClass = 'datagrid';
			$this->dtgWordStatusLogs->AlternateRowStyle->CssClass = 'alternate';

			// Add Pagination (if desired)
			$this->dtgWordStatusLogs->Paginator = new QPaginator($this->dtgWordStatusLogs);
			$this->dtgWordStatusLogs->ItemsPerPage = 20;

			$strEditPageUrl = __VIRTUAL_DIRECTORY__ . __SUBDIRECTORY__ . '/word_edit.php';

			// Use the MetaDataGrid functionality to add Columns for this datagrid

			// Create the Other Columns (note that you can use strings for submit_word_word_status_log's properties, or you
			// can traverse down QQN::submit_word_word_status_log() to display fields that are down the hierarchy)
			$this->dtgWordStatusLogs->MetaAddColumn('WordStatusLogId', 'Name=Id');
            if (QApplication::$User)
                $this->dtgWordStatusLogs->MetaAddColumn('WordId', 'Name=Cuvânt', 'HtmlEntities=false', 'Html=<?= \'<a href="' . $strEditPageUrl . '/\' . $_ITEM->WordId . \'">\' . $_ITEM->Word->Word . \'</a>\'?>');
            else
                $this->dtgWordStatusLogs->MetaAddColumn(QQN::WordStatusLog()->Word->Word, 'Name=Cuvânt');

			$this->dtgWordStatusLogs->MetaAddTypeColumn('StatusTypeId', 'StatusType', 'Name=Stare');
			$this->dtgWordStatusLogs->MetaAddColumn('ChangedBy', 'Name=Schimbat de');
			$this->dtgWordStatusLogs->MetaAddColumn('ChangedAt', 'Name=Schimbat la');
		}
	}

	// Go ahead and run this form object to generate the page and event handlers, implicitly using
	// word_status_log_list.tpl.php as the included HTML template file
	WordStatusLogListForm::Run('WordStatusLogListForm');
?>