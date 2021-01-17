<div class="sidebar" data-color="azure" data-background-color="white" data-image="{{ asset('material') }}/img/sidebar-1.jpg"

     style="position: sticky"
>
    <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

        Tip 2: you can also add an image using data-image tag
    -->
    <div class="logo">
        <a href="https://creative-tim.com/" class="simple-text logo-normal">
           Админ панель 2В
        </a>
    </div>
    <div class="sidebar-wrapper">
        <ul class="nav">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('home') }}">
                    <i class="material-icons">home</i>
                    <p>На главную</p>
                </a>
            </li>
            <li class="nav-item {{ $activePage == 'index' ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('admin.index') }}">
                    <i class="material-icons">table_rows</i>
                    <p>Новости</p>
                </a>
            </li>
            <li class="nav-item {{ $activePage == 'gallery' ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('admin.gallery') }}">
                    <i class="material-icons">wallpaper</i>
                    <p>Галлерея</p>
                </a>
            </li>
            <li class="nav-item{{ $activePage == 'users' ? ' active' : '' }}">
                <a class="nav-link" href="{{ route('admin.index') }}">
                    <i class="material-icons">face</i>
                    <p>Пользователи</p>
                </a>
            </li>
        </ul>
    </div>
</div>
