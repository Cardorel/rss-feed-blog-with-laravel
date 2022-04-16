@if($postsFound)
    <div>
        <h3
            class="search-title">
            Search Results for: {{$searchText}}
        </h3>
        <div
            class="post">
            @foreach($postsFound as $post)
                <div
                    class="post-content">
                    @if($post['source'])
                        <img
                            class="post-image"
                            src='{{$post['source']}}'
                            alt='{{$post['title']}}'>
                    @endif
                    <div
                        class="post-body">
                        <h2
                            class="post-title">
                            {{$post['title']}}
                        </h2>
                        <div
                            class="post-info">
                            <span
                                class="post-date"><i class="post-icon fa-solid fa-calendar-days"></i>
                                {{date('Y-m-d', strtotime($post['date']))}}
                            </span>
                            <span
                                class="post-user"><i class="post-icon fa-solid fa-user"></i>
                                {{$post['author']->name}}
                            </span>
                            <span class="post-comment">
                                <i class="post-icon fa-solid fa-comments"></i>
                                0 Comment
                            </span>
                        </div>
                        <div
                            class="search-description-container">
                            <p
                                class="post-text">
                                {!! $post['description'] !!}
                            </p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@else
<div
    class="post">
  <div
      class="post-content not-found-content">
      <h2
          class="not-found-title">Nothing Found</h2>
      <div
          class="not-found-form">
          <p
              class="not-found-para">Sorry, but nothing matched your search terms. Please try again with some different keywords.</p>
          @include('partials.searchForm')
      </div>
  </div>
</div>
@endif

