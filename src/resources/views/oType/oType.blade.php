@extends('template') @section('content')

						<div class="ant-layout-content" style="margin: 10px 24px 0px; height: 100%;">
							<div style="min-height: calc(100vh - 260px);">
								<div class="bfd_entity_obj___11PwV">
									<div class="content_topp___3UCcv">
										<a class="ic___3a45j" href="http://kg.itechs.ac.cn/home" style="color: rgb(51, 51, 51);">
											<i class="anticon anticon-home">
											</i>
											动态知识图谱 /
										</a>
										<span class="ic___3a45j">
											<i class="anticon anticon-folder-open">
											</i>
											本体配置 /
										</span>
										<a class="ic___3a45j" href="http://kg.itechs.ac.cn/ontology-conf/objects"
										style="color: rgb(51, 51, 51);">
											<i class="anticon anticon-file-text">
											</i>
											对象类型
										</a>
										<i class="fa fa-question-circle question-circle fa-1g">
										</i>
									</div>
									<div class="con___2YtAo">
										<div class="content_model___3iLuA">
											<button type="button" class="ant-btn editable_add_btn___3Tbog ant-btn-primary">
												<a href="./addObjectType.html">
												<span>
													添加对象类型
												</span>
											</button>
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
													<input placeholder="请输入关键字" id="search" class="ant-input" type="text"
													value="">
													<span class="ant-input-suffix">
														<button type="button" class="ant-btn ant-input-search-button ant-btn-primary">
															<span>
																搜 索
															</span>
														</button>
													</span>
												</span>
												<span class="searchTip">
													<i class="fa fa-question-circle question-circle fa-1g">
													</i>
												</span>
											</div>
										</div>
										<div class="ant-table-wrapper">
											<div class="ant-spin-nested-loading">
												<div class="ant-spin-container">
													<div class="ant-table ant-table-default ant-table-scroll-position-left">
														<div class="ant-table-content">
															<div class="ant-table-body">
																<table class="">
																	<colgroup>
																		<col style="width: 6%; min-width: 6%;">
																			<col style="width: 16%; min-width: 16%;">
																				<col style="width: 9%; min-width: 9%;">
																					<col style="width: 9%; min-width: 9%;">
																						<col style="width: 8%; min-width: 8%;">
																							<col style="width: 8%; min-width: 8%;">
																								<col style="width: 11%; min-width: 11%;">
																									<col style="width: 8%; min-width: 8%;">
																										<col style="width: 11%; min-width: 11%;">
																											<col>
																	</colgroup>
																	<thead class="ant-table-thead">
																		<tr>
																			<th class="">
																				<span>
																					图标
																				</span>
																			</th>
																			<th class="">
																				<span>
																					对象类型
																				</span>
																			</th>
																			<th class="">
																				<span>
																					显示名称
																				</span>
																			</th>
																			<th class="ant-table-column-has-filters">
																				<span>
																					分类
																					<i class="fa fa-filter filter fa-1g ant-table-filter-icon ant-dropdown-trigger"
																					title="筛选" style="color: rgb(0, 0, 0);">
																					</i>
																				</span>
																			</th>
																			<th class="">
																				<span>
																					状态
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
																				<i class="fa fa-undefined fa-1g user" style="color: rgb(30, 198, 89); font-size: 28px;">
																				</i>
																			</td>
																			<td class="">
																				entity.citizen
																			</td>
																			<td class="">
																				citizen
																			</td>
																			<td class="ant-table-column-has-filters">
																				entity
																			</td>
																			<td class="">
																				<div data-show="true" class="ant-tag ant-tag-red">
																					未融合
																				</div>
																			</td>
																			<td class="">
																				system
																			</td>
																			<td class="ant-table-column-has-filters">
																				<span>
																					2018-05-22
																				</span>
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
																				<div class="operation___3s32S">
																					<span>
																						编辑
																					</span>
																					<span>
																						删除
																					</span>
																					<span>
																						复制
																					</span>
																				</div>
																			</td>
																		</tr>
																		<tr class="ant-table-row  ant-table-row-level-0">
																			<td class="">
																				<span class="ant-table-row-indent indent-level-0" style="padding-left: 0px;">
																				</span>
																				<i class="fa fa-undefined fa-1g fa-automobile" style="color: rgb(30, 198, 89); font-size: 28px;">
																				</i>
																			</td>
																			<td class="">
																				entity.Car_test
																			</td>
																			<td class="">
																				汽车
																			</td>
																			<td class="ant-table-column-has-filters">
																				entity
																			</td>
																			<td class="">
																				<div data-show="true" class="ant-tag ant-tag-red">
																					未融合
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
																				system
																			</td>
																			<td class="ant-table-column-has-filters">
																				<span>
																					2018-12-19
																				</span>
																			</td>
																			<td class="">
																				<div class="operation___3s32S">
																					<span>
																						编辑
																					</span>
																					<span>
																						删除
																					</span>
																					<span>
																						复制
																					</span>
																				</div>
																			</td>
																		</tr>
																		<tr class="ant-table-row  ant-table-row-level-0">
																			<td class="">
																				<span class="ant-table-row-indent indent-level-0" style="padding-left: 0px;">
																				</span>
																				<i class="fa fa-undefined fa-1g fa-genderless" style="color: rgb(30, 198, 89); font-size: 28px;">
																				</i>
																			</td>
																			<td class="">
																				entity.test_merge
																			</td>
																			<td class="">
																				测试融合勿动
																			</td>
																			<td class="ant-table-column-has-filters">
																				entity
																			</td>
																			<td class="">
																				<div data-show="true" class="ant-tag">
																					已融合
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
																				system
																			</td>
																			<td class="ant-table-column-has-filters">
																				<span>
																					2018-12-19
																				</span>
																			</td>
																			<td class="">
																				<div class="operation___3s32S">
																					<span>
																						编辑
																					</span>
																					<span>
																						删除
																					</span>
																					<span>
																						复制
																					</span>
																				</div>
																			</td>
																		</tr>
																		<tr class="ant-table-row  ant-table-row-level-0">
																			<td class="">
																				<span class="ant-table-row-indent indent-level-0" style="padding-left: 0px;">
																				</span>
																				<i class="fa fa-undefined fa-1g fa-signing" style="color: rgb(30, 198, 89); font-size: 28px;">
																				</i>
																			</td>
																			<td class="">
																				event.overdraft
																			</td>
																			<td class="">
																				银行卡犯罪
																			</td>
																			<td class="ant-table-column-has-filters">
																				event
																			</td>
																			<td class="">
																				<div data-show="true" class="ant-tag">
																					无需融合
																				</div>
																			</td>
																			<td class="">
																				system
																			</td>
																			<td class="ant-table-column-has-filters">
																				<span>
																					2018-12-18
																				</span>
																			</td>
																			<td class="">
																				system
																			</td>
																			<td class="ant-table-column-has-filters">
																				<span>
																					2018-12-18
																				</span>
																			</td>
																			<td class="">
																				<div class="operation___3s32S">
																					<span>
																						编辑
																					</span>
																					<span>
																						删除
																					</span>
																					<span>
																						复制
																					</span>
																				</div>
																			</td>
																		</tr>
																		<tr class="ant-table-row  ant-table-row-level-0">
																			<td class="">
																				<span class="ant-table-row-indent indent-level-0" style="padding-left: 0px;">
																				</span>
																				<i class="fa fa-undefined fa-1g fa-signing" style="color: rgb(30, 198, 89); font-size: 28px;">
																				</i>
																			</td>
																			<td class="">
																				event.pyramid_sales
																			</td>
																			<td class="">
																				传销
																			</td>
																			<td class="ant-table-column-has-filters">
																				event
																			</td>
																			<td class="">
																				<div data-show="true" class="ant-tag">
																					无需融合
																				</div>
																			</td>
																			<td class="">
																				system
																			</td>
																			<td class="ant-table-column-has-filters">
																				<span>
																					2018-12-18
																				</span>
																			</td>
																			<td class="">
																				system
																			</td>
																			<td class="ant-table-column-has-filters">
																				<span>
																					2018-12-18
																				</span>
																			</td>
																			<td class="">
																				<div class="operation___3s32S">
																					<span>
																						编辑
																					</span>
																					<span>
																						删除
																					</span>
																					<span>
																						复制
																					</span>
																				</div>
																			</td>
																		</tr>
																		<tr class="ant-table-row  ant-table-row-level-0">
																			<td class="">
																				<span class="ant-table-row-indent indent-level-0" style="padding-left: 0px;">
																				</span>
																				<i class="fa fa-undefined fa-1g fa-bank" style="color: rgb(30, 198, 89); font-size: 28px;">
																				</i>
																			</td>
																			<td class="">
																				entity.house_property
																			</td>
																			<td class="">
																				房屋地产
																			</td>
																			<td class="ant-table-column-has-filters">
																				entity
																			</td>
																			<td class="">
																				<div data-show="true" class="ant-tag ant-tag-red">
																					未融合
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
																				system
																			</td>
																			<td class="ant-table-column-has-filters">
																				<span>
																					2018-12-17
																				</span>
																			</td>
																			<td class="">
																				<div class="operation___3s32S">
																					<span>
																						编辑
																					</span>
																					<span>
																						删除
																					</span>
																					<span>
																						复制
																					</span>
																				</div>
																			</td>
																		</tr>
																		<tr class="ant-table-row  ant-table-row-level-0">
																			<td class="">
																				<span class="ant-table-row-indent indent-level-0" style="padding-left: 0px;">
																				</span>
																				<i class="fa fa-undefined fa-1g fighter-jet" style="color: rgb(30, 198, 89); font-size: 28px;">
																				</i>
																			</td>
																			<td class="">
																				entity.weapon
																			</td>
																			<td class="">
																				武器信息
																			</td>
																			<td class="ant-table-column-has-filters">
																				entity
																			</td>
																			<td class="">
																				<div data-show="true" class="ant-tag ant-tag-red">
																					未融合
																				</div>
																			</td>
																			<td class="">
																				system
																			</td>
																			<td class="ant-table-column-has-filters">
																				<span>
																					2018-05-17
																				</span>
																			</td>
																			<td class="">
																				system
																			</td>
																			<td class="ant-table-column-has-filters">
																				<span>
																					2018-12-14
																				</span>
																			</td>
																			<td class="">
																				<div class="operation___3s32S">
																					<span>
																						编辑
																					</span>
																					<span>
																						删除
																					</span>
																					<span>
																						复制
																					</span>
																				</div>
																			</td>
																		</tr>
																		<tr class="ant-table-row  ant-table-row-level-0">
																			<td class="">
																				<span class="ant-table-row-indent indent-level-0" style="padding-left: 0px;">
																				</span>
																				<i class="fa fa-undefined fa-1g fa-car" style="color: rgb(30, 198, 89); font-size: 28px;">
																				</i>
																			</td>
																			<td class="">
																				entity.case_car
																			</td>
																			<td class="">
																				case_car
																			</td>
																			<td class="ant-table-column-has-filters">
																				entity
																			</td>
																			<td class="">
																				<div data-show="true" class="ant-tag ant-tag-red">
																					未融合
																				</div>
																			</td>
																			<td class="">
																				system
																			</td>
																			<td class="ant-table-column-has-filters">
																				<span>
																					2018-11-30
																				</span>
																			</td>
																			<td class="">
																				system
																			</td>
																			<td class="ant-table-column-has-filters">
																				<span>
																					2018-12-13
																				</span>
																			</td>
																			<td class="">
																				<div class="operation___3s32S">
																					<span>
																						编辑
																					</span>
																					<span>
																						删除
																					</span>
																					<span>
																						复制
																					</span>
																				</div>
																			</td>
																		</tr>
																		<tr class="ant-table-row  ant-table-row-level-0">
																			<td class="">
																				<span class="ant-table-row-indent indent-level-0" style="padding-left: 0px;">
																				</span>
																				<i class="fa fa-undefined fa-1g fa-car" style="color: rgb(30, 198, 89); font-size: 28px;">
																				</i>
																			</td>
																			<td class="">
																				entity.civil_car
																			</td>
																			<td class="">
																				civil_car
																			</td>
																			<td class="ant-table-column-has-filters">
																				entity
																			</td>
																			<td class="">
																				<div data-show="true" class="ant-tag ant-tag-red">
																					未融合
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
																				system
																			</td>
																			<td class="ant-table-column-has-filters">
																				<span>
																					2018-12-13
																				</span>
																			</td>
																			<td class="">
																				<div class="operation___3s32S">
																					<span>
																						编辑
																					</span>
																					<span>
																						删除
																					</span>
																					<span>
																						复制
																					</span>
																				</div>
																			</td>
																		</tr>
																		<tr class="ant-table-row  ant-table-row-level-0">
																			<td class="">
																				<span class="ant-table-row-indent indent-level-0" style="padding-left: 0px;">
																				</span>
																				<i class="fa fa-undefined fa-1g podcast" style="color: rgb(30, 198, 89); font-size: 28px;">
																				</i>
																			</td>
																			<td class="">
																				entity.traffic_monitor_device
																			</td>
																			<td class="">
																				交通卡口设备
																			</td>
																			<td class="ant-table-column-has-filters">
																				entity
																			</td>
																			<td class="">
																				<div data-show="true" class="ant-tag ant-tag-red">
																					未融合
																				</div>
																			</td>
																			<td class="">
																				system
																			</td>
																			<td class="ant-table-column-has-filters">
																				<span>
																					2018-05-17
																				</span>
																			</td>
																			<td class="">
																				system
																			</td>
																			<td class="ant-table-column-has-filters">
																				<span>
																					2018-12-13
																				</span>
																			</td>
																			<td class="">
																				<div class="operation___3s32S">
																					<span>
																						编辑
																					</span>
																					<span>
																						删除
																					</span>
																					<span>
																						复制
																					</span>
																				</div>
																			</td>
																		</tr>
																		<tr class="ant-table-row  ant-table-row-level-0">
																			<td class="">
																				<span class="ant-table-row-indent indent-level-0" style="padding-left: 0px;">
																				</span>
																				<i class="fa fa-undefined fa-1g shield" style="color: rgb(30, 198, 89); font-size: 28px;">
																				</i>
																			</td>
																			<td class="">
																				event.traffic_monitor
																			</td>
																			<td class="">
																				交通监控信息
																			</td>
																			<td class="ant-table-column-has-filters">
																				event
																			</td>
																			<td class="">
																				<div data-show="true" class="ant-tag">
																					无需融合
																				</div>
																			</td>
																			<td class="">
																				system
																			</td>
																			<td class="ant-table-column-has-filters">
																				<span>
																					2018-05-17
																				</span>
																			</td>
																			<td class="">
																				system
																			</td>
																			<td class="ant-table-column-has-filters">
																				<span>
																					2018-12-13
																				</span>
																			</td>
																			<td class="">
																				<div class="operation___3s32S">
																					<span>
																						编辑
																					</span>
																					<span>
																						删除
																					</span>
																					<span>
																						复制
																					</span>
																				</div>
																			</td>
																		</tr>
																		<tr class="ant-table-row  ant-table-row-level-0">
																			<td class="">
																				<span class="ant-table-row-indent indent-level-0" style="padding-left: 0px;">
																				</span>
																				<i class="fa fa-undefined fa-1g fa-hand-o-right" style="color: rgb(30, 198, 89); font-size: 28px;">
																				</i>
																			</td>
																			<td class="">
																				event.immigration_inspection
																			</td>
																			<td class="">
																				immigration_inspection
																			</td>
																			<td class="ant-table-column-has-filters">
																				event
																			</td>
																			<td class="">
																				<div data-show="true" class="ant-tag">
																					无需融合
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
																				system
																			</td>
																			<td class="ant-table-column-has-filters">
																				<span>
																					2018-12-13
																				</span>
																			</td>
																			<td class="">
																				<div class="operation___3s32S">
																					<span>
																						编辑
																					</span>
																					<span>
																						删除
																					</span>
																					<span>
																						复制
																					</span>
																				</div>
																			</td>
																		</tr>
																		<tr class="ant-table-row  ant-table-row-level-0">
																			<td class="">
																				<span class="ant-table-row-indent indent-level-0" style="padding-left: 0px;">
																				</span>
																				<i class="fa fa-undefined fa-1g paste" style="color: rgb(30, 198, 89); font-size: 28px;">
																				</i>
																			</td>
																			<td class="">
																				event.commit_case
																			</td>
																			<td class="">
																				犯案信息表
																			</td>
																			<td class="ant-table-column-has-filters">
																				event
																			</td>
																			<td class="">
																				<div data-show="true" class="ant-tag">
																					无需融合
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
																				system
																			</td>
																			<td class="ant-table-column-has-filters">
																				<span>
																					2018-12-12
																				</span>
																			</td>
																			<td class="">
																				<div class="operation___3s32S">
																					<span>
																						编辑
																					</span>
																					<span>
																						删除
																					</span>
																					<span>
																						复制
																					</span>
																				</div>
																			</td>
																		</tr>
																		<tr class="ant-table-row  ant-table-row-level-0">
																			<td class="">
																				<span class="ant-table-row-indent indent-level-0" style="padding-left: 0px;">
																				</span>
																				<i class="fa fa-undefined fa-1g paste" style="color: rgb(30, 198, 89); font-size: 28px;">
																				</i>
																			</td>
																			<td class="">
																				event.injured_by_case
																			</td>
																			<td class="">
																				受害案信息表
																			</td>
																			<td class="ant-table-column-has-filters">
																				event
																			</td>
																			<td class="">
																				<div data-show="true" class="ant-tag">
																					无需融合
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
																				system
																			</td>
																			<td class="ant-table-column-has-filters">
																				<span>
																					2018-12-12
																				</span>
																			</td>
																			<td class="">
																				<div class="operation___3s32S">
																					<span>
																						编辑
																					</span>
																					<span>
																						删除
																					</span>
																					<span>
																						复制
																					</span>
																				</div>
																			</td>
																		</tr>
																		<tr class="ant-table-row  ant-table-row-level-0">
																			<td class="">
																				<span class="ant-table-row-indent indent-level-0" style="padding-left: 0px;">
																				</span>
																				<i class="fa fa-undefined fa-1g fa-user" style="color: rgb(30, 198, 89); font-size: 28px;">
																				</i>
																			</td>
																			<td class="">
																				entity.bkperson
																			</td>
																			<td class="">
																				bkperson_test_alan
																			</td>
																			<td class="ant-table-column-has-filters">
																				entity
																			</td>
																			<td class="">
																				<div data-show="true" class="ant-tag ant-tag-red">
																					未融合
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
																				system
																			</td>
																			<td class="ant-table-column-has-filters">
																				<span>
																					2018-12-10
																				</span>
																			</td>
																			<td class="">
																				<div class="operation___3s32S">
																					<span>
																						编辑
																					</span>
																					<span>
																						删除
																					</span>
																					<span>
																						复制
																					</span>
																				</div>
																			</td>
																		</tr>
																		<tr class="ant-table-row  ant-table-row-level-0">
																			<td class="">
																				<span class="ant-table-row-indent indent-level-0" style="padding-left: 0px;">
																				</span>
																				<i class="fa fa-undefined fa-1g paste" style="color: rgb(30, 198, 89); font-size: 28px;">
																				</i>
																			</td>
																			<td class="">
																				entity.case
																			</td>
																			<td class="">
																				案件信息
																			</td>
																			<td class="ant-table-column-has-filters">
																				entity
																			</td>
																			<td class="">
																				<div data-show="true" class="ant-tag ant-tag-red">
																					未融合
																				</div>
																			</td>
																			<td class="">
																				system
																			</td>
																			<td class="ant-table-column-has-filters">
																				<span>
																					2018-11-30
																				</span>
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
																				<div class="operation___3s32S">
																					<span>
																						编辑
																					</span>
																					<span>
																						删除
																					</span>
																					<span>
																						复制
																					</span>
																				</div>
																			</td>
																		</tr>
																		<tr class="ant-table-row  ant-table-row-level-0">
																			<td class="">
																				<span class="ant-table-row-indent indent-level-0" style="padding-left: 0px;">
																				</span>
																				<i class="fa fa-undefined fa-1g fa-credit-card-alt" style="color: rgb(30, 198, 89); font-size: 28px;">
																				</i>
																			</td>
																			<td class="">
																				entity.bakatm
																			</td>
																			<td class="">
																				bakatm_test
																			</td>
																			<td class="ant-table-column-has-filters">
																				entity
																			</td>
																			<td class="">
																				<div data-show="true" class="ant-tag ant-tag-red">
																					未融合
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
																				system
																			</td>
																			<td class="ant-table-column-has-filters">
																				<span>
																					2018-12-06
																				</span>
																			</td>
																			<td class="">
																				<div class="operation___3s32S">
																					<span>
																						编辑
																					</span>
																					<span>
																						删除
																					</span>
																					<span>
																						复制
																					</span>
																				</div>
																			</td>
																		</tr>
																		<tr class="ant-table-row  ant-table-row-level-0">
																			<td class="">
																				<span class="ant-table-row-indent indent-level-0" style="padding-left: 0px;">
																				</span>
																				<i class="fa fa-undefined fa-1g fa-chain-broken" style="color: rgb(30, 198, 89); font-size: 28px;">
																				</i>
																			</td>
																			<td class="">
																				event.gtd_demo
																			</td>
																			<td class="">
																				恐怖袭击
																			</td>
																			<td class="ant-table-column-has-filters">
																				event
																			</td>
																			<td class="">
																				<div data-show="true" class="ant-tag">
																					无需融合
																				</div>
																			</td>
																			<td class="">
																				system
																			</td>
																			<td class="ant-table-column-has-filters">
																				<span>
																					2018-08-09
																				</span>
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
																				<div class="operation___3s32S">
																					<span>
																						编辑
																					</span>
																					<span>
																						删除
																					</span>
																					<span>
																						复制
																					</span>
																				</div>
																			</td>
																		</tr>
																		<tr class="ant-table-row  ant-table-row-level-0">
																			<td class="">
																				<span class="ant-table-row-indent indent-level-0" style="padding-left: 0px;">
																				</span>
																				<i class="fa fa-undefined fa-1g vcard" style="color: rgb(30, 198, 89); font-size: 28px;">
																				</i>
																			</td>
																			<td class="">
																				entity.passport
																			</td>
																			<td class="">
																				passport
																			</td>
																			<td class="ant-table-column-has-filters">
																				entity
																			</td>
																			<td class="">
																				<div data-show="true" class="ant-tag ant-tag-red">
																					未融合
																				</div>
																			</td>
																			<td class="">
																				system
																			</td>
																			<td class="ant-table-column-has-filters">
																				<span>
																					2018-05-18
																				</span>
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
																				<div class="operation___3s32S">
																					<span>
																						编辑
																					</span>
																					<span>
																						删除
																					</span>
																					<span>
																						复制
																					</span>
																				</div>
																			</td>
																		</tr>
																		<tr class="ant-table-row  ant-table-row-level-0">
																			<td class="">
																				<span class="ant-table-row-indent indent-level-0" style="padding-left: 0px;">
																				</span>
																				<i class="fa fa-undefined fa-1g fa-universal-access" style="color: rgb(30, 198, 89); font-size: 28px;">
																				</i>
																			</td>
																			<td class="">
																				event.id_check
																			</td>
																			<td class="">
																				id_check
																			</td>
																			<td class="ant-table-column-has-filters">
																				event
																			</td>
																			<td class="">
																				<div data-show="true" class="ant-tag">
																					无需融合
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
																				system
																			</td>
																			<td class="ant-table-column-has-filters">
																				<span>
																					2018-12-05
																				</span>
																			</td>
																			<td class="">
																				<div class="operation___3s32S">
																					<span>
																						编辑
																					</span>
																					<span>
																						删除
																					</span>
																					<span>
																						复制
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
																		entity
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
																		event
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
																		document
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
													共 113 条
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
												<li title="5" class="ant-pagination-item ant-pagination-item-5" tabindex="0">
													<a>
														5
													</a>
												</li>
												<li title="6" class="ant-pagination-item ant-pagination-item-6" tabindex="0">
													<a>
														6
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
																<div class="ant-select-selection-selected-value" title="20 条/页" style="display: block; opacity: 1;">
																	20 条/页
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
@stop