@props(['contributorsCsv'])

@php
$contributors = explode(',', $contributorsCsv);
@endphp

<ul class="flex">
  @foreach($contributors as $contributor)
  <li class="flex items-center justify-center bg-orange-400 hover:bg-orange-500 text-white rounded-xl py-1 px-3 mr-2 text-xs">
    <a href="/?contributors={{$contributor}}"> {{$contributor}} </a>
  </li>
  @endforeach
</ul>