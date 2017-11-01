
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

<?php

if($myfighter->current_health!=0){

echo " level : ".$myfighter->level." - xp : ".$myfighter->xp." - current health : ".$myfighter->current_health." - strength : ".$myfighter->skill_strength." - sight : ".$myfighter->skill_sight."\n";
echo " - enemy health : ".$efighter->current_health." - enemy level : ".$efighter->level."\n";


echo"<table>";
echo"<tr>";
    echo"<th></th>";
    echo"<th>1</th>"; 
    echo"<th>2</th>";
	echo"<th>3</th>";
	echo"<th>4</th>";
	echo"<th>5</th>";
	echo"<th>6</th>";
	echo"<th>7</th>";
	echo"<th>8</th>";
    echo"<th>9</th>";
    echo"<th>10</th>";
	echo"<th>11</th>";
	echo"<th>12</th>";
	echo"<th>13</th>";
	echo"<th>14</th>";
	echo"<th>15</th>";
echo "</tr>";





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
	
        
        else {
            $test=0;
            for($k=1;$k<12;$k++){
        if(${'tool' . $k}->coordinate_x==$j && ${'tool' . $k}->coordinate_y==$i ){
        if( (sqrt(($myfighter->coordinate_x - ${'tool' . $k}->coordinate_x)*($myfighter->coordinate_x - ${'tool' . $k}->coordinate_x)) <= $myfighter->skill_sight) 
        && (sqrt(($myfighter->coordinate_y - ${'tool' . $k}->coordinate_y)*($myfighter->coordinate_y - ${'tool' . $k}->coordinate_y)) <= $myfighter->skill_sight)){
        echo "<td>".${'tool' . $k}->type."</td>";$test=1;}}}
        
        if($test==0){echo"<td></td>";}
        }
        
        
        
        

        }

	}

}


echo "</tr>";
}



}
else{ 

echo "<h4>Please go to Fighter and generate a new fighter first !</h4>";

}
?>

</table>




