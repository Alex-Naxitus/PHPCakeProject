<?php
namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class PlayersTable extends Table
{

    public function validationDefault(Validator $validator)
    {
        return $validator
            ->notEmpty('email', "Un nom d'utilisateur est nécessaire")
            ->notEmpty('password', 'Un mot de passe est nécessaire');
    }

	public function register($reg)
    {
        ///Recup coordonnées
        $email = $reg['email'];
        $password = $reg['password'];
        //Password Hash
        $passHash = md5($password, true);

        $query = $this->find()->select()->where(['email' => $email]);
        if (empty($query->toArray())) {
            /// creation d'une entite user
            $playersTable = TableRegistry::get('players');
            $user = $playersTable->newEntity();
            /// donne les valeurs a l'entité user
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
