<?php /* @var Food_type $data */ ?>

<?php /* @var \App\Models\Food_type[] $data */ ?>

<form method="post">
    <div class="form-group">
        <label for="exampleTitle">Nazov</label>
        <input value="<?=$data->getType()?>" type="text" name="type" class="form-control" id="exampleTitle" aria-describedby="Help" placeholder="Enter Title">
    </div>
    <button type="submit" class="btn btn-primary" >Submit</button>
</form>