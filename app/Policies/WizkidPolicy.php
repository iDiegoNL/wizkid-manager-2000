<?php

namespace App\Policies;

use App\Models\Wizkid;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class WizkidPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param Wizkid|null $wizkid
     * @return bool
     */
    public function viewAny(?Wizkid $wizkid): bool
    {
        return true;
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param Wizkid|null $visitor
     * @param Wizkid $wizkid
     * @return bool
     */
    public function view(?Wizkid $visitor, Wizkid $wizkid): bool
    {
        return true;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param Wizkid|null $visitor
     * @return bool
     */
    public function create(?Wizkid $visitor): bool
    {
        return true;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param Wizkid|null $visitor
     * @param Wizkid $wizkid
     * @return bool
     */
    public function update(?Wizkid $visitor, Wizkid $wizkid): bool
    {
        return true;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param Wizkid $visitor
     * @param Wizkid $wizkid
     * @return bool
     */
    public function delete(Wizkid $visitor, Wizkid $wizkid): bool
    {
        return $wizkid->fired_at === null
            && $visitor->id !== $wizkid->id;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param Wizkid $visitor
     * @param Wizkid $wizkid
     * @return bool
     */
    public function restore(Wizkid $visitor, Wizkid $wizkid): bool
    {
        return $wizkid->fired_at !== null;
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param Wizkid $visitor
     * @param Wizkid $wizkid
     * @return bool
     */
    public function forceDelete(Wizkid $visitor, Wizkid $wizkid): bool
    {
        return $visitor->id !== $wizkid->id;
    }
}
