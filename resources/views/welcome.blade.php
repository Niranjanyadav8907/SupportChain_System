@extends('layouts.app')

@section('content')

<!-- 1. Hero Section -->
<section id="hero" class="hero-section">
    <div class="container">
        <div class="row align-items-center g-5">
            <!-- Hero Left: Title & Workflow Preview -->
            <div class="col-lg-6 text-center text-lg-start fade-in-up-trigger">
                <span class="hero-tagline">
                    <i class="bi bi-shield-check-fill me-2"></i> Company Internal Utility Portal
                </span>
                <h1 class="display-4 fw-extrabold text-primary mb-3 lh-sm">
                    Internal Ticket & Escalation Management System
                </h1>
                <p class="lead mb-4 fs-5" style="line-height: 1.7;">
                    Manage employee issues, IT support requests, HR requests, approvals, and escalations through a structured workflow. Fast-track workplace dispute and incident resolution.
                </p>
                <div class="d-flex flex-column flex-sm-row justify-content-center justify-content-lg-start gap-3">
                    <a href="#about" class="btn btn-corporate btn-lg px-4 py-3">
                        Learn More <i class="bi bi-arrow-right ms-2"></i>
                    </a>
                    <a href="#contact" class="btn btn-outline-corporate btn-lg px-4 py-3">
                        Raise Support Request <i class="bi bi-question-circle ms-2"></i>
                    </a>
                </div>
            </div>

            <!-- Hero Right: Reporting Hierarchy Graphic Preview -->
            <div class="col-lg-6 fade-in-up-trigger">
                <div class="hero-workflow-display p-4">
                    <h5 class="text-center text-primary mb-4 fw-bold"><i class="bi bi-diagram-3-fill me-2"></i>Automatic Escalation Hierarchy</h5>
                    
                    <div class="d-flex flex-column align-items-center gap-2">
                        <!-- Employee -->
                        <div class="d-flex align-items-center gap-3 bg-light border rounded px-4 py-3 w-100 max-w-sm shadow-sm">
                            <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center" style="width: 38px; height: 38px;">
                                <i class="bi bi-person"></i>
                            </div>
                            <div>
                                <h6 class="mb-0 fw-bold">Employee</h6>
                                <small class="text-muted">Initiates support request or ticket</small>
                            </div>
                        </div>

                        <div class="text-primary fs-5"><i class="bi bi-arrow-down-short"></i></div>

                        <!-- Team Lead -->
                        <div class="d-flex align-items-center gap-3 bg-light border border-primary-subtle rounded px-4 py-3 w-100 max-w-sm shadow-sm" style="background-color: rgba(15, 59, 140, 0.02) !important;">
                            <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center" style="width: 38px; height: 38px;">
                                <i class="bi bi-microsoft-teams"></i>
                            </div>
                            <div>
                                <h6 class="mb-0 fw-bold text-primary">Team Lead</h6>
                                <small class="text-muted">First-level review and assignment</small>
                            </div>
                        </div>

                        <div class="text-primary fs-5"><i class="bi bi-arrow-down-short"></i></div>

                        <!-- Project Manager -->
                        <div class="d-flex align-items-center gap-3 bg-light border rounded px-4 py-3 w-100 max-w-sm shadow-sm">
                            <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center" style="width: 38px; height: 38px;">
                                <i class="bi bi-briefcase"></i>
                            </div>
                            <div>
                                <h6 class="mb-0 fw-bold">Project Manager</h6>
                                <small class="text-muted">SLA monitoring and operations bottleneck fix</small>
                            </div>
                        </div>

                        <div class="text-primary fs-5"><i class="bi bi-arrow-down-short"></i></div>

                        <!-- HR/Admin -->
                        <div class="d-flex align-items-center gap-3 bg-light border rounded px-4 py-3 w-100 max-w-sm shadow-sm">
                            <div class="bg-dark text-white rounded-circle d-flex align-items-center justify-content-center" style="width: 38px; height: 38px;">
                                <i class="bi bi-shield-lock"></i>
                            </div>
                            <div>
                                <h6 class="mb-0 fw-bold">HR / System Admin</h6>
                                <small class="text-muted">Final resolution sign-off & audit log approval</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- 2. About System Section -->
