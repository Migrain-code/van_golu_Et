<div class="border p-4 mb-4">
    <h6 class="font-small fw-medium uppercase mb-4 text-center">{{__('Popüler Bloglar')}}</h6>
    <!-- Popular post 1 -->
    @foreach($latestBlog as $blogItem)
        <div class="d-flex align-items-center mb-3">
            <a href="{{route('blog.detail', $blogItem->getSlug())}}">
                <img src="{{image($blogItem->image)}}" style="width: 200px" alt="">
            </a>
            <div class="ps-3">
                <h6 class="fw-normal mb-0">
                    <a class="text-link-1" href="{{route('blog.detail', $blogItem->getSlug())}}">
                        {{$blogItem->getName()}}
                    </a>
                </h6>
                <span class="font-small">{{$blogItem->created_at->format('d.m.Y')}}</span>
            </div>
        </div>
    @endforeach

</div>
