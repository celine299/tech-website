<?php

namespace App\Policies;

use App\Model\User;
use App\Model\Role;
use Illuminate\Auth\Access\HandlesAuthorization;

class RolePolicy
{
  use HandlesAuthorization;

  /**
   * Determine whether the user can see the roles.
   *
   * @param  \App\Model\User  $user
   * @return boolean
   */
  public function viewAny(User $user)
  {
    return $user->isLead();
  }

  /**
   * Determine whether the user can create roles.
   *
   * @param  \App\Model\User  $user
   * @return boolean
   */
  public function create(User $user)
  {
    return $user->isLead();
  }

  /**
   * Determine whether the user can update the role.
   *
   * @param  \App\Model\User  $user
   * @param  \App\Model\Role  $role
   * @return boolean
   */
  public function update(User $user, Role $role)
  {
    return $user->isLead();
  }
}
