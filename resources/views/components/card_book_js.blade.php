<div class="card mb-1 col-md-3 col-sm-6 col-xs-12 w-100">
    <img :src="book.image_url" class="card-img-top" :alt="book.title">
    <div class="card-body">
        <h5 class="card-title">
            <a :href="book.url" v-text="book.title"></a>
        </h5>
        <div class="card-text">
            <table>
                <tr>
                    <th>出版社</th>
                    <td v-text="book.publisher"></td>
                </tr>
                <tr>
                    <th>著者</th>
                    <td v-text="book.author"></td>
                </tr>
            </table>
        </div>
    </div>
    <ul class="list-group list-group-flush">
        <li class="list-group-item">
            <a :href="book.url">Amazonはこちら</a>
        </li>
        <li class="list-group-item">
            <a href="/user/book/insert">my本棚への登録はこちら</a>
        </li>
    </ul>
</div>
