<?php

namespace Modules\Users\Entities;

use Zizaco\Entrust\EntrustPermission;

class Permission extends EntrustPermission{

    protected $fillable = ['name', 'description', 'display_name', 'module'];
    
    public function roles() {

    	return $this->belongsToMany('Modules\Users\Entities\Role', 'app_permission_role');
    }

    public function getModulosOptions()
    {
        return Modulo::lists('descripcion', 'module')->toArray();
    }

}