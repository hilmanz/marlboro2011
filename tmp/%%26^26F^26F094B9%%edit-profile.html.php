<?php /* Smarty version 2.6.13, created on 2011-09-13 18:04:24
         compiled from marlboro/edit-profile.html */ ?>
<div style="padding:10px;"><p><h2>Edit Profile</h2></p><br /><?php if ($this->_tpl_vars['msg']): ?><p><div style="color:#cc0000;"><h3><?php echo $this->_tpl_vars['msg']; ?>
</h3></div></p><?php endif; ?><form><input type="hidden" name="page" value="profile" /><input type="hidden" name="act" value="edit" /><input type="hidden" name="edit" value="1" /><input type="hidden" name="regid" value="<?php echo $this->_tpl_vars['list']['id']; ?>
" /><table width="100%" border="0" cellspacing="0" cellpadding="0" class="addlist zebra">	<tr>		<td>Username</td><td><input type="text" name="username" value="<?php echo $this->_tpl_vars['list']['username']; ?>
" disabled="disabled" /></td>	</tr>	<tr>		<td>Nama</td><td><input type="text" name="nama" value="<?php echo $this->_tpl_vars['list']['nama']; ?>
" /></td>	</tr>	<tr>		<td>Panggilan</td><td><input type="text" name="panggilan" value="<?php echo $this->_tpl_vars['list']['panggilan']; ?>
" /></td>	</tr>	<tr>		<td>Jenis Kelamin</td>		<td>			<select name="jenis_kelamin">				<option value="L" <?php if ($this->_tpl_vars['list']['jenis_kelamin'] == 'L'): ?>selected="selected"<?php endif; ?>>Laki-laki</option>				<option value="P" <?php if ($this->_tpl_vars['list']['jenis_kelamin'] == 'P'): ?>selected="selected"<?php endif; ?>>Perempuan</option>			</select>	</tr>	<tr>		<td>Tempat Lahir</td><td><input type="text" name="tempat_lahir" value="<?php echo $this->_tpl_vars['list']['tempat_lahir']; ?>
" /></td>	</tr>	<tr>		<td>Tanggal Lahir</td><td><input type="text" name="tanggal_lahir" value="<?php echo $this->_tpl_vars['list']['tgl_lahir']; ?>
" /></td>	</tr>	<tr>		<td>No. ID</td><td><input type="text" name="no_id" value="<?php echo $this->_tpl_vars['list']['no_id']; ?>
" /></td>	</tr>	<tr>		<td>Email</td><td><input type="text" name="email" value="<?php echo $this->_tpl_vars['list']['email']; ?>
" /></td>	</tr>	<tr>		<td>Kota</td><td><input type="text" name="kota" value="<?php echo $this->_tpl_vars['list']['kota']; ?>
" /></td>	</tr>	<tr>		<td>Propinsi</td><td><input type="text" name="propinsi" value="<?php echo $this->_tpl_vars['list']['provinsi']; ?>
" /></td>	</tr>	<tr>		<td>Merk Rokok 1</td><td><input type="text" name="merk_rokok_1" value="<?php echo $this->_tpl_vars['list']['merk_rokok_1']; ?>
" /></td>	</tr>	<tr>		<td>Merk Rokok 2</td><td><input type="text" name="merk_rokok_2" value="<?php echo $this->_tpl_vars['list']['merk_rokok_2']; ?>
" /></td>	</tr>	<tr>		<td>Acc Social Media</td><td><input type="text" name="acc_social_media" value="<?php echo $this->_tpl_vars['list']['acc_social_media']; ?>
" /></td>	</tr>	<tr>		<td>Password</td><td><input type="text" name="password" value="" /></td>	</tr>	<tr>		<td colspan="2"><input type="submit" value=" Edit Profile " /></td>	</tr></table></form></div>