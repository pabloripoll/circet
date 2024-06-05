<?php

namespace App\Domain\Driven\User\Case;

use App\Domain\User;
use App\Database\Client\ClusterA;

class UserInscriptionGetCase
{
    private function table(): string
    {
        return User::inscription()->model()->table();
    }

    public function all()
    {
        $response = new \stdClass;

        $query = "SELECT * FROM ".$this->table();
        $result = (new ClusterA)->select($query);

        if (isset($result['error'])) {
            return $result;
        }

        $list = [];
        if (count($result) > 0) {
            foreach ($result as $row) {
                $list[] = User::inscription()->object()->value($row);
            }
        }
        $response->list = $list;

        return $response;
    }

    public function byId(int $id)
    {
        $query = "SELECT * FROM ".$this->table()." WHERE id='$id'";

        $result = (new ClusterA)->select($query);

        return ! $result ? [] : User::inscription()->object()->value($result[0]);
    }

}
