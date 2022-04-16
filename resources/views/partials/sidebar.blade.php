<div
    class="sidebar-container">
    @include('partials.searchForm')
    <div
        class="recent-post">
        <h3
            class="recent-post-title">
            RECENT POSTS
        </h3>
        <ul>
            @foreach($posts['items'] as $post)
                <li
                    class="recent-post-item">
                    <a
                        class="link"
                        href='{{'/'.date('Y/m/d',
                                strtotime($post['date'])).'/'
                               .strtolower(join('-' , explode(' ' ,
                               join(' ' , preg_split('/\W+\/*/' ,
                               $post['title'])))))}}'
                        >{{$post['title']}}</a>
                </li>
            @endforeach
        </ul>
    </div>
</div>
