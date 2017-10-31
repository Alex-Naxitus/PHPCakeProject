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
        ///Recup coordonn�es
        $email = $reg['email'];
        $password = $reg['password'];
        //Password Hash
        $passHash = md5($password, true);

        $query = $this->find()->select()->where(['email' => $email]);
        if (empty($query->toArray())) {
            /// creation d'une entite user
            $playersTable = TableRegistry::get('players');
            $user = $playersTable->newEntity();
            /// donne les valeurs a l'entit� user
            $user->email = $email;
            $user->password = $passHash;
            /// sauvegarde de user dans la bdd
            if ($playersTable->save($user)) {
                return $user;
            }
        }
        return 1;

    }
}
