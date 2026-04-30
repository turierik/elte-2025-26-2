<?php declare(strict_types=1);

namespace App\GraphQL\Types\User;

use App\Models\User;

final readonly class PostCount
{
    /** @param  array{}  $args */
    public function __invoke(User $_, array $args)
    {
        return $_ -> posts() -> count();
    }
}
