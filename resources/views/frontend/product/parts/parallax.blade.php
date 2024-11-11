@php
    $title = "";
    $image = "/frontend/assets/images/sample/slider/1.jpg";
    if (isset($category)){
        $title = $category->getName();
        $image = $category->image;
    }
    if (isset($subCategory)){
        $title = $subCategory->getName();
         $image = $subCategory->image;
    }
    if (isset($subCategorySon)){
        $title = $subCategorySon->getName();
         $image = $subCategorySon->image;
    }
    if (isset($product)){
        $title = $product->getName();
         $image = $product->image;
    }

@endphp
<div class="section-xl bg-image parallax" data-bg-src="{{image($image)}}">
    <div class="bg-dark-06">
        <div class="container text-center">

            <h1 class="fw-normal m-0">{{$title}}</h1>
            <ul class="list-inline-dash">
                <li><a href="/">{{__('Anasayfa')}}</a></li>
                @if(isset($category))
                    <li><a href="{{route('search.category', $category->getSlug())}}">{{$category->getName()}}</a></li>
                @endif
                @if(isset($category) && isset($subCategory))
                    <li><a href="{{route('search.subCategory', [$category->getSlug(), $subCategory->getSlug()])}}">{{$subCategory->getName()}}</a></li>
                @endif
                @if(isset($category) && isset($subCategory) && isset($subCategorySon))
                    <li><a href="{{route('search.subCategorySon', [$category->getSlug(), $subCategory->getSlug(),$subCategorySon->getSlug()])}}">{{$subCategorySon->getName()}}</a></li>
                @endif
                @if(isset($category) && isset($subCategory) && isset($subCategorySon) && isset($product))
                    <li><a href="">{{$product->getName()}}</a></li>
                @endif
            </ul>
        </div><!-- end container -->
    </div>
</div>
