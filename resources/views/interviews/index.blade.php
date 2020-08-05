<div style="text-align:center;">
    <p style="border:solid;padding:20px;margin:20px 150px;">{{ $randomInterview->question }}</p>
    <p>あと{{ $count }}問</p>

    <div style="display:inline-block">
        <form action="/interviews" method="POST">
         @csrf
            <button type="submit">スキップ</button>
        </form>
    </div>
    <div style="display:inline-block">
        <form action="/interviews/{{ $randomInterview->id }}" method="POST">
        @csrf
        @method('DELETE')
            <button type="submit">次へ</button>
        </form>
    </div>
    <div style="display:inline-block">
        <button type="button" onclick="location.href='/interviews/create'">初期化</button>
    </div>

    <table border="1" cellspacing="0" cellpadding="5" style="margin-left:auto;margin-right:auto;">
        <tr>
            <th>回答</th>
            <td>{{ $randomInterview->answer }}</td>
        </tr>
        <tr>
            <th>理由</th>
            <td>{{ $randomInterview->reason }}</td>
        </tr>
        <tr>
            <th>エピソード</th>
            <td>{{ $randomInterview->episode }}</td>
        </tr>
    </table>
</div>
