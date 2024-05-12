@extends('admin.layouts.default')

@section('title', 'Sửa bài viết | Ztech Admin')

@section('content_wrapper')

						<?php 
							$post_id 			= $editPost->id;
							$post_title 		= $editPost->title;
							$post_description 	= $editPost->description;
							$post_content 		= $editPost->content;
							$post_status		= $editPost->status;
							$post_isFeatured	= $editPost->is_featured;
							$post_image			= $editPost->image;
							$post_meta_title	= $editPost->meta_title;
							$post_meta_description = $editPost->meta_description;
							$post_meta_keywords = $editPost->meta_keywords;
							
						?>

						<div class="d-flex flex-column flex-column-fluid">
							<!--begin::Toolbar-->
							<div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
								<!--begin::Toolbar container-->
								<div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
									<!--begin::Page title-->
									<div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
										<!--begin::Title-->
										<h1 class="page-heading d-flex text-gray-900 fw-bold fs-3 flex-column justify-content-center my-0"><?php echo __('admin/homepage.content'); ?></h1>
										<!--end::Title-->
										<!--begin::Breadcrumb-->
										<ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
											<!--begin::Item-->
											<li class="breadcrumb-item text-muted">
												<a href="index.html" class="text-muted text-hover-primary"><?php echo __('admin/homepage.dashboard'); ?></a>
											</li>
											<!--end::Item-->
											<!--begin::Item-->
											<li class="breadcrumb-item">
												<span class="bullet bg-gray-500 w-5px h-2px"></span>
											</li>
											<!--end::Item-->
											<!--begin::Item-->
											<li class="breadcrumb-item text-muted"><?php echo __('admin/homepage.post'); ?></li>
											<!--end::Item-->
											<!--begin::Item-->
											<li class="breadcrumb-item">
												<span class="bullet bg-gray-500 w-5px h-2px"></span>
											</li>
											<!--end::Item-->
											<!--begin::Item-->
											<li class="breadcrumb-item text-muted"><?php echo __('admin/homepage.post_add'); ?></li>
											<!--end::Item-->
										</ul>
										<!--end::Breadcrumb-->
									</div>
									<!--end::Page title-->
									<!--begin::Actions-->
									
									<!--end::Actions-->
								</div>
								<!--end::Toolbar container-->
							</div>
							<!--end::Toolbar-->
							<!--begin::Content-->
							<div id="kt_app_content" class="app-content flex-column-fluid">
								<!--begin::Content container-->
								<div id="kt_app_content_container" class="app-container container-xxl">
									<!--begin::Form-->
									<form id="kt_ecommerce_edit_product_form" class="form d-flex flex-column flex-lg-row" data-kt-redirect="<?php echo route('post.saveedit'); ?>" method="post" action="<?php echo route('post.saveedit');?>" enctype="multipart/form-data">
										@csrf
										<input type="hidden" name="editpost_id" value="<?php echo $post_id; ?>" />
										
									<!--begin::Aside column-->
										<div class="d-flex flex-column gap-7 gap-lg-10 w-100 w-lg-300px mb-7 me-lg-10">
											<!--begin::Thumbnail settings-->
											<div class="card card-flush py-4">
												<!--begin::Card header-->
												<div class="card-header">
													<!--begin::Card title-->
													<div class="card-title">
														<h2><?php echo __('admin\homepage.post_thumbnail'); ?></h2>
													</div>
													<!--end::Card title-->
												</div>
												
												<!--end::Card header-->
												<!--begin::Card body-->
												<div class="card-body text-center pt-0">
													<!--begin::Image input-->
													<!--begin::Image input placeholder-->
													<style>.image-input-placeholder { background-image: url('<?php echo asset('storage/' .$post_image); ?>'); } [data-bs-theme="dark"] .image-input-placeholder { background-image: url('assets/media/svg/files/blank-image-dark.svg'); }</style>
													
													<!--end::Image input placeholder-->
													<div class="image-input image-input-empty image-input-outline image-input-placeholder mb-3" data-kt-image-input="true">
														<!--begin::Preview existing avatar-->
														<div class="image-input-wrapper w-150px h-150px"></div>
														<!--end::Preview existing avatar-->
														<!--begin::Label-->
														<label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Change avatar">
															<i class="ki-duotone ki-pencil fs-7">
																<span class="path1"></span>
																<span class="path2"></span>
															</i>
															<!--begin::Inputs-->
															<input type="file" name="avatar" accept=".png, .jpg, .jpeg" />
															<input type="hidden" name="avatar_remove" />
															<!--end::Inputs-->
														</label>
														<!--end::Label-->
														<!--begin::Cancel-->
														<span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="Cancel avatar">
															<i class="ki-duotone ki-cross fs-2">
																<span class="path1"></span>
																<span class="path2"></span>
															</i>
														</span>
														<!--end::Cancel-->
														<!--begin::Remove-->
														<span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="remove" data-bs-toggle="tooltip" title="Remove avatar">
															<i class="ki-duotone ki-cross fs-2">
																<span class="path1"></span>
																<span class="path2"></span>
															</i>
														</span>
														<!--end::Remove-->
													</div>
													<!--end::Image input-->
													<!--begin::Description-->
													<div class="text-muted fs-7">Set the product thumbnail image. Only *.png, *.jpg and *.jpeg image files are accepted</div>
													<!--end::Description-->
												</div>
												<!--end::Card body-->
											</div>
											<!--end::Thumbnail settings-->
											
											<!-- ----- begin::Post Status ----- -->
											<div class="card card-flush py-4">
												<!--begin::Card header-->
												<div class="card-header">
													<!--begin::Card title-->
													<div class="card-title">
														<h2><?php echo __('admin\homepage.post_status'); ?></h2>
													</div>
													<!--end::Card title-->
													<!--begin::Card toolbar-->
													<div class="card-toolbar">
														<div class="rounded-circle bg-success w-15px h-15px" id="kt_ecommerce_edit_product_status"></div>
													</div>
													<!--begin::Card toolbar-->
												</div>
												<!--end::Card header-->
												<!--begin::Card body-->
												<div class="card-body pt-0">
													<!--begin::Select2-->
													<select class="form-select mb-2" data-control="select2" data-hide-search="true" data-placeholder="Select an option" id="kt_ecommerce_add_post_status_select" name="status">
														<?php foreach($status_list as $status) { 
																if ($status->status_code == $post_status) {	
														?>
																	<option value="<?php echo $status->status_code; ?>" selected="selected"><?php echo $status->status_name; ?></option>
														<?php } else { ?>
																	<option value="<?php echo $status->status_code; ?>"><?php echo $status->status_name; ?></option>
														<?php } }; ?>
														
													</select>
													<!--end::Select2-->
													<!--begin::Description-->
													<div class="text-muted fs-7"><?php echo __('admin\homepage.post_status_note'); ?></div>
													<!--end::Description-->
													
												</div>

												<!-- ----- post feature ----- -->
												<div class="card-body pt-0">
												<div class="form-check form-switch form-check-custom form-check-solid">
													<?php if ($post_isFeatured == 1) { ?>
														<input class="form-check-input" type="checkbox" value="1" id="is_featured" name="is_featured" checked="checked"/>
													<?php } else { ?>
														<input class="form-check-input" type="checkbox" value="1" id="is_featured" name="is_featured" />
													<?php } ?>
													<label class="form-check-label" for="flexSwitchChecked">
														Is Featured?
													</label>
												</div>
													<!--end::Select2-->
													<!--begin::Description-->
													<div class="text-muted fs-7"><?php echo __('admin\homepage.post_status_note'); ?></div>
													<!--end::Description-->
													
												</div>
												<!--end::Card body-->
											</div>
											<!-- ----- end:: Post Status ----- -->

											<!-- ----- begin::Category & tags ----- -->
											<div class="card card-flush py-4">
												<!--begin::Card header-->
												<div class="card-header">
													<!--begin::Card title-->
													<div class="card-title">
														<h2><?php echo __('admin/homepage.post_category'); ?></h2>
													</div>
													<!--end::Card title-->
												</div>
												<!--end::Card header-->
												<!--begin::Card body-->
												<div class="card-body pt-0">
													<!--begin::Input group-->
													<!--begin::Label-->
													<label class="form-label">Categories</label>
													<!--end::Label-->
													<!--begin::Select2-->
													<select class="form-select mb-2" data-control="select3" data-placeholder="<?php echo __('admin\homepage.post_category_select'); ?>" data-allow-clear="true" multiple="multiple" name="category[]">
														<?php foreach($categories as $category) {
																$inCategory = false;
																foreach($postCategories as $postCategory) {
																	if ($category->id == $postCategory->category_id) {
														?>
																			<option value="<?php echo $category->id; ?>" selected><?php echo $category->name; ?></option>
														<?php 
																	$inCategory = true;
																	}
																}
																if ($inCategory == false) {
														?>
																			
														
																			<option value="<?php echo $category->id; ?>"><?php echo $category->name; ?></option>			
														
														<?php } } ?>
														
													</select>
													<!--end::Select2-->
													<!--begin::Description-->
													<div class="text-muted fs-7 mb-7"><?php echo __('admin\homepage.post_add_to_category'); ?></div>
													<!--end::Description-->
													<!--end::Input group-->
													<!--begin::Button-->
													<a href="#" class="btn btn-light-primary btn-sm mb-10">
													<i class="ki-duotone ki-plus fs-2"></i><?php echo __('admin\homepage.post_category_create'); ?></a>
													<!--end::Button-->
													<!--begin::Input group-->
													<!--begin::Label-->
													<label class="form-label d-block">Tags</label>
													<!--end::Label-->
													<!--begin::Input-->
													<input id="kt_ecommerce_add_post_tags" name="kt_ecommerce_add_post_tags" class="form-control mb-2" value="" />
													<!--end::Input-->
													<!--begin::Description-->
													<div class="text-muted fs-7"><?php echo __('admin\homepage.post_tag'); ?></div>
													<!--end::Description-->
													<!--end::Input group-->
												</div>
												<!--end::Card body-->
											</div>
											<!-- ----- end::Category & tags ----- -->

											<!--begin::Weekly sales-->											
											<!--end::Weekly sales-->

											<!--begin::Template settings-->											
											<!--end::Template settings-->
										</div>
										<!--end::Aside column-->

										<!--begin::Main column-->
										<div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10">
											<!--begin:::Tabs-->
											<ul class="nav nav-custom nav-tabs nav-line-tabs nav-line-tabs-2x border-0 fs-4 fw-semibold mb-n2">
												<!--begin:::Tab item-->
												<li class="nav-item">
													<a class="nav-link text-active-primary pb-4 active" data-bs-toggle="tab" href="#kt_ecommerce_edit_product_general">General</a>
												</li>
												<!--end:::Tab item-->
												<!--begin:::Tab item-->												
												<!--end:::Tab item-->
											</ul>
											<!--end:::Tabs-->

											<div class="d-flex justify-content-end">
												<!--begin::Button-->
												<a href="<?php echo route('post.list'); ?>" id="kt_ecommerce_edit_product_cancel" class="btn btn-light me-5">Cancel</a>
												<!--end::Button-->
												<!--begin::Button-->
												<button type="submit" id="kt_ecommerce_edit_product_submit" class="btn btn-primary">
													<span class="indicator-label">Save Changes</span>
													<span class="indicator-progress">Please wait... 
													<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
												</button>
												<!--end::Button-->
											</div>

											<!--begin::Tab content-->
											<div class="tab-content">
												<!--begin::Tab pane-->
												<div class="tab-pane fade show active" id="kt_ecommerce_edit_product_general" role="tab-panel">
													<div class="d-flex flex-column gap-7 gap-lg-10">
														<!--begin::General options-->
														<div class="card card-flush py-4">
															<!--begin::Card header-->
															<div class="card-header">
																<div class="card-title">
																	<h2><?php echo __('admin\homepage.post_content'); ?></h2>
																</div>
															</div>
															<!--end::Card header-->
															<!--begin::Card body-->
															<div class="card-body pt-0">
																<!--begin::Input group-->
																<div class="mb-10 fv-row">
																	<!--begin::Label-->
																	<label class="required form-label"><?php echo __('admin/homepage.post_title'); ?></label>
																	<!--end::Label-->
																	<!--begin::Input-->
																	<input type="text" name="title" class="form-control mb-2" placeholder="<?php echo __('admin/homepage.post_title'); ?>" value="<?php echo $post_title; ?>" />
																	<!--end::Input-->
																	<!--begin::Description-->
																	<div class="text-muted fs-7"><?php echo __('admin/homepage.post_title_note'); ?></div>
																	<!--end::Description-->
																</div>
																<!--end::Input group-->
                                                                <!--begin::Input group-->
																<div class="mb-10 fv-row">
																	<!--begin::Label-->
																	<label class="required form-label"><?php echo __('admin/homepage.post_description'); ?></label>
																	<!--end::Label-->
																	<!--begin::Input-->																
                                                                    <input type="text" name="description" class="form-control mb-2" placeholder="<?php echo __('admin/homepage.post_description'); ?>" value="<?php echo $post_description; ?>" />
																	
																	<!--end::Input-->
																	
																</div>
																<!--end::Input group-->
																<!--begin::Input group-->
																<div>
																	<!--begin::Label-->
																	<label class="required form-label"><?php echo __('admin/homepage.post_content'); ?></label>
																	<!--end::Label-->
																	<!--begin::Editor-->
																	
																	<div class="py-5" data-bs-theme="light">
																		<textarea name="content" id="kt_ecommerce_edit_product_content">																			
																			<?php echo $post_content; ?>
																		</textarea>
																	</div>
																	
																	<!--end::Editor-->
																	<!--begin::Description-->
																	<div class="text-muted fs-7"><?php echo __('admin/homepage.post_content_note'); ?></div>
																	<!--end::Description-->
																</div>
																<!--end::Input group-->
															</div>
															<!--end::Card header-->
														</div>
														<!--end::General options-->

														<!-- ----- begin::Media ----- -->
														<div class="card card-flush py-4">
															<!--begin::Card header-->
															<div class="card-header">
																<div class="card-title">
																	<h2>Media</h2>
																</div>
															</div>
															<!--end::Card header-->
															<!--begin::Card body-->
															<div class="card-body pt-0">
																<?php foreach($postImages as $postImage) { ?>
																	<img class="img-thumbnail" style="height: 200px;" src="<?php echo asset('storage/' .$postImage->image_path); ?>" />
																	
																	
																<?php
																	}
																?>

																<!--begin::Repeater-->
																<div id="kt_post_image_uploader">
																	<!--begin::Form group-->
																	<div class="form-group">
																		<div data-repeater-list="kt_post_image_uploader">
																			<div data-repeater-item>
																				<div class="form-group row">
																					<div class="col-md-3">
																						<label class="form-label">Name:</label>
																						<input type="file" class="form-control mb-2 mb-md-0" placeholder="upload image" name="post_image" />
																					</div>
																					
																					<div class="col-md-4">
																						<a href="javascript:;" data-repeater-delete class="btn btn-sm btn-light-danger mt-3 mt-md-8">
																							<i class="ki-duotone ki-trash fs-5"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span></i>
																							Delete
																						</a>
																					</div>
																				</div>
																			</div>
																		</div>
																	</div>
																	<!--end::Form group-->

																	<!--begin::Form group-->
																	<div class="form-group mt-5">
																		<a href="javascript:;" data-repeater-create class="btn btn-light-primary">
																			<i class="ki-duotone ki-plus fs-3"></i>
																			Add
																		</a>
																	</div>
																	<!--end::Form group-->
																</div>
																<!--end::Repeater-->

															</div>
															<!--end::Card header-->

															


														</div>
														<!-- ----- end::Media ----- -->
														
														<!-- ----- begin::Meta Option ----- -->
														<div class="card card-flush py-4">
															<!--begin::Card header-->
															<div class="card-header">
																<div class="card-title">
																	<h2>Meta Options</h2>
																</div>
															</div>
															<!--end::Card header-->
															<!--begin::Card body-->
															<div class="card-body pt-0">
																<!--begin::Input group-->																
																<!--end::Input group-->

																<!--begin::Input group-->																
																<!--end::Input group-->

																<!--begin::Input group-->
																<div class="d-none mb-10 fv-row" id="kt_ecommerce_edit_product_discount_percentage">
																	<!--begin::Label-->
																	<label class="form-label">Set Discount Percentage</label>
																	<!--end::Label-->
																	<!--begin::Slider-->
																	<div class="d-flex flex-column text-center mb-5">
																		<div class="d-flex align-items-start justify-content-center mb-7">
																			<span class="fw-bold fs-3x" id="kt_ecommerce_edit_product_discount_label">0</span>
																			<span class="fw-bold fs-4 mt-1 ms-2">%</span>
																		</div>
																		<div id="kt_ecommerce_edit_product_discount_slider" class="noUi-sm"></div>
																	</div>
																	<!--end::Slider-->
																	<!--begin::Description-->
																	<div class="text-muted fs-7">Set a percentage discount to be applied on this product.</div>
																	<!--end::Description-->
																</div>
																<!--end::Input group-->

																<!--begin::Input group-->
																<div class="mb-10">
																	<!--begin::Label-->
																	<label class="form-label">Meta Tag Title</label>
																	<!--end::Label-->
																	<!--begin::Input-->
																	<input type="text" class="form-control mb-2" name="meta_title" placeholder="Meta tag name" value="<?php echo $post_meta_title; ?>"/>
																	<!--end::Input-->
																	<!--begin::Description-->
																	<div class="text-muted fs-7"><?php echo __('admin\homepage.post_meta_tag_title_note'); ?></div>
																	<!--end::Description-->
																</div>
																<!--end::Input group-->
																<!--begin::Input group-->
																<div class="mb-10">
																	<!--begin::Label-->
																	<label class="form-label">Meta Tag Description</label>
																	<!--end::Label-->
																	<!--begin::Editor-->
																	<input type="text" id="kt_ecommerce_edit_product_meta_description" name="meta_description" class="form-control mb-2" placeholder="Meta tag description" value="<?php echo $post_meta_title; ?>"/>
																	<!--end::Editor-->
																	<!--begin::Description-->
																	<div class="text-muted fs-7"><?php echo __('admin\homepage.post_meta_tag_description_note'); ?></div>
																	<!--end::Description-->
																</div>
																<!--end::Input group-->
																<!--begin::Input group-->
																<div>
																	<!--begin::Label-->
																	<label class="form-label">Meta Tag Keywords</label>
																	<!--end::Label-->
																	<!--begin::Editor-->
																	<input type="text" id="kt_ecommerce_add_post_meta_keywords" name="meta_keywords" class="form-control mb-2" placeholder="Meta keyword" value="<?php echo $post_meta_title; ?>"/>
																	<!--end::Editor-->
																	<!--begin::Description-->
																	<div class="text-muted fs-7"><?php echo __('admin\homepage.post_meta_tag_keyword_note'); ?> 
																	</div>
																	<!--end::Description-->
																</div>
																<!--end::Input group-->

															</div>
															<!--end::Card header-->
														</div>
														<!-- ----- end::Meta Option ----- -->
														

													</div>
												</div>
												<!--end::Tab pane-->
												<!--begin::Tab pane-->
												
												<!--end::Tab pane-->
											</div>
											<!--end::Tab content-->
											
											<div class="d-flex justify-content-end">
												<!--begin::Button-->
												<a href="<?php echo route('post.list'); ?>" id="kt_ecommerce_edit_product_cancel" class="btn btn-light me-5">Cancel</a>
												<!--end::Button-->
												<!--begin::Button-->
												<button type="submit" id="kt_ecommerce_edit_product_submit" class="btn btn-primary">
													<span class="indicator-label">Save Changes</span>
													<span class="indicator-progress">Please wait... 
													<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
												</button>
												<!--end::Button-->
											</div>

										</div>
										<!--end::Main column-->
									</form>
									<!--end::Form-->
								</div>
								<!--end::Content container-->
							</div>
							<!--end::Content-->
						</div>

						<script>
							
							ClassicEditor
							.create(document.querySelector('#kt_ecommerce_edit_product_content'), {
								
								
							})
							.then(editor => {
								console.log(editor);
							})
							.catch(error => {
								console.error(error);
							});
						</script>

						<script>
							$('#kt_post_image_uploader').repeater({
								initEmpty: false,

								defaultValues: {
									'text-input': 'foo'
								},

								show: function () {
									$(this).slideDown();
								},

								hide: function (deleteElement) {
									$(this).slideUp(deleteElement);
								}
							});
						</script>

						
					

@endsection