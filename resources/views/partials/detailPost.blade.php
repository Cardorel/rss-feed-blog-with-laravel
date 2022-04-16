<div
    class="post">
    <div
        class="post-content">
        @if($post['source'])
            <img
                class="post-image"
                src={{$post['source']}}
                    alt={{$post['title']}}>
        @endif
        <div
            class="post-body">
            <h2
                class="post-title">{{$post['title']}}</h2>
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
                    <i
                        class="post-icon fa-solid fa-user"></i>
                    {{$post['author']->name}}
                </span>
                <span class="post-comment"><i
                        class="post-icon fa-solid fa-comments"></i>0 Comment</span>
            </div>
            <div
                class="description-content">
                <p
                    class="post-text">
                    {!! $post['content'] !!}
                </p>
            </div>
        </div>
    </div>
</div>

