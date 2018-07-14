<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CurrencyPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can create currencies.
     *
     * @param  \App\User  $user
     *
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->getAttribute('is_admin');
    }

    /**
     * Determine whether the user can update the currency.
     *
     * @param  \App\User  $user
     *
     * @return mixed
     */
    public function update(User $user)
    {
        return $user->getAttribute('is_admin');
    }

    /**
     * Determine whether the user can delete the currency.
     *
     * @param  \App\User  $user
     *
     * @return mixed
     */
    public function delete(User $user)
    {
        return $user->getAttribute('is_admin');
    }
}
