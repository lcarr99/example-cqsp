<?php

namespace Lcarr\Cqsr\Modules\Users\Command\Register;

use DateTimeImmutable;

class RegisteredUser
{
    /**
     * @var bool
     */
    private bool $active = true;

    /**
     * @param int $id
     * @param string $forename
     * @param string $surname
     * @param string $email
     * @param DateTimeImmutable $dateOfBirth
     */
    public function __construct(
        private int $id,
        private string $forename,
        private string $surname,
        private string $email,
        private DateTimeImmutable $dateOfBirth
    )
    {}

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
     * @return DateTimeImmutable
     */
    public function getDateOfBirth(): DateTimeImmutable
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