<form
    method="GET"
    class="search-form"
    action="/search">
    <div
        class="search-content">
        <input
            type="search"
            class="search-input"
            name="search"
            value="{{$searchText}}"
            required
            placeholder="Search ...">
        <button
            type="submit"
            class="search-btn">
            <i
                class="icon-search fa-solid fa-magnifying-glass"></i>
        </button>
    </div>
</form>
