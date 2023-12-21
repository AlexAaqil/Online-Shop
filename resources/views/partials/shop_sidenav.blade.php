<div class="sidenav">
    <h3>Filter By</h1>
    <div class="dropdown">
        <button class="drop_down_btn" onclick="dropDown(this)">Category <i class="fa fa-caret-down"></i></button>
        <ul class="dropdown_list" id="dropdown_list">
            @foreach($categories as $category)
                <li><a href="{{ url('/'.$category->slug) }}">{{ $category->title }}</a></li>
            @endforeach
            <li><a href="{{ route('shop') }}">View all</a></li>
        </ul>
    </div>

    {{-- <div class="dropdown">
        <button class="drop_down_btn" onclick="dropDown(this)">Price <i class="fa fa-caret-down"></i></button>
        <ul class="dropdown_list" id="dropdown_list">
            <li>50 - 100</li>
            <li>101 - 300</li>
        </ul>
    </div> --}}
</div>
