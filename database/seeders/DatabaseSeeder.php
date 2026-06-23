<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Role;
use App\Models\Permission;
use App\Models\Department;
use App\Models\TicketCategory;
use App\Models\Setting;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1. Seed Departments
        $depts = [
            'IT Support' => 'Information Technology helpdesk support.',
            'Server & Infrastructure' => 'System administration, server and network support.',
            'Network & Telecom' => 'Corporate connectivity and network services.',
            'Software Dev' => 'Software engineering, tools, and code operations.',
            'Hardware Admin' => 'Physical hardware procurement, repairs, and support.',
            'Human Resources' => 'Personnel management, leaves, benefits, and workplace complaints.',
            'Access Management' => 'Account provisioning, active directory, and key cards.',
            'Operations' => 'General business operations and team hierarchy.'
        ];

        $departmentModels = [];
        foreach ($depts as $name => $desc) {
            $departmentModels[$name] = Department::create([
                'name' => $name,
                'description' => $desc
            ]);
        }

        // 2. Seed Permissions
        $permissions = [
            // Admin/Manager operations
            'manage_users' => 'Manage user accounts and hierarchy',
            'manage_departments' => 'Create and modify company departments',
            'manage_roles' => 'Define roles and permissions',
            'manage_settings' => 'Modify system and SLA settings',
            'view_reports' => 'Access resolution and SLA analytics',
            'view_activity_logs' => 'Audit system logs and activities',

            // Ticket operations
            'create_ticket' => 'Create new ticket requests',
            'view_all_tickets' => 'View all tickets in the system',
            'view_assigned_tickets' => 'View tickets assigned to self or team',
            'view_own_tickets' => 'View tickets raised by self',
            'assign_ticket' => 'Assign tickets to agents',
            'close_ticket' => 'Mark tickets as resolved/closed',
            'reopen_ticket' => 'Reopen closed tickets',
            'comment_ticket' => 'Add comments/replies to tickets',
            'internal_note_ticket' => 'Add private agent notes to tickets',
            'escalate_ticket' => 'Manually escalate tickets'
        ];

        $permissionModels = [];
        foreach ($permissions as $name => $desc) {
            $permissionModels[$name] = Permission::create([
                'name' => $name,
                'description' => $desc
            ]);
        }

        // 3. Seed Roles
        $roles = [
            'Admin' => 'Full administrative access.',
            'HR' => 'HR department manager and staff.',
            'Project Manager' => 'Operations manager and supervisor.',
            'Team Lead' => 'First-level supervisor and queue manager.',
            'Employee' => 'Regular corporate employee.'
        ];

        $roleModels = [];
        foreach ($roles as $name => $desc) {
            $roleModels[$name] = Role::create([
                'name' => $name,
                'description' => $desc
            ]);
        }

        // 4. Assign Permissions to Roles
        // Admin: All permissions
        $roleModels['Admin']->permissions()->sync(array_values(array_map(fn($p) => $p->id, $permissionModels)));

        // Project Manager: Most permissions (excluding system config/user creation)
        $pmPerms = [
            'view_reports', 'view_activity_logs', 'create_ticket', 'view_all_tickets',
            'view_assigned_tickets', 'view_own_tickets', 'assign_ticket', 'close_ticket',
            'reopen_ticket', 'comment_ticket', 'internal_note_ticket', 'escalate_ticket'
        ];
        $roleModels['Project Manager']->permissions()->sync(
            array_values(array_map(fn($name) => $permissionModels[$name]->id, $pmPerms))
        );

        // Team Lead: Team queue management
        $tlPerms = [
            'create_ticket', 'view_assigned_tickets', 'view_own_tickets', 'assign_ticket',
            'close_ticket', 'reopen_ticket', 'comment_ticket', 'internal_note_ticket', 'escalate_ticket'
        ];
        $roleModels['Team Lead']->permissions()->sync(
            array_values(array_map(fn($name) => $permissionModels[$name]->id, $tlPerms))
        );

        // HR: People-related tickets and reports
        $hrPerms = [
            'create_ticket', 'view_all_tickets', 'view_assigned_tickets', 'view_own_tickets',
            'close_ticket', 'comment_ticket', 'view_reports'
        ];
        $roleModels['HR']->permissions()->sync(
            array_values(array_map(fn($name) => $permissionModels[$name]->id, $hrPerms))
        );

        // Employee: Basic ticket creation and view own
        $empPerms = ['create_ticket', 'view_own_tickets', 'reopen_ticket', 'comment_ticket'];
        $roleModels['Employee']->permissions()->sync(
            array_values(array_map(fn($name) => $permissionModels[$name]->id, $empPerms))
        );

        // 5. Seed Ticket Categories
        $categories = [
            ['name' => 'System Issue', 'slug' => 'system-issue', 'sla_hours' => 12, 'description' => 'Local OS, office tools, and utility software issues.'],
            ['name' => 'Server Issue', 'slug' => 'server-issue', 'sla_hours' => 4, 'description' => 'Server downtime, application server crashes, and access errors.'],
            ['name' => 'Network Issue', 'slug' => 'network-issue', 'sla_hours' => 8, 'description' => 'VPN, Wifi connectivity, ethernet routing, and firewall problems.'],
            ['name' => 'Software Issue', 'slug' => 'software-issue', 'sla_hours' => 24, 'description' => 'IDE installations, licensing requests, and custom tooling.'],
            ['name' => 'Hardware Issue', 'slug' => 'hardware-issue', 'sla_hours' => 48, 'description' => 'Laptop repair, peripheral replacement, screen fixes, and docks.'],
            ['name' => 'HR Request', 'slug' => 'hr-request', 'sla_hours' => 72, 'description' => 'Workplace inquiries, benefits, policy clarifications, and disputes.'],
            ['name' => 'Leave Request', 'slug' => 'leave-request', 'sla_hours' => 48, 'description' => 'Maternity, medical, or unpaid long leave approvals.'],
            ['name' => 'Access Request', 'slug' => 'access-request', 'sla_hours' => 6, 'description' => 'Active directory, database permissions, server ssh keys, and ID cards.']
        ];
        foreach ($categories as $cat) {
            TicketCategory::create($cat);
        }

        // 6. Seed Settings
        $settings = [
            ['key' => 'company_name', 'value' => 'SupportChain System Ltd.', 'group' => 'general', 'description' => 'Corporate Entity Display Name.'],
            ['key' => 'escalation_enabled', 'value' => '1', 'group' => 'escalation', 'description' => 'Enable/disable automated ticket escalation scheduler (1=Yes, 0=No).'],
            ['key' => 'escalation_hours', 'value' => '4', 'group' => 'escalation', 'description' => 'Default elapsed hours of inactivity before escalating to the next level.'],
            ['key' => 'email_notifications_enabled', 'value' => '1', 'group' => 'notification', 'description' => 'Fires outbound transactional emails (1=Yes, 0=No).'],
            ['key' => 'in_app_notifications_enabled', 'value' => '1', 'group' => 'notification', 'description' => 'Stores notifications in database (1=Yes, 0=No).'],
            ['key' => 'system_email', 'value' => 'no-reply@supportchain.com', 'group' => 'email', 'description' => 'Sender email address for alerts.']
        ];
        foreach ($settings as $setting) {
            Setting::create($setting);
        }

        // 7. Seed Users & Structure
        $password = Hash::make('password');

        // Admin
        $admin = User::create([
            'name' => 'System Admin',
            'email' => 'admin@supportchain.com',
            'employee_id' => 'EMP-000001',
            'role_id' => $roleModels['Admin']->id,
            'password' => $password,
            'department_id' => $departmentModels['IT Support']->id,
            'reporting_to' => null,
            'phone' => '+15550100',
            'status' => 'active'
        ]);
        $admin->roles()->attach($roleModels['Admin']->id);

        // HR Manager
        $hr = User::create([
            'name' => 'Sarah Connor (HR Manager)',
            'email' => 'hr@supportchain.com',
            'employee_id' => 'EMP-000002',
            'role_id' => $roleModels['HR']->id,
            'password' => $password,
            'department_id' => $departmentModels['Human Resources']->id,
            'reporting_to' => null,
            'phone' => '+15550200',
            'status' => 'active'
        ]);
        $hr->roles()->attach($roleModels['HR']->id);

        // Project Manager (Senior Ops)
        $pm = User::create([
            'name' => 'John Doe (Project Manager)',
            'email' => 'pm@supportchain.com',
            'employee_id' => 'EMP-000003',
            'role_id' => $roleModels['Project Manager']->id,
            'password' => $password,
            'department_id' => $departmentModels['Operations']->id,
            'reporting_to' => null,
            'phone' => '+15550300',
            'status' => 'active'
        ]);
        $pm->roles()->attach($roleModels['Project Manager']->id);

        // Team Lead (Reports to PM)
        $tl = User::create([
            'name' => 'Jane Smith (Team Lead)',
            'email' => 'tl@supportchain.com',
            'employee_id' => 'EMP-000004',
            'role_id' => $roleModels['Team Lead']->id,
            'password' => $password,
            'department_id' => $departmentModels['Operations']->id,
            'reporting_to' => $pm->id,
            'phone' => '+15550400',
            'status' => 'active'
        ]);
        $tl->roles()->attach($roleModels['Team Lead']->id);

        // Employee (Reports to TL)
        $employee = User::create([
            'name' => 'David Miller (Employee)',
            'email' => 'employee@supportchain.com',
            'employee_id' => 'EMP-000005',
            'role_id' => $roleModels['Employee']->id,
            'password' => $password,
            'department_id' => $departmentModels['Operations']->id,
            'reporting_to' => $tl->id,
            'phone' => '+15550500',
            'status' => 'active'
        ]);
        $employee->roles()->attach($roleModels['Employee']->id);
    }
}
