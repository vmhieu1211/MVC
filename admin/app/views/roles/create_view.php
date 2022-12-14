<div class="containerfluid">
    <div class="row">
        <div class="col">
            <form method="POST" action="<?= route('role','store')?>" class="p-3 border">
                <div class="form-group">
                    <label for="">Vai tro(*)</label>
                    <input name="name" class="form-control" type="text">
                </div>
                <div class="form-group">
                    <label for="">Mo ta</label>
                    <textarea name="description"class="form-control"></textarea>
                </div>
                <button class="btn btn-primary" name="save">Luu</button>
            </form>
            
        </div>
    </div>
</div>