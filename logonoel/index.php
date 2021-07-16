<?php

$key = 'Tạo Logo Giáng Sinh Noel Pro';
echo '<h2 class="phdr">'.$key.'</h2>';
echo '<div class="list1"><center><img src="view.php?text='.(isset($_POST['text']) ? ''.$_POST['text'].'':'Christmas').'&color='.(isset($_POST['color']) ? ''.$_POST['color'].'':'3').'&font='.(isset($_POST['font']) ? ''.$_POST['font'].'':'5').'" alt="logo" /><br><a href ="view.php?text='.(isset($_POST['text']) ? ''.$_POST['text'].'':'Christmas').'&color='.(isset($_POST['color']) ? ''.$_POST['color'].'':'3').'&font='.(isset($_POST['font']) ? ''.$_POST['font'].'':'5').'" />[Tải về]</a></center> ';
echo '<br/><form method="post">Nội dung:<br/><input type="text" name="text" value="'.(isset($_POST['text']) ? ''.$_POST['text'].'':'Christmas').'" /><br/><input type="radio" name="color" value="1" '.(!isset($_POST['color']) || $_POST['color'] == 1 ? 'checked="checked"':'').' /> Màu trắng<br/><input type="radio" name="color" value="2" '.($_POST['color'] == 2 ? 'checked="checked"':'').' /> Màu Đỏ<br/><input type="radio" name="color" value="3" '.($_POST['color'] == 3 ? 'checked="checked"':'').' /> Màu xanh<br/>
Phông chữ: <img src="preview.php?font=1" width="168" alt="" id="font" style="vertical-align:middle;" /><br />';
echo "<script type=\"text/javascript\">
//<![CDATA[
function update_font(newimage){document.getElementById('font').src='preview.php?font='+newimage+'';}
//]]>
</script>";
echo '
<select name="font" onchange="update_font(this.options[selectedIndex].value);"><option value="1">Noel 1</option><option value="2=">Noel 2</option><option value="3==">Noel 3</option><option value="4=">Noel 4</option><option value="5">Noel 5</option></select><br>
<input type="submit" value="Tạo" /></div></form>';

?>