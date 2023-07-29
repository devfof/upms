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
          <h3 class="text-3xl font-bold mb-8">Files and Codes</h3>

          <div class="lg:grid lg:grid-cols-4 gap-4 space-y-4 md:space-y-0 mx-16">

            <div class="border border-rounded">
              <div>
                <h3 class="text-2xl my-2 text-orange-400">
                  Create
                </h3>
                <a class="flex items-center justify-center bg-blue-400 hover:bg-blue-500 text-white rounded-xl py-3 px-3 mx-4 my-4 text-l" href="/listings/file_up"> Upload File </a>
                <a class="flex items-center justify-center bg-blue-400 hover:bg-blue-500 text-white rounded-xl py-3 px-3 mx-4 my-4 text-l" href="/listings/create_code"> Create Code</a>

              </div>
            </div>

            @unless(count($works) == 0)
            @foreach($works as $work)
            @if($work->type == 'File')
            <div class="border border-rounded">
              <div>
                <div class="flex items-center justify-center">
                  <img class="hidden w-24 mt-4 md:block" src="{{asset('images/file.png')}}" alt="" />
                </div>

                <h3 class="text-2xl hover:text-laravel mb-2">
                  <a href="{{url('/download/'.$work->id)}}">{{$work->name}}</a>
                </h3>

                <div class="flex">
                  <div class="flex items-center justify-center bg-blue-300 text-white rounded-xs py-1 px-3 mr-2 text-l">{{$work->type}}</div>
                  <a href="/listings/{{$listing->id}}/edit" class="text-blue-400 hover:text-blue-500 px-4 py-2 rounded-xl"><i class="fa-solid fa-gear"></i>
                    Edit</a>

                  <form method="POST" action="#">
                    @csrf
                    @method('DELETE')
                    <button class="text-red-400 hover:text-red-500 px-4 py-2 rounded-xl"><i class="fa-solid fa-trash"></i> Delete</button>
                  </form>
                </div>

              </div>
            </div>
            @else
            <div class="border border-rounded">
              <div>
                <div class="flex items-center justify-center">
                  <img class="hidden w-24 mt-4 md:block" src="{{asset('images/coding.png')}}" alt="" />
                </div>

                <h3 class="text-2xl hover:text-laravel mb-2">
                  <a href="/">{{$work->name}}</a>
                </h3>

                <div class="flex">
                  <div class="flex items-center justify-center bg-blue-300 text-white rounded-xs py-1 px-3 mr-2 text-l">{{$work->type}}</div>
                  <a href="/listings/{{$listing->id}}/edit" class="text-blue-400 hover:text-blue-500 px-4 py-2 rounded-xl"><i class="fa-solid fa-gear"></i>
                    Edit</a>

                  <form method="POST" action="#">
                    @csrf
                    @method('DELETE')
                    <button class="text-red-400 hover:text-red-500 px-4 py-2 rounded-xl"><i class="fa-solid fa-trash"></i> Delete</button>
                  </form>
                </div>

              </div>
            </div>
            @endif
            @endforeach
            @else
            <p>No Projects found</p>
            @endunless

          </div>


        </div>
      </div>
    </x-card>
  </div>
</x-layout>