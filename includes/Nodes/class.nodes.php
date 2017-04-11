<?php

/**
 * @author Kristian Stöckel <kristian@freifunk-muenden.de>
 */
class FF_Nodes {

    private static $nodeCache;

    /**
     * @return \FF_Node
     */
    public static function getNodes() {
        if (FF_Nodes::$nodeCache == NULL) {
            FF_Nodes::loadNodes();
        }
        return FF_Nodes::$nodeCache;
    }

    private static function loadNodes() {
        $data = file_get_contents('https://freifunk-muenden.de/ffapi/data/nodelist.json');
        $json = json_decode($data);
        foreach ($json->nodes as $node) {
            FF_Nodes::$nodeCache[] = new FF_Node($node);
        }
    }

}

FF_Nodes::getNodes();
