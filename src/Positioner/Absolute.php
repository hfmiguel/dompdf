<?php
/**
 * @package dompdf
 * @link    http://dompdf.github.com/
 * @author  Benj Carson <benjcarson@digitaljunkies.ca>
 * @license http://www.gnu.org/copyleft/lesser.html GNU Lesser General Public License
 */

namespace Dompdf\Positioner;

use Dompdf\FrameDecorator\AbstractFrameDecorator;

/**
 * Positions absolutely positioned frames
 */
class Absolute extends AbstractPositioner
{

    /**
     * @param AbstractFrameDecorator $frame
     */
    function position(AbstractFrameDecorator $frame)
    {
        $style = $frame->get_style();
        [$cbx, $cby, $cbw, $cbh] = $frame->get_containing_block();

        // If the `top` value is `auto`, the frame will be repositioned after
        // its height has been resolved
        $left = (float) $style->length_in_pt($style->left, $cbw);
        $top = (float) $style->length_in_pt($style->top, $cbh);

        $frame->set_position($cbx + $left, $cby + $top);
    }
}
