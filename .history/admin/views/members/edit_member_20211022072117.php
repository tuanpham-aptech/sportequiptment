<?php if(isset($_GET['id']))
<div class="member">
                    <h2 class="member-title">Chỉnh sửa thông tin thành viên  </h2>
                    <table class="member-table--update">
                        <tbody>
                            <form class="member-form" method="post">
                                <tr class="member-table--tr">
                                    <td class="member-table--td">Tên đăng nhập :</td>
                                  <td class="member-table--td">
                                      <input type="text" name="username"value ="">
                                    </td>
                                </tr>
                                <tr class="member-table--tr">
                                    <td class="member-table--td">Mật khẩu :</td>
                                  <td class="member-table--td"><input type="password" name="password" value=""></td>
                                </tr>
                                <tr class="member-table--tr">
                                    <td class="member-table--td">Số điện thoại :</td>
                                    <td class="member-table--td"><input type="number" name="mobile" id=""></td>
                                </tr>
                                <tr class="member-table--tr">
                                    <td class="member-table--td">Địa chỉ :</td>
                                    <td class="member-table--td"><input type="text" name="address"> </td>
                                </tr>
                                <tr class="member-table--tr">
                                    <td class="member-table--td">Email</td>
                                    <td class="member-table--td"><input type="email" name="email"></td>
                                </tr>
                                <tr class="member-table--tr">
                                    <td class="member-table--td"></td>
                                    <td class="member-table--td"><input type="submit" name="update" value="Cập nhật" ><a href="?option=show_member" style="text-decoration: none;">&lt;&lt;Trở lại </a></td>
                                </tr>
                            </form>
                        </tbody>
                      </table>
                </div>