@extends('includes.home.app')
@section('title')
    Blog
@endsection

@section('content')
    <!-- Detail Start -->
    <div class="container py-5">
        <div class="row">
            <div class="col-lg-8">

                @include('includes.home.message')

                <div class="d-flex flex-column text-left mb-3">
                    <h1 class="mb-3">{{ $getRecord->title }}</h1>
                    <div class="d-flex">
                        <p class="mr-3"><i class="fa fa-user text-primary"></i>{{ $getRecord->user_name }}</p>
                        <p class="mr-3">
                            <a href="{{ url($getRecord->category_slug) }}"><i class="fa fa-folder text-primary"></i>{{ $getRecord->category_name }}</a>
                        </p>
                        <p class="mr-3"><i class="fa fa-comments text-primary"></i>{{ $getRecord->getCommentCount() }}</p>
                    </div>
                </div>
                <div class="mb-5">
                    @if (!empty($getRecord->getImage()))
                        <img class="img-fluid rounded w-100 mb-4" src={{ $getRecord->getImage() }}
                            style="width: 100%;  object-fit: cover;" alt="{{ $getRecord->title }}" />
                    @endif

                    <p>{!! $getRecord->description !!}</p>
                </div>

                <!-- Related Post -->
                @if (!empty($getRelatedPost->count()))
                    <div class="mb-5 mx-n3">
                        <h2 class="mb-4 ml-3">Related Post</h2>
                        <div class="owl-carousel post-carousel position-relative">

                            @foreach ($getRelatedPost as $related)
                                <div class="d-flex align-items-center bg-light shadow-sm rounded overflow-hidden mx-3">
                                    <img class="img-fluid" src="{{ $related->getImage() }}"
                                        style="width: 80px; height: 80px; object-fit: cover;" />
                                    <div class="pl-3">
                                        <a href="{{ url($related->slug) }}" class="text-decoration-none">
                                            <h5 class="">{!! strip_tags(Str::substr($related->title, 0, 10)) !!}</h5>
                                        </a>
                                        <div class="d-flex">
                                            <small class="mr-3"><i class="fa fa-user text-primary"></i>{{ $related->user_name }}</small>
                                            <small class="mr-3"> 
                                                <a href="{{ url($related->category_slug) }}"> 
                                                    <i class="fa fa-folder text-primary"></i>{{ $related->category_slug }}
                                                </a>
                                            </small>
                                            <small class="mr-3"><i class="fa fa-comments text-primary"></i>{{ $related->getCommentCount() }}</small>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div>
                @endif

                <!-- Comment List -->
                <div class="mb-5">
                    <h2 class="mb-4">({{$getRecord->getComment->count()}}) Comments</h2>

                    @foreach ($getRecord->getComment as $comment)
                        <div class="media mb-4">
                            <img src="img/user.jpg" alt="Image" class="img-fluid rounded-circle mr-3 mt-1"
                                style="width: 45px" />
                            <div class="media-body">
                                <h6>
                                    {{$comment->user->name}} <small><i>{{date('d M Y', strtotime($comment->created_at))}} at {{date('h:i:A', strtotime($comment->created_at))}}</i></small>
                                </h6>
                                <p> 
                                    {{ $comment->comment }}
                                </p>
                                <button class="btn btn-sm btn-light ReplyOpen" id="{{$comment->id}}">Reply</button>

                                @foreach ($comment->getReply as $reply)
                                    <div class="media mt-4">
                                        <img src="img/user.jpg" alt="Image" class="img-fluid rounded-circle mr-3 mt-1"
                                            style="width: 45px" />
                                        <div class="media-body">
                                            <h6>
                                                {{$reply->user->name}} <small><i>{{date('d M Y', strtotime($reply->created_at))}} at {{date('h:i:A', strtotime($reply->created_at))}}</i></small>
                                            </h6>
                                            <p>
                                                {{$reply->comment}}
                                            </p>
                                        </div>
                                    </div>  
                                @endforeach

                                <div class="bg-light p-3 ShowReply{{$comment->id}}" style="display: none;">
                                    <h2 class="mb-4">Reply a comment</h2>
                                    <form method="POST" action="{{ route('blog_comment_reply_submit') }}">
                                        @csrf
                                        <input type="hidden" name="comment_id" value="{{ $comment->id }}">
                                        <div class="form-group">
                                            <label for="message">Comment</label>
                                            <textarea id="comment" name="comment" required cols="30" rows="5" class="form-control"></textarea>
                                        </div>
                                        <div class="form-group mb-0">
                                            <input type="submit" value="Reply" class="btn btn-primary px-3" />
                                        </div>
                                    </form>
                                </div>

                            </div>
                        </div>
                    @endforeach

                </div>

                <!-- Comment Form -->
                <div class="bg-light p-5">
                    <h2 class="mb-4">Leave a comment</h2>
                    <form method="POST" action="{{ route('blog_comment_submit') }}">
                        @csrf
                        <input type="hidden" name="blog_id" value="{{ $getRecord->id }}">
                        <div class="form-group">
                            <label for="message">Comment</label>
                            <textarea id="comment" name="comment" required cols="30" rows="5" class="form-control"></textarea>
                        </div>
                        <div class="form-group mb-0">
                            <input type="submit" value="Leave Comment" class="btn btn-primary px-3" />
                        </div>
                    </form>
                </div>
            </div>

            <div class="col-lg-4 mt-5 mt-lg-0">
                <!-- Author Bio -->
                {{-- <div class="d-flex flex-column text-center bg-primary rounded mb-5 py-5 px-4">
                    <img src="img/user.jpg" class="img-fluid rounded-circle mx-auto mb-3" style="width: 100px" />
                    <h3 class="text-secondary mb-3">John Doe</h3>
                    <p class="text-white m-0">
                        Conset elitr erat vero dolor ipsum et diam, eos dolor lorem ipsum,
                        ipsum ipsum sit no ut est. Guber ea ipsum erat kasd amet est elitr
                        ea sit.
                    </p>
                </div> --}}

                <!-- Search Form -->
                <div class="mb-5">
                    <form action="{{ route('home.blog') }}" method="GET">
                        <div class="input-group">
                            <input type="text" name="q" class="form-control form-control-lg" placeholder="Search" />
                            <div class="input-group-append">
                                <button class="input-group-text bg-transparent text-primary"><i
                                        class="fa fa-search"></i></button>
                            </div>
                        </div>
                    </form>
                </div>

                <!-- Category List -->
                <div class="mb-5">
                    <h2 class="mb-4">Categories</h2>
                    <ul class="list-group list-group-flush">

                        @foreach ($getCategory as $category)
                            <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                                <a href="{{ url($category->slug) }}">{{ $category->name }}</a>
                                <span class="badge badge-primary badge-pill">{{ $category->totalBlog() }}</span>
                            </li>
                        @endforeach

                    </ul>
                </div>

                <!-- Recent Post -->
                <div class="mb-5">
                    <h2 class="mb-4">Recent Post</h2>

                    @foreach ($getRecentPost as $recent)
                        <div class="d-flex align-items-center bg-light shadow-sm rounded overflow-hidden mb-3">
                            @if (!empty($recent->getImage()))
                                <img class="img-fluid" src="{{ $recent->getImage() }}"
                                    style="width: 80px; height: 80px; object-fit: cover" />
                            @endif
                            <div class="pl-3">
                                <a href="{{ url($recent->slug) }}" class="text-decoration-none">
                                    <h5 class="">{!! strip_tags(Str::substr($recent->title, 0, 10)) !!}</h5>
                                </a>
                                <div class="d-flex">
                                    <small class="mr-3"><i
                                            class="fa fa-user text-primary"></i>{{ $recent->user_name }}</small>
                                    <small class="mr-3">
                                        <a href="{{ url($recent->category_slug) }}">
                                            <i class="fa fa-folder text-primary"></i>{{ $recent->category_name }}
                                        </a>
                                    </small>
                                    <small class="mr-3"><i class="fa fa-comments text-primary"></i>{{ $recent->getCommentCount() }}</small>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Tag Cloud -->
                @if (!empty($getRecord->getTag->count()))
                    <div class="mb-5">
                        <h2 class="mb-4">Tag Cloud</h2>
                        <div class="d-flex flex-wrap m-n1">
                            @foreach ($getRecord->getTag as $tag)
                                <a href="{{ url('blog?q='.$tag->name) }}" class="btn btn-outline-primary m-1">{{$tag->name}}</a>
                            @endforeach
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
    <!-- Detail End -->
@endsection

@push('script')
    <script>
        $('.ReplyOpen').click(function(){
            var id=$(this).attr('id');
            $('.ShowReply'+id).toggle();
        });
    </script>
@endpush