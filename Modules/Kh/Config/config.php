<?php


return [
    'name'     => 'KH',
    'bindings' => [
    ],
    'client_url'     => env('CLIENT_URL', 'client.attendance_system.test'),
    'admin_url'      => env('ADMIN_URL', 'admin.attendance_system.test'),
    'partner_url'    => env('PARTNER_URL', 'partner.attendance_system.test'),
    'log_connection' => env('DB_LOG_CONNECTION', 'logs'),
    'log_dbname'     => env('DB_LOG_DATABASE', 'attendance_system'),
    'log_table'      => env('DB_LOG_TABLE', 'activity_logs'),
    'exception'      => [
        'subject' => 'System Error in :env',
        'from'    => [
            'name'  => env('APP_NAME', 'attendance_system'),
            'email' => 'attendance_system@attendance_system.com',
        ],
        'to' => [
            'address' => env('EXCEPTION_MAIL_TO_ADDRESS', 'jhbelieve0712@gmail.com')
        ]
    ],

    'secret_key'          => env('SECRET_KEY', 'BI@cKW3LLb@cK0fflCe'),
    'secret_id'           => env('SECRET_ID', '1qaz2wsx'),
    'secret_method'       => env('SECRENT_METHOD', 'AES-256-CBC'),
    'backup_sql_path'     => storage_path("backups/database"),
    'backup_file_path'    => storage_path("backups/files"),
    'backup_database_exe' => env('BACKUP_DB_EXE', 'mysqldump'),

];
