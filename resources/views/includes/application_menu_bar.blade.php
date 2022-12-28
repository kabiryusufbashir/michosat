<!-- Large Screen  -->
<div class="my-4 overflow-auto yus-container-scrollbar py-3 hidden lg:block">
    <!-- Dashboard  -->
    <a href="#">
        <div class="{{ ($page_title == 'dashboard') ? 'active-nav-link-div' : 'nav-link-div' }}">
            <span>
                @include('icons.dashboard')
            </span>
            &nbsp;&nbsp;
            <span class="lg:text-sm text-xs">
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
            <span class="lg:text-sm text-xs">
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
            <span class="lg:text-sm text-xs">
                Upload Document
            </span>
        </div>
    </a>
    <!-- Slip  -->
    <a href="#">
        <div class="{{ ($page_title == 'slip') ? 'active-nav-link-div' : 'nav-link-div' }}">
            <span>
                @include('icons.timetable')
            </span>
            &nbsp;&nbsp;
            <span class="lg:text-sm text-xs">
                Acknowledge Slip
            </span>
        </div>
    </a>
    <!-- Letter  -->
    <a href="#">
        <div class="{{ ($page_title == 'letter') ? 'active-nav-link-div' : 'nav-link-div' }}">
            <span>
                @include('icons.timetable')
            </span>
            &nbsp;&nbsp;
            <span class="lg:text-sm text-xs">
                Admission Letter
            </span>
        </div>
    </a>
    <!-- Settings  -->
    <a id="systemPasswordLink">
        <div class="{{ ($page_title == 'settings') ? 'active-nav-link-div' : 'nav-link-div' }}">
            <span>
                @include('icons.settings')
            </span>
            &nbsp;&nbsp;
            <span class="lg:text-sm text-xs">
                Change Password
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
            <span class="lg:text-sm text-xs">
                Logout
            </span>
        </div>
    </a>
</div>

<!-- Mobile Screen  -->
<div class="my-4 py-3 lg:hidden block">
    <!-- Dashboard  -->
    <a href="#">
        <div class="flex justify-center">
            <span>
                @include('icons.dashboard')
            </span>
        </div>
    </a>
    <!-- Make Payment  -->
    <a href="#">
        <div class="flex justify-center my-5">
            <span>
                @include('icons.course')
            </span>
        </div>
    </a>
    <!-- Courses  -->
    <a href="#">
        <div class="flex justify-center my-5">
            <span>
                @include('icons.course')
            </span>
        </div>
    </a>
    <!-- Slip  -->
    <a href="#">
        <div class="flex justify-center my-5">
            <span>
                @include('icons.timetable')
            </span>
        </div>
    </a>
    <!-- Letter  -->
    <a href="#">
        <div class="flex justify-center my-5">
            <span>
                @include('icons.timetable')
            </span>
        </div>
    </a>
    <!-- Settings  -->
    <a id="systemPasswordLink">
        <div class="flex justify-center my-5">
            <span>
                @include('icons.settings')
            </span>
        </div>
    </a>
    <!-- Logout  -->
    <a href="{{ route('application-logout') }}">
        <div class="flex justify-center my-5">
            <span>
                @include('icons.logout')
            </span>
        </div>
    </a>
</div>
<!-- Version  -->
@include('includes.root_system_version')