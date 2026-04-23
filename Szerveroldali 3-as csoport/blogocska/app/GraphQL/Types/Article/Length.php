<?php declare(strict_types=1);

namespace App\GraphQL\Types\Article;

use App\Models\Article;

final readonly class Length
{
    /** @param  array{}  $args */
    public function __invoke(Article $_, array $args)
    {
        return mb_strlen($_ -> content);
    }
}
