<div>
    <!-- Blog Post box 1 -->
    <div class="mb-5">
        <div class="img-link-box">
            <a href="{{route('blog.detail', $blog->getSlug())}}">
                <img src="{{image($blog->image)}}" alt="">
            </a>
        </div>
        <div class="mt-4">
            <div class="d-flex justify-content-between mb-2">
                <div class="d-inline-flex">
                    <a class="font-family-tertiary font-small fw-medium uppercase" href="{{route('blog.category', $blog->category->getSlug())}}">{{$blog->category->getName()}}</a>
                </div>
                <div class="d-inline-flex">
                    <span class="font-small">{{$blog->created_at->format('d.m.Y')}}</span>
                </div>
            </div>
            <h5><a href="{{route('blog.detail', $blog->getSlug())}}">{{$blog->getName()}}</a></h5>
            <p>
                {!! \Illuminate\Support\Str::limit(strip_tags($blog->getContent()), 180) !!}
            </p>
            <div class="mt-3">
                <a class="button-text-1" href="#">{{__('Daha Fazla')}}</a>
            </div>
        </div>
    </div>
</div>
