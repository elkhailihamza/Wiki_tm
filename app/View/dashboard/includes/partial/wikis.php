<tr>
    <th scope="row">
        <?= $i + 1 ?>
    </th>
    <td>
        <?= $article->article_name ?>
    </td>
    <td>
        <?= $article->is_archived ?>
    </td>
    <td>
        <?= $article->date_de_creation ?>
    </td>
    <td>
        <?= " " . $article->fname . " " . $article->lname ?>
    </td>
    <td>
        <?= $article->categorie_name ?? "Null" ?>
    </td>
    <td class="d-flex justify-content-around"><button
            class="btn btn-outline-warning p-1 d-flex justify-content-center align-items-center"><svg
                xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
                stroke="currentcolor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                class="feather feather-hash">
                <line x1="4" y1="9" x2="20" y2="9"></line>
                <line x1="4" y1="15" x2="20" y2="15"></line>
                <line x1="10" y1="3" x2="8" y2="21"></line>
                <line x1="16" y1="3" x2="14" y2="21"></line>
            </svg></button>
        <button class="btn btn-outline-success p-1 d-flex justify-content-center align-items-center"><svg
                xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                class="feather feather-tag">
                <path d="M20.59 13.41l-7.17 7.17a2 2 0 0 1-2.83 0L2 12V2h10l8.59 8.59a2 2 0 0 1 0 2.82z"></path>
                <line x1="7" y1="7" x2="7.01" y2="7"></line>
            </svg></button>
        <button class="btn btn-outline-dark p-1 d-flex justify-content-center align-items-center"><svg
                xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                class="feather feather-archive">
                <polyline points="21 8 21 21 3 21 3 8"></polyline>
                <rect x="1" y="3" width="22" height="5"></rect>
                <line x1="10" y1="12" x2="14" y2="12"></line>
            </svg></button>
        <form method="post" action="/wiki_tm/articles/destory">
            <input type="hidden" name="_method" value="DELETE">
            <input type="hidden" name="id_delete" value="<?= $article->id_article ?>">
            <button class="btn btn-outline-danger p-1 d-flex justify-content-center align-items-center"><svg
                    xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="feather feather-delete">
                    <path d="M21 4H8l-7 8 7 8h13a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2z"></path>
                    <line x1="18" y1="9" x2="12" y2="15"></line>
                    <line x1="12" y1="9" x2="18" y2="15"></line>
                </svg></button>
        </form>
    </td>
</tr>