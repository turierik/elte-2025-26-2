<?php declare(strict_types=1);

namespace App\GraphQL\Queries;

use App\Models\Pizza;
use App\Models\Topping;

final readonly class Statistics
{
    /** @param  array{}  $args */
    public function __invoke(null $_, array $args)
    {
        return [
            "pizzaCount" => Pizza::count(),
            "averagePizzaPrice" => Pizza::all() -> map(fn($p) => $p -> price()) -> avg(),
            "favouriteTopping" => Topping::withSum('pizzas as total_amount', 'pizza_topping.amount')
                -> orderByDesc('total_amount') -> first()
        ];
    }
}
