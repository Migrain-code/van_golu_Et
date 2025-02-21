
<div class="blog-widget">
    <h4 class="sw-title">{{__('Popüler Bloglar')}}</h4>
    <div class="rc-post-list">
        @foreach($latestBlog as $blogItem)
        <div class="rc-post-item">
            <div class="thumb">
                <a href="{{route('blog.detail', $blogItem->getSlug())}}"><img src="{{image($blogItem->image)}}" alt=""></a>
            </div>
            <div class="content">
                <h4 class="title"><a href="{{route('blog.detail', $blogItem->getSlug())}}">{{$blogItem->getName()}}</a></h4>
                <span class="date"><i class="fas fa-calendar-alt"></i>{{$blogItem->created_at->format('d.m.Y')}}</span>
            </div>
        </div>
        @endforeach

    </div>
</div>
