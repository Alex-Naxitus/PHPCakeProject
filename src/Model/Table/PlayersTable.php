<?php
namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class PlayersTable extends Table
{

    public function validationDefault(Validator $validator)
    {
        return $validator
            ->notEmpty('email', "Un nom d'utilisateur est n�cessaire")
            ->notEmpty('password', 'Un mot de passe est n�cessaire');
    }

	public function register($reg)
    {
        

    }
}
