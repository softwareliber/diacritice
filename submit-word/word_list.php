<?php
	// Load the QCubed Development Framework
	require('qcubed.inc.php');

	/**
	 * This is a quick-and-dirty draft QForm object to do the List All functionality
	 * of the Word class.  It uses the code-generated
	 * WordDataGrid control which has meta-methods to help with
	 * easily creating/defining Word columns.
	 *
	 * Any display customizations and presentation-tier logic can be implemented
	 * here by overriding existing or implementing new methods, properties and variables.
	 *
	 * NOTE: This file is overwritten on any code regenerations.  If you want to make
	 * permanent changes, it is STRONGLY RECOMMENDED to move both word_list.php AND
	 * word_list.tpl.php out of this Form Drafts directory.
	 *
	 * @package My Application
	 * @subpackage Drafts
	 */
	class WordListForm extends QForm {
        public $lblMessage;
        public $txtOpenIdUrl;
        public $btnLogin;

		// Local instance of the Meta DataGrid to list Words
		protected $dtgWords;

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
		    if (isset($_GET['logout'])) {
		        session_destroy();
                QApplication::Redirect('word_list.php');
		    }
            $this->lblMessage = new QLabel($this);
            $this->lblMessage->HtmlEntities = false;
            $this->txtOpenIdUrl = new QTextBox($this, 'username');
            $this->txtOpenIdUrl->TabIndex = 1;
            $this->btnLogin = new QButton($this);
            $this->btnLogin->Text = 'Autentificare';
            $this->btnLogin->PrimaryButton = true;
            $this->btnLogin->TabIndex = 3;
            $this->btnLogin->AddAction(new QClickEvent(), new QServerAction('btnLogin_Click'));

            if (isset($_REQUEST['openid_mode'])) {
                require_once "Zend/Auth.php";
                require_once "Zend/Auth/Adapter/OpenId.php";
                require_once "Zend/Auth/Storage/NonPersistent.php";

                $auth = Zend_Auth::getInstance();
                $auth->authenticate(new Zend_Auth_Adapter_OpenId($this->txtOpenIdUrl->Text));

                if ($auth->hasIdentity()) {
                    require_once 'Zend/Session/Namespace.php';
                    $objSession = new Zend_Session_Namespace('SubmitWord');
                    $objSession->User = $auth->getIdentity();

                    QApplication::$User = $auth->getIdentity();
                    QApplication::Redirect('word_list.php');
                }
                else {
                    $this->lblMessage->ForeColor = 'red';
                    $this->lblMessage->Text = 'N-am primit nicio identitate, astea sunt datele primite: ' . var_export($auth, true);
                    return false;
                }
            }

			// Instantiate the Meta DataGrid
			$this->dtgWords = new WordDataGrid($this);

			// Style the DataGrid (if desired)
			$this->dtgWords->CssClass = 'datagrid';
			$this->dtgWords->AlternateRowStyle->CssClass = 'alternate';

			// Add Pagination (if desired)
			$this->dtgWords->Paginator = new QPaginator($this->dtgWords);
			$this->dtgWords->ItemsPerPage = 20;

			$strEditPageUrl = __VIRTUAL_DIRECTORY__ . __SUBDIRECTORY__ . '/word_edit.php';

			// Create the Other Columns (note that you can use strings for submit_word_word's properties, or you
			// can traverse down QQN::submit_word_word() to display fields that are down the hierarchy)
			$this->dtgWords->MetaAddColumn('WordId', 'Name=Id');
			if (QApplication::$User) {
                $this->dtgWords->MetaAddColumn('Word', 'Name=Cuvânt', 'HtmlEntities=false', 'Html=<?= \'<a href="' . $strEditPageUrl . '/\' . $_ITEM->WordId . \'">\' . $_ITEM->Word . \'</a>\'?>');
			}
			else {
			    $this->dtgWords->MetaAddColumn('Word', 'Name=Cuvânt');
			}
			$this->dtgWords->MetaAddTypeColumn('StatusTypeId', 'StatusType', 'Name=Stare');
			$this->dtgWords->MetaAddColumn('ProposalCount', 'Name=Propuneri');
			$this->dtgWords->MetaAddColumn('LastSent', 'Name=Ultima propunere');
		}

        public function btnLogin_Click($strFormId, $strControlId, $strParameter) {
            require_once "Zend/Auth.php";
            require_once "Zend/Auth/Adapter/OpenId.php";
            require_once "Zend/Auth/Storage/NonPersistent.php";

            $this->txtOpenIdUrl->Text = preg_replace('/\/$/', '', $this->txtOpenIdUrl->Text);

            $status = "";
            $auth = Zend_Auth::getInstance();
            $result = $auth->authenticate(new Zend_Auth_Adapter_OpenId($this->txtOpenIdUrl->Text));
            if ($result->isValid()) {
                Zend_OpenId::redirect(Zend_OpenId::selfURL());
            } else {
                $auth->clearIdentity();
                foreach ($result->getMessages() as $message) {
                    $status .= "$message<br>\n";
                }
                $this->lblMessage->ForeColor = 'red';
                $this->lblMessage->Text = 'OpenId: ' . $status;
                return false;
            }
        }

	}

	// Go ahead and run this form object to generate the page and event handlers, implicitly using
	// word_list.tpl.php as the included HTML template file
	WordListForm::Run('WordListForm');
?>