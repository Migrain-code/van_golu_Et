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
                    <a class="nav-link" href="#">Kurumsal</a>
                    <ul class="nav-dropdown">
                        <li class="nav-dropdown-item">
                            <a class="nav-dropdown-link" href="../blocks/about.html">
                                Hakkımızda
                            </a>
                        </li>
                        <li class="nav-dropdown-item">
                            <a class="nav-dropdown-link" href="../blocks/about.html">
                                Yönetim Kurulu
                            </a>
                        </li>
                        <li class="nav-dropdown-item">
                            <a class="nav-dropdown-link" href="../blocks/about.html">
                                İş Başvuru Formu
                            </a>
                        </li>

                        <li class="nav-dropdown-item">
                            <a class="nav-dropdown-link" href="../blocks/about.html">
                                Videolar
                            </a>
                        </li>
                        <li class="nav-dropdown-item">
                            <a class="nav-dropdown-link" href="../blocks/about.html">
                                Kvkk
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#">Üretim</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Ürünler</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#">Basında Biz</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">S.S.S</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">İletişim</a>
                </li>

            </ul>
        </div>
        <!-- Menu Extra -->
        <div class="header-menu-extra">
            <div class="dropdown">
                <input type="checkbox" id="dropdown">

                <label class="dropdown__face" for="dropdown">
                    <div class="dropdown__text">Dil Seçiniz</div>

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
