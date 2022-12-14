<?php
$menus = Helper::getMenu();
?>
<div class="nk-sidebar">
    <div class="nk-nav-scroll">
        <ul class="metismenu" id="menu">
            <li class="nav-label">Dashboard</li>
            @foreach ($menus as $menu)
                @can($menu->permission)
                    @if ($menu->type == 2)
                        <?php $childs = Helper::getChildMenu($menu->id); ?>
                        <li class="mega-menu mega-menu-sm">
                            <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                                <i class="{{ $menu->icon }}"></i><span class="nav-text">{{ $menu->name }}</span>
                            </a>
                            <ul aria-expanded="false">
                                @foreach ($childs as $valueJ)
                                    @can($valueJ->permission)
                                        <li><a href="/{{ $valueJ->url }}">{{ $valueJ->name }}</a></li>
                                    @endcan
                                @endforeach
                            </ul>
                        </li>
                    @else
                        <li>
                            <a class="" href="/{{ $menu->url }}">
                                <i class="{{ $menu->icon }}"></i><span class="nav-text">{{ $menu->name }}</span>
                            </a>
                        </li>
                    @endif
                @endcan
            @endforeach
        </ul>
    </div>
</div>
