<?php

namespace App\Repositories;

use App\User as Model;
use Illuminate\Database\Eloquent\Collection;


/**
 * Class ProfileRepository
 *
 * @package App\Repositories
 */
class ProfileRepository extends CoreRepository {

    /**
     * @return string
     */
    public function getModelClass()
    {
        return Model::class;
    }

    public function getProfileInfo()
    {
        return auth()->user();
    }
}
