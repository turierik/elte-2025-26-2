<?php declare(strict_types=1);

namespace App\GraphQL\Types\User;

use App\Models\User;

final readonly class ArticleCount
{
    /** @param  array{}  $args */
    public function __invoke(User $_, array $args)
    {
        // TODO implement the resolver
        return $_ -> articles() -> count();

    }
}
