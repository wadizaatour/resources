<?php

return [
    'access' => [
        'backend' => [
            'display_name' => 'Backend toegang',
            'description'  => 'Heeft toegang tot backend paginas.',
        ],
    ],

    'categories'  => [
        'access'     => 'Toegang',
        'catalog'    => 'Catalogus',
        'categories' => 'Categorieën',
        'cms'        => 'Content',
        'companies'  => 'Bedrijven',
        'content'    => 'Content',
        'form'       => 'Forms',
        'listing'    => 'Listing',
        //'seo'        => 'SEO',
        //'subscriptions' => 'Abonnementen'
    ],

    'create' => [
        'cars' => [
            'display_name' => 'Create cars',
            'description'  => 'Can create cars.',
        ],

        'categories' => [
            'display_name' => 'Create categories',
            'description'  => 'Can create categories.',
        ],

        'companies' => [
            'display_name' => 'Create companies',
            'description'  => 'Can create companies.',
        ],

        'forms' => [
            'display_name' => 'Create forms',
            'description'  => 'Can create forms.',
        ],

        'parts' => [
            'display_name' => 'Create parts',
            'description'  => 'Can create parts.',
        ],

        'roles' => [
            'display_name' => 'Create roles',
            'description'  => 'Can create roles.',
        ],

        'users' => [
            'display_name' => 'Create users',
            'description'  => 'Can create users.',
        ],

        //'metas' => [
        //    'display_name' => 'Create metas',
        //    'description'  => 'Can create metas.',
        //],

        //'posts' => [
        //    'display_name' => 'Create posts',
        //    'description'  => 'Can create all posts.',
        //],

        //'redirects' => [
        //    'display_name' => 'Create redirects',
        //    'description'  => 'Can create redirects.',
        //],

        //'subscriptions' => [
        //    'display_name' => 'Create subscriptions',
        //    'description'  => 'Can create all subscriptions.',
        //],
    ],

    'delete' => [
        'cars' => [
            'display_name' => 'Delete cars',
            'description'  => 'Can delete cars.',
        ],

        'categories' => [
            'display_name' => 'Delete categories',
            'description'  => 'Can delete categories.',
        ],

        'companies' => [
            'display_name' => 'Delete companies',
            'description'  => 'Can delete companies.',
        ],

        'forms' => [
            'display_name' => 'Delete forms',
            'description'  => 'Can delete forms.',
        ],

        'form_submissions' => [
            'display_name' => 'Delete form submissions',
            'description'  => 'Can delete form submissions.',
        ],

        'parts' => [
            'display_name' => 'Delete parts',
            'description'  => 'Can delete parts.',
        ],

        'roles' => [
            'display_name' => 'Delete roles',
            'description'  => 'Can delete roles.',
        ],

        'users' => [
            'display_name' => 'Delete users',
            'description'  => 'Can delete users.',
        ],

        //'metas' => [
        //    'display_name' => 'Delete metas',
        //    'description'  => 'Can delete metas.',
        //],

        //'own' => [
        //    'posts' => [
        //        'display_name' => 'Delete own posts',
        //        'description'  => 'Can delete own posts.',
        //    ],
        //],

        //'posts' => [
        //    'display_name' => 'Delete all posts',
        //    'description'  => 'Can delete all posts.',
        //],

        //'redirects' => [
        //    'display_name' => 'Delete redirects',
        //    'description'  => 'Can delete redirects.',
        //],

        //'subscriptions' => [
        //    'display_name' => 'Delete all subscriptions',
        //    'description'  => 'Can delete all subscriptions.',
        //],
    ],

    'disable' => [
        'listing' => [
            'display_name' => 'Disable listing',
            'description'  => 'Can disable listing.',
        ]
    ],

    'edit' => [
        'cars' => [
            'display_name' => 'Edit cars',
            'description'  => 'Kan voertuigen bewerken.',
        ],

        'categories' => [
            'display_name' => 'Categorieën bewerken',
            'description'  => 'Kan categorieën bewerken.',
        ],

        'companies' => [
            'display_name' => 'Bedrijven bewerken',
            'description'  => 'Kan bedrijven bewerken.',
        ],

        'forms' => [
            'display_name' => 'Formulieren bewerken',
            'description'  => 'Kan formulieren bewerken.',
        ],

        'listing' => [
            'display_name' => 'Edit listing',
            'description'  => 'Can edit listing.',
        ],

        'parts' => [
            'display_name' => 'Edit all parts',
            'description'  => 'Can edit all parts.',
        ],

        'roles' => [
            'display_name' => 'Edit roles',
            'description'  => 'Can edit roles.',
        ],

        'users' => [
            'display_name' => 'Edit users',
            'description'  => 'Can edit users.',
        ]

        //'metas' => [
        //    'display_name' => 'Edit metas',
        //    'description'  => 'Can edit metas.',
        //],

        //'own' => [
        //    'posts' => [
        //        'display_name' => 'Edit own posts',
        //        'description'  => 'Can edit own posts.',
        //    ],
        //],

        //'posts' => [
        //    'display_name' => 'Edit all posts',
        //    'description'  => 'Can edit all posts.',
        //],

        //'redirects' => [
        //    'display_name' => 'Edit redirects',
        //    'description'  => 'Can edit redirects.',
        //],

        //'subscriptions' => [
        //    'display_name' => 'Edit all subscriptions',
        //    'description'  => 'Can edit all subscriptions.',
        //],
    ],

    'publish' => [
        'listing' => [
            'display_name' => 'Publish listing',
            'description'  => 'Can publish listing.'
        ],
        //'posts' => [
        //    'display_name' => 'Publish posts',
        //    'description'  => 'Can manage posts publication.',
        //],
    ],
    'unpublish' => [
        'listing' => [
            'display_name' => 'Unpublish listing',
            'description'  => 'Can unpublish listing.'
        ]
    ],

    'impersonate' => [
        'display_name' => 'Impersonate user',
        'description'  => 'Can take ownership of others user identities. Useful for tests.',
    ],

    'view' => [
        'cars' => [
            'display_name' => 'View cars',
            'description'  => 'Can view cars.'
        ],

        'categories' => [
            'display_name' => 'Categorieën weergeven',
            'description'  => 'Kan categorieën inzien.',
        ],

        'companies' => [
            'display_name' => 'Bedrijven weergeven',
            'description'  => 'Kan bedrijven inzien.',
        ],

        'forms' => [
            'display_name' => 'View forms',
            'description'  => 'Can view forms.'
        ],

        'form_submissions' => [
            'display_name' => 'View form submissions',
            'description'  => 'Can view form submissions.',
        ],

        'parts' => [
            'display_name' => 'View all parts',
            'description'  => 'Can view all parts.',
        ],

        'roles' => [
            'display_name' => 'Rollen weergeven',
            'description'  => 'Kan rollen inzien.',
        ],

        'users' => [
            'display_name' => 'Gebruikers weergeven',
            'description'  => 'Kan gebruikers inzien.',
        ],

        //'metas' => [
        //    'display_name' => 'View metas',
        //    'description'  => 'Can view metas.',
        //],

        //'own' => [
        //    'posts' => [
        //        'display_name' => 'View own posts',
        //        'description'  => 'Can view own posts.',
        //    ],
        //],

        //'posts' => [
        //    'display_name' => 'View all posts',
        //    'description'  => 'Can view all posts.',
        //],

        //'redirects' => [
        //    'display_name' => 'View redirects',
        //    'description'  => 'Kan redirects inzien.',
        //],

        //'subscriptions' => [
        //    'display_name' => 'View all subscriptions',
        //    'description'  => 'Can view all subscriptions.',
        //],
    ]
];
