 <div
     class="post">
        @foreach($posts['items'] as $post)
        <div
            class="post-content">
            @if($post['source'] !== null)
            <img
                class="post-image"
                src='{{$post['source']}}'
                alt='{{$post['title']}}'>
            @endif
            <div
                class="post-body">
                <h2
                    class="post-title">
                    <a
                        class="link"
                        href='{{'/'.date('Y/m/d',
                                strtotime($post['date'])).'/'
                               .strtolower(join('-' , explode(' ' ,
                               join(' ' , preg_split('/\W+\/*/' ,
                               $post['title'])))))}}'
                    >{{$post['title']}}
                    </a>
                </h2>
                <div
                    class="post-info">
                    <span
                        class="post-date">
                        <i
                            class="post-icon fa-solid fa-calendar-days"></i>
                        {{date('Y-m-d', strtotime($post['date']))}}
                    </span>
                    <span
                        class="post-user">
                        <i class="post-icon fa-solid fa-user"></i>
                        {{$post['author']->name}}
                    </span>
                    <span
                        class="post-comment">
                        <i class="post-icon fa-solid fa-comments"></i>
                        0 Comment
                    </span>
                </div>
                <p
                    class="post-text">
                    {!! $post['description'] !!}
                </p>
            </div>
        </div>
        @endforeach
 </div>

