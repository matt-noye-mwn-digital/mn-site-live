@extends('frontend.layouts.main')
@push('page-title')

@endpush
@push('page-description')

@endpush
@push('page-keywords')

@endpush
@push('page-styles')

@endpush
@push('page-scripts')

@endpush
@section('content')
    <section id="aboutMePageTop">
        <img src="{{ asset('images/backgrounds/purple-blocks-bg-1.png') }}" alt="" class="mainBgImage">
        <div class="content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 offset-lg-3 text-center">
                        <h1>About Me</h1>
                        <p>Based in Darlington, North East England I create bespoke websites and web applications that help businesses grow.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="aboutMePageBannerOne">
        <div class="container">
            <div class="row mb-4">
                <div class="col-lg-7">
                    <h6>Full Stack Developer</h6>
                    <h2 class="sectionTitle">Hi, I'm Matt</h2>
                    <p>
                        I'm a self taught full stack developer based in Darlington, County Durham and I have over 15+ years experience working within the digital industry.  I specialise in crafting bespoke websites and web applications for a range of sectors across the globe.  I mainly work with construction companies, educational & charity sectors, IT, Cyber Security and Service providers, Online Retails, the Security Industry and Transport and logistical industries.  However I am more than happy to work with any sector to help grow grow your business and deliver outstanding and bespoke websites and web applications.
                    </p>
                </div>
                <div class="col-lg-4 offset-lg-1">
                    <img class="myAvatarImage" src="{{ asset('images/matt-avator.svg') }}">
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <h2 class="whyWorkTitle">Why Work With Me?</h2>
                    <table class="table w-100">
                        <tbody>
                        <tr>
                            <td><i class="fa-solid fa-check"></i></td>
                            <td>
                                <strong>Full Stack</strong>
                                <p>
                                    I have the ability to run projects of all sizes from concept right through to production, solely by myself as well as being able to work across multiple teams enables me to fit within any business and provide the best service possible.
                                </p>
                            </td>
                        </tr>
                        <tr>
                            <td><i class="fas fa-check"></i></td>
                            <td>
                                <strong>Experienced</strong>
                                <p>
                                    I have 15+ years of experience working on a range of projects, both solo, as part of a team and as part of an agency or in-house team.  During this time I have experienced and learnt new things and overvcome problems providing me the tools to help many businesses succeed online.
                                </p>
                            </td>
                        </tr>
                        <tr>
                            <td><i class="fas fa-check"></i></td>
                            <td>
                                <strong>Knowledgeable</strong>
                                <p>
                                    Over the last 15+ years, I've had the pleasure of working on a range of different projects and with a range of diffent clients and sectors.  This has provided me with extensive knowledge of different industries, web design & development, web hosting and much more.
                                </p>
                            </td>
                        </tr>
                        <tr>
                            <td><i class="fas fa-check"></i></td>
                            <td>
                                <strong>Available</strong>
                                <p>
                                    I generally work on one project at a time, this ensures that all of my attention, knowledge of your requirements and your required outcomes stay as focussed as possible, ensuring a timely execution and delivery.
                                </p>
                            </td>
                        </tr>
                        <tr>
                            <td><i class="fas fa-check"></i></td>
                            <td>
                                <strong>Bespoke Results</strong>
                                <p>
                                    I dont use pre-built themes or templates, everything I do is completely bespoke.  This means your application or website will be completely unique to you, your business and created around your vision and requirements to deliver your desired results.
                                </p>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col-md-6">
                    <h3 class="toolsTechFrameworksTitle">Tools, Tech & Frameworks</h3>
                    <ul class="list-unstyled">
                        <li>
                            <strong>Languages & Frameworks</strong>
                            <div class="row gap-3 mb-4 ps-3">
                                <span class="badge">PHP</span>
                                <span class="badge">SQL</span>
                                <span class="badge">Javascript</span>
                                <span class="badge">jQuery</span>
                                <span class="badge">Bash</span>
                                <span class="badge">HTML</span>
                                <span class="badge">CSS</span>
                                <span class="badge">Laravel</span>
                                <span class="badge">Tailwind</span>
                                <span class="badge">Bootstrap</span>
                                <span class="badge">SASS</span>
                                <span class="badge">Less</span>
                                <span class="badge">Twig</span>
                            </div>
                        </li>
                        <li>
                            <strong>Databases</strong>
                            <div class="row gap-3 mb-4 ps-3">
                                <span class="badge">MySql</span>
                            </div>
                        </li>
                        <li>
                            <strong>API, Services & Package Managers</strong>
                            <div class="row gap-3 mb-4 ps-3">
                                <span class="badge">Sendgrid</span>
                                <span class="badge">Mailchimp</span>
                                <span class="badge">Mailtrap</span>
                                <span class="badge">Stripe</span>
                                <span class="badge">PayPal</span>
                                <span class="badge">Google Maps</span>
                                <span class="badge">Microsoft 365</span>
                                <span class="badge">Sharepoint</span>
                                <span class="badge">Linkedin</span>
                                <span class="badge">Facebook</span>
                                <span class="badge">NPM</span>
                                <span class="badge">Yarn</span>
                            </div>
                        </li>
                        <li>
                            <strong>Deployment, Hosting & Monitoring</strong>
                            <div class="row gap-3 mb-4 ps-3">
                                <span class="badge">GitHub</span>
                                <span class="badge">BitBucket</span>
                                <span class="badge">Jira</span>
                                <span class="badge">Docker</span>
                                <span class="badge">Forge</span>
                                <span class="badge">DigitalOcean</span>
                                <span class="badge">AWS</span>
                                <span class="badge">20i</span>
                                <span class="badge">Brixly</span>
                                <span class="badge">WHMCS</span>
                            </div>
                        </li>
                        <li>
                            <strong>Project Management</strong>
                            <div class="row gap-3 mb-4 ps-3">
                                <span class="badge">ClickUp</span>
                                <span class="badge">Perfex</span>
                                <span class="badge">Asana</span>
                                <span class="badge">Jira Software</span>
                            </div>
                        </li>
                        <li>
                            <strong>Design, UI/UX</strong>
                            <div class="row gap-3 mb-4 ps-3">
                                <span class="badge">Adobe XD</span>
                                <span class="badge">Figma</span>
                                <span class="badge">Affinity</span>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <section class="getStartedBanner">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-8">
                    <h5>Ready to start a project?</h5>
                    <h6>Get in touch with me or request a quote to get started today</h6>
                </div>
                <div class="col-lg-4">
                    <div class="btn-group">
                        <a href="{{ route('contact-me.index') }}" class="darkPurpleBtn btn-lg">Contact Me <i class="fas fa-arrow-right-long"></i></a>
                        <a href="{{ route('get-a-quote.index') }}" class="mediumPurpleBtn btn-lg">Get a quote <i class="fas fa-arrow-right-long"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
