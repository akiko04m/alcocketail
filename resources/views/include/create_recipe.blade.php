<x-app-layout>
  <form action="/recipe" method="POST">
  <!-- actionはsubmitがされた際にformタグ内をactionで指定しているルーティングめがけて、送信する -->
      @csrf
      <div>
          <h2>レシピ名</h2>
          <input type="text" name="recipe[name]" placeholder="レシピ名" />
          <!-- typeとか、nameとか、は属性！ -->
      </div>

      <div>
      <h2>使用するお酒</h2>
          @foreach($includes as $include)
            <label>
                {{-- valueを'$subjectのid'に、nameを'配列名[]'に --}}
                <input type="checkbox" value="{{ $include->id }}" name="includes_array[]">
                {{--nameが連想配列のキーになってるよ！--}}
                    {{$include->name}}
                </input>
            </label>
          @endforeach
      </div>

  <!-- プロセス入力部分 -->
    <label>{{ __('プロセス') }}
        <a onclick=add() class="btn btn-sm btn-light">+追加</a>
        <div id="input_plural">
            <div class="d-flex">
                <input type="text" class="form-control mb-1" name="process[1]">
                <input type="button" value="削除" onclick="del(this)">
            </div>
        </div>
    </label>
    <button type="submit" value="save">保存</button>
  </form>

  <script>
    let inputPlural = document.getElementById('input_plural');
    var count = 2;

    function add() {
        let div = document.createElement('DIV');
        div.classList.add('d-flex');

        var input = document.createElement('INPUT');
        input.classList.add('form-control');
        input.setAttribute('name', 'process['+count+']');
        div.appendChild(input);

        var input = document.createElement('INPUT');
        input.setAttribute('type', 'button');
        input.setAttribute('value', '削除');
        input.setAttribute('onclick', 'del(this)');
        div.appendChild(input);

        inputPlural.appendChild(div);
        count++;
    }

    function del(o) {
        o.parentNode.remove();
    }
  </script>
</x-app-layout>