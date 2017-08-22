<?php /* Smarty version 2.6.13, created on 2011-09-12 14:38:17
         compiled from marlboro/admin/redeem-history.html */ ?>
<div style="padding:10px;"><p><h2>Badge Redeem History</h2></p><br /><table width="100%" border="0" cellspacing="0" cellpadding="0" class="addlist zebra">  <tr class="head">    <td><strong>Redeem Time</strong></td>	<td><strong>User ID</strong></td>	<td><strong>Kode</strong></td>	<td><strong>Badge ID</strong></td>  </tr>  <?php unset($this->_sections['i']);
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
?>  <tr>    <td><?php echo $this->_tpl_vars['list'][$this->_sections['i']['index']]['redeem_time']; ?>
</td>    <td><?php echo $this->_tpl_vars['list'][$this->_sections['i']['index']]['user_id']; ?>
</td>    <td><?php echo $this->_tpl_vars['list'][$this->_sections['i']['index']]['kode']; ?>
</td>    <td><?php echo $this->_tpl_vars['list'][$this->_sections['i']['index']]['badge_id']; ?>
</td>	</tr>  <?php endfor; endif; ?></table><p><?php echo $this->_tpl_vars['paging']; ?>
</p></div>