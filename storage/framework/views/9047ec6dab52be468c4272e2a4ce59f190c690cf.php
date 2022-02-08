
<?php $__env->startSection('content'); ?>
<!-- Page Wrapper -->
<div class="page-wrapper">
            <!-- Page Content -->
            <div class="content container-fluid">
                <!-- Page Header -->
                <div class="page-header">
                    <div class="row align-items-center">
                        <div class="col">
                            <h3 class="page-title">Designations</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index">Dashboard</a></li>
                                <li class="breadcrumb-item active">Designations</li>
                            </ul>
                        </div>
                        <div class="col-auto float-right ml-auto">
                            <a href="#" class="btn add-btn" data-toggle="modal" data-target="#add_designation"><i class="fa fa-plus"></i> Add Designation</a>
                        </div>
                    </div>
                </div>
                <!-- /Page Header -->
                <?php if($message = Session::get('success')): ?>
				    <div class="alert alert-success">
						<p><?php echo e($message); ?></p>
					</div>
				<?php endif; ?>   
				<?php if($errors->any()): ?>
					<div class="alert alert-danger">
						<strong>Whoops!</strong> There were some problems with your input.<br><br>
							<ul>
								<?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<li><?php echo e($error); ?></li>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							</ul>
					</div>
				<?php endif; ?>
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="table table-striped custom-table mb-0 datatable">
                                <thead>
                                    <tr>
                                        <th style="width: 30px;">#</th>
                                        <th>Designation </th>
                                        <th>Department </th>
                                        <th class="text-right">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $designation; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                                        <?php $__currentLoopData = $item->designations_r; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td><?php echo $data->id; ?></td>
                                                <td><?php echo $data->designations; ?></td>
                                                <td><?php echo $item->name; ?></td>
                                                <td class="text-right">
                                                <div class="dropdown dropdown-action">
                                                        <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                                        <div class="dropdown-menu dropdown-menu-right">
                                                        <a class="dropdown-item edit_dep" href="#" data-toggle="modal" data-target="#edit_designation" id="<?php echo $data->id; ?>" data-dep="<?php echo $data->designations; ?>" data-des="<?php echo e($item->id); ?>"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                                        <a class="dropdown-item del_dep" href="#" data-toggle="modal" data-target="#delete_designation" id="<?php echo $data->id; ?>"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
                                                    </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Page Content -->

            <!-- Add Designation Modal -->
            <div id="add_designation" class="modal custom-modal fade" role="dialog">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Add Designation</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="<?php echo e(route('add_des')); ?>" method="post">
                                <?php echo csrf_field(); ?>
                                <div class="form-group">
                                    <label>Designation Name <span class="text-danger">*</span></label>
                                    <input class="form-control" type="text" name="designations">
                                </div>
                                <div class="form-group">
                                    <label>Department <span class="text-danger">*</span></label>
                                    <select class="select" name="id">
                                        <option>Select Department</option>
                                        <?php $__currentLoopData = $designation; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                                            <option value="<?php echo e($data->id); ?>"><?php echo e($data->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>  
                                    </select>
                                </div>
                                <div class="submit-section">
                                    <button class="btn btn-primary submit-btn">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Add Designation Modal -->
            
            <!-- Edit Designation Modal -->
           
                    <div id="edit_designation" class="modal custom-modal fade" role="dialog">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Edit Designation</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="<?php echo e(route('add_des')); ?>" method="post">
                                        <?php echo csrf_field(); ?>
                                        <div class="form-group">
                                            <label>Designation Name <span class="text-danger">*</span></label>
                                            <input class="form-control" type="text" value="" name="designations" id="designations">
                                        </div>
                                        <div class="form-group">
                                            <label>Department <span class="text-danger">*</span></label>
                                            <select class="select" name="id" id="department_sel">
                                           
                                                <?php $__currentLoopData = $designation; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data_val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                                                    <option value="<?php echo e($data_val->id); ?>" <?php echo e($data_val->id == $data->department_id  ? 'selected' : ''); ?>><?php echo e($data_val->name); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                                           
                                            </select>
                                        </div>
                                        <input type="hidden" name="edit_id" value="" id="edit_id">
                                        <div class="submit-section">
                                            <button class="btn btn-primary submit-btn">Save</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                
            <!-- /Edit Designation Modal -->
            
            <!-- Delete Designation Modal -->
           
                    <div class="modal custom-modal fade" id="delete_designation" role="dialog">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-body">
                                    <div class="form-header">
                                        <h3>Delete Designation</h3>
                                        <p>Are you sure want to delete?</p>
                                    </div>
                                    <div class="modal-btn delete-action">
                                        <form action="<?php echo e(route('add_des')); ?>" method="post">
                                            <?php echo csrf_field(); ?>
                                            <input type="hidden" value="" name='del_id' id="del_id">
                                                <div class="row">
                                                    <div class="col-6">
                                                        <button class="btn btn-primary continue-btn" id="delete_btn">Delete</button>
                                                    </div>
                                                    <div class="col-6">
                                                        <a href="javascript:void(0);" data-dismiss="modal" class="btn btn-primary cancel-btn">Cancel</a>
                                                    </div>
                                                </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
               
            <!-- /Delete Designation Modal -->
        
        </div>
        <script type="text/javascript">
        jQuery(document).ready(function($) {
            jQuery(".edit_dep").click(function(event) {
                var id = jQuery(this).attr('id');
                var des = jQuery(this).attr('data-des');
                var name = jQuery(this).attr('data-dep');
                jQuery("#designations").val(name);
                jQuery("#edit_id").val(id);
                jQuery('#department_sel').val(des).trigger("change");
            });
            jQuery(".del_dep").click(function(event) {
                var id = jQuery(this).attr('id');
                jQuery("#del_id").val(id);
            });
        });
        </script>
        <!-- /Page Wrapper -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.mainlayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ems\resources\views/designations.blade.php ENDPATH**/ ?>