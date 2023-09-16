<?php

namespace Lcarr\Cqsr\Modules\Users\Command\Register;

use DateTimeImmutable;

class Command
{
    /**
     * @param string $forename
     * @param string $surname
     * @param string $email
     * @param DateTimeImmutable $dateOfBirth
     * @param string $password
     */
    public function __construct(
        private string $forename,
        private string $surname,
        private string $email,
        private DateTimeImmutable $dateOfBirth,
        private string $password
    )
    {}

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
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }
}