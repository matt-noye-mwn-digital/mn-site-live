            <section class="getStartedBanner">
                <div class="topWave">
                    <img src="{{ asset('images/backgrounds/dark-purple-wave-top.svg') }}">
                </div>
                <div class="container">
                    <div class="row"></div>
                </div>
            </section>
        </main>
        <footer>
            @php
                $whatIDoItems = \App\Models\WhatIDo::orderBy('title', 'asc')->get();
            @endphp
            <div class="footerMain">
                <div class="container">
                    <div class="row">
                        <div class="col-md-3">
                            <ul class="list-unstyled contactDetails">
                                <li>
                                    <a href="tel:+441325238115" title="footer telephone number link">01325 238115</a>
                                </li>
                                <li>
                                    <a href="mailto:hello@matt-noye.co.uk" title="footer email address link">hello@matt-noye.co.uk</a>
                                </li>
                            </ul>
                            <ul class="list-inline socialIcons">
                                <li class="list-inline-item">
                                    <a href="" title="Footer whatsapp link"><i class="fa-brands fa-whatsapp"></i></a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="" title="footer linkedin link"><i class="fa-brands fa-linkedin"></i></a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="" title="footer github link"><i class="fa-brands fa-github"></i></a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-md-3">
                            <h5 class="footerTitle">
                                Navigation
                            </h5>
                            <ul class="list-unstyled">
                                <li><a href="/" title="footer home link">Home</a></li>
                                <li><a href="" title="footer about me link">About Me</a></li>
                                <li><a href="" title="footer resources link">Resources</a></li>
                                <li><a href="" title="footer portfolio link">Portfolio</a></li>
                                <li>
                                    <a href="/knowledgebase" title="knowledgebade main page link">Knowledgebase</a>
                                </li>
                                <li><a href="" title="footer contact me link">Contact Me</a></li>
                                <li><a href="" title="footer hire me link">Hire Me</a></li>
                            </ul>
                        </div>
                        <div class="col-md-3">
                            <h5 class="footerTitle">
                                What I Do
                            </h5>
                            <ul class="list-unstyled">
                                @foreach($whatIDoItems as $wid)
                                    <li>
                                        <a href="{{ $wid->slug }}" title="footer {{ $wid->title }} link">
                                            {{ $wid->title }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="col-md-3">
                            <h5 class="footerTitle">Service Areas</h5>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footerBottom">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <p>
                                Copyright &copy; @php echo date('Y'); @endphp Matt Noye | All Rights Reserved
                            </p>
                        </div>
                        <div class="col-md-6 text-center text-md-end">
                            <p>
                                Web Design in Darlington.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </body>
</html>
