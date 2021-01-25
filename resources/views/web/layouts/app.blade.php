<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" itemscope itemtype="http://schema.org/Organization">
<head>
  @include('modules.analytics')
  <script data-ad-client="ca-pub-1170635817535044" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
  @laravelPWA

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="dns-prefetch" href="https://docs.google.com">
  <link rel="dns-prefetch" href="https://fonts.googleapis.com">
  <link rel="dns-prefetch" href="https://unpkg.com">
  <link rel="dns-prefetch" href="https://cdnjs.cloudflare.com">
  <meta name="robots" content="all">
  <meta name="googlebot" content="all" />
  <meta name="google" content="translate" />

  <title>@yield('pageTitle', config('app.name'))</title>
  @include('modules.seo')

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
  <link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/plugins/owl.carousel.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/plugins/bootstrap.min.css') }}">
  <link href='https://fonts.googleapis.com/css?family=Google+Sans:400,500,700' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="{{ asset('assets/dashboard/plugins/@fontawesome/css/all.min.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/plugins/pace.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/styles.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/plugins/superhero.css') }}">

  @yield('css')
</head>
<body class="x-hidden has-sticky-header">
  <nav class="navbar navbar-expand-lg fixed-top custom-menu custom-menu__light">
    <div class="container">
      <a class="navbar-brand" href="{{ route('index') }}">
        <img src="{{ asset('assets/images/web/brand/logo_text.png') }}" class="logo-sm" alt="{{ config('app.nick') }}">
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="menu-icon__circle"></span>
        <span class="menu-icon">
          <span class="menu-icon__bar"></span>
          <span class="menu-icon__bar"></span>
          <span class="menu-icon__bar"></span>
        </span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        @if (Request::is('offline'))
          <ul class="navbar-nav ml-lg-auto">
            <li class="nav-item active"><span class="nav-link">You are Offline</span></li>
          </ul>
        @else
          <ul class="navbar-nav ml-lg-auto">
            <li class="nav-item {{ Request::is('/') ? 'active' : '' }}"><a class="nav-link" href="{{ route('index') }}#overview">Overview</a></li>
            <li class="nav-item"><a href="{{ route('index') }}#technologies" class="nav-link">Technologies</a></li>
            <li class="nav-item {{ Request::is('course') ? 'active' : '' }}"><a href="{{ route('course') }}" class="nav-link">Course</a></li>
            <li class="nav-item {{ Request::is('projects') ? 'active' : '' }}"><a href="{{ route('projects') }}" class="nav-link">Projects</a></li>
            <li class="nav-item {{ Request::is('workshop/*') ? 'active' : '' }}"><a href="{{ route('index') }}#workshops" class="nav-link">Workshops</a></li>
            <li class="nav-item {{ Request::is('stories') ? 'active' : '' }}"><a class="nav-link" href="{{ route('stories.index') }}">Stories</a></li>
            @guest
              <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Login</a></li>
            @endguest
          </ul>
          @auth
            <div class="custom-menu__right dropdown">
              <a href="" class="event-btn" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ auth()->user()->name }}</a>
              <div class="dropdown-menu">
                @if (auth()->user()->isLead())
                  <a href="{{ route('lead.dashboard') }}" class="dropdown-item">
                    <span>{{ __('Dashboard') }}</span>
                  </a>
                  <a href="{{ route('lead.profile.edit') }}" class="dropdown-item">
                    <span>{{ __('Profile') }}</span>
                  </a>
                @elseif(auth()->user()->isFacilitator())
                  <a href="{{ route('facilitator.dashboard') }}" class="dropdown-item">
                    <span>{{ __('Dashboard') }}</span>
                  </a>
                  <a href="{{ route('facilitator.profile.edit') }}" class="dropdown-item">
                    <span>{{ __('Profile') }}</span>
                  </a>
                @else
                  <a href="{{ route('member.dashboard') }}" class="dropdown-item">
                    <span>{{ __('Dashboard') }}</span>
                  </a>
                  <a href="{{ route('member.profile.edit') }}" class="dropdown-item">
                    <span>{{ __('Profile') }}</span>
                  </a>
                @endif
                <a href="{{ route('logout') }}" class="dropdown-item" onclick="event.preventDefault();
                  document.getElementById('logout-form').submit();">
                    <span>{{ __('Logout') }}</span>
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  @csrf
                </form>
              </div>
            </div>
          @else
            @if (Route::has('register'))
              <div class="custom-menu__right">
                <a href="{{ route('register') }}" class="event-btn"><i class="fa fa-users"></i> Become a member</a>
              </div>
            @endif
          @endauth
        @endif
      </div>
    </div>
  </nav>

  @yield('content')

  <footer class="section-spacer footer-section">
    <div class="container">
      <div class="row flex-column-reverse flex-sm-row flex-lg-row">
        <div class="col-md-4 col-12">
          <div class="footer-widget first-of-footer-widget text-center">
            <img src="{{ asset('assets/images/web/brand/logo.png') }}" class="mb-1" alt="{{ config('app.name') }}" width="135">
             <img src="{{ asset('assets/images/web/brand/cuk.png') }}" class="mb-1" alt="{{ config('app.name') }}" width="135">
            <p>&copy; 2019 - {{ now()->year }} | All Rights Reserved.<br><a href="{{ route('terms') }}">Terms & Condition</a> | <a href="{{ route('privacy') }}">Privacy Policy</a></p>
          </div>
        </div>
        <div class="col-md-8 col-sm-10">
          <div class="row">
            <div class="col-md-4 col-6">
              <div class="footer-widget">
                <h4 class="footer-widget__title">Links</h4>
                <ul class="list-unstyled">
                   <li>
                  <a href="https://www.womentechmakers.com/" target="_blank" rel="noreferrer">Women Techmakers</a>
                </li>
                <li>
                  <a href="https://developers.google.com/experts/" target="_blank" rel="noreferrer">Google Developer Experts</a>
                </li>
                <li>
                  <a href="https://developers.google.com/programs/community/" target="_blank" rel="noreferrer">Google Developer Groups</a>
                </li>
                  <li>
                    <a href="https://console.firebase.google.com/" target="_blank" rel="follow">Firebase console</a>
                  </li>
                </ul>
              </div>
            </div>
            <div class="col-md-4 col-6">
              <div class="footer-widget">
                <h4 class="footer-widget__title">Connect</h4>
                <ul class="list-unstyled">
                  <li>
                    <a href="https://youtube.com/" target="_blank" rel="follow"><i class="fab fa-youtube"></i> YouTube</a>
                  </li>
                  <li>
                    <a href="https://twitter.com/" target="_blank" rel="follow"><i class="fab fa-twitter"></i> Twitter</a>
                  </li>
                  <li>
                    <a href="https://telegram.me/" target="_blank" rel="follow"><i class="fab fa-telegram"></i> Telegram</a>
                  </li>
                  <li>
                    <a href="https://instagram.com/" target="_blank" rel="follow"><i class="fab fa-instagram"></i> Instagram</a>
                  </li>
                  <li>
                    <a href="https://facebook.com/" target="_blank" rel="follow"><i class="fab fa-facebook"></i> Facebook</a>
                  </li>
                </ul>
              </div>
            </div>
            <div class="col-md-4">
              <div class="footer-widget">
                <h4 class="footer-widget__title">Contribute</h4>
                <ul class="list-unstyled">
                 <li>
                  <a href="https://github.com/cooperative-tech-club/club-website/issues/new?template=documentation-bug.md" target="_blank" rel="noreferrer">File a bug</a>
                </li>
                  <li>
                    <a href="https://github.com/cooperative-tech-club/club-website/issues/new?template=feature_request.md" target="_blank" rel="noreferrer">Request new feature</a>
                  </li>
                  <li>
                  <a href="https://github.com/cooperative-tech-club/club-website" target="_blank" rel="noreferrer">View source</a>
                </li>
                  <li class="d-sm-none">
                    <a href="javascript:;" onclick="share('{{ config('app.name') }}', '{{ config('app.url') }}', 'Have you been looking for a place you can learn technical skills for free? If yes, check out {{ config('app.nick') }} now')">Share <i class="fa fa-share-alt"></i></a> <div id="share-loader"><div class="spinner-grow"></div></div>
                  </li>
                 
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </footer>
  <a href="#" id="scroll" style="display: none;"><i class="fa fa-angle-up"></i></a>
  

  <script>
    function iframeObserverCallback(iframeEntries, observer) {
      iframeEntries.forEach(iframe => {
        if (iframe.isIntersecting && window.matchMedia('(min-width: 450px)').matches) {
          iframe.target.setAttribute('src', iframe.target.dataset.urllink);
          observer.unobserve(iframe.target);
        }
      })
    }
    const iframeObserver = new IntersectionObserver(iframeObserverCallback, { rootMargin: '30px 0px' });
    iframeObserver.POLL_INTERVAL = 200;
    iframeObserver.USE_MUTATION_OBSERVER = false;
    document.querySelectorAll('iframe[data-urllink]').forEach(img => {
      iframeObserver.observe(img);
    });

    async function share(title, url, text) {
      $("#share-loader").show();
      if (window.Windows) {
        const DataTransferManager = window.Windows.ApplicationModel.DataTransfer.DataTransferManager;

        const dataTransferManager = DataTransferManager.getForCurrentView();
        dataTransferManager.addEventListener("datarequested", (ev) => {
          const data = ev.request.data;

          data.properties.title = title;
          data.properties.url = url;
          data.setText(text);
        });

        DataTransferManager.showShareUI();
        $("#share-loader").hide();
        return true;
      } else if (navigator.share) {
        try {
          await navigator.share({
            title: title,
            url: url,
            text: text,
          });
          $("#share-loader").hide();
          return true;
        } catch (err) {
          console.error('There was an error trying to share this content');
          $("#share-loader").hide();
          return false;
        }
      }
    }
  </script>

  <script src="{{ asset('assets/js/plugins/pace.js') }}"></script>
  <script src="{{ asset('assets/js/plugins/jquery.min.js') }}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
  <script src="{{ asset('assets/js/plugins/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('assets/js/plugins/jquery.magnific-popup.min.js') }}"></script>
  <script src="{{ asset('assets/js/plugins/jquery.easing.min.js') }}"></script>
  <script src="{{ asset('assets/js/plugins/swiper.min.js') }}"></script>
  <script src="{{ asset('assets/js/plugins/owl.carousel.min.js') }}"></script>
  <script src="{{ asset('assets/js/plugins/hammer.js') }}"></script>
  <script src="{{ asset('assets/js/custom.js') }}"></script>

  @yield('js')
</body>
</html>
