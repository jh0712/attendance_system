@extends('demo.layouts.master')

@section('content')
            <div class="container-fluid">

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="page-title-box">
                                    <h4 class="page-title">Cards</h4>
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="javascript:void(0);">Lexa</a></li>
                                        <li class="breadcrumb-item"><a href="javascript:void(0);">UI Elements</a></li>
                                        <li class="breadcrumb-item active">Cards</li>
                                    </ol>

                                    <div class="state-information d-none d-sm-block">
                                        <div class="state-graph">
                                            <div id="header-chart-1"></div>
                                            <div class="info">Balance $ 2,317</div>
                                        </div>
                                        <div class="state-graph">
                                            <div id="header-chart-2"></div>
                                            <div class="info">Item Sold 1230</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->

                        <div class="row">
                            <div class="col-md-6 col-lg-6 col-xl-3">

                                <!-- Simple card -->
                                <div class="card m-b-30">
                                    <img class="card-img-top img-fluid" src="{{URL::asset('assets/images/small/img-1.jpg')}}" alt="Card image cap">
                                    <div class="card-body">
                                        <h4 class="card-title font-20 mt-0">Card title</h4>
                                        <p class="card-text">Some quick example text to build on the card title and make
                                            up the bulk of the card's content.</p>
                                        <a href="#" class="btn btn-primary waves-effect waves-light">Button</a>
                                    </div>
                                </div>

                            </div><!-- end col -->

                            <div class="col-md-6 col-lg-6 col-xl-3">

                                <div class="card m-b-30">
                                    <img class="card-img-top img-fluid" src="{{URL::asset('assets/images/small/img-2.jpg')}}" alt="Card image cap">
                                    <div class="card-body">
                                        <h4 class="card-title font-20 mt-0">Card title</h4>
                                        <p class="card-text">Some quick example text to build on the card title and make
                                            up the bulk of the card's content.</p>
                                    </div>
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item">Cras justo odio</li>
                                        <li class="list-group-item">Dapibus ac facilisis in</li>
                                    </ul>
                                    <div class="card-body">
                                        <a href="#" class="card-link">Card link</a>
                                        <a href="#" class="card-link">Another link</a>
                                    </div>
                                </div>

                            </div><!-- end col -->

                            <div class="col-md-6 col-lg-6 col-xl-3">

                                <div class="card m-b-30">
                                    <img class="card-img-top img-fluid" src="{{URL::asset('assets/images/small/img-3.jpg')}}" alt="Card image cap">
                                    <div class="card-body">
                                        <p class="card-text">Some quick example text to build on the card title and make
                                            up the bulk of the card's content.</p>
                                    </div>
                                </div>

                            </div><!-- end col -->


                            <div class="col-md-6 col-lg-6 col-xl-3">

                                <div class="card m-b-30">
                                    <div class="card-body">
                                        <h4 class="card-title font-20 mt-0">Card title</h4>
                                        <h6 class="card-subtitle text-muted">Support card subtitle</h6>
                                    </div>
                                    <img class="img-fluid" src="{{URL::asset('assets/images/small/img-4.jpg')}}" alt="Card image cap">
                                    <div class="card-body">
                                        <p class="card-text">Some quick example text to build on the card title and make
                                            up the bulk of the card's content.</p>
                                        <a href="#" class="card-link">Card link</a>
                                        <a href="#" class="card-link">Another link</a>
                                    </div>
                                </div>

                            </div><!-- end col -->
                        </div>
                        <!-- end row -->

                        <div class="row">
                            <div class="col-md-6">
                                <div class="card m-b-30 card-body">
                                    <h3 class="card-title font-20 mt-0">Special title treatment</h3>
                                    <p class="card-text">With supporting text below as a natural lead-in to additional
                                        content.</p>
                                    <a href="#" class="btn btn-primary waves-effect waves-light">Go somewhere</a>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card m-b-30 card-body">
                                    <h3 class="card-title font-20 mt-0">Special title treatment</h3>
                                    <p class="card-text">With supporting text below as a natural lead-in to additional
                                        content.</p>
                                    <a href="#" class="btn btn-primary waves-effect waves-light">Go somewhere</a>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->

                        <div class="row">
                            <div class="col-lg-4">
                                <div class="card m-b-30 card-body">
                                    <h4 class="card-title font-20 mt-0">Special title treatment</h4>
                                    <p class="card-text">With supporting text below as a natural lead-in to additional
                                        content.</p>
                                    <a href="#" class="btn btn-primary waves-effect waves-light">Go somewhere</a>
                                </div>
                            </div>

                            <div class="col-lg-4 ">
                                <div class="card m-b-30 card-body text-center">
                                    <h4 class="card-title font-20 mt-0">Special title treatment</h4>
                                    <p class="card-text">With supporting text below as a natural lead-in to additional
                                        content.</p>
                                    <a href="#" class="btn btn-primary waves-effect waves-light">Go somewhere</a>
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="card m-b-30 card-body text-right">
                                    <h4 class="card-title font-20 mt-0">Special title treatment</h4>
                                    <p class="card-text">With supporting text below as a natural lead-in to additional
                                        content.</p>
                                    <a href="#" class="btn btn-primary waves-effect waves-light">Go somewhere</a>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->


                        <div class="row">
                            <div class="col-lg-4">
                                <div class="card m-b-30">
                                    <h4 class="card-header mt-0">Featured</h4>
                                    <div class="card-body">
                                        <h4 class="card-title font-20 mt-0">Special title treatment</h4>
                                        <p class="card-text">With supporting text below as a natural lead-in to
                                            additional content.</p>
                                        <a href="#" class="btn btn-primary">Go somewhere</a>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="card m-b-30">
                                    <div class="card-header">
                                        Quote
                                    </div>
                                    <div class="card-body">
                                        <blockquote class="card-blockquote mb-0">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere
                                                erat a ante.</p>
                                            <footer class="blockquote-footer  font-14">
                                                Someone famous in <cite title="Source Title">Source Title</cite>
                                            </footer>
                                        </blockquote>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="card m-b-30">
                                    <div class="card-header">
                                        Featured
                                    </div>
                                    <div class="card-body">
                                        <h4 class="card-title font-20 mt-0">Special title treatment</h4>
                                        <p class="card-text">With supporting text below as a natural lead-in to
                                            additional content.</p>
                                        <a href="#" class="btn btn-primary waves-effect waves-light">Go somewhere</a>
                                    </div>
                                    <div class="card-footer text-muted">
                                        2 days ago
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->


                        <div class="row">
                            <div class="col-lg-4">
                                <div class="card m-b-30">
                                    <img class="card-img-top img-fluid" src="{{URL::asset('assets/images/small/img-5.jpg')}}" alt="Card image cap">
                                    <div class="card-body">
                                        <h4 class="card-title font-20 mt-0">Card title</h4>
                                        <p class="card-text">This is a wider card with supporting text below as a
                                            natural lead-in to additional content. This content is a little bit
                                            longer.</p>
                                        <p class="card-text">
                                            <small class="text-muted">Last updated 3 mins ago</small>
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="card m-b-30">
                                    <div class="card-body">
                                        <h4 class="card-title font-20 mt-0">Card title</h4>
                                        <p class="card-text">This is a wider card with supporting text below as a
                                            natural lead-in to additional content. This content is a little bit
                                            longer.</p>
                                        <p class="card-text">
                                            <small class="text-muted">Last updated 3 mins ago</small>
                                        </p>
                                    </div>
                                    <img class="card-img-bottom img-fluid" src="{{URL::asset('assets/images/small/img-7.jpg')}}" alt="Card image cap">
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="card m-b-30">
                                    <img class="card-img img-fluid" src="{{URL::asset('assets/images/small/img-6.jpg')}}" alt="Card image">
                                    <div class="card-img-overlay">
                                        <h4 class="card-title text-white font-20 mt-0">Card title</h4>
                                        <p class="card-text text-light">This is a wider card with supporting text below as a
                                            natural lead-in to additional content. This content is a little bit
                                            longer.</p>
                                        <p class="card-text">
                                            <small class="text-white">Last updated 3 mins ago</small>
                                        </p>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <!-- end row -->

                        <div class="row">
                            <div class="col-lg-4">
                                <div class="card m-b-30 text-white bg-dark">
                                    <div class="card-body">
                                        <blockquote class="card-blockquote mb-0">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere
                                                erat a ante.</p>
                                            <footer class="blockquote-footer text-white font-14">
                                                Someone famous in <cite title="Source Title">Source Title</cite>
                                            </footer>
                                        </blockquote>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="card m-b-30 text-white bg-primary">
                                    <div class="card-body">
                                        <blockquote class="card-blockquote mb-0">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere
                                                erat a ante.</p>
                                            <footer class="blockquote-footer text-white font-14">
                                                Someone famous in <cite title="Source Title">Source Title</cite>
                                            </footer>
                                        </blockquote>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="card m-b-30 text-white bg-success">
                                    <div class="card-body">
                                        <blockquote class="card-blockquote mb-0">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere
                                                erat a ante.</p>
                                            <footer class="blockquote-footer text-white font-14">
                                                Someone famous in <cite title="Source Title">Source Title</cite>
                                            </footer>
                                        </blockquote>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->


                        <div class="row">
                            <div class="col-lg-4">
                                <div class="card m-b-30 text-white bg-info">
                                    <div class="card-body">
                                        <blockquote class="card-blockquote mb-0">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere
                                                erat a ante.</p>
                                            <footer class="blockquote-footer text-white font-14">
                                                Someone famous in <cite title="Source Title">Source Title</cite>
                                            </footer>
                                        </blockquote>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="card m-b-30 text-white bg-warning">
                                    <div class="card-body">
                                        <blockquote class="card-blockquote mb-0">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere
                                                erat a ante.</p>
                                            <footer class="blockquote-footer text-white font-14">
                                                Someone famous in <cite title="Source Title">Source Title</cite>
                                            </footer>
                                        </blockquote>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="card m-b-30 text-white bg-danger">
                                    <div class="card-body">
                                        <blockquote class="card-blockquote mb-0">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere
                                                erat a ante.</p>
                                            <footer class="blockquote-footer text-white font-14">
                                                Someone famous in <cite title="Source Title">Source Title</cite>
                                            </footer>
                                        </blockquote>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->


                        <div class="row m-b-30">
                            <div class="col-12">
                                <h4 class="m-t-20 m-b-30">Decks</h4>
                                <div class="card-deck-wrapper">
                                    <div class="card-deck">
                                        <div class="card m-b-30">
                                            <img class="card-img-top img-fluid" src="{{URL::asset('assets/images/small/img-4.jpg')}}" alt="Card image cap">
                                            <div class="card-body">
                                                <h4 class="card-title font-20 mt-0">Card title</h4>
                                                <p class="card-text">This is a longer card with supporting text below as
                                                    a natural lead-in to additional content. This content is a little
                                                    bit longer.</p>
                                                <p class="card-text">
                                                    <small class="text-muted">Last updated 3 mins ago</small>
                                                </p>
                                            </div>
                                        </div>
                                        <div class="card m-b-30">
                                            <img class="card-img-top img-fluid" src="{{URL::asset('assets/images/small/img-5.jpg')}}" alt="Card image cap">
                                            <div class="card-body">
                                                <h4 class="card-title font-20 mt-0">Card title</h4>
                                                <p class="card-text">This card has supporting text below as a natural
                                                    lead-in to additional content.</p>
                                                <p class="card-text">
                                                    <small class="text-muted">Last updated 3 mins ago</small>
                                                </p>
                                            </div>
                                        </div>
                                        <div class="card m-b-30">
                                            <img class="card-img-top img-fluid" src="{{URL::asset('assets/images/small/img-6.jpg')}}" alt="Card image cap">
                                            <div class="card-body">
                                                <h4 class="card-title font-20 mt-0">Card title</h4>
                                                <p class="card-text">This is a wider card with supporting text below as
                                                    a natural lead-in to additional content. This card has even longer
                                                    content than the first to show that equal height action.</p>
                                                <p class="card-text">
                                                    <small class="text-muted">Last updated 3 mins ago</small>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->

                    </div> <!-- container-fluid -->
@endsection
