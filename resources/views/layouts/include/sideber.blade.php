<nav class="sidebar">
    <div class="sidebar-header">
      <a href="#" class="sidebar-brand">
        Noble<span>UI</span>
      </a>
      <div class="sidebar-toggler not-active">
        <span></span>
        <span></span>
        <span></span>
      </div>
    </div>
    <div class="sidebar-body">
      <ul class="nav">
        <li class="nav-item nav-category">Main</li>
        <li class="nav-item">
          <a href="dashboard-one.html" class="nav-link">
            <i class="link-icon" data-feather="box"></i>
            <span class="link-title">Dashboard</span>
          </a>
        </li>
        <li class="nav-item nav-category">web apps</li>
        <li class="nav-item">
          <a class="nav-link" data-toggle="collapse" href="#emails" role="button" aria-expanded="false" aria-controls="emails">
            <i class="link-icon" data-feather="mail"></i>
            <span class="link-title">User</span>
            <i class="link-arrow" data-feather="chevron-down"></i>
          </a>
          <div class="collapse" id="emails">
            <ul class="nav sub-menu">
              <li class="nav-item">
                <a href="{{route('user.index')}}" class="nav-link">User List</a>
              </li>
              <li class="nav-item">
                <a href="" class="nav-link">trash List</a>
              </li
              
            </ul>
          </div>
        </li>

        <li class="nav-item">
          <a class="nav-link" data-toggle="collapse" href="#category" role="button" aria-expanded="false" aria-controls="emails">
            <i class="link-icon" data-feather="mail"></i>
            <span class="link-title">Crued</span>
            <i class="link-arrow" data-feather="chevron-down"></i>
          </a>
          <div class="collapse" id="category">
            <ul class="nav sub-menu">
              <li class="nav-item">
                <a href="{{route('crued.create')}}" class="nav-link">Create</a>
                <a href="{{route('crued.index')}}" class="nav-link">Manage</a>
              </li>
            </ul>
          </div>
        </li>

        <li class="nav-item">
          <a class="nav-link" data-toggle="collapse" href="#multi" role="button" aria-expanded="false" aria-controls="emails">
            <i class="link-icon" data-feather="mail"></i>
            <span class="link-title">Multiple Data</span>
            <i class="link-arrow" data-feather="chevron-down"></i>
          </a>
          <div class="collapse" id="multi">
            <ul class="nav sub-menu">
              <li class="nav-item">
                <a href="{{route('multiple.create')}}" class="nav-link">Multi Data Create</a>
                <a href="{{route('multiple.index')}}" class="nav-link">Manage</a>
              </li>
            </ul>
          </div>
        </li>

        <li class="nav-item">
          <a class="nav-link" data-toggle="collapse" href="#multi" role="button" aria-expanded="false" aria-controls="emails">
            <i class="link-icon" data-feather="mail"></i>
            <span class="link-title">RelationShip</span>
            <i class="link-arrow" data-feather="chevron-down"></i>
          </a>
          <div class="collapse" id="multi">
            <ul class="nav sub-menu">
              <li class="nav-item">
                <a href="{{route('oneToOne.relation')}}" class="nav-link">One To One</a>
                <a href="{{route('oneToMany.relation')}}" class="nav-link">One To Many</a>
                <a href="{{route('manyToMany.relation')}}" class="nav-link">Many To Many</a>
              </li>
            </ul>
          </div>
        </li>

        <li class="nav-item">
          <a class="nav-link" data-toggle="collapse" href="#multistep" role="button" aria-expanded="false" aria-controls="emails">
            <i class="link-icon" data-feather="mail"></i>
            <span class="link-title">multistep Form</span>
            <i class="link-arrow" data-feather="chevron-down"></i>
          </a>
          <div class="collapse" id="multistep">
            <ul class="nav sub-menu">
              <li class="nav-item">
                <a href="{{route('multiform.create')}}" class="nav-link">Form</a>
                <a href="{{route('multiform.two.create')}}" class="nav-link">Form2</a>
                {{-- <a href="{{route('oneToMany.relation')}}" class="nav-link">One To Many</a>
                <a href="{{route('manyToMany.relation')}}" class="nav-link">Many To Many</a> --}}
              </li>
            </ul>
          </div>
        </li>

        
        <li class="nav-item">
          <a href="{{route('role.index')}}" class="nav-link">
            <i class="link-icon" data-feather="message-square"></i>
            <span class="link-title">Role</span>
          </a>
        </li>
        <li class="nav-item">
          <a href="pages/apps/calendar.html" class="nav-link">
            <i class="link-icon" data-feather="calendar"></i>
            <span class="link-title">Calendar</span>
          </a>
        </li>
    </div>
  </nav>