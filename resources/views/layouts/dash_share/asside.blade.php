        <!-- Menu -->
        <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
            <div class="app-brand demo">
                <a href="index.html" class="app-brand-link">
                    <span class="app-brand-logo demo">
                        <svg width="32" height="22" viewBox="0 0 32 22" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M0.00172773 0V6.85398C0.00172773 6.85398 -0.133178 9.01207 1.98092 10.8388L13.6912 21.9964L19.7809 21.9181L18.8042 9.88248L16.4951 7.17289L9.23799 0H0.00172773Z"
                                fill="#7367F0" />
                            <path opacity="0.06" fill-rule="evenodd" clip-rule="evenodd"
                                d="M7.69824 16.4364L12.5199 3.23696L16.5541 7.25596L7.69824 16.4364Z" fill="#161616" />
                            <path opacity="0.06" fill-rule="evenodd" clip-rule="evenodd"
                                d="M8.07751 15.9175L13.9419 4.63989L16.5849 7.28475L8.07751 15.9175Z" fill="#161616" />
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M7.77295 16.3566L23.6563 0H32V6.88383C32 6.88383 31.8262 9.17836 30.6591 10.4057L19.7824 22H13.6938L7.77295 16.3566Z"
                                fill="#7367F0" />
                        </svg>
                    </span>
                    <span class="app-brand-text demo menu-text fw-bold">Vuexy</span>
                </a>
                <a href="{{ route('dashboard') }}" class="layout-menu-toggle menu-link text-large ms-auto">
                    <i class="ti menu-toggle-icon d-none d-xl-block ti-sm align-middle"></i>
                    <i class="ti ti-x d-block d-xl-none ti-sm align-middle"></i>
                </a>
            </div>

            <div class="menu-inner-shadow"></div>

            <ul class="menu-inner py-1">

                <!-- Reports -->
                <li class="menu-item {{ route_is('Reports.*', 'open') }}" id="chapter">
                    <a href="{{ router('dashboard') }}" class="menu-link menu-toggle">
                        <i class="menu-icon tf-icons ti ti-clipboard"></i>
                        <div data-i18n="Reports">Reports</div>
                        <div class="badge bg-primary rounded-pill ms-auto">0</div>
                    </a>
                    <ul class="menu-sub">
                        <li class="menu-item {{ route_is('reports', 'active') }}">
                            <a href="{{ router('dashboard') }}" class="menu-link">
                                <div data-i18n="dashboard">Reports</div>
                            </a>
                        </li>
                    </ul>
                </li>
                <!-- Reports -->

                <!-- Components -->
                <li class="menu-header small text-uppercase">
                    <span class="menu-header-text">Pages</span>
                </li>
                <!-- Components -->

                {{-- <!-- pricing-plan -->
                <li class="menu-item {{ route_is('pricing-plan.*', 'open') }}" id="pricing-plan">
                    <a href="{{ route('pricing-plan.index') }}" class="menu-link menu-toggle">
                        <i class="menu-icon tf-icons ti ti-currency-dollar"></i> 
                        <div data-i18n="pricing plan">pricing plan</div>
                        <div class="badge bg-primary rounded-pill ms-auto">0</div>
                    </a>
                    <ul class="menu-sub">
                        <li class="menu-item {{ route_is('pricing-plan.index', 'active') }}">
                            <a href="{{ route('pricing-plan.index') }}" class="menu-link">
                                <div data-i18n="Show">Show</div>
                            </a>
                        </li>
                    </ul>
                </li> --}}

                <!-- Subjects -->
                <li class="menu-item {{ route_is('subject.*', 'open') }}" id="subject">
                    <a href="{{ router('subject.index') }}" class="menu-link menu-toggle">
                        <i class="menu-icon tf-icons ti ti-book"></i> <!-- Subject Icon -->
                        <div data-i18n="Subjects">Subjects</div>
                        <div class="badge bg-primary rounded-pill ms-auto">0</div>
                    </a>
                    <ul class="menu-sub">
                        <li class="menu-item {{ route_is('subject.index', 'active') }}">
                            <a href="{{ router('subject.index') }}" class="menu-link">
                                <div data-i18n="Show">Show</div>
                            </a>
                        </li>
                        <li class="menu-item {{ route_is('subject.create', 'active') }}">
                            <a href="{{ router('subject.create') }}" class="menu-link">
                                <div data-i18n="Create">Create</div>
                            </a>
                        </li>
                    </ul>
                </li>
                <!-- Subjects -->

                <!-- Chapters -->
                <li class="menu-item {{ route_is('chapter.*', 'open') }}" id="chapter">
                    <a href="{{ router('chapter.index') }}" class="menu-link menu-toggle">
                        <i class="menu-icon tf-icons ti ti-clipboard"></i>
                        <div data-i18n="Chapters">Chapters</div>
                        <div class="badge bg-primary rounded-pill ms-auto">0</div>
                    </a>
                    <ul class="menu-sub">
                        <li class="menu-item {{ route_is('chapter.index', 'active') }}">
                            <a href="{{ router('chapter.index') }}" class="menu-link">
                                <div data-i18n="Show">Show</div>
                            </a>
                        </li>
                        <li class="menu-item {{ route_is('chapter.create', 'active') }}">
                            <a href="{{ router('chapter.create') }}" class="menu-link">
                                <div data-i18n="Create">Create</div>
                            </a>
                        </li>
                    </ul>
                </li>
                <!-- Chapters -->


                <!-- exams -->
                <li class="menu-item {{ route_is('exam.*', 'open') }}" id="exam">
                    <a href="{{ router('exam.index') }}" class="menu-link menu-toggle">
                        <i class="menu-icon tf-icons ti ti-clipboard"></i>
                        <div data-i18n="Exams">exams</div>
                        <div class="badge bg-primary rounded-pill ms-auto">0</div>
                    </a>
                    <ul class="menu-sub">
                        <li class="menu-item {{ route_is('exam.index', 'active') }}">
                            <a href="{{ router('exam.index') }}" class="menu-link">
                                <div data-i18n="Show">Show</div>
                            </a>
                        </li>
                        <li class="menu-item {{ route_is('exam.create', 'active') }}">
                            <a href="{{ router('exam.create') }}" class="menu-link">
                                <div data-i18n="Create">Create</div>
                            </a>
                        </li>
                    </ul>
                </li>
                <!-- exams -->

                <!-- Questions -->
                <li class="menu-item {{ route_is('question.*', 'open') }}" id="question">
                    <a href="{{ router('question.index') }}" class="menu-link menu-toggle">
                        <i class="menu-icon tf-icons ti ti-help"></i> <!-- Question Icon -->
                        <div data-i18n="Questions">Questions</div>
                        <div class="badge bg-primary rounded-pill ms-auto">0</div>
                    </a>
                    <ul class="menu-sub">
                        <li class="menu-item {{ route_is('question.index', 'active') }}">
                            <a href="{{ router('question.index') }}" class="menu-link">
                                <div data-i18n="Show">Show</div>
                            </a>
                        </li>
                        <li class="menu-item {{ route_is('question.create', 'active') }}">
                            <a href="{{ router('question.create') }}" class="menu-link">
                                <div data-i18n="Create">Create</div>
                            </a>
                        </li>
                    </ul>
                </li>
                <!-- Questions -->

                <!-- Moods -->
                <li class="menu-item {{ route_is('mood.*', 'open') }}" id="mood">
                    <a href="{{ router('mood.index') }}" class="menu-link menu-toggle">
                        <i class="menu-icon fa-solid fa-face-smile"></i> <!-- Updated Mood Icon -->
                        <div data-i18n="Moods">Moods</div>
                        <div class="badge bg-primary rounded-pill ms-auto">0</div>
                    </a>
                    <ul class="menu-sub">
                        <li class="menu-item {{ route_is('mood.index', 'active') }}">
                            <a href="{{ router('mood.index') }}" class="menu-link">
                                <div data-i18n="Show">Show</div>
                            </a>
                        </li>
                        <li class="menu-item {{ route_is('mood.create', 'active') }}">
                            <a href="{{ router('mood.create') }}" class="menu-link">
                                <div data-i18n="Create">Create</div>
                            </a>
                        </li>
                    </ul>
                </li>
                <!-- Moods -->

                <!-- users-profiles -->
                <li class="menu-item {{ route_is('users-profiles.*', 'open') }}" id="users-profiles">
                    <a href="{{ router('users-profiles.index') }}" class="menu-link menu-toggle">
                        <i class="menu-icon tf-icons ti ti-calendar"></i>
                        <div data-i18n="Users Profiles">Users Profiles
                        </div>
                        <div class="badge bg-primary rounded-pill ms-auto">0</div>
                    </a>
                    <ul class="menu-sub">
                        <li class="menu-item {{ route_is('users-profiles.index', 'active') }}">
                            <a href="{{ router('users-profiles.index') }}" class="menu-link">
                                <div data-i18n="Show">
                                    Show</div>
                            </a>
                        </li>
                    </ul>
                </li>
                <!-- users-profiles -->


                <!-- coupon -->
                <li class="menu-item {{ route_is('coupon.*', 'open') }}" id="coupon">
                    <a href="{{ router('coupon.index') }}" class="menu-link menu-toggle">
                        <i class="menu-icon fa-solid fa-face-smile"></i> <!-- Updated coupon Icon -->
                        <div data-i18n="Coupons">coupon</div>
                        <div class="badge bg-primary rounded-pill ms-auto">0</div>
                    </a>
                    <ul class="menu-sub">
                        <li class="menu-item {{ route_is('coupon.index', 'active') }}">
                            <a href="{{ router('coupon.index') }}" class="menu-link">
                                <div data-i18n="Show">Show</div>
                            </a>
                        </li>
                        <li class="menu-item {{ route_is('coupon.create', 'active') }}">
                            <a href="{{ router('coupon.create') }}" class="menu-link">
                                <div data-i18n="Create">Create</div>
                            </a>
                        </li>
                    </ul>
                </li>
                <!-- coupon -->

                <!-- Subscriptions -->
                <li class="menu-item {{ route_is('subscription.*', 'open') }}" id="subscription">
                    <a href="{{ router('subscription.index') }}" class="menu-link menu-toggle">
                        <i class="menu-icon tf-icons ti ti-credit-card"></i> <!-- Subscription Icon -->
                        <div data-i18n="Subscriptions">Subscriptions</div>
                        <div class="badge bg-primary rounded-pill ms-auto">0</div>
                    </a>
                    <ul class="menu-sub">
                        <li class="menu-item {{ route_is('subscription.index', 'active') }}">
                            <a href="{{ router('subscription.index') }}" class="menu-link">
                                <div data-i18n="Show">Show</div>
                            </a>
                        </li>
                        <li class="menu-item {{ route_is('subscription.create', 'active') }}">
                            <a href="{{ router('subscription.create') }}" class="menu-link">
                                <div data-i18n="Create">Create</div>
                            </a>
                        </li>
                    </ul>
                </li>
                <!-- Subscriptions -->

                <!-- Roles -->
                <li class="menu-item {{ route_is('roles.*', 'open') }}" id="roles">
                    <a href="{{ router('roles.index') }}" class="menu-link menu-toggle">
                        <i class="menu-icon tf-icons ti ti-shield-lock"></i> <!-- Roles Icon -->
                        <div data-i18n="Roles">Roles</div>
                        <div class="badge bg-primary rounded-pill ms-auto">0</div>
                    </a>
                    <ul class="menu-sub">
                        <li class="menu-item {{ route_is('roles.index', 'active') }}">
                            <a href="{{ router('roles.index') }}" class="menu-link">
                                <div data-i18n="Show">Show</div>
                            </a>
                        </li>
                        <li class="menu-item {{ route_is('roles.create', 'active') }}">
                            <a href="{{ router('roles.create') }}" class="menu-link">
                                <div data-i18n="Create">Create</div>
                            </a>
                        </li>
                    </ul>
                </li>
                <!-- Roles -->

                <!-- Admins -->
                <li class="menu-item {{ route_is('admins.*', 'open') }}" id="admins">
                    <a href="{{ router('admins.index') }}" class="menu-link menu-toggle">
                        <i class="menu-icon tf-icons ti ti-user"></i> <!-- Admins Icon -->
                        <div data-i18n="Admins">Admins</div>
                        <div class="badge bg-primary rounded-pill ms-auto">0</div>
                    </a>
                    <ul class="menu-sub">
                        <li class="menu-item {{ route_is('admins.index', 'active') }}">
                            <a href="{{ router('admins.index') }}" class="menu-link">
                                <div data-i18n="Show">Show</div>
                            </a>
                        </li>
                        <li class="menu-item {{ route_is('admins.create', 'active') }}">
                            <a href="{{ router('admins.create') }}" class="menu-link">
                                <div data-i18n="Create">Create</div>
                            </a>
                        </li>
                    </ul>
                </li>
                <!-- Admins -->

                <!-- Settings -->
                <li class="menu-item {{ route_is('settings.*', 'open') }}" id="settings">
                    <a href="{{ router('settings.edit') }}" class="menu-link menu-toggle">
                        <i class="menu-icon tf-icons ti ti-settings"></i> <!-- Settings Icon -->
                        <div data-i18n="Settings">Settings</div>
                        <div class="badge bg-primary rounded-pill ms-auto">0</div>
                    </a>
                    <ul class="menu-sub">
                        <li class="menu-item {{ route_is('settings.edit', 'active') }}">
                            <a href="{{ router('settings.edit') }}" class="menu-link">
                                <div data-i18n="Edit">Edit</div>
                            </a>
                        </li>
                    </ul>
                </li>
                <!-- Settings -->

            </ul>
        </aside>
        <!-- / Menu -->
