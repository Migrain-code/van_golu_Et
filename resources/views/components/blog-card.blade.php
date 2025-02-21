<div>
    <div class="blog-item mb-3">
        <div class="blog-thumb">
            <a href="{{route('blog.detail', $blog->getSlug())}}"><img src="{{image($blog->image)}}" style="border-radius: 10px" alt=""></a>
        </div>
        <div class="blog-content">
            <div class="blog-meta-two">
                <ul class="list-wrap">
                    <li><a href="{{route('blog.detail', $blog->getSlug())}}">Admin</a></li>
                    <li><a href="{{route('blog.detail', $blog->getSlug())}}"><i class="far fa-comment-alt"></i> {{__("Yorum")}} ({{$blog->comments->count()}})</a></li>
                    <li><a href="{{route('blog.detail', $blog->getSlug())}}"><i class="far fa-bookmark"></i>{{$blog->created_at->format('d.m.Y')}}</a></li>
                </ul>
            </div>
            <h2 class="title"><a href="{{route('blog.detail', $blog->getSlug())}}">{{$blog->getName()}}</a></h2>
            <p>  {!! \Illuminate\Support\Str::limit(strip_tags($blog->getContent()), 180) !!}</p>
            <a href="{{route('blog.detail', $blog->getSlug())}}" class="link-btn">{{__("Daha Fazla")}}<i class="fas fa-angle-double-right"></i></a>
        </div>
    </div>

</div>
