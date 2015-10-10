<?php 

return [
  'name' => 'Contact',
  
  'send_message' => true,
  'contact_page_uri' => 'contact',
  'send_support_emails_to' => ['yazjallad@gmail.com'],
  'send_contact_emails_to' => ['yazjallad@gmail.com'],
  'contact_form_subjects' => ['I WANT YOUR HALP CONTACT', 'I WANT YOUR HALP CONTACT 2'],
  'support_form_subjects' => ['I NEED YOUR HALP!', 'I NEED YOUR HALP 2!',],


   /*
     * Default prefix to the dashboard.
     */
    'route_prefix' => config('core.admin_uri') . 'messages',

    'file_path'    =>  base_path('resources/contact'),

    /*
     * Default permission user should have to access the dashboard.
     */
    'security' => [
        'protected'          => false,
        'middleware'         => ['auth','needsPermission'],
        'permission_name'    => 'contact.dashboard.manage',
    ],

    'permissions' => [
        [
            'name'          => 'contact.dashboard.manage',
            'readable_name' => 'Manage Messages',
        ]
    ],

    'navigation' => [
    [
        'menu_id'  => -1,
        'order'    => 0,
        'dropdown' => 1,
        'submenu'  => 0,
        'active'   => 1,
        'name'     => 'Contact',
        'icon'     => '',
        'route'    => '',
        'title'    => 'Contact',
        'roles'    => -1,
        'children' => [
            [
                'menu_id'  => -1,
                'order'    => 2,
                'dropdown' => 0,
                'submenu'  => 1,
                'parent'   => -1,
                'active'   => 1,
                'icon'     => '',
                'header'   => '',
                'route'    => 'contact.dashboard.messages',
                'name'     => 'Contact Messages',
                'title'    => 'Contact Messages',
                'roles'    => -1,
            ],
            [
                'menu_id'  => -1,
                'order'    => 1,
                'dropdown' => 0,
                'submenu'  => 1,
                'parent'   => -1,
                'active'   => 1,
                'icon'     => '',
                'header'   => '',
                'route'    => 'contact.dashboard.support',
                'name'     => 'Support Messages',
                'title'    => 'Support Messages',
                'roles'    => -1,
            ]
        
        ]

        ]
    ],
    /*
     * Default url used to redirect user to front/admin of your the system.
     */
   'system_url' => config('core.redirect_url'),
];