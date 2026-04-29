<?php declare(strict_types=1);

namespace App\GraphQL\Mutations;

use App\Models\Tag;

final readonly class CreateTag
{
    /** @param  array{}  $args */
    public function __invoke(null $_, array $args)
    {
        $tag = Tag::create($args);
        return $tag;
    }
}
