<?= $this->view('_common.head'); ?>

<?= $this->view('_common.header', ['page' => $page]); ?>

<div class="py-5 text-center">
    <h2>Listing Page</h2>
    <br>
    <p class="lead">
        Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.
    </p>
</div>
<div class="row g-5">
    <div class="col-md-12">
        <h4 class="mb-3">Inscriptions List</h4>

        <div class="bd-example">

            <?= $this->view('_common.pagination'); ?>

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Names</th>
                        <th scope="col">Email</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Last Updated</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (! $result || ! isset($result->list)):
                        ?>
                        <tr align="center">
                            <th colspan="6">no registers</th>
                        </tr>
                        <?php
                    else:
                        foreach ($result->list as $row):
                        ?>
                            <tr id="row-<?= $row->id ?>">
                                <th scope="row"><?= $row->id ?></th>
                                <td><?= $row->name.' '.$row->surname ?></td>
                                <td><?= $row->email ?></td>
                                <td><?= $row->phone ?></td>
                                <td><?= $row->updated_at ?></td>
                                <td>
                                    <a href="/form?id=<?= $row->id ?>" title="update register <?= $row->email ?>">edit</a> |
                                    <a href="#" onclick="remove('<?= $row->id ?>')" title="delete register <?= $row->email ?>">del</a>
                                </td>
                            </tr>
                        <?php
                        endforeach;
                    endif;
                    ?>
                </tbody>

            </table>

            <?= $this->view('_common.pagination'); ?>

        </div>

    </div>
</div>

<script>
function remove(id) {
    let bundle = {}
    bundle.url  = `/api/inscription/${id}`

    jsonDelete(bundle).then((response) => {
        location.href = ``
    }).catch((error) => {
        console.log(error)
    })
}
</script>

<?= $this->view('_common.footer'); ?>