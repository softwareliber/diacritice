var keywordField = null;
var editButton = null;
var definitionField = null;
var definitionDiv = null;
var metaField = null;
var glossaryRemote = null;
var lastKeyword = null;
var isNewKeyword = false;
var isEditing = false;
var isCallInProgress = false;
var isCountFetched = false;

function debug(string) {
//	echo(string + "<br>");
}

function setup() {
	keywordField = document.getElementById("keywordField");
	definitionField = document.getElementById("definitionField");
	metaField = document.getElementById("metaField");
	definitionDiv = document.getElementById("definitionDiv");
	editButton = document.getElementById("editButton");

	keywordField.focus();
	editButton.disabled = true;

	glossaryRemote = new glossary(GlossaryHandler);

	setTimeout("mainLoop()", 10);
}

function search() {
	if (isCallInProgress == true) return;

	if (keywordField.value != lastKeyword) {
		isCallInProgress = true;
		lastKeyword = keywordField.value;
		debug("search()");
		glossaryRemote.search(keywordField.value);

		if (isEditing == false) {
			editButton.disabled = false;
		}
	}
}

function edit(selTerm) {
	keywordField.value = selTerm;
	showDefinitionDiv();
}

function revert(selTerm) {
	definitionField.value = selTerm;
}

function save() {
//	debug("save()" + "\t" +  metaField.value);
	if (isNewKeyword == true && (confirm("Termenul '" + keywordField.value + "' nu exista in glosar.\n Sigur doriti sa il adaugati?") == false)) {
		return;
	}
	hideDefinitionDiv();
	isCallInProgress = true;
	glossaryRemote.save(keywordField.value, definitionField.value + "\t" +  metaField.value);
	definitionField.value = "";
	metaField.value = "";
}

function delete_word() {
//	debug("delete_word()" + "\t" +  metaField.value);
	if (confirm("Doriti sa stergeti complet termenul '" + keywordField.value + "' și istoria modificarilor lui din glosar?") == false) {
		return;
	}
	hideDefinitionDiv();
	isCallInProgress = true;
	glossaryRemote.delete_word(keywordField.value);
	definitionField.value = "";
	metaField.value = "";
}


function cancel() {
	hideDefinitionDiv();
	definitionField.value = "";
	metaField.value = "";
	keywordField.value = lastKeyword;
	lastKeyword = "";
}

function showDefinitionDiv() {
	debug("showDefinitionDiv()");
	if (isCallInProgress == true) {
		setTimeout("showDefinitionDiv()", 300);
		return;
	}
	isCallInProgress = true;
	glossaryRemote.get(keywordField.value);
	definitionDiv.style.display = "block";
	isEditing = true;
	editButton.disabled = true;
	keywordField.disabled = true;
	definitionField.focus();
}

function hideDefinitionDiv() {
	definitionDiv.style.display = "none";
	isEditing = false;
	setTimeout("mainLoop()", 100);
	editButton.disabled = false;
	keywordField.disabled = false;
	keywordField.focus();
}

function echo(string) {
    document.getElementById("results").innerHTML += string;
}

function clear() {
    document.getElementById("results").innerHTML = "";
}

var GlossaryHandler = {
	search: function(result) {
		isCallInProgress = false;
		clear();
		echo(result);
	},

	get: function(result) {
		isCallInProgress = false;
		clear();
		if(typeof(result["definition"]) != "undefined") {
			var arr = result["definition"].split("\t");
			definitionField.value = arr[0];
			metaField.value = arr[1];
			echo(result["history"]);
			isNewKeyword = false;
		} else {
			isNewKeyword = true;
		}
	},

	save: function(result) {
		isCallInProgress = false;
		isCountFetched = false;
		keywordField.value = lastKeyword;
		lastKeyword = "";
	},

	delete_word: function(result) {
		isCallInProgress = false;
		isCountFetched = false;
		keywordField.value = lastKeyword;
		lastKeyword = "";
	},

	getcount: function(result) {
		isCallInProgress = false;
		document.getElementById("count").innerHTML = result;
		isCountFetched = true;
	}
}

mainLoop = function() {
	debug("mainLoop()");

	if (isEditing == true) {
		return;
	}

	if (keywordField.value != "") {
		search();
	} else if (lastKeyword != "") {
		clear();
		lastKeyword = "";
		editButton.disabled = true;
	}

	if (isCallInProgress == false && isCountFetched == false) {
		debug("getCount()");
		isCallInProgress = true;
		glossaryRemote.getcount();
	}

	setTimeout("mainLoop()", 300);
}

