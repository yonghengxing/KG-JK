@extends('template') @section('content')
<div class="ant-layout-content" style="margin: 10px 24px 0px; height: 100%;">
							<div style="min-height: calc(100vh - 260px);">
								<div class="bfd_entity_datasource">
									<div class="content_topp___1-60B">
										<a class="ic___MZLJI" href="http://kg.itechs.ac.cn/home" style="color: rgb(51, 51, 51);">
											<i class="anticon anticon-home">
											</i>
											动态知识图谱 /
										</a>
										<span class="ic___MZLJI">
											<i class="anticon anticon-folder-open">
											</i>
											数据配置 /
										</span>
										<a class="ic___MZLJI" href="http://kg.itechs.ac.cn/datasource-conf/datasource"
										style="color: rgb(51, 51, 51);">
											<i class="anticon anticon-file-text">
											</i>
											数据源
										</a>
										<i class="anticon anticon-question-circle">
										</i>
									</div>
									<div class="con___33lu9">
										<div class="content_model___2RlWZ">
											<span>
												<span>
													<button type="button" class="ant-btn btn___1MzWf ant-btn-primary">
														<span>
															创建数据源
														</span>
													</button>
												</span>
											</span>
											<button type="button" class="ant-btn" style="margin: 0px 10px; display: none;">
												<span>
													导 出
												</span>
											</button>
											<span class="excel___Rrr_I">
												<div class="ant-upload ant-upload-select ant-upload-select-text">
													<span tabindex="0" class="ant-upload" role="button">
														<input type="file" accept="" multiple="" style="display: none;">
														<button type="button" class="ant-btn" style="margin: 0px 10px; display: none;">
															<span>
																导 入
															</span>
														</button>
													</span>
												</div>
												<div class="ant-upload-list ant-upload-list-text">
												</div>
											</span>
											<div class="content_search_obj">
												<button type="button" class="ant-btn clearAll ant-btn-primary">
													<i class="fa fa-eraser eraser fa-1g">
													</i>
													<span>
														清除条件
													</span>
												</button>
												<span class="ant-input-search object_search ant-input-search-enter-button ant-input-affix-wrapper">
													<input id="search" placeholder="请输入关键字" class="ant-input" type="text">
													<span class="ant-input-suffix">
														<button type="button" class="ant-btn ant-input-search-button ant-btn-primary">
															<span>
																搜 索
															</span>
														</button>
													</span>
												</span>
												<span class="searchTip">
													<i class="anticon anticon-question-circle">
													</i>
												</span>
											</div>
										</div>
										<div class="ant-table-wrapper datasource-tab">
											<div class="ant-spin-nested-loading">
												<div class="ant-spin-container">
													<div class="ant-table ant-table-default ant-table-scroll-position-left">
														<div class="ant-table-content">
															<div class="ant-table-body">
																<table class="">
																	<colgroup>
																		<col style="width: 15%; min-width: 15%;">
																			<col style="width: 15%; min-width: 15%;">
																				<col style="width: 10%; min-width: 10%;">
																					<col style="width: 10%; min-width: 10%;">
																						<col style="width: 8%; min-width: 8%;">
																							<col style="width: 10%; min-width: 10%;">
																								<col style="width: 8%; min-width: 8%;">
																									<col style="width: 10%; min-width: 10%;">
																										<col>
																	</colgroup>
																	<thead class="ant-table-thead">
																		<tr>
																			<th class="">
																				<span>
																					数据源
																				</span>
																			</th>
																			<th class="">
																				<span>
																					数据库
																				</span>
																			</th>
																			<th class="ant-table-column-has-filters">
																				<span>
																					类型
																					<i class="fa fa-filter filter fa-1g ant-table-filter-icon ant-dropdown-trigger"
																					title="筛选" style="color: rgb(0, 0, 0);">
																					</i>
																				</span>
																			</th>
																			<th class="ant-table-column-has-filters">
																				<span>
																					状态
																					<i class="fa fa-filter filter fa-1g ant-table-filter-icon ant-dropdown-trigger"
																					title="筛选" style="color: rgb(0, 0, 0);">
																					</i>
																				</span>
																			</th>
																			<th class="">
																				<span>
																					创建者
																				</span>
																			</th>
																			<th class="ant-table-column-has-filters">
																				<span>
																					创建时间
																					<div class="ant-table-column-sorter">
																						<span class="ant-table-column-sorter-up off" title="↑">
																							<i class="anticon anticon-caret-up">
																							</i>
																						</span>
																						<span class="ant-table-column-sorter-down off" title="↓">
																							<i class="anticon anticon-caret-down">
																							</i>
																						</span>
																					</div>
																				</span>
																			</th>
																			<th class="">
																				<span>
																					更新者
																				</span>
																			</th>
																			<th class="ant-table-column-has-filters">
																				<span>
																					更新时间
																					<div class="ant-table-column-sorter">
																						<span class="ant-table-column-sorter-up off" title="↑">
																							<i class="anticon anticon-caret-up">
																							</i>
																						</span>
																						<span class="ant-table-column-sorter-down off" title="↓">
																							<i class="anticon anticon-caret-down">
																							</i>
																						</span>
																					</div>
																				</span>
																			</th>
																			<th class="">
																				<span>
																					操作
																				</span>
																			</th>
																		</tr>
																	</thead>
																	<tbody class="ant-table-tbody">
																		<tr class="ant-table-row  ant-table-row-level-0">
																			<td class="">
																				<span class="ant-table-row-indent indent-level-0" style="padding-left: 0px;">
																				</span>
																				id_check_device
																			</td>
																			<td class="">
																				k007_dw_dev
																			</td>
																			<td class="ant-table-column-has-filters">
																				对象
																			</td>
																			<td class="ant-table-column-has-filters">
																				<div data-show="true" class="ant-tag ant-tag-has-color" style="background-color: rgb(135, 208, 104);">
																					已映射
																				</div>
																			</td>
																			<td class="">
																				system
																			</td>
																			<td class="ant-table-column-has-filters">
																				<span>
																					2018-12-01
																				</span>
																			</td>
																			<td class="">
																				<span>
																					system
																				</span>
																			</td>
																			<td class="ant-table-column-has-filters">
																				<span>
																					2018-12-21
																				</span>
																			</td>
																			<td class="">
																				<div>
																					<span>
																						<span>
																							<span class="line">
																								编辑
																							</span>
																							<span class="line">
																								|
																							</span>
																						</span>
																					</span>
																					<span class="line">
																						删除
																					</span>
																				</div>
																			</td>
																		</tr>
																		<tr class="ant-table-row  ant-table-row-level-0">
																			<td class="">
																				<span class="ant-table-row-indent indent-level-0" style="padding-left: 0px;">
																				</span>
																				passport
																			</td>
																			<td class="">
																				k007_dw_dev
																			</td>
																			<td class="ant-table-column-has-filters">
																				对象
																			</td>
																			<td class="ant-table-column-has-filters">
																				<div data-show="true" class="ant-tag ant-tag-has-color" style="background-color: rgb(135, 208, 104);">
																					已映射
																				</div>
																			</td>
																			<td class="">
																				system
																			</td>
																			<td class="ant-table-column-has-filters">
																				<span>
																					2018-12-03
																				</span>
																			</td>
																			<td class="">
																				<span>
																					system
																				</span>
																			</td>
																			<td class="ant-table-column-has-filters">
																				<span>
																					2018-12-20
																				</span>
																			</td>
																			<td class="">
																				<div>
																					<span>
																						<span>
																							<span class="line">
																								编辑
																							</span>
																							<span class="line">
																								|
																							</span>
																						</span>
																					</span>
																					<span class="line">
																						删除
																					</span>
																				</div>
																			</td>
																		</tr>
																		<tr class="ant-table-row  ant-table-row-level-0">
																			<td class="">
																				<span class="ant-table-row-indent indent-level-0" style="padding-left: 0px;">
																				</span>
																				identification
																			</td>
																			<td class="">
																				k007_dw_dev
																			</td>
																			<td class="ant-table-column-has-filters">
																				对象
																			</td>
																			<td class="ant-table-column-has-filters">
																				<div data-show="true" class="ant-tag ant-tag-has-color" style="background-color: rgb(135, 208, 104);">
																					已映射
																				</div>
																			</td>
																			<td class="">
																				system
																			</td>
																			<td class="ant-table-column-has-filters">
																				<span>
																					2018-12-03
																				</span>
																			</td>
																			<td class="">
																				<span>
																					system
																				</span>
																			</td>
																			<td class="ant-table-column-has-filters">
																				<span>
																					2018-12-20
																				</span>
																			</td>
																			<td class="">
																				<div>
																					<span>
																						<span>
																							<span class="line">
																								编辑
																							</span>
																							<span class="line">
																								|
																							</span>
																						</span>
																					</span>
																					<span class="line">
																						删除
																					</span>
																				</div>
																			</td>
																		</tr>
																		<tr class="ant-table-row  ant-table-row-level-0">
																			<td class="">
																				<span class="ant-table-row-indent indent-level-0" style="padding-left: 0px;">
																				</span>
																				id_check_device
																			</td>
																			<td class="">
																				k007_dw_dev
																			</td>
																			<td class="ant-table-column-has-filters">
																				关系
																			</td>
																			<td class="ant-table-column-has-filters">
																				<div data-show="true" class="ant-tag ant-tag-has-color" style="background-color: rgb(135, 208, 104);">
																					已映射
																				</div>
																			</td>
																			<td class="">
																				system
																			</td>
																			<td class="ant-table-column-has-filters">
																				<span>
																					2018-12-03
																				</span>
																			</td>
																			<td class="">
																				<span>
																					system
																				</span>
																			</td>
																			<td class="ant-table-column-has-filters">
																				<span>
																					2018-12-20
																				</span>
																			</td>
																			<td class="">
																				<div>
																					<span>
																						<span>
																							<span class="line">
																								编辑
																							</span>
																							<span class="line">
																								|
																							</span>
																						</span>
																					</span>
																					<span class="line">
																						删除
																					</span>
																				</div>
																			</td>
																		</tr>
																		<tr class="ant-table-row  ant-table-row-level-0">
																			<td class="">
																				<span class="ant-table-row-indent indent-level-0" style="padding-left: 0px;">
																				</span>
																				identification_id_check
																			</td>
																			<td class="">
																				k007_dw_dev
																			</td>
																			<td class="ant-table-column-has-filters">
																				关系
																			</td>
																			<td class="ant-table-column-has-filters">
																				<div data-show="true" class="ant-tag ant-tag-has-color" style="background-color: rgb(135, 208, 104);">
																					已映射
																				</div>
																			</td>
																			<td class="">
																				system
																			</td>
																			<td class="ant-table-column-has-filters">
																				<span>
																					2018-12-03
																				</span>
																			</td>
																			<td class="">
																				<span>
																					system
																				</span>
																			</td>
																			<td class="ant-table-column-has-filters">
																				<span>
																					2018-12-20
																				</span>
																			</td>
																			<td class="">
																				<div>
																					<span>
																						<span>
																							<span class="line">
																								编辑
																							</span>
																							<span class="line">
																								|
																							</span>
																						</span>
																					</span>
																					<span class="line">
																						删除
																					</span>
																				</div>
																			</td>
																		</tr>
																		<tr class="ant-table-row  ant-table-row-level-0">
																			<td class="">
																				<span class="ant-table-row-indent indent-level-0" style="padding-left: 0px;">
																				</span>
																				transfer2
																			</td>
																			<td class="">
																				demoDataSource
																			</td>
																			<td class="ant-table-column-has-filters">
																				对象
																			</td>
																			<td class="ant-table-column-has-filters">
																				<div data-show="true" class="ant-tag ant-tag-has-color" style="background-color: rgb(135, 208, 104);">
																					已映射
																				</div>
																			</td>
																			<td class="">
																				system
																			</td>
																			<td class="ant-table-column-has-filters">
																				<span>
																					2018-12-19
																				</span>
																			</td>
																			<td class="">
																				<span>
																					system
																				</span>
																			</td>
																			<td class="ant-table-column-has-filters">
																				<span>
																					2018-12-19
																				</span>
																			</td>
																			<td class="">
																				<div>
																					<span>
																						<span>
																							<span class="line">
																								编辑
																							</span>
																							<span class="line">
																								|
																							</span>
																						</span>
																					</span>
																					<span class="line">
																						删除
																					</span>
																				</div>
																			</td>
																		</tr>
																		<tr class="ant-table-row  ant-table-row-level-0">
																			<td class="">
																				<span class="ant-table-row-indent indent-level-0" style="padding-left: 0px;">
																				</span>
																				transfer1
																			</td>
																			<td class="">
																				demoDataSource
																			</td>
																			<td class="ant-table-column-has-filters">
																				对象
																			</td>
																			<td class="ant-table-column-has-filters">
																				<div data-show="true" class="ant-tag ant-tag-has-color" style="background-color: rgb(135, 208, 104);">
																					已映射
																				</div>
																			</td>
																			<td class="">
																				system
																			</td>
																			<td class="ant-table-column-has-filters">
																				<span>
																					2018-12-19
																				</span>
																			</td>
																			<td class="">
																				<span>
																					system
																				</span>
																			</td>
																			<td class="ant-table-column-has-filters">
																				<span>
																					2018-12-19
																				</span>
																			</td>
																			<td class="">
																				<div>
																					<span>
																						<span>
																							<span class="line">
																								编辑
																							</span>
																							<span class="line">
																								|
																							</span>
																						</span>
																					</span>
																					<span class="line">
																						删除
																					</span>
																				</div>
																			</td>
																		</tr>
																		<tr class="ant-table-row  ant-table-row-level-0">
																			<td class="">
																				<span class="ant-table-row-indent indent-level-0" style="padding-left: 0px;">
																				</span>
																				citizen
																			</td>
																			<td class="">
																				k007_dw_dev
																			</td>
																			<td class="ant-table-column-has-filters">
																				对象
																			</td>
																			<td class="ant-table-column-has-filters">
																				<div data-show="true" class="ant-tag ant-tag-has-color" style="background-color: rgb(135, 208, 104);">
																					已映射
																				</div>
																			</td>
																			<td class="">
																				system
																			</td>
																			<td class="ant-table-column-has-filters">
																				<span>
																					2018-12-02
																				</span>
																			</td>
																			<td class="">
																				<span>
																					system
																				</span>
																			</td>
																			<td class="ant-table-column-has-filters">
																				<span>
																					2018-12-18
																				</span>
																			</td>
																			<td class="">
																				<div>
																					<span>
																						<span>
																							<span class="line">
																								编辑
																							</span>
																							<span class="line">
																								|
																							</span>
																						</span>
																					</span>
																					<span class="line">
																						删除
																					</span>
																				</div>
																			</td>
																		</tr>
																		<tr class="ant-table-row  ant-table-row-level-0">
																			<td class="">
																				<span class="ant-table-row-indent indent-level-0" style="padding-left: 0px;">
																				</span>
																				civil_car_case_car
																			</td>
																			<td class="">
																				k007_dw_dev
																			</td>
																			<td class="ant-table-column-has-filters">
																				关系
																			</td>
																			<td class="ant-table-column-has-filters">
																				<div data-show="true" class="ant-tag ant-tag-has-color" style="background-color: rgb(135, 208, 104);">
																					已映射
																				</div>
																			</td>
																			<td class="">
																				system
																			</td>
																			<td class="ant-table-column-has-filters">
																				<span>
																					2018-12-17
																				</span>
																			</td>
																			<td class="">
																				<span>
																					system
																				</span>
																			</td>
																			<td class="ant-table-column-has-filters">
																				<span>
																					2018-12-17
																				</span>
																			</td>
																			<td class="">
																				<div>
																					<span>
																						<span>
																							<span class="line">
																								编辑
																							</span>
																							<span class="line">
																								|
																							</span>
																						</span>
																					</span>
																					<span class="line">
																						删除
																					</span>
																				</div>
																			</td>
																		</tr>
																		<tr class="ant-table-row  ant-table-row-level-0">
																			<td class="">
																				<span class="ant-table-row-indent indent-level-0" style="padding-left: 0px;">
																				</span>
																				case
																			</td>
																			<td class="">
																				k007_dw_dev
																			</td>
																			<td class="ant-table-column-has-filters">
																				对象
																			</td>
																			<td class="ant-table-column-has-filters">
																				<div data-show="true" class="ant-tag ant-tag-has-color" style="background-color: rgb(135, 208, 104);">
																					已映射
																				</div>
																			</td>
																			<td class="">
																				system
																			</td>
																			<td class="ant-table-column-has-filters">
																				<span>
																					2018-12-03
																				</span>
																			</td>
																			<td class="">
																				<span>
																					system
																				</span>
																			</td>
																			<td class="ant-table-column-has-filters">
																				<span>
																					2018-12-14
																				</span>
																			</td>
																			<td class="">
																				<div>
																					<span>
																						<span>
																							<span class="line">
																								编辑
																							</span>
																							<span class="line">
																								|
																							</span>
																						</span>
																					</span>
																					<span class="line">
																						删除
																					</span>
																				</div>
																			</td>
																		</tr>
																		<tr class="ant-table-row  ant-table-row-level-0">
																			<td class="">
																				<span class="ant-table-row-indent indent-level-0" style="padding-left: 0px;">
																				</span>
																				suspicion
																			</td>
																			<td class="">
																				k007_dw_dev
																			</td>
																			<td class="ant-table-column-has-filters">
																				对象
																			</td>
																			<td class="ant-table-column-has-filters">
																				<div data-show="true" class="ant-tag ant-tag-has-color" style="background-color: rgb(135, 208, 104);">
																					已映射
																				</div>
																			</td>
																			<td class="">
																				system
																			</td>
																			<td class="ant-table-column-has-filters">
																				<span>
																					2018-12-01
																				</span>
																			</td>
																			<td class="">
																				<span>
																					system
																				</span>
																			</td>
																			<td class="ant-table-column-has-filters">
																				<span>
																					2018-12-14
																				</span>
																			</td>
																			<td class="">
																				<div>
																					<span>
																						<span>
																							<span class="line">
																								编辑
																							</span>
																							<span class="line">
																								|
																							</span>
																						</span>
																					</span>
																					<span class="line">
																						删除
																					</span>
																				</div>
																			</td>
																		</tr>
																		<tr class="ant-table-row  ant-table-row-level-0">
																			<td class="">
																				<span class="ant-table-row-indent indent-level-0" style="padding-left: 0px;">
																				</span>
																				injured_by_crime
																			</td>
																			<td class="">
																				k007_dw_dev
																			</td>
																			<td class="ant-table-column-has-filters">
																				对象
																			</td>
																			<td class="ant-table-column-has-filters">
																				<div data-show="true" class="ant-tag ant-tag-has-color" style="background-color: rgb(135, 208, 104);">
																					已映射
																				</div>
																			</td>
																			<td class="">
																				system
																			</td>
																			<td class="ant-table-column-has-filters">
																				<span>
																					2018-12-03
																				</span>
																			</td>
																			<td class="">
																				<span>
																					system
																				</span>
																			</td>
																			<td class="ant-table-column-has-filters">
																				<span>
																					2018-12-13
																				</span>
																			</td>
																			<td class="">
																				<div>
																					<span>
																						<span>
																							<span class="line">
																								编辑
																							</span>
																							<span class="line">
																								|
																							</span>
																						</span>
																					</span>
																					<span class="line">
																						删除
																					</span>
																				</div>
																			</td>
																		</tr>
																		<tr class="ant-table-row  ant-table-row-level-0">
																			<td class="">
																				<span class="ant-table-row-indent indent-level-0" style="padding-left: 0px;">
																				</span>
																				case_car
																			</td>
																			<td class="">
																				k007_dw_dev
																			</td>
																			<td class="ant-table-column-has-filters">
																				对象
																			</td>
																			<td class="ant-table-column-has-filters">
																				<div data-show="true" class="ant-tag ant-tag-has-color" style="background-color: rgb(135, 208, 104);">
																					已映射
																				</div>
																			</td>
																			<td class="">
																				system
																			</td>
																			<td class="ant-table-column-has-filters">
																				<span>
																					2018-12-03
																				</span>
																			</td>
																			<td class="">
																				<span>
																					system
																				</span>
																			</td>
																			<td class="ant-table-column-has-filters">
																				<span>
																					2018-12-13
																				</span>
																			</td>
																			<td class="">
																				<div>
																					<span>
																						<span>
																							<span class="line">
																								编辑
																							</span>
																							<span class="line">
																								|
																							</span>
																						</span>
																					</span>
																					<span class="line">
																						删除
																					</span>
																				</div>
																			</td>
																		</tr>
																		<tr class="ant-table-row  ant-table-row-level-0">
																			<td class="">
																				<span class="ant-table-row-indent indent-level-0" style="padding-left: 0px;">
																				</span>
																				civil_car
																			</td>
																			<td class="">
																				k007_dw_dev
																			</td>
																			<td class="ant-table-column-has-filters">
																				对象
																			</td>
																			<td class="ant-table-column-has-filters">
																				<div data-show="true" class="ant-tag ant-tag-has-color" style="background-color: rgb(135, 208, 104);">
																					已映射
																				</div>
																			</td>
																			<td class="">
																				system
																			</td>
																			<td class="ant-table-column-has-filters">
																				<span>
																					2018-12-03
																				</span>
																			</td>
																			<td class="">
																				<span>
																					system
																				</span>
																			</td>
																			<td class="ant-table-column-has-filters">
																				<span>
																					2018-12-13
																				</span>
																			</td>
																			<td class="">
																				<div>
																					<span>
																						<span>
																							<span class="line">
																								编辑
																							</span>
																							<span class="line">
																								|
																							</span>
																						</span>
																					</span>
																					<span class="line">
																						删除
																					</span>
																				</div>
																			</td>
																		</tr>
																		<tr class="ant-table-row  ant-table-row-level-0">
																			<td class="">
																				<span class="ant-table-row-indent indent-level-0" style="padding-left: 0px;">
																				</span>
																				traffic_monitor_device
																			</td>
																			<td class="">
																				k007_dw_dev
																			</td>
																			<td class="ant-table-column-has-filters">
																				对象
																			</td>
																			<td class="ant-table-column-has-filters">
																				<div data-show="true" class="ant-tag ant-tag-has-color" style="background-color: rgb(135, 208, 104);">
																					已映射
																				</div>
																			</td>
																			<td class="">
																				system
																			</td>
																			<td class="ant-table-column-has-filters">
																				<span>
																					2018-12-03
																				</span>
																			</td>
																			<td class="">
																				<span>
																					system
																				</span>
																			</td>
																			<td class="ant-table-column-has-filters">
																				<span>
																					2018-12-13
																				</span>
																			</td>
																			<td class="">
																				<div>
																					<span>
																						<span>
																							<span class="line">
																								编辑
																							</span>
																							<span class="line">
																								|
																							</span>
																						</span>
																					</span>
																					<span class="line">
																						删除
																					</span>
																				</div>
																			</td>
																		</tr>
																		<tr class="ant-table-row  ant-table-row-level-0">
																			<td class="">
																				<span class="ant-table-row-indent indent-level-0" style="padding-left: 0px;">
																				</span>
																				citizen_weapon
																			</td>
																			<td class="">
																				k007_dw_dev
																			</td>
																			<td class="ant-table-column-has-filters">
																				关系
																			</td>
																			<td class="ant-table-column-has-filters">
																				<div data-show="true" class="ant-tag ant-tag-has-color" style="background-color: rgb(135, 208, 104);">
																					已映射
																				</div>
																			</td>
																			<td class="">
																				system
																			</td>
																			<td class="ant-table-column-has-filters">
																				<span>
																					2018-12-07
																				</span>
																			</td>
																			<td class="">
																				<span>
																					system
																				</span>
																			</td>
																			<td class="ant-table-column-has-filters">
																				<span>
																					2018-12-11
																				</span>
																			</td>
																			<td class="">
																				<div>
																					<span>
																						<span>
																							<span class="line">
																								编辑
																							</span>
																							<span class="line">
																								|
																							</span>
																						</span>
																					</span>
																					<span class="line">
																						删除
																					</span>
																				</div>
																			</td>
																		</tr>
																		<tr class="ant-table-row  ant-table-row-level-0">
																			<td class="">
																				<span class="ant-table-row-indent indent-level-0" style="padding-left: 0px;">
																				</span>
																				suspicion_steal_car
																			</td>
																			<td class="">
																				k007_dw_dev
																			</td>
																			<td class="ant-table-column-has-filters">
																				关系
																			</td>
																			<td class="ant-table-column-has-filters">
																				<div data-show="true" class="ant-tag ant-tag-has-color" style="background-color: rgb(18, 204, 110);">
																					已验证
																				</div>
																			</td>
																			<td class="">
																				system
																			</td>
																			<td class="ant-table-column-has-filters">
																				<span>
																					2018-12-02
																				</span>
																			</td>
																			<td class="">
																				<span>
																					system
																				</span>
																			</td>
																			<td class="ant-table-column-has-filters">
																				<span>
																					2018-12-11
																				</span>
																			</td>
																			<td class="">
																				<div>
																					<span>
																						<span>
																							<span class="line">
																								编辑
																							</span>
																							<span class="line">
																								|
																							</span>
																						</span>
																					</span>
																					<span class="line">
																						删除
																					</span>
																				</div>
																			</td>
																		</tr>
																		<tr class="ant-table-row  ant-table-row-level-0">
																			<td class="">
																				<span class="ant-table-row-indent indent-level-0" style="padding-left: 0px;">
																				</span>
																				civil_car_traffic_monitor
																			</td>
																			<td class="">
																				k007_dw_dev
																			</td>
																			<td class="ant-table-column-has-filters">
																				关系
																			</td>
																			<td class="ant-table-column-has-filters">
																				<div data-show="true" class="ant-tag ant-tag-has-color" style="background-color: rgb(135, 208, 104);">
																					已映射
																				</div>
																			</td>
																			<td class="">
																				system
																			</td>
																			<td class="ant-table-column-has-filters">
																				<span>
																					2018-12-03
																				</span>
																			</td>
																			<td class="">
																				<span>
																					system
																				</span>
																			</td>
																			<td class="ant-table-column-has-filters">
																				<span>
																					2018-12-11
																				</span>
																			</td>
																			<td class="">
																				<div>
																					<span>
																						<span>
																							<span class="line">
																								编辑
																							</span>
																							<span class="line">
																								|
																							</span>
																						</span>
																					</span>
																					<span class="line">
																						删除
																					</span>
																				</div>
																			</td>
																		</tr>
																		<tr class="ant-table-row  ant-table-row-level-0">
																			<td class="">
																				<span class="ant-table-row-indent indent-level-0" style="padding-left: 0px;">
																				</span>
																				case_car_traffic_monitor
																			</td>
																			<td class="">
																				k007_dw_dev
																			</td>
																			<td class="ant-table-column-has-filters">
																				关系
																			</td>
																			<td class="ant-table-column-has-filters">
																				<div data-show="true" class="ant-tag ant-tag-has-color" style="background-color: rgb(135, 208, 104);">
																					已映射
																				</div>
																			</td>
																			<td class="">
																				system
																			</td>
																			<td class="ant-table-column-has-filters">
																				<span>
																					2018-12-03
																				</span>
																			</td>
																			<td class="">
																				<span>
																					system
																				</span>
																			</td>
																			<td class="ant-table-column-has-filters">
																				<span>
																					2018-12-11
																				</span>
																			</td>
																			<td class="">
																				<div>
																					<span>
																						<span>
																							<span class="line">
																								编辑
																							</span>
																							<span class="line">
																								|
																							</span>
																						</span>
																					</span>
																					<span class="line">
																						删除
																					</span>
																				</div>
																			</td>
																		</tr>
																		<tr class="ant-table-row  ant-table-row-level-0">
																			<td class="">
																				<span class="ant-table-row-indent indent-level-0" style="padding-left: 0px;">
																				</span>
																				citizen_own_car
																			</td>
																			<td class="">
																				k007_dw_dev
																			</td>
																			<td class="ant-table-column-has-filters">
																				关系
																			</td>
																			<td class="ant-table-column-has-filters">
																				<div data-show="true" class="ant-tag ant-tag-has-color" style="background-color: rgb(135, 208, 104);">
																					已映射
																				</div>
																			</td>
																			<td class="">
																				system
																			</td>
																			<td class="ant-table-column-has-filters">
																				<span>
																					2018-12-03
																				</span>
																			</td>
																			<td class="">
																				<span>
																					system
																				</span>
																			</td>
																			<td class="ant-table-column-has-filters">
																				<span>
																					2018-12-11
																				</span>
																			</td>
																			<td class="">
																				<div>
																					<span>
																						<span>
																							<span class="line">
																								编辑
																							</span>
																							<span class="line">
																								|
																							</span>
																						</span>
																					</span>
																					<span class="line">
																						删除
																					</span>
																				</div>
																			</td>
																		</tr>
																		<tr class="ant-table-row  ant-table-row-level-0">
																			<td class="">
																				<span class="ant-table-row-indent indent-level-0" style="padding-left: 0px;">
																				</span>
																				case_case_car
																			</td>
																			<td class="">
																				k007_dw_dev
																			</td>
																			<td class="ant-table-column-has-filters">
																				关系
																			</td>
																			<td class="ant-table-column-has-filters">
																				<div data-show="true" class="ant-tag ant-tag-has-color" style="background-color: rgb(135, 208, 104);">
																					已映射
																				</div>
																			</td>
																			<td class="">
																				system
																			</td>
																			<td class="ant-table-column-has-filters">
																				<span>
																					2018-12-03
																				</span>
																			</td>
																			<td class="">
																				<span>
																					system
																				</span>
																			</td>
																			<td class="ant-table-column-has-filters">
																				<span>
																					2018-12-11
																				</span>
																			</td>
																			<td class="">
																				<div>
																					<span>
																						<span>
																							<span class="line">
																								编辑
																							</span>
																							<span class="line">
																								|
																							</span>
																						</span>
																					</span>
																					<span class="line">
																						删除
																					</span>
																				</div>
																			</td>
																		</tr>
																		<tr class="ant-table-row  ant-table-row-level-0">
																			<td class="">
																				<span class="ant-table-row-indent indent-level-0" style="padding-left: 0px;">
																				</span>
																				case_weapon
																			</td>
																			<td class="">
																				k007_dw_dev
																			</td>
																			<td class="ant-table-column-has-filters">
																				关系
																			</td>
																			<td class="ant-table-column-has-filters">
																				<div data-show="true" class="ant-tag ant-tag-has-color" style="background-color: rgb(135, 208, 104);">
																					已映射
																				</div>
																			</td>
																			<td class="">
																				system
																			</td>
																			<td class="ant-table-column-has-filters">
																				<span>
																					2018-12-08
																				</span>
																			</td>
																			<td class="">
																				<span>
																					system
																				</span>
																			</td>
																			<td class="ant-table-column-has-filters">
																				<span>
																					2018-12-11
																				</span>
																			</td>
																			<td class="">
																				<div>
																					<span>
																						<span>
																							<span class="line">
																								编辑
																							</span>
																							<span class="line">
																								|
																							</span>
																						</span>
																					</span>
																					<span class="line">
																						删除
																					</span>
																				</div>
																			</td>
																		</tr>
																		<tr class="ant-table-row  ant-table-row-level-0">
																			<td class="">
																				<span class="ant-table-row-indent indent-level-0" style="padding-left: 0px;">
																				</span>
																				weapon
																			</td>
																			<td class="">
																				k007_dw_dev
																			</td>
																			<td class="ant-table-column-has-filters">
																				对象
																			</td>
																			<td class="ant-table-column-has-filters">
																				<div data-show="true" class="ant-tag ant-tag-has-color" style="background-color: rgb(135, 208, 104);">
																					已映射
																				</div>
																			</td>
																			<td class="">
																				system
																			</td>
																			<td class="ant-table-column-has-filters">
																				<span>
																					2018-12-03
																				</span>
																			</td>
																			<td class="">
																				<span>
																					system
																				</span>
																			</td>
																			<td class="ant-table-column-has-filters">
																				<span>
																					2018-12-08
																				</span>
																			</td>
																			<td class="">
																				<div>
																					<span>
																						<span>
																							<span class="line">
																								编辑
																							</span>
																							<span class="line">
																								|
																							</span>
																						</span>
																					</span>
																					<span class="line">
																						删除
																					</span>
																				</div>
																			</td>
																		</tr>
																		<tr class="ant-table-row  ant-table-row-level-0">
																			<td class="">
																				<span class="ant-table-row-indent indent-level-0" style="padding-left: 0px;">
																				</span>
																				citizen_passport
																			</td>
																			<td class="">
																				k007_dw_dev
																			</td>
																			<td class="ant-table-column-has-filters">
																				关系
																			</td>
																			<td class="ant-table-column-has-filters">
																				<div data-show="true" class="ant-tag ant-tag-has-color" style="background-color: rgb(135, 208, 104);">
																					已映射
																				</div>
																			</td>
																			<td class="">
																				system
																			</td>
																			<td class="ant-table-column-has-filters">
																				<span>
																					2018-12-03
																				</span>
																			</td>
																			<td class="">
																				<span>
																					system
																				</span>
																			</td>
																			<td class="ant-table-column-has-filters">
																				<span>
																					2018-12-07
																				</span>
																			</td>
																			<td class="">
																				<div>
																					<span>
																						<span>
																							<span class="line">
																								编辑
																							</span>
																							<span class="line">
																								|
																							</span>
																						</span>
																					</span>
																					<span class="line">
																						删除
																					</span>
																				</div>
																			</td>
																		</tr>
																		<tr class="ant-table-row  ant-table-row-level-0">
																			<td class="">
																				<span class="ant-table-row-indent indent-level-0" style="padding-left: 0px;">
																				</span>
																				suspicion_commit_crime
																			</td>
																			<td class="">
																				k007_dw_dev
																			</td>
																			<td class="ant-table-column-has-filters">
																				关系
																			</td>
																			<td class="ant-table-column-has-filters">
																				<div data-show="true" class="ant-tag ant-tag-has-color" style="background-color: rgb(135, 208, 104);">
																					已映射
																				</div>
																			</td>
																			<td class="">
																				system
																			</td>
																			<td class="ant-table-column-has-filters">
																				<span>
																					2018-12-01
																				</span>
																			</td>
																			<td class="">
																				<span>
																					system
																				</span>
																			</td>
																			<td class="ant-table-column-has-filters">
																				<span>
																					2018-12-07
																				</span>
																			</td>
																			<td class="">
																				<div>
																					<span>
																						<span>
																							<span class="line">
																								编辑
																							</span>
																							<span class="line">
																								|
																							</span>
																						</span>
																					</span>
																					<span class="line">
																						删除
																					</span>
																				</div>
																			</td>
																		</tr>
																		<tr class="ant-table-row  ant-table-row-level-0">
																			<td class="">
																				<span class="ant-table-row-indent indent-level-0" style="padding-left: 0px;">
																				</span>
																				commit_crime
																			</td>
																			<td class="">
																				k007_dw_dev
																			</td>
																			<td class="ant-table-column-has-filters">
																				对象
																			</td>
																			<td class="ant-table-column-has-filters">
																				<div data-show="true" class="ant-tag ant-tag-has-color" style="background-color: rgb(135, 208, 104);">
																					已映射
																				</div>
																			</td>
																			<td class="">
																				system
																			</td>
																			<td class="ant-table-column-has-filters">
																				<span>
																					2018-12-03
																				</span>
																			</td>
																			<td class="">
																				<span>
																					system
																				</span>
																			</td>
																			<td class="ant-table-column-has-filters">
																				<span>
																					2018-12-06
																				</span>
																			</td>
																			<td class="">
																				<div>
																					<span>
																						<span>
																							<span class="line">
																								编辑
																							</span>
																							<span class="line">
																								|
																							</span>
																						</span>
																					</span>
																					<span class="line">
																						删除
																					</span>
																				</div>
																			</td>
																		</tr>
																		<tr class="ant-table-row  ant-table-row-level-0">
																			<td class="">
																				<span class="ant-table-row-indent indent-level-0" style="padding-left: 0px;">
																				</span>
																				test621_02
																			</td>
																			<td class="">
																				test620
																			</td>
																			<td class="ant-table-column-has-filters">
																				对象
																			</td>
																			<td class="ant-table-column-has-filters">
																				<div data-show="true" class="ant-tag ant-tag-has-color" style="background-color: rgb(135, 208, 104);">
																					已映射
																				</div>
																			</td>
																			<td class="">
																				system
																			</td>
																			<td class="ant-table-column-has-filters">
																				<span>
																					2018-06-21
																				</span>
																			</td>
																			<td class="">
																				<span>
																					system
																				</span>
																			</td>
																			<td class="ant-table-column-has-filters">
																				<span>
																					2018-12-06
																				</span>
																			</td>
																			<td class="">
																				<div>
																					<span>
																						<span>
																							<span class="line">
																								编辑
																							</span>
																							<span class="line">
																								|
																							</span>
																						</span>
																					</span>
																					<span class="line">
																						删除
																					</span>
																				</div>
																			</td>
																		</tr>
																		<tr class="ant-table-row  ant-table-row-level-0">
																			<td class="">
																				<span class="ant-table-row-indent indent-level-0" style="padding-left: 0px;">
																				</span>
																				id_check
																			</td>
																			<td class="">
																				k007_dw_dev
																			</td>
																			<td class="ant-table-column-has-filters">
																				对象
																			</td>
																			<td class="ant-table-column-has-filters">
																				<div data-show="true" class="ant-tag ant-tag-has-color" style="background-color: rgb(135, 208, 104);">
																					已映射
																				</div>
																			</td>
																			<td class="">
																				system
																			</td>
																			<td class="ant-table-column-has-filters">
																				<span>
																					2018-12-01
																				</span>
																			</td>
																			<td class="">
																				<span>
																					system
																				</span>
																			</td>
																			<td class="ant-table-column-has-filters">
																				<span>
																					2018-12-06
																				</span>
																			</td>
																			<td class="">
																				<div>
																					<span>
																						<span>
																							<span class="line">
																								编辑
																							</span>
																							<span class="line">
																								|
																							</span>
																						</span>
																					</span>
																					<span class="line">
																						删除
																					</span>
																				</div>
																			</td>
																		</tr>
																		<tr class="ant-table-row  ant-table-row-level-0">
																			<td class="">
																				<span class="ant-table-row-indent indent-level-0" style="padding-left: 0px;">
																				</span>
																				citizen_immigration_inspection
																			</td>
																			<td class="">
																				k007_dw_dev
																			</td>
																			<td class="ant-table-column-has-filters">
																				关系
																			</td>
																			<td class="ant-table-column-has-filters">
																				<div data-show="true" class="ant-tag ant-tag-has-color" style="background-color: rgb(135, 208, 104);">
																					已映射
																				</div>
																			</td>
																			<td class="">
																				system
																			</td>
																			<td class="ant-table-column-has-filters">
																				<span>
																					2018-12-06
																				</span>
																			</td>
																			<td class="">
																				<span>
																					system
																				</span>
																			</td>
																			<td class="ant-table-column-has-filters">
																				<span>
																					2018-12-06
																				</span>
																			</td>
																			<td class="">
																				<div>
																					<span>
																						<span>
																							<span class="line">
																								编辑
																							</span>
																							<span class="line">
																								|
																							</span>
																						</span>
																					</span>
																					<span class="line">
																						删除
																					</span>
																				</div>
																			</td>
																		</tr>
																		<tr class="ant-table-row  ant-table-row-level-0">
																			<td class="">
																				<span class="ant-table-row-indent indent-level-0" style="padding-left: 0px;">
																				</span>
																				immigration_inspection
																			</td>
																			<td class="">
																				k007_dw_dev
																			</td>
																			<td class="ant-table-column-has-filters">
																				对象
																			</td>
																			<td class="ant-table-column-has-filters">
																				<div data-show="true" class="ant-tag ant-tag-has-color" style="background-color: rgb(135, 208, 104);">
																					已映射
																				</div>
																			</td>
																			<td class="">
																				system
																			</td>
																			<td class="ant-table-column-has-filters">
																				<span>
																					2018-12-05
																				</span>
																			</td>
																			<td class="">
																				<span>
																					system
																				</span>
																			</td>
																			<td class="ant-table-column-has-filters">
																				<span>
																					2018-12-06
																				</span>
																			</td>
																			<td class="">
																				<div>
																					<span>
																						<span>
																							<span class="line">
																								编辑
																							</span>
																							<span class="line">
																								|
																							</span>
																						</span>
																					</span>
																					<span class="line">
																						删除
																					</span>
																				</div>
																			</td>
																		</tr>
																		<tr class="ant-table-row  ant-table-row-level-0">
																			<td class="">
																				<span class="ant-table-row-indent indent-level-0" style="padding-left: 0px;">
																				</span>
																				commit_crime_case
																			</td>
																			<td class="">
																				k007_dw_dev
																			</td>
																			<td class="ant-table-column-has-filters">
																				关系
																			</td>
																			<td class="ant-table-column-has-filters">
																				<div data-show="true" class="ant-tag ant-tag-has-color" style="background-color: rgb(135, 208, 104);">
																					已映射
																				</div>
																			</td>
																			<td class="">
																				system
																			</td>
																			<td class="ant-table-column-has-filters">
																				<span>
																					2018-12-01
																				</span>
																			</td>
																			<td class="">
																				<span>
																					system
																				</span>
																			</td>
																			<td class="ant-table-column-has-filters">
																				<span>
																					2018-12-06
																				</span>
																			</td>
																			<td class="">
																				<div>
																					<span>
																						<span>
																							<span class="line">
																								编辑
																							</span>
																							<span class="line">
																								|
																							</span>
																						</span>
																					</span>
																					<span class="line">
																						删除
																					</span>
																				</div>
																			</td>
																		</tr>
																		<tr class="ant-table-row  ant-table-row-level-0">
																			<td class="">
																				<span class="ant-table-row-indent indent-level-0" style="padding-left: 0px;">
																				</span>
																				traffic_monitor
																			</td>
																			<td class="">
																				k007_dw_dev
																			</td>
																			<td class="ant-table-column-has-filters">
																				对象
																			</td>
																			<td class="ant-table-column-has-filters">
																				<div data-show="true" class="ant-tag ant-tag-has-color" style="background-color: rgb(135, 208, 104);">
																					已映射
																				</div>
																			</td>
																			<td class="">
																				system
																			</td>
																			<td class="ant-table-column-has-filters">
																				<span>
																					2018-12-05
																				</span>
																			</td>
																			<td class="">
																				<span>
																					system
																				</span>
																			</td>
																			<td class="ant-table-column-has-filters">
																				<span>
																					2018-12-05
																				</span>
																			</td>
																			<td class="">
																				<div>
																					<span>
																						<span>
																							<span class="line">
																								编辑
																							</span>
																							<span class="line">
																								|
																							</span>
																						</span>
																					</span>
																					<span class="line">
																						删除
																					</span>
																				</div>
																			</td>
																		</tr>
																		<tr class="ant-table-row  ant-table-row-level-0">
																			<td class="">
																				<span class="ant-table-row-indent indent-level-0" style="padding-left: 0px;">
																				</span>
																				doc_ori_doc
																			</td>
																			<td class="">
																				k007_dw_dev
																			</td>
																			<td class="ant-table-column-has-filters">
																				对象
																			</td>
																			<td class="ant-table-column-has-filters">
																				<div data-show="true" class="ant-tag ant-tag-has-color" style="background-color: rgb(135, 208, 104);">
																					已映射
																				</div>
																			</td>
																			<td class="">
																				system
																			</td>
																			<td class="ant-table-column-has-filters">
																				<span>
																					2018-12-05
																				</span>
																			</td>
																			<td class="">
																				<span>
																					system
																				</span>
																			</td>
																			<td class="ant-table-column-has-filters">
																				<span>
																					2018-12-05
																				</span>
																			</td>
																			<td class="">
																				<div>
																					<span>
																						<span>
																							<span class="line">
																								编辑
																							</span>
																							<span class="line">
																								|
																							</span>
																						</span>
																					</span>
																					<span class="line">
																						删除
																					</span>
																				</div>
																			</td>
																		</tr>
																		<tr class="ant-table-row  ant-table-row-level-0">
																			<td class="">
																				<span class="ant-table-row-indent indent-level-0" style="padding-left: 0px;">
																				</span>
																				crime_info
																			</td>
																			<td class="">
																				k007_dw_dev
																			</td>
																			<td class="ant-table-column-has-filters">
																				对象
																			</td>
																			<td class="ant-table-column-has-filters">
																				<div data-show="true" class="ant-tag ant-tag-has-color" style="background-color: rgb(135, 208, 104);">
																					已映射
																				</div>
																			</td>
																			<td class="">
																				system
																			</td>
																			<td class="ant-table-column-has-filters">
																				<span>
																					2018-12-03
																				</span>
																			</td>
																			<td class="">
																				<span>
																					system
																				</span>
																			</td>
																			<td class="ant-table-column-has-filters">
																				<span>
																					2018-12-05
																				</span>
																			</td>
																			<td class="">
																				<div>
																					<span>
																						<span>
																							<span class="line">
																								编辑
																							</span>
																							<span class="line">
																								|
																							</span>
																						</span>
																					</span>
																					<span class="line">
																						删除
																					</span>
																				</div>
																			</td>
																		</tr>
																		<tr class="ant-table-row  ant-table-row-level-0">
																			<td class="">
																				<span class="ant-table-row-indent indent-level-0" style="padding-left: 0px;">
																				</span>
																				fingerprint
																			</td>
																			<td class="">
																				k007_dw_dev
																			</td>
																			<td class="ant-table-column-has-filters">
																				对象
																			</td>
																			<td class="ant-table-column-has-filters">
																				<div data-show="true" class="ant-tag ant-tag-has-color" style="background-color: rgb(135, 208, 104);">
																					已映射
																				</div>
																			</td>
																			<td class="">
																				system
																			</td>
																			<td class="ant-table-column-has-filters">
																				<span>
																					2018-12-05
																				</span>
																			</td>
																			<td class="">
																				<span>
																					system
																				</span>
																			</td>
																			<td class="ant-table-column-has-filters">
																				<span>
																					2018-12-05
																				</span>
																			</td>
																			<td class="">
																				<div>
																					<span>
																						<span>
																							<span class="line">
																								编辑
																							</span>
																							<span class="line">
																								|
																							</span>
																						</span>
																					</span>
																					<span class="line">
																						删除
																					</span>
																				</div>
																			</td>
																		</tr>
																		<tr class="ant-table-row  ant-table-row-level-0">
																			<td class="">
																				<span class="ant-table-row-indent indent-level-0" style="padding-left: 0px;">
																				</span>
																				citizen_driver_license
																			</td>
																			<td class="">
																				k007_dw_dev
																			</td>
																			<td class="ant-table-column-has-filters">
																				关系
																			</td>
																			<td class="ant-table-column-has-filters">
																				<div data-show="true" class="ant-tag ant-tag-has-color" style="background-color: rgb(135, 208, 104);">
																					已映射
																				</div>
																			</td>
																			<td class="">
																				system
																			</td>
																			<td class="ant-table-column-has-filters">
																				<span>
																					2018-12-05
																				</span>
																			</td>
																			<td class="">
																				<span>
																					system
																				</span>
																			</td>
																			<td class="ant-table-column-has-filters">
																				<span>
																					2018-12-05
																				</span>
																			</td>
																			<td class="">
																				<div>
																					<span>
																						<span>
																							<span class="line">
																								编辑
																							</span>
																							<span class="line">
																								|
																							</span>
																						</span>
																					</span>
																					<span class="line">
																						删除
																					</span>
																				</div>
																			</td>
																		</tr>
																		<tr class="ant-table-row  ant-table-row-level-0">
																			<td class="">
																				<span class="ant-table-row-indent indent-level-0" style="padding-left: 0px;">
																				</span>
																				citizen_victim
																			</td>
																			<td class="">
																				k007_dw_dev
																			</td>
																			<td class="ant-table-column-has-filters">
																				关系
																			</td>
																			<td class="ant-table-column-has-filters">
																				<div data-show="true" class="ant-tag ant-tag-has-color" style="background-color: rgb(135, 208, 104);">
																					已映射
																				</div>
																			</td>
																			<td class="">
																				system
																			</td>
																			<td class="ant-table-column-has-filters">
																				<span>
																					2018-12-04
																				</span>
																			</td>
																			<td class="">
																				<span>
																					system
																				</span>
																			</td>
																			<td class="ant-table-column-has-filters">
																				<span>
																					2018-12-04
																				</span>
																			</td>
																			<td class="">
																				<div>
																					<span>
																						<span>
																							<span class="line">
																								编辑
																							</span>
																							<span class="line">
																								|
																							</span>
																						</span>
																					</span>
																					<span class="line">
																						删除
																					</span>
																				</div>
																			</td>
																		</tr>
																		<tr class="ant-table-row  ant-table-row-level-0">
																			<td class="">
																				<span class="ant-table-row-indent indent-level-0" style="padding-left: 0px;">
																				</span>
																				citizen_suspicion
																			</td>
																			<td class="">
																				k007_dw_dev
																			</td>
																			<td class="ant-table-column-has-filters">
																				关系
																			</td>
																			<td class="ant-table-column-has-filters">
																				<div data-show="true" class="ant-tag ant-tag-has-color" style="background-color: rgb(135, 208, 104);">
																					已映射
																				</div>
																			</td>
																			<td class="">
																				system
																			</td>
																			<td class="ant-table-column-has-filters">
																				<span>
																					2018-12-04
																				</span>
																			</td>
																			<td class="">
																				<span>
																					system
																				</span>
																			</td>
																			<td class="ant-table-column-has-filters">
																				<span>
																					2018-12-04
																				</span>
																			</td>
																			<td class="">
																				<div>
																					<span>
																						<span>
																							<span class="line">
																								编辑
																							</span>
																							<span class="line">
																								|
																							</span>
																						</span>
																					</span>
																					<span class="line">
																						删除
																					</span>
																				</div>
																			</td>
																		</tr>
																		<tr class="ant-table-row  ant-table-row-level-0">
																			<td class="">
																				<span class="ant-table-row-indent indent-level-0" style="padding-left: 0px;">
																				</span>
																				citizen_criminal
																			</td>
																			<td class="">
																				k007_dw_dev
																			</td>
																			<td class="ant-table-column-has-filters">
																				关系
																			</td>
																			<td class="ant-table-column-has-filters">
																				<div data-show="true" class="ant-tag ant-tag-has-color" style="background-color: rgb(135, 208, 104);">
																					已映射
																				</div>
																			</td>
																			<td class="">
																				system
																			</td>
																			<td class="ant-table-column-has-filters">
																				<span>
																					2018-12-04
																				</span>
																			</td>
																			<td class="">
																				<span>
																					system
																				</span>
																			</td>
																			<td class="ant-table-column-has-filters">
																				<span>
																					2018-12-04
																				</span>
																			</td>
																			<td class="">
																				<div>
																					<span>
																						<span>
																							<span class="line">
																								编辑
																							</span>
																							<span class="line">
																								|
																							</span>
																						</span>
																					</span>
																					<span class="line">
																						删除
																					</span>
																				</div>
																			</td>
																		</tr>
																		<tr class="ant-table-row  ant-table-row-level-0">
																			<td class="">
																				<span class="ant-table-row-indent indent-level-0" style="padding-left: 0px;">
																				</span>
																				citizen_relative_brother_sister
																			</td>
																			<td class="">
																				k007_dw_dev
																			</td>
																			<td class="ant-table-column-has-filters">
																				关系
																			</td>
																			<td class="ant-table-column-has-filters">
																				<div data-show="true" class="ant-tag ant-tag-has-color" style="background-color: rgb(135, 208, 104);">
																					已映射
																				</div>
																			</td>
																			<td class="">
																				system
																			</td>
																			<td class="ant-table-column-has-filters">
																				<span>
																					2018-12-03
																				</span>
																			</td>
																			<td class="">
																				<span>
																					system
																				</span>
																			</td>
																			<td class="ant-table-column-has-filters">
																				<span>
																					2018-12-04
																				</span>
																			</td>
																			<td class="">
																				<div>
																					<span>
																						<span>
																							<span class="line">
																								编辑
																							</span>
																							<span class="line">
																								|
																							</span>
																						</span>
																					</span>
																					<span class="line">
																						删除
																					</span>
																				</div>
																			</td>
																		</tr>
																		<tr class="ant-table-row  ant-table-row-level-0">
																			<td class="">
																				<span class="ant-table-row-indent indent-level-0" style="padding-left: 0px;">
																				</span>
																				citizen_relative_sister_brother
																			</td>
																			<td class="">
																				k007_dw_dev
																			</td>
																			<td class="ant-table-column-has-filters">
																				关系
																			</td>
																			<td class="ant-table-column-has-filters">
																				<div data-show="true" class="ant-tag ant-tag-has-color" style="background-color: rgb(135, 208, 104);">
																					已映射
																				</div>
																			</td>
																			<td class="">
																				system
																			</td>
																			<td class="ant-table-column-has-filters">
																				<span>
																					2018-12-03
																				</span>
																			</td>
																			<td class="">
																				<span>
																					system
																				</span>
																			</td>
																			<td class="ant-table-column-has-filters">
																				<span>
																					2018-12-04
																				</span>
																			</td>
																			<td class="">
																				<div>
																					<span>
																						<span>
																							<span class="line">
																								编辑
																							</span>
																							<span class="line">
																								|
																							</span>
																						</span>
																					</span>
																					<span class="line">
																						删除
																					</span>
																				</div>
																			</td>
																		</tr>
																		<tr class="ant-table-row  ant-table-row-level-0">
																			<td class="">
																				<span class="ant-table-row-indent indent-level-0" style="padding-left: 0px;">
																				</span>
																				citizen_relative_mother_son
																			</td>
																			<td class="">
																				k007_dw_dev
																			</td>
																			<td class="ant-table-column-has-filters">
																				关系
																			</td>
																			<td class="ant-table-column-has-filters">
																				<div data-show="true" class="ant-tag ant-tag-has-color" style="background-color: rgb(135, 208, 104);">
																					已映射
																				</div>
																			</td>
																			<td class="">
																				system
																			</td>
																			<td class="ant-table-column-has-filters">
																				<span>
																					2018-12-03
																				</span>
																			</td>
																			<td class="">
																				<span>
																					system
																				</span>
																			</td>
																			<td class="ant-table-column-has-filters">
																				<span>
																					2018-12-04
																				</span>
																			</td>
																			<td class="">
																				<div>
																					<span>
																						<span>
																							<span class="line">
																								编辑
																							</span>
																							<span class="line">
																								|
																							</span>
																						</span>
																					</span>
																					<span class="line">
																						删除
																					</span>
																				</div>
																			</td>
																		</tr>
																		<tr class="ant-table-row  ant-table-row-level-0">
																			<td class="">
																				<span class="ant-table-row-indent indent-level-0" style="padding-left: 0px;">
																				</span>
																				citizen_relative_mother_daughter
																			</td>
																			<td class="">
																				k007_dw_dev
																			</td>
																			<td class="ant-table-column-has-filters">
																				关系
																			</td>
																			<td class="ant-table-column-has-filters">
																				<div data-show="true" class="ant-tag ant-tag-has-color" style="background-color: rgb(135, 208, 104);">
																					已映射
																				</div>
																			</td>
																			<td class="">
																				system
																			</td>
																			<td class="ant-table-column-has-filters">
																				<span>
																					2018-12-03
																				</span>
																			</td>
																			<td class="">
																				<span>
																					system
																				</span>
																			</td>
																			<td class="ant-table-column-has-filters">
																				<span>
																					2018-12-04
																				</span>
																			</td>
																			<td class="">
																				<div>
																					<span>
																						<span>
																							<span class="line">
																								编辑
																							</span>
																							<span class="line">
																								|
																							</span>
																						</span>
																					</span>
																					<span class="line">
																						删除
																					</span>
																				</div>
																			</td>
																		</tr>
																		<tr class="ant-table-row  ant-table-row-level-0">
																			<td class="">
																				<span class="ant-table-row-indent indent-level-0" style="padding-left: 0px;">
																				</span>
																				citizen_relative_father_daughter
																			</td>
																			<td class="">
																				k007_dw_dev
																			</td>
																			<td class="ant-table-column-has-filters">
																				关系
																			</td>
																			<td class="ant-table-column-has-filters">
																				<div data-show="true" class="ant-tag ant-tag-has-color" style="background-color: rgb(135, 208, 104);">
																					已映射
																				</div>
																			</td>
																			<td class="">
																				system
																			</td>
																			<td class="ant-table-column-has-filters">
																				<span>
																					2018-12-03
																				</span>
																			</td>
																			<td class="">
																				<span>
																					system
																				</span>
																			</td>
																			<td class="ant-table-column-has-filters">
																				<span>
																					2018-12-04
																				</span>
																			</td>
																			<td class="">
																				<div>
																					<span>
																						<span>
																							<span class="line">
																								编辑
																							</span>
																							<span class="line">
																								|
																							</span>
																						</span>
																					</span>
																					<span class="line">
																						删除
																					</span>
																				</div>
																			</td>
																		</tr>
																		<tr class="ant-table-row  ant-table-row-level-0">
																			<td class="">
																				<span class="ant-table-row-indent indent-level-0" style="padding-left: 0px;">
																				</span>
																				citizen_relative_father_son
																			</td>
																			<td class="">
																				k007_dw_dev
																			</td>
																			<td class="ant-table-column-has-filters">
																				关系
																			</td>
																			<td class="ant-table-column-has-filters">
																				<div data-show="true" class="ant-tag ant-tag-has-color" style="background-color: rgb(135, 208, 104);">
																					已映射
																				</div>
																			</td>
																			<td class="">
																				system
																			</td>
																			<td class="ant-table-column-has-filters">
																				<span>
																					2018-12-03
																				</span>
																			</td>
																			<td class="">
																				<span>
																					system
																				</span>
																			</td>
																			<td class="ant-table-column-has-filters">
																				<span>
																					2018-12-04
																				</span>
																			</td>
																			<td class="">
																				<div>
																					<span>
																						<span>
																							<span class="line">
																								编辑
																							</span>
																							<span class="line">
																								|
																							</span>
																						</span>
																					</span>
																					<span class="line">
																						删除
																					</span>
																				</div>
																			</td>
																		</tr>
																		<tr class="ant-table-row  ant-table-row-level-0">
																			<td class="">
																				<span class="ant-table-row-indent indent-level-0" style="padding-left: 0px;">
																				</span>
																				citizen_relative_brother
																			</td>
																			<td class="">
																				k007_dw_dev
																			</td>
																			<td class="ant-table-column-has-filters">
																				关系
																			</td>
																			<td class="ant-table-column-has-filters">
																				<div data-show="true" class="ant-tag ant-tag-has-color" style="background-color: rgb(135, 208, 104);">
																					已映射
																				</div>
																			</td>
																			<td class="">
																				system
																			</td>
																			<td class="ant-table-column-has-filters">
																				<span>
																					2018-12-03
																				</span>
																			</td>
																			<td class="">
																				<span>
																					system
																				</span>
																			</td>
																			<td class="ant-table-column-has-filters">
																				<span>
																					2018-12-04
																				</span>
																			</td>
																			<td class="">
																				<div>
																					<span>
																						<span>
																							<span class="line">
																								编辑
																							</span>
																							<span class="line">
																								|
																							</span>
																						</span>
																					</span>
																					<span class="line">
																						删除
																					</span>
																				</div>
																			</td>
																		</tr>
																		<tr class="ant-table-row  ant-table-row-level-0">
																			<td class="">
																				<span class="ant-table-row-indent indent-level-0" style="padding-left: 0px;">
																				</span>
																				citizen_relative_spouse
																			</td>
																			<td class="">
																				k007_dw_dev
																			</td>
																			<td class="ant-table-column-has-filters">
																				关系
																			</td>
																			<td class="ant-table-column-has-filters">
																				<div data-show="true" class="ant-tag ant-tag-has-color" style="background-color: rgb(135, 208, 104);">
																					已映射
																				</div>
																			</td>
																			<td class="">
																				system
																			</td>
																			<td class="ant-table-column-has-filters">
																				<span>
																					2018-12-03
																				</span>
																			</td>
																			<td class="">
																				<span>
																					system
																				</span>
																			</td>
																			<td class="ant-table-column-has-filters">
																				<span>
																					2018-12-04
																				</span>
																			</td>
																			<td class="">
																				<div>
																					<span>
																						<span>
																							<span class="line">
																								编辑
																							</span>
																							<span class="line">
																								|
																							</span>
																						</span>
																					</span>
																					<span class="line">
																						删除
																					</span>
																				</div>
																			</td>
																		</tr>
																		<tr class="ant-table-row  ant-table-row-level-0">
																			<td class="">
																				<span class="ant-table-row-indent indent-level-0" style="padding-left: 0px;">
																				</span>
																				citizen_identification
																			</td>
																			<td class="">
																				k007_dw_dev
																			</td>
																			<td class="ant-table-column-has-filters">
																				关系
																			</td>
																			<td class="ant-table-column-has-filters">
																				<div data-show="true" class="ant-tag ant-tag-has-color" style="background-color: rgb(135, 208, 104);">
																					已映射
																				</div>
																			</td>
																			<td class="">
																				system
																			</td>
																			<td class="ant-table-column-has-filters">
																				<span>
																					2018-12-03
																				</span>
																			</td>
																			<td class="">
																				<span>
																					system
																				</span>
																			</td>
																			<td class="ant-table-column-has-filters">
																				<span>
																					2018-12-04
																				</span>
																			</td>
																			<td class="">
																				<div>
																					<span>
																						<span>
																							<span class="line">
																								编辑
																							</span>
																							<span class="line">
																								|
																							</span>
																						</span>
																					</span>
																					<span class="line">
																						删除
																					</span>
																				</div>
																			</td>
																		</tr>
																		<tr class="ant-table-row  ant-table-row-level-0">
																			<td class="">
																				<span class="ant-table-row-indent indent-level-0" style="padding-left: 0px;">
																				</span>
																				criminal
																			</td>
																			<td class="">
																				k007_dw_dev
																			</td>
																			<td class="ant-table-column-has-filters">
																				对象
																			</td>
																			<td class="ant-table-column-has-filters">
																				<div data-show="true" class="ant-tag ant-tag-has-color" style="background-color: rgb(135, 208, 104);">
																					已映射
																				</div>
																			</td>
																			<td class="">
																				system
																			</td>
																			<td class="ant-table-column-has-filters">
																				<span>
																					2018-12-01
																				</span>
																			</td>
																			<td class="">
																				<span>
																					system
																				</span>
																			</td>
																			<td class="ant-table-column-has-filters">
																				<span>
																					2018-12-04
																				</span>
																			</td>
																			<td class="">
																				<div>
																					<span>
																						<span>
																							<span class="line">
																								编辑
																							</span>
																							<span class="line">
																								|
																							</span>
																						</span>
																					</span>
																					<span class="line">
																						删除
																					</span>
																				</div>
																			</td>
																		</tr>
																		<tr class="ant-table-row  ant-table-row-level-0">
																			<td class="">
																				<span class="ant-table-row-indent indent-level-0" style="padding-left: 0px;">
																				</span>
																				driver_license
																			</td>
																			<td class="">
																				k007_dw_dev
																			</td>
																			<td class="ant-table-column-has-filters">
																				对象
																			</td>
																			<td class="ant-table-column-has-filters">
																				<div data-show="true" class="ant-tag ant-tag-has-color" style="background-color: rgb(135, 208, 104);">
																					已映射
																				</div>
																			</td>
																			<td class="">
																				system
																			</td>
																			<td class="ant-table-column-has-filters">
																				<span>
																					2018-12-03
																				</span>
																			</td>
																			<td class="">
																				<span>
																					system
																				</span>
																			</td>
																			<td class="ant-table-column-has-filters">
																				<span>
																					2018-12-04
																				</span>
																			</td>
																			<td class="">
																				<div>
																					<span>
																						<span>
																							<span class="line">
																								编辑
																							</span>
																							<span class="line">
																								|
																							</span>
																						</span>
																					</span>
																					<span class="line">
																						删除
																					</span>
																				</div>
																			</td>
																		</tr>
																	</tbody>
																</table>
															</div>
														</div>
													</div>
												</div>
											</div>
											<div style="position: absolute; top: 0px; left: 0px; width: 100%;">
												<div>
													<div class="ant-dropdown  ant-dropdown-placement-bottomLeft  ant-dropdown-hidden">
														<div class="ant-table-filter-dropdown">
															<ul class="ant-dropdown-menu ant-dropdown-menu-without-submenu ant-dropdown-menu-root ant-dropdown-menu-vertical"
															role="menu" tabindex="0">
																<li class="ant-dropdown-menu-item" role="menuitem">
																	<label class="ant-radio-wrapper">
																		<span class="ant-radio">
																			<input type="radio" class="ant-radio-input" value="">
																			<span class="ant-radio-inner">
																			</span>
																		</span>
																	</label>
																	<span>
																		对象
																	</span>
																</li>
																<li class="ant-dropdown-menu-item" role="menuitem">
																	<label class="ant-radio-wrapper">
																		<span class="ant-radio">
																			<input type="radio" class="ant-radio-input" value="">
																			<span class="ant-radio-inner">
																			</span>
																		</span>
																	</label>
																	<span>
																		关系
																	</span>
																</li>
															</ul>
															<div class="ant-table-filter-dropdown-btns">
																<a class="ant-table-filter-dropdown-link confirm">
																	确定
																</a>
																<a class="ant-table-filter-dropdown-link clear">
																	重置
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>
											<div style="position: absolute; top: 0px; left: 0px; width: 100%;">
												<div>
													<div class="ant-dropdown  ant-dropdown-placement-bottomLeft  ant-dropdown-hidden">
														<div class="ant-table-filter-dropdown">
															<ul class="ant-dropdown-menu ant-dropdown-menu-without-submenu ant-dropdown-menu-root ant-dropdown-menu-vertical"
															role="menu" tabindex="0">
																<li class="ant-dropdown-menu-item" role="menuitem">
																	<label class="ant-radio-wrapper">
																		<span class="ant-radio">
																			<input type="radio" class="ant-radio-input" value="">
																			<span class="ant-radio-inner">
																			</span>
																		</span>
																	</label>
																	<span>
																		已验证
																	</span>
																</li>
																<li class="ant-dropdown-menu-item" role="menuitem">
																	<label class="ant-radio-wrapper">
																		<span class="ant-radio">
																			<input type="radio" class="ant-radio-input" value="">
																			<span class="ant-radio-inner">
																			</span>
																		</span>
																	</label>
																	<span>
																		已映射
																	</span>
																</li>
																<li class="ant-dropdown-menu-item" role="menuitem">
																	<label class="ant-radio-wrapper">
																		<span class="ant-radio">
																			<input type="radio" class="ant-radio-input" value="">
																			<span class="ant-radio-inner">
																			</span>
																		</span>
																	</label>
																	<span>
																		验证中
																	</span>
																</li>
																<li class="ant-dropdown-menu-item" role="menuitem">
																	<label class="ant-radio-wrapper">
																		<span class="ant-radio">
																			<input type="radio" class="ant-radio-input" value="">
																			<span class="ant-radio-inner">
																			</span>
																		</span>
																	</label>
																	<span>
																		sql异常
																	</span>
																</li>
															</ul>
															<div class="ant-table-filter-dropdown-btns">
																<a class="ant-table-filter-dropdown-link confirm">
																	确定
																</a>
																<a class="ant-table-filter-dropdown-link clear">
																	重置
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="pageSel">
											<ul class="ant-pagination pages" unselectable="unselectable">
												<li class="ant-pagination-total-text">
													共 169 条
												</li>
												<li title="上一页" class="ant-pagination-disabled ant-pagination-prev" aria-disabled="true">
													<a class="ant-pagination-item-link">
													</a>
												</li>
												<li title="1" class="ant-pagination-item ant-pagination-item-1 ant-pagination-item-active"
												tabindex="0">
													<a>
														1
													</a>
												</li>
												<li title="2" class="ant-pagination-item ant-pagination-item-2" tabindex="0">
													<a>
														2
													</a>
												</li>
												<li title="3" class="ant-pagination-item ant-pagination-item-3" tabindex="0">
													<a>
														3
													</a>
												</li>
												<li title="4" class="ant-pagination-item ant-pagination-item-4" tabindex="0">
													<a>
														4
													</a>
												</li>
												<li title="下一页" class=" ant-pagination-next" aria-disabled="false" tabindex="0">
													<a class="ant-pagination-item-link">
													</a>
												</li>
												<li class="ant-pagination-options">
													<div class="ant-pagination-options-size-changer ant-select ant-select-enabled">
														<div class="ant-select-selection
														ant-select-selection--single" role="combobox" aria-autocomplete="list" aria-haspopup="true"
														aria-expanded="false" tabindex="0">
															<div class="ant-select-selection__rendered">
																<div class="ant-select-selection-selected-value" title="50 条/页" style="display: block; opacity: 1;">
																	50 条/页
																</div>
															</div>
															<span class="ant-select-arrow" unselectable="on" style="user-select: none;">
																<b>
																</b>
															</span>
														</div>
													</div>
													<div class="ant-pagination-options-quick-jumper">
														跳至
														<input type="text" value="">
														页
														<button type="button">
															确定
														</button>
													</div>
												</li>
											</ul>
										</div>
										<div>
										</div>
									</div>
								</div>
							</div>
							<div class="globalFooter___1cM92">
								<div class="copyright___1ZP5c">
									<div>
										Copyright
										<i class="anticon anticon-copyright">
										</i>
										2018 Corporation All Rights Reserved.
									</div>
								</div>
							</div>
						</div>
					</div>
@stop
