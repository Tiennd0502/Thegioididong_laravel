{{-- <div id="nav">
  <nav class="container nav"> 
    @if (!empty($categories))
      @foreach ($categories as $category) 
        <a class="{{ $current_page == $category->slug ? 'active' : ''}}" href="{{route($category->slug.'.index') }}" title="{{ $category->title }}">{!! !empty($category->icon) ? html_entity_decode($category->icon) : "" !!}{{ $category->name }} </a>
      @endforeach
    @endif 
  </nav>
</div> --}}
{{-- /{category} --}}
<div id="nav">
  <nav class="container nav"> 
    @if (!empty($categories))
      @foreach ($categories as $category) 
        <a class="{{ $current_page == $category->slug ? 'active' : ''}}" href="{{route('home.category.index', $category->slug) }}" title="{{ $category->title }}">{!! !empty($category->icon) ? html_entity_decode($category->icon) : "" !!}{{ $category->name }} </a>
      @endforeach
    @endif 
  </nav>
</div>
