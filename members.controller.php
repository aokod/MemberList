<?php

if (!defined("IN_ESO")) exit;

/**
 * Members controller: fetches a list of members, ready to be displayed
 * in the view.
 */
class members extends Controller {
	
var $view = "../plugins/MemberList/members.view.php";

function init()
{
	global $language, $config;
	
	// Set the title and make sure this page isn't indexed.
	$this->title = $language["All members"];
	$this->eso->addToHead("<meta name='robots' content='noindex, noarchive'/>");
	$this->eso->addCSS("plugins/MemberList/members.css");
	
	$this->unvalidated = $this->eso->db->query("SELECT memberId, name, avatarFormat, IF(color>{$this->eso->skin->numberOfColors},{$this->eso->skin->numberOfColors},color), account, lastSeen, lastAction FROM {$config["tablePrefix"]}members WHERE account='Unvalidated' ORDER BY memberId DESC");
	$this->numUnvalidated = $this->eso->db->numRows($this->unvalidated);

	$this->suspended = $this->eso->db->query("SELECT memberId, name, avatarFormat, IF(color>{$this->eso->skin->numberOfColors},{$this->eso->skin->numberOfColors},color), account, lastSeen, lastAction FROM {$config["tablePrefix"]}members WHERE account='Suspended' ORDER BY memberId DESC");
	$this->numSuspended = $this->eso->db->numRows($this->suspended);

	$this->member = $this->eso->db->query("SELECT memberId, name, avatarFormat, IF(color>{$this->eso->skin->numberOfColors},{$this->eso->skin->numberOfColors},color), account, lastSeen, lastAction FROM {$config["tablePrefix"]}members WHERE account='Member' ORDER BY memberId DESC");
	$this->numMember = $this->eso->db->numRows($this->member);

	$this->moderator = $this->eso->db->query("SELECT memberId, name, avatarFormat, IF(color>{$this->eso->skin->numberOfColors},{$this->eso->skin->numberOfColors},color), account, lastSeen, lastAction FROM {$config["tablePrefix"]}members WHERE account='Moderator' ORDER BY memberId DESC");
	$this->numModerator = $this->eso->db->numRows($this->moderator);

	$this->administrator = $this->eso->db->query("SELECT memberId, name, avatarFormat, IF(color>{$this->eso->skin->numberOfColors},{$this->eso->skin->numberOfColors},color), account, lastSeen, lastAction FROM {$config["tablePrefix"]}members WHERE account='Administrator' ORDER BY memberId DESC");
	$this->numAdministrator = $this->eso->db->numRows($this->administrator);
}
	
}

?>
