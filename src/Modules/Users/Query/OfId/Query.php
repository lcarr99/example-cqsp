<?php

namespace Lcarr\Cqsp\Modules\Users\Query\OfId;

class Query
{
    /**
     * @param int $id
     */
    public function __construct(
        private int $id
    )
    {}

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }
}