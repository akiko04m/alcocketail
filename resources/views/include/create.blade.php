<x-app-layout>
  <div>
    <form action='/include' method='post'>{{-- web.phpのinclude--}}
      @csrf
      <input type="text" name = include[name] />
      <input type="number" name = include[strange] />
      <div class="category">
        <h2>Category</h2>
          <select name="post[category_id]">
              @foreach($includes as $includes)
                  <option value="{{ $includes->id }}">{{ $includes->name }}</option>
              @endforeach
          </select>
      </div>
      <input type="submit" />
    </form>
  </div>
</x-app-layout>