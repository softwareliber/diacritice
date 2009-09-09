<?php
	// This is the HTML template include file (.tpl.php) for the word_edit.php
	// form DRAFT page.  Remember that this is a DRAFT.  It is MEANT to be altered/modified.

	// Be sure to move this out of the generated/ subdirectory before modifying to ensure that subsequent
	// code re-generations do not overwrite your changes.

	$strPageTitle = QApplication::Translate('Word') . ' - ' . $this->mctWord->TitleVerb;
	require(__CONFIGURATION__ . '/header.inc.php');
?>

	<?php $this->RenderBegin() ?>

	<div id="formControls">
		<?php $this->lblWordId->RenderWithName(); ?>

		<?php $this->txtWord->RenderWithName(); ?>

		<?php $this->lstStatusType->RenderWithName(); ?>

		<?php $this->txtProposalCount->RenderWithName(); ?>

		<?php $this->calLastSent->RenderWithName(); ?>

	</div>

	<div id="formActions">
		<div id="save"><?php $this->btnSave->Render(); ?></div>
		<div id="cancel"><?php $this->btnCancel->Render(); ?></div>
		<div id="delete"><?php //$this->btnDelete->Render(); ?></div>
	</div>

	<?php $this->RenderEnd() ?>

<?php require(__CONFIGURATION__ .'/footer.inc.php'); ?>