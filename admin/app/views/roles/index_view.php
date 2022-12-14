<div class="container-fluid">
    <div class="col">
        <div class="row">
            <h3>Danh sach vai tro</h3>
        </div>
        <a  class="btn btn-primary" href="<?= route('role','create') ?>">Tao vai tro</a>
        <table class="table table-hover mt-3">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Vai tro</th>
                    <th>Mo ta</th>
                    <th>Trang thai</th>
                    <th>Ngay tao</th>
                    <th colspan="2" width="3%">Hanh dong</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($roles as $key => $role):?>
                    <tr>
                        <td><?= $key + 1;?></td>
                        <td><?= $role['name'];?></td>
                        <td><?= $role['description'];?></td>
                        <td><?= $role['status'] == ACTIVE_STATUS ? LABEL_ACTIVE_STATUS : LABEL_INACTIVE_STATUS;?></td>
                        <td>
                        <?= date('d-m-Y H:i:s',strtotime($role['created_at'])); ?>
                        </td>
                        <td>
                            <a href="<?= route('role','edit',['id' => $role['id']]);?>" class="btn btn-info">Sửa</a>
                        </td>
                        <td>
                            <a href="" class="btn btn-danger">Xóa</a>
                        </td>
                    </tr>
                   
                <?php endforeach; ?>
                
            </tbody>
        </table>
    </div>
</div>