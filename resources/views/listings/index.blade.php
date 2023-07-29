<x-layout>
  @if (!Auth::check())
    @include('partials._hero')

  @else
  @include('partials._dashboard_hero')
  

  @include('partials._search')
  
  <div class="lg:grid lg:grid-cols-3 gap-4 space-y-4 md:space-y-0 mx-16">

    @unless(count($listings) == 0)

    @foreach($listings as $listing)
    <x-listing-card :listing="$listing" />
    @endforeach

    @else
    <p>No Projects found</p>
    @endunless

  </div>

  <div class="mt-6 p-4 mx-12">
    {{$listings->links()}}
  </div>

  @endif
</x-layout>
