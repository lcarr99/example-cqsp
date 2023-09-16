<?php

namespace Lcarr\Cqsr\Modules\Users\Command\User\UpdateEmail;

class Command
{
    /**
     * @param int $id
     * @param string $newEmail
     */
    public function __construct(
        private int $id,
        private string $newEmail
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
    public function getNewEmail(): string
    {
        return $this->newEmail;
    }
}