<section id="about" class="section-padding">
    <div class="container">
        <div class="row align-items-center g-5">
            <!-- Left Image/Graphics Mockup -->
            <div class="col-lg-5 fade-in-up-trigger">
                <div class="position-relative">
                    <img src="{{ asset('images/dashboard_light.png') }}" alt="Internal Ticket Management" class="img-fluid rounded border shadow-sm">
                    <!-- Overlay statistics indicator card -->
                    <div class="position-absolute bg-white border rounded p-3 shadow-md d-flex align-items-center gap-3" style="bottom: -20px; right: -20px; max-width: 260px;">
                        <div class="bg-success text-white rounded-circle p-2 fs-5"><i class="bi bi-check2-circle"></i></div>
                        <div>
                            <h6 class="mb-0 fw-bold text-dark">SLA Level Clear</h6>
                            <small class="text-muted">All active tickets resolved on time</small>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Content -->
            <div class="col-lg-7 fade-in-up-trigger">
                <span class="section-subtitle">System Overview</span>
                <h2 class="section-title">Facilitating Seamless Workplace Productivity</h2>
                <p class="text-neutral-gray mt-4" style="font-size: 1.05rem; line-height: 1.8;">
                    The Support Chain System is our custom internal software designed to bridge the gap between team members and corporate operational departments. Whenever an employee faces an issue—ranging from software installation hurdles to payroll mismatches—they can raise a detailed digital ticket.
                </p>
                <p class="text-neutral-gray" style="font-size: 1.05rem; line-height: 1.8;">
                    The system integrates the company's reporting hierarchy directly into its core logic. This guarantees that issues are immediately visible to your team lead, escalates automatically if SLAs are breached, and keeps history logs secure for audit reporting.
                </p>
                
                <div class="row g-4 mt-3">
                    <div class="col-sm-6">
                        <div class="d-flex align-items-center gap-2">
                            <i class="bi bi-check-circle-fill text-primary"></i>
                            <span class="fw-bold text-neutral-dark">Department-wise Routing</span>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="d-flex align-items-center gap-2">
                            <i class="bi bi-check-circle-fill text-primary"></i>
                            <span class="fw-bold text-neutral-dark">Automated Hierarchy Escalate</span>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="d-flex align-items-center gap-2">
                            <i class="bi bi-check-circle-fill text-primary"></i>
                            <span class="fw-bold text-neutral-dark">Audit Logs for Compliance</span>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="d-flex align-items-center gap-2">
                            <i class="bi bi-check-circle-fill text-primary"></i>
                            <span class="fw-bold text-neutral-dark">Real-Time Status Notifications</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- 3. Issue Categories Section -->
