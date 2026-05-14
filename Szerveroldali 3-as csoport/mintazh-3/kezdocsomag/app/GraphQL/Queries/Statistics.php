<?php declare(strict_types=1);

namespace App\GraphQL\Queries;

use App\Models\Pizza;
use App\Models\Topping;
use App\GraphQL\Types\Pizza\Price;

final readonly class Statistics
{
    /** @param  array{}  $args */
    public function __invoke(null $_, array $args)
    {
        $price = new Price();
        return [
            "pizzaCount" => Pizza::count(),
            "averagePizzaPrice" => Pizza::all() -> map(fn($p) => $price($p, [])) -> avg(),
            "favouriteTopping" => Topping::withSum('pizzas as ordered', 'pizza_topping.amount')
                -> orderByDesc('ordered') -> first()
        ];
    }
}
