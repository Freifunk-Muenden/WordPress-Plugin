<?php

/**
 * @author Kristian Stoeckel <kristian@freifunk-muenden.de>
 */
class FF_SC_Home {

    public static function render() {
        FF_SC_Home::printFreifunkErklaerung();
        echo '<hr />';
        FF_SC_Home::printQuickStats();
        echo '<hr />';
    }

    private static function printQuickStats() {
        ?>
        <div class="row" style="text-align: center;">
            <div class="col-md-4">
                <i class="fa fa-wifi fa-5x" style="color: #E81E77;"></i><br />
                <span style="font-size: 17px;"><?php echo FF_Nodes::getTotalNodeCount(); ?> Knoten</span>
            </div>
            <div class="col-md-4">
                <i class="fa fa-wifi fa-5x" style="color: #fdbc41;"></i><br />
                <span style="font-size: 17px;"><?php echo FF_Nodes::getOnlineNodeCount(); ?> Knoten <small><i>(online)</i></small></span>
            </div>
            <div class="col-md-4">
                <i class="fa fa-users fa-5x" style="color: #009ee0;"></i><br />
                <span style="font-size: 17px;"><?php echo FF_Nodes::getTotalClients(); ?> Clients</span>
            </div>
        </div>
        <?php
    }

    private static function printFreifunkErklaerung() {
        ?>
        <p><b>Freifunk</b> ist ein <i>offenes</i>, <i>dezentrales</i> Netzwerk, welches von engagierten Privatpersonen aufgebaut wird.
            Jeder kann <b>ohne viel Mühe und Kosten</b> einen eigenen Freifunk Knoten betreiben und so Teil des Netzes werden.</p>
        <div style="text-align: center;">
            <iframe src="https://player.vimeo.com/video/64814620" width="80%" height="360" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
        </div>
        <?php
    }

}

add_shortcode('ffhmue_home', 'renderScHome');

function renderScHome() {
    FF_SC_Home::render();
}
