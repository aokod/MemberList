<?php
/**
 * Members view: displays a list of members.
 */
if(!defined("IN_ESO"))exit;?>

<!-- UNVALIDATED -->
<fieldset id='membersUnvalidated'>
<legend><a href='#' onclick='Settings.toggleFieldset("membersUnvalidated");return false'><?php echo $language["Unvalidated members"];?></a></legend>
<ul class='form' id='membersUnvalidatedForm'>

<?php
// If there are members, list them.
if($this->numUnvalidated):?>

<div id='membersOnline'>
<?php while(list($memberId,$name,$avatarFormat,$color,$account)=$this->eso->db->fetchRow($this->unvalidated)):?>
<div class='p c<?php echo $color;?>'><div class='hdr'>
<div class='thumb'><a href='<?php echo makeLink("profile",$memberId);?>'><img src='<?php echo $this->eso->getAvatar($memberId,$avatarFormat,"thumb");?>' alt=''/></a></div>
<h3><a href='<?php echo makeLink("profile",$memberId);?>'><?php echo $name;?></a></h3>
<?php if(!empty($this->eso->canChangeGroup($memberId, $account))):?><form action='<?php echo curLink();?>' method='post'><div style='display:inline'><select onchange='Conversation.changeMemberGroup(<?php echo $memberId;?>,this.value)' name='group'>
	<?php foreach($this->eso->canChangeGroup($memberId, $account) as $group):?><option value='<?php echo $group;?>'<?php if($group==$account)echo " selected='selected'";?>><?php echo $language[$group];?></option><?php endforeach;?></select></div> <noscript><div style='display:inline'><input name='saveGroup' type='submit' value='Save' class='save'/><input type='hidden' name='member' value='<?php echo $memberId;?>'/></div></noscript></form>
<?php else:?><span><?php echo $language[$account];?></span>
<?php endif;?>
</div></div>
<?php endwhile;?>
</div>

<?php
// Otherwise, display a message.
else:echo $this->eso->htmlMessage("noMembersUnvalidated");endif;?>

</ul></fieldset>
<?php if(!$this->numUnvalidated):?><script type='text/javascript'>Settings.hideFieldset("membersUnvalidated")</script><?php endif;?>

<!-- SUSPENDED -->
<fieldset id='membersSuspended'>
<legend><a href='#' onclick='Settings.toggleFieldset("membersSuspended");return false'><?php echo $language["Suspended members"];?></a></legend>
<ul class='form' id='membersSuspendedForm'>

<?php
// If there are members, list them.
if($this->numSuspended):?>

<div id='membersOnline'>
<?php while(list($memberId,$name,$avatarFormat,$color,$account)=$this->eso->db->fetchRow($this->suspended)):?>
<div class='p c<?php echo $color;?>'><div class='hdr'>
<div class='thumb'><a href='<?php echo makeLink("profile",$memberId);?>'><img src='<?php echo $this->eso->getAvatar($memberId,$avatarFormat,"thumb");?>' alt=''/></a></div>
<h3><a href='<?php echo makeLink("profile",$memberId);?>'><?php echo $name;?></a></h3>
<?php if(!empty($this->eso->canChangeGroup($memberId, $account))):?><form action='<?php echo curLink();?>' method='post'><div style='display:inline'><select onchange='Conversation.changeMemberGroup(<?php echo $memberId;?>,this.value)' name='group'>
	<?php foreach($this->eso->canChangeGroup($memberId, $account) as $group):?><option value='<?php echo $group;?>'<?php if($group==$account)echo " selected='selected'";?>><?php echo $language[$group];?></option><?php endforeach;?></select></div> <noscript><div style='display:inline'><input name='saveGroup' type='submit' value='Save' class='save'/><input type='hidden' name='member' value='<?php echo $memberId;?>'/></div></noscript></form>
<?php else:?><span><?php echo $language[$account];?></span>
<?php endif;?>
</div></div>
<?php endwhile;?>
</div>

<?php
// Otherwise, display a message.
else:echo $this->eso->htmlMessage("noMembersGroup");endif;?>

</ul></fieldset>
<?php if(!$this->numSuspended):?><script type='text/javascript'>Settings.hideFieldset("membersSuspended")</script><?php endif;?>

<!-- REGULAR -->
<fieldset id='membersRegular'>
<legend><a href='#' onclick='Settings.toggleFieldset("membersRegular");return false'><?php echo $language["Regular members"];?></a></legend>
<ul class='form' id='membersRegularForm'>

<?php
// If there are members, list them.
if($this->numMember):?>

