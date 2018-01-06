<div class="sidebar" data-color="purple" data-image="/admin/img/sidebar-1.jpg">
            <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | blue | green | orange | red"

        Tip 2: you can also add an image using data-image tag
    -->
            <div class="logo">
                <a href="#" class="simple-text">
                    @if (Auth::check())
                    {{ Auth::user()->name }}
                    @endif
                </a>
            </div>
            <div class="sidebar-wrapper">
                <ul class="nav">
                    <li id="dash">
                        <a href="/home">
                            <i class="material-icons">dashboard</i>
                            <p>Dashboard</p>
                        </a>
                    </li>
<!--
                    <li>
                        <a href="/guests">
                            <i class="material-icons">playlist_add_check</i>
                            <p>To Do</p>
                        </a>
                    </li>
-->
<!--
                    <li>
                        <a href="/guests">
                            <i class="material-icons">attach_money</i>
                            <p>Budget</p>
                        </a>
                    </li>
-->
                    <li id="guests">
                        <a href="/guests">
                            <i class="material-icons">person</i>
                            <p>Guests</p>
                        </a>
                    </li>

                    <li id="email-scheduler">
                        <a href="/email-scheduler">
                            <i class="material-icons">email</i>
                            <p>Schedule Emails</p>
                        </a>
                    </li>

                </ul>
            </div>
        </div>