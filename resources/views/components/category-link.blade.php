<div>
    <li><a href="{{route('blog.category', $category->getSlug())}}">{{$category->getName()}} <span>({{$category->blogs->count()}})</span></a></li>
</div>
