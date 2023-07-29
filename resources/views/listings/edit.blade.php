<x-layout>
  <x-card class="p-10 max-w-lg mx-auto mt-24">
    <header class="text-center">
      <h2 class="text-2xl font-bold uppercase mb-1">Update Your Project</h2>
      <p class="mb-4 text-orange-500">You can also add people to your project</p>
    </header>

    <form method="POST" action="/listings/{{$listing->id}}" enctype="multipart/form-data">
      @csrf
      @method('PUT')

      <div class="mb-6">
        <label for="title" class="inline-block text-lg mb-2">Project Name</label>
        <input type="text" class="border border-gray-200 rounded p-2 w-full" name="title"
          placeholder="Example: Smart Car" value="{{$listing->title}}" />

        @error('title')
        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
        @enderror
      </div>

      <div class="mb-6">
        <label for="project_subject" class="inline-block text-lg mb-2">Project Subject</label>
        {{-- <input type="text" class="border border-gray-200 rounded p-2 w-full" name="project_subject"
          placeholder="Example: Electronics" value="{{$listing->project_subject}}" /> --}}
      
        <select name="project_subject" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
          <option selected>{{$listing->project_subject}}</option>
          <option value="AOOP">AOOP</option>
          <option value="Electronics">Electronics</option>
          <option value="DBMS">DBMS</option>
          <option value="Networking">Networking</option>
        </select>

        @error('project_subject')
        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
        @enderror
      </div>

      <div class="mb-6">
        <label for="status" class="inline-block text-lg mb-2">Project status</label>
        {{-- <input type="text" class="border border-gray-200 rounded p-2 w-full" name="project_subject"
          placeholder="Example: Electronics" value="{{$listing->project_subject}}" /> --}}
      
        <select name="status" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
          {{-- <option selected>Private</option> --}}
          <option value="0">Private</option>
          <option value="1">public</option>
        </select>

        @error('project_subject')
        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
        @enderror
      </div>

      <div class="mb-6">
        <label for="contributors" class="inline-block text-lg mb-2">
          Contributors ID (Comma Separated)
        </label>
        <input type="text" class="border border-gray-200 rounded p-2 w-full" name="contributors"
          placeholder="Example: Laravel, Backend, Postgres, etc" value="{{$listing->contributors}}" />

        @error('contributors')
        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
        @enderror
      </div>

      {{-- <div class="mb-6">
        <label for="logo" class="inline-block text-lg mb-2">
          Company Logo
        </label>
        <input type="file" class="border border-gray-200 rounded p-2 w-full" name="logo" />

        <img class="w-48 mr-6 mb-6"
          src="{{$listing->logo ? asset('storage/' . $listing->logo) : asset('/images/no-image.png')}}" alt="" />

        @error('logo')
        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
        @enderror
      </div> --}}

      <div class="mb-6">
        <label for="description" class="inline-block text-lg mb-2">
          Project Description
        </label>
        <textarea class="border border-gray-200 rounded p-2 w-full" name="description" rows="10"
          placeholder="Write something cool about your project.">{{$listing->description}}</textarea>

        @error('description')
        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
        @enderror
      </div>

      <div class="mb-6">
        <button class="rounded text-white py-2 px-4 bg-orange-400 hover:bg-orange-500">
          Update Project
        </button>

        <a href="/" class="text-black ml-4"> Back </a>
      </div>
    </form>
  </x-card>
</x-layout>
