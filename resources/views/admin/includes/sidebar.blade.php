<div class="navigation">
    <div class="navigation-header d-flex">
        <div class="admin-pic">
            
        </div>
        <p>{{ $user->name }}</p>
    </div>
    <div class="navigation-body">
        <h2 class ='pad' >Administration</h2>
        <div class="navigation-list">
            {{-- {{ dd(strpos(Route::currentRouteName(), 'admin_home_page') == 0)}} --}}
            {{-- <a href='{{ route('admin_home_page') }}'><p class ='pad' >Users</p></a> --}}
            <a href='{{ route('admin_home_page') }}'><p class ='pad {{ (\Request::route()->getName() == 'admin_home_page') ? 'blue' : '' }}' >Users</p></a>
            <a href='{{ route('admin_pages') }}'><p class ='pad {{ (\Request::route()->getName() == 'admin_pages') ? 'blue' : '' }}' >Pages</p></a>
            <div class ='pad posts-click d-flex align-items-center justify-content-between' >
                <p class =''>Posts</p>
                <i class="fas fa-chevron-down"></i>
            </div>
            <div class ='posts-child' >
                <a href='/admin_post'><p class ='pad-child' >Articles</p></a>
                <a href='/admin_drafts'><p class ='pad-child' >Draft</p></a>
                <a href='/published'><p class ='pad-child' >Published</p></a>
            </div>
            <p class ='pad'>Categories</p>
            <p class ='pad'>Tag</p>
            <a href='menu.html'><p class ='pad'>Menu</p></a>
        </div>
    </div>
</div>