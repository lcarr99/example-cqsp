<?php

namespace Lcarr\Cqsp\Modules\Users\Query\OfId;

use Exception;
use PDO;

class Handler
{
    /**
     * @param PDO $pdo
     */
    public function __construct(private PDO $pdo)
    {}

    /**
     * @param Query $query
     * @return UserOfId
     * @throws Exception
     */
    public function handle(Query $query): UserOfId
    {
        $statement = $this->pdo->prepare(
            'SELECT `id`, `forename`, `surname`, `email`, `date_of_birth`, `active` FROM `users` WHERE `id` = :id'
        );

        $statement->execute([
            ':id' => $query->getId(),
        ]);

        $result = $statement->fetch($this->pdo::FETCH_ASSOC);

        if (!$result) {
            throw new Exception(sprintf('User not found by id %s', $query->getId()));
        }

        return UserOfId::fromQueryResultArray($result);
    }
}