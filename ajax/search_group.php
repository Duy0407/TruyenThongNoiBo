<?php
require_once '../config/config.php';
$keyword = getValue('keyword','str','POST','');
$db_search = new db_query("SELECT * FROM `group` WHERE group_name LIKE '%$keyword%' AND id_company = " . $_SESSION['login']['id'] . " ORDER BY id DESC");
if (isset($_SESSION['login'])) {
    $html = "";
    $i = 1;
    while($row_group = mysql_fetch_array($db_search->result)){
        $id_manager = explode(",", $row_group['id_manager']);
        $id_employee = explode(",", $row_group['id_employee']);
        $count_member = array_unique(array_merge($id_employee,$id_manager));
        if ($row_group['group_mode'] == 0) {
            $group_mode = "Công khai";
        }else{
            $group_mode = "Riêng tư";
        }
        $name_manage = "";
        for ($i=0; $i < count($id_manager); $i++) { 
            $info_ep = getEmployee($id_manager[$i]);
            if ($i == count($id_manager) - 1) {
                $name_manage = $name_manage . $info_ep->data->items[0]->ep_name;
            }else{
                $name_manage = $name_manage . $info_ep->data->items[0]->ep_name . ", ";
            }
        }
        $html = $html . '<tr class="v_tr_group">
                            <td>'.$i.'</td>
                            <td>'.$row_group['group_name'].'</td>
                            <td>'.$name_manage.'</td>
                            <td>'.count($count_member).' thành viên</td>
                            <td>'.$group_mode.'</td>
                            <td><img src="../img/img32.png" alt="Ảnh lỗi" data-group_id="'.$row_group['id'].'" class="show_model_del_group_tl" onclick="delete_group(this)"></td>
                        </tr>';
        $i++;
    }
    echo json_encode([
        'html'=>$html
    ]);
}
?>