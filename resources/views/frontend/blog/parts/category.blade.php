<div class="blog-widget">
    <h4 class="sw-title">{{__('Kategoriler')}}</h4>
    <div class="sidebar-cat-list">
        <ul class="list-wrap">
            @foreach($categories as $category)
                <x-category-link :category="$category"/>
            @endforeach
        </ul>
    </div>
</div>
