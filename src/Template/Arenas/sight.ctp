
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
  </tr>
  <tr>
    <td>1</td>
    <td><? if($myfighter->coordinate_x==1 && $myfighter->coordinate_y==1 ){echo "X";}?></td> 
    <td><? if($myfighter->coordinate_x==2 && $myfighter->coordinate_y==1 ){echo "X";}?></td>
	<td><? if($myfighter->coordinate_x==3 && $myfighter->coordinate_y==1 ){echo "X";}?></td> 
    <td><? if($myfighter->coordinate_x==4 && $myfighter->coordinate_y==1 ){echo "X";}?></td>
	<td><? if($myfighter->coordinate_x==5 && $myfighter->coordinate_y==1 ){echo "X";}?></td> 
    <td><? if($myfighter->coordinate_x==6 && $myfighter->coordinate_y==1 ){echo "X";}?></td>
	<td><? if($myfighter->coordinate_x==7 && $myfighter->coordinate_y==1 ){echo "X";}?></td>
  </tr>
  <tr>
    <td>2</td>
    <td><? if($myfighter->coordinate_x==1 && $myfighter->coordinate_y==2 ){echo "X";}?></td> 
    <td><? if($myfighter->coordinate_x==2 && $myfighter->coordinate_y==2 ){echo "X";}?></td>
	<td><? if($myfighter->coordinate_x==3 && $myfighter->coordinate_y==2 ){echo "X";}?></td> 
    <td><? if($myfighter->coordinate_x==4 && $myfighter->coordinate_y==2 ){echo "X";}?></td>
	<td><? if($myfighter->coordinate_x==5 && $myfighter->coordinate_y==2 ){echo "X";}?></td> 
    <td><? if($myfighter->coordinate_x==6 && $myfighter->coordinate_y==2 ){echo "X";}?></td>
	<td><? if($myfighter->coordinate_x==7 && $myfighter->coordinate_y==2 ){echo "X";}?></td>
  </tr>
  <tr>
    <td>3</td>
    <td><? if($myfighter->coordinate_x==1 && $myfighter->coordinate_y==3 ){echo "X";}?></td> 
    <td><? if($myfighter->coordinate_x==2 && $myfighter->coordinate_y==3 ){echo "X";}?></td>
	<td><? if($myfighter->coordinate_x==3 && $myfighter->coordinate_y==3 ){echo "X";}?></td> 
    <td><? if($myfighter->coordinate_x==4 && $myfighter->coordinate_y==3 ){echo "X";}?></td>
	<td><? if($myfighter->coordinate_x==5 && $myfighter->coordinate_y==3 ){echo "X";}?></td> 
    <td><? if($myfighter->coordinate_x==6 && $myfighter->coordinate_y==3 ){echo "X";}?></td>
	<td><? if($myfighter->coordinate_x==7 && $myfighter->coordinate_y==3 ){echo "X";}?></td>
  </tr>
  <tr>
    <td>4</td>
    <td><? if($myfighter->coordinate_x==1 && $myfighter->coordinate_y==4 ){echo "X";}?></td> 
    <td><? if($myfighter->coordinate_x==2 && $myfighter->coordinate_y==4 ){echo "X";}?></td>
	<td><? if($myfighter->coordinate_x==3 && $myfighter->coordinate_y==4 ){echo "X";}?></td> 
    <td><? if($myfighter->coordinate_x==4 && $myfighter->coordinate_y==4 ){echo "X";}?></td>
	<td><? if($myfighter->coordinate_x==5 && $myfighter->coordinate_y==4 ){echo "X";}?></td> 
    <td><? if($myfighter->coordinate_x==6 && $myfighter->coordinate_y==4 ){echo "X";}?></td>
	<td><? if($myfighter->coordinate_x==7 && $myfighter->coordinate_y==4 ){echo "X";}?></td>
  </tr>
  <tr>
    <td>5</td>
    <td><? if($myfighter->coordinate_x==1 && $myfighter->coordinate_y==5 ){echo "X";}?></td> 
    <td><? if($myfighter->coordinate_x==2 && $myfighter->coordinate_y==5 ){echo "X";}?></td>
	<td><? if($myfighter->coordinate_x==3 && $myfighter->coordinate_y==5 ){echo "X";}?></td> 
	<td><? if($myfighter->coordinate_x==4 && $myfighter->coordinate_y==5 ){echo "X";}?></td> 
    <td><? if($myfighter->coordinate_x==5 && $myfighter->coordinate_y==5 ){echo "X";}?></td>
	<td><? if($myfighter->coordinate_x==6 && $myfighter->coordinate_y==5 ){echo "X";}?></td>
	<td><? if($myfighter->coordinate_x==7 && $myfighter->coordinate_y==5 ){echo "X";}?></td>
  </tr>
  <tr>
    <td>6</td>
    <td><? if($myfighter->coordinate_x==1 && $myfighter->coordinate_y==6 ){echo "X";}?></td> 
    <td><? if($myfighter->coordinate_x==2 && $myfighter->coordinate_y==6 ){echo "X";}?></td>
	<td><? if($myfighter->coordinate_x==3 && $myfighter->coordinate_y==6 ){echo "X";}?></td> 
    <td><? if($myfighter->coordinate_x==4 && $myfighter->coordinate_y==6 ){echo "X";}?></td>
	<td><? if($myfighter->coordinate_x==5 && $myfighter->coordinate_y==6 ){echo "X";}?></td> 
    <td><? if($myfighter->coordinate_x==6 && $myfighter->coordinate_y==6 ){echo "X";}?></td>
	<td><? if($myfighter->coordinate_x==7 && $myfighter->coordinate_y==6 ){echo "X";}?></td>
  </tr>
  <tr>
    <td>7</td>
    <td><? if($myfighter->coordinate_x==1 && $myfighter->coordinate_y==7 ){echo "X";}?></td> 
    <td><? if($myfighter->coordinate_x==2 && $myfighter->coordinate_y==7 ){echo "X";}?></td>
	<td><? if($myfighter->coordinate_x==3 && $myfighter->coordinate_y==7 ){echo "X";}?></td> 
    <td><? if($myfighter->coordinate_x==4 && $myfighter->coordinate_y==7 ){echo "X";}?></td>
	<td><? if($myfighter->coordinate_x==5 && $myfighter->coordinate_y==7 ){echo "X";}?></td> 
	<td><? if($myfighter->coordinate_x==6 && $myfighter->coordinate_y==7 ){echo "X";}?></td>
    <td><? if($myfighter->coordinate_x==7 && $myfighter->coordinate_y==7 ){echo "X";}?></td>
  </tr>
  


</table>