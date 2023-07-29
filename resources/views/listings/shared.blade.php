<x-layout>
    <x-card class="mx-20 my-16">
      <header class="relative ">
        
        <h1 class="text-3xl text-center font-bold mb-6 uppercase">
          Shared Projects 
        </h1>
        </header>
  
      <table class="w-full table-auto rounded-sm">
        <tbody>
          @unless($listings->isEmpty())
          @foreach($listings as $listing)
          <tr class="border-gray-300">
            <td class=" px-4 py-5 border-t border-b border-gray-300 text-lg">
              <a href="/listings/{{$listing->id}}"> {{$listing->title}} </a>
            </td>
            <td class="text-right px-4 py-5 border-t border-b border-gray-300 text-lg">
                <x-listing-contributors :contributorsCsv="$listing->contributors" />
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
  