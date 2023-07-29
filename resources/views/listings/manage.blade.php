<x-layout>
  <x-card class="mx-20 my-16">
    <header class="relative ">
      <a href="/listings/shared" class="absolute top-0 left-10 text-white rounded-lg bg-orange-400 hover:bg-orange-500 py-2 px-5">Shared Projects</a>
      
      <h1 class="text-3xl text-center font-bold mb-6 uppercase">
        Manage Projects 
      </h1>
      <a href="/listings/create" class="absolute top-0 right-10 text-white rounded-lg bg-orange-400 hover:bg-orange-500 py-2 px-5">Create project</a>
    </header>

    <table class="w-full table-auto rounded-sm">
      <tbody>
        @unless($listings->isEmpty())
        @foreach($listings as $listing)
        <tr class="border-gray-300">
          <td class=" px-4 py-5 border-t border-b border-gray-300 text-lg">
            <a href="/listings/{{$listing->id}}/workspace"> {{$listing->title}} </a>
          </td>
          <td class="text-right px-4 py-5 border-t border-b border-gray-300 text-lg">
            <a href="/listings/{{$listing->id}}/edit" class="text-blue-400 px-6 py-2 rounded-xl"><i
                class="fa-solid fa-gear"></i>
              Edit</a>
          </td>
          <td class="text-right px-4 py-5 border-t border-b border-gray-300 text-lg">
            <form method="POST" action="/listings/{{$listing->id}}">
              @csrf
              @method('DELETE')
              <button class="text-red-400 hover:text-red-500"><i class="fa-solid fa-trash"></i> Delete</button>
            </form>
          </td>
        </tr>
        @endforeach
        @else
        <tr class="border-gray-300">
          <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
            <p class="text-center">No Listings Found</p>
          </td>
        </tr>
        @endunless  

      </tbody>
    </table>
  </x-card>
</x-layout>
