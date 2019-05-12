<?php include('templates/header.php');?>
<?php include('templates/modal_auth.php');?>
<?php if($auth) include('templates/modal_admin_task.php');?>


    <div class="container">
        <div class="row mt-3">
            <div class="col">
                <a href="/<?php echo($page-1)?>" class="btn btn-light <?php if($page<=1) echo disabled;?>">Prev</a>
            </div>
            <div class="col text-center">
                <h3>Task list</h3>
                <span>showed <?php echo($from .' - ' . $to) ?> from: <?php echo($total) ?></span>
            </div>
            <div class="col text-right">
                <a href="/<?php echo($page+1)?>" class="btn btn-light <?php if($to>=$total) echo disabled;?>">Next</a>
            </div>
        </div>

        <div class="row">
            <div class="col big-btn-block">
                <?php foreach ($tasks as $task): ?>
                    <a href="#" class="<?php if($auth) echo('active'); ?>" data-toggle="modal" data-target="#adminTask"
                       data-name='<?php echo($task['name']); ?>'
                       data-email='<?php echo($task['email']); ?>'
                       data-text='<?php echo($task['text']); ?>'
                       data-id='<?php echo($task['id']); ?>'>

                        <p>
                            #<?php echo($task['id']); ?> <br>
                            Task from:
                            <?php echo($task['name'] .'<br>'. $task['email']); ?> <br>
                            Task status: <?php if($task['close']) echo('DONE'); else echo('In progress');?>
                        </p>
                        <p><?php echo($task['text']); ?></p>
                    </a>
                <?php endforeach; ?>
            </div>
        </div>

        <hr>

        <div class="row mt-3">
            <div class="col">
                <div class="row">
                    <div class="col">
                        <h4>Add new task</h4>
                    </div>
                </div>
                <form method="POST" action="/add">
                    <div class="form-group">
                        <div class="row">
                            <div class="col">
                                <label for="name">You'r name</label>
                                <input type="name" name="name" class="form-control" id="name" placeholder="Name" required>
                            </div>
                            <div class="col">
                                <label for="email">Email</label>
                                <input type="email" name="email" class="form-control" id="email" placeholder="Email" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="text">Text</label>
                        <textarea name="text" id="" cols="30" rows="10" style="display: block;width: 100%"></textarea>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Add task</button>
                    </div>
                </form>
            </div>
        </div>

    </div>


<?php include('templates/footer.php');?><?php
