<div class="navbar-right">
    <ul class="navbar-nav">
        <li class="dropdown">
            <a href="javascript:void(0);" class="dropdown-toggle" title="Notifications" data-toggle="dropdown"
                role="button"><i class="zmdi zmdi-notifications"></i>
                <div class="notify"><span class="heartbit"></span><span class="point"></span></div>
            </a>
            <ul class="dropdown-menu slideUp2">
                <li class="header">اطلاعیه ها</li>

                @livewire('admin.events.event-list')

                <li class="footer"> <a href={{route('admin.timeline')}}>مشاهده تمام اعلان ها</a> </li>
            </ul>
        </li>
        <li><a href="javascript:void(0);" class="js-right-sidebar" title="Setting"><i
                    class="zmdi zmdi-settings zmdi-hc-spin"></i></a></li>
        <li><a aria-disabled="true" onclick="event.preventDefault(); document.getElementById('frm-logout').submit();"
                class="mega-menu" title="Sign Out"><i class="zmdi zmdi-power"></i></a>
            <form id="frm-logout" action="{{ route('logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>
        </li>
    </ul>
</div>
