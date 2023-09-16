<?php

namespace Lcarr\Cqsp\Modules\Users\Query\OfId;

use DateTimeImmutable;
use Exception;

class UserOfId
{
    public function __construct(
        private int $id,
        private string $forename,
        private string $surname,
        private string $email,
        private \DateTimeImmutable $dateOfBirth,
        private bool $active
    )
    {}

    /**
     * @param array $queryResult
     * @return UserOfId
     * @throws Exception
     */
    public static function fromQueryResultArray(array $queryResult): UserOfId
    {
        return new self(
            $queryResult['id'],
            $queryResult['forename'],
            $queryResult['surname'],
            $queryResult['email'],
            new DateTimeImmutable($queryResult['date_of_birth']),
            $queryResult['active']
        );
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getForename(): string
    {
        return $this->forename;
    }

    /**
     * @return string
     */
    public function getSurname(): string
    {
        return $this->surname;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @return \DateTimeImmutable
     */
    public function getDateOfBirth(): \DateTimeImmutable
    {
        return $this->dateOfBirth;
    }

    /**
     * @return bool
     */
    public function isActive(): bool
    {
        return $this->active;
    }
}