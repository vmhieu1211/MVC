<h1>Welcome <?= $_SESSION['username'] ?? null; ?></h1>
<form method="POST" action="<?= route('role','store') ?>">
    <div>
        <label>Name</label>
        <input name="name"/>
    </div>
    <div>
        <label>Description</label>
        <textarea name="Description"></textarea>
    </div>
    <button type="submit" name="save">Save</button>
   
</form>
<form method="POST" action="<?= route('login','logout'); ?>">
    <button type="submit" name="logout">Logout</button>
</form>