<nav class="navbar navbar-expand-lg">
    <div class="container">
        <a href="/" class="navbar-brand">
            {{ config('settings.site_name', config('Laravel')) }}
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle='collapse' data-bs-target="#mainNavbar" aria-expanded="false">
            <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="mainNavbar">
            <ul class="navbar-nav ms-auto">
                <li>
                    <a href="/" title="navbar home button">Home</a>
                </li>
                <li>
                    <a href="" title="navbar about button">About</a>
                </li>
                <li>
                    <a href="/portfolio" title="navbar portfolio button">Portfolio</a>
                </li>
                <li>
                    <a href="/resources" title="navbar resources button">Resources</a>
                </li>
                <li>
                    <a href="" title="navbar contact me button">Contact Me</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
