<table cellpadding="0" cellspacing="0" border="0" class="tableGreen" width="220" class="tableBg">
	<tr>
		<td class="tableThGreen" nowrap="nowrap"> <img src="{devblocks_url}images/window_view.gif{/devblocks_url}"> {$translate->_('dashboard.actions')|capitalize}</td>
	</tr>
	<tr>
		<td>
			<table cellpadding="0" cellspacing="1" border="0" width="100%" class="tableBg">
				<tr>
					<td class="tableCellBg" width="100%" style="padding:2px;">
				      	<b>{$translate->_('dashboard.active_dashboard')|capitalize}</b>
						<form method="POST" action="{devblocks_url}{/devblocks_url}" id="dashboardMenuForm">
						<input type="hidden" name="c" value="tickets">
						<input type="hidden" name="a" value="changeDashboard">
				      	<select name="dashboard_id" onchange="this.form.submit();">
				      		<option value="0" {if empty($active_dashboard_id)}selected{/if}>My Tickets</option>
				      		<optgroup label="Teamwork">
				      			{foreach from=$teams item=team key=team_id}
				      			{assign var=team_count value=$team_counts.$team_id}
				      			<option value="t{$team->id}" {if substr($active_dashboard_id,1)==$team->id}selected{/if}>{$team->name} ({$team_count.tickets}{if $team_count.tasks}/+{$team_count.tasks}{/if})</option>
				      			{/foreach}
				      		</optgroup>
				      		<optgroup label="Custom Dashboards">
				      		{foreach from=$dashboards item=dashboard}
				      			<option value="{$dashboard->id}" {if $active_dashboard_id==$dashboard->id}selected{/if}>{$dashboard->name}</option>
				      		{/foreach}
				      		<option value="add"> -- {$translate->_('dashboard.add_dashboard')|lower} -- </option>
				      		</optgroup>
				      	</select>
				      	</form>
					</td>
				</tr>
				{if substr($active_dashboard_id,0,1) == 't'}
				<tr>
					<td class="tableCellBg" width="100%" style="padding:2px;">
						<img src="{devblocks_url}images/folder_gear.gif{/devblocks_url}"> <a href="{devblocks_url}c=tickets&a=dashboards&team=team&id={$dashboard_team_id}&mode=manage{/devblocks_url}">{$translate->_('teamwork.team_management')|capitalize}</a><br>
					</td>
				</tr>
				{/if}
				{if !empty($active_dashboard_id) && is_numeric($active_dashboard_id)}
				<tr>
					<td class="tableCellBg" width="100%" style="padding:2px;">
						 <a href="{devblocks_url}c=tickets&a=addView{/devblocks_url}">{$translate->_('dashboard.add_view')|lower}</a>
					</td>
				</tr>
				{/if}
				{if !empty($active_dashboard_id) && is_numeric($active_dashboard_id)}
				<tr>
					<td class="tableCellBg" width="100%" style="padding:2px;">
						 <a href="#">{$translate->_('dashboard.modify')|lower}</a>
					</td>
				</tr>
				{/if}
				<tr>
					<td class="tableCellBg" width="100%" style="padding:2px;">
						 <a href="{devblocks_url}c=tickets{/devblocks_url}">{$translate->_('common.refresh')|lower}</a>
					</td>
				</tr>
			</table>
		</td>
	</tr>
</table>