<section id="categories" class="section-padding bg-alt-section">
    <div class="container">
        <div class="row justify-content-center text-center section-title-wrapper fade-in-up-trigger">
            <div class="col-lg-7">
                <span class="section-subtitle">Support Divisions</span>
                <h2 class="section-title">Comprehensive Issue Categories</h2>
                <p class="text-neutral-gray mt-3">From technical hardware faults to payroll adjustments, select the appropriate segment to route your requests correctly.</p>
            </div>
        </div>

        <div class="row g-4">
            <!-- Category 1: IT Support -->
            <div class="col-lg-3 col-md-6 fade-in-up-trigger">
                <div class="corporate-card">
                    <div class="card-icon-wrapper">
                        <i class="bi bi-laptop"></i>
                    </div>
                    <h5 class="text-primary fw-bold mb-3">IT Support Issues</h5>
                    <p class="text-neutral-gray small mb-0">
                        Troubleshooting network downtime, corporate email outages, VPN authentication issues, and internet connectivity problems.
                    </p>
                </div>
            </div>

            <!-- Category 2: Hardware Issues -->
            <div class="col-lg-3 col-md-6 fade-in-up-trigger" style="transition-delay: 0.05s;">
                <div class="corporate-card">
                    <div class="card-icon-wrapper">
                        <i class="bi bi-pc-display"></i>
                    </div>
                    <h5 class="text-primary fw-bold mb-3">Hardware Issues</h5>
                    <p class="text-neutral-gray small mb-0">
                        Request repair or replacements for malfunctioning laptops, broken screens/monitors, docking stations, mouse, or keyboards.
                    </p>
                </div>
            </div>

            <!-- Category 3: Software Requests -->
            <div class="col-lg-3 col-md-6 fade-in-up-trigger" style="transition-delay: 0.1s;">
                <div class="corporate-card">
                    <div class="card-icon-wrapper">
                        <i class="bi bi-terminal"></i>
                    </div>
                    <h5 class="text-primary fw-bold mb-3">Software Requests</h5>
                    <p class="text-neutral-gray small mb-0">
                        Installation tickets for development environments, software IDE license setups, designer suites, or corporate spreadsheet utilities.
                    </p>
                </div>
            </div>

            <!-- Category 4: HR Requests -->
            <div class="col-lg-3 col-md-6 fade-in-up-trigger" style="transition-delay: 0.15s;">
                <div class="corporate-card">
                    <div class="card-icon-wrapper">
                        <i class="bi bi-person-badge"></i>
                    </div>
                    <h5 class="text-primary fw-bold mb-3">HR Requests</h5>
                    <p class="text-neutral-gray small mb-0">
                        Inquiries regarding leave balances, policy questions, onboarding assistance, health benefits registration, or performance reviews.
                    </p>
                </div>
            </div>

            <!-- Category 5: Payroll Issues -->
            <div class="col-lg-3 col-md-6 fade-in-up-trigger">
                <div class="corporate-card">
                    <div class="card-icon-wrapper">
                        <i class="bi bi-cash-coin"></i>
                    </div>
                    <h5 class="text-primary fw-bold mb-3">Payroll Issues</h5>
                    <p class="text-neutral-gray small mb-0">
                        Raise disputes for salary slip discrepancies, tax deduction explanations, reimbursement delays, or banking update requests.
                    </p>
                </div>
            </div>

            <!-- Category 6: Facility Complaints -->
            <div class="col-lg-3 col-md-6 fade-in-up-trigger" style="transition-delay: 0.05s;">
                <div class="corporate-card">
                    <div class="card-icon-wrapper">
                        <i class="bi bi-building"></i>
                    </div>
                    <h5 class="text-primary fw-bold mb-3">Facility Complaints</h5>
                    <p class="text-neutral-gray small mb-0">
                        Report dysfunctional office locks, workspace lighting repairs, air-conditioning deficits, hygiene problems, or desk relocations.
                    </p>
                </div>
            </div>

            <!-- Category 7: Access Requests -->
            <div class="col-lg-3 col-md-6 fade-in-up-trigger" style="transition-delay: 0.1s;">
                <div class="corporate-card">
                    <div class="card-icon-wrapper">
                        <i class="bi bi-key"></i>
                    </div>
                    <h5 class="text-primary fw-bold mb-3">Access Requests</h5>
                    <p class="text-neutral-gray small mb-0">
                        Request database query access permissions, server root access, server room keycards, or third-party CRM seats.
                    </p>
                </div>
            </div>

            <!-- Category 8: General Support -->
            <div class="col-lg-3 col-md-6 fade-in-up-trigger" style="transition-delay: 0.15s;">
                <div class="corporate-card">
                    <div class="card-icon-wrapper">
                        <i class="bi bi-patch-question"></i>
                    </div>
                    <h5 class="text-primary fw-bold mb-3">General Support</h5>
                    <p class="text-neutral-gray small mb-0">
                        Any workplace queries or miscellaneous requests that do not fall directly into standard categorizations.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- 4. Key Features Section -->
