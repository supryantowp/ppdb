<div class="left side-menu">
    <div class="slimscroll-menu" id="remove-scroll">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->

            <ul class="metismenu" id="side-menu">

                @foreach ($menu as $item)

                <li class="menu-title">{{$item->menu->menu}}</li>

                @foreach ($item->sub_menu as $parent)

                @if ($parent->children->count() > 0)

                <li>
                    <a href="javascript:void(0);" class="waves-effect"><i class="{{$parent->icon}}"></i><span>
                            {{$parent->title}} <span class="float-right menu-arrow"><i
                                    class="mdi mdi-chevron-right"></i></span> </span></a>
                    <ul class="submenu">
                        @foreach ($item->sub_menu as $dropdown)
                        @if ($dropdown->parent_id != 0)
                        <li><a href="{{url($dropdown->url)}}">{{$dropdown->title}}</a></li>
                        @endif
                        @endforeach
                    </ul>
                </li>

                @else

                @if ($parent->parent_id == 0)
                <li>
                    <a href="{{url($parent->url)}}" class="waves-effect">
                        <i class="{{$parent->icon}}"></i><span> {{$parent->title}} </span>
                    </a>
                </li>
                @endif

                @endif

                @endforeach

                @endforeach

                <li>
                    <a href="{{url('/')}}" class="waves-effect">
                        <i class="mdi mdi-arrow-left"></i> <span> BERANDA </span>
                    </a>
                </li>
            </ul>

        </div>
        <!-- Sidebar -->
        <div class="clearfix"></div>

    </div>
    <!-- Sidebar -left -->

</div>