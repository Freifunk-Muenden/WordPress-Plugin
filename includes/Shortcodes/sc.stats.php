<?php

/**
 * @author Kristian Stoeckel <kristian@freifunk-muenden.de>
 */
class FF_SC_Stats {

    public static function render() {
        echo '<p>Wir möchten an dieser Stelle von Zeit zu Zeit immer mehr Statistiken integrieren.</p>';
        FF_SC_Stats::printGlobalGraph();
        echo '<hr/>';
        FF_SC_Stats::printNodeList();
    }

    private static function printGlobalGraph() {
        echo '<img src="/ffapi/data/nodes/globalGraph.png?' . time() . '" alt="Anzahl der Nodes und Clients der letzten 7 Tage" />';
    }

    private static function printNodeList() {
        $nodes = FF_Nodes::getNodes();
        echo '<table class="table" id="nodelist">';
        echo '<thead>';
        echo '<tr>';
        echo '<th>NodeID</th>';
        echo '<th>Hostname</th>';
        echo '<th>Clients</th>';
        echo '<th></th>';
        echo '</tr>';
        echo '</thead>';
        echo '<tbody>';
        foreach ($nodes as $node) {
            echo '<tr>';
            echo '<td><a href="https://freifunk-muenden.de/meshviewer/#!v:m;n:' . $node->getID() . '">' . $node->getID() . '</a></td>';
            echo '<td><b>' . $node->getHostname() . '</b></td>';
            echo '<td data-order="' . $node->getClientCount() . '">' . $node->getClientCount() . ' Clients</td>';
            echo '<td data-order="' . $node->isOnline() . '">' . ($node->isOnline() ? '<label class="label label-success">Online!</label>' : '<label class="label label-danger">Offline!</label>') . '</td>';
            echo '</tr>';
        }
        echo '</tbody>';
        echo '</table>';
        echo '<script type="text/javascript">
            $("#nodelist").DataTable({
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/German.json"
                },
                "order": [[ 3, "desc" ],[ 2, "desc" ]],
                "columnDefs": [
                    {
                        "targets": [ 0 ],
                        "visible": false,
                        "searchable": true
                    }
                ]
            });
        </script>';
    }

}

add_shortcode('ffhmue_stats', 'renderScStats');

function renderScStats() {
    FF_SC_Stats::render();
}
