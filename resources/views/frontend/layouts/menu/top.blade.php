<!-- Header -->
<div class="header center header-color-black transparent-light sticky-autohide ">
    <div class="container">
        <!-- Logo -->
        <div class="header-logo">
            <h3 class="uppercase letter-spacing-1">
                <a href="{{route('home')}}">
                    <img src="{{image(setting('logo'))}}" alt="logo">
                </a>
            </h3>
        </div>
        <!-- Menu -->
        <div class="header-menu">
            <ul class="nav">
                <li class="nav-item">
                    <a class="nav-link" href="#">{{ __('Kurumsal') }}</a>
                    <ul class="nav-dropdown">
                        <li class="nav-dropdown-item">
                            <a class="nav-dropdown-link" href="{{route('about.index')}}">
                                {{__("Hakkımızda")}}
                            </a>
                        </li>
                        <li class="nav-dropdown-item">
                            <a class="nav-dropdown-link" href="{{route('team')}}">
                                {{__("Yönetim Kurulu")}}
                            </a>
                        </li>
                        <li class="nav-dropdown-item">
                            <a class="nav-dropdown-link" href="{{route('jobRequest.index')}}">
                                {{__("İş Başvuru Formu")}}
                            </a>
                        </li>
                        <li class="nav-dropdown-item">
                            <a class="nav-dropdown-link" href="{{route('kvkk.index')}}">
                                {{__("Kvkk")}}
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">{{ __('Ürünler') }}</a>
                    <ul class="nav-dropdown">
                        @foreach($productCategories as $pCategory)
                            <li class="nav-dropdown-item">
                                <a class="nav-dropdown-link" href="{{route('search.category', $pCategory->getSlug())}}">
                                   {{$pCategory->getName()}}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('production.index')}}">{{__("Üretim")}}</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{route('reference.index')}}">{{__("Referanslar")}}</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#">{{ __('Medya') }}</a>
                    <ul class="nav-dropdown">
                        <li class="nav-dropdown-item">
                            <a class="nav-dropdown-link" href="{{route('newspaper')}}">
                                {{__("Basında Biz")}}
                            </a>
                        </li>
                        <li class="nav-dropdown-item">
                            <a class="nav-dropdown-link" href="{{route('video')}}">
                                {{__("Videolar")}}
                            </a>
                        </li>
                        <li class="nav-dropdown-item">
                            <a class="nav-dropdown-link" href="{{route('blog.index')}}">
                                {{__("Blog")}}
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item languageMenu">
                    <a class="nav-link" href="#">{{ __('Dil Seçiniz') }}</a>
                    <ul class="nav-dropdown">
                        @foreach($languages as $language)
                            <li class="nav-dropdown-item">
                                <a class="nav-dropdown-link d-flex gap-2" href="{{route('changeLanguage', $language->id)}}">
                                    <img style="width: 20px;" src="{{image($language->flag)}}">
                                    {{__($language->code)}}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('contact.index')}}">{{ __('İletişim') }}</a>
                </li>

            </ul>
        </div>
        <!-- Menu Extra -->
        <div class="header-menu-extra">
            <div class="dropdown">
                <input type="checkbox" id="dropdown">

                <label class="dropdown__face" for="dropdown">
                    <div class="dropdown__text">
                        {{-- __('Dil Seçiniz') --}}
                        @foreach($languages as $language)
                            @if($language->code == app()->getLocale())
                                <img style="width: 20px;height: 20px; border-radius: 50%" src="{{image($language->flag)}}">
                                <span style="margin-left: 5px">{{$language->code}}</span>
                            @endif
                        @endforeach

                    </div>

                    <div class="dropdown__arrow"></div>
                </label>

                <ul class="dropdown__items">
                    @foreach($languages as $language)
                        <li @class(['active' => $language->code == app()->getLocale()]) style="border-bottom: 1px solid rgb(220 220 220 / 50%);">
                            <a href="{{route('changeLanguage', $language->id)}}" class="d-flex gap-2">
                                <img src="{{image($language->flag)}}">

                                <span @class(['activesp' => $language->code == app()->getLocale(), 'langSpan' => $language->code != app()->getLocale()])>
                                    {{ __($language->code) }}
                                </span>

                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
        <!-- Menu Toggle -->
        <button class="header-toggle">
            <span></span>
        </button>
    </div><!-- end container -->
</div>
<!-- end Header -->
