<?php
namespace App\Controller;
use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\I18n\Time;
use Cake\Event\Event;



/**
* Personal Controller
* User personal interface
*
*/
class ArenasController  extends AppController
{
public function index()
{

}

public function login()
    { 
	
		
		
        if ($this->request->is('post')) {
			
            $user = $this->Auth->identify();
			
            if ($user) {
                $this->Auth->setUser($user);
                return $this->redirect($this->Auth->redirectUrl());
            }
            $this->Flash->error(__('Invalid email or password, try again'));
        }
		
		
		
    }
	
public function add()
    {
        $this->loadModel('Players');
        //$this->Auth->allow(['controller' => 'Arenas','action' => 'login']);
        if ($this->request->is('post')) {
            $user = $this->Players->register($this->request->getData());
            if (empty($user)) {
                $this->Flash->error("Try again");
            } else {
                $this->Flash->success("Succesfully logged in");
                $this->redirect(['controller' => 'Arenas', 'action' => 'fighter']);
            }
        }
    }	 

public function fighter()
{
	$fighterid=1;
	$this->loadModel('Fighters');
	$fighters= TableRegistry :: get('Fighters');
	$fighter = $fighters->get($fighterid);
	$this->set('myfighter',$fighter);
	
	
	if ($this->request->is('post')) {
		$order=$this->request->getData();
		
		if($order['yes']=! NULL )
		{
			if($order['yes']==TRUE )
			{
			$fighter->current_health=5;
			$fighter->skill_sight=2;
			$fighter->skill_strength=1;
			$fighter->level=1;
			$fighter->xp=0;
			$fighters->save($fighter);
			
			$x=3;
			$y=3;
			while($x==3){
				$x=rand(1,15);
			}
			while($y==3){
				$y=rand(1,10);
			}
			$fighter->coordinate_x=$x;
			$fighter->coordinate_y=$y;
			}
			
			$requestData = [
							'name' => "".$fighter->name." REGENERATED",
							'date' =>  Time::now(),
							'coordinate_x' => $fighter->coordinate_x,
							'coordinate_y' => $fighter->coordinate_y
							];
				$this->loadModel('Events');
				$newevent = $this->Events->newEntity($requestData);
				$this->Events->save($newevent);
		}
		
		
		if($order['choice']=! NULL )
		{
		switch($order['choice'])
		{
	
			case 0:
			$fighter->skill_sight=$fighter->skill_sight+1;
			$fighter->current_health=5;
			$fighter->level++;
			$fighters->save($fighter);
			break;
			
			case 1:
			$fighter->skill_strength=$fighter->skill_strength+1;
			$fighter->current_health=5;
			$fighter->level++;
			$fighters->save($fighter);
			break;
			
			case 2:
			$fighter->skill_health=$fighter->skill_health+3;
			$fighter->current_health=5;
			$fighter->level++;
			$fighters->save($fighter);
			break;
			
		}
		}
		
		
		return $this->redirect($this->here);
	}
	
}
public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        $this->Auth->allow(['index','add']);
		
        
    }