<section id="features" class="section-padding">
    <div class="container">
        <div class="row justify-content-center text-center section-title-wrapper fade-in-up-trigger">
            <div class="col-lg-7">
                <span class="section-subtitle">System Capabilities</span>
                <h2 class="section-title">Engineered For Prompt Incident Resolution</h2>
                <p class="text-neutral-gray mt-3">Explore the corporate capabilities that keep internal support transparent, secure, and compliant.</p>
            </div>
        </div>

        <div class="row g-4">
            <!-- Feature 1: Ticket Creation -->
            <div class="col-lg-6 fade-in-up-trigger">
                <div class="d-flex p-3 border rounded h-100 bg-white shadow-sm hover-border-active transition-all">
                    <div class="feature-row-icon mt-1"><i class="bi bi-plus-circle-fill"></i></div>
                    <div>
                        <h5 class="text-primary fw-bold mb-2">Simplicity in Ticket Creation</h5>
                        <p class="text-neutral-gray small mb-0">
                            Clear form wizards for all employees. Attach image files, screen diagnostics, and mark the urgency level (Low, Medium, Critical) with a single click.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Feature 2: Ticket Tracking -->
            <div class="col-lg-6 fade-in-up-trigger" style="transition-delay: 0.05s;">
                <div class="d-flex p-3 border rounded h-100 bg-white shadow-sm hover-border-active transition-all">
                    <div class="feature-row-icon mt-1"><i class="bi bi-search"></i></div>
                    <div>
                        <h5 class="text-primary fw-bold mb-2">Real-Time Ticket Tracking</h5>
                        <p class="text-neutral-gray small mb-0">
                            Monitor live status transitions. Employees can trace exactly where their request sits, who is reviewing it, and see predicted resolution times.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Feature 3: Escalation Workflow -->
            <div class="col-lg-6 fade-in-up-trigger">
                <div class="d-flex p-3 border rounded h-100 bg-white shadow-sm hover-border-active transition-all">
                    <div class="feature-row-icon mt-1"><i class="bi bi-chevron-double-up text-danger"></i></div>
                    <div>
                        <h5 class="text-primary fw-bold mb-2">Automated Escalation Matrix</h5>
                        <p class="text-neutral-gray small mb-0">
                            If a critical ticket remains unassigned beyond its SLA window, it automatically shifts up the reporting hierarchy for immediate manager attention.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Feature 4: Role-Based Access -->
            <div class="col-lg-6 fade-in-up-trigger" style="transition-delay: 0.05s;">
                <div class="d-flex p-3 border rounded h-100 bg-white shadow-sm hover-border-active transition-all">
                    <div class="feature-row-icon mt-1"><i class="bi bi-shield-lock-fill"></i></div>
                    <div>
                        <h5 class="text-primary fw-bold mb-2">Role-Based Access Control</h5>
                        <p class="text-neutral-gray small mb-0">
                            Ensures strict data isolation. Teams only view tickets relevant to their specific project hierarchy, while HR/Admin retains global view rights.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Feature 5: Notifications -->
            <div class="col-lg-6 fade-in-up-trigger">
                <div class="d-flex p-3 border rounded h-100 bg-white shadow-sm hover-border-active transition-all">
                    <div class="feature-row-icon mt-1"><i class="bi bi-bell-fill text-warning"></i></div>
                    <div>
                        <h5 class="text-primary fw-bold mb-2">Instant Alerts & Notifications</h5>
                        <p class="text-neutral-gray small mb-0">
                            Receive notifications via internal email, web notifications, or portal alerts the moment a ticket is approved, commented on, or solved.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Feature 6: Approval Management -->
            <div class="col-lg-6 fade-in-up-trigger" style="transition-delay: 0.05s;">
                <div class="d-flex p-3 border rounded h-100 bg-white shadow-sm hover-border-active transition-all">
                    <div class="feature-row-icon mt-1"><i class="bi bi-hand-thumbs-up-fill text-success"></i></div>
                    <div>
                        <h5 class="text-primary fw-bold mb-2">Structured Approval Management</h5>
                        <p class="text-neutral-gray small mb-0">
                            Approvals for high-cost hardware requests or sensitive server access require a multi-step digital sign-off from Team Leads and Project Managers.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Feature 7: Resolution Tracking -->
            <div class="col-lg-6 fade-in-up-trigger">
                <div class="d-flex p-3 border rounded h-100 bg-white shadow-sm hover-border-active transition-all">
                    <div class="feature-row-icon mt-1"><i class="bi bi-check-all text-success"></i></div>
                    <div>
                        <h5 class="text-primary fw-bold mb-2">SLA Resolution Verification</h5>
                        <p class="text-neutral-gray small mb-0">
                            Solved tickets do not close automatically. Employees must verify that their hardware/software is fully operational before marked resolved.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Feature 8: Audit Logs -->
            <div class="col-lg-6 fade-in-up-trigger" style="transition-delay: 0.05s;">
                <div class="d-flex p-3 border rounded h-100 bg-white shadow-sm hover-border-active transition-all">
                    <div class="feature-row-icon mt-1"><i class="bi bi-journal-text"></i></div>
                    <div>
                        <h5 class="text-primary fw-bold mb-2">Immutable System Audit Logs</h5>
                        <p class="text-neutral-gray small mb-0">
                            Maintains a secure record of every modification, approval stamp, technician re-routing, and communication log for organizational audit compliance.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- 5. Workflow Section -->
