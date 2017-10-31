<?= $this->Flash->render() ?>
<h4>Character sheet</h4>

<dl>
  <dt>name : <?=$myfighter->name?></dt>
  <dd>level :   <?=$myfighter->level?>  </dd>
  <dd>xp :   <?=$myfighter->xp?>  </dd>
  <dd>skill sight :   <?=$myfighter->skill_sight?>  </dd>
  <dd>skill_strength :   <?=$myfighter->skill_strength?>  </dd>
  <dd>skill_health :   <?=$myfighter->skill_health?>  </dd>
  <dd>current_health :   <?=$myfighter->current_health?>  </dd>
  <dd>next_action_time :   <?=$myfighter->next_action_time?>  </dd>
 </dl>
  
<div class="regenerate">

<?php
if($myfighter->current_health==0){
echo $this->Form->create() ;
echo "<fieldset>";
		echo "<legend>Check box and press button to regenerate </legend>";
		echo $this->Form->control('yes', ['type' => 'checkbox']); 
echo "</fieldset>";
echo $this->Form->button(__('Regenerate fighter'));
echo $this->Form->end();
};
?>
</div>

<div class="levelup">
<?php
if($myfighter->xp/4 - $myfighter->level>0){
echo $this->Form->create() ;
echo "<fieldset>";
        echo "<legend>Press button to level up</legend>";
		echo $this->Form->control('choice',['options'=> ['view:+1','force:+1','health:+3'],'type' => 'radio']);
echo "</fieldset>";
echo $this->Form->button(__('Levelup'));
echo $this->Form->end();
}
?>
</div>

