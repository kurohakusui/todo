<table>
    <thead>
        <tr class="article-item">
            <th>id</th>
            <th>title</th>
        </tr>
    </thead>
@foreach ($articles as $list)
<tr class="article-item">
    <td><div class="article-id">{{ $list->id }}</div></td>
    <td><div class="title">{{ $list->title }}</div></td>
    <td><div class="article-info">
        {{ $list->created_at }}｜{{ $list->user->name }}
    </div></td>
    <td><button class="greenblue" type="submit" onclick="location.href='{{ route('todos.show',['id' => $list->id]) }}'">詳細</button></td>
    @can('update', $list)
    <td><button class="blue" type="submit" onclick="location.href='{{ route('todos.edit',['id' => $list->id]) }}'">編集</button></td>
    <td><form onsubmit="return confirm('本当に消去しますか？')" action="{{ route('todos.destroy', $list) }}" method="post">
        @csrf
        @method('delete')
        <button class="red" type="submit">消去</button>
    </form></td>
    @endcan
</tr>
@endforeach
</table>
{{ $articles->links() }}