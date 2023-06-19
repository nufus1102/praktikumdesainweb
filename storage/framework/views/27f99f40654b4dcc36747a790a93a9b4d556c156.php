<?php $__env->startSection("content"); ?>
<div id="main">
	<div class="page-header">
		
		<div class="pull-right">
			<a href="<?php echo e(URL::to('admin/restaurants/addrestaurant')); ?>" class="btn btn-primary">Add Restaurant <i class="fa fa-plus"></i></a>
		</div>
		<h2>Restaurants</h2>
	</div>
	<?php if(Session::has('flash_message')): ?>
				    <div class="alert alert-success">
				    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
<span aria-hidden="true">&times;</span></button>
				        <?php echo e(Session::get('flash_message')); ?>

				    </div>
	<?php endif; ?>
     
<div class="panel panel-default panel-shadow">
    <div class="panel-body">
         
        <table id="data-table" class="table table-striped table-hover dt-responsive" cellspacing="0" width="100%">
            <thead>
            <tr>
                <th>Name</th>
                <th>Menu Categories</th>
                <th>Menu Items</th>
                <th>Orders</th>                         
                <th class="text-center width-100">Action</th>
            </tr>
            </thead>

            <tbody>
            <?php $__currentLoopData = $restaurants; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $restaurant): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><a href="<?php echo e(url('admin/restaurants/view/'.$restaurant->id)); ?>" class="text-regular"><?php echo e($restaurant->restaurant_name); ?></a>
                    <a href="<?php echo e(url('admin/restaurants/view/'.$restaurant->id)); ?>" class="text-muted"><i class="md md-local-restaurant"></i></a></td>  
                <td><?php echo e(App\Restaurants::getMenuCategories($restaurant->id)); ?></td>
                <td><?php echo e(App\Restaurants::getMenuItems($restaurant->id)); ?></td>
                <td><?php echo e(App\Restaurants::getOrders($restaurant->id)); ?></td>                          
                <td class="text-center">
                <a href="<?php echo e(url('admin/restaurants/view/'.$restaurant->id)); ?>" class="btn btn-default btn-rounded"><i class="md md-settings-display"></i></a>
                <a href="<?php echo e(url('admin/restaurants/addrestaurant/'.$restaurant->id)); ?>" class="btn btn-default btn-rounded"><i class="md md-edit"></i></a>
                <a href="<?php echo e(url('admin/restaurants/delete/'.$restaurant->id)); ?>" class="btn btn-default btn-rounded" onclick="return confirm('Are you sure? You will not be able to recover this.')"><i class="md md-delete"></i></a>
            </td>
                
            </tr>
           <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
             
            </tbody>
        </table>
         
    </div>
    <div class="clearfix"></div>
</div>

</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make("admin.admin_app", \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>