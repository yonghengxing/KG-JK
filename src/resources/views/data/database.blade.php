@extends('template') @section('content')
<div class="ant-layout-content" style="margin: 10px 24px 0px; height: 100%;">
							<div style="min-height: calc(100vh - 260px);">
								<div class="bfd_entity_datasource">
									<div class="content_topp___VYiDL">
										<a class="ic___1EXVm" href="http://kg.itechs.ac.cn/home" style="color: rgb(51, 51, 51);">
											<i class="anticon anticon-home">
											</i>
											动态知识图谱 /
										</a>
										<span class="ic___1EXVm">
											<i class="anticon anticon-folder-open">
											</i>
											数据配置 /
										</span>
										<a class="ic___1EXVm" href="http://kg.itechs.ac.cn/datasource-conf/database"
										style="color: rgb(51, 51, 51);">
											<i class="anticon anticon-file-text">
											</i>
											数据库
										</a>
										<i class="anticon anticon-question-circle">
										</i>
									</div>
									<div class="con___3D5Lw">
										<div class="content_model___2asmB">
											<span>
												<span>
													<button type="button" class="ant-btn ant-btn-primary">
														<span>
															添加数据库
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
																		<col style="width: 9%; min-width: 9%;">
																			<col style="width: 12%; min-width: 12%;">
																				<col style="width: 9%; min-width: 9%;">
																					<col style="width: 6%; min-width: 6%;">
																						<col style="width: 9%; min-width: 9%;">
																							<col style="width: 6%; min-width: 6%;">
																								<col style="width: 6%; min-width: 6%;">
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
																					名称
																				</span>
																			</th>
																			<th class="ant-table-column-has-filters">
																				<span>
																					数据库类型
																					<i class="fa fa-filter filter fa-1g ant-table-filter-icon ant-dropdown-trigger"
																					title="筛选" style="color: rgb(0, 0, 0);">
																					</i>
																				</span>
																			</th>
																			<th class="">
																				<span>
																					IP地址
																				</span>
																			</th>
																			<th class="">
																				<span>
																					端口
																				</span>
																			</th>
																			<th class="">
																				<span>
																					数据库
																				</span>
																			</th>
																			<th class="">
																				<span>
																					用户名
																				</span>
																			</th>
																			<th class="">
																				<span>
																					密码
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
																				k007_dw_dev
																			</td>
																			<td class="ant-table-column-has-filters">
																				Hive
																			</td>
																			<td class="">
																				192.168.40.119
																			</td>
																			<td class="">
																				10000
																			</td>
																			<td class="">
																				k007_dw
																			</td>
																			<td class="">
																				k007
																			</td>
																			<td class="">
																				<span>
																					******
																				</span>
																			</td>
																			<td class="">
																				system
																			</td>
																			<td class="ant-table-column-has-filters">
																				<span>
																					2018-06-11
																				</span>
																			</td>
																			<td class="">
																				<span>
																					system
																				</span>
																			</td>
																			<td class="ant-table-column-has-filters">
																				<span>
																					2018-12-01
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
																				k007_ods_dev
																			</td>
																			<td class="ant-table-column-has-filters">
																				Hive
																			</td>
																			<td class="">
																				192.168.40.119
																			</td>
																			<td class="">
																				10000
																			</td>
																			<td class="">
																				k007_ods
																			</td>
																			<td class="">
																				k007
																			</td>
																			<td class="">
																				<span>
																					******
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
																				<span>
																					system
																				</span>
																			</td>
																			<td class="ant-table-column-has-filters">
																				<span>
																					2018-12-01
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
																				phoneCall
																			</td>
																			<td class="ant-table-column-has-filters">
																				MySQL
																			</td>
																			<td class="">
																				192.168.162.105
																			</td>
																			<td class="">
																				3306
																			</td>
																			<td class="">
																				website
																			</td>
																			<td class="">
																				root
																			</td>
																			<td class="">
																				<span>
																					******
																				</span>
																			</td>
																			<td class="">
																				system
																			</td>
																			<td class="ant-table-column-has-filters">
																				<span>
																					2018-11-19
																				</span>
																			</td>
																			<td class="">
																				<span>
																					system
																				</span>
																			</td>
																			<td class="ant-table-column-has-filters">
																				<span>
																					2018-11-19
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
																				my_test
																			</td>
																			<td class="ant-table-column-has-filters">
																				MySQL
																			</td>
																			<td class="">
																				192.168.40.117
																			</td>
																			<td class="">
																				3306
																			</td>
																			<td class="">
																				my_test
																			</td>
																			<td class="">
																				k007_ods
																			</td>
																			<td class="">
																				<span>
																					******
																				</span>
																			</td>
																			<td class="">
																				system
																			</td>
																			<td class="ant-table-column-has-filters">
																				<span>
																					2018-09-20
																				</span>
																			</td>
																			<td class="">
																				<span>
																					system
																				</span>
																			</td>
																			<td class="ant-table-column-has-filters">
																				<span>
																					2018-09-20
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
																				demoDataSource
																			</td>
																			<td class="ant-table-column-has-filters">
																				MySQL
																			</td>
																			<td class="">
																				172.16.3.166
																			</td>
																			<td class="">
																				3306
																			</td>
																			<td class="">
																				upload
																			</td>
																			<td class="">
																				upload
																			</td>
																			<td class="">
																				<span>
																					******
																				</span>
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
																				<span>
																					system
																				</span>
																			</td>
																			<td class="ant-table-column-has-filters">
																				<span>
																					2018-08-09
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
																				zhang
																			</td>
																			<td class="ant-table-column-has-filters">
																				MySQL
																			</td>
																			<td class="">
																				172.24.8.34
																			</td>
																			<td class="">
																				3306
																			</td>
																			<td class="">
																				2018626test
																			</td>
																			<td class="">
																				root
																			</td>
																			<td class="">
																				<span>
																					******
																				</span>
																			</td>
																			<td class="">
																				system
																			</td>
																			<td class="ant-table-column-has-filters">
																				<span>
																					2018-08-08
																				</span>
																			</td>
																			<td class="">
																				<span>
																					system
																				</span>
																			</td>
																			<td class="ant-table-column-has-filters">
																				<span>
																					2018-08-08
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
																				register
																			</td>
																			<td class="ant-table-column-has-filters">
																				MySQL
																			</td>
																			<td class="">
																				192.168.40.117
																			</td>
																			<td class="">
																				3306
																			</td>
																			<td class="">
																				network_behavior
																			</td>
																			<td class="">
																				k007_ods
																			</td>
																			<td class="">
																				<span>
																					******
																				</span>
																			</td>
																			<td class="">
																				system
																			</td>
																			<td class="ant-table-column-has-filters">
																				<span>
																					2018-07-24
																				</span>
																			</td>
																			<td class="">
																				<span>
																					system
																				</span>
																			</td>
																			<td class="ant-table-column-has-filters">
																				<span>
																					2018-07-24
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
																				network_behavior
																			</td>
																			<td class="ant-table-column-has-filters">
																				MySQL
																			</td>
																			<td class="">
																				192.168.40.117
																			</td>
																			<td class="">
																				3306
																			</td>
																			<td class="">
																				network_behavior
																			</td>
																			<td class="">
																				k007_ods
																			</td>
																			<td class="">
																				<span>
																					******
																				</span>
																			</td>
																			<td class="">
																				system
																			</td>
																			<td class="ant-table-column-has-filters">
																				<span>
																					2018-07-24
																				</span>
																			</td>
																			<td class="">
																				<span>
																					system
																				</span>
																			</td>
																			<td class="ant-table-column-has-filters">
																				<span>
																					2018-07-24
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
																				test620
																			</td>
																			<td class="ant-table-column-has-filters">
																				MySQL
																			</td>
																			<td class="">
																				172.16.3.166
																			</td>
																			<td class="">
																				3306
																			</td>
																			<td class="">
																				demo_person
																			</td>
																			<td class="">
																				k007
																			</td>
																			<td class="">
																				<span>
																					******
																				</span>
																			</td>
																			<td class="">
																				system
																			</td>
																			<td class="ant-table-column-has-filters">
																				<span>
																					2018-06-20
																				</span>
																			</td>
																			<td class="">
																				<span>
																					system
																				</span>
																			</td>
																			<td class="ant-table-column-has-filters">
																				<span>
																					2018-06-20
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
																				hdhtests
																			</td>
																			<td class="ant-table-column-has-filters">
																				Hive
																			</td>
																			<td class="">
																				192.168.40.119
																			</td>
																			<td class="">
																				10000
																			</td>
																			<td class="">
																				k007_ods
																			</td>
																			<td class="">
																				k007
																			</td>
																			<td class="">
																				<span>
																					******
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
																				<span>
																					system
																				</span>
																			</td>
																			<td class="ant-table-column-has-filters">
																				<span>
																					2018-05-30
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
																				strea_transfer
																			</td>
																			<td class="ant-table-column-has-filters">
																				CSV
																			</td>
																			<td class="">
																				172.16.3.166
																			</td>
																			<td class="">
																				3306
																			</td>
																			<td class="">
																				upload
																			</td>
																			<td class="">
																				upload
																			</td>
																			<td class="">
																				<span>
																					******
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
																				<span>
																					system
																				</span>
																			</td>
																			<td class="ant-table-column-has-filters">
																				<span>
																					2018-05-29
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
																				stream_transfer_out
																			</td>
																			<td class="ant-table-column-has-filters">
																				CSV
																			</td>
																			<td class="">
																				172.16.3.166
																			</td>
																			<td class="">
																				3306
																			</td>
																			<td class="">
																				upload
																			</td>
																			<td class="">
																				upload
																			</td>
																			<td class="">
																				<span>
																					******
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
																				<span>
																					system
																				</span>
																			</td>
																			<td class="ant-table-column-has-filters">
																				<span>
																					2018-05-29
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
																				stream_transfer_in
																			</td>
																			<td class="ant-table-column-has-filters">
																				CSV
																			</td>
																			<td class="">
																				172.16.3.166
																			</td>
																			<td class="">
																				3306
																			</td>
																			<td class="">
																				upload
																			</td>
																			<td class="">
																				upload
																			</td>
																			<td class="">
																				<span>
																					******
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
																				<span>
																					system
																				</span>
																			</td>
																			<td class="ant-table-column-has-filters">
																				<span>
																					2018-05-29
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
																				data_telephone_two
																			</td>
																			<td class="ant-table-column-has-filters">
																				CSV
																			</td>
																			<td class="">
																				172.16.3.166
																			</td>
																			<td class="">
																				3306
																			</td>
																			<td class="">
																				upload
																			</td>
																			<td class="">
																				upload
																			</td>
																			<td class="">
																				<span>
																					******
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
																				<span>
																					system
																				</span>
																			</td>
																			<td class="ant-table-column-has-filters">
																				<span>
																					2018-05-29
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
																				stream_account
																			</td>
																			<td class="ant-table-column-has-filters">
																				CSV
																			</td>
																			<td class="">
																				172.16.3.166
																			</td>
																			<td class="">
																				3306
																			</td>
																			<td class="">
																				upload
																			</td>
																			<td class="">
																				upload
																			</td>
																			<td class="">
																				<span>
																					******
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
																				<span>
																					system
																				</span>
																			</td>
																			<td class="ant-table-column-has-filters">
																				<span>
																					2018-05-29
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
																				data_telephone
																			</td>
																			<td class="ant-table-column-has-filters">
																				CSV
																			</td>
																			<td class="">
																				172.16.3.166
																			</td>
																			<td class="">
																				3306
																			</td>
																			<td class="">
																				upload
																			</td>
																			<td class="">
																				upload
																			</td>
																			<td class="">
																				<span>
																					******
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
																				<span>
																					system
																				</span>
																			</td>
																			<td class="ant-table-column-has-filters">
																				<span>
																					2018-05-29
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
																				bearTest_telephone
																			</td>
																			<td class="ant-table-column-has-filters">
																				CSV
																			</td>
																			<td class="">
																				172.16.3.166
																			</td>
																			<td class="">
																				3306
																			</td>
																			<td class="">
																				upload
																			</td>
																			<td class="">
																				upload
																			</td>
																			<td class="">
																				<span>
																					******
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
																				<span>
																					system
																				</span>
																			</td>
																			<td class="ant-table-column-has-filters">
																				<span>
																					2018-05-22
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
																				bearTest_creditCard
																			</td>
																			<td class="ant-table-column-has-filters">
																				CSV
																			</td>
																			<td class="">
																				172.16.3.166
																			</td>
																			<td class="">
																				3306
																			</td>
																			<td class="">
																				upload
																			</td>
																			<td class="">
																				upload
																			</td>
																			<td class="">
																				<span>
																					******
																				</span>
																			</td>
																			<td class="">
																				system
																			</td>
																			<td class="ant-table-column-has-filters">
																				<span>
																					2018-05-21
																				</span>
																			</td>
																			<td class="">
																				<span>
																					system
																				</span>
																			</td>
																			<td class="ant-table-column-has-filters">
																				<span>
																					2018-05-21
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
																		CSV
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
																		Oracle
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
																		HBase
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
																		Hive
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
																		MySQL
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
																		Excel
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
													共 18 条
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
												<li title="下一页" class="ant-pagination-disabled ant-pagination-next" aria-disabled="true">
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