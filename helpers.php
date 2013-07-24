<?php

function colors_table($colors = array())
{
	// I really don't like doing this, but it is helpful in this case
	$html = '<table>';
	foreach ($colors as $color) 
	{
		$html .= '	<tr>
						<td>'.$color.'</td>
						<td style="background-color:#'.$color.';">&nbsp;&nbsp;</td>
					</tr>';
	}
	$html .= '</table>';

	return $html;
}