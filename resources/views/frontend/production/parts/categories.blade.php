<div class="col-12 col-lg-3">
    <div class="border p-4 mb-4">
        <h6 class="font-small fw-medium uppercase mb-4 text-center">{{__('Hızlı Menü')}}</h6>
        <ul class="list-unstyled">
            <li class="pb-2 border-bottom">
                <a class="d-flex justify-content-between" href="{{route('production.index')}}">
                    {{__("Tümü")}}

                </a>
            </li>
            @foreach($categories as $row)
                <li class="pb-2 border-bottom">
                    <a class="d-flex justify-content-between" href="{{route('production.category', $row->getSlug())}}">
                        {{$row->getName()}}
                        <span>{{ $row->productions->count() }}</span>
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
</div>
