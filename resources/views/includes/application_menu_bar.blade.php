<div class="my-4 overflow-auto yus-container-scrollbar py-3">
    <!-- Dashboard  -->
    <a href="#">
        <div class="{{ ($page_title == 'dashboard') ? 'active-nav-link-div' : 'nav-link-div' }}">
            <span>
                @include('icons.dashboard')
            </span>
            &nbsp;&nbsp;
            <span class="text-sm">
                Dashboard
            </span>
        </div>
    </a>
    <!-- Make Payment  -->
    <a href="#">
        <div class="{{ ($page_title == 'payment') ? 'active-nav-link-div' : 'nav-link-div' }}">
            <span>
                @include('icons.course')
            </span>
            &nbsp;&nbsp;
            <span class="text-sm">
                Make Payment
            </span>
        </div>
    </a>
    <!-- Courses  -->
    <a href="#">
        <div class="{{ ($page_title == 'document') ? 'active-nav-link-div' : 'nav-link-div' }}">
            <span>
                @include('icons.course')
            </span>
            &nbsp;&nbsp;
            <span class="text-sm">
                Upload Document
            </span>
        </div>
    </a>
    <!-- Timetable  -->
    <a href="#">
        <div class="{{ ($page_title == 'timetable') ? 'active-nav-link-div' : 'nav-link-div' }}">
            <span>
                @include('icons.timetable')
            </span>
            &nbsp;&nbsp;
            <span class="text-sm">
                Print Acknowledge Slip
            </span>
        </div>
    </a>
    <!-- Settings  -->
    <a href="{{ route('student-settings') }}">
        <div class="{{ ($page_title == 'settings') ? 'active-nav-link-div' : 'nav-link-div' }}">
            <span>
                @include('icons.settings')
            </span>
            &nbsp;&nbsp;
            <span class="text-sm">
                Settings
            </span>
        </div>
    </a>
    <!-- Logout  -->
    <a href="{{ route('application-logout') }}">
        <div class="nav-link-div">
            <span>
                @include('icons.logout')
            </span>
            &nbsp;&nbsp;
            <span class="text-sm">
                Logout
            </span>
        </div>
    </a>
</div>
<!-- Version  -->
@include('includes.root_system_version')