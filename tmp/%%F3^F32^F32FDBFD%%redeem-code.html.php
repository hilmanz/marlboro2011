<?php /* Smarty version 2.6.13, created on 2011-09-12 14:38:25
         compiled from marlboro/admin/redeem-code.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'date_format', 'marlboro/admin/redeem-code.html', 1, false),)), $this); ?>
<div style="padding:10px;"><p><h2>Redeem Code Management</h2></p><br /><table width="100%" border="0" cellspacing="0" cellpadding="0" class="addlist zebra">  <tr>	<td colspan="11">		<form>			<input type="hidden" name="s" value="code" />			<input type="hidden" name="act" value="redeem-code" />			<strong>Filter By Channel: </strong>			<select name="channel">				<option value="0"> All </option>				<?php unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['ch']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
?>				<option value="<?php echo $this->_tpl_vars['ch'][$this->_sections['i']['index']]['channel_id']; ?>
"<?php if ($this->_tpl_vars['channel'] == $this->_tpl_vars['ch'][$this->_sections['i']['index']]['channel_id']): ?> selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['ch'][$this->_sections['i']['index']]['channel_name']; ?>
</option>				<?php endfor; endif; ?>			</select>			<input type="submit" value=" Go " />		</form>	</td>  </tr>  <tr class="head">    <td><strong>Kode</strong></td>	<td><strong>Channel</strong></td>	<td><strong>Tier</strong></td>	<td><strong>Wildcard</strong></td>	<td><strong>Used</strong></td>	<td><strong>Type</strong></td>	<td><strong>Generate Date</strong></td>	<td><strong>Status</strong></td>	<td><strong>Location</strong></td>	<td><strong>Start</strong></td>	<td><strong>End</strong></td>  </tr>  <?php unset($this->_sections['i']);
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
?>  <tr>    <td><?php echo $this->_tpl_vars['list'][$this->_sections['i']['index']]['kode']; ?>
</td>    <td><?php echo $this->_tpl_vars['list'][$this->_sections['i']['index']]['channel_name']; ?>
</td>    <td><?php echo $this->_tpl_vars['list'][$this->_sections['i']['index']]['tier']; ?>
</td>    <td><?php echo $this->_tpl_vars['list'][$this->_sections['i']['index']]['is_wildcard']; ?>
</td>	<td><?php echo $this->_tpl_vars['list'][$this->_sections['i']['index']]['is_used']; ?>
</td>	<td><?php echo $this->_tpl_vars['list'][$this->_sections['i']['index']]['type']; ?>
</td>	<td><?php echo ((is_array($_tmp=$this->_tpl_vars['list'][$this->_sections['i']['index']]['generated_date'])) ? $this->_run_mod_handler('date_format', true, $_tmp) : smarty_modifier_date_format($_tmp)); ?>
</td>	<td><?php echo $this->_tpl_vars['list'][$this->_sections['i']['index']]['n_status']; ?>
</td>	<td><?php echo $this->_tpl_vars['list'][$this->_sections['i']['index']]['location']; ?>
</td>	<td><?php echo ((is_array($_tmp=$this->_tpl_vars['list'][$this->_sections['i']['index']]['start_date'])) ? $this->_run_mod_handler('date_format', true, $_tmp) : smarty_modifier_date_format($_tmp)); ?>
</td>	<td><?php echo ((is_array($_tmp=$this->_tpl_vars['list'][$this->_sections['i']['index']]['end_date'])) ? $this->_run_mod_handler('date_format', true, $_tmp) : smarty_modifier_date_format($_tmp)); ?>
</td>  </tr>  <?php endfor; endif; ?></table><p><?php echo $this->_tpl_vars['paging']; ?>
</p></div>