<div id='membersOnline'>
<?php while(list($memberId,$name,$avatarFormat,$color,$account,$lastSeen,$lastAction)=$this->eso->db->fetchRow($this->member)):?>
<div class='p c<?php echo $color;?>'><div class='hdr'>
<div class='thumb'><a href='<?php echo makeLink("profile",$memberId);?>'><img src='<?php echo $this->eso->getAvatar($memberId,$avatarFormat,"thumb");?>' alt=''/></a></div>
<h3><a href='<?php echo makeLink("profile",$memberId);?>'><?php echo $name;?></a></h3>
<?php if(!empty($this->eso->canChangeGroup($memberId, $account))):?><form action='<?php echo curLink();?>' method='post'><div style='display:inline'><select onchange='Conversation.changeMemberGroup(<?php echo $memberId;?>,this.value)' name='group'>
	<?php foreach($this->eso->canChangeGroup($memberId, $account) as $group):?><option value='<?php echo $group;?>'<?php if($group==$account)echo " selected='selected'";?>><?php echo $language[$group];?></option><?php endforeach;?></select></div> <noscript><div style='display:inline'><input name='saveGroup' type='submit' value='Save' class='save'/><input type='hidden' name='member' value='<?php echo $memberId;?>'/></div></noscript></form>
<?php else:?><span><?php echo $language[$account];?></span>
<?php endif;?>
</div></div>
<?php endwhile;?>
</div>

<?php
// Otherwise, display a message.
else:echo $this->eso->htmlMessage("noMembersGroup");endif;?>

</ul></fieldset>
<?php if(!$this->numMember):?><script type='text/javascript'>Settings.hideFieldset("membersRegular")</script><?php endif;?>

<!-- MODERATOR -->
<fieldset id='membersModerator'>
<legend><a href='#' onclick='Settings.toggleFieldset("membersModerator");return false'><?php echo $language["Moderators"];?></a></legend>
<ul class='form' id='membersModeratorForm'>

<?php
// If there are moderators, list them.
if($this->numModerator):?>

<div id='membersOnline'>
<?php while(list($memberId,$name,$avatarFormat,$color,$account,$lastSeen,$lastAction)=$this->eso->db->fetchRow($this->moderator)):?>
<div class='p c<?php echo $color;?>'><div class='hdr'>
<div class='thumb'><a href='<?php echo makeLink("profile",$memberId);?>'><img src='<?php echo $this->eso->getAvatar($memberId,$avatarFormat,"thumb");?>' alt=''/></a></div>
<h3><a href='<?php echo makeLink("profile",$memberId);?>'><?php echo $name;?></a></h3>
<?php if(!empty($this->eso->canChangeGroup($memberId, $account))):?><form action='<?php echo curLink();?>' method='post'><div style='display:inline'><select onchange='Conversation.changeMemberGroup(<?php echo $memberId;?>,this.value)' name='group'>
	<?php foreach($this->eso->canChangeGroup($memberId, $account) as $group):?><option value='<?php echo $group;?>'<?php if($group==$account)echo " selected='selected'";?>><?php echo $language[$group];?></option><?php endforeach;?></select></div> <noscript><div style='display:inline'><input name='saveGroup' type='submit' value='Save' class='save'/><input type='hidden' name='member' value='<?php echo $memberId;?>'/></div></noscript></form>
<?php else:?><span><?php echo $language[$account];?></span>
<?php endif;?>
</div></div>
<?php endwhile;?>
</div>

<?php
// Otherwise, display a message.
else:echo $this->eso->htmlMessage("noMembersGroup");endif;?>

</ul></fieldset>
<?php if(!$this->numModerator):?><script type='text/javascript'>Settings.hideFieldset("membersModerator")</script><?php endif;?>

<!-- ADMINISTRATOR -->
<fieldset id="membersAdministrator">
<legend><a href='#' onclick='Settings.toggleFieldset("membersAdministrator");return false'><?php echo $language["Administrators"];?></a></legend>
<ul class='form' id='membersAdministratorForm'>

<?php
// If there are administrators, list them.
if($this->numAdministrator):?>

<div id='membersOnline'>
<?php while(list($memberId,$name,$avatarFormat,$color,$account,$lastSeen,$lastAction)=$this->eso->db->fetchRow($this->administrator)):?>
<div class='p c<?php echo $color;?>'><div class='hdr'>
<div class='thumb'><a href='<?php echo makeLink("profile",$memberId);?>'><img src='<?php echo $this->eso->getAvatar($memberId,$avatarFormat,"thumb");?>' alt=''/></a></div>
<h3><a href='<?php echo makeLink("profile",$memberId);?>'><?php echo $name;?></a></h3>
<?php if(!empty($this->eso->canChangeGroup($memberId, $account))):?><form action='<?php echo curLink();?>' method='post'><div style='display:inline'><select onchange='Conversation.changeMemberGroup(<?php echo $memberId;?>,this.value)' name='group'>
	<?php foreach($this->eso->canChangeGroup($memberId, $account) as $group):?><option value='<?php echo $group;?>'<?php if($group==$account)echo " selected='selected'";?>><?php echo $language[$group];?></option><?php endforeach;?></select></div> <noscript><div style='display:inline'><input name='saveGroup' type='submit' value='Save' class='save'/><input type='hidden' name='member' value='<?php echo $memberId;?>'/></div></noscript></form>
<?php else:?><span><?php echo $language[$account];?></span>
<?php endif;?>
</div></div>
<?php endwhile;?>
</div>

<?php
// Otherwise, display a message.
else:return false;endif;?>

</ul></fieldset>
<?php if(!$this->numAdministrator):?><script type='text/javascript'>Settings.hideFieldset("membersAdministrator")</script><?php endif;?>
