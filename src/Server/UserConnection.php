<?php

namespace App\Server;

use App\Entity\User;
use Ratchet\ConnectionInterface;

class UserConnection
{
    /**
     * @var ConnectionInterface
     */
    private $connection;

    /**
     * @var User
     */
    private $user;

    public function __construct(ConnectionInterface $connection)
    {
        $this->connection = $connection;
    }

    public function getConnection(): ConnectionInterface
    {
        return $this->connection;
    }

    public function attachUser(User $user): void
    {
        $this->user = $user;
    }

    public function getUserId(): ?int
    {
        if (!$this->user instanceof User) {
            return null;
        }

        return $this->user->getId();
    }
}
