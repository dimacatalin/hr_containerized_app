<?php

namespace App\Policies;

use App\Models\Category;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class CategoryPolicy
{
    const ROLE_CREATE = 'category:create';
    const ROLE_INDEX = 'category:index';
    const ROLE_SHOW = 'category:show';
    const ROLE_UPDATE = 'category:update';
    const ROLE_DELETE = 'category:delete';

    public function before($user, $ability)
    {
        if ($user->hasRole(User::USER_ROLE_ADMIN)) {
            return true;
        }
    }

    public function index(User $user)
    {
        return $user->hasPermissionTo(CategoryPolicy::ROLE_INDEX);
    }

    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Category $category): bool
    {
        return $user->hasPermissionTo(CategoryPolicy::ROLE_SHOW);
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasPermissionTo(CategoryPolicy::ROLE_CREATE);
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Category $category): bool
    {
        return $user->hasPermissionTo(CategoryPolicy::ROLE_UPDATE);
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Category $category): bool
    {
        return $user->hasPermissionTo(CategoryPolicy::ROLE_DELETE);
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Category $category): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Category $category): bool
    {
        //
    }
}
