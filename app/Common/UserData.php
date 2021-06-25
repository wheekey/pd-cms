<?php

namespace App\Common;

use Spatie\DataTransferObject\DataTransferObject;

class UserData extends DataTransferObject
{
    public int $id;
    public string $name;
    public string $email;
    public string $password;
}
