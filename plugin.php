<?php
// MemberList/plugin.php
// Adds a list of members.

class MemberList extends Plugin {

var $id = "MemberList";
var $name = "MemberList";
var $version = "1.0";
var $description = "Adds a list of members";
var $author = "grntbg";

function init()
{
	global $languages;

	parent::init();

	$this->eso->addLanguage("All members", "All members");
	$this->eso->addLanguage("Suspended members", "Suspended members");
	$this->eso->addLanguage("Regular members", "Regular members");
	$this->eso->addLanguage("Moderators", "Moderators");
	$this->eso->addLanguage("Administrators", "Administrators");
	$this->eso->addMessage("noMembersGroup", "warning", "No members currently exist with this group.");
	
	$this->eso->registerController("members", PATH_PLUGINS."/MemberList/members.controller.php");

	$this->eso->addToBar("right", "<a href='" . makeLink("members") . "' id='membersLink'><span class='button buttonSmall'><input type='submit' value='{$language["Member-plural"]}'></span></a>");

	if ($this->eso->action == "members") $this->eso->addCSS("plugins/MembersList/members.css");
}

}

?>