<section id="workflow" class="section-padding bg-alt-section">
    <div class="container">
        <div class="row justify-content-center text-center section-title-wrapper fade-in-up-trigger">
            <div class="col-lg-7">
                <span class="section-subtitle">Process Flow</span>
                <h2 class="section-title">The Ticket Escalation Journey</h2>
                <p class="text-neutral-gray mt-3">Learn how a support incident progresses cleanly through the reporting hierarchy to ensure swift resolution.</p>
            </div>
        </div>

        <div class="row g-4 justify-content-center align-items-stretch">
            <!-- Step 1: Employee -->
            <div class="col-lg-3 col-md-6 workflow-node-item fade-in-up-trigger">
                <div class="workflow-node-badge">01</div>
                <div class="workflow-flow-card h-100">
                    <h5 class="text-primary fw-bold mb-3">Employee</h5>
                    <p class="text-neutral-gray small mb-0">
                        Encounters a workspace bottleneck, fills out the issue details, categorizes it, and submits the ticket online.
                    </p>
                </div>
            </div>

            <!-- Step 2: Team Lead -->
            <div class="col-lg-3 col-md-6 workflow-node-item fade-in-up-trigger" style="transition-delay: 0.05s;">
                <div class="workflow-node-badge">02</div>
                <div class="workflow-flow-card h-100">
                    <h5 class="text-primary fw-bold mb-3">Team Lead</h5>
                    <p class="text-neutral-gray small mb-0">
                        Reviews the team request, validates the operational need, resolves immediately, or signs off to route higher.
                    </p>
                </div>
            </div>

            <!-- Step 3: Project Manager -->
            <div class="col-lg-3 col-md-6 workflow-node-item fade-in-up-trigger" style="transition-delay: 0.1s;">
                <div class="workflow-node-badge">03</div>
                <div class="workflow-flow-card h-100">
                    <h5 class="text-primary fw-bold mb-3">Project Manager</h5>
                    <p class="text-neutral-gray small mb-0">
                        Monitors team ticket progress against corporate SLAs. Oversees hardware budgets and signs off resource requests.
                    </p>
                </div>
            </div>

            <!-- Step 4: HR / Admin -->
            <div class="col-lg-3 col-md-6 workflow-node-item fade-in-up-trigger" style="transition-delay: 0.15s;">
                <div class="workflow-node-badge">04</div>
                <div class="workflow-flow-card h-100">
                    <h5 class="text-primary fw-bold mb-3">HR / Admin</h5>
                    <p class="text-neutral-gray small mb-0">
                        Department admins carry out the hardware repair, setup access codes, adjust payroll, and log final ticket closure.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- 6. Statistics Section -->
<section class="section-padding stats-section-container bg-white border-bottom border-top">
    <div class="container">
        <div class="row g-4 text-center">
            <!-- Stat 1 -->
            <div class="col-lg-3 col-md-6 fade-in-up-trigger">
                <div class="stat-item">
                    <div class="stat-num-val" data-target="4280" data-float="false" data-suffix="+">0</div>
                    <div class="stat-num-lbl">Active Users</div>
                    <p class="stat-num-desc">Employees utilizing the portal across all office divisions.</p>
                </div>
            </div>

            <!-- Stat 2 -->
            <div class="col-lg-3 col-md-6 fade-in-up-trigger" style="transition-delay: 0.05s;">
                <div class="stat-item">
                    <div class="stat-num-val" data-target="15" data-float="false" data-suffix="m">0</div>
                    <div class="stat-num-lbl">First Response</div>
                    <p class="stat-num-desc">Average technician assignment duration for critical IT issues.</p>
                </div>
            </div>

            <!-- Stat 3 -->
            <div class="col-lg-3 col-md-6 fade-in-up-trigger" style="transition-delay: 0.1s;">
                <div class="stat-item">
                    <div class="stat-num-val" data-target="98.4" data-float="true" data-suffix="%">0.0%</div>
                    <div class="stat-num-lbl">First-Contact Fix</div>
                    <p class="stat-num-desc">Tickets resolved during their first hierarchy review stage.</p>
                </div>
            </div>

            <!-- Stat 4 -->
            <div class="col-lg-3 col-md-6 fade-in-up-trigger" style="transition-delay: 0.15s;">
                <div class="stat-item">
                    <div class="stat-num-val" data-target="2.4" data-float="true" data-suffix="h">0.0</div>
                    <div class="stat-num-lbl">Avg Resolve Time</div>
                    <p class="stat-num-desc">Time from ticket creation to verified employee sign-off.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- 7. Technology Stack Section -->
