//
// This file is part of Adaptable theme for moodle
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.
//
//
// Adaptable save button JS file
//
// @package    theme_adaptable
// @copyright  2015-2019 Jeremy Hopkins (Coventry University)
// @copyright  2015-2019 Fernando Acedo (3-bits.com)
// @copyright  2018-2019 Manoj Solanki (Coventry University)
// @copyright  2019 G J Barnard
//               {@link https://moodle.org/user/profile.php?id=442195}
//               {@link https://gjbarnard.co.uk}
// @license    https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later.

/* jshint ignore:start */
define(['jquery', 'core/log'], function($, log) {

    "use strict"; // ... jshint ;_;.

    log.debug('Adaptable savebutton.js function called');

    return {
        init: function() {
            $(document).ready(function($) {

                $("#savediscardsection").hide();

                $('#adminsettings :input').on('change input', function() {
                    $("#savediscardsection").fadeIn('slow');
                });

                $("#adminsubmitbutton").click(function() {
                    window.onbeforeunload = null;
                    $("#adminsettings").submit();
                });
                $("#adminresetbutton").click(function() {
                    var result = confirm("This resets any changes made since loading this page. Are you sure?");
                    if (result == true) {
                        $('#adminsettings')[0].reset();
                        $("#savediscardsection").hide();
                    }
                });

                $(".colourdialogue").click(function() {
                    $("#savediscardsection").fadeIn('slow');
                });
            });
        }
    };
});
/* jshint ignore:end */
