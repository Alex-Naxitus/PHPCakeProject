<?php

namespace App\Model\Table;

use Cake\ORM\Table;

class FightersTable extends Table
{
public function test()
{
	return("ok");
}
	
public function getBestFighter() {
	
	$best=$this->find('all')->order(["Fighters.level"=>"DESC"])->first();
	
	return $best->name;
}


}

?>