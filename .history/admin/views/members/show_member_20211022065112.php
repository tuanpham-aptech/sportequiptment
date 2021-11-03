<?php
if(isset($_GET['id'])){
$member_id = $_GET['id'];
$con->query("delete from members where member_id = $member_id");
}
$query = "select *from  members";
$result = $con->query( $query);
?>
<div class="member">
<h2 class="member-title">Danh sách thành viên </h2>
                    <table class="member-table">
                        <thead class="member-table--thead">
                          <th class="member-table--th">ID</th>
                          <th  class="member-table--th">TÊN ĐĂNG NHẬP </th>
                          <th  class="member-table--th">MẬT KHẨU </th>
                          <th  class="member-table--th">HỌ TÊN </th>
                          <th  class="member-table--th">ĐIỆN THOẠI  </th>
                          <th  class="member-table--th">ĐỊA CHỈ  </th>
                          <th  class="member-table--th">EMAIL </th>
                          <th  class="member-table--th">Xoá </th>
                          <th  class="member-table--th">Sửa</th>
                        </thead>
                        <tbody>
                        <?php foreach ($result as $member):?>
                          <tr  class="member-table--tr">
                            <td class="member-table--td"><?php echo $member['member_id'];?></td>
                            <td class="member-table--td"><h3 class="member-heading"><?php echo $member['username'];?></h3></td>
                            <td class="member-table--td"><span class="member-pass">1222222222222222</span></td>
                            <td class="member-table--td"><span class="member-full">Phạm văn tuân</span></td>
                            <td class="member-table--td"><span class="member-mobile">0379679502</span></td>
                            <td class="member-table--td"><span class="member-address">Lục yên Yên bái</span> </td>
                            <td class="member-table--td"><span class="member-email">tuanphamanh137908@gmail.com</span></td>
                            <td class="member-table--td"><a href="#!" class="btn btn--primary">Xoá </a> </td>
                            <td class="member-table--td"><a href="#!" class="btn btn-secondary">Sửa</a></td>
                          </tr>

                        <?php endforeach;?>
                        </tbody>
                      </table>
                </div>
