<?php

namespace App\Enums;

enum UserRole: string
{
    case USER = 'user';
    case ADMIN = 'admin';

    /**
     * Get the role name.
     */
    public function getLabel(): string
    {
        return $this->value;
    }
}
