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
                            <a class="nav-dropdown-link" href="../blocks/about.html">
                                {{__("Hakkımızda")}}
                            </a>
                        </li>
                        <li class="nav-dropdown-item">
                            <a class="nav-dropdown-link" href="../blocks/about.html">
                                {{__("Yönetim Kurulu")}}
                            </a>
                        </li>
                        <li class="nav-dropdown-item">
                            <a class="nav-dropdown-link" href="../blocks/about.html">
                                {{__("İş Başvuru Formu")}}
                            </a>
                        </li>

                        <li class="nav-dropdown-item">
                            <a class="nav-dropdown-link" href="../blocks/about.html">
                                {{__("Videolar")}}
                            </a>
                        </li>
                        <li class="nav-dropdown-item">
                            <a class="nav-dropdown-link" href="../blocks/about.html">
                                {{__("Kvkk")}}
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">{{ __('Ürünler') }}</a>
                    <ul class="nav-dropdown">
                        <li class="nav-dropdown-item">
                            <a class="nav-dropdown-link" href="../blocks/about.html">
                                {{__("Cam")}}
                            </a>
                        </li>
                        <li class="nav-dropdown-item">
                            <a class="nav-dropdown-link" href="../blocks/about.html">
                                {{__("Alüminyum")}}
                            </a>
                        </li>
                        <li class="nav-dropdown-item">
                            <a class="nav-dropdown-link" href="../blocks/about.html">
                                {{__("PVC")}}
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">{{__("Üretim")}}</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#">{{__("Referanslar")}}</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#">{{ __('Medya') }}</a>
                    <ul class="nav-dropdown">
                        <li class="nav-dropdown-item">
                            <a class="nav-dropdown-link" href="../blocks/about.html">
                                {{__("Basında Biz")}}
                            </a>
                        </li>
                        <li class="nav-dropdown-item">
                            <a class="nav-dropdown-link" href="../blocks/about.html">
                                {{__("Videolar")}}
                            </a>
                        </li>
                        <li class="nav-dropdown-item">
                            <a class="nav-dropdown-link" href="../blocks/about.html">
                                {{__("Blog")}}
                            </a>
                        </li>
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
                    <div class="dropdown__text">{{ __('Dil Seçiniz') }}</div>

                    <div class="dropdown__arrow"></div>
                </label>

                <ul class="dropdown__items">
                    @foreach($languages as $language)
                        <li style="border-bottom: 1px solid rgb(220 220 220 / 50%);">
                            <a href="{{route('changeLanguage', $language->id)}}" class="d-flex gap-2">
                                <img src="{{image($language->flag)}}">
                                <span style="color: black">{{$language->name}}</span>
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
