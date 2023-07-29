@props(['listing'])

<x-card>
    <div>
      <h3 class="text-2xl hover:text-laravel">
        <a href="/listings/{{$listing->id}}">{{$listing->title}}</a>
      </h3>
      <div class="text-xl font-bold mb-4">{{$listing->project_subject}}</div>
      <x-listing-contributors :contributorsCsv="$listing->contributors" />
    </div>
</x-card>