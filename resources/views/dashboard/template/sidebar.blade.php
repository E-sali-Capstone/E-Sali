<?php
    $logo= App\Models\WebSettingsModel::where('settings_id', 1)->first(); 
?>
<div class="sidebar sidebar-dark sidebar-fixed border-end" id="sidebar">
      <div class="sidebar-header border-bottom">
        <div class="sidebar-brand">
          <img src="{{asset('coreUI/src/')}}/assets/icons/esali.png" alt="Logo" srcset="" width="98" height="32">
          <svg class="sidebar-brand-narrow" width="32" height="32" alt="CoreUI Logo">
            <use xlink:href="{{asset('coreUI/src/')}}/assets/brand/coreui.svg#signet"></use>
          </svg>
        </div>
        <button class="btn-close d-lg-none" type="button" data-coreui-theme="dark" aria-label="Close" onclick="coreui.Sidebar.getInstance(document.querySelector(&quot;#sidebar&quot;)).toggle()"></button>
      </div>
      <ul class="sidebar-nav" data-coreui="navigation" data-simplebar>
    
      @if(Auth::user()->user_type ==  "Admin")
        <li class="nav-item"><a class="nav-link" href="{{route('dashboard')}}">
        <i class="cil-speedometer nav-icon"></i>
        Dashboard</a></li>
        <li class="nav-title">Community</li>
        <li class="nav-item">
          <a class="nav-link" href="{{route('announcements')}}">       
            <i class="cil-bullhorn nav-icon"></i>
        Announcements</a></li>
        <li class="nav-item">
                  <a class="nav-link" href="{{ route('reports') }}">
                  <i class="cil-file nav-icon"></i>Transparency Reports</a>
                </li>


        <li class="nav-group" aria-expanded="false"><a class="nav-link nav-group-toggle">
        <i class="cib-wechat nav-icon"></i>
            <span data-coreui-i18n="base">Threads</span></a>
          <ul class="nav-group-items compact" style="height: 0px;">
            <li class="nav-item"><a class="nav-link" href="{{ url(config('forum.web.router.prefix')) }}"><span class="nav-icon"><span class="nav-icon-bullet"></span></span><span data-coreui-i18n="accordion">Posts</span></a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('forum.category.manage') }}"><span class="nav-icon"><span class="nav-icon-bullet"></span></span><span data-coreui-i18n="accordion">Categories</span></a></li>

        </ul>
        </li>

        <li class="nav-item"><a class="nav-link" href="{{route('polls')}}">
        <i class="cil-pencil nav-icon"></i>
        Polls</a></li>
        <li class="nav-item"><a class="nav-link" href="{{route('feedbacks')}}">
        <i class="cil-comment-square nav-icon"></i>
        Feedbacks</a></li>
        <li class="nav-title">Manage</li>
        <li class="nav-group"><a class="nav-link" href="{{route('citizens')}}">
        <i class="cil-user nav-icon"></i>
        Citizens</a></li>
        <li class="nav-group"><a class="nav-link" href="{{route('sitesettings')}}">
        <i class="cil-cog nav-icon"></i>
        Site Settings</a></li>
        <li class="nav-group"><a class="nav-link" href="{{route('faqs')}}">
        <i class="cil-info nav-icon"></i>
        FAQs</a></li>
        <li class="nav-group"><a class="nav-link" href="{{route('gallery')}}">
        <i class="cil-list nav-icon"></i>
        Gallery</a></li>
        <li class="nav-group"><a class="nav-link" href="{{route('accountsettings')}}">
        <i class="cil-user nav-icon"></i>
        Account</a></li>
      @endif
      @if(Auth::user()->user_type ==  "Citizen")
       <li class="nav-group" aria-expanded="false"><a class="nav-link nav-group-toggle">
        <i class="cib-wechat nav-icon"></i>
            <span data-coreui-i18n="base">Threads</span></a>
          <ul class="nav-group-items compact" style="height: 0px;">
            <li class="nav-item"><a class="nav-link" href="{{ url(config('forum.web.router.prefix')) }}"><span class="nav-icon"><span class="nav-icon-bullet"></span></span><span data-coreui-i18n="accordion">Posts</span></a></li>
        </ul>
        </li>
        <li class="nav-item"><a class="nav-link" href="{{route('polls')}}">
        <i class="cil-pencil nav-icon"></i>
        Polls</a></li>
           <li class="nav-group"><a class="nav-link" href="{{route('accountsettings')}}">
        <i class="cil-user nav-icon"></i>
        Account</a></li>
      @endif

      </ul>
      <div class="sidebar-footer border-top d-none d-md-flex">     
        <button class="sidebar-toggler" type="button" data-coreui-toggle="unfoldable"></button>
      </div>
    </div>
    <div class="wrapper d-flex flex-column min-vh-100">
      <header class="header header-sticky p-0 mb-4">
        <div class="container-fluid border-bottom px-4">
          <button class="header-toggler" type="button" onclick="coreui.Sidebar.getInstance(document.querySelector('#sidebar')).toggle()" style="margin-inline-start: -14px;">
            <svg class="icon icon-lg">
              <use xlink:href="{{asset('coreUI')}}/node_modules/@coreui/icons/sprites/free.svg#cil-menu"></use>
            </svg>
          </button>
          <ul class="header-nav d-none d-lg-flex">
            <li class="nav-item"><a class="nav-link" href="{{route('landing-page')}}">Homepage</a></li>
            <li class="nav-item"><a class="nav-link" href="{{route('dashboard')}}">Dashboard</a></li>
            @if(Auth::user()->user_type ==  "Admin")
            <li class="nav-item"><a class="nav-link" href="{{route('sitesettings')}}">Site Settings</a></li>
            
            @endif
          </ul>
          <ul class="header-nav ms-auto">
            
          </ul>
          <ul class="header-nav">
            <li class="nav-item py-1">
              <div class="vr h-100 mx-2 text-body text-opacity-75"></div>
            </li>
            <li class="nav-item dropdown">
              <button class="btn btn-link nav-link py-2 px-2 d-flex align-items-center" type="button" aria-expanded="false" data-coreui-toggle="dropdown">
                <svg class="icon icon-lg theme-icon-active">
                  <use xlink:href="{{asset('coreUI')}}/node_modules/@coreui/icons/sprites/free.svg#cil-contrast"></use>
                </svg>
              </button>
              <ul class="dropdown-menu dropdown-menu-end" style="--cui-dropdown-min-width: 8rem;">
                <li>
                  <button class="dropdown-item d-flex align-items-center" type="button" data-coreui-theme-value="light">
                    <svg class="icon icon-lg me-3">
                      <use xlink:href="{{asset('coreUI')}}/node_modules/@coreui/icons/sprites/free.svg#cil-sun"></use>
                    </svg>Light
                  </button>
                </li>
                <li>
                  <button class="dropdown-item d-flex align-items-center" type="button" data-coreui-theme-value="dark">
                    <svg class="icon icon-lg me-3">
                      <use xlink:href="{{asset('coreUI')}}/node_modules/@coreui/icons/sprites/free.svg#cil-moon"></use>
                    </svg>Dark
                  </button>
                </li>
                <li>
                  <button class="dropdown-item d-flex align-items-center active" type="button" data-coreui-theme-value="auto">
                    <svg class="icon icon-lg me-3">
                      <use xlink:href="{{asset('coreUI')}}/node_modules/@coreui/icons/sprites/free.svg#cil-contrast"></use>
                    </svg>Auto
                  </button>
                </li>
              </ul>
            </li>
            <li class="nav-item py-1">
              <div class="vr h-100 mx-2 text-body text-opacity-75"></div>
            </li>
            <li class="nav-item dropdown"><a class="nav-link py-0 pe-0" data-coreui-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                <div class="avatar avatar-md"><img class="avatar-img" src="<?= asset('users-avatar/'.Auth::user()->profile_photo.'') ?>" alt="user@email.com"></div></a>
              <div class="dropdown-menu dropdown-menu-end pt-0">
                <div class="dropdown-header bg-body-tertiary text-body-secondary fw-semibold rounded-top mb-2">Account</div><a class="dropdown-item" href="#">
                  <a class="dropdown-item" href="{{route('logout')}}">
                  <svg class="icon me-2">
                    <use xlink:href="{{asset('coreUI')}}/node_modules/@coreui/icons/sprites/free.svg#cil-account-logout"></use>
                  </svg>Logout</a>
              </div>
            </li>
          </ul>
        </div>
      </header>