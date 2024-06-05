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
        <h4 class="mb-3">Contract List</h4>

        <div class="bd-example">

            <?= $this->view('_common.pagination'); ?>

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">First</th>
                        <th scope="col">Last</th>
                        <th scope="col">Handle</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>Mark</td>
                        <td>Otto</td>
                        <td>@mdo</td>
                    </tr>
                    <tr>
                        <th scope="row">2</th>
                        <td>Jacob</td>
                        <td>Thornton</td>
                        <td>@fat</td>
                    </tr>
                    <tr>
                        <th scope="row">3</th>
                        <td colspan="2">Larry the Bird</td>
                        <td>@twitter</td>
                    </tr>
                </tbody>

            </table>

            <?= $this->view('_common.pagination'); ?>

        </div>

    </div>
</div>

<?= $this->view('_common.footer'); ?>