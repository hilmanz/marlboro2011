<?php /* Smarty version 2.6.13, created on 2011-09-13 16:59:53
         compiled from marlboro/compose-message.html */ ?>
<h3>Read message</h3><p>	<a href="index.php?page=message">inbox</a>&nbsp;|&nbsp;	<a href="index.php?page=message&act=send">send</a>&nbsp;|&nbsp;	<a href="index.php?page=message&act=compose">compose</a></p><form method="post" action="index.php?page=message&act=sending"><table>	<tr>		<td>Subject</td><td>&nbsp;</td><td><input type="text" name="subject" maxlength="35" /></td>	</tr>	<tr>		<td>To</td><td>&nbsp;</td>		<td>			<?php if ($this->_tpl_vars['list']): ?>			<select name="to">				<?php unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['list']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['i']['show'] = true;
$this->_sections['i']['max'] = $this->_sections['i']['loop'];
$this->_sections['i']['step'] = 1;
$this->_sections['i']['start'] = $this->_sections['i']['step'] > 0 ? 0 : $this->_sections['i']['loop']-1;
if ($this->_sections['i']['show']) {
    $this->_sections['i']['total'] = $this->_sections['i']['loop'];
    if ($this->_sections['i']['total'] == 0)
        $this->_sections['i']['show'] = false;
} else
    $this->_sections['i']['total'] = 0;
if ($this->_sections['i']['show']):

            for ($this->_sections['i']['index'] = $this->_sections['i']['start'], $this->_sections['i']['iteration'] = 1;
                 $this->_sections['i']['iteration'] <= $this->_sections['i']['total'];
                 $this->_sections['i']['index'] += $this->_sections['i']['step'], $this->_sections['i']['iteration']++):
$this->_sections['i']['rownum'] = $this->_sections['i']['iteration'];
$this->_sections['i']['index_prev'] = $this->_sections['i']['index'] - $this->_sections['i']['step'];
$this->_sections['i']['index_next'] = $this->_sections['i']['index'] + $this->_sections['i']['step'];
$this->_sections['i']['first']      = ($this->_sections['i']['iteration'] == 1);
$this->_sections['i']['last']       = ($this->_sections['i']['iteration'] == $this->_sections['i']['total']);
?>				<option value="<?php echo $this->_tpl_vars['list'][$this->_sections['i']['index']]['id']; ?>
"><?php echo $this->_tpl_vars['list'][$this->_sections['i']['index']]['name']; ?>
</option>				<?php endfor; endif; ?>			</select>			<?php else: ?>			<em>You haven't any connection's</em>			<?php endif; ?>		</td>	</tr>	<tr>		<td>Text</td><td>&nbsp;</td>		<td>			<textarea name="text"></textarea>		</td>	</tr>	<tr>		<td colspan="3"><input type="submit" value=" Send " /></td>	</tr></table></form>