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
                            <td class="member-table--td"><span class="member-pass"><?php echo $member['password'];?></span></td>
                            <td class="member-table--td"><span class="member-full"><?php echo $member['fullname'];?></span></td>
                            <td class="member-table--td"><span class="member-mobile"><?php echo $member['mobile'];?></span></td>
                            <td class="member-table--td"><span class="member-address"><?php echo $member['address'];?></span> </td>
                            <td class="member-table--td"><span class="member-email"><?php echo $member['email'];?></span></td>
                            <td class="member-table--td"><a href="?option=show_member&id=<?=$member['member_id'];?>" onclick ="return confirm('Bạn có chắc muốn xoá thành viên này  ?')" class="btn btn--primary">Xoá </a> </td>
                            <td class="member-table--td"><a href="#!" class="btn btn-secondary">Sửa</a></td>
                          </tr>

                        <?php endforeach;?>
                        </tbody>
                      </table>
                </div>
