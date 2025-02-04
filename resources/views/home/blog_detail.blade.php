@extends('includes.home.app')
@section('title')
    Blog
@endsection

@section('content')
    <!-- Detail Start -->
    <div class="container py-5">
        <div class="row">
            <div class="col-lg-8">
                <div class="d-flex flex-column text-left mb-3">
                    <h1 class="mb-3">{{ $getRecord->title }}</h1>
                    <div class="d-flex">
                        <p class="mr-3"><i class="fa fa-user text-primary"></i>{{$getRecord->user_name}}</p>
                        <p class="mr-3">
                            <i class="fa fa-folder text-primary"></i>{{$getRecord->category_name}}
                        </p>
                        <p class="mr-3"><i class="fa fa-comments text-primary"></i> 15</p>
                    </div>
                </div>
                <div class="mb-5">
                    @if (!empty($getRecord->getImage()))
                        <img class="img-fluid rounded w-100 mb-4" src={{$getRecord->getImage()}} style="width: 100%;  object-fit: cover;" alt="{{$getRecord->title}}" />
                    @endif
                    
                    <p>{!! $getRecord->description !!}</p>
                </div>

                <!-- Related Post -->
                <div class="mb-5 mx-n3">
                    <h2 class="mb-4 ml-3">Related Post</h2>
                    <div class="owl-carousel post-carousel position-relative">
                        <div class="d-flex align-items-center bg-light shadow-sm rounded overflow-hidden mx-3">
                            <img class="img-fluid" src="img/post-1.jpg" style="width: 80px; height: 80px" />
                            <div class="pl-3">
                                <h5 class="">Diam amet eos at no eos</h5>
                                <div class="d-flex">
                                    <small class="mr-3"><i class="fa fa-user text-primary"></i> Admin</small>
                                    <small class="mr-3"><i class="fa fa-folder text-primary"></i> Web
                                        Design</small>
                                    <small class="mr-3"><i class="fa fa-comments text-primary"></i> 15</small>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex align-items-center bg-light shadow-sm rounded overflow-hidden mx-3">
                            <img class="img-fluid" src="img/post-2.jpg" style="width: 80px; height: 80px" />
                            <div class="pl-3">
                                <h5 class="">Diam amet eos at no eos</h5>
                                <div class="d-flex">
                                    <small class="mr-3"><i class="fa fa-user text-primary"></i> Admin</small>
                                    <small class="mr-3"><i class="fa fa-folder text-primary"></i> Web
                                        Design</small>
                                    <small class="mr-3"><i class="fa fa-comments text-primary"></i> 15</small>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex align-items-center bg-light shadow-sm rounded overflow-hidden mx-3">
                            <img class="img-fluid" src="img/post-3.jpg" style="width: 80px; height: 80px" />
                            <div class="pl-3">
                                <h5 class="">Diam amet eos at no eos</h5>
                                <div class="d-flex">
                                    <small class="mr-3"><i class="fa fa-user text-primary"></i> Admin</small>
                                    <small class="mr-3"><i class="fa fa-folder text-primary"></i> Web
                                        Design</small>
                                    <small class="mr-3"><i class="fa fa-comments text-primary"></i> 15</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Comment List -->
                <div class="mb-5">
                    <h2 class="mb-4">3 Comments</h2>
                    <div class="media mb-4">
                        <img src="img/user.jpg" alt="Image" class="img-fluid rounded-circle mr-3 mt-1"
                            style="width: 45px" />
                        <div class="media-body">
                            <h6>
                                John Doe <small><i>01 Jan 2045 at 12:00pm</i></small>
                            </h6>
                            <p>
                                Diam amet duo labore stet elitr ea clita ipsum, tempor labore
                                accusam ipsum et no at. Kasd diam tempor rebum magna dolores
                                sed sed eirmod ipsum. Gubergren clita aliquyam consetetur
                                sadipscing, at tempor amet ipsum diam tempor consetetur at
                                sit.
                            </p>
                            <button class="btn btn-sm btn-light">Reply</button>
                        </div>
                    </div>
                    <div class="media mb-4">
                        <img src="img/user.jpg" alt="Image" class="img-fluid rounded-circle mr-3 mt-1"
                            style="width: 45px" />
                        <div class="media-body">
                            <h6>
                                John Doe <small><i>01 Jan 2045 at 12:00pm</i></small>
                            </h6>
                            <p>
                                Diam amet duo labore stet elitr ea clita ipsum, tempor labore
                                accusam ipsum et no at. Kasd diam tempor rebum magna dolores
                                sed sed eirmod ipsum. Gubergren clita aliquyam consetetur
                                sadipscing, at tempor amet ipsum diam tempor consetetur at
                                sit.
                            </p>
                            <button class="btn btn-sm btn-light">Reply</button>
                            <div class="media mt-4">
                                <img src="img/user.jpg" alt="Image" class="img-fluid rounded-circle mr-3 mt-1"
                                    style="width: 45px" />
                                <div class="media-body">
                                    <h6>
                                        John Doe <small><i>01 Jan 2045 at 12:00pm</i></small>
                                    </h6>
                                    <p>
                                        Diam amet duo labore stet elitr ea clita ipsum, tempor
                                        labore accusam ipsum et no at. Kasd diam tempor rebum
                                        magna dolores sed sed eirmod ipsum. Gubergren clita
                                        aliquyam consetetur, at tempor amet ipsum diam tempor at
                                        sit.
                                    </p>
                                    <button class="btn btn-sm btn-light">Reply</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Comment Form -->
                <div class="bg-light p-5">
                    <h2 class="mb-4">Leave a comment</h2>
                    <form>
                        <div class="form-group">
                            <label for="name">Name *</label>
                            <input type="text" class="form-control" id="name" />
                        </div>
                        <div class="form-group">
                            <label for="email">Email *</label>
                            <input type="email" class="form-control" id="email" />
                        </div>
                        <div class="form-group">
                            <label for="website">Website</label>
                            <input type="url" class="form-control" id="website" />
                        </div>

                        <div class="form-group">
                            <label for="message">Message *</label>
                            <textarea id="message" cols="30" rows="5" class="form-control"></textarea>
                        </div>
                        <div class="form-group mb-0">
                            <input type="submit" value="Leave Comment" class="btn btn-primary px-3" />
                        </div>
                    </form>
                </div>
            </div>

            <div class="col-lg-4 mt-5 mt-lg-0">
                <!-- Author Bio -->
                <div class="d-flex flex-column text-center bg-primary rounded mb-5 py-5 px-4">
                    <img src="img/user.jpg" class="img-fluid rounded-circle mx-auto mb-3" style="width: 100px" />
                    <h3 class="text-secondary mb-3">John Doe</h3>
                    <p class="text-white m-0">
                        Conset elitr erat vero dolor ipsum et diam, eos dolor lorem ipsum,
                        ipsum ipsum sit no ut est. Guber ea ipsum erat kasd amet est elitr
                        ea sit.
                    </p>
                </div>

                <!-- Search Form -->
                <div class="mb-5">
                    <form action="">
                        <div class="input-group">
                            <input type="text" class="form-control form-control-lg" placeholder="Keyword" />
                            <div class="input-group-append">
                                <span class="input-group-text bg-transparent text-primary"><i
                                        class="fa fa-search"></i></span>
                            </div>
                        </div>
                    </form>
                </div>

                <!-- Category List -->
                <div class="mb-5">
                    <h2 class="mb-4">Categories</h2>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                            <a href="">Web Design</a>
                            <span class="badge badge-primary badge-pill">150</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                            <a href="">Web Development</a>
                            <span class="badge badge-primary badge-pill">131</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                            <a href="">Online Marketing</a>
                            <span class="badge badge-primary badge-pill">78</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                            <a href="">Keyword Research</a>
                            <span class="badge badge-primary badge-pill">56</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                            <a href="">Email Marketing</a>
                            <span class="badge badge-primary badge-pill">98</span>
                        </li>
                    </ul>
                </div>

                <!-- Single Image -->
                <div class="mb-5">
                    <img src="img/blog-1.jpg" alt="" class="img-fluid rounded" />
                </div>

                <!-- Recent Post -->
                <div class="mb-5">
                    <h2 class="mb-4">Recent Post</h2>
                    <div class="d-flex align-items-center bg-light shadow-sm rounded overflow-hidden mb-3">
                        <img class="img-fluid" src="img/post-1.jpg" style="width: 80px; height: 80px" />
                        <div class="pl-3">
                            <h5 class="">Diam amet eos at no eos</h5>
                            <div class="d-flex">
                                <small class="mr-3"><i class="fa fa-user text-primary"></i> Admin</small>
                                <small class="mr-3"><i class="fa fa-folder text-primary"></i> Web Design</small>
                                <small class="mr-3"><i class="fa fa-comments text-primary"></i> 15</small>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex align-items-center bg-light shadow-sm rounded overflow-hidden mb-3">
                        <img class="img-fluid" src="img/post-2.jpg" style="width: 80px; height: 80px" />
                        <div class="pl-3">
                            <h5 class="">Diam amet eos at no eos</h5>
                            <div class="d-flex">
                                <small class="mr-3"><i class="fa fa-user text-primary"></i> Admin</small>
                                <small class="mr-3"><i class="fa fa-folder text-primary"></i> Web Design</small>
                                <small class="mr-3"><i class="fa fa-comments text-primary"></i> 15</small>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex align-items-center bg-light shadow-sm rounded overflow-hidden mb-3">
                        <img class="img-fluid" src="img/post-3.jpg" style="width: 80px; height: 80px" />
                        <div class="pl-3">
                            <h5 class="">Diam amet eos at no eos</h5>
                            <div class="d-flex">
                                <small class="mr-3"><i class="fa fa-user text-primary"></i> Admin</small>
                                <small class="mr-3"><i class="fa fa-folder text-primary"></i> Web Design</small>
                                <small class="mr-3"><i class="fa fa-comments text-primary"></i> 15</small>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Single Image -->
                <div class="mb-5">
                    <img src="img/blog-2.jpg" alt="" class="img-fluid rounded" />
                </div>

                <!-- Tag Cloud -->
                <div class="mb-5">
                    <h2 class="mb-4">Tag Cloud</h2>
                    <div class="d-flex flex-wrap m-n1">
                        <a href="" class="btn btn-outline-primary m-1">Design</a>
                        <a href="" class="btn btn-outline-primary m-1">Development</a>
                        <a href="" class="btn btn-outline-primary m-1">Marketing</a>
                        <a href="" class="btn btn-outline-primary m-1">SEO</a>
                        <a href="" class="btn btn-outline-primary m-1">Writing</a>
                        <a href="" class="btn btn-outline-primary m-1">Consulting</a>
                    </div>
                </div>

                <!-- Single Image -->
                <div class="mb-5">
                    <img src="img/blog-3.jpg" alt="" class="img-fluid rounded" />
                </div>

                <!-- Plain Text -->
                <div>
                    <h2 class="mb-4">Plain Text</h2>
                    Aliquyam sed lorem stet diam dolor sed ut sit. Ut sanctus erat ea
                    est aliquyam dolor et. Et no consetetur eos labore ea erat voluptua
                    et. Et aliquyam dolore sed erat. Magna sanctus sed eos tempor rebum
                    dolor, tempor takimata clita sit et elitr ut eirmod.
                </div>
            </div>
        </div>
    </div>
    <!-- Detail End -->
@endsection
