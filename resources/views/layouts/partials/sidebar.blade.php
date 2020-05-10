<div class="sidebar">
    <nav class="navbar">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a href="{{ route('dashboard') }}" class="nav-link">
                    <span class="navbar-toggler-icon"></span>
                    <span class="link-text">Company</span>
                </a>
            </li>
            <li class="nav-item side"  data-link="company">
                <a href="{{ route('company.index') }}" class="nav-link">
                    <svg class="bi bi-award-fill"  viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path d="M8 0l1.669.864 1.858.282.842 1.68 1.337 1.32L13.4 6l.306 1.854-1.337 1.32-.842 1.68-1.858.282L8 12l-1.669-.864-1.858-.282-.842-1.68-1.337-1.32L2.6 6l-.306-1.854 1.337-1.32.842-1.68L6.331.864 8 0z"/>
                        <path d="M4 11.794V16l4-1 4 1v-4.206l-2.018.306L8 13.126 6.018 12.1 4 11.794z"/>
                    </svg>
                    <span class="link-text">Companies</span>
                </a>
            </li>
            <li class="nav-item side" data-lin="employee">
                <a href="{{ route('employee.index') }}" class="nav-link">
                    <svg class="bi bi-briefcase-fill"viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M0 12.5A1.5 1.5 0 001.5 14h13a1.5 1.5 0 001.5-1.5V6.85L8.129 8.947a.5.5 0 01-.258 0L0 6.85v5.65z" clip-rule="evenodd"/>
                        <path fill-rule="evenodd" d="M0 4.5A1.5 1.5 0 011.5 3h13A1.5 1.5 0 0116 4.5v1.384l-7.614 2.03a1.5 1.5 0 01-.772 0L0 5.884V4.5zm5-2A1.5 1.5 0 016.5 1h3A1.5 1.5 0 0111 2.5V3h-1v-.5a.5.5 0 00-.5-.5h-3a.5.5 0 00-.5.5V3H5v-.5z" clip-rule="evenodd"/>
                    </svg>
                    <span class="link-text">Employees</span>
                </a>
            </li>
        </ul>
    </nav>

</div>
