<?php

namespace App\Domain\Driven\User\Validation;

class UserInscriptionValidation
{
    public $error = [];

    public function error(): array
    {
        return $this->error;
    }

    public function bulk(object $obj): bool
    {
        $r = 0;

        if (isset($obj->id)) {
            $this->id($obj->id) == $obj->id ? : $r++;
        }

        if (isset($obj->uid)) {
            $this->uid($obj->uid) == $obj->uid ? : $r++;
        }

        if (isset($obj->client_id)) {
            $this->client_id($obj->client_id) == $obj->client_id ? : $r++;
        }

        if (isset($obj->is_active)) {
            $this->is_active($obj->is_active) == $obj->is_active ? : $r++;
        }

        if (isset($obj->lang_id)) {
            $this->lang_id($obj->lang_id) == $obj->lang_id ? : $r++;
        }

        if (isset($obj->user)) {
            $this->user($obj->user) == $obj->user ? : $r++;
        }

        if (isset($obj->password)) {
            $this->password($obj->password) == $obj->password ? : $r++;
        }

        if (isset($obj->passquest)) {
            $this->passquest($obj->passquest) == $obj->passquest ? : $r++;
        }

        if (isset($obj->pin)) {
            $this->pin($obj->pin) == $obj->pin ? : $r++;
        }

        if (isset($obj->email)) {
            $this->email($obj->email) == $obj->email ? : $r++;
        }

        if (isset($obj->name)) {
            $this->name($obj->name) == $obj->name ? : $r++;
        }

        if (isset($obj->surname)) {
            $this->surname($obj->surname) == $obj->surname ? : $r++;
        }

        if (isset($obj->phone)) {
            $this->phone($obj->phone) == $obj->phone ? : $r++;
        }

        if (isset($obj->job)) {
            $this->job($obj->job) == $obj->job ? : $r++;
        }

        if (isset($obj->picture)) {
            $this->picture($obj->picture) == $obj->picture ? : $r++;
        }

        if (isset($obj->deleted_at)) {
            $this->deleted_at($obj->deleted_at) == $obj->deleted_at ? : $r++;
        }

        return $r == 0 ? true : false;
    }

    public function id(int $id): int | null
    {
        is_int($id) ? : $this->error['id'] = 'invalid';

        return ! $this->error ? $id : null;
    }

    public function uid(int $uid): int | null
    {
        is_int($uid) ? : $this->error['uid'] = 'invalid';

        return ! $this->error ? $uid : null;
    }

    public function client_id(int $client_id): int | null
    {
        is_int($client_id) ? : $this->error['client_id'] = 'invalid';

        return ! $this->error ? $client_id : null;
    }

    public function is_active(bool $is_active): bool | null
    {
        is_bool($is_active) ? : $this->error['is_active'] = 'invalid';

        return ! $this->error ? $is_active : null;
    }

    public function lang_id(int $lang_id): int | null
    {
        is_int($lang_id) ? : $this->error['lang_id'] = 'invalid';

        return ! $this->error ? $lang_id : null;
    }

    public function user(string $user): string | null
    {
        preg_match('/^[A-Za-z0-9_.@]{8,32}$/', $user) ? : $this->error['user'] = 'invalid';

        return ! $this->error ? $user : null;
    }

    public function password(string $password): string | null // validates input not hashed
    {
        preg_match('/^(?=.*\d)(?=.*[A-Za-z])[A-Za-z0-9:~()?!@#$%]{8,32}$/', $password) ? : $this->error['password'] = 'invalid';

        return ! $this->error ? $password : null;
    }

    public function passquest(string $passquest): string | null
    {
        preg_match('/^[A-Za-z0-9áéíóúÁÉÍÚÓñÑàèìòùÀÈÌÒÙçÇ .\-]{3,128}$/', $passquest) ? : $this->error['passquest'] = 'invalid';

        return ! $this->error ? $passquest : null;
    }

    public function pin(string $pin): string | null
    {
        preg_match('/^[A-Za-z0-9]{4,8}$/', $pin) ? : $this->error['pin'] = 'invalid';

        return ! $this->error ? $pin : null;
    }

    public function email(string $email): string | null
    {
        preg_match('/^[A-Za-z0-9@_.]{8,64}$/', $email) && filter_var($email, FILTER_VALIDATE_EMAIL) !== false ? : $this->error['email'] = 'invalid';

        return ! $this->error ? $email : null;
    }

    public function name(string $name): string | null
    {
        preg_match('/^[A-Za-z0-9áéíóúÁÉÍÚÓñÑàèìòùÀÈÌÒÙçÇ .\-]{3,64}$/', $name) ? : $this->error['name'] = 'invalid';

        return ! $this->error ? $name : null;
    }

    public function surname(string $surname): string | null
    {
        preg_match('/^[A-Za-z0-9áéíóúÁÉÍÚÓñÑàèìòùÀÈÌÒÙçÇ .\-]{3,64}$/', $surname) ? : $this->error['surname'] = 'invalid';

        return ! $this->error ? $surname : null;
    }

    public function phone(string $phone): string | null
    {
        preg_match('/^[A-Za-z0-9 #+.\/\-]{8,64}$/', $phone) ? : $this->error['phone'] = 'invalid';

        return ! $this->error ? $phone : null;
    }

    public function job(string $job): string | null
    {
        preg_match('/^[A-Za-z0-9áéíóúÁÉÍÚÓñÑàèìòùÀÈÌÒÙçÇ .\-]{3,64}$/', $job) ? : $this->error['job'] = 'invalid';

        return ! $this->error ? $job : null;
    }

    public function picture(string $picture): string | null
    {
        filter_var($picture, FILTER_VALIDATE_URL) !== false ? : $this->error['picture'] = 'invalid';

        return ! $this->error ? $picture : null;
    }

    public function deleted_at(string $deleted_at): string | null
    {
        return $deleted_at;
    }

}