<section id="tech-stack" class="section-padding bg-alt-section">
    <div class="container">
        <div class="row justify-content-center text-center section-title-wrapper fade-in-up-trigger">
            <div class="col-lg-7">
                <span class="section-subtitle">System Architecture</span>
                <h2 class="section-title">Reliable Enterprise Core Technology</h2>
                <p class="text-neutral-gray mt-3">Built on robust frameworks ensuring maximum security, uptime, and layout responsiveness.</p>
            </div>
        </div>

        <div class="row g-4">
            <!-- Tech 1: Laravel -->
            <div class="col-lg-4 col-md-6 fade-in-up-trigger">
                <div class="tech-grid-card">
                    <i class="fa-brands fa-laravel"></i>
                    <h6 class="text-primary mt-2">Laravel Framework</h6>
                    <p class="text-neutral-gray small mt-2 mb-0">Secure backend handling validation, request routing, and business logic processing.</p>
                </div>
            </div>

            <!-- Tech 2: MySQL -->
            <div class="col-lg-4 col-md-6 fade-in-up-trigger" style="transition-delay: 0.05s;">
                <div class="tech-grid-card">
                    <i class="fa-solid fa-database"></i>
                    <h6 class="text-primary mt-2">MySQL Relational DB</h6>
                    <p class="text-neutral-gray small mt-2 mb-0">High-performance data storage containing ticket logs, approvals, and user accounts.</p>
                </div>
            </div>

            <!-- Tech 3: Bootstrap -->
            <div class="col-lg-4 col-md-6 fade-in-up-trigger" style="transition-delay: 0.1s;">
                <div class="tech-grid-card">
                    <i class="fa-brands fa-bootstrap"></i>
                    <h6 class="text-primary mt-2">Bootstrap 5 Frontend</h6>
                    <p class="text-neutral-gray small mt-2 mb-0">Responsive frontend layout ensuring compatibility across mobile devices and laptops.</p>
                </div>
            </div>

            <!-- Tech 4: AdminLTE -->
            <div class="col-lg-4 col-md-6 fade-in-up-trigger">
                <div class="tech-grid-card">
                    <i class="fa-solid fa-gauge-high"></i>
                    <h6 class="text-primary mt-2">AdminLTE Dashboard</h6>
                    <p class="text-neutral-gray small mt-2 mb-0">Clean, component-rich admin control panel for resolving IT and facilities requests.</p>
                </div>
            </div>

            <!-- Tech 5: Notifications -->
            <div class="col-lg-4 col-md-6 fade-in-up-trigger" style="transition-delay: 0.05s;">
                <div class="tech-grid-card">
                    <i class="fa-solid fa-envelope-open-text"></i>
                    <h6 class="text-primary mt-2">Interactive Mail & Webhooks</h6>
                    <p class="text-neutral-gray small mt-2 mb-0">Queued dispatch system handling instant status mailings to employees and team leads.</p>
                </div>
            </div>

            <!-- Tech 6: Role Management -->
            <div class="col-lg-4 col-md-6 fade-in-up-trigger" style="transition-delay: 0.1s;">
                <div class="tech-grid-card">
                    <i class="fa-solid fa-user-shield"></i>
                    <h6 class="text-primary mt-2">Role & Permission Engine</h6>
                    <p class="text-neutral-gray small mt-2 mb-0">Granular authorization guarding payroll details and HR sensitive logs.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- 8. Dashboard Preview Section -->
