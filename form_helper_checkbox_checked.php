<?php 
$edit_data		=	$this->db->get_where('user_role' , array('user_role_id' => $param2 , 'status'=> 1))->result_array();
foreach ( $edit_data as $row):
?>
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-primary" data-collapsed="0">
        	<div class="panel-heading">
            	<div class="panel-title" >
            		<i class="entypo-plus-circled"></i>
					<?php echo get_phrase('edit_user_role');?>
            	</div>
            </div>
			<div class="panel-body">
                    <?php echo form_open(base_url() . 'index.php?admin/user_role/do_update/'.$row['user_role_id'] , array('class' => 'form-horizontal form-groups-bordered validate','target'=>'_top', 'enctype' => 'multipart/form-data'));?>                                                        
                            <div class="form-group">
                                <label class="col-sm-3 control-label"><?php echo get_phrase('user_role');?></label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" name="role" value="<?php echo $row['role'];?>"/>
                                </div>
                            </div>

                        <?php 
						$modules	=	$this->db->get_where('modules', array('status' => 1))->result_array();
						?>
						<h4 for="field-1" class="col-md-12 text-center"><?php echo get_phrase('Assign Modules');?></h4>
						
						<div class="col-md-12 center">	
							<table>
								<tr>
									<th width="50%">Modules</th>
									<th width="10%">Create</th>
									<th width="10%">Edit</th>
									<th width="10%">Delete</th>
									<th width="10%">View</th>
								</tr>
								<?php foreach($modules as $module): ?>
								<?php echo form_hidden('modules[]',$module['module_id']); ?>
								<tr>
									<td><?php echo $module['name']; ?> </td>
									<td><?php echo form_checkbox('add[]', '' ,$module['add'] ==1 ? 'checked' : null); ?> </td>
									<td><?php echo form_checkbox('edit[]', '' ,$module['edit'] ==1 ? 'checked' : null); ?> </td>
									<td><?php echo form_checkbox('delete[]', '' ,$module['delete'] ==1 ? 'checked' : null); ?> </td>
									<td><?php echo form_checkbox('view[]', '' ,$module['view'] ==1 ? 'checked' : null); ?> </td>
								</tr>
							<?php endforeach;?>	
							</table>
							</div>
						<div class="form-group">
                            <div class="col-sm-offset-3 col-sm-5">
                                <button type="submit" class="btn btn-info"><i class="fa fa-save"></i>&nbsp;<?php echo get_phrase('edit_user_role');?></button>
                            </div>
                        </div>
                <?php echo form_close();?>
            </div>
        </div>
    </div>
</div>

<?php
endforeach;
?>
