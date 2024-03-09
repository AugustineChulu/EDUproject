<div class="sidebar hidden sm:block w-0 sm:w-1/6 h-screen fixed top-0 left-0 bottom-0 z-40 overflow-hidden">
    
    <a href="{{ route('profile') }}" id="profileWrapper" tab="profile">

        <img id="profileImage" src="{{ asset('images/profile/' . auth()->user()->profile_picture) }}" alt="Avatar">
        <p class="font-bold leading-none username">{{ auth()->user()->name }}</p>
    
    </a>
    
    <div class="mb-6 pt-4">

        <a href="{{ route('dashboard') }}" class="flex items-center text-gray-600 py-3 hover:text-gray-200 sidebarTab" tab="dashboard">
            <i class="fas fa-home"></i>
            <span class="ml-2 text-sm font-semibold">Dashboard</span>
        </a>
        
        @role('admin')

        <a href="{{ route('teacher.index') }}" class="flex items-center text-gray-600 py-3 hover:text-gray-200 sidebarTab" tab="teacher">
            <i class="fa-solid fa-chalkboard-user"></i>
            <span class="ml-2 text-sm font-semibold">Teachers</span>
        </a>

        <a href="{{ route('subject.index') }}" class="flex items-center text-gray-600 py-3 hover:text-gray-200 sidebarTab" tab="subject">
            <i class="fa-solid fa-window-restore"></i>
            <span class="ml-2 text-sm font-semibold">Subjects</span>
        </a>

        <a href="{{ route('classes.index') }}" class="flex items-center text-gray-600 py-3 hover:text-gray-200 sidebarTab" tab="classes">
            <i class="fa-solid fa-graduation-cap"></i>
            <span class="ml-2 text-sm font-semibold">Classes</span>
        </a>

        <a href="{{ route('pupil.index') }}" class="flex items-center text-gray-600 py-3 hover:text-gray-200 sidebarTab" tab="pupil">
            <i class="fa-solid fa-user-graduate"></i>
            <span class="ml-2 text-sm font-semibold">Pupils</span>
        </a>

        <a href="{{ route('attendance.admin') }}" class="flex items-center text-gray-600 py-3 hover:text-gray-200 sidebarTab" tab="attendance">
            <i class="fa-regular fa-calendar-check"></i>
            <span class="ml-2 text-sm font-semibold">Attendance Report</span>
        </a>

        {{-- <a href="{{ route('assignrole.index') }}" class="flex items-center text-gray-600 py-3 hover:text-gray-200 sidebarTab" tab="assignrole">
            <i class="fa-solid fa-user-pen"></i>
            <span class="ml-2 text-sm font-semibold">Assign Role</span>
        </a>

        <a href="{{ route('roles-permissions') }}" class="flex items-center text-gray-600 py-3 hover:text-gray-200 sidebarTab" tab="roles-permissions">
            <i class="fa-solid fa-user-gear"></i>
            <span class="ml-2 text-sm font-semibold">Roles &amp; Permissions</span>
        </a> --}}
        
        @endrole

        @role('teacher')

        <a href="{{ route('home') }}" class="flex items-center text-gray-600 py-3 hover:text-gray-200 sidebarTab" tab="home">
            <i class="fa-solid fa-pen-clip"></i>
            <span class="ml-2 text-sm font-semibold">Lessons</span>
        </a>

        <a href="{{ route('attendance.teacher') }}" class="flex items-center text-gray-600 py-3 hover:text-gray-200 sidebarTab" tab="attendance">
            <i class="fa-solid fa-calendar-day"></i>
            <span class="ml-2 text-sm font-semibold">Attendance</span>
        </a>

        <a href="{{ route('home') }}" class="flex items-center text-gray-600 py-3 hover:text-gray-200 sidebarTab">
            <i class="fa-solid fa-square-check"></i>
            <span class="ml-2 text-sm font-semibold">Grades</span>
        </a>

        <a href="{{ route('home') }}" class="flex items-center text-gray-600 py-3 hover:text-gray-200 sidebarTab">
            <i class="fa-solid fa-table"></i>
            <span class="ml-2 text-sm font-semibold">Time Table</span>
        </a>
        
        @endrole
    </div>
</div>