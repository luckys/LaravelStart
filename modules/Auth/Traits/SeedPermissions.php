<?php


namespace Modules\Auth\Traits;


trait SeedPermissions {

    /**
     * Formatea el campo slug de los permisos a create.user
     * 
     * @param $action
     * @param $model
     * @return string
     */
    public function formatToSlug($action, $model)
    {
        return $action.'-'.$model;
    }

    /**
     * Formatea el camplo display_name a Create User
     * 
     * @param $action
     * @param $model
     * @return string
     */
    public function formatToCamelCase($action, $model)
    {
        return studly_case($action).' '.studly_case($model);
    }

}