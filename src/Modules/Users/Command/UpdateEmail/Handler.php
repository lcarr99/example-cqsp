<?php

namespace Lcarr\Cqsr\Modules\Users\Command\User\UpdateEmail;

use PDO;
use Throwable;

class Handler
{
    /**
     * @param PDO $pdo
     */
    public function __construct(private PDO $pdo)
    {}

    /**
     * @param Command $command
     * @return bool
     * @throws Throwable
     */
    public function handle(Command $command): bool
    {
        try {
            $this->pdo->beginTransaction();

            $this->pdo
                ->prepare('UPDATE users SET email = :email WHERE id = :id')
                ->execute([
                    ':email' => $command->getNewEmail(),
                    ':id' => $command->getId(),
                ]);

            $this->pdo->commit();

            return true;
        } catch (Throwable $exception) {
            $this->pdo->rollBack();
            throw $exception;
        }
    }
}