@extends('frontend.layouts.main')
@push('seo-stuff')

@endpush
@push('page-title')

@endpush
@push('page-description')

@endpush
@push('page-keywords')

@endpush
@push('page-styles')

@endpush
@push('page-scripts')
    {{--<script src="https://unpkg.com/typed.js@2.0.16/dist/typed.umd.js"></script>--}}
    <script>
        $(document).ready(function(){
            //Homepage hero typewriter
            var options = {
                strings: ['Bespoke websites', 'WordPress Websites', 'WooCommerce Websites', 'Laravel Websites and Application', 'HubSpot CMS Websites'],
                typeSpeed: 150,
                loop: true,
                startDelay: 300,
                backDelay: 900,
            }
            var typed = new Typed('#homepageTypeWriter', options);
        })
    </script>
@endpush
@section('content')
    <section id="homepageTop">
        <img class="mainBgImage" src="{{ asset('images/backgrounds/purple-blocks-bg-1.png') }}">
        <div class="content">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <h1>Hi, I'm <span>Matt Noye</span></h1>
                        <h2>I create <span id="homepageTypeWriter"></span></h2>
                        <div class="btn-group">
                            <a href="{{ route('portfolio.index') }}" class="mediumPurpleBtn btn-lg" title="view my work button">View my work <i class="fa-solid fa-arrow-right-long"></i></a>
                            <a href="{{ route('contact-me.index') }}" class="whiteBgPurpleTxtBtn btn-lg" title="get in touch button">Get in touch <i class="fa-solid fa-arrow-right-long"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <ul class="circles">
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
        </ul>
        <div class="heroBottomWave">
            <img class="block w-full lg:h-auto" src="{{ asset('images/backgrounds/hero-bottom-wave.svg') }}">
        </div>
    </section>

    <section id="homepageAboutBanner">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <h2 class="sectionTitle">About me</h2>
                    <p>
                        Hi and welcome to my website, I'm Matt Noye a full stack developer with over a decades experience (nearly 15 years to be precise).
                    </p>
                    <p>
                        Sed pellentesque cursus orci in venenatis. Aenean laoreet massa nec sapien cursus, sed vestibulum sem laoreet. Aenean volutpat scelerisque eleifend. Sed dictum bibendum urna, id sodales eros facilisis vel. Sed eu quam a massa semper malesuada. In mattis, nibh ut aliquam tincidunt, felis ipsum imperdiet nibh, quis fermentum nunc nisl in erat. Nunc id euismod nisl, eu vulputate eros. Integer a magna nec erat consequat consequat. Sed convallis lectus vel malesuada rutrum.
                    </p>
                </div>
                <div class="col-md-6">
                    <img class="myAvatarImage" src="{{ asset('images/matt-avator.svg') }}">
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 offset-md-3 aboutButtonRow">
                    <a href="" class="whiteBgPurpleTxtBtn btn-lg" title="view my work button">Read more <i class="fa-solid fa-arrow-right-long"></i></a>
                </div>
            </div>
        </div>
        <div class="waveBottom">
            <img class="block w-full lg:h-auto" src="{{ asset('images/backgrounds/purple-wave-top.svg') }}">
        </div>
    </section>
    <section id="homepageWhatIDoBanner">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2 class="sectionTitle">What I Do</h2>
                </div>
            </div>
            <div class="row">
                @foreach($wid as $wid)
                    <div class="col-md-3">
                        <div class="item">
                            <a href="{{ route('what-i-do.show', ['slug' => $wid->slug]) }}" title="{{ $wid->title }} what i do click">
                                <h4>{{ $wid->title }}</h4>
                                <div class="pageBtn">
                                    <i class="fa-solid fa-circle-arrow-right"></i>
                                </div>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <section id="homepageRecentWorkBanner">
        <div class="topWave">
            <img class="" src="{{ asset('images/backgrounds/purple-wave-bottom.svg') }}">
        </div>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h3 class="sectionTitle">My Recent Work</h3>
                </div>
            </div>
            <div class="row">
                @foreach($port as $port)
                    <div class="col-md-6">
                        <div class="portItem">
                            <a href="{{ route('portfolio.show', ['slug' => $port->slug]) }}" title="{{ $port->name }} portfolio item click">
                                <div class="content">
                                    <h5>{{ $port->name }}</h5>
                                    {!! $port->tagline !!}
                                </div>
                                <img class="img-fluid mainImage" src="{{ Storage::url($port->mobile_desktop_tablet_image) }}">
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="row">
                <div class="col-12">
                    <a href="{{ route('portfolio.index') }}" class="darkPurpleBtn btn-lg" title="My recent work main button click">View All <i class="fa-solid fa-arrow-right-long"></i></a>
                </div>
            </div>
        </div>

    </section>

    <section id="homepageWorkWithBanner">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-7">
                    <div class="row">
                        @foreach($www as $www)
                            <div class="col-md-6">
                                <div class="wwwItem">
                                    <a href="{{ route('who-work-with.show', ['slug' => $www->slug]) }}">
                                        <img class="img-fluid" src="{{ Storage::url($www->featured_image) }}">
                                        <div class="content">
                                            <h4>{{ $www->title }} <i class="fa-solid fa-arrow-right-long"></i></h4>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-md-5">
                    <h3 class="sectionTitle">Who I work with</h3>
                    <div class="topContent">
                        <p>
                            Over the years I have had the priveledge to work with some amazing clients across a range of sectors throughout the UK, Europe, North America and Canada.  To the left are just a handful of the sectors I work with and have worked with over the years.
                        </p>
                    </div>
                    <div class="btn-group">
                        <a href="{{ route('get-a-quote.index') }}" class="darkPurpleBtn btn-lg" title="Who Work With get quote button">Get a Quote <i class="fa-solid fa-arrow-right-long"></i></a>
                        <a href="{{ route('contact-me.index') }}" class="darkPurpleBtn btn-lg">Let's Chat <i class="fa-solid fa-arrow-right-long"></i></a>
                    </div>

                </div>
            </div>
        </div>
        <div class="waveBottom">
            <img class="block w-full lg:h-auto" src="{{ asset('images/backgrounds/purple-wave-top.svg') }}">
        </div>
    </section>

    <section id="homepageLatestPostsBanner">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h3 class="sectionTitle">Recent Posts</h3>
                </div>
            </div>
            <div class="row">
                @foreach($posts as $post)
                    <div class="col-md-4">
                        <div class="card postCard">
                            <a href="{{ route('posts.show', ['category' => strtolower($post->category->name), 'slug' => $post->slug]) }}" title="{{ $post->title }} recent post button click">
                                <div class="card-header">
                                    @if($post->featured_image)
                                        <img class="img-fluid" src="{{ Storage::url($post->featured_image) }}" alt="{{ $post->title }} featured image">
                                    @endif
                                </div>
                                <div class="card-body">
                                    <h4>{{ $post->title }}</h4>
                                    <p>
                                        {!! post_generate_excerpt($post->main_content) !!}
                                    </p>
                                </div>
                                <div class="card-footer">
                                    <a href="">Continue Reading <i class="fas fa-arrow-right"></i></a>
                                </div>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="row mt-5">
                <div class="col-12">
                    <a href="resources" class="whiteBgPurpleTxtBtn btn-lg" title="Resources view all button click">View All <i class="fa-solid fa-arrow-right-long"></i></a>
                </div>
            </div>
        </div>
    </section>
    <section id="homepageMyProjectsBanner">
        <div class="topWave">
            <img class="" src="{{ asset('images/backgrounds/purple-wave-bottom.svg') }}">
        </div>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h4 class="sectionTitle">
                        Personal Projects
                    </h4>
                </div>
            </div>
        </div>
    </section>

@endsection