<section id="dashboard-preview" class="section-padding">
    <div class="container">
        <div class="row align-items-center g-5">
            <!-- Left Info Pane -->
            <div class="col-lg-5 fade-in-up-trigger">
                <span class="section-subtitle">Interface Preview</span>
                <h2 class="section-title">Streamlined Incident Control Center</h2>
                <p class="text-neutral-gray mt-4 mb-4" style="line-height: 1.8;">
                    Admins, HR operators, and team managers use our unified portal control dashboard to oversee incoming tickets, approve hardware acquisitions, and audit performance reviews.
                </p>
                
                <div class="d-flex flex-column gap-3">
                    <div class="d-flex gap-3">
                        <div class="bg-primary bg-opacity-10 text-primary border rounded-circle p-2 d-flex align-items-center justify-content-center" style="width: 38px; height: 38px; flex-shrink: 0;">
                            <i class="bi bi-kanban"></i>
                        </div>
                        <div>
                            <h6 class="text-neutral-dark fw-bold mb-1">Ticket Board View</h6>
                            <small class="text-neutral-gray">Filter logs by status, priority, and department category with a single click.</small>
                        </div>
                    </div>

                    <div class="d-flex gap-3">
                        <div class="bg-primary bg-opacity-10 text-primary border rounded-circle p-2 d-flex align-items-center justify-content-center" style="width: 38px; height: 38px; flex-shrink: 0;">
                            <i class="bi bi-clock-history"></i>
                        </div>
                        <div>
                            <h6 class="text-neutral-dark fw-bold mb-1">SLA Alert Status</h6>
                            <small class="text-neutral-gray">Visual warnings identify critical requests nearing their SLA limits.</small>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Image Pane -->
            <div class="col-lg-7 fade-in-up-trigger">
                <div class="border rounded p-2 bg-white shadow-lg">
                    <img src="{{ asset('images/dashboard_light.png') }}" alt="Internal Ticketing Dashboard" class="img-fluid rounded border">
                </div>
            </div>
        </div>
    </div>
</section>

<!-- 9. FAQ Section -->
<section id="faq" class="section-padding bg-alt-section">
    <div class="container">
        <div class="row justify-content-center text-center section-title-wrapper fade-in-up-trigger">
            <div class="col-lg-7">
                <span class="section-subtitle">FAQ Desk</span>
                <h2 class="section-title">Employee Frequently Asked Questions</h2>
                <p class="text-neutral-gray mt-3">Answers to general questions regarding ticket creation, routing, and access rights.</p>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-lg-8 fade-in-up-trigger">
                <div class="accordion faq-accordion" id="faqAccordion">
                    <!-- Q1 -->
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="faqOne">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqCollapseOne" aria-expanded="false" aria-controls="faqCollapseOne">
                                Who reviews my ticket once I submit it?
                            </button>
                        </h2>
                        <div id="faqCollapseOne" class="accordion-collapse collapse" aria-labelledby="faqOne" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                Initially, your ticket is routed to your immediate Team Lead (TL) for review. They will assign it to the corresponding support department (IT, HR, or Facility) or assist you directly if it is a general project-level request.
                            </div>
                        </div>
                    </div>

                    <!-- Q2 -->
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="faqTwo">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqCollapseTwo" aria-expanded="false" aria-controls="faqCollapseTwo">
                                How does the automated escalation hierarchy work?
                            </button>
                        </h2>
                        <div id="faqCollapseTwo" class="accordion-collapse collapse" aria-labelledby="faqTwo" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                Every ticket has a target resolution timeframe (SLA) based on its priority level. If a ticket marked critical is not processed by the Team Lead within the required timeframe, the system automatically escalates it to the Project Manager and sends an alert notifications email.
                            </div>
                        </div>
                    </div>

                    <!-- Q3 -->
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="faqThree">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqCollapseThree" aria-expanded="false" aria-controls="faqCollapseThree">
                                Can I request hardware replacements through this system?
                            </button>
                        </h2>
                        <div id="faqCollapseThree" class="accordion-collapse collapse" aria-labelledby="faqThree" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                Yes. Raise a ticket under the 'Hardware Issues' category. If a hardware upgrade or replacement is necessary, the ticket will automatically prompt your team lead and project manager for approval before being forwarded to the IT Procurement team.
                            </div>
                        </div>
                    </div>

                    <!-- Q4 -->
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="faqFour">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqCollapseFour" aria-expanded="false" aria-controls="faqCollapseFour">
                                Is my payroll ticket visible to other team members?
                            </button>
                        </h2>
                        <div id="faqCollapseFour" class="accordion-collapse collapse" aria-labelledby="faqFour" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                No. Role-based access ensures that payroll, HR disputes, and personal data tickets are only visible to you, your immediate managers, and the assigned HR payroll specialists. Other developers or department staff cannot view your tickets.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- 10. Contact / Support Request Section -->
