<?php

return [
    'general'      => 'Server exception',
    'unauthorized' => 'Action not allowed',

    'backend' => [
        'users' => [
            'create'                            => 'Error on user creation',
            'update'                            => 'Error on user updating',
            'delete'                            => 'Error on user deletion',
            'user_cannot_be_edited'             => 'You cannot edit this user',
            'user_cannot_be_disabled'           => 'This user cannot be disabled',
            'user_cannot_be_destroyed'          => 'This user cannot be deleted',
            'user_cannot_be_impersonated'       => 'This user cannot be impersonated',
            'cannot_set_superior_roles'         => 'You cannot attribute roles superior to yours',
        ],

        'roles' => [
            'create' => 'Error on role creation',
            'update' => 'Error on role updating',
            'delete' => 'Error on role deletion',
        ],

        'metas' => [
            'create'        => 'Error on meta creation',
            'update'        => 'Error on meta updating',
            'delete'        => 'Error on meta deletion',
            'already_exist' => 'There is already a meta for this locale route',
        ],

        'form_submissions' => [
            'create' => 'Error on submission creation',
            'delete' => 'Error on submission deletion',
        ],

        'forms' => [
            'create'        => 'Error on form creation',
            'update'        => 'Error on form updating',
            'delete'        => 'Error on form deletion',
            'already_exist' => 'This form already exists',
        ],

        'redirects' => [
            'create'        => 'Error on redirect creation',
            'update'        => 'Error on redirect updating',
            'delete'        => 'Error on redirect deletion',
            'already_exist' => 'There is already a redirect for this path',
        ],

        'posts' => [
            'create' => 'Error on post creation',
            'update' => 'Error on post updating',
            'save'   => 'Error on post saving',
            'delete' => 'Error on post deletion',
        ],
    ],

    'frontend' => [
        'user' => [
            'email_taken'       => 'That e-mail address is already taken.',
            'password_mismatch' => 'That is not your old password.',
            'delete_account'    => 'Error on account deletion.',
            'updating_disabled' => 'Account editing is disabled.',
        ],

        'auth' => [
            'registration_disabled' => 'Registration is disabled.',
        ],
    ],
];
