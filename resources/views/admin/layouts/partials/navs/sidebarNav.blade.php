
<ul class="list-unstyled">
    <li>
        <a href="{{ route('admin.dashboard') }}">Dashboard</a>
    </li>
    <li>
        <a href="">File Manager</a>
    </li>
    <li class="dropdown">
        <a class="dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">Pages</a>
        <ul class="dropdown-menu">
            <li>
                <a href="{{ route('admin.pages.index') }}">All Pages</a>
            </li>
            <li>
                <a href="{{ route('admin.pages.create') }}">Add New page</a>
            </li>
        </ul>
    </li>
    <li class="dropdown">
        <a class="dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">Posts</a>
        <ul class="dropdown-menu">
            <li>
                <a href="{{ route('admin.posts.index') }}">All Posts</a>
            </li>
            <li>
                <a href="{{ route('admin.posts.create') }}">Add New Post</a>
            </li>
            <li>
                <a href="{{ route('admin.post-categories.index') }}">Categories</a>
            </li>
            <li>
                <a href="{{ route('admin.post-tags.index') }}">Tags</a>
            </li>
        </ul>
    </li>
    <li>
        <a href="">Clients</a>
    </li>
    <li>
        <a href="{{ route('admin.portfolio.index') }}">Portfolio</a>
    </li>
    <li>
        <a href="{{ route('admin.what-i-do.index') }}">What I Do</a>
    </li>
    <li>
        <a href="">Who work with</a>
    </li>
    <li>
        <a href="{{ route('admin.personal-projects.index') }}">Personal Projects</a>
    </li>
    <li class="dropdown">
        <a class="dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">Knowledgebase</a>
        <ul class="dropdown-menu">
            <li>
                <a href="{{ route('admin.knowledgebase.index') }}">All Articles</a>
            </li>
            <li>
                <a href="{{ route('admin.knowledgebase.create') }}">Add New Article</a>
            </li>
            <li>
                <a href="{{ route('admin.knowledgebase-categories.index') }}">Categories</a>
            </li>
        </ul>
    </li>
</ul>
