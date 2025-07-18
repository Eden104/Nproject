@extends ('layouts.layout')

@section('title', 'About Us')

@section('header')
 @include('front.headerAbout')
@endsection 

@section('footer')
 @include('front.footer')
@endsection

@section('content')



<!-- content
    ================================================== -->
    <section class="s-content">

        <div class="row">
            <div class="column large-12">

                <article class="s-content__entry">

                    <div class="s-content__media">
                        <img src="images/thumbs/about/about-1050.jpg" 
                                srcset="images/thumbs/about/about-2100.jpg 2100w, 
                                        images/thumbs/about/about-1050.jpg 1050w, 
                                        images/thumbs/about/about-525.jpg 525w" sizes="(max-width: 2100px) 100vw, 2100px" alt="">

                    </div> <!-- end s-content__media -->

                    <div class="s-content__entry-header">
                        <h1 class="s-content__title">Learn More About Story.</h1>
                    </div> <!-- end s-content__entry-header -->

                    <div class="s-content__primary">

                        <div class="s-content__page-content">

                            <p class="lead">
                            Duis ex ad cupidatat tempor Excepteur cillum cupidatat fugiat nostrud cupidatat dolor sunt sint sit nisi est eu 
                            exercitation incididunt adipisicing veniam velit id fugiat enim mollit amet anim veniam dolor dolor irure velit 
                            commodo cillum sit nulla ullamco magna amet magna cupidatat qui labore cillum sit in tempor veniam consequat non 
                            laborum adipisicing aliqua ea nisi sint ut quis proident ullamco ut dolore culpa occaecat ut laboris in sit minim 
                            cupidatat ut dolor voluptate enim veniam consequat occaecat fugiat in adipisicing in amet Ut nulla nisi non ut 
                            enim aliqua laborum mollit quis nostrud sed sed.
                            </p>
                            
                            <p>
                            Lorem ipsum Nisi cillum reprehenderit minim sunt dolore dolor eiusmod eu aliquip ad ut sint dolore laborum 
                            voluptate ullamco dolore aliquip enim. Excepteur cillum cupidatat fugiat nostrud cupidatat dolor sunt sint sit 
                            nisi est eu exercitation incididunt adipisicing
                            </p> 

                            <p>
                            Lorem ipsum Cillum sit sunt dolore non aute enim pariatur deserunt magna reprehenderit veniam officia ullamco 
                            eiusmod laborum commodo veniam elit proident enim sit cillum ex aliquip dolore labore sint ut deserunt officia 
                            veniam consectetur in in quis eu consectetur non sint Duis mollit Ut magna irure.
                            </p>

                            <br>

                            <div class="row block-large-1-2 block-tab-full s-content__blocks">
                                <div class="column">
                                    <h4>Who.</h4>
                                    <p>
                                    Lorem ipsum Nisi amet fugiat eiusmod et aliqua ad qui ut nisi Ut aute anim mollit fugiat qui sit ex 
                                    occaecat et eu mollit nisi pariatur fugiat deserunt dolor veniam reprehenderit aliquip magna nisi 
                                    consequat aliqua veniam in aute ullamco Duis laborum ad non pariatur sit.
                                    </p>
                                </div>

                                <div class="column">
                                    <h4>When.</h4>
                                    <p>
                                    Lorem ipsum Nisi amet fugiat eiusmod et aliqua ad qui ut nisi Ut aute anim mollit fugiat qui sit ex 
                                    occaecat et eu mollit nisi pariatur fugiat deserunt dolor veniam reprehenderit aliquip magna nisi 
                                    consequat aliqua veniam in aute ullamco Duis laborum ad non pariatur sit.
                                    </p>
                                </div>

                                <div class="column">
                                    <h4>What.</h4>
                                    <p>
                                    Lorem ipsum Nisi amet fugiat eiusmod et aliqua ad qui ut nisi Ut aute anim mollit fugiat qui sit ex 
                                    occaecat et eu mollit nisi pariatur fugiat deserunt dolor veniam reprehenderit aliquip magna nisi 
                                    consequat aliqua veniam in aute ullamco Duis laborum ad non pariatur sit.
                                    </p>
                                </div>

                                <div class="column">
                                    <h4>How.</h4>
                                    <p>
                                    Lorem ipsum Nisi amet fugiat eiusmod et aliqua ad qui ut nisi Ut aute anim mollit fugiat qui 
                                    sit ex occaecat et eu mollit nisi pariatur fugiat deserunt dolor veniam reprehenderit aliquip 
                                    magna nisi consequat aliqua veniam in aute ullamco Duis laborum ad non pariatur sit.
                                    </p>
                                </div>

                            </div>
                        </div> <!-- end s-entry__page-content -->

                    </div> <!-- end s-content__primary -->
                </article> <!-- end entry -->

            </div> <!-- end column -->
        </div> <!-- end row -->

    </section> <!-- end s-content -->


@endsection