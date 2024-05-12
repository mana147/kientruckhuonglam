@extends('admin.layouts.default')

@section('title','Bài viết | Ztech Admin')

@section('content_wrapper')

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
											<li class="breadcrumb-item text-muted"><?php echo __('admin/homepage.post_list'); ?></li>
											
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
									<!--begin::Products-->
									<div class="card card-flush">
										<!--begin::Card header-->
										<div class="card-header align-items-center py-5 gap-2 gap-md-5">
											<!--begin::Card title-->
											<div class="card-title">
												<!--begin::Search-->
												<div class="d-flex align-items-center position-relative my-1">
													<i class="ki-duotone ki-magnifier fs-3 position-absolute ms-4">
														<span class="path1"></span>
														<span class="path2"></span>
													</i>
													<input type="text" data-kt-ecommerce-product-filter="search" class="form-control form-control-solid w-250px ps-12" placeholder="<?php echo __('admin/homepage.post_search'); ?>" />
												</div>
												<!--end::Search-->
											</div>
											<!--end::Card title-->
											<!--begin::Card toolbar-->
											<div class="card-toolbar flex-row-fluid justify-content-end gap-5">
												<div class="w-100 mw-150px">
													<!--begin::Select2-->
													<select class="form-select form-select-solid" data-control="select2" data-hide-search="true" data-placeholder="<?php echo __('admin/homepage.status'); ?>" data-kt-ecommerce-product-filter="status">
														<option></option>
														<option value="all">All</option>
														<option value="published">Published</option>
														<option value="scheduled">Scheduled</option>
														<option value="inactive">Inactive</option>
													</select>
													<!--end::Select2-->
												</div>
												<!--begin::Add product-->
												<a href="<?php echo route('post.create'); ?>" class="btn btn-primary"><?php echo __('admin/homepage.post_add'); ?></a>
												<!--end::Add product-->
											</div>
											<!--end::Card toolbar-->
										</div>
										<!--end::Card header-->
										<!--begin::Card body-->
										<div class="card-body pt-0">
											<!--begin::Table-->
											<table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_ecommerce_products_table">
												<thead>
													<tr class="text-start text-gray-500 fw-bold fs-7 text-uppercase gs-0">
														<th class="w-10px pe-2">
															<div class="form-check form-check-sm form-check-custom form-check-solid me-3">
																<input class="form-check-input" type="checkbox" data-kt-check="true" data-kt-check-target="#kt_ecommerce_products_table .form-check-input" value="1" />
															</div>
														</th>
														<th class="min-w-50px">ID</th>
														<th class="min-w-100px">Hình ảnh</th>
														<th class="min-w-200px">Tiêu đề</th>
														<th class="min-w-100px">Danh mục</th>
														<th class="min-w-100px">Tác giả</th>
														<th class="min-w-100px">Ngày tạo</th>
                                                        <th class="min-w-100px">Trạng thái</th>
														<th class="min-w-70px">Thao tác</th>
													</tr>
												</thead>
												<tbody class="fw-semibold text-gray-600">
                                                    <?php			
																					
                                                        foreach($posts as $post) {
                                                            $id     	= $post->id;
                                                            $name   	= $post->name;
															$created_at = $post->created_at;
															$status 	= $post->status;
															$author_id 	= $post->author_id;
															$author_name = $post->author_name;
															$status_name = $post->status_name;
															$status_css_class = $post->status_css_class;
															
															$avatar_name = $post->image;

															
                                                    ?>

                                                    <tr>
														<td>
															<div class="form-check form-check-sm form-check-custom form-check-solid">
																<input class="form-check-input" type="checkbox" value="1" />
															</div>
														</td>
														<td>
                                                            <span class="fw-bold"><?php echo $id; ?></span>
														</td>
														<td class="pe-0">
															
                                                            <div class="d-flex align-items-center">
																<!--begin::Thumbnail-->
																<a href="#" class="symbol symbol-50px">																	
																	<img src="<?php echo asset('storage/' .$avatar_name); ?>" />
																	<!--<span class="symbol-label" style="background-image:url(assets/media//stock/ecommerce/1.png);"></span>-->
																</a>
																<!--end::Thumbnail-->
																
															</div>
														</td>
														<td class="pe-0" data-order="16">
															
                                                            
																	<!--begin::Title-->
																	<a href="#" class="text-gray-800 text-hover-primary fs-5 fw-bold" data-kt-ecommerce-product-filter="product_name"><?php echo $name; ?></a>
																	<!--end::Title-->
															
														</td>
														<td class="pe-0">
															
																	<!--begin::danh mục bài viết post Category-->
																	<?php
																	foreach($postCategories as $postCategory) {
																		if ($postCategory->post_id == $id) {
																			$category_id 	= $postCategory->category_id;
																			$category_name 	= $postCategory->category_name;
																	?>

																	<a href="#" class="text-gray-800 text-hover-primary fs-5 fw-bold" data-kt-ecommerce-product-filter="product_name">
																		<?php echo $category_name ."&nbsp &nbsp"; ?>
																	</a>

																	<?php
																		}
																	} 
																	?>
																	
																	<!--end::danh mục bài viết post Category-->
															

														</td>
														<!-- ----- begin: cột author_name ----- -->
														<td class="pe-0" data-order="rating-4">
														<a href="#" class="text-gray-800 text-hover-primary fs-5 fw-bold" data-kt-ecommerce-product-filter="product_name"><?php echo $author_name; ?></a>
														</td>
														<!-- ----- end: cột author_name ----- -->
														
														<!-- ----- begin: cột ngày giờ tạo ----- -->
														<td class="pe-0" data-order="Published">
															<?php echo $created_at; ?>
														</td>
														<!-- ----- end: cột ngày giờ tạo ----- -->
														
														<!-- ----- begin: cột trạng thái publish: 1 - publish (đã xuất bản) 2 - pending (chờ duyệt) 3 - draft (bản nháp) ----- -->
														<td class="">
															<div class="<?php echo $status_css_class; ?>"><?php echo $status_name; ?></div>															
														</td>
														<!-- ----- end: cột trạng thái publish ----- -->
														
														<!-- ----- begin: cột các nút hành động ----- -->
														<td>
															<a class="btn btn-sm btn-icon btn-primary" href="<?php echo route('post.edit') .'/' .$id; ?>">
																<svg class="icon" data-bs-toggle="tooltip" data-bs-title="Edit" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
															<path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
															<path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1"></path>
															<path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z"></path>
															<path d="M16 5l3 3"></path>
															</svg>            
																<span class="sr-only">Edit</span>
															</a>



															<a class="btn btn-sm btn-icon btn-danger" href="#" data-bs-toggle="modal" data-bs-target="#kt_modal_delete_post_<?php echo $id; ?>" data-dt-single-action="" data-method="DELETE" data-confirmation-modal="true" data-confirmation-modal-title="Confirm delete" data-confirmation-modal-message="Do you really want to delete this record?" data-confirmation-modal-button="Delete" data-confirmation-modal-cancel-button="Cancel">
																<svg class="icon" data-bs-toggle="tooltip" data-bs-title="Delete" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
															<path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
															<path d="M4 7l16 0"></path>
															<path d="M10 11l0 6"></path>
															<path d="M14 11l0 6"></path>
															<path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12"></path>
															<path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3"></path>
															</svg>            
																<span class="sr-only">Delete</span>
															</a>


															
															<!-- ----- hop thoai Xoa bai viet ----- -->						
															<div class="modal fade fade modal-blur modal fade modal-blur modal-confirm-delete" tabindex="-1" role="dialog" aria-hidden="true" data-select2-dropdown-parent="true" tabindex="-1" id="kt_modal_delete_post_<?php echo $id; ?>">
																<div class="modal-dialog modal-dialog-centered modal-sm"  role="document">
																	<div class="modal-content">
																		<div class="modal-header text-center">
																			<h3 class="modal-title">Xác nhận xóa</h3>

																			<!--begin::Close-->
																			<div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
																				<i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span class="path2"></span></i>
																			</div>
																			<!--end::Close-->
																		</div>

																		<div class="modal-body text-center">
																			<p>Bạn chắc chắn muốn xóa không?</p>
																		</div>

																		<div class="modal-footer text-center">
																			<div class="w-100">
																				<div class="row">
																					<div class="col">
																						<form method="post" action="<?php echo route('post.delete'); ?>" id="form_delete_post_<?php echo $id; ?>">
																							@csrf 
																							<input type="hidden" name="id" value="<?php echo $id; ?>"/>
																							<button type="button" class="btn btn-primary btn-danger delete-crud-entry" onclick="document.getElementById('form_delete_post_<?php echo $id; ?>').submit();">Delete</button>
																						</form>
																					</div>
																					<div class="col">
																						<button type="button" class="btn btn-primary btn-light" data-bs-dismiss="modal">Cancel</button>
																					</div>
																				</div>
																			</div>
																												
																			
																		</div>
																		</div>
																	</div>
																</div>
															</div>
															<!-- ----- hop thoai Xoa bai viet ----- -->	




														</td>
														<!-- ----- end: cột các nút hành động ----- -->
														
													</tr>

                                                    <?php
                                                        }
                                                    ?>
													
													
													
												</tbody>
											</table>
											<!--end::Table-->


										



										</div>
										<!--end::Card body-->
									</div>
									<!--end::Products-->
								</div>
								<!--end::Content container-->
							</div>
							<!--end::Content-->
						</div>


										

@endsection