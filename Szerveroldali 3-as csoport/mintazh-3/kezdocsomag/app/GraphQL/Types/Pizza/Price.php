<?php declare(strict_types=1);

namespace App\GraphQL\Types\Pizza;

use App\Models\Pizza;

final readonly class Price
{
    /** @param  array{}  $args */
    public function __invoke(Pizza $_, array $args)
    {
        return $_ -> size * 100 +
            $_ -> toppings -> map(fn($t) => $t -> price * $t -> pivot -> amount) -> sum();
    }
}
