<div class="border p-4 mb-4">
    <h6 class="font-small fw-medium uppercase mb-4 text-center">{{__('Kategoriler')}}</h6>
    <ul class="list-unstyled">
        @foreach($categories as $category)
            <x-category-link :category="$category"/>
        @endforeach
    </ul>
</div>
