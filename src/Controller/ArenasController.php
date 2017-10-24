<?php
namespace App\Controller;
use App\Controller\AppController;
/**
* Personal Controller
* User personal interface
*
*/
class ArenasController  extends AppController
{
public function index()
{
/*	
$this->loadModel('Fighters');
$figterlist=$this->Fighters->find('all');
pr($figterlist->toArray());

$test1=$this->Fighters->getBestFighter();
$this->set('myname',$test1);
pr($test1);
*/
}


public function fighter()
{
	$fighterid=1;
	$this->loadModel('Fighters');
	$this->set('myfighter',$this->Fighters->get($fighterid));
	
	
	
}

public function sight()
{
	$fighterid=1;
	$this->loadModel('Fighters');
	$this->set('myfighter',$this->Fighters->get($fighterid));
	
	$order=$this->request->getData();
		switch($order){
			
			case 'UP':
			$this->Fighter->create();
			if($this->Fighter->save($this->data))
				{
				$this->data['fighters']['coordinate_y'] = $this->data['fighters']['coordinate_y']-1;
				$this->Fighters->save($this->data);
				}
			break;
			case 'DOWN':
			$this->Fighter->create();
			if($this->Fighter->save($this->data))
				{
				$this->data['fighters']['coordinate_y'] = $this->data['fighters']['coordinate_y']+1;
				$this->Fighters->save($this->data);
				}
			break;
			case 'LEFT':
			$this->Fighter->create();
			if($this->Fighter->save($this->data))
				{
				$this->data['fighters']['coordinate_x'] = $this->data['fighters']['coordinate_y']-1;
				$this->Fighters->save($this->data);
				}
			break;
			case 'RIGHT':
			$this->Fighter->create();
			if($this->Fighter->save($this->data))
				{
				$this->data['fighters']['coordinate_x'] = $this->data['fighters']['coordinate_y']+1;
				$this->Fighters->save($this->data);
				}
			break;
			
			
		}
    

}

public function event()
{
	$eventid=1;
	$this->loadModel('Events');
	$this->set('myevent',$this->Events->get($eventid));

}



}