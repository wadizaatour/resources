<?php

return [
    'general'      => 'Server fout',
    'unauthorized' => 'Action not allowed',

    'backend' => [
        'users' => [
            'create'                            => 'Fout tijdens aanmaken gebruiker',
            'update'                           => 'Fout tijdens bijwerken gebruiker',
            'delete'                         => 'Fout tijdens verwijderen gebruiker',
            'user_cannot_be_edited'      => 'You cannot edit super admin user',
            'user_cannot_be_disabled'  =>
                'Deze gebruiker kan niet worden uitgeschakeld.',
            'user_cannot_be_destroyed'  =>
                'Deze gebruiker kan niet worden verwijderd',
            'user_cannot_be_impersonated' =>
                'Er kan niet worden ingelogd als deze gebruiker',
            'cannot_set_superior_roles' =>
                'You cannot attribute roles superior to yours',
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
            'already_exist' => 'There is already a setting linked to this form',
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
