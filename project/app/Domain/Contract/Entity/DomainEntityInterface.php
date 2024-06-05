<?php

namespace App\Domain\Contract\Entity;

interface DomainEntityInterface
{
    public function model();

    public function mocking();

    public function object();

    public function validation();

    public function repository();

}