<?php echo $this->Html->css('mystyle'); ?>
<?php $this->set("title", 'Comments'); ?>

<div class="row" style="margin-top:15px;">
	<div class="col-md-6">
		<!-- BEGIN ALERTS PORTLET-->
		<div class="portlet box blue-hoki">
			<div class="portlet-title">
				<div class="caption">
					<?php if(!empty($id)){ ?>
						Edit Comments
					<?php }else{ ?>
						Add Comments
					<?php } ?>
				</div>
				
				<div class="row">	
						<div class="col-md-12 horizontal "></div>
				</div>
			</div>
			<div class="portlet-body">
				<div class="">
					<?= $this->Form->create($comment,['id'=>'CountryForm']) ?>
						<div class="form-group">
							<label class="control-label col-md-4"style="padding-left:34px;"><span class="required"> * </span>Comments Name</label>
							<div class="col-md-8">
								<div class="input-icon right">
									<i class="fa"></i>
									<input type="text" value="<?php echo @$comment->comment; ?>" name="comment" class="form-control" Placeholder="Enter Comments Name">
									 
								</div>
							</div>
						</div>
						<div class="form-actions ">
							<div class="row">
								<div class="col-md-12" style=" text-align: center;">
									<hr></hr>
									<?php echo $this->Form->button('SUBMIT',['class'=>'btn btn-danger']); ?> 
								</div>
							</div>
						</div>
 						 
					<?= $this->Form->end() ?>
				</div> 
			</div>
		</div>
	</div>
	<div class="col-md-6">
		<!-- BEGIN ALERTS PORTLET-->
		<div class="portlet box blue-hoki">
			<div class="portlet-title">
				<div class="caption">
					View Comments List
				</div>
				<div class="tools"> 
 				</div>
				<div class="row">	
						<div class="col-md-12 horizontal "></div>
				</div>
			</div>
			<div class="portlet-body">
				<table class="table table-str table-hover " cellpadding="0" cellspacing="0">
					<thead>
						<tr>
							<th scope="col"><?= ('S.No') ?></th> 
							<th scope="col"><?= ('comment') ?></th>
							<th scope="col" class="actions"><?= __('Actions') ?></th>
						</tr>
					</thead>
					<tbody>
						<?php $x=0; foreach ($Comments as $comment): ?>
						<tr>
							<td><?= ++$x; ?></td> 
							<td><?= h($comment->comment) ?></td>
							<td class="actions">
								<?php echo $this->Html->image('edit.png',['url'=>['controller'=>'Comments','action'=>'add',$comment->id]]);?>
								<?php echo $this->Html->image('delete.png',['data-target'=>'#deletemodal'.$comment->id,'data-toggle'=>'modal','class'=>'pointer']);?>
								<div id="deletemodal<?php echo $comment->id; ?>" class="modal fade " role="dialog">
									<div class="modal-dialog modal-md" >
										<form method="post" action="<?php echo $this->Url->build(array('controller'=>'Comments','action'=>'delete',$comment->id)) ?>">
											<div class="modal-content">
												<div class="modal-header">
													<h4 class="modal-title">
														Are you sure you want to Delete this comment?
													</h4>
												</div>
												<div class="modal-footer" style="border:none;">
													<button type="submit" class="btn  btn-sm btn-danger">Yes</button>
													<button type="button" class="btn  btn-sm btn-danger" data-dismiss="modal"style="color: #000000;    background-color: #DDDDDD;;">Cancel</button>
												</div>
											</div>
										</form>
									</div>
								</div>
							   <?php  $this->Form->PostLink('<i class="fa fa-trash-o"></i>','/Countries/delete/'.$comment->id,array('escape'=>false,'class'=>'btn-xs','confirm' => __('Are you sure you want to delete # {0}?', $comment->id)));?>
							</td>
						</tr>
						<?php endforeach; ?> 
					</tbody>
				</table>
				
			</div>
		</div>
	</div>
</div>