<div class="modal-header">
                    <h5 class="modal-title" id="changepassword">Access of <?=$name?></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" onClick="window.location.reload();"></button>
                </div>
                <div class="modal-body">
                      <div class="gridjs-wrapper" style="height: auto;">
                              <table role="grid" class="gridjs-table" style="height: auto;">
                                  <thead class="gridjs-thead">
                                      <tr class="gridjs-tr">
                                          <th data-column-id="id" class="gridjs-th" style="width: 120px;">
                                              <div class="gridjs-th-content">जिला</div>
                                          </th>
                                          <th data-column-id="name" class="gridjs-th" style="width: 150px;">
                                              <div class="gridjs-th-content">विधानसभा</div>
                                          </th>
                                          <th data-column-id="date" class="gridjs-th" style="width: 180px;">
                                              <div class="gridjs-th-content">पंचायत / नगर पालिका</div>
                                          </th>
                                          <th data-column-id="total" class="gridjs-th" style="width: 120px;">
                                              <div class="gridjs-th-content">मंडल </div>
                                          </th>
                                          <th data-column-id="status" class="gridjs-th" style="width: 120px;">
                                              <div class="gridjs-th-content">ग्राम पंचायत</div>
                                          </th>
                                          <th data-column-id="actions" class="gridjs-th" style="width: 100px;">
                                              <div class="gridjs-th-content">बूथ</div>
                                          </th>
                                      </tr>
                                  </thead>
                                  <tbody class="gridjs-tbody">
                                      <tr class="gridjs-tr">
                                          <td data-column-id="name" class="gridjs-td"><?php echo !empty($access_data[0]['zila']) ? $access_data[0]['zila']: 'NA' ?></td>
                                          <td data-column-id="name" class="gridjs-td"><?= !empty($access_data[0]['vidhansabha']) ? $access_data[0]['vidhansabha']: 'NA'?></td> 
                                          <td data-column-id="date" class="gridjs-td"><?= !empty($access_data[0]['panchayat_nagarpalika']) ? $access_data[0]['panchayat_nagarpalika']: 'NA' ?></td>
                                          <td data-column-id="total" class="gridjs-td"><?= !empty($access_data[0]['mandal']) ? $access_data[0]['mandal']: 'NA' ?></td>
                                          <td data-column-id="status" class="gridjs-td"><?= !empty($access_data[0]['gram_panchayat']) ? $access_data[0]['gram_panchayat']: 'NA' ?></td>
                                          <td data-column-id="status" class="gridjs-td"><?= !empty($access_data[0]['booth']) ? $access_data[0]['booth'] : 'NA'?></td>
                                      </tr>
                                    
                                  </tbody>
                              </table>
							</div>
                            <div class="col-lg-12">
                                <div class="hstack gap-2 justify-content-end">
                                    <button type="button" class="btn btn-light" data-bs-dismiss="modal" style="    margin-top: 15px;" onClick="window.location.reload();">Close</button>
                                    
                                </div>
                            </div>
                   
                </div>