<div class="span10">

    <div class="row-fluid">
        
        <br />
        
        <form class="form-signin">
            
            <h2 class="form-signin-heading">Update Department</h2>
            
            <input name="name" type="text" class="input-block-level" placeholder="Name" value="<?php echo $dept_info['name']; ?>">
            
            <input tye="hidden" name="department_id" value="<?php echo $dept_info['department_id']; ?>" >
            
            <button class="btn btn-large btn-primary" type="submit">Update</button>
        </form>
    </div>

</div>
