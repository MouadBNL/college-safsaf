<div id="sidebar" class="c-sidebar c-sidebar-fixed c-sidebar-lg-show">

    <div class="c-sidebar-brand d-md-down-none">
        <a class="c-sidebar-brand-full h4" href="#">
            {{ trans('panel.site_title') }}
        </a>
    </div>

    <ul class="c-sidebar-nav">
        <li class="c-sidebar-nav-item">
            <a href="{{ route("admin.home") }}" class="c-sidebar-nav-link">
                <i class="c-sidebar-nav-icon fas fa-fw fa-tachometer-alt">

                </i>
                {{ trans('global.dashboard') }}
            </a>
        </li>
        @can('user_management_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/permissions*") ? "c-show" : "" }} {{ request()->is("admin/roles*") ? "c-show" : "" }} {{ request()->is("admin/users*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-users c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.userManagement.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('permission_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.permissions.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/permissions") || request()->is("admin/permissions/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-unlock-alt c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.permission.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('role_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.roles.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/roles") || request()->is("admin/roles/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-briefcase c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.role.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('user_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.users.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/users") || request()->is("admin/users/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-user c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.user.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('dynamic_content_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/texts*") ? "c-show" : "" }} {{ request()->is("admin/images*") ? "c-show" : "" }} {{ request()->is("admin/image-sliders*") ? "c-show" : "" }} {{ request()->is("admin/pages*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.dynamicContent.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('text_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.texts.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/texts") || request()->is("admin/texts/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-align-left c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.text.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('image_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.images.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/images") || request()->is("admin/images/*") ? "c-active" : "" }}">
                                <i class="fa-fw far fa-image c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.image.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('image_slider_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.image-sliders.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/image-sliders") || request()->is("admin/image-sliders/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-image c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.imageSlider.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('page_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.pages.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/pages") || request()->is("admin/pages/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-file c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.page.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('school_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/levels*") ? "c-show" : "" }} {{ request()->is("admin/subjects*") ? "c-show" : "" }} {{ request()->is("admin/lessons*") ? "c-show" : "" }} {{ request()->is("admin/resources*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-graduation-cap c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.school.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('level_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.levels.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/levels") || request()->is("admin/levels/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-sort-amount-up c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.level.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('subject_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.subjects.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/subjects") || request()->is("admin/subjects/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-bookmark c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.subject.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('lesson_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.lessons.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/lessons") || request()->is("admin/lessons/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-chalkboard c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.lesson.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('resource_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.resources.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/resources") || request()->is("admin/resources/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-cloud-download-alt c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.resource.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('activity_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.activities.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/activities") || request()->is("admin/activities/*") ? "c-active" : "" }}">
                    <i class="fa-fw far fa-images c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.activity.title') }}
                </a>
            </li>
        @endcan
        @if(file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php')))
            @can('profile_password_edit')
                <li class="c-sidebar-nav-item">
                    <a class="c-sidebar-nav-link {{ request()->is('profile/password') || request()->is('profile/password/*') ? 'c-active' : '' }}" href="{{ route('profile.password.edit') }}">
                        <i class="fa-fw fas fa-key c-sidebar-nav-icon">
                        </i>
                        {{ trans('global.change_password') }}
                    </a>
                </li>
            @endcan
        @endif
        <li class="c-sidebar-nav-item">
            <a href="#" class="c-sidebar-nav-link" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                <i class="c-sidebar-nav-icon fas fa-fw fa-sign-out-alt">

                </i>
                {{ trans('global.logout') }}
            </a>
        </li>
    </ul>

</div>