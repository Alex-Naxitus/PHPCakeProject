
<div class="sight form">
<?= $this->Flash->render() ?>
<?= $this->Form->create() ?>
    <fieldset>
        <legend><?= __("Please enter your command") ?></legend>
        <?= $this->Form->control('command') ?>
    </fieldset>
<?= $this->Form->button(__('Enter')); ?>
<?= $this->Form->end() ?>
</div>


<?php echo " level : ".$myfighter->level." - xp : ".$myfighter->xp." - current health : ".$myfighter->current_health."\n"; ?>
<?php echo " - enemy health : ".$efighter->current_health." - enemy level : ".$efighter->level."\n"; ?>

<table>
<tr>
    <th></th>
    <th>1</th> 
    <th>2</th>
	<th>3</th>
	<th>4</th>
	<th>5</th>
	<th>6</th>
	<th>7</th>
	<th>8</th>
    <th>9</th> 
    <th>10</th>
	<th>11</th>
	<th>12</th>
	<th>13</th>
	<th>14</th>
	<th>15</th>
  </tr>
<?php

for($i=1;$i<11;$i++)
{
echo "<tr>"; 


for($j=0;$j<16;$j++)
{
if($j==0 ){
echo "<td>$i</td>";
}

if($j>0){
if($myfighter->coordinate_x==$j && $myfighter->coordinate_y==$i ){echo "<td>X</td>";}
	else{ 

	if($efighter->coordinate_x==$j && $efighter->coordinate_y==$i ){
	if( (sqrt(($myfighter->coordinate_x - $efighter->coordinate_x)*($myfighter->coordinate_x - $efighter->coordinate_x)) <= $myfighter->skill_sight) 
	&& (sqrt(($myfighter->coordinate_y - $efighter->coordinate_y)*($myfighter->coordinate_y - $efighter->coordinate_y)) <= $myfighter->skill_sight)){
	echo "<td>E</td>";}else {echo"<td></td>";}



	}
		else {echo"<td></td>";}

	}
	}



}




echo "</tr>";
}
?>

</table>




