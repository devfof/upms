<x-layout>
  <x-card class="p-10 max-w-lg mx-auto mt-24">
    <header class="text-center">
      <h2 class="text-2xl font-bold uppercase mb-1">Upload File</h2>
    </header>

    <form method="POST" action="/listings" enctype="multipart/form-data">
      @csrf
      <div class="mb-6">
        <label for="name" class="inline-block text-lg mb-2">Name</label>
        <input type="text" class="border border-gray-200 rounded p-2 w-full" name="name"
        placeholder="Example: Finale Code" value="{{old('name')}}" />

        @error('name')
        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
        @enderror
      </div>

      <div class="mb-6">
        <label for="link" class="inline-block text-lg mb-2">
          File
        </label>

        <input type="file" class="border border-gray-200 rounded p-2 w-full" name="link" />

        @error('file')
        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
        @enderror

      <div class="mb-6 mt-6">
        <button class="rounded text-white py-2 px-4 bg-orange-400 hover:bg-orange-500">
          Upload File
        </button>

        <a href="/" class="text-black ml-4"> Back </a>
      </div>
    </form>
  </x-card>
</x-layout>