public function sight()
{
	$fighterid2=2;
	$this->loadModel('Fighters');
	$this->set('efighter',$this->Fighters->get($fighterid2));
	
	
	$myattack=0;
	
	
	$myattackaction="";
	
	
	
	$fighterid=1;
	$this->loadModel('Fighters');
	$this->set('myfighter',$this->Fighters->get($fighterid));
	if ($this->request->is('post')) {
	$order=$this->request->getData();
	$myfighter2;
	
		switch($order['command']){
			
			case 'UP':
			$fighters= TableRegistry :: get('Fighters');
			$fighter = $fighters->get($fighterid); 
			$myefighter = $fighters->get($fighterid2);
			if($fighter->coordinate_y!=1){
				if(!(($fighter->coordinate_y-1 == $myefighter->coordinate_y) && ($fighter->coordinate_x == $myefighter->coordinate_x)))
				{
				$fighter->coordinate_y = $fighter->coordinate_y-1;
				$myattackaction="".$fighter->name." MOVED UP ";
				}
				if(($fighter->coordinate_y-1 == $myefighter->coordinate_y) && ($fighter->coordinate_x == $myefighter->coordinate_x)){
					
					$myattack= rand(1 ,21);
					
					if( $myattack >(10- $fighter->level + $myefighter->level))
					{
						
						$myefighter->current_health=$myefighter->current_health-$fighter->skill_strength;
						if($myefighter->current_health<=0){
						$fighter->xp=$fighter->xp+$myefighter->level;
						$myefighter->coordinate_x=NULL;
						$myefighter->coordinate_y=NULL;
						$myattackaction="".$fighter->name." KILLED ".$myefighter->name;
						}
						
						else{
						$myattackaction= "".$fighter->name." HIT ".$myefighter->name;
						$fighter->xp++;
						}
						
						$this->Flash->success($myattackaction);
					}
					else
					{
						$myattackaction= "".$fighter->name." MISSED ".$myefighter->name;
						$this->Flash->success($myattackaction);
						
						$fighter->current_health=$fighter->current_health-$myefighter->skill_strength;
						
						if($fighter->current_health<=0){
						$myefighter->xp=$myefighter->xp+$fighter->level;
						$fighter->coordinate_x=NULL;
						$fighter->coordinate_y=NULL;
						$this->Flash->success("You are dead, go to Fighter to regenerate your fighter");
						$myattackaction= "".$myefighter->name." KILLED ".$fighter->name;
						}
						
						
					}
				}
				
				$requestData = [
							'name' => "".$myattackaction,
							'date' =>  Time::now(),
							'coordinate_x' => $fighter->coordinate_x,
							'coordinate_y' => $fighter->coordinate_y
							];
				$this->loadModel('Events');
				$newevent = $this->Events->newEntity($requestData);
				$this->Events->save($newevent);
				
			}
			
			
			
			$fighters->save($myefighter);
 			$fighters->save($fighter);
			
			return $this->redirect($this->here);
			break;
			
			case 'DOWN':
			$fighters= TableRegistry :: get('Fighters');
			$fighter = $fighters->get($fighterid); // Return article with id = $id (primary_key of row which need to get updated)
			$myefighter = $fighters->get($fighterid2);
			if($fighter->coordinate_y!=15){
				if(!(($fighter->coordinate_y+1 == $myefighter->coordinate_y) && ($fighter->coordinate_x == $myefighter->coordinate_x)))
				{
				$fighter->coordinate_y = $fighter->coordinate_y+1;
				$myattackaction="".$fighter->name." MOVED DOWN ";
				}
				if(($fighter->coordinate_y+1 == $myefighter->coordinate_y) && ($fighter->coordinate_x == $myefighter->coordinate_x)){
					
					$myattack= rand(1 ,21);
					
					if( $myattack >(10- $fighter->level + $myefighter->level))
					{
						$myattackaction= "".$fighter->name." HIT ".$myefighter->name;
						$myefighter->current_health=$myefighter->current_health-$fighter->skill_strength;
						if($myefighter->current_health<=0){
						$fighter->xp=$fighter->xp+$myefighter->level;
						$myefighter->coordinate_x=NULL;
						$myefighter->coordinate_y=NULL;
						$this->Flash->success("You killed your enemy");
						$myattackaction="".$fighter->name." KILLED ".$myefighter->name;
						}
						else{
						$myattackaction= "".$fighter->name." HIT ".$myefighter->name;
						$fighter->xp++;
						}
						
						$this->Flash->success($myattackaction);
					}
					else
					{
						$myattackaction= "".$fighter->name." MISSED ".$myefighter->name;
						$this->Flash->success($myattackaction);
						$fighter->current_health=$fighter->current_health-$myefighter->skill_strength;
						
						if($fighter->current_health<=0){
						$myefighter->xp=$myefighter->xp+$fighter->level;
						$fighter->coordinate_x=NULL;
						$fighter->coordinate_y=NULL;
						$this->Flash->success("You are dead, go to Fighter to regenerate your fighter");
						$myattackaction= "".$myefighter->name." KILLED ".$fighter->name;
						}
						
					}
				}
				
				$requestData = [
							'name' => "".$myattackaction,
							'date' =>  Time::now(),
							'coordinate_x' => $fighter->coordinate_x,
							'coordinate_y' => $fighter->coordinate_y
							];
				$this->loadModel('Events');
				$newevent = $this->Events->newEntity($requestData);
				$this->Events->save($newevent);
			}
			$fighters->save($myefighter);
 			$fighters->save($fighter);
			return $this->redirect($this->here);
			break;
			case 'LEFT':
			$fighters= TableRegistry :: get('Fighters');
			$fighter = $fighters->get($fighterid); // Return article with id = $id (primary_key of row which need to get updated)
			$myefighter = $fighters->get($fighterid2);
			if($fighter->coordinate_x!=1){
				if(!(($fighter->coordinate_y == $myefighter->coordinate_y) && ($fighter->coordinate_x-1 == $myefighter->coordinate_x)))
				{
				$fighter->coordinate_x = $fighter->coordinate_x-1;
				$myattackaction="".$fighter->name." MOVED LEFT ";
				}
				if(($fighter->coordinate_y == $myefighter->coordinate_y) && ($fighter->coordinate_x-1 == $myefighter->coordinate_x)){
					
					$myattack= rand(1 ,21);
					
					if( $myattack >(10- $fighter->level + $myefighter->level))
					{
						$myattackaction= "".$fighter->name." HIT ".$myefighter->name;
						$myefighter->current_health=$myefighter->current_health-$fighter->skill_strength;
						if($myefighter->current_health<=0){
						$fighter->xp=$fighter->xp+$myefighter->level;
						$myefighter->coordinate_x=NULL;
						$myefighter->coordinate_y=NULL;
						$this->Flash->success("You killed your enemy");
						$myattackaction="".$fighter->name." KILLED ".$myefighter->name;
						}
						else{
						$myattackaction= "".$fighter->name." HIT ".$myefighter->name;
						$fighter->xp++;
						}
						
						$this->Flash->success($myattackaction);
					}
					else
					{
						$myattackaction= "".$fighter->name." MISSED ".$myefighter->name;
						$this->Flash->success($myattackaction);
						$fighter->current_health=$fighter->current_health-$myefighter->skill_strength;
						
						if($fighter->current_health<=0){
						$myefighter->xp=$myefighter->xp+$fighter->level;
						$fighter->coordinate_x=NULL;
						$fighter->coordinate_y=NULL;
						$this->Flash->success("You are dead, go to Fighter to regenerate your fighter");
						$myattackaction= "".$myefighter->name." KILLED ".$fighter->name;
						}
					}
				}
				
				$requestData = [
							'name' => "".$myattackaction,
							'date' =>  Time::now(),
							'coordinate_x' => $fighter->coordinate_x,
							'coordinate_y' => $fighter->coordinate_y
							];
				$this->loadModel('Events');
				$newevent = $this->Events->newEntity($requestData);
				$this->Events->save($newevent);
				
			}
			$fighters->save($myefighter);
 			$fighters->save($fighter);
			return $this->redirect($this->here);
			break;
			case 'RIGHT':
			$fighters= TableRegistry :: get('Fighters');
			$fighter = $fighters->get($fighterid); // Return article with id = $id (primary_key of row which need to get updated)
			$myefighter = $fighters->get($fighterid2);
			if($fighter->coordinate_x!=10){
				if(!(($fighter->coordinate_y == $myefighter->coordinate_y) && ($fighter->coordinate_x+1 == $myefighter->coordinate_x)))
				{
				$fighter->coordinate_x = $fighter->coordinate_x+1;
				$myattackaction="".$fighter->name." MOVED RIGHT ";
				}
				if(($fighter->coordinate_y == $myefighter->coordinate_y) && ($fighter->coordinate_x+1 == $myefighter->coordinate_x)){
					
					$myattack= rand(1 ,21);
					
					if( $myattack >(10- $fighter->level + $myefighter->level))
					{
						$myefighter->current_health=$myefighter->current_health-$fighter->skill_strength;
						if($myefighter->current_health<=0){
						$fighter->xp=$fighter->xp+$myefighter->level;
						$myefighter->coordinate_x=NULL;
						$myefighter->coordinate_y=NULL;
						$this->Flash->success("You killed your enemy");
						$myattackaction="".$fighter->name." KILLED ".$myefighter->name;
						}
						else{
						$myattackaction= "".$fighter->name." HIT ".$myefighter->name;
						$fighter->xp++;
						}
						
						$this->Flash->success($myattackaction);
					}
					else
					{
						$myattackaction= "Previous action : ".$fighter->name." MISSED ".$myefighter->name;
						$this->Flash->success($myattackaction);
						$fighter->current_health=$fighter->current_health-$myefighter->skill_strength;
						
						if($fighter->current_health<=0){
						$myefighter->xp=$myefighter->xp+$fighter->level;
						$fighter->coordinate_x=NULL;
						$fighter->coordinate_y=NULL;
						$this->Flash->success("You are dead, go to Fighter to regenerate your fighter");
						$myattackaction= "".$myefighter->name." KILLED ".$fighter->name;
						}
					}
				}
				
				$requestData = [
							'name' => "".$myattackaction,
							'date' =>  Time::now(),
							'coordinate_x' => $fighter->coordinate_x,
							'coordinate_y' => $fighter->coordinate_y
							];
				$this->loadModel('Events');
				$newevent = $this->Events->newEntity($requestData);
				$this->Events->save($newevent);
				
			}
			$fighters->save($myefighter);
 			$fighters->save($fighter);
			return $this->redirect($this->here);
			break;
			
		}
    
	}

}

public function event()
{
	$eventid=1;
	
	$this->loadmodel('Events');
	
 $recentevents = $this->Events->find(
  'all',
  array(
    'conditions' => array(
      'Events.date >=' => date('Y-m-d H:i:s', strtotime('-24 hour'))
    )
  )
);

$this->set('recentevents',$recentevents);

}

<<<<<<< HEAD
public function login()
{
	
	$order=$this->request->getData();
	
	$this->loadModel('Users');
	
	if(isset($order['email'])&&isset($order['password'])
	{
		
		$reeluser = $this->Users->find('all',array('conditions' => array('Users.email' => $order['email'], 'Users.password' => $order['password'] )));

		$this->set('recentevents',$reeluser);
		
		
	}
	else
	{
		$this->Flash->success("Email or password field not filled");
		
	}
	

}

=======
>>>>>>> origin/master




}