<?php

/**
 * This file is part of Entrust,
 * a role & permission management solution for Laravel.
 *
 * @license MIT
 * @package Zizaco\Entrust
 */

return [

    /*
    |--------------------------------------------------------------------------
    | Entrust Role Model
    |--------------------------------------------------------------------------
    |
    | This is the Role model used by Entrust to create correct relations.  Update
    | the role if it is in a different namespace.
    |
    */
    'role' => 'Modules\Admin\Models\AdminRoles',

    /*
    |--------------------------------------------------------------------------
    | Entrust Roles Table
    |--------------------------------------------------------------------------
    |
    | This is the roles table used by Entrust to save roles to the database.
    |
    */
    'roles_table' => 'admin_roles',

    /*
    |--------------------------------------------------------------------------
    | Entrust role foreign key
    |--------------------------------------------------------------------------
    |
    | This is the role foreign key used by Entrust to make a proper
    | relation between permissions and roles & roles and users
    |
    */
    'role_foreign_key' => 'admin_roles_id',

    /*
    |--------------------------------------------------------------------------
    | Application User Model
    |--------------------------------------------------------------------------
    |
    | This is the User model used by Entrust to create correct relations.
    | Update the User if it is in a different namespace.
    |
    */
    'user' => 'Modules\Admin\Models\AdminUser',

    /*
    |--------------------------------------------------------------------------
    | Application Users Table
    |--------------------------------------------------------------------------
    |
    | This is the users table used by the application to save users to the
    | database.
    |
    */
    'users_table' => 'admin_user',

    /*
    |--------------------------------------------------------------------------
    | Entrust role_user Table
    |--------------------------------------------------------------------------
    |
    | This is the role_user table used by Entrust to save assigned roles to the
    | database.
    |
    */
    'role_user_table' => 'admin_role_user',

    /*
   |--------------------------------------------------------------------------
   | Entrust user foreign key
   |--------------------------------------------------------------------------
   |
   | This is the user foreign key used by Entrust to make a proper
   | relation between roles and users
   |
   */
    'user_foreign_key' => 'admin_id',

    /*
    |--------------------------------------------------------------------------
    | Entrust Permission Model
    |--------------------------------------------------------------------------
    |
    | This is the Permission model used by Entrust to create correct relations.
    | Update the permission if it is in a different namespace.
    |
    */
    'permission' => 'Modules\Admin\Models\AdminPermissions',

    /*
    |--------------------------------------------------------------------------
    | Entrust Permissions Table
    |--------------------------------------------------------------------------
    |
    | This is the permissions table used by Entrust to save permissions to the
    | database.
    |
    */
    'permissions_table' => 'admin_permissions',

    /*
    |--------------------------------------------------------------------------
    | Entrust permission_role Table
    |--------------------------------------------------------------------------
    |
    | This is the permission_role table used by Entrust to save relationship
    | between permissions and roles to the database.
    |
    */
    'permission_role_table' => 'admin_permission_role',

    /*
    |--------------------------------------------------------------------------
    | Entrust permission foreign key
    |--------------------------------------------------------------------------
    |
    | This is the permission foreign key used by Entrust to make a proper
    | relation between permissions and roles
    |
    */
    'permission_foreign_key' => 'admin_permissions_id',

];
