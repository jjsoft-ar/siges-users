<?php

namespace Modules\Users\Repositories;

use JJSoft\SigesCore\EntityGenerator\EntityModel;

class UserEntity
{

    /**
     * get the users entity for the form builder
     * @return mixed
     */
    public function getEntity()
    {
        return EntityModel::where('slug', 'users')->where('namespace', 'app')->first();
    }
}