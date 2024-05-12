@extends('admin.layouts.default')

@section('title', 'Danh mục bài viết | Ztech Admin')

@section('content_wrapper')

<div class="d-flex flex-column flex-column-fluid">
							<!--begin::Toolbar-->
							<div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
								<!--begin::Toolbar container-->
								<div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
									<!--begin::Page title-->
									<div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
										<!--begin::Title-->
										<h1 class="page-heading d-flex text-gray-900 fw-bold fs-3 flex-column justify-content-center my-0"><?php echo  __('admin\homepage.content_admin');?></h1>
										<!--end::Title-->
										<!--begin::Breadcrumb-->
										<ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
											<!--begin::Item-->
											<li class="breadcrumb-item text-muted">
												<a href="index.html" class="text-muted text-hover-primary"><?php echo __('admin\homepage.dashboard'); ?></a>
											</li>
											<!--end::Item-->
											<!--begin::Item-->
											<li class="breadcrumb-item">
												<span class="bullet bg-gray-500 w-5px h-2px"></span>
											</li>
											<!--end::Item-->
											<!--begin::Item-->
											<li class="breadcrumb-item text-muted"><?php echo __('admin\homepage.post_category'); ?></li>
											<!--end::Item-->
											<!--begin::Item-->
											<li class="breadcrumb-item">
												<span class="bullet bg-gray-500 w-5px h-2px"></span>
											</li>
											<!--end::Item-->
											<!--begin::Item-->
											<li class="breadcrumb-item text-muted"><?php echo __('admin\homepage.post_category_list'); ?></li>
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
									<!--begin::Category-->
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
													<input type="text" data-kt-ecommerce-category-filter="search" class="form-control form-control-solid w-250px ps-12" placeholder="<?php echo __('admin\homepage.post_category_search'); ?>" />
												</div>
												<!--end::Search-->
											</div>
											<!--end::Card title-->
											<!--begin::Card toolbar-->
											<div class="card-toolbar">
												<!--begin::Add customer-->
												<a href="<?php echo route('post.createCategories'); ?>" class="btn btn-primary"><?php echo __('admin\homepage.post_category_add'); ?></a>
												<!--end::Add customer-->
											</div>
											<!--end::Card toolbar-->
										</div>
										<!--end::Card header-->
										<!--begin::Card body-->
										<div class="card-body pt-0">
											<!--begin::Table-->
											<table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_ecommerce_category_table">
												<thead>
													<tr class="text-start text-gray-500 fw-bold fs-7 text-uppercase gs-0">
														<th class="w-10px pe-2">
															<div class="form-check form-check-sm form-check-custom form-check-solid me-3">
																<input class="form-check-input" type="checkbox" data-kt-check="true" data-kt-check-target="#kt_ecommerce_category_table .form-check-input" value="1" />
															</div>
														</th>
														<th class="min-w-250px"><?php echo __('admin\homepage.post_category'); ?></th>
														<th class="min-w-150px">Thuộc danh mục</th>
                                                        <th class="min-w-150px"><?php echo __('admin\homepage.author'); ?></th>
                                                        <th class="min-w-150px"><?php echo __('admin\homepage.created_at'); ?></th>
                                                        <th class="min-w-150px"><?php echo __('admin\homepage.status'); ?></th>
														<th class="text-end min-w-70px">Actions</th>
													</tr>
												</thead>
												<tbody class="fw-semibold text-gray-600">
                                                    <?php 
                                                    foreach($postCategories as $postCategory) {
                                                        $id = $postCategory->id;
														$parent_category_id = $postCategory->parent_id;
														$parent_category_name = "";
														foreach($parentCategories as $parentCategory) {
															if ($parentCategory->id == $parent_category_id) {
																$parent_category_name = $parentCategory->name;
															}
														}
                                                    ?>
													<tr>
														<td>
															<div class="form-check form-check-sm form-check-custom form-check-solid">
																<input class="form-check-input" type="checkbox" value="1" />
															</div>
														</td>
														<td>
															<div class="d-flex">
																<!--begin::Thumbnail-->
																<a href="apps/ecommerce/catalog/edit-category.html" class="symbol symbol-50px">
																	<span class="symbol-label" style="background-image:url(<?php echo asset('storage/' .$postCategory->image); ?>);"></span>
																</a>
																<!--end::Thumbnail-->
																<div class="ms-5">
																	<!--begin::Title-->
																	<a href="apps/ecommerce/catalog/edit-category.html" class="text-gray-800 text-hover-primary fs-5 fw-bold mb-1" data-kt-ecommerce-category-filter="category_name"><?php echo $postCategory->name; ?></a>
																	<!--end::Title-->
																	<!--begin::Description-->
																	<div class="text-muted fs-7 fw-bold"><?php echo $postCategory->description; ?></div>
																	<!--end::Description-->
																</div>
															</div>
														</td>
														<td>
															<!--begin::Badges-->
															<div class="badge badge-light-success"><?php echo $parent_category_name; ?></div>
															<!--end::Badges-->
														</td>
                                                        <td>
															<!--begin::Badges-->
															<p><?php echo $postCategory->author_name; ?></p>
															<!--end::Badges-->
														</td>
                                                        <td>
															<!--begin::Badges-->
															<p><?php echo $postCategory->created_at; ?></p>
															<!--end::Badges-->
														</td>
                                                        <td>
                                                            <div class="<?php echo $postCategory->status_css_class; ?>"><?php echo $postCategory->  status_name; ?></div>
                                                        </td>
                                                        
														<!-- ----- begin: cột các nút hành động ----- -->
														<td>
															<a class="btn btn-sm btn-icon btn-primary" href="<?php echo route('postCategory.edit') .'/' .$id; ?>">
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
													<?php } ?>
												
												</tbody>
												<!--end::Table body-->
											</table>
											<!--end::Table-->
										</div>
										<!--end::Card body-->
									</div>
									<!--end::Category-->
								</div>
								<!--end::Content container-->
							</div>
							<!--end::Content-->
						</div>
						<!--end::Content wrapper-->
						<!--begin::Footer-->
						<div id="kt_app_footer" class="app-footer">
							<!--begin::Footer container-->
							<div class="app-container container-fluid d-flex flex-column flex-md-row flex-center flex-md-stack py-3">
								<!--begin::Copyright-->
								<div class="text-gray-900 order-2 order-md-1">
									<span class="text-muted fw-semibold me-1">2024&copy;</span>
									<a href="https://keenthemes.com" target="_blank" class="text-gray-800 text-hover-primary">Keenthemes</a>
								</div>
								<!--end::Copyright-->
								<!--begin::Menu-->
								<ul class="menu menu-gray-600 menu-hover-primary fw-semibold order-1">
									<li class="menu-item">
										<a href="https://keenthemes.com" target="_blank" class="menu-link px-2">About</a>
									</li>
									<li class="menu-item">
										<a href="https://devs.keenthemes.com" target="_blank" class="menu-link px-2">Support</a>
									</li>
									<li class="menu-item">
										<a href="https://1.envato.market/EA4JP" target="_blank" class="menu-link px-2">Purchase</a>
									</li>
								</ul>
								<!--end::Menu-->
							</div>
							<!--end::Footer container-->
						</div>
						<!--end::Footer-->
					</div>
					<!--end:::Main-->
				</div>

@endsection