<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePizzaRequest;
use App\Models\Customer;
use App\Models\Pizza;
use App\Models\Topping;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class ApiController extends Controller
{
    public function task1(){
        return Pizza::all() -> toResourceCollection();
    }

    public function task2(string $customer){
        validator(
            ['customer' => $customer],
            ['customer' => 'required|integer']
        ) -> validate();
        $customer = Customer::findOrFail($customer);
        return $customer -> pizzas -> toResourceCollection();
    }

    public function task3(StorePizzaRequest $request){
        $validated = $request -> validated();
        $validated["name"] ??= null;
        $validated["cheese_crust"] ??= false;
        return Pizza::create($validated) -> toResource();
    }

    public function task4(string $pizza){
        validator(
            ['pizza' => $pizza],
            ['pizza' => 'required|integer']
        ) -> validate();
        $pizza = Pizza::findOrFail($pizza);
        return $pizza -> toppings -> map(fn($t) => [
            "name" => $t -> name,
            "amount" => $t -> pivot -> amount
        ]) -> all();
    }

    public function task5(){
        return Topping::withSum('pizzas as ordered', 'pizza_topping.amount') -> get() ->
            each( fn($t) => $t -> profit = $t -> price * $t -> ordered) -> sortByDesc('profit') -> values();
    }

    public function task6(Request $request){
        $validated = $request -> validate([
            'email' => 'required|string|email',
            'password' => 'required|string|min:8'
        ]);
        if (Auth::attempt($validated)){
            $user = Customer::where('email', $validated['email']) -> first();
            $token = $user -> createToken('loginToken');
            return response() -> json(["token" => $token -> plainTextToken], 201);
        } else {
            return response() -> json(["message" => "Login failed."], 401);
        }
    }

    public function task7(Request $request, string $pizza){
        validator(
            ['pizza' => $pizza],
            ['pizza' => 'required|integer']
        ) -> validate();
        $pizza = Pizza::findOrFail($pizza);

        Gate::authorize('update', $pizza);

        $validated = $request -> validate([
            "toppings" => "required|array",
            "toppings.*" => "string|exists:toppings,name"
        ]);

        $toppings = Topping::whereIn('name', $validated["toppings"]) -> get(["name", "id"]);
        $counts = array_count_values($validated["toppings"]);

        $toSync = $toppings -> mapWithKeys(function($item) use ($counts) {
            return [ $item -> id => [ "amount" => $counts[$item -> name] ] ];
        });

        $pizza -> toppings() -> sync($toSync);
        return $this -> task4($pizza -> id);
    }
}
