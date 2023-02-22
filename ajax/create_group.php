<?php
require_once '../config/config.php';
$check = [];
$group_name = getValue('group_name', 'str', 'POST', '');
$check[] = $group_name;
$id_manager = getValue('id_manager', 'str', 'POST', '');
$check[] = $id_manager;
$description = getValue('description', 'str', 'POST', '');
$check[] =  $description;
$id_employee = getValue('id_employee', 'str', 'POST', '');
$check[] = $id_employee;
$group_mode = getValue('group_mode', 'int', 'POST', '');
$check[] = $group_mode;
//Ảnh bìa

$duoi = explode('/', $_FILES['cover_image']['type']);
$duoi = $duoi[(count($duoi) - 1)];
$_FILES['cover_image']['name'] = rand() . "." . $duoi;
$tmp_name1 = $_FILES['cover_image']['tmp_name'];

//Ảnh đại diện
$duoi = explode('/', $_FILES['group_image']['type']);
$duoi = $duoi[(count($duoi) - 1)];
$_FILES['group_image']['name'] = rand() . "." . $duoi;
$tmp_name2 = $_FILES['group_image']['tmp_name'];

$folder_cover_img = "../img/group/cover_img/" . $_SESSION['login']['id'];
$folder_group_image = "../img/group/group_image/" . $_SESSION['login']['id'];

// folder Ảnh bìa nhóm
if (!is_dir($folder_cover_img)) {
	mkdir($folder_cover_img);
}
$dir_cover_image = $folder_cover_img . "/" . $_FILES['cover_image']['name'];
move_uploaded_file($tmp_name1, $dir_cover_image);

// folder ảnh đại diện nhóm
if (!is_dir($folder_group_image)) {
	mkdir($folder_group_image);
}
$dir_group_image = $folder_group_image . "/" . $_FILES['group_image']['name'];
move_uploaded_file($tmp_name2, $dir_group_image);
$data = [
	'id_company' => $_SESSION['login']['id'],
	'group_name' => $group_name,
	'id_manager' => $id_manager,
	'id_employee' => $id_employee,
	'cover_image' => $_FILES['cover_image']['name'],
	'group_image' => $_FILES['group_image']['name'],
	'description' => $description,
	'group_mode' => $group_mode
];
add('group', $data);
$db_search = new db_query("SELECT * FROM `group` WHERE id_company = " . $_SESSION['login']['id'] . " ORDER BY id DESC");
$html = "";
$j = 1;
while ($row_group = mysql_fetch_array($db_search->result)) {
	$id_manager = explode(",", $row_group['id_manager']);
	$id_employee = explode(",", $row_group['id_employee']);
	$count_member = array_unique(array_merge($id_employee, $id_manager));
	if ($row_group['group_mode'] == 0) {
		$group_mode = "Công khai";
	} else {
		$group_mode = "Riêng tư";
	}
	$name_manage = "";
	for ($i = 0; $i < count($id_manager); $i++) {
		$info_ep = getEmployee($id_manager[$i]);
		if ($i == count($id_manager) - 1) {
			$name_manage = $name_manage . $info_ep->data->items[0]->ep_name;
		} else {
			$name_manage = $name_manage . $info_ep->data->items[0]->ep_name . ", ";
		}
	}
	$html = $html . '<tr class="v_tr_group">
                        <td>' . $j . '</td>
                        <td>' . $row_group['group_name'] . '</td>
                        <td>' . $name_manage . '</td>
                        <td>' . count($count_member) . ' thành viên</td>
                        <td>' . $group_mode . '</td>
                        <td><img src="../img/img32.png" alt="Ảnh lỗi" data-group_id="' . $row_group['id'] . '" class="show_model_del_group_tl" onclick="delete_group(this)"></td>
                      </tr>';
	$j++;
}
echo json_encode([
	'result' => true,
	'html' => $html
]);

?>