<?php

namespace App\Http\Controllers\Auth;

trait Authorizable
{
    private $abilities = [
        'index'   => 'list',
        'edit'    => 'edit',
        'show'    => 'view',
        'update'  => 'edit',
        'create'  => 'add',
        'store'   => 'add',
        'destroy' => 'delete',
        'reports' => 'list',
    ];

    /**
     * Override of callAction to perform the authorization before
     *
     * @param $method
     *
     * @param $parameters
     *
     * @return mixed
     *
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function callAction($method, $parameters)
    {
        if ($ability = $this->getAbility($method)) {
            $this->authorize($ability);
        }

        return parent::callAction($method, $parameters);
    }

    public function getAbility($method)
    {
        $route = request()->route()->getName();
        $route = str_replace('-', '_', $route);
        $routeName = explode('.', $route);
        $action = array_get($this->abilities, $method);

        return $action ? $action . '_' . $routeName[0] : null;
    }
}
