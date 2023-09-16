<?php

namespace Lcarr\Cqsr\Modules\Users\Command\Register;

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
     * @return RegisteredUser
     * @throws Throwable
     */
    public function handle(Command $command): RegisteredUser
    {
        try {
            $this->pdo->beginTransaction();

            $this->pdo
                ->prepare(
                    'INSERT INTO users (forename, surname, email, date_of_birth, password, active) VALUES (:forename, :surname, :email, :dateOfBirth, :password, 1)'
                )
                ->execute([
                    ':forename' => $command->getForename(),
                    ':surname' => $command->getSurname(),
                    ':email' => $command->getEmail(),
                    ':dateOfBirth' => $command->getDateOfBirth()->format('Y-m-d H:i:s'),
                    ':password' => password_hash($command->getPassword(), PASSWORD_BCRYPT),
                ]);

            $registeredUser = new RegisteredUser(
                $this->pdo->lastInsertId(),
                $command->getForename(),
                $command->getSurname(),
                $command->getEmail(),
                $command->getDateOfBirth(),
            );

            $this->pdo->commit();

            return $registeredUser;
        } catch (Throwable $exception) {
            $this->pdo->rollBack();
            throw $exception;
        }
    }
}