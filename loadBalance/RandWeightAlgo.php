<?php
/**
 *
 * User: huangwalker
 * Date: 2020/6/10
 * Time: 11:09
 * Email: <huangwalker@qq.com>
 */

//随机加权
class RandWeightAlgo
{
    //要负载的服务器,权值越大，访问概览越高
    private static $servers = [
        "192.168.1.2" => 2,
        "192.168.1.3" => 2,
        "192.168.1.4" => 2,
        "192.168.1.5" => 4,
    ];

    //记录当前服务器的下标，便于轮询
    private static $serverIndex = 0;

    public function run()
    {
        $server_map = [];

        for ($i=0;$i< 100000;$i++) {
            $server = $this->randomWithWeight();

            $count = $server_map[$server] ?? null;
            if ($count == null) {
                $count = 1;
            } else {
                $count++;
            }

            $server_map[$server] = $count;
        }

        //请求分发的结果
        foreach ($server_map as $server => $count) {
            echo sprintf("IP:%s,次数:%d", $server, $count).PHP_EOL;
        }
    }

    /**
     * 随机加权获取服务器
     * @return mixed
     * @author clh
     * @time 2020/6/10
     */
    private function randomWithWeight()
    {
        //根据权值构造一个新的服务器数组
        $tmp_servers = [];
        foreach (self::$servers as $server => $weight) {
            for ($i=0;$i<$weight;$i++) {
                $tmp_servers[] = $server;
            }
        }

        $server_index = mt_rand(0, count($tmp_servers) -1);

        $server = $tmp_servers[$server_index];
        return $server;
    }
}

$obj = new RandWeightAlgo();
$obj->run();