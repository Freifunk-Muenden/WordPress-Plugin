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

    public static function getTotalClients() {
        $clients = 0;
        foreach (FF_Nodes::getNodes() as $node)
            $clients += $node->getClientCount();
        return $clients;
    }

    public static function getTotalNodeCount() {
        return count(FF_Nodes::getNodes());
    }

    public static function getOnlineNodeCount() {
        $nodes = 0;
        foreach (FF_Nodes::getNodes() as $node)
            if ($node->isOnline())
                $nodes++;
        return $nodes;
    }

}

FF_Nodes::getNodes();
