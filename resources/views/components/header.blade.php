<div class="header-right">

    <div class="pull-right">

        <div class="btn-group btn-group-list btn-group-notification">
            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">

            </button>

        </div><!-- btn-group -->

        <div class="btn-group btn-group-option">
            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                <i class="fa fa-caret-down"></i>
            </button>
            <ul class="dropdown-menu pull-right" role="menu">
                <li><a href="{{ url('/profil') }}"><i class="glyphicon glyphicon-user"></i>Profile</a></li>
                @if (Auth::user()->role == 1)
                    <li><a href="{{ url('/admin') }}"><i class="glyphicon glyphicon-user"></i>User Admin</a></li>
                @endif
                <li onclick="loghout()"><a href="#"><i class="glyphicon glyphicon-log-out"></i>Sign Out</a>
                    <form method="POST" id="hlog" class="" action="{{ route('logout') }}">
                        @csrf
                    </form>
                </li>
            </ul>
        </div><!-- btn-group -->

    </div><!-- pull-right -->

</div><!-- header-right -->
<script>
    function loghout() {
        var x = document.getElementById('hlog');
        x.submit();
    }
</script>
