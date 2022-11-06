<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="index.html">Elasher</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">St</a>
        </div>
        <ul class="sidebar-menu">

            <li class=active><a class="nav-link" href="blank.html"><i class="far fa-square"></i>
                    <span>Blank Page</span></a></li>

            @foreach (config('sidebar') as $element)
                <li class="menu-header">{{ $element['menu_header'] }}</li>
                @foreach ($element['menu'] as $menu)
                    @if (array_key_exists('url', $menu))
                        <li class="dropdown">
                            <a href="{{ route($menu['url']) }}" class="nav-link"><i
                                    class="{{ $menu['icon_class'] }}"></i><span>{{ $menu['name'] }}</span></a>
                        </li>
                    @else
                        <li class="dropdown">
                            <a style="cursor: pointer;"
                                class="nav-link {{ array_key_exists('submenu', $menu) ? 'has-dropdown' : '' }}"><i
                                    class="{{ $menu['icon_class'] }}"></i><span>{{ $menu['name'] }}</span></a>
                            @if (array_key_exists('submenu', $menu))
                                <ul class="dropdown-menu">
                                    @foreach ($menu['submenu'] as $submenu)
                                        <li><a class="nav-link"
                                                href="{{ route($submenu['url']) }}">{{ $submenu['name'] }}</a></li>
                                    @endforeach
                                </ul>
                            @endif

                        </li>
                    @endif
                @endforeach
            @endforeach


        </ul>

        <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
            <a href="https://getstisla.com/docs" class="btn btn-primary btn-lg btn-block btn-icon-split">
                <i class="fas fa-rocket"></i> Documentation
            </a>
        </div>
    </aside>
</div>
