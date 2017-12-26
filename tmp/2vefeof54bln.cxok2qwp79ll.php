<?php if ($SESSION['roles']=='Admin'): ?>
      <div class="table-responsive" id="dvData">
        <table  class="table table-condensed">
           <thead>
           <tr>
               <th scope="col">ID</th>
               <th scope="col">Username</th>
	       <th scope="col">Password</th>            
	       <th scope="col">Roles</th>            
               <th scope="col">BP</th>
               <th scope="col">Action</th>
           </tr>
           </thead>
       
           <tbody>
           <?php foreach (($users?:[]) as $rows): ?>
               <tr>
                   <td><?= trim($rows['id']) ?></td>
                   <td><?= trim($rows['username']) ?></td>
                   <td><?= trim($rows['password']) ?></td>
                   <td><?= trim($rows['roles']) ?></td>
                   <td><?= trim($rows['bp_id']) ?></td>
                   <td>
                      [ <a href="<?= $BASE.'/users/update/'. $rows['id'] ?>">Edit</a> | 
                       <a href="<?= $BASE.'/users/delete/'. $rows['id'] ?>">Delete</a> ]
                   </td>
       
               </tr>
           <?php endforeach; ?>
           </tbody>
       
        </table>
       </div>
  <h2><?= $error ?> </h2>

<?php endif; ?>


