<x-app-layout>
  <form action="/recipe" method="POST">
  <!-- actionはsubmitがされた際にformタグ内をactionで指定しているルーティングめがけて、送信する -->
      @csrf
      <div>
          <h2>レシピ名</h2>
          <input type="text" name="recipe[name]" placeholder="レシピ名" />
      </div>


      <div>
          <h2>使用するお酒</h2>
          <div>
              <input type="text" id="search" placeholder="お酒の名前で検索" oninput="filterOptions()">
              @foreach($includes as $include)
                <label>
                    {{-- valueを'$subjectのid'に、nameを'配列名[]'に --}}
                    <input type="checkbox" value="{{ $include->id }}" name="includes_array[]">
                    {{--nameが連想配列のキーになってるよ！--}}
                        {{$include->name}}
                    </input>
                </label>
              @endforeach

              {{--<select id="alcohol-options" name="recipe[alcohol][]" multiple size="10">
                  @foreach($includes as $include)
                      <option value="{{ $include->id }}">{{ $include->name }}</option>
                  @endforeach
              </select>--}}
          </div>
      </div>


    <input type="submit" value="保存"/>
  </form>
</x-app-layout>