@extends('template') @section('content')
<div class="ant-layout-content" style="margin: 10px 24px 0px; height: 100%;">
							<div style="min-height: calc(100vh - 260px);">
								<div class="bfd_entity_rel___3ZMZE">
									<div class="content_topp___1RN_2">
										<a class="ic___221nt" href="http://kg.itechs.ac.cn/home" style="color: rgb(51, 51, 51);">
											<i class="anticon anticon-home">
											</i>
											动态知识图谱 /
										</a>
										<span class="ic___221nt">
											<i class="anticon anticon-folder-open">
											</i>
											本体配置 /
										</span>
										<a class="ic___221nt" href="http://kg.itechs.ac.cn/ontology-conf/relation"
										style="color: rgb(51, 51, 51);">
											<i class="anticon anticon-file-text">
											</i>
											关系类型
										</a>
										<i class="anticon anticon-question-circle">
										</i>
									</div>
									<div class="con___3FDf9">
										<div class="content_model___VAg7L">
											<div style="display: inline-block;">
												<span>
													<button type="button" class="ant-btn editable_add_btn___141Gm ant-btn-primary">
														<span>
															添加关系类型
														</span>
													</button>
												</span>
											</div>
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
													<input placeholder="请输入关键字" id="search" class="ant-input" type="text">
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
										<div class="ant-table-wrapper">
											<div class="ant-spin-nested-loading">
												<div class="ant-spin-container">
													<div class="ant-table ant-table-default ant-table-scroll-position-left">
														<div class="ant-table-content">
															<div class="ant-table-body">
																<table class="">
																	<colgroup>
																		<col style="width: 6%; min-width: 6%;">
																			<col style="width: 13%; min-width: 13%;">
																				<col style="width: 10%; min-width: 10%;">
																					<col style="width: 13%; min-width: 13%;">
																						<col style="width: 13%; min-width: 13%;">
																							<col style="width: 7%; min-width: 7%;">
																								<col style="width: 10%; min-width: 10%;">
																									<col style="width: 7%; min-width: 7%;">
																										<col style="width: 10%; min-width: 10%;">
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
																					关系类型
																				</span>
																			</th>
																			<th class="">
																				<span>
																					显示名称
																				</span>
																			</th>
																			<th class="ant-table-column-has-filters">
																				<span>
																					起点对象
																					<i class="fa fa-filter filter fa-1g ant-table-filter-icon ant-dropdown-trigger"
																					title="筛选" style="color: rgb(0, 0, 0);">
																					</i>
																				</span>
																			</th>
																			<th class="ant-table-column-has-filters">
																				<span>
																					终点对象
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
																				<span>
																					<i class="anticon anticon-arrow-right" style="color: rgb(30, 198, 89); font-size: 36px;">
																					</i>
																				</span>
																			</td>
																			<td class="">
																				com.bfd.rel.injured_by_case
																			</td>
																			<td class="">
																				injured_by_case_case
																			</td>
																			<td class="ant-table-column-has-filters">
																				<span>
																					entity.case
																				</span>
																			</td>
																			<td class="ant-table-column-has-filters">
																				<span>
																					event.injured_by_case
																				</span>
																			</td>
																			<td class="">
																				system
																			</td>
																			<td class="ant-table-column-has-filters">
																				<span>
																					2018-05-25
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
																				<div>
																					<div style="display: inline-block;">
																						<span>
																							<span class="line">
																								编辑
																							</span>
																							<span class="line">
																								|
																							</span>
																							&nbsp;
																						</span>
																					</div>
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
																				<span>
																					<i class="anticon anticon-arrow-right" style="color: rgb(30, 198, 89); font-size: 36px;">
																					</i>
																				</span>
																			</td>
																			<td class="">
																				com.bfd.rel.victim_injured_by_case
																			</td>
																			<td class="">
																				victim_injured_by_case
																			</td>
																			<td class="ant-table-column-has-filters">
																				<span>
																					entity.victim
																				</span>
																			</td>
																			<td class="ant-table-column-has-filters">
																				<span>
																					event.injured_by_case
																				</span>
																			</td>
																			<td class="">
																				system
																			</td>
																			<td class="ant-table-column-has-filters">
																				<span>
																					2018-05-25
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
																				<div>
																					<div style="display: inline-block;">
																						<span>
																							<span class="line">
																								编辑
																							</span>
																							<span class="line">
																								|
																							</span>
																							&nbsp;
																						</span>
																					</div>
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
																				<span>
																					<i class="anticon anticon-arrow-right" style="color: rgb(30, 198, 89); font-size: 36px;">
																					</i>
																				</span>
																			</td>
																			<td class="">
																				com.bfd.rel.suspicion_commit_case
																			</td>
																			<td class="">
																				suspicion_commit_case
																			</td>
																			<td class="ant-table-column-has-filters">
																				<span>
																					entity.suspicion
																				</span>
																			</td>
																			<td class="ant-table-column-has-filters">
																				<span>
																					event.commit_case
																				</span>
																			</td>
																			<td class="">
																				system
																			</td>
																			<td class="ant-table-column-has-filters">
																				<span>
																					2018-05-25
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
																				<div>
																					<div style="display: inline-block;">
																						<span>
																							<span class="line">
																								编辑
																							</span>
																							<span class="line">
																								|
																							</span>
																							&nbsp;
																						</span>
																					</div>
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
																				<span>
																					<i class="anticon anticon-arrow-right" style="color: rgb(30, 198, 89); font-size: 36px;">
																					</i>
																				</span>
																			</td>
																			<td class="">
																				com.bfd.rel.traffic_monitor_traffic_monitor_device
																			</td>
																			<td class="">
																				traffic_monitor_traffic_monitor_device
																			</td>
																			<td class="ant-table-column-has-filters">
																				<span>
																					event.traffic_monitor
																				</span>
																			</td>
																			<td class="ant-table-column-has-filters">
																				<span>
																					entity.traffic_monitor_device
																				</span>
																			</td>
																			<td class="">
																				system
																			</td>
																			<td class="ant-table-column-has-filters">
																				<span>
																					2018-05-24
																				</span>
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
																				<div>
																					<div style="display: inline-block;">
																						<span>
																							<span class="line">
																								编辑
																							</span>
																							<span class="line">
																								|
																							</span>
																							&nbsp;
																						</span>
																					</div>
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
																				<span>
																					<i class="anticon anticon-arrow-right" style="color: rgb(30, 198, 89); font-size: 36px;">
																					</i>
																				</span>
																			</td>
																			<td class="">
																				com.bfd.rel.case_goods
																			</td>
																			<td class="">
																				case_goods
																			</td>
																			<td class="ant-table-column-has-filters">
																				<span>
																					entity.case
																				</span>
																			</td>
																			<td class="ant-table-column-has-filters">
																				<span>
																					entity.goods
																				</span>
																			</td>
																			<td class="">
																				system
																			</td>
																			<td class="ant-table-column-has-filters">
																				<span>
																					2018-05-24
																				</span>
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
																				<div>
																					<div style="display: inline-block;">
																						<span>
																							<span class="line">
																								编辑
																							</span>
																							<span class="line">
																								|
																							</span>
																							&nbsp;
																						</span>
																					</div>
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
																				<span>
																					<i class="anticon anticon-arrow-right" style="color: rgb(30, 198, 89); font-size: 36px;">
																					</i>
																				</span>
																			</td>
																			<td class="">
																				com.bfd.rel.citizen_passport
																			</td>
																			<td class="">
																				citizen_passport
																			</td>
																			<td class="ant-table-column-has-filters">
																				<span>
																					entity.citizen
																				</span>
																			</td>
																			<td class="ant-table-column-has-filters">
																				<span>
																					entity.passport
																				</span>
																			</td>
																			<td class="">
																				system
																			</td>
																			<td class="ant-table-column-has-filters">
																				<span>
																					2018-05-28
																				</span>
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
																				<div>
																					<div style="display: inline-block;">
																						<span>
																							<span class="line">
																								编辑
																							</span>
																							<span class="line">
																								|
																							</span>
																							&nbsp;
																						</span>
																					</div>
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
																				<span>
																					<i class="anticon anticon-arrow-right" style="color: rgb(30, 198, 89); font-size: 36px;">
																					</i>
																				</span>
																			</td>
																			<td class="">
																				com.bfd.rel.citizen_identification
																			</td>
																			<td class="">
																				citizen_identification
																			</td>
																			<td class="ant-table-column-has-filters">
																				<span>
																					entity.citizen
																				</span>
																			</td>
																			<td class="ant-table-column-has-filters">
																				<span>
																					entity.identification
																				</span>
																			</td>
																			<td class="">
																				system
																			</td>
																			<td class="ant-table-column-has-filters">
																				<span>
																					2018-05-28
																				</span>
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
																				<div>
																					<div style="display: inline-block;">
																						<span>
																							<span class="line">
																								编辑
																							</span>
																							<span class="line">
																								|
																							</span>
																							&nbsp;
																						</span>
																					</div>
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
																				<span>
																					<i class="anticon anticon-arrow-right" style="color: rgb(30, 198, 89); font-size: 36px;">
																					</i>
																				</span>
																			</td>
																			<td class="">
																				com.bfd.rel.citizen_fingerprint
																			</td>
																			<td class="">
																				citizen_fingerprint
																			</td>
																			<td class="ant-table-column-has-filters">
																				<span>
																					entity.citizen
																				</span>
																			</td>
																			<td class="ant-table-column-has-filters">
																				<span>
																					com.bfd.entity.fingerprint
																				</span>
																			</td>
																			<td class="">
																				system
																			</td>
																			<td class="ant-table-column-has-filters">
																				<span>
																					2018-05-25
																				</span>
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
																				<div>
																					<div style="display: inline-block;">
																						<span>
																							<span class="line">
																								编辑
																							</span>
																							<span class="line">
																								|
																							</span>
																							&nbsp;
																						</span>
																					</div>
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
																				<span>
																					<i class="anticon anticon-arrow-right" style="color: rgb(30, 198, 89); font-size: 36px;">
																					</i>
																				</span>
																			</td>
																			<td class="">
																				com.bfd.rel.purchase_rel
																			</td>
																			<td class="">
																				purchase_rel
																			</td>
																			<td class="ant-table-column-has-filters">
																				<span>
																					com.bfd.entity.account
																				</span>
																			</td>
																			<td class="ant-table-column-has-filters">
																				<span>
																					com.bfd.event.purchase
																				</span>
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
																					2018-07-18
																				</span>
																			</td>
																			<td class="">
																				<div>
																					<div style="display: inline-block;">
																						<span>
																							<span class="line">
																								编辑
																							</span>
																							<span class="line">
																								|
																							</span>
																							&nbsp;
																						</span>
																					</div>
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
																				<span>
																					<i class="anticon anticon-arrow-right" style="color: rgb(30, 198, 89); font-size: 36px;">
																					</i>
																				</span>
																			</td>
																			<td class="">
																				com.bfd.rel.purchase_related_puchase_info
																			</td>
																			<td class="">
																				purchase_related_puchase_info
																			</td>
																			<td class="ant-table-column-has-filters">
																				<span>
																					com.bfd.event.purchase
																				</span>
																			</td>
																			<td class="ant-table-column-has-filters">
																				<span>
																					com.bfd.entity.purchase_info
																				</span>
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
																					2018-07-18
																				</span>
																			</td>
																			<td class="">
																				<div>
																					<div style="display: inline-block;">
																						<span>
																							<span class="line">
																								编辑
																							</span>
																							<span class="line">
																								|
																							</span>
																							&nbsp;
																						</span>
																					</div>
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
																				<span>
																					<i class="anticon anticon-arrow-right" style="color: rgb(30, 198, 89); font-size: 36px;">
																					</i>
																				</span>
																			</td>
																			<td class="">
																				com.bfd.rel.train_taking_train
																			</td>
																			<td class="">
																				train_taking_train
																			</td>
																			<td class="ant-table-column-has-filters">
																				<span>
																					com.bfd.event.train_taking
																				</span>
																			</td>
																			<td class="ant-table-column-has-filters">
																				<span>
																					com.bfd.entity.train
																				</span>
																			</td>
																			<td class="">
																				system
																			</td>
																			<td class="ant-table-column-has-filters">
																				<span>
																					2018-05-24
																				</span>
																			</td>
																			<td class="">
																				system
																			</td>
																			<td class="ant-table-column-has-filters">
																				<span>
																					2018-07-18
																				</span>
																			</td>
																			<td class="">
																				<div>
																					<div style="display: inline-block;">
																						<span>
																							<span class="line">
																								编辑
																							</span>
																							<span class="line">
																								|
																							</span>
																							&nbsp;
																						</span>
																					</div>
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
																				<span>
																					<i class="anticon anticon-arrow-right" style="color: rgb(30, 198, 89); font-size: 36px;">
																					</i>
																				</span>
																			</td>
																			<td class="">
																				com.bfd.rel.stream_transfer_in
																			</td>
																			<td class="">
																				转入
																			</td>
																			<td class="ant-table-column-has-filters">
																				<span>
																					com.bfd.event.stream_transfer
																				</span>
																			</td>
																			<td class="ant-table-column-has-filters">
																				<span>
																					com.bfd.entity.stream_account
																				</span>
																			</td>
																			<td class="">
																				system
																			</td>
																			<td class="ant-table-column-has-filters">
																				<span>
																					2018-05-29
																				</span>
																			</td>
																			<td class="">
																				system
																			</td>
																			<td class="ant-table-column-has-filters">
																				<span>
																					2018-07-18
																				</span>
																			</td>
																			<td class="">
																				<div>
																					<div style="display: inline-block;">
																						<span>
																							<span class="line">
																								编辑
																							</span>
																							<span class="line">
																								|
																							</span>
																							&nbsp;
																						</span>
																					</div>
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
																				<span>
																					<i class="anticon anticon-arrow-right" style="color: rgb(30, 198, 89); font-size: 36px;">
																					</i>
																				</span>
																			</td>
																			<td class="">
																				com.bfd.rel.zfdemo
																			</td>
																			<td class="">
																				zf.demo
																			</td>
																			<td class="ant-table-column-has-filters">
																				<span>
																					com.bfd.entity.zf.test
																				</span>
																			</td>
																			<td class="ant-table-column-has-filters">
																				<span>
																					com.bfd.entity.zf.test
																				</span>
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
																					2018-07-18
																				</span>
																			</td>
																			<td class="">
																				<div>
																					<div style="display: inline-block;">
																						<span>
																							<span class="line">
																								编辑
																							</span>
																							<span class="line">
																								|
																							</span>
																							&nbsp;
																						</span>
																					</div>
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
																				<span>
																					<i class="anticon anticon-arrow-right" style="color: rgb(30, 198, 89); font-size: 36px;">
																					</i>
																				</span>
																			</td>
																			<td class="">
																				com.bfd.rel.citizen_hotel_register
																			</td>
																			<td class="">
																				citizen_hotel_register
																			</td>
																			<td class="ant-table-column-has-filters">
																				<span>
																					entity.citizen
																				</span>
																			</td>
																			<td class="ant-table-column-has-filters">
																				<span>
																					com.bfd.event.hotel_register
																				</span>
																			</td>
																			<td class="">
																				system
																			</td>
																			<td class="ant-table-column-has-filters">
																				<span>
																					2018-05-28
																				</span>
																			</td>
																			<td class="">
																				system
																			</td>
																			<td class="ant-table-column-has-filters">
																				<span>
																					2018-05-28
																				</span>
																			</td>
																			<td class="">
																				<div>
																					<div style="display: inline-block;">
																						<span>
																							<span class="line">
																								编辑
																							</span>
																							<span class="line">
																								|
																							</span>
																							&nbsp;
																						</span>
																					</div>
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
																				<span>
																					<i class="anticon anticon-arrow-right" style="color: rgb(30, 198, 89); font-size: 36px;">
																					</i>
																				</span>
																			</td>
																			<td class="">
																				com.bfd.rel.citizen_flight_taking
																			</td>
																			<td class="">
																				citizen_flight_taking
																			</td>
																			<td class="ant-table-column-has-filters">
																				<span>
																					entity.citizen
																				</span>
																			</td>
																			<td class="ant-table-column-has-filters">
																				<span>
																					com.bfd.event.flight_taking
																				</span>
																			</td>
																			<td class="">
																				system
																			</td>
																			<td class="ant-table-column-has-filters">
																				<span>
																					2018-05-28
																				</span>
																			</td>
																			<td class="">
																				system
																			</td>
																			<td class="ant-table-column-has-filters">
																				<span>
																					2018-05-28
																				</span>
																			</td>
																			<td class="">
																				<div>
																					<div style="display: inline-block;">
																						<span>
																							<span class="line">
																								编辑
																							</span>
																							<span class="line">
																								|
																							</span>
																							&nbsp;
																						</span>
																					</div>
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
																				<span>
																					<i class="anticon anticon-arrow-right" style="color: rgb(30, 198, 89); font-size: 36px;">
																					</i>
																				</span>
																			</td>
																			<td class="">
																				com.bfd.rel.citizen_train_taking
																			</td>
																			<td class="">
																				citizen_train_taking
																			</td>
																			<td class="ant-table-column-has-filters">
																				<span>
																					entity.citizen
																				</span>
																			</td>
																			<td class="ant-table-column-has-filters">
																				<span>
																					com.bfd.event.train_taking
																				</span>
																			</td>
																			<td class="">
																				system
																			</td>
																			<td class="ant-table-column-has-filters">
																				<span>
																					2018-05-28
																				</span>
																			</td>
																			<td class="">
																				system
																			</td>
																			<td class="ant-table-column-has-filters">
																				<span>
																					2018-05-28
																				</span>
																			</td>
																			<td class="">
																				<div>
																					<div style="display: inline-block;">
																						<span>
																							<span class="line">
																								编辑
																							</span>
																							<span class="line">
																								|
																							</span>
																							&nbsp;
																						</span>
																					</div>
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
																				<span>
																					<i class="anticon anticon-arrow-right" style="color: rgb(30, 198, 89); font-size: 36px;">
																					</i>
																				</span>
																			</td>
																			<td class="">
																				com.bfd.rel.citizen_account
																			</td>
																			<td class="">
																				citizen_account
																			</td>
																			<td class="ant-table-column-has-filters">
																				<span>
																					entity.citizen
																				</span>
																			</td>
																			<td class="ant-table-column-has-filters">
																				<span>
																					com.bfd.entity.account
																				</span>
																			</td>
																			<td class="">
																				system
																			</td>
																			<td class="ant-table-column-has-filters">
																				<span>
																					2018-05-28
																				</span>
																			</td>
																			<td class="">
																				system
																			</td>
																			<td class="ant-table-column-has-filters">
																				<span>
																					2018-05-28
																				</span>
																			</td>
																			<td class="">
																				<div>
																					<div style="display: inline-block;">
																						<span>
																							<span class="line">
																								编辑
																							</span>
																							<span class="line">
																								|
																							</span>
																							&nbsp;
																						</span>
																					</div>
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
																				<span>
																					<i class="anticon anticon-arrow-right" style="color: rgb(30, 198, 89); font-size: 36px;">
																					</i>
																				</span>
																			</td>
																			<td class="">
																				com.bfd.rel.citizen_dna
																			</td>
																			<td class="">
																				citizen_dna
																			</td>
																			<td class="ant-table-column-has-filters">
																				<span>
																					entity.citizen
																				</span>
																			</td>
																			<td class="ant-table-column-has-filters">
																				<span>
																					com.bfd.entity.dna
																				</span>
																			</td>
																			<td class="">
																				system
																			</td>
																			<td class="ant-table-column-has-filters">
																				<span>
																					2018-05-25
																				</span>
																			</td>
																			<td class="">
																				system
																			</td>
																			<td class="ant-table-column-has-filters">
																				<span>
																					2018-05-25
																				</span>
																			</td>
																			<td class="">
																				<div>
																					<div style="display: inline-block;">
																						<span>
																							<span class="line">
																								编辑
																							</span>
																							<span class="line">
																								|
																							</span>
																							&nbsp;
																						</span>
																					</div>
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
																				<span>
																					<i class="anticon anticon-arrow-right" style="color: rgb(30, 198, 89); font-size: 36px;">
																					</i>
																				</span>
																			</td>
																			<td class="">
																				com.bfd.rel.flight_flight_taking
																			</td>
																			<td class="">
																				flight_flight_taking
																			</td>
																			<td class="ant-table-column-has-filters">
																				<span>
																					com.bfd.entity.flight
																				</span>
																			</td>
																			<td class="ant-table-column-has-filters">
																				<span>
																					com.bfd.event.flight_taking
																				</span>
																			</td>
																			<td class="">
																				system
																			</td>
																			<td class="ant-table-column-has-filters">
																				<span>
																					2018-05-24
																				</span>
																			</td>
																			<td class="">
																				system
																			</td>
																			<td class="ant-table-column-has-filters">
																				<span>
																					2018-05-24
																				</span>
																			</td>
																			<td class="">
																				<div>
																					<div style="display: inline-block;">
																						<span>
																							<span class="line">
																								编辑
																							</span>
																							<span class="line">
																								|
																							</span>
																							&nbsp;
																						</span>
																					</div>
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
																				<span>
																					<i class="anticon anticon-arrow-right" style="color: rgb(30, 198, 89); font-size: 36px;">
																					</i>
																				</span>
																			</td>
																			<td class="">
																				com.bfd.rel.pd.peopleowncar
																			</td>
																			<td class="">
																				拥有
																			</td>
																			<td class="ant-table-column-has-filters">
																				<span>
																					com.bfd.entity.pd.person
																				</span>
																			</td>
																			<td class="ant-table-column-has-filters">
																				<span>
																					com.bfd.entity.pd.car
																				</span>
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
																					2018-05-18
																				</span>
																			</td>
																			<td class="">
																				<div>
																					<div style="display: inline-block;">
																						<span>
																							<span class="line">
																								编辑
																							</span>
																							<span class="line">
																								|
																							</span>
																							&nbsp;
																						</span>
																					</div>
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
													共 91 条
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
					</div>
@stop