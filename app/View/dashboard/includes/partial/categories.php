<tr>
    <th scope="row">
        <?= $i + 1 ?>
    </th>
    <td>
        <?= $category->categorie_name ?>
    </td>
    <td>
        <?= $category->categorie_desc ?>
    </td>
    <td class="d-flex justify-content-around">
        <button type="button" class="btn btn-outline-success p-1 d-flex justify-content-center align-items-center"
            data-bs-toggle="modal" data-bs-target="#categorieEdit<?= $category->id_categorie ?>"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                stroke-linejoin="round" class="feather feather-tag">
                <path d="M20.59 13.41l-7.17 7.17a2 2 0 0 1-2.83 0L2 12V2h10l8.59 8.59a2 2 0 0 1 0 2.82z"></path>
                <line x1="7" y1="7" x2="7.01" y2="7"></line>
            </svg></button>
        <form method="post" action="/wiki_tm/articles/destory">
            <input type="hidden" name="delete[]">
            <button type="button"
                class="btn btn-outline-danger p-1 d-flex justify-content-center align-items-center"><svg
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