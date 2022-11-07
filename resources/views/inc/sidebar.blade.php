<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ route('home') }}">Elasher</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="{{ route('home') }}">EL</a>
        </div>
        <ul class="sidebar-menu">
            @php
                $currentRoute = Route::getCurrentRoute()->getActionName();
            @endphp
            @foreach (config('sidebar') as $element)
                <li class="menu-header">{{ $element['menu_header'] }}</li>
                @foreach ($element['menu'] as $menu)
                    @if (array_key_exists('url', $menu))
                        <li
                            class="dropdown
                        {{ $currentRoute == $menu['action'][0] . '@' . $menu['action'][1] ? 'active' : '' }}
                        ">
                            <a href="{{ route($menu['url']) }}" class="nav-link"><i
                                    class="{{ $menu['icon_class'] }}"></i><span>{{ $menu['name'] }}</span></a>
                        </li>
                    @else
                        @php
                            function hasRouteActionInSubMenu($array)
                            {
                                $menuArray = [];
                                foreach ($array['submenu'] as $element) {
                                    $menuArray[] = $element['action'][0] . '@' . $element['action'][1];
                                }

                                return in_array(Route::getCurrentRoute()->getActionName(), $menuArray);
                            }
                        @endphp
                        <li class="dropdown {{ hasRouteActionInSubMenu($menu) ? 'active' : '' }}">
                            <a style="cursor: pointer;"
                                class="nav-link {{ array_key_exists('submenu', $menu) ? 'has-dropdown' : '' }}"><i
                                    class="{{ $menu['icon_class'] }}"></i><span>{{ $menu['name'] }}</span></a>
                            @if (array_key_exists('submenu', $menu))
                                <ul class="dropdown-menu">
                                    @foreach ($menu['submenu'] as $submenu)
                                        <li
                                            class="{{ $currentRoute == $submenu['action'][0] . '@' . $submenu['action'][1] ? 'active' : '' }}">
                                            <a class="nav-link"
                                                href="{{ route($submenu['url']) }}">{{ $submenu['name'] }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            @endif

                        </li>
                    @endif
                @endforeach
            @endforeach


        </ul>

        {{-- <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
            <a href="https://getstisla.com/docs" class="btn btn-primary btn-lg btn-block btn-icon-split">
                <i class="fas fa-rocket"></i> Documentation
            </a>
        </div> --}}
    </aside>
</div>
