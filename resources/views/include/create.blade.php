<x-app-layout>
  <div>
    <form action='/include' method='post'>{{-- web.phpのinclude--}}
      @csrf
      <input type="text" name = include[name] />
      <input type="number" name = include[strange] />

      <input type="submit" />
    </form>
  </div>
</x-app-layout>