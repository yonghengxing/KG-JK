@extends('template') @section('content')
<div class="ant-layout-content" style="margin: 10px 24px 0px; height: 100%;">
							<div style="min-height: calc(100vh - 260px);">
								<div>
									<div class="content_topp___3q-Gh">
										<a class="ic___3GrL3" href="http://kg.itechs.ac.cn/home" style="color: rgb(51, 51, 51);">
											<i class="anticon anticon-home">
											</i>
											动态知识图谱 /
										</a>
										<span class="ic___3GrL3">
											<i class="anticon anticon-folder-open">
											</i>
											数据注入 /
										</span>
										<a class="ic___3GrL3" href="http://kg.itechs.ac.cn/task-inject/task-his"
										style="color: rgb(51, 51, 51);">
											<i class="anticon anticon-file-text">
											</i>
											任务历史
										</a>
										<i class="anticon anticon-question-circle">
										</i>
									</div>
									<div class="con___3oWcA">
										<div class="content_model___GnhGK">
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
										<div class="ant-table-wrapper">
											<div class="ant-spin-nested-loading">
												<div class="ant-spin-container">
													<div class="ant-table ant-table-default ant-table-scroll-position-left">
														<div class="ant-table-content">
															<div class="ant-table-body">
																<table class="">
																	<colgroup>
																		<col style="width: 8%; min-width: 8%;">
																			<col style="width: 16%; min-width: 16%;">
																				<col style="width: 16%; min-width: 16%;">
																					<col style="width: 16%; min-width: 16%;">
																						<col style="width: 7%; min-width: 7%;">
																							<col style="width: 24%; min-width: 24%;">
																								<col>
																	</colgroup>
																	<thead class="ant-table-thead">
																		<tr>
																			<th class="">
																				<span>
																					序号
																				</span>
																			</th>
																			<th class="">
																				<span>
																					任务名称
																				</span>
																			</th>
																			<th class="ant-table-column-has-filters">
																				<span>
																					开始时间
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
																			<th class="ant-table-column-has-filters">
																				<span>
																					结束时间
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
																					执行者
																				</span>
																			</th>
																			<th class="ant-table-column-has-filters">
																				<span>
																					运行状态
																					<i class="fa fa-filter filter fa-1g ant-table-filter-icon ant-dropdown-trigger"
																					title="筛选" style="color: rgb(0, 0, 0);">
																					</i>
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
																				2661
																			</td>
																			<td class="">
																				suspicion_commit_case
																			</td>
																			<td class="ant-table-column-has-filters">
																				<span>
																					2018-12-25 10:47:02
																				</span>
																			</td>
																			<td class="ant-table-column-has-filters">
																				<span>
																					2018-12-25 10:48:15
																				</span>
																			</td>
																			<td class="">
																				admin
																			</td>
																			<td class="ant-table-column-has-filters">
																				<div class="ant-progress ant-progress-line ant-progress-status-success ant-progress-show-info ant-progress-default">
																					<div>
																						<div class="ant-progress-outer">
																							<div class="ant-progress-inner">
																								<div class="ant-progress-bg" style="width: 100%; height: 8px;">
																								</div>
																							</div>
																						</div>
																						<span class="ant-progress-text">
																							<i class="anticon anticon-check-circle">
																							</i>
																						</span>
																					</div>
																				</div>
																			</td>
																			<td class="">
																				<span>
																					<div style="display: inline-block;">
																						<span>
																							<span class="line">
																								执行详情
																							</span>
																						</span>
																					</div>
																				</span>
																			</td>
																		</tr>
																		<tr class="ant-table-row  ant-table-row-level-0">
																			<td class="">
																				<span class="ant-table-row-indent indent-level-0" style="padding-left: 0px;">
																				</span>
																				2660
																			</td>
																			<td class="">
																				import.entity.case_car
																			</td>
																			<td class="ant-table-column-has-filters">
																				<span>
																					2018-12-25 10:45:20
																				</span>
																			</td>
																			<td class="ant-table-column-has-filters">
																				<span>
																					2018-12-25 10:47:31
																				</span>
																			</td>
																			<td class="">
																				admin
																			</td>
																			<td class="ant-table-column-has-filters">
																				<div class="ant-progress ant-progress-line ant-progress-status-success ant-progress-show-info ant-progress-default">
																					<div>
																						<div class="ant-progress-outer">
																							<div class="ant-progress-inner">
																								<div class="ant-progress-bg" style="width: 100%; height: 8px;">
																								</div>
																							</div>
																						</div>
																						<span class="ant-progress-text">
																							<i class="anticon anticon-check-circle">
																							</i>
																						</span>
																					</div>
																				</div>
																			</td>
																			<td class="">
																				<span>
																					<div style="display: inline-block;">
																						<span>
																							<span class="line">
																								执行详情
																							</span>
																						</span>
																					</div>
																				</span>
																			</td>
																		</tr>
																		<tr class="ant-table-row  ant-table-row-level-0">
																			<td class="">
																				<span class="ant-table-row-indent indent-level-0" style="padding-left: 0px;">
																				</span>
																				2659
																			</td>
																			<td class="">
																				import.entity.goods
																			</td>
																			<td class="ant-table-column-has-filters">
																				<span>
																					2018-12-25 10:45:11
																				</span>
																			</td>
																			<td class="ant-table-column-has-filters">
																				<span>
																					2018-12-25 10:47:24
																				</span>
																			</td>
																			<td class="">
																				admin
																			</td>
																			<td class="ant-table-column-has-filters">
																				<div class="ant-progress ant-progress-line ant-progress-status-success ant-progress-show-info ant-progress-default">
																					<div>
																						<div class="ant-progress-outer">
																							<div class="ant-progress-inner">
																								<div class="ant-progress-bg" style="width: 100%; height: 8px;">
																								</div>
																							</div>
																						</div>
																						<span class="ant-progress-text">
																							<i class="anticon anticon-check-circle">
																							</i>
																						</span>
																					</div>
																				</div>
																			</td>
																			<td class="">
																				<span>
																					<div style="display: inline-block;">
																						<span>
																							<span class="line">
																								执行详情
																							</span>
																						</span>
																					</div>
																				</span>
																			</td>
																		</tr>
																		<tr class="ant-table-row  ant-table-row-level-0">
																			<td class="">
																				<span class="ant-table-row-indent indent-level-0" style="padding-left: 0px;">
																				</span>
																				2658
																			</td>
																			<td class="">
																				import.relation.citizen_criminal
																			</td>
																			<td class="ant-table-column-has-filters">
																				<span>
																					2018-12-25 10:44:54
																				</span>
																			</td>
																			<td class="ant-table-column-has-filters">
																				<span>
																					2018-12-25 10:46:09
																				</span>
																			</td>
																			<td class="">
																				admin
																			</td>
																			<td class="ant-table-column-has-filters">
																				<div class="ant-progress ant-progress-line ant-progress-status-success ant-progress-show-info ant-progress-default">
																					<div>
																						<div class="ant-progress-outer">
																							<div class="ant-progress-inner">
																								<div class="ant-progress-bg" style="width: 100%; height: 8px;">
																								</div>
																							</div>
																						</div>
																						<span class="ant-progress-text">
																							<i class="anticon anticon-check-circle">
																							</i>
																						</span>
																					</div>
																				</div>
																			</td>
																			<td class="">
																				<span>
																					<div style="display: inline-block;">
																						<span>
																							<span class="line">
																								执行详情
																							</span>
																						</span>
																					</div>
																				</span>
																			</td>
																		</tr>
																		<tr class="ant-table-row  ant-table-row-level-0">
																			<td class="">
																				<span class="ant-table-row-indent indent-level-0" style="padding-left: 0px;">
																				</span>
																				2657
																			</td>
																			<td class="">
																				import.relation.citizen_victim
																			</td>
																			<td class="ant-table-column-has-filters">
																				<span>
																					2018-12-25 10:44:53
																				</span>
																			</td>
																			<td class="ant-table-column-has-filters">
																				<span>
																					2018-12-25 10:46:09
																				</span>
																			</td>
																			<td class="">
																				admin
																			</td>
																			<td class="ant-table-column-has-filters">
																				<div class="ant-progress ant-progress-line ant-progress-status-success ant-progress-show-info ant-progress-default">
																					<div>
																						<div class="ant-progress-outer">
																							<div class="ant-progress-inner">
																								<div class="ant-progress-bg" style="width: 100%; height: 8px;">
																								</div>
																							</div>
																						</div>
																						<span class="ant-progress-text">
																							<i class="anticon anticon-check-circle">
																							</i>
																						</span>
																					</div>
																				</div>
																			</td>
																			<td class="">
																				<span>
																					<div style="display: inline-block;">
																						<span>
																							<span class="line">
																								执行详情
																							</span>
																						</span>
																					</div>
																				</span>
																			</td>
																		</tr>
																		<tr class="ant-table-row  ant-table-row-level-0">
																			<td class="">
																				<span class="ant-table-row-indent indent-level-0" style="padding-left: 0px;">
																				</span>
																				2656
																			</td>
																			<td class="">
																				import.relation.citizen_suspicion
																			</td>
																			<td class="ant-table-column-has-filters">
																				<span>
																					2018-12-25 10:44:41
																				</span>
																			</td>
																			<td class="ant-table-column-has-filters">
																				<span>
																					2018-12-25 10:45:55
																				</span>
																			</td>
																			<td class="">
																				admin
																			</td>
																			<td class="ant-table-column-has-filters">
																				<div class="ant-progress ant-progress-line ant-progress-status-success ant-progress-show-info ant-progress-default">
																					<div>
																						<div class="ant-progress-outer">
																							<div class="ant-progress-inner">
																								<div class="ant-progress-bg" style="width: 100%; height: 8px;">
																								</div>
																							</div>
																						</div>
																						<span class="ant-progress-text">
																							<i class="anticon anticon-check-circle">
																							</i>
																						</span>
																					</div>
																				</div>
																			</td>
																			<td class="">
																				<span>
																					<div style="display: inline-block;">
																						<span>
																							<span class="line">
																								执行详情
																							</span>
																						</span>
																					</div>
																				</span>
																			</td>
																		</tr>
																		<tr class="ant-table-row  ant-table-row-level-0">
																			<td class="">
																				<span class="ant-table-row-indent indent-level-0" style="padding-left: 0px;">
																				</span>
																				2655
																			</td>
																			<td class="">
																				import.entity.citizen
																			</td>
																			<td class="ant-table-column-has-filters">
																				<span>
																					2018-12-25 10:44:34
																				</span>
																			</td>
																			<td class="ant-table-column-has-filters">
																				<span>
																					2018-12-25 10:45:49
																				</span>
																			</td>
																			<td class="">
																				admin
																			</td>
																			<td class="ant-table-column-has-filters">
																				<div class="ant-progress ant-progress-line ant-progress-status-success ant-progress-show-info ant-progress-default">
																					<div>
																						<div class="ant-progress-outer">
																							<div class="ant-progress-inner">
																								<div class="ant-progress-bg" style="width: 100%; height: 8px;">
																								</div>
																							</div>
																						</div>
																						<span class="ant-progress-text">
																							<i class="anticon anticon-check-circle">
																							</i>
																						</span>
																					</div>
																				</div>
																			</td>
																			<td class="">
																				<span>
																					<div style="display: inline-block;">
																						<span>
																							<span class="line">
																								执行详情
																							</span>
																						</span>
																					</div>
																				</span>
																			</td>
																		</tr>
																		<tr class="ant-table-row  ant-table-row-level-0">
																			<td class="">
																				<span class="ant-table-row-indent indent-level-0" style="padding-left: 0px;">
																				</span>
																				2654
																			</td>
																			<td class="">
																				tranfer1
																			</td>
																			<td class="ant-table-column-has-filters">
																				<span>
																					2018-12-25 10:01:07
																				</span>
																			</td>
																			<td class="ant-table-column-has-filters">
																				<span>
																					2018-12-25 10:01:36
																				</span>
																			</td>
																			<td class="">
																				admin
																			</td>
																			<td class="ant-table-column-has-filters">
																				<div class="ant-progress ant-progress-line ant-progress-status-success ant-progress-show-info ant-progress-default">
																					<div>
																						<div class="ant-progress-outer">
																							<div class="ant-progress-inner">
																								<div class="ant-progress-bg" style="width: 100%; height: 8px;">
																								</div>
																							</div>
																						</div>
																						<span class="ant-progress-text">
																							<i class="anticon anticon-check-circle">
																							</i>
																						</span>
																					</div>
																				</div>
																			</td>
																			<td class="">
																				<span>
																					<div style="display: inline-block;">
																						<span>
																							<span class="line">
																								执行详情
																							</span>
																						</span>
																					</div>
																				</span>
																			</td>
																		</tr>
																		<tr class="ant-table-row  ant-table-row-level-0">
																			<td class="">
																				<span class="ant-table-row-indent indent-level-0" style="padding-left: 0px;">
																				</span>
																				2653
																			</td>
																			<td class="">
																				merge
																			</td>
																			<td class="ant-table-column-has-filters">
																				————
																			</td>
																			<td class="ant-table-column-has-filters">
																				————
																			</td>
																			<td class="">
																				admin
																			</td>
																			<td class="ant-table-column-has-filters">
																				<div data-index="8" style="display: inline-block; width: 100%;">
																					<div class="ant-progress ant-progress-line ant-progress-status-normal ant-progress-default">
																						<div>
																							<div class="ant-progress-outer">
																								<div class="ant-progress-inner">
																									<div class="ant-progress-bg" style="width: 0%; height: 8px;">
																									</div>
																								</div>
																							</div>
																						</div>
																					</div>
																				</div>
																			</td>
																			<td class="">
																				<span>
																					<div style="display: inline-block;">
																						<span>
																							<span class="line">
																								执行详情
																							</span>
																						</span>
																					</div>
																				</span>
																			</td>
																		</tr>
																		<tr class="ant-table-row  ant-table-row-level-0">
																			<td class="">
																				<span class="ant-table-row-indent indent-level-0" style="padding-left: 0px;">
																				</span>
																				2652
																			</td>
																			<td class="">
																				merge
																			</td>
																			<td class="ant-table-column-has-filters">
																				<span>
																					2018-12-25 10:01:04
																				</span>
																			</td>
																			<td class="ant-table-column-has-filters">
																				<span>
																					2018-12-25 10:01:06
																				</span>
																			</td>
																			<td class="">
																				admin
																			</td>
																			<td class="ant-table-column-has-filters">
																				<div class="ant-progress ant-progress-line ant-progress-status-normal ant-progress-show-info ant-progress-default">
																					<div>
																						<div class="ant-progress-outer">
																							<div class="ant-progress-inner">
																								<div class="ant-progress-bg" style="width: 1%; height: 8px;">
																								</div>
																							</div>
																						</div>
																						<span class="ant-progress-text">
																							1%
																						</span>
																					</div>
																				</div>
																			</td>
																			<td class="">
																				<span>
																					<div style="display: inline-block;">
																						<span>
																							<span class="line">
																								执行详情
																							</span>
																						</span>
																					</div>
																				</span>
																			</td>
																		</tr>
																		<tr class="ant-table-row  ant-table-row-level-0">
																			<td class="">
																				<span class="ant-table-row-indent indent-level-0" style="padding-left: 0px;">
																				</span>
																				2651
																			</td>
																			<td class="">
																				import.entity.id_check_device
																			</td>
																			<td class="ant-table-column-has-filters">
																				<span>
																					2018-12-21 17:51:40
																				</span>
																			</td>
																			<td class="ant-table-column-has-filters">
																				<span>
																					2018-12-21 17:52:31
																				</span>
																			</td>
																			<td class="">
																				admin
																			</td>
																			<td class="ant-table-column-has-filters">
																				<div class="ant-progress ant-progress-line ant-progress-status-success ant-progress-show-info ant-progress-default">
																					<div>
																						<div class="ant-progress-outer">
																							<div class="ant-progress-inner">
																								<div class="ant-progress-bg" style="width: 100%; height: 8px;">
																								</div>
																							</div>
																						</div>
																						<span class="ant-progress-text">
																							<i class="anticon anticon-check-circle">
																							</i>
																						</span>
																					</div>
																				</div>
																			</td>
																			<td class="">
																				<span>
																					<div style="display: inline-block;">
																						<span>
																							<span class="line">
																								执行详情
																							</span>
																						</span>
																					</div>
																				</span>
																			</td>
																		</tr>
																		<tr class="ant-table-row  ant-table-row-level-0">
																			<td class="">
																				<span class="ant-table-row-indent indent-level-0" style="padding-left: 0px;">
																				</span>
																				2650
																			</td>
																			<td class="">
																				import.event.id_check
																			</td>
																			<td class="ant-table-column-has-filters">
																				<span>
																					2018-12-21 17:51:37
																				</span>
																			</td>
																			<td class="ant-table-column-has-filters">
																				<span>
																					2018-12-21 17:52:03
																				</span>
																			</td>
																			<td class="">
																				admin
																			</td>
																			<td class="ant-table-column-has-filters">
																				<div class="ant-progress ant-progress-line ant-progress-status-success ant-progress-show-info ant-progress-default">
																					<div>
																						<div class="ant-progress-outer">
																							<div class="ant-progress-inner">
																								<div class="ant-progress-bg" style="width: 100%; height: 8px;">
																								</div>
																							</div>
																						</div>
																						<span class="ant-progress-text">
																							<i class="anticon anticon-check-circle">
																							</i>
																						</span>
																					</div>
																				</div>
																			</td>
																			<td class="">
																				<span>
																					<div style="display: inline-block;">
																						<span>
																							<span class="line">
																								执行详情
																							</span>
																						</span>
																					</div>
																				</span>
																			</td>
																		</tr>
																		<tr class="ant-table-row  ant-table-row-level-0">
																			<td class="">
																				<span class="ant-table-row-indent indent-level-0" style="padding-left: 0px;">
																				</span>
																				2649
																			</td>
																			<td class="">
																				import.entity.citizen
																			</td>
																			<td class="ant-table-column-has-filters">
																				<span>
																					2018-12-21 17:51:27
																				</span>
																			</td>
																			<td class="ant-table-column-has-filters">
																				<span>
																					2018-12-21 17:52:44
																				</span>
																			</td>
																			<td class="">
																				admin
																			</td>
																			<td class="ant-table-column-has-filters">
																				<div class="ant-progress ant-progress-line ant-progress-status-success ant-progress-show-info ant-progress-default">
																					<div>
																						<div class="ant-progress-outer">
																							<div class="ant-progress-inner">
																								<div class="ant-progress-bg" style="width: 100%; height: 8px;">
																								</div>
																							</div>
																						</div>
																						<span class="ant-progress-text">
																							<i class="anticon anticon-check-circle">
																							</i>
																						</span>
																					</div>
																				</div>
																			</td>
																			<td class="">
																				<span>
																					<div style="display: inline-block;">
																						<span>
																							<span class="line">
																								执行详情
																							</span>
																						</span>
																					</div>
																				</span>
																			</td>
																		</tr>
																		<tr class="ant-table-row  ant-table-row-level-0">
																			<td class="">
																				<span class="ant-table-row-indent indent-level-0" style="padding-left: 0px;">
																				</span>
																				2648
																			</td>
																			<td class="">
																				import.entity.passport
																			</td>
																			<td class="ant-table-column-has-filters">
																				<span>
																					2018-12-21 15:15:14
																				</span>
																			</td>
																			<td class="ant-table-column-has-filters">
																				<span>
																					2018-12-21 15:15:39
																				</span>
																			</td>
																			<td class="">
																				admin
																			</td>
																			<td class="ant-table-column-has-filters">
																				<div class="ant-progress ant-progress-line ant-progress-status-success ant-progress-show-info ant-progress-default">
																					<div>
																						<div class="ant-progress-outer">
																							<div class="ant-progress-inner">
																								<div class="ant-progress-bg" style="width: 100%; height: 8px;">
																								</div>
																							</div>
																						</div>
																						<span class="ant-progress-text">
																							<i class="anticon anticon-check-circle">
																							</i>
																						</span>
																					</div>
																				</div>
																			</td>
																			<td class="">
																				<span>
																					<div style="display: inline-block;">
																						<span>
																							<span class="line">
																								执行详情
																							</span>
																						</span>
																					</div>
																				</span>
																			</td>
																		</tr>
																		<tr class="ant-table-row  ant-table-row-level-0">
																			<td class="">
																				<span class="ant-table-row-indent indent-level-0" style="padding-left: 0px;">
																				</span>
																				2647
																			</td>
																			<td class="">
																				import.entity.passport
																			</td>
																			<td class="ant-table-column-has-filters">
																				<span>
																					2018-12-21 14:51:58
																				</span>
																			</td>
																			<td class="ant-table-column-has-filters">
																				<span>
																					2018-12-21 14:52:23
																				</span>
																			</td>
																			<td class="">
																				admin
																			</td>
																			<td class="ant-table-column-has-filters">
																				<div class="ant-progress ant-progress-line ant-progress-status-success ant-progress-show-info ant-progress-default">
																					<div>
																						<div class="ant-progress-outer">
																							<div class="ant-progress-inner">
																								<div class="ant-progress-bg" style="width: 100%; height: 8px;">
																								</div>
																							</div>
																						</div>
																						<span class="ant-progress-text">
																							<i class="anticon anticon-check-circle">
																							</i>
																						</span>
																					</div>
																				</div>
																			</td>
																			<td class="">
																				<span>
																					<div style="display: inline-block;">
																						<span>
																							<span class="line">
																								执行详情
																							</span>
																						</span>
																					</div>
																				</span>
																			</td>
																		</tr>
																		<tr class="ant-table-row  ant-table-row-level-0">
																			<td class="">
																				<span class="ant-table-row-indent indent-level-0" style="padding-left: 0px;">
																				</span>
																				2646
																			</td>
																			<td class="">
																				citizen_immigration_inspection
																			</td>
																			<td class="ant-table-column-has-filters">
																				<span>
																					2018-12-21 14:08:12
																				</span>
																			</td>
																			<td class="ant-table-column-has-filters">
																				<span>
																					2018-12-21 14:09:28
																				</span>
																			</td>
																			<td class="">
																				admin
																			</td>
																			<td class="ant-table-column-has-filters">
																				<div class="ant-progress ant-progress-line ant-progress-status-success ant-progress-show-info ant-progress-default">
																					<div>
																						<div class="ant-progress-outer">
																							<div class="ant-progress-inner">
																								<div class="ant-progress-bg" style="width: 100%; height: 8px;">
																								</div>
																							</div>
																						</div>
																						<span class="ant-progress-text">
																							<i class="anticon anticon-check-circle">
																							</i>
																						</span>
																					</div>
																				</div>
																			</td>
																			<td class="">
																				<span>
																					<div style="display: inline-block;">
																						<span>
																							<span class="line">
																								执行详情
																							</span>
																						</span>
																					</div>
																				</span>
																			</td>
																		</tr>
																		<tr class="ant-table-row  ant-table-row-level-0">
																			<td class="">
																				<span class="ant-table-row-indent indent-level-0" style="padding-left: 0px;">
																				</span>
																				2645
																			</td>
																			<td class="">
																				immigration_inspection
																			</td>
																			<td class="ant-table-column-has-filters">
																				<span>
																					2018-12-21 14:08:09
																				</span>
																			</td>
																			<td class="ant-table-column-has-filters">
																				<span>
																					2018-12-21 14:08:37
																				</span>
																			</td>
																			<td class="">
																				admin
																			</td>
																			<td class="ant-table-column-has-filters">
																				<div class="ant-progress ant-progress-line ant-progress-status-success ant-progress-show-info ant-progress-default">
																					<div>
																						<div class="ant-progress-outer">
																							<div class="ant-progress-inner">
																								<div class="ant-progress-bg" style="width: 100%; height: 8px;">
																								</div>
																							</div>
																						</div>
																						<span class="ant-progress-text">
																							<i class="anticon anticon-check-circle">
																							</i>
																						</span>
																					</div>
																				</div>
																			</td>
																			<td class="">
																				<span>
																					<div style="display: inline-block;">
																						<span>
																							<span class="line">
																								执行详情
																							</span>
																						</span>
																					</div>
																				</span>
																			</td>
																		</tr>
																		<tr class="ant-table-row  ant-table-row-level-0">
																			<td class="">
																				<span class="ant-table-row-indent indent-level-0" style="padding-left: 0px;">
																				</span>
																				2644
																			</td>
																			<td class="">
																				import.relation.id_check_device
																			</td>
																			<td class="ant-table-column-has-filters">
																				<span>
																					2018-12-21 11:38:16
																				</span>
																			</td>
																			<td class="ant-table-column-has-filters">
																				<span>
																					2018-12-21 11:39:05
																				</span>
																			</td>
																			<td class="">
																				admin
																			</td>
																			<td class="ant-table-column-has-filters">
																				<div class="ant-progress ant-progress-line ant-progress-status-success ant-progress-show-info ant-progress-default">
																					<div>
																						<div class="ant-progress-outer">
																							<div class="ant-progress-inner">
																								<div class="ant-progress-bg" style="width: 100%; height: 8px;">
																								</div>
																							</div>
																						</div>
																						<span class="ant-progress-text">
																							<i class="anticon anticon-check-circle">
																							</i>
																						</span>
																					</div>
																				</div>
																			</td>
																			<td class="">
																				<span>
																					<div style="display: inline-block;">
																						<span>
																							<span class="line">
																								执行详情
																							</span>
																						</span>
																					</div>
																				</span>
																			</td>
																		</tr>
																		<tr class="ant-table-row  ant-table-row-level-0">
																			<td class="">
																				<span class="ant-table-row-indent indent-level-0" style="padding-left: 0px;">
																				</span>
																				2643
																			</td>
																			<td class="">
																				import.relation.identification_id_check
																			</td>
																			<td class="ant-table-column-has-filters">
																				<span>
																					2018-12-21 11:34:20
																				</span>
																			</td>
																			<td class="ant-table-column-has-filters">
																				<span>
																					2018-12-21 11:35:33
																				</span>
																			</td>
																			<td class="">
																				admin
																			</td>
																			<td class="ant-table-column-has-filters">
																				<div class="ant-progress ant-progress-line ant-progress-status-success ant-progress-show-info ant-progress-default">
																					<div>
																						<div class="ant-progress-outer">
																							<div class="ant-progress-inner">
																								<div class="ant-progress-bg" style="width: 100%; height: 8px;">
																								</div>
																							</div>
																						</div>
																						<span class="ant-progress-text">
																							<i class="anticon anticon-check-circle">
																							</i>
																						</span>
																					</div>
																				</div>
																			</td>
																			<td class="">
																				<span>
																					<div style="display: inline-block;">
																						<span>
																							<span class="line">
																								执行详情
																							</span>
																						</span>
																					</div>
																				</span>
																			</td>
																		</tr>
																		<tr class="ant-table-row  ant-table-row-level-0">
																			<td class="">
																				<span class="ant-table-row-indent indent-level-0" style="padding-left: 0px;">
																				</span>
																				2642
																			</td>
																			<td class="">
																				import.event.id_check
																			</td>
																			<td class="ant-table-column-has-filters">
																				<span>
																					2018-12-21 11:32:56
																				</span>
																			</td>
																			<td class="ant-table-column-has-filters">
																				<span>
																					2018-12-21 11:33:22
																				</span>
																			</td>
																			<td class="">
																				admin
																			</td>
																			<td class="ant-table-column-has-filters">
																				<div class="ant-progress ant-progress-line ant-progress-status-success ant-progress-show-info ant-progress-default">
																					<div>
																						<div class="ant-progress-outer">
																							<div class="ant-progress-inner">
																								<div class="ant-progress-bg" style="width: 100%; height: 8px;">
																								</div>
																							</div>
																						</div>
																						<span class="ant-progress-text">
																							<i class="anticon anticon-check-circle">
																							</i>
																						</span>
																					</div>
																				</div>
																			</td>
																			<td class="">
																				<span>
																					<div style="display: inline-block;">
																						<span>
																							<span class="line">
																								执行详情
																							</span>
																						</span>
																					</div>
																				</span>
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
																		成功
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
																		失败
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
																		执行中
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
													共 1245 条
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
												<li title="5" class="ant-pagination-item ant-pagination-item-5 ant-pagination-item-before-jump-next"
												tabindex="0">
													<a>
														5
													</a>
												</li>
												<li title="向后 5 页" tabindex="0" class="ant-pagination-jump-next">
													<a class="ant-pagination-item-link">
													</a>
												</li>
												<li title="63" class="ant-pagination-item ant-pagination-item-63" tabindex="0">
													<a>
														63
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