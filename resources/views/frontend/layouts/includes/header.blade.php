<header class="header-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <!-- Navbar Starts -->
                <nav class="navbar navbar-area navbar-expand-lg nav-style-02 nav-absolute">
                    <div class="container nav-container">
                        <div class="responsive-mobile-menu">
                            <div class="logo-wrapper">
                                <a href="{{ route('home') }}" class="logo">
                                    <img src="{{ asset('assets/images/logo.png') }}" alt="logo">
                                </a>
                            </div>
                            <button class="navbar-toggler" type="button" data-toggle="collapse"
                                data-target="#cropium-main-menu" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="toggle-icon"></span>
                                <span class="toggle-icon"></span>
                                <span class="toggle-icon"></span>
                            </button>
                        </div>

                        <div class="collapse navbar-collapse" id="cropium-main-menu">
                            <ul class="navbar-nav">
                                <li class="no-children">
                                    <a href="{{ route('home') }}"
                                        class="{{ Request::routeIs('home') ? 'active' : '' }}">home</a>
                                </li>
                                <li class="no-children">
                                    <a href="{{ route('about') }}"
                                        class="{{ Request::routeIs('about') ? 'active' : '' }}">about</a>
                                </li>
                                <li class="no-children">
                                    <a href="{{ route('blog') }}"
                                        class="{{ Request::routeIs('blog') ? 'active' : '' }}">blog</a>
                                </li>
                                <li class="menu-item-has-children">
                                    <a href="#">pages</a>
                                    <ul class="sub-menu">
                                        <li><a href="service.html">service</a></li>
                                        <li><a href="service-details.html">service details</a></li>
                                        <li><a href="portfolio.html">portfolio</a></li>
                                        <li><a href="portfolio-details.html">portfolio details</a></li>
                                        <li><a href="404.html">404</a></li>
                                    </ul>
                                </li>
                                <li class="no-children">
                                    <a href="contact.html">contact</a>
                                </li>
                            </ul>
                        </div>

                        <!-- Nav Right Content Starts -->
                        <div class="nav-right-content">
                            <a href="#" class="header-language active">en</a>
                            <a href="#" class="header-language">bn</a>

                            @auth
                                <a href="{{ route('admin.dashboard') }}" class="template-btn header-btn">Dashbard</a>
                            @else
                                <a href="{{ route('login') }}" class="template-btn header-btn">login</a>
                                <a href="{{ route('register') }}" class="template-btn header-btn"
                                    style="margin-left: 10px">register</a>
                            @endauth

                        </div>
                        <!-- Nav Right Content End -->
                    </div>
                </nav>
                <!-- Navbar End -->
            </div>
        </div>
    </div>
</header>
