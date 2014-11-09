<?php
/**
 * @package     Joomla.Site
 * @subpackage  Layout
 *
 * @copyright   Copyright (C) 2005 - 2014 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('JPATH_BASE') or die;

JHtmlBehavior::core();
?>

	<script type="text/javascript">
		jQuery(function()
		{
			Joomla.toggleSidebar(true);
		});
	</script>

	<div class="toggle-sidebar">
		<?php echo JLayoutHelper::render('joomla.searchtools.default.togglesidebar'); ?>
	</div>
<div id="sidebar">
	<div class="sidebar-nav">
		<?php if ($displayData->displayMenu) : ?>
		<ul id="submenu" class="nav nav-list">
			<?php foreach ($displayData->list as $item) :
			if (isset ($item[2]) && $item[2] == 1) : ?>
				<li class="active">
			<?php else : ?>
				<li>
			<?php endif;
			if ($displayData->hide) : ?>
				<a class="nolink"><?php echo $item[0]; ?></a>
			<?php else :
				if (strlen($item[1])) : ?>
					<a href="<?php echo JFilterOutput::ampReplace($item[1]); ?>"><?php echo $item[0]; ?></a>
				<?php else : ?>
					<?php echo $item[0]; ?>
				<?php endif;
			endif; ?>
			</li>
			<?php endforeach; ?>
		</ul>
		<?php endif; ?>
		<?php if ($displayData->displayMenu && $displayData->displayFilters) : ?>
		<hr />
		<?php endif; ?>
		<?php if ($displayData->displayFilters) : ?>
		<div class="filter-select hidden-phone">
			<h4 class="page-header"><?php echo JText::_('JSEARCH_FILTER_LABEL');?></h4>
			<?php foreach ($displayData->filters as $filter) : ?>
				<label for="<?php echo $filter['name']; ?>" class="element-invisible"><?php echo $filter['label']; ?></label>
				<select name="<?php echo $filter['name']; ?>" id="<?php echo $filter['name']; ?>" class="span12 small" onchange="this.form.submit()">
					<?php if (!$filter['noDefault']) : ?>
						<option value=""><?php echo $filter['label']; ?></option>
					<?php endif; ?>
					<?php echo $filter['options']; ?>
				</select>
				<hr class="hr-condensed" />
			<?php endforeach; ?>
		</div>
		<?php endif; ?>
	</div>
</div>