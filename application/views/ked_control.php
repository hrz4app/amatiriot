<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<form method="post" action="<?php echo base_url('ked/update');?>">
		<input type="hidden" name="value" value="<?php echo $this->Mked->get()->value == 1 ? 0:1;?>">
		<input type="submit" value="<?php echo $this->Mked->get()->value == 1 ? 'OFF':'ON';?>">
	</form>
</body>
</html>