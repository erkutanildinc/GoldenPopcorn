<!-- Tüm Movie'leri Listele -->
<?= $this->include('data/admin-operation-top.php') ?>


<div class="container" style="min-height : calc(100vh - 200px);">
    <table class="table table-striped mt-5">
        <thead>
        <tr>
            <th scope="col"></th>
            <th scope="col">Movie Name</th>
            <th scope="col">Movie Category</th>
            <th scope="col">Movie Duration</th>
            <th scope="col">Operations</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <th scope="row">1</th>
            <td>Mark</td>
            <td>Otto</td>
            <td>@mdo</td>
            <td>
                <table>
                    <td>
                        <a href="#" class="btn btn-warning">
                            <i class="fas fa-pen-square"></i>
                        </a>
                    </td>
                    <td>
                        <a href="#" class="btn btn-danger">
                            <i class="fas fa-trash"></i>
                        </a>
                    </td>
                </table>
            </td>
        </tr>
        </tbody>
    </table>
</div>


<?= $this->include('data/admin-operation-bottom.php') ?>