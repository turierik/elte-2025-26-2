<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Pizza;
use App\Models\Topping;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApiController extends Controller
{
    public function task1(){
        return Pizza::all();
    }

    public function task2(string $customer){
        validator(
            ['customer' => $customer],
            ['customer' => 'required|integer']
        ) -> validate();
        $customer = Customer::findOrFail($customer);
        return $customer -> pizzas;
    }

    public function task3(Request $request){
        $validated = $request -> validate([
            'name' => 'string',
            'size' => 'required|integer|in:24,32,50',
            'base' => 'required|string|in:tomato,cream,bbq,none',
            'cheese_crust' => 'boolean',
            'customer_id' => 'required|integer|exists:customers,id'
        ]);
        $validated["name"] ??= null;
        $validated["cheese_crust"] ??= false;
        return Pizza::create($validated);
    }

    public function task4(string $pizza){
        validator(
            ['pizza' => $pizza],
            ['pizza' => 'required|integer']
        ) -> validate();
        $pizza = Pizza::findOrFail($pizza);
        return $pizza -> toppings ->
            map(fn($t) => ["name" => $t -> name, "amount" => $t -> pivot -> amount])
            -> all();
    }

    public function task5(){
        $data = Topping::withSum('pizzas as ordered', 'pizza_topping.amount') -> get();
        foreach ($data as $d){
            $d -> profit = $d -> ordered * $d -> price;
        }
        return $data -> sortByDesc('profit') -> values() -> all();
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

    public function task7(string $pizza, Request $request){
        $pizzaId = $pizza;
        validator(
            ['pizza' => $pizza],
            ['pizza' => 'required|integer']
        ) -> validate();
        $pizza = Pizza::findOrFail($pizza);
        $validated = $request -> validate([
            "toppings" => "required|array",
            "toppings.*" => "integer|distinct|exists:toppings,id"
        ]);
        $pizza -> toppings() -> sync($validated["toppings"]);
        return $this -> task4($pizzaId);
    }
}
