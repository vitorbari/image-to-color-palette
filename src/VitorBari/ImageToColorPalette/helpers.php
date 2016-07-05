<?php

if (! function_exists('colors_table')) {
    function colors_table($colors = array())
    {
        $html = '<table>';
        foreach ($colors as $color) {
            $html .= '	<tr>
							<td>'.$color.'</td>
							<td style="background-color:'.$color.';">&nbsp;&nbsp;</td>
						</tr>';
        }
        $html .= '</table>';

        return $html;
    }
}
