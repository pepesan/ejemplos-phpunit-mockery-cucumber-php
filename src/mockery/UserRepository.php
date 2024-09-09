<?php

class UserRepository
{
    protected $users = [
        ['id' => 1, 'email' => 'user@example.com'],
        ['id' => 2, 'email' => 'anotheruser@example.com'],
    ];

    public function findByEmail($email)
    {
        // En una implementación real, aquí iría la lógica para consultar la base de datos.
        foreach ($this->users as $user) {
            if ($user['email'] === $email) {
                return $user;
            }
        }

        return null;  // Retorna null si no se encuentra el usuario.
    }
}

