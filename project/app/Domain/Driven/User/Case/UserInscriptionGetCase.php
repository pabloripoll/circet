<?php

namespace App\Domain\Driven\User\Case;

use App\Domain\User;
use App\Database\Client\ClusterA;
use App\Domain\Contract\Case\DomainGetCaseInterface;

class UserInscriptionGetCase implements DomainGetCaseInterface
{
    public function object(object | array $result): object | array
    {
        $object = User::inscription()->object();

        if (is_array($result) && count($result) > 0) {
            $list = [];
            foreach ($result as $row) {
                $list[] = $object->value($row);
            }
            return $list;
        }

        return $object->value($result);
    }

    private function table(): string
    {
        return User::inscription()->model()->table();
    }

    public function all()
    {
        $response = new \stdClass;

        $query = "SELECT * FROM ".$this->table()." ORDER BY id DESC";
        $result = (new ClusterA)->select($query);

        if (isset($result['error'])) {
            return $result;
        }

        $response->list = $this->object($result);

        return $response;
    }

    public function byId(int $id)
    {
        $query = "SELECT * FROM ".$this->table()." WHERE id='$id'";
        $result = (new ClusterA)->select($query);

        return ! $result ? null : $this->object($result[0]);
    }

}
