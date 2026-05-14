<?php

namespace App\Policies;

use App\Models\Customer;
use App\Models\Pizza;
use Illuminate\Auth\Access\Response;

class PizzaPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(Customer $customer): bool
    {
        return false;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(Customer $customer, Pizza $pizza): bool
    {
        return false;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(Customer $customer): bool
    {
        return false;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(Customer $customer, Pizza $pizza): bool
    {
        return $pizza -> customer_id === $customer -> id;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(Customer $customer, Pizza $pizza): bool
    {
        return false;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(Customer $customer, Pizza $pizza): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(Customer $customer, Pizza $pizza): bool
    {
        return false;
    }
}
