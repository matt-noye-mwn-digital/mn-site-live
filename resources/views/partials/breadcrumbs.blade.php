<section class="breadcrumbsBanner">
    <div class="container">
        <div class="row">
            <div class="col-12">
                @unless($breadcrumbs->isEmpty())
                    <ol class="breadcrumb">

                        @foreach($breadcrumbs as $breadcrumb)



                            @if(!is_null($breadcrumb->url) && !$loop->last)

                                <li class="breadcrumb-item"><a href="@{{ $breadcrumb->url }}">{{ $breadcrumb->title }}</a></li>

                            @else

                                <li class="breadcrumb-item active">{{ $breadcrumb->title }}</li>

                            @endif



                        @endforeach

                    </ol>
                @endunless
            </div>
        </div>
    </div>
</section>