<section id="contact" class="section-padding bg-white">
    <div class="container">
        <div class="row align-items-center g-5">
            <!-- Contact Info Panel -->
            <div class="col-lg-5 fade-in-up-trigger">
                <span class="section-subtitle">Admin Helpdesk</span>
                <h2 class="section-title">Support Contacts & Administration</h2>
                <p class="text-neutral-gray mt-4" style="line-height: 1.7;">
                    If you are having troubles logging into the system or need urgent manual ticket triaging, get in touch with the System Administration desk.
                </p>
                
                <div class="contact-detail-card mt-4">
                    <div class="contact-detail-item">
                        <div class="contact-detail-icon"><i class="bi bi-geo-alt"></i></div>
                        <div>
                            <h6 class="text-neutral-dark fw-bold mb-1">Office Location</h6>
                            <p class="text-neutral-gray small mb-0">Admin Division, Floor 4, Head Office</p>
                        </div>
                    </div>

                    <div class="contact-detail-item">
                        <div class="contact-detail-icon"><i class="bi bi-envelope"></i></div>
                        <div>
                            <h6 class="text-neutral-dark fw-bold mb-1">Support Email Address</h6>
                            <p class="text-neutral-gray small mb-0">helpdesk@company.com</p>
                        </div>
                    </div>

                    <div class="contact-detail-item">
                        <div class="contact-detail-icon"><i class="bi bi-telephone"></i></div>
                        <div>
                            <h6 class="text-neutral-dark fw-bold mb-1">Intercom Extensions</h6>
                            <p class="text-neutral-gray small mb-0">Extension: 4421 (IT), 4428 (HR), 4452 (Facilities)</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Form Panel -->
            <div class="col-lg-7 fade-in-up-trigger">
                <div class="contact-form-wrapper">
                    <h4 class="text-primary fw-bold mb-4"><i class="bi bi-plus-circle me-2"></i>Create Ticket Inquiry</h4>
                    
                    <!-- Alert dynamic success indicator -->
                    <div id="formSuccessAlert" class="alert alert-success d-none mb-4" role="alert" style="background-color: rgba(25, 135, 84, 0.08); border-color: rgba(25, 135, 84, 0.2); color: #198754;">
                        <div class="d-flex align-items-center gap-2">
                            <i class="bi bi-check-circle-fill"></i>
                            <div>
                                <h6 class="mb-0 fw-bold">Ticket Simulation Successful!</h6>
                                <span class="small">This test request has been logged. An email notification has been dispatched to your TL.</span>
                            </div>
                        </div>
                    </div>

                    <form id="corporateSupportContactForm">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label for="employeeName">EMPLOYEE NAME</label>
                                <input type="text" class="form-control" id="employeeName" placeholder="e.g. Robert Smith" required>
                            </div>
                            <div class="col-md-6">
                                <label for="employeeEmail">OFFICE EMAIL</label>
                                <input type="email" class="form-control" id="employeeEmail" placeholder="e.g. robert.s@company.com" required>
                            </div>
                            <div class="col-md-12">
                                <label for="employeeDept">DEPARTMENT DIVISION</label>
                                <select class="form-select" id="employeeDept" required>
                                    <option value="" disabled selected>Select your department</option>
                                    <option value="engineering">Engineering / Development</option>
                                    <option value="marketing">Marketing & Sales</option>
                                    <option value="finance">Finance & Accounts</option>
                                    <option value="operations">General Operations</option>
                                </select>
                            </div>
                            <div class="col-12">
                                <label for="employeeMessage">ISSUE OR COMPLAINT BRIEF DETAILS</label>
                                <textarea class="form-control" id="employeeMessage" rows="4" placeholder="Briefly describe your laptop repair request, software utility key setup, or office access issues..." required></textarea>
                            </div>
                            <div class="col-12 mt-4">
                                <button type="submit" class="btn btn-corporate w-100 py-3">
                                    File Support Ticket <i class="bi bi-send-fill ms-2"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
