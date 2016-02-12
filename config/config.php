<?php 

return [
  'name' => 'Contact',
  
  'send_message' => true,
  'contact_page_uri' => 'contact',
  'send_support_emails_to' => ['support@westcottcourses.com'],
  
  'send_contact_emails_to' => ['support@westcottcourses.com', 'support@westcottcourses.com'],
  'from_contact_name' => 'Westcott Courses Support',
  'from_contact_email' => 'support@westcottcourses.com',
  'contact_form_subjects' => [
      'New Student Advising',
      'Existing Student Support',
      'Transcript Request',
      'Non-Credit Certificate Request',
      'Course Request',
      'Other',
  ],
  'contact_rules' => [
    'first_name' => 'required',
    'last_name' => 'required',
    'email' => 'required|email',
    'subject' => 'required',
    'message' => 'required',
  ],

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
        'middleware'         => ['web','needsPermission'],
        'permission_name'    => 'contact.dashboard.manage',
    ],

    'permissions' => [
        [
            'name'          => 'contact.dashboard.manage',
            'readable_name' => 'Manage Messages',
        ]
    ],
  
    /*
     * Default url used to redirect user to front/admin of your the system.
     */
   'system_url' => config('core.redirect_url'),
];
