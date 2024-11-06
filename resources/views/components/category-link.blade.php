<div>
    <li class="pb-2 border-bottom">
        <a class="d-flex justify-content-between" href="{{route('blog.category', $category->getSlug())}}">{{$category->getName()}}
            <span>{{$category->blogs->count()}}</span>
        </a>
    </li>

</div>
