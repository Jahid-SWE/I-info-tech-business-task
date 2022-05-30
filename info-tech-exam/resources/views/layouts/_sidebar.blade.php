
<ul class="metismenu" id="menu">
    <li><a class="ai-icon" href="#" aria-expanded="false">
            <svg id="icon-home" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
            <span class="nav-text">Dashboard</span>
        </a>
    </li>

    <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
            <svg id="icon-user-doctors" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
            <span class="nav-text">Student Result View</span>
        </a>
        <ul aria-expanded="false">
            <li><a href="{{ route('student.results') }}">All Students Results</a></li>

        </ul>
    </li>

    <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
            <svg id="icon-user-doctors" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
            <span class="nav-text">New</span>
        </a>
        <ul aria-expanded="false">
            <li><a href="{{ route('student.result.create') }}">Student Result Creation</a></li>
        </ul>
    </li>

</ul>
