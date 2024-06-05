<?php

namespace App\Domain\Driven\User\Model;

class UserInscriptionModel
{
    /**
     * The table associated with the model.
     */
    protected $table = 'inscriptions';

    public function table(): string
    {
        return $this->table;
    }

}
