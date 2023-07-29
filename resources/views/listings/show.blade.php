<x-layout>
  <a href="/" class="inline-block ml-20 mt-3 mb-4 px-6 py-2 bg-orange-400 hover:bg-orange-500 text-white rounded"><i class="fa-solid fa-arrow-left"></i> Back
  </a>
  <div class="mx-20 ">
    <x-card class="p-10">
      <div class="flex flex-col items-center justify-center text-center">
        <h3 class="text-2xl mb-2">
          {{$listing->title}}
        </h3>
        <div class="text-xl font-bold mb-4">{{$listing->project_subject}}</div>

        <x-listing-contributors :contributorsCsv="$listing->contributors" />

        <div class="border border-gray-200 w-full my-10"></div>
        <div>
          <h3 class="text-3xl font-bold mb-4">Project Description</h3>
          <div class="text-lg space-y-6">
            {{$listing->description}}

            <a href="#"
              class="block bg-laravel text-white mt-14 py-2 rounded-xl hover:opacity-80 ">  
              Download project</a>

          </div>
        </div>
      </div>
    </x-card>

    {{-- <x-card class="mt-4 p-2 flex space-x-6">
      <a href="/listings/{{$listing->id}}/edit">
        <i class="fa-solid fa-pencil"></i> Edit
      </a>

      <form method="POST" action="/listings/{{$listing->id}}">
        @csrf
        @method('DELETE')
        <button class="text-red-500"><i class="fa-solid fa-trash"></i> Delete</button>
      </form>
    </x-card> --}}
  </div>
</x-layout>