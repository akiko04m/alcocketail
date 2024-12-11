<x-app-layout>
  未設定
  <form action="/" method="POST">
      @csrf
      <div>
          <h2>レシピ名</h2>
          <input type="text" name="recipe[name]" placeholder="レシピ名" />
      </div>


      <div>
          <h2>使用するお酒</h2>
          @foreach($includes as $include)
              <label>
                  {{-- valueを'$subjectのid'に、nameを'配列名[]'に --}}
                  <input type="checkbox" value="{{ $include->id }}" name="includes_array[]">
                      {{$include->include_name}}
                  </input>
              </label>

          @endforeach
      </div>

      {{--
      <div>
          <h2>学年</h2>
          <input type="text" name="student[grade]" placeholder="学年" />
      </div>

      <div>
          <h2>年齢</h2>
          <input type="text" name="student[age]" placeholder="年齢" />
      </div>
      --}}

    <input type="submit" value="保存"/>
</x-app-layout>