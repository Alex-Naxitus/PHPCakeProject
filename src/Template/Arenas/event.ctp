<?php

if($recentevents != NULL){
echo "<table>";
 foreach($recentevents as $row)
 {	
	echo "<tr>";
	echo "<td>".($row['name'])."</td>";
	echo "<td>".($row['date'])."</td>";
	echo "<td>".($row['coordinate_x'])."</td>";
	echo "<td>".($row['coordinate_y'])."</td>";
	echo "</tr>";
 }
 echo "</table>";
  }

  
  
 else{ echo("no events in the past 24 hours");}
  
  ?>
  
 
 
 
 