<?php
	require(__MODEL_GEN__ . '/StatusTypeGen.class.php');

	/**
	 * The StatusType class defined here contains any
	 * customized code for the StatusType enumerated type. 
	 * 
	 * It represents the enumerated values found in the "submit_word_status_type" table in the database,
	 * and extends from the code generated abstract StatusTypeGen
	 * class, which contains all the values extracted from the database.
	 * 
	 * Type classes which are generally used to attach a type to data object.
	 * However, they may be used as simple database indepedant enumerated type.
	 * 
	 * @package My Application
	 * @subpackage DataObjects
	 */
	abstract class StatusType extends StatusTypeGen {
	}
?>