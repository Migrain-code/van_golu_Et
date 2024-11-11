@extends('frontend.layouts.master')
@section('title', $blog->getMetaTitle())
@section('description', $blog->getMetaDescription())
@section('styles')

@endsection
@section('content')
    <div class="section-xl bg-image parallax" data-bg-src="{{image($blog->image)}}">
        <div class="bg-dark-06">
            <div class="container text-center">
                <h1 class="fw-light">{{$blog->getName()}}</h1>
                <ul class="list-inline-dash">
                    <li><a href="/">{{__('Anasayfa')}}</a></li>
                    <li><a href="{{route('blog.index')}}">{{__('Tüm Bloglar')}}</a></li>
                    <li><a href="{{route('blog.category', $blog->category->getSlug())}}">{{$blog->category->getName()}}</a></li>
                    <li><a href="#comments"><i class="fa fa-comment-dots"></i> {{$blog->comments->count()}} {{__('Yorum')}}</a></li>
                </ul>
            </div><!-- end container -->
        </div>
    </div>

    <!-- Blog Post section -->
    <div class="section py-lg-5 py-4" >
        <div class="container">
            <div class="row g-4">
                <div class="col-12 col-lg-8 order-lg-0 order-1">
                    <div class="mb-4">
                        <div class="row gallery-wrapper spacing-3">
                            <!-- Gallery image box 1 -->
                            <div class="col-12 gallery-box">
                                <div class="gallery-img">
                                    <a href="{{image($blog->image)}}" data-gallery-title="Gallery Image 1">
                                        <img src="{{image($blog->image)}}" alt="">
                                    </a>
                                </div>
                            </div>

                        </div>
                     </div>
                    <div class="content" id="contentBox">
                        {!! $blog->getContent() !!}
                    </div>
                </div>
                <div class="col-lg-4 col-12 border py-3 order-lg-1 order-0" style="height: max-content">
                    <h6 class="font-small fw-medium uppercase mb-4 text-center">{{__('İçindekiler')}}</h6>
                    <ul class="list-unstyled">
                        @foreach($heads as $head)
                            <li class="pb-2 border-bottom">
                                <a href="#head-{{$loop->index}}">{!! $head !!} </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
                <!-- end row -->
        </div>
            <!-- end container -->
    </div>
    <!-- end Blog Post section -->
    @if($blog->comments->count() > 0)
        <!-- Comments section -->
        <div class="section order-2" id="comments">
            <div class="container">
                <div class="row g-4">
                    <div class="col-8 col-sm-10 offset-sm-1 col-md-8 offset-md-2">
                        <h4 class="mb-5 text-center">{{__('Yorumlar')}}</h4>
                        @foreach($blog->comments as $comment)
                            <!-- Comment box 1 -->
                            <div class="comment-box">
                                <div class="comment-user-avatar">
                                    <i class="fa fa-user"></i>
                                </div>
                                <div class="comment-content">
                                    <span class="comment-time">{{$comment->created_at->diffForHumans()}}</span>
                                    <h6 class="fw-normal">{{$comment->getUserName()}}</h6>
                                    <p>{{$comment->getComment()}}</p>
                                </div>
                            </div>
                            <!-- Comment box 2 -->
                        @endforeach
                    </div>
                </div><!-- end row -->
            </div><!-- end container -->
        </div>
        <!-- end Comments section -->
    @endif


@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            var container = document.getElementById('contentBox');
            const hElements = container.querySelectorAll('h1, h2, h3, h4, h5');

            for (let i = 0; i < hElements.length; i++) {
                hElements[i].setAttribute('id', `head-${i}`);
            }
        });
    </script>
@endsection
