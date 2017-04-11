<?php

/**
 * @author Kristian Stoeckel <kristian@freifunk-muenden.de>
 */
class FF_SC_Stats {

    public static function render() {
        echo '<p>Wir möchten an dieser Stelle von Zeit zu Zeit immer mehr Statistiken integrieren.</p>';
        FF_SC_Stats::printGlobalGraph();
    }

    private static function printGlobalGraph() {
        echo '<img src="/ffapi/data/nodes/globalGraph.png" alt="Anzahl der Nodes und Clients der letzten 7 Tage" />';
    }

}

add_shortcode('ffhmue_stats', 'renderScStats');

function renderScStats() {
    FF_SC_Stats::render();
}
