@extends('frontend.layouts.master')
@section('title', $blog->getMetaTitle())
@section('description', $blog->getMetaDescription())
@section('styles')

@endsection
@section('content')
    <!-- breadcrumb-area -->
    <section class="breadcrumb-area tg-motion-effects breadcrumb-bg" data-background="/frontend/assets/img/bg/h3_product_bg.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-content">
                        <h2 class="title">{{$blog->getName()}}</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/">{{__('Anasayfa')}}</a></li>
                                <li class="breadcrumb-item"><a href="{{route('blog.index')}}">{{__('Tüm Bloglar')}}</a></li>
                                <li class="breadcrumb-item"><a href="{{route('blog.category', $blog->category->getSlug())}}">{{$blog->category->getName()}}</a></li>
                                <li class="breadcrumb-item active" aria-current="page">{{__('Blog Detayı')}}</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb-area-end -->

    <!-- blog-details-area -->
    <section class="blog-area blog-details-area blog-bg">
        <div class="container custom-container-five">
            <div class="blog-inner-wrap">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="blog-details-wrap">
                            <div class="blog-thumb">
                                <img src="{{image($blog->image)}}" alt="">
                            </div>
                            <div class="blog-content blog-details-content">
                                {!! $blog->getContent() !!}
                            </div>
                        </div>
                        @if($blog->comments->count() > 0)
                            <div class="comments-wrap" id="comments">
                                <h4 class="comments-wrap-title">{{__('Yorumlar')}}</h4>
                                <div class="latest-comments">
                                    <ul class="list-wrap">
                                        @foreach($blog->comments as $comment)
                                            <li>
                                                <div class="comments-box">
                                                    <div class="comments-avatar">
                                                        <img src="{{image($comment->image)}}" style="width: 120px;height: 120px;object-fit: cover" alt="img">
                                                    </div>
                                                    <div class="comments-text">
                                                        <div class="avatar-name">
                                                            <h6 class="name">{{$comment->getUserName()}}</h6>
                                                        </div>
                                                        <p>{{$comment->getComment()}}</p>
                                                        <div class="comment-reply">
                                                            <a href="#"><i class="fas fa-reply-all"></i> Reply</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        @endif


                    </div>
                    <div class="col-lg-4 col-md-8">
                        <div class="blog-sidebar">
                            <div class="blog-widget">
                                <h4 class="sw-title">{{__('Kategoriler')}}</h4>
                                <div class="sidebar-cat-list">
                                    <ul class="list-wrap">
                                        @foreach($blogCategories as $blogCategory)
                                            <li><a href="{{route('blog.category', $blogCategory->getSlug())}}">{{$blogCategory->getName()}} <span>({{$blogCategory->blogs->count()}})</span></a></li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            <div class="blog-widget">
                                <h4 class="sw-title">{{__('Son Bloglar')}}</h4>
                                <div class="rc-post-list">
                                    @foreach($latestBlog as $latestBlogItem)
                                        <div class="rc-post-item">
                                            <div class="thumb">
                                                <a href="{{route('blog.detail', $latestBlogItem->getSlug())}}">
                                                    <img style="border-radius: 10px" src="{{image($latestBlogItem->image)}}" alt=""></a>
                                            </div>
                                            <div class="content">
                                                <h4 class="title"><a href="{{route('blog.detail', $latestBlogItem->getSlug())}}">{{$latestBlogItem->getName()}}</a></h4>
                                                <span class="date"><i class="fas fa-calendar-alt"></i>{{$latestBlogItem->created_at->translatedFormat('d F Y')}}</span>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="blog-widget">
                                <h4 class="sw-title">{{__('Başlıklar')}}</h4>
                                <div class="sidebar-tag-list">
                                    <ul class="list-wrap">
                                        @foreach($heads as $head)
                                            <li class="pb-2 border-bottom">
                                                <a href="#head-{{$loop->index}}">{!! $head !!} </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            {{--
                            <div class="blog-widget">
                                <div class="sidebar-add-banner">
                                    <a href="#"><img src="/frontend/assets/img/blog/add_banner.jpg" alt=""></a>
                                </div>
                            </div>
                            --}}

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- blog-details-area-end -->


